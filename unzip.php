<?php
error_reporting(E_ALL);
ini_set('memory_limit', '64M');
set_time_limit(1800);
$archive_name="content";
if (isset($_GET['f'])){
	$archive_name=$_GET['f'];
}
echo 'archive: '.escapeshellarg($archive_name.'.zip')."<br />\n";
exec('unzip -o '.escapeshellarg($archive_name.'.zip'), $results, $return);
echo ((int) $return <= 1) ? "OK" : "FAIL\n" . print_r($results, true);