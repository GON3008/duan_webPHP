<?php

function construct() {
    load_model('index');
}


function indexAction() {
    $data['productions'] = get_list_productions();
    $data['production4'] =  lodall_sanpham();
    $data['production']= lodall_sanpham_top10();
    $data['services'] = get_list_services();
    $data['categories'] = get_list_categories();

    load_view('index', $data);
}

