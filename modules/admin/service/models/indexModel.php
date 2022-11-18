<?php
function get_list_services() {
    $result = db_fetch_array("SELECT s.id, s.name, s.description, s.created_id, s.created_at, u.full_name, u.id as `uid` FROM `service` s JOIN `users` u ON s.created_id = u.id");
    return $result;
}


?>