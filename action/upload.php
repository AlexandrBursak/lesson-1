<?php

$messages = '';
if ($_FILES['file']['error'] == 0) {
    $file_destination = __DIR__.'/../upload/'.$_FILES['file']['name'];
    if (move_uploaded_file($_FILES['file']['tmp_name'], $file_destination)) {
        if (isset($_POST['title'])) {
            $info_file = array(
                'title' => $_POST['title'],
                'file_name' => $_FILES['file']['name']
            );
            setNewFileInGallery($info_file);
            $message = json_encode([
                'status' => 'success',
                'message' => 'Thanks for your uploaded file!!!'
            ]);
        }
    } else {
        $message = json_encode([
            'status' => 'error',
            'message' => 'File didn\'t move'
        ]);
    }
} else {
    $message = json_encode([
        'status' => 'error',
        'message' => $phpFileUploadErrors[$_FILES['file']['error']]
    ]);
}

if ($messages) {
    $_SESSION['messages'] = $messages;
}

$redirect = 'gallery.html';