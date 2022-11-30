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
    $data['production4'] =  lodall_sanpham();
    $data['production']= lodall_sanpham_top10();
    $data['services'] = get_list_services();
    load_view('index', $data);
}
// function loadAction() {
//     // request_auth(true);
//     $data['services'] = get_list_services();
//     load_view('index', $data);
// }
