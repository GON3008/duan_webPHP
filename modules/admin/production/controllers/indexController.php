<?php

function construct() {
    request_auth();
    load_model('index');
}

function indexAction() {
    $data['productions'] = get_list_productions();
    load_view('index', $data);
}

function createAction() {
    $data['categories'] = get_list_categories();
    load_view('create', $data);
    load_view('create');
    
}
// function createAction() {
//     $data['categories'] = get_list_categories();
//     load_view('create', $data);
// }

// function createPostAction() {
//     $name = $_POST['name'];
//     $description = $_POST['description'];
//     if (empty($name)) {
//         push_notification('danger', ['Vui lòng nhập vào tên danh mục']);
//         header('Location: /?role=admin&mod=category&action=create');
//         die();
//     }
//     create_category($name, $description);
//     push_notification('success', ['Tạo mới danh mục sản phẩm thành công']);
//     header('Location: /?role=admin&mod=category');
// }



function saveCreatePostAction() {
    $categories=$_POST['category_id'];
    $name=$_POST['name'];
    $count=$_POST['count'];
    $price=$_POST['price'];   
    $description=$_POST['description'];   
    $image=$_FILES['image']['name'];
    $target_dir = "./upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    // $age=$_GET['age'];
    // $earn=$_GET['earn'];
    // $data=["category_id"=>$categories,"name"=>$name,"count"=>$count,"price"=>$price,"description"=>$description,"image"=>$target_file];
    create_production($name, $description,$target_file,$count,$price,$categories);
    push_notification('success', ['Tạo mới sản phẩm thành công']);
    header('Location: /du_an_1_poly_hotel/?role=admin&mod=production');
}

function deleteAction() {
    $id = $_GET['id_prod'];
    delete_production($id);
    push_notification('success', ['Xoá phòng thành công']);
    header('Location: /du_an_1_poly_hotel/?role=admin&mod=production');
}

function updateAction()
{
    $id = $_GET['id_prod'];
    // $categories= get_one_category($id);
    $production = get_one_production($id);
    $data['production'] = $production;
    // $data1['category'] = $categories;

    if ($production) {
        load_view('update', $data);
    } else {
        header('Location: /du_an_1_poly_hotel/?role=admin&mod=production');
    }
}

function updatePostAction() {
    $id = $_GET['id_prod'];
    $production = get_one_production($id);
    if (!$production) {
        header('Location: /du_an_1_poly_hotel/?role=admin&mod=production');
        die();
    }
    $categories=$_POST['category_id'];
    $name=$_POST['name'];
    $count=$_POST['count'];
    $price=$_POST['price'];   
    $description=$_POST['description'];   
    $image=$_FILES['image']['name'];
    $target_dir = "./upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    
    update_production($id, $name, $description,$target_file,$count,$price,$categories);
    push_notification('success', ['Chỉnh sửa phòng thành công']);
    header('Location: /du_an_1_poly_hotel/?role=admin&mod=production');
}
