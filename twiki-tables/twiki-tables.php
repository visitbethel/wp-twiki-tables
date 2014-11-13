<?php
/*
Plugin Name: TWikiTables
Plugin URI: http://unabletoremember.blogspot.com/p/twiki-tables-for-wordpress.html
Description: Rendering TWiki shorthand syntax for inline, inpage tables by WordPress (see http://twiki.org/cgi-bin/view/TWiki/TextFormattingRules#TheTable)
Version: 2.8.2
Author: Andre "Bananaman" Kaan
Author URI: http://unabletoremember.blogspot.com/


NOTE: Use of the visual text editor will pose problems as it can mangle your intent in terms of <code> tags.  I do not
offer any support for those who have the visual editor active.

Notes:



Compatible with WordPress 2.6+, 2.7+, 2.8+, 3.0+, 3.1+

=>> Read the accompanying readme.txt file for more information.  Also, visit the plugin's homepage
=>> for more information and the latest updates

Installation:

1. Download the file http://unabletoremember.blogspot.com/p/twiki-tables.zip and unzip it into your 
/wp-content/plugins/ directory.
2. Activate the plugin through the 'Plugins' admin menu in WordPress
3. Write a post with code with the TWiki shorthand for tables (using the HTML editor, not the Visual editor).

*/

/*
Copyright (c) 2012 by Andre Kaan (aka bananaman)

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation 
files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, 
modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the 
Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR
IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

*/


class TWikiTables {
	var $admin_options_name = 'twiki-tables';
	var $plugin_name = 'twiki-tables';
	var $show_admin = true;	//# Change this to false if you don\'t want the plugin\'s admin page shown.
	var $config = array();
	var $options = array(); // Don't use this directly
	var $plugin_basename = '';
	var $menu_name = '';
	var $chunk_split_token = '{[&*&]}';
	var $style = 'border: 1px solid black;';
    
	function __construct() {
		$this->plugin_name = __('TWiki Tables');
		$this->menu_name = __('Code Formatting');
		$this->plugin_basename = plugin_basename(__FILE__);
		$this->verbose = 0;
		$this->debug = 0;
		$this->validation=array('table' => 0, 'tableheader' => 0);
		if ($this->debug) {
	        print "<html><body>\n";
		}		
	}    

	function __destruct() {
		if ($this->debug) {
	    	print "</body></html>\n";
		}
		
	}
	
	function twiki_strip($content)
	{
	    $content = str_replace('<p>', '', $content);
	    $content = str_replace('</p>', '', $content);
	    $content = chop($content);
	    return $content;
	}
	
	function twiki_atts($values)
	{
	    if(!empty($values)):
	    $all_values = " ";
	    foreach($values as $key => $value)
	    {
	        $all_values .= $key.'="'.$value.'" ';
	    }
	    $all_values = substr_replace($all_values ,"",-1);
	    return $all_values;
	    endif;
	}
	
