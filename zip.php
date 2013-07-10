<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('memory_limit', '64M');
set_time_limit(1800);

$source='.';
$dest="complete_backup";

/* use:
	yoursite.com/zip.php?f={folder you want to back up}
	if you don't specify folder it will compress enclosing folder into 'complete_backup.zip'
*/

if (isset($_GET['f'])){
	$source=$_GET['f'];
	$dest=$source;
}

$dest = $dest . '.zip';
$dest_url=dirname($_SERVER['REQUEST_URI']) . $dest;
echo '<html><head><title>php-zipper</title></head><body>';
echo "Compressing the ".$source." folder...</br>\n";
flush();
exec('zip -r '.escapeshellarg($dest).' '.$source, $results, $return);

if ((int) $return <= 1){
	echo 'Success! file available at: <a href="' .  $dest_url . '">' . $dest_url . "</a>\n";
} else {
	echo 'There was a problem creating the zip file: '.print_r($results, true)."<br />\n";
}

echo '</body></html>';
?>