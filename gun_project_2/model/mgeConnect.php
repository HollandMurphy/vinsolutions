<?php
// connect and login to FTP server
$ftp_username = "204160-GRANTCULVER";
$ftp_userpass = "7N835k957914";
$ftp_server = "ftp.mgegroup.com";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);


$file = "/ffldealer/vendorname_items.xml";

//get size of the file
$fsize = ftp_size($ftp_conn, $file);
$lastchanged = ftp_mdtm($ftp_conn, $file);
if($fsize != -1)
{
    echo "$file is $fsize bytes.";
    echo date("F d Y H:i:s.",$lastchanged);
    
}
else
{
    echo "error getting file size.";
}
// then do something...


$local_file="inventoryDownload.xml";
$server_file = "/ffldealer/vendorname_items_all.xml";

//download server file
if(ftp_get($ftp_conn, $local_file, $server_file, FTP_ASCII))
   {
    echo "Successfully written to $local_file";
    
   }
else
{
    echo "Error downloading $server_file.";
}

// close connection

ftp_close($ftp_conn); 


?>