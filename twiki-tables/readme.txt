=== TWiki Tables ===
Contributors: visitbethel@gmail.com
Donate link: http://unabletoremember.blogspot.com/p/twiki-tables-for-wordpress.html
Tags: code, formatting, post body, content, display, writing, tables, twiki
Requires at least: 2.x
Tested up to: 2.8.2/3.1.4
Stable tag: 2.8.2
Version: 2.8.2

Rendering TWiki shorthand syntax for inline, inpage tables by WordPress (see http://twiki.org/cgi-bin/view/TWiki/TextFormattingRules#TheTable)

== Description ==
Table: 
Each row of the table is a line containing of one or more cells. Each cell starts and ends with a vertical bar '|'. Any spaces at the beginning of a line are ignored.
| *bold* | header cell with text in asterisks
|   center-aligned   | cell with at least two, and equal number of spaces on either side
|      right-aligned | cell with more spaces on the left
| 2 colspan || and multi-span columns with multiple |'s right next to each other
|^| cell with caret indicating follow-up row of multi-span rows
You can split rows over multiple lines by putting a backslash '\' at the end of each line
Contents of table cells wrap automatically as determined by the browser
Use %VBAR% or &#124; to add | characters in tables.
Use %CARET% or &#94; to add ^ characters in tables.
