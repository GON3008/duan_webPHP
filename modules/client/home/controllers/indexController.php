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
    load_view('index', $data);
}
