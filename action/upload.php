<?php
include('../function.php');

if ($_FILES['file']['error'] == 0) {
    $file_destination = __DIR__.'/../upload/'.$_FILES['file']['name'];

    if (move_uploaded_file($_FILES['file']['tmp_name'], $file_destination)) {
        if (isset($_POST['title'])) {
            $info_file = array(
                'title' => $_POST['title'],
                'file_name' => $_FILES['file']['name']
            );
            setNewFileInGallery($info_file);
        }
    }

}
header('Location: /project_1/gallery.php');