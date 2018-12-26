<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Download the file</title>
</head>

<body>
<?php
$file = './uploads/'.$_GET['filename'];
$filename = $_GET['filename'];

header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="' . $filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($file));
header('Accept-Ranges: bytes');

@readfile($file);
?>
</body>
</html>