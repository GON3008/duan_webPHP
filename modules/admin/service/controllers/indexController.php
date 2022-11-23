<?php 
function construct() {
    request_auth();
    load_model('index');
}

function indexAction() {
    $data['services'] = get_list_services();
    load_view('index', $data);
}
function createAction(){
    load_view("create");
}

?>