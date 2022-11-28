<?php

function construct() {
    load_model('index');
}

// function indexAction() {
//     load_view('index');
// }
// function indexAction() {
//     $data['productions'] = get_list_productions();
//     load_view('index', $data);
// }
function indexAction() {
    $data['productions'] = get_list_productions();
    $data['production']= lodall_sanpham_top10();
    $data['services'] = get_list_services();
<<<<<<< HEAD
    $data['categories'] = get_list_categories();
=======
>>>>>>> cb84fd13185f9e4d550588e7b74ef0b9e23a5f9b
    load_view('index', $data);
}
// function loadAction() {
//     // request_auth(true);
//     $data['services'] = get_list_services();
//     load_view('index', $data);
// }
