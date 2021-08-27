<?php 
	include 'ftpClass.php';
	$ftp_obj = new Ftp();

	/* Try to upload */
	$uploaded = $ftp_obj->uploadFile("example.txt");
	echo "Upload executed with result ". $uploaded;

	/* Try to download */
	$downloaded = $ftp_obj->downloadFile("example.txt");
	echo "\nDownloaded executed with result ". $uploaded;
	
?>
