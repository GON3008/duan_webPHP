<?php

function construct() {
      load_model('index');
}


function indexAction() {
    $id = $_GET['id'];
    $data['productions'] = get_one_production($id);
    $data['comments'] =get_list_comments($id);
    load_view('index', $data);
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