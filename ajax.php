<?php

if (isset($_FILES['file']['name'])) {
    // file name
    $filename = $_FILES['file']['name'];

    // Location
    //    $location = 'upload/'.$filename;


    // file extension
    $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);

    // Valid extensions
    $valid_ext = array("pdf", "doc", "docx", "jpg", "png", "jpeg");
    $location;
    $response = 0;
    if (in_array($file_extension, $valid_ext)) {
        // Upload file
        //$filename =  rawurlencode($filename); hide this first
        $location = 'upload/' . $filename;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
            $response = 1;
        }
    }
    header('Content-Type: application/json');

    echo json_encode(array(
        "status" =>  $response,
        "url" => $location,
    ));
    exit;
}
