<?php
header('Content-Type:text/html; charset=utf-8' );
require_once("PHPStream.php");

// read
$stream=new PHPStream();
$stream->BeginRead(PKEY);
$integer=$stream->Read("integer");
$number=$stream->Read("number");
$short=$stream->Read("short");
$str=$stream->Read("string");
$ok=$stream->EndRead();

if ($ok)
{
	$stream->BeginWrite(PKEY);
	$stream->WriteInt($integer);
	$stream->WriteFloat($number);
	$stream->WriteShort($short);
	$stream->WriteString($str);
	$stream->EndWrite();

	echo $stream->bytes;
}
else
{
	echo "error";
}

?>
