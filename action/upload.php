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
            $messages = '<div class="success">Thanks for your uploaded file!!!</div>';
        }
    } else {
        $messages = '<div class="error">File didn\'t move</div>';
    }
} else {
    $messages = '<div class="error">'.$phpFileUploadErrors[$_FILES['file']['error']].'</div>';
}

if ($messages) {
    $_SESSION['messages'] = $messages;
}

$redirect = 'gallery.html';