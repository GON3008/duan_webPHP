<?php 
function construct() {
    // request_auth();
    load_model('index');
}

function indexAction() {
    request_auth(true);
    $data['services'] = get_list_services();
    load_view('index', $data);
}
function createAction(){
    request_auth(true);
    load_view("create");
}
function saveCreatePostAction() {
    request_auth(true);   
    $name=$_POST['name'];
    $price=$_POST['price'];   
    $description=$_POST['description'];   
    $image=$_FILES['image']['name'];
    $target_dir = "./upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    create_services($name, $price, $description,$target_file);
    push_notification('success', ['Tạo mới dịch vụ thành công']);
    header('Location: /du_an_1_poly_hotel/?role=admin&mod=service');
}
function deleteAction() {
    request_auth(true);
    $id = $_GET['id_service'];
    delete_services($id);
    push_notification('success', ['Xoá dịch vụ thành công']);
    header('Location: /du_an_1_poly_hotel/?role=admin&mod=service');
}
function updateAction() {
    request_auth(true);

    $id = $_GET['id'];
    $service = get_one_services($id);
    $data['service'] = $service;
    if ($service) {
        load_view('update', $data);
    } else {
        header('Location: /du_an_1_poly_hotel/?role=admin&mod=service');
    }
}
function updatePostAction() {
    request_auth(true);

    $id = $_GET['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image=$_FILES['image']['name'];
    $target_dir = "./upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    if($_FILES["image"]["size"]!=0){
        $data=["id"=>$id, "description"=>$description, "name"=>$name, "price"=>$price, "image"=>$target_file];
        // update_production($id, $name, $description,$target_file,$count,$price,$categories);

    }else{
    //update_production($id, $name, $description,$target_file,$count,$price,$categories);
    $data=["id"=>$id, "description"=>$description, "name"=>$name, "price"=>$price];

    }
 update_services($data,$id);
 push_notification('success', ['Chỉnh sửa dịch vụ thành công']);
 header('Location: /du_an_1_poly_hotel/?role=admin&mod=service');
}
?>