<?php

function construct() {
      load_model('index');
}


function indexAction() {
    $id = $_GET['id'];
<<<<<<< HEAD
    
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

=======
    $data['productions'] = get_one_production($id);
    $data['comments'] =get_list_comments($id);
    load_view('index', $data);
>>>>>>> edc1b860d9289e1d2ef411d86bd37575c02f8d0d
}
function addCommentsPostAction(){
     request_auth(true);
    $product_id = $_GET["id"];
    $description = $_POST["description"];
    $created_id = $_SESSION["auth"]['id'];
    $created_at = date("Y-m-d H:i:s");
    $data = [
        'description' => $description,
        'product_id' => $product_id,
        'created_id' => $created_id,
        'created_at' => $created_at
    ];
  
    add_comments($data);
    header("location:/du_an_1_poly_hotel/?role=client&mod=product_details&action=index&id=${product_id}");

}