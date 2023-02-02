<?php
include "function.php";
$obj = new Operations();
$categoryid = $_POST['category_id'];
$where = "WHERE category_id=$categoryid";
 $tags = $obj->getList('tags_tbl',$where);
$data['html'] = '';
       foreach($tags as $sub){
            $data['html'] .='<option value="'.$sub['id'].'">'.$sub['tags'].'</option>';
        }
echo json_encode($data);
?>