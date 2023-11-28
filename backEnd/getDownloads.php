<?php

require_once '../bootstrap.php';
Auth::auth();

include_once 'pdo.php';
$downloads = select("SELECT `ID`, `name`, `file_name`, `path`, `category`, `size`, `upload_date`, `uploader`, `active` FROM `uploads` WHERE `active` <= CURDATE() ORDER BY `category` ASC, `uploads`.`name` DESC;");
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