	function twiki_table_postprocess( $content )
	{
		#$content = preg_replace("/(\r\n|\n|\r)/", "\n", $content);
		#$content = preg_replace("/\n\n+/", "\n\n", $content);	
	    $x=split("<br />|\n|\r\n|\r",$content);
	    #error_log( var_export($x) );
	    #$x=split("<br />",$content);
	    #echo implode("XXXX", $content);
		$twiki_syntax = '';
	    $transformed_content='';
	    foreach ($x as $k => $v) {
	        #$l=trim($v);
	        #print "\n-->[" .  empty($twiki_syntax) . '][' . preg_match("/^\s*\[twiki\]/Us",$l) ."]--{$l}-->" ;
        	# borders 
        	if ( empty($twiki_syntax) AND preg_match("/[\n\r\s]*\[twiki\]/Us",$l)) {
        		$twiki_syntax='interpret';
        		if ($this->verbose) {
	        		$transformed_content .= "STARTTWIKI\n";
        		}
        		continue;
        	} elseif (!empty($twiki_syntax) AND preg_match("/^\s*\[\\/twiki\]/Us",$l)) {
        			if ($this->validation['table']) {
        				$transformed_content.="</table>\n";
        				$this->validation['table']=0;
        				$this->validation['tableheader']=0;
        			}
        			if ($this->verbose) {
	        			$transformed_content .= "ENDTWIKI\n";
        			}
        			$twiki_syntax='';
        			continue;
        	} elseif (!empty($twiki_syntax) AND preg_match("/^\s*\[twiki\]/Us",$l)) {
	        		$twiki_syntax='interpret';
	        		$l=preg_replace("/\s*\[twiki\]/","\n",$l);
        			if ($this->verbose) {
	        			$transformed_content .= "STARTTWIKI\n";
        			}
	        		#continue;
        	} elseif (empty($twiki_syntax) AND preg_match("/^\s*\[\\/twiki\]/Us",$l)) {
	        		$l=preg_replace("/^\s*\[\\/twiki\]/","\n",$l);
        			$twiki_syntax='';
        			if ($this->verbose) {
	        			$transformed_content .= "ENDTWIKI\n";
        			}
        			continue;
        	}
        	#
        	# if we are within the brackets for twiki process the syntax
        	#
        	if (!empty($twiki_syntax)) {
        		# table syntax
        		if (!$this->validation['table'] AND preg_match("/^\|/Us",$l)) {
        			#$transformed_content.="<table style=\"$this->style\">\n";
        			$transformed_content.="<table>\n";
        			$this->validation['table']=1;
           		} elseif ($this->validation['table'] AND preg_match("/^[^\|].*/Us",$l)) {
        			# end table if the first column does not match '|' and table flag is on
        			$transformed_content.= "</table>\n" . $l;
        			$this->validation['table']=0;
        			$this->validation['tableheader']=0;
        		} 
        		if ($this->validation['table'] AND preg_match("/^\|/Us",$l)) {
					$td='td';
        			if (!$this->validation['tableheader']) {
        				$td='th';
        			}
					$l=preg_replace("/^\|/","<tr><$td>",$l);
					$l=preg_replace("/\|\s*$/","</$td></tr>",$l);
					$l=preg_replace("/\|/", "</$td><$td>", $l);
					$this->validation['tableheader']=1;
        			
        		}
        		#
        		# Forced Link Syntax
#        		while (preg_match("/\[\[(.+)\]\[(.+)\]\]/Us", $l)) {
#        			        			if ($this->verbose) {
#        			$transformed_content .= "LINKS FOUND\n";
#        			}
#        			
#	        		$l = preg_replace("/\[\[(.+)\]\[(.+)\]\]/Us", '<a href="${1}">${2}</a>',$l);
#	       		}
        		# BOLD FACE Syntax
        		while (preg_match("/\*^([[:alnum:]]+\s?)*\*/Us", $l)) {
					if ($this->verbose) {
        				$transformed_content .= "BOLD FACE: ";
        			}
	        		$l = preg_replace("/\*([[:alnum:]]+\s?)*\*/Us", '<b>${1}</b>',$l);
	       		}
        		# BOLD ITALIC FACE Syntax
        		while (preg_match("/\s\_\_([\s\w]+)\_\_/Us", $l)) {
					if ($this->verbose) {
        				$transformed_content .= "BOLD ITALIC: ";
        			}
	        		$l = preg_replace("/\s\_\_([\s\w]+)\_\_/Us", '<b><i>${1}</i></b>',$l);
	       		}
        		# ITALIC FACE Syntax
        		while (preg_match("/\s\_([\s\w]+)\_\s/Us", $l)) {
					if ($this->verbose) {
        				$transformed_content .= "ITALIC: ";
        			}
	        		$l = preg_replace("/\s\_([\s\w]+)\_\s/Us", '<i>${1}</i>',$l);
	       		}
        		
        		$transformed_content.=$l . "<br />\n";
        	}
        	else {
#        		if ($this->verbose) {
#        			$transformed_content.= "REGLINE: " . 
#        			var_export($validation) . ";";
#        		}
        		$transformed_content.= $l;
        	}
        }
	    $twiki_syntax='';
	    $this->validation=array('table' => 0, 'tableheader' => 0);
	    return $transformed_content;
	}

}

if (class_exists('TWikiTables')){
    $instance = new TWikiTables;
    if (function_exists('add_filter')) {
		add_filter('the_content', array($instance, 'twiki_table_postprocess'), 20);	
    }
}




?>

