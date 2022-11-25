<?php
function get_one_production($id) {
    $result = db_fetch_row("SELECT p.*,u.full_name as `full_name` FROM `productions` p JOIN `users` u ON p.created_id = u.id WHERE p.id = $id");
    return $result;
}
function get_list_categories() {
    $result = db_fetch_array("SELECT * FROM `categories`");
    return $result;
}
// function get_one_production_cl($id,$category_id) {
//     // $result = db_fetch_array("SELECT p.*,u.full_name as `full_name` FROM `productions` p JOIN `categories` u ON p.category_id = u.id WHERE u.category_id= $category_id AND p.id <> $id");
    
//     $result=db_fetch_array("select * from  productions where category_id=".$category_id." AND id<>" .$id);
//     return $result;
// }

function get_list_pro_by_catid($cat)
{
    $result=  db_fetch_array("select * from  productions where category_id=$cat");
    return $result;

}