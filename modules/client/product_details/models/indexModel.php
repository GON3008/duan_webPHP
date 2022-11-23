<?php

function get_one_production($id) {
    $result = db_fetch_row("SELECT p.*,u.full_name as `full_name` FROM `productions` p JOIN `users` u ON p.created_id = u.id WHERE p.id = $id");
    //$result = db_fetch_row("SELECT c.id, c.name, c.description, c.created_id, c.created_at, u.full_name, u.id as `uid` FROM `categories` c JOIN `users` u ON c.created_id = u.id WHERE c.id = $id");

    return $result;
}
function get_list_categories() {
    $result = db_fetch_array("SELECT * FROM `categories`");
    return $result;
}