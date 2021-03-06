--TEST--
Function overrideing test for strtotime
--SKIPIF--
<?php 
	extension_loaded('timecop') or die('skip timecop not available');
	$required_func = array("timecop_strtotime", "timecop_freeze", "strtotime", "timecop_orig_strtotime", "timecop_orig_date");
	foreach ($required_func as $func_name) {
		if (!function_exists($func_name)) {
			die("skip $func_name() function is not available.");
		}
	}
--INI--
date.timezone=America/Los_Angeles
--FILE--
<?php
timecop_freeze(timecop_strtotime("2012-02-29"));
var_dump(timecop_orig_date("Y-m-d", strtotime("+1 month")));
--EXPECT--
string(10) "2012-03-29"
