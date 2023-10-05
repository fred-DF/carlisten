<?php

include_once 'auth.php';
if(json_decode(auth(), true)['response'] !== 'success') {
    include '../pages/403.php';
    header("HTTP/1.0 403 Forbidden");
    exit();
}

include_once 'pdo.php';
$downloads = select("SELECT `ID`, `name`, `file_name`, `path`, `category`, `size`, `upload_date`, `uploader`, `active` FROM `uploads` WHERE `active` <= CURDATE() ORDER BY `category`");
$json = array();
$current_category = '';
foreach ($downloads as $key => $value) {
  $category = $value['category'];
  if ($category != $current_category) {
    if (!empty($current_category)) {
      $json[count($json)-1]['uploads'] = $uploads;
    }
    $current_category = $category;
    $json[] = array('category' => $category);
    $uploads = array();
  }
  $uploads[] = $value;
}
if (!empty($current_category)) {
  $json[count($json)-1]['uploads'] = $uploads;
}
echo json_encode(array('downloads' => $json));
