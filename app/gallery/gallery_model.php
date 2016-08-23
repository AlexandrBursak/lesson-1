<?php

function gallery_index ($page) {
    do_default_model($page);
    $content = getPageContent();

    $messages = getMessages();

    $curr_page = 1;
    if (isset($_GET) && isset($_GET['cPag'])) {
        $curr_page = $_GET['cPag'];
    }

    $sql = "SELECT * FROM forms WHERE `group` = 'gallery' ORDER BY field ASC";
    $form_content = DB_get_all($sql);
    if (!empty($form_content)) {
        $action = 'gallery.html';
        $content = parseForm($content, $form_content, $action);
    }

    $sql = "SELECT * FROM pictures WHERE `group` = 'gallery' ORDER BY id DESC";
    $gallery_data = DB_get_all($sql);
    if (isset($messages)) {
        $content = parseMessages($content, $messages);
    }
    if (!empty($gallery_data) && is_array($gallery_data)) {
        $count = count($gallery_data);

        $pagination = '<ul class="pagination">';
        for ($i=0, $j=1; $i < $count; $i+=PICTURES_PER_PAGE, $j++) {
            if ($j == $curr_page) {
                $pagination .= '<li class="active"><span>' . $j . '</span></li>';
            } else {
                $pagination .= '<li><a href="?cPag=' . $j . '">' . $j . '</a></li>';
            }
        }
        $pagination.='</ul>';

        $start = ($curr_page - 1) * PICTURES_PER_PAGE; // 0
        $end = $count > ($curr_page*PICTURES_PER_PAGE) ? $curr_page*PICTURES_PER_PAGE : $count; // 4

        $content = parseAdditional($content, '<div class="row">');
        for ($i = $start; $i < $end; $i++) {
            $parse = explode('.', $gallery_data[$i]['file_name']);
            $content_gallery = '<div class="col-sm-6">
            <h3>'.$gallery_data[$i]['title'].'</h3>
            <img src="img-'.$parse[0].'-extension-'.$parse[1].'?rand='.rand(1000,9999).'" width="300" class="img-thumbnail img-responsive" />
        </div>';
            if ($i!=0 && $i%2) {
                $content_gallery .= '<div class="clearfix"></div>';
            }
            $content = parseAdditional($content, $content_gallery);
        }
        $content = parseAdditional($content, '</div>');
        $content = parseAdditional($content, $pagination);

    }

    return $content;
}

function gallery_upload ($page) {
    global $phpFileUploadErrors;
    global $redirect;

    $message = '';
    if ($_FILES['file']['error'] == 0) {
        $file_destination = CORE_DIR.'upload/'.$_FILES['file']['name'];
        if (move_uploaded_file($_FILES['file']['tmp_name'], $file_destination)) {
            if (isset($_POST['title'])) {
                $sql = "INSERT INTO pictures
                        SET `group` = 'gallery',
                            title = '{$_POST['title']}',
                            file_name = '{$_FILES['file']['name']}',
                            path = 'upload/',
                            `date` = NOW()";
                $id = DB_insert($sql);
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

    saveMessage($message);

    $redirect = 'gallery.html';
    return;
}