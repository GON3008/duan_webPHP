<?php 

function get_list_categories() {
    $result = db_fetch_array("SELECT c.id, c.name, c.description, c.created_id, c.created_at, u.full_name, u.id as `uid` FROM `categories` c JOIN `users` u ON c.created_id = u.id");
    return $result;
}
function get_one_production($id) {
    $result = db_fetch_row("SELECT p.*,u.full_name as `full_name` FROM `productions` p JOIN `users` u ON p.created_id = u.id WHERE p.id = $id");
    return $result;
}
function get_list_bill() {
    $result = db_fetch_array("SELECT * FROM `bill`");
    return $result;
}
function get_list_bill_detail() {
    $result = db_fetch_array("SELECT * FROM `bill_details`");
    return $result;
}
function get_total_bill(){
    $result = db_fetch_row("SELECT COUNT(*) as total_orders FROM bill_details");
    return $result;
}
function get_list_comment(){
    $result = db_fetch_array("SELECT * FROM comments");
    return $result;
}
function get_total_comment(){
    $result = db_fetch_row("SELECT COUNT(*) as total_comments FROM comments");
    return $result;
}
function get_total_users(){
    $result = db_fetch_row("SELECT COUNT(*) as total_users FROM users");
    return $result;
}
function get_total_view(){
    $result = db_fetch_row("SELECT COUNT(*) as total_view FROM `productions` WHERE `views` > 0");
    return $result;
}
?>
