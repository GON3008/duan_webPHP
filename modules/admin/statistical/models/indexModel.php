<?php
function list_statistical(){
    $result = db_fetch_array("SELECT ");
    return $result;
}
function get_list_bill_detail() {
    $result = db_fetch_array("SELECT bd.*, p.name as `name` FROM `bill_details` bd INNER JOIN `productions` p ON bd.product_id = p.id");
    return $result;
}

function get_one_bill_detail($id) {
    $result = db_fetch_array("SELECT bd.*, p.name as `name` FROM `bill_details` bd INNER JOIN `productions` p ON bd.product_id = p.id where bd.id=$id");
    return $result;
}
?>