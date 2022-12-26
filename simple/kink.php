<?php

function uploadImage($imgTmp, $imgFile)
{
    require "config.php";
    $toUpload = 1;
    $out = false;

    // Check if image file is a actual image or fake image
    $check = getimagesize($imgTmp);
    if ($check === false) {
        // $out = "An error occured - YOUR fault!";
        $toUpload = 0;
    }

    // Allow certain file formats
    if (!in_array($imgFile, $config["filetypes"])) {
        // $out = "Unsupported Image. Only JPG, JPEG, PNG, GIF and WEBP.";
        $toUpload = 0;
    }

    // Check if $toUpload is set to 0 by an error
    if ($toUpload == 1) {
        $out = true;
    }
    return $out;
}

function genUuid()
{
    return sprintf(
        '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0C2f) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0x2Aff),
        mt_rand(0, 0xffD3),
        mt_rand(0, 0xff4B)
    );
}

function formatBytes($size, $precision = 2)
{
    $base = log($size, 1024);
    $suffixes = array('', 'KB', 'MB', 'GB', 'TB');

    return "<b>" . round(pow(1024, $base - floor($base)), $precision) . "</b>" . $suffixes[floor($base)];
}
