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
    $id = $_GET['id'];
    $data['productions'] = get_one_production($id);
    // $production = get_one_production($id);
    // $data['productions' ] = $production;
    // $categories=get_list_categories();
    // $data['categories']= $categories;
    // // $data1['category'] = $categories;

    // if ($production) {
    //     load_view('index', $data);
    // } else {
    //     header('Location: /du_an_1_poly_hotel/?role=client');
    // }
    load_view('index', $data);
}
