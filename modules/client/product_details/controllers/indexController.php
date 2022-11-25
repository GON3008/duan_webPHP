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
    
    // $data['productions'] = get_one_production($id);
    $production = get_one_production($id);
    $cat=$production['category_id'];
    $pro_catid=get_list_pro_by_catid($cat);
    $data['pro_cat']=$pro_catid;
    $data['productions' ] = $production;
    $categories=get_list_categories();
    $data['categories']= $categories;
    // $data1['category'] = $categories;

    if ($production) {
        load_view('index', $data);
    } else {
        header('Location: /du_an_1_poly_hotel/?role=client');
    }
    // load_view('index', $data);
}
// function indexCategoryAction() {
//     $id = $_GET['id'];
   
//     $data['categories'] =  get_list_categories();
// }

function index_clAction() {
    // $id = $_GET['id'];
    // $category_id=$_GET['category_id'];
    $data['productions']  =  get_one_production_cl($id,$category_id);
    // $data['categories'] = get_one_production_cl($category_id);
    load_view('index', $data);

}
