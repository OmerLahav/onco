<?php
$zip = new ZipArchive;
$res = $zip->open('ican_simon.zip');
if ($res === TRUE) {
  $zip->extractTo('/home/mediplus/domains/med.dev.webstorm.co.il/public_html/');
  $zip->close();
  echo 'done!';
} else {
  echo 'not done!';
}
?>