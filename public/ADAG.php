<?php 
    try {
        $method = $_SERVER['REQUEST_METHOD'];
        echo $_SERVER['REQUEST_METHOD'];
        if ($method == 'GET') {
            include_once __DIR__ . '/../templates/adform.html.php';
        } else{
            $target_dir = "upload/";
            $target_file = $target_dir . basename($_FILES["locandina"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["locandina"]["tmp_name"], $target_file);
            $title = $_POST['titolo'];
            echo 'upload';
        }
    } catch (\PDOException $e) {
        $title = 'An error has occurred';
        $output = 'the operation was not successful: <br/>' . $e->getMessage() . ' in ' 
        . $e->getFile() . ': ' . $e->getLine();
    }
?>