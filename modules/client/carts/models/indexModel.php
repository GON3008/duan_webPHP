<?php  
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
function get_one_bill($created_id){
    $result=db_fetch_row("SELECT * FROM `bill` where created_id=$created_id");
    return $result;

}

?>
