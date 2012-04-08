<?php

$path = 'upload/' . $_GET['qqfile'];

$input = fopen("php://input", "r");
$temp = tmpfile();
$realSize = stream_copy_to_stream($input, $temp);
fclose($input);

// Prevent Duplicates
// if (file_exists($path)) {
	// $result = array('success' => false);
	// echo json_encode($result);
// }

$target = fopen($path, "w");        
fseek($temp, 0, SEEK_SET);
stream_copy_to_stream($temp, $target);
fclose($target);

$result = array('success' => true);
echo json_encode($result);