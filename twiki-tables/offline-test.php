<?php

if (!function_exists('__')) { function __($msg) { return $msg; } }
if (!function_exists('plugin_basename')) { function plugin_basename($msg) { return $msg; } }

include('twiki-tables.php');

$str = <<<'TEST'
[twiki] 
| Name | Product Name | Location SVN | Module | Target | Runtime URL (optional) | 
| *grd_itasc_sys_monitor* | *FedexCustomFunctions* | /svn/repos/grd_itasc_sys_monitor_dash/trunk/FedexCustomFunctions | _fedex-custom-functions-1.0.jar_ | BE | N/A | 
| _grd_srp_dashboard_ | *srp-dashboard* | /svn/repos/grd_sat_rpt/trunk/srp-dashboard | __???.jar__ | WLS | /rdLogon2.jsp | 


__Bold italic__
_Italic_

_Italic with spaces_

*Anders*

*Andre Bananaman*

*Andre=Wand*

<pre>
<?xml version="1.0" encoding="UTF-8"?>
<project xmlns="http://maven.apache.org/POM/4.0.0"
  xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
  xsi:schemaLocation="http://maven.apache.org/POM/4.0.0 http://maven.apache.org/maven-v4_0_0.xsd">
  <modelVersion>4.0.0</modelVersion>
  <groupId>com.fedex.ground.fusion</groupId>
	<artifactId>fxgFusion</artifactId>
	<packaging>jar</packaging>
  <parent>
         <groupId>com.fedex.enterprise</groupId>
       <artifactId>dev-framework</artifactId>
       <version>3.0.0</version>
  </parent>
	<version>${label}</version>
	<name>Ground Shipment Fusion - [Ground Fusion build]</name>
</pre>

<h2>Content Manifest</h2>

[twiki]
| Item | 3.0.0 (md5) | 3.1.0 (md5) | 3.2.0 (md5) | 
| (lib/cdspropertyinterface.jar###)            | <a class="tt" href="#">3.0.0  <span class="tooltip">c422e99f6dd49f64f593d0fb6f8b4b9a</span></a> | <a class="tt" href="#">3.0.0  <span class="tooltip">5cdfa1f0b44a96b5fc976ef2bc46219e</span></a> | <a class="tt" href="#">3.2.0  <span class="tooltip">b5e06d154cf58e2bd1b337c68d49e255</span></a>| (lib/cdspropertyinterface.jar) | 
| (lib/commons-codec-1.3.jar)                  | <a class="tt" href="#">1.3    <span class="tooltip">8e149c1053741c03736a52df83974dcc</span></a> | <a class="tt" href="#">1.3    <span class="tooltip">8e149c1053741c03736a52df83974dcc</span></a> | <a class="tt" href="#">1.3    <span class="tooltip">8e149c1053741c03736a52df83974dcc</span></a>| (lib/commons-codec-1.3.jar) | 
| (lib/commons-logging.jar)                    | <a class="tt" href="#">1.1    <span class="tooltip">6b62417e77b000a87de66ee3935edbf5</span></a> | <a class="tt" href="#">1.1    <span class="tooltip">6b62417e77b000a87de66ee3935edbf5</span></a> | <a class="tt" href="#">1.1    <span class="tooltip">6b62417e77b000a87de66ee3935edbf5</span></a>| (lib/commons-logging.jar) | 
| (lib/CommonServiceRuntime.jar)               | <a class="tt" href="#">3.0.0  <span class="tooltip">1857fb19b5e1eca7fb292d0eacc61eb8</span></a> | <a class="tt" href="#">3.1.0  <span class="tooltip">9b843e8b464c14549def626fe1605ccf</span></a> | <a class="tt" href="#">3.2.0  <span class="tooltip">399933b0e25b924d4008ba0c4d7aeddc</span></a>| (lib/CommonServiceRuntime.jar) | 
| (lib/css.jar)                                | <a class="tt" href="#">3.0.0  <span class="tooltip">d19e833832b1d7ea54f7e136c4b081ee</span></a> | <a class="tt" href="#">3.1.0  <span class="tooltip">b422c057cb9e57c48e1e5717b84beb98</span></a> | <a class="tt" href="#">3.2.0  <span class="tooltip">2605b51006d25b56506747a326480995</span></a>| (lib/css.jar) | 
[/twiki]


[twiki]

[[http://unabletoremember.blogspot.com][Andre]]

[/twiki]


[twiki]
| Item | 3.0.0 (md5) | 3.1.0 (md5) | 3.2.0 (md5) | 
| (lib/cdspropertyinterface.jar###)            | <a class="tt" href="#">3.0.0  <span class="tooltip">c422e99f6dd49f64f593d0fb6f8b4b9a</span></a> | <a class="tt" href="#">3.0.0  <span class="tooltip">5cdfa1f0b44a96b5fc976ef2bc46219e</span></a> | <a class="tt" href="#">3.2.0  <span class="tooltip">b5e06d154cf58e2bd1b337c68d49e255</span></a>| (lib/cdspropertyinterface.jar) | 
| (lib/commons-codec-1.3.jar)                  | <a class="tt" href="#">1.3    <span class="tooltip">8e149c1053741c03736a52df83974dcc</span></a> | <a class="tt" href="#">1.3    <span class="tooltip">8e149c1053741c03736a52df83974dcc</span></a> | <a class="tt" href="#">1.3    <span class="tooltip">8e149c1053741c03736a52df83974dcc</span></a>| (lib/commons-codec-1.3.jar) | 
| (lib/commons-logging.jar)                    | <a class="tt" href="#">1.1    <span class="tooltip">6b62417e77b000a87de66ee3935edbf5</span></a> | <a class="tt" href="#">1.1    <span class="tooltip">6b62417e77b000a87de66ee3935edbf5</span></a> | <a class="tt" href="#">1.1    <span class="tooltip">6b62417e77b000a87de66ee3935edbf5</span></a>| (lib/commons-logging.jar) | 
| (lib/CommonServiceRuntime.jar)               | <a class="tt" href="#">3.0.0  <span class="tooltip">1857fb19b5e1eca7fb292d0eacc61eb8</span></a> | <a class="tt" href="#">3.1.0  <span class="tooltip">9b843e8b464c14549def626fe1605ccf</span></a> | <a class="tt" href="#">3.2.0  <span class="tooltip">399933b0e25b924d4008ba0c4d7aeddc</span></a>| (lib/CommonServiceRuntime.jar) | 
[/twiki]

TEST;


#echo "{$str}";
$out=$instance->twiki_table_postprocess($str);
echo "$out";
?>