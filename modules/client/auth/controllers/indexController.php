<?php

function construct() {
    // request_auth(true);
    load_model('index');
}

function indexAction() {
    $notifications = get_notification();
    load_view('index', [
        "notifications" => $notifications
    ]);
}


function indexPostAction() {
    // validation
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email) || empty($password)) {
        push_notification('danger', ['Vui lòng nhập đầy đủ thông tin tài khoản và mật khẩu']);
        header('Location: /du_an_1_poly_hotel/?role=client&mod=auth');
    }
    // xử lý đăng nhập
    $auth = get_auth_user($email, $password);
    if ($auth) {
        push_auth($auth);
        header('Location: /du_an_1_poly_hotel/?role=client');
    } else {
        push_notification('danger', ['Tài khoản hoặc mật khẩu không chính xác']);
        header('Location: /du_an_1_poly_hotel/?role=client&mod=auth');
    }
}
function infomationAction() {
    load_view('infomation');
}

function logoutAction(){
    session_unset();
    // unset($_SESSION['auth']);
    header('Location: /du_an_1_poly_hotel/?role=client');
}
function sign_upAction() {
    $notifications = get_notification();
    load_view('sign_up', [
        "notifications" => $notifications
    ]);
}
function saveSignUpPostAction(){
    $full_name=$_POST['full_name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $nhaplaipassword=$_POST['nhaplaipassword'];
    $numberphone=$_POST['numberphone'];
    $gender=$_POST['gender'];
    if($password===$nhaplaipassword && $gender != ""){
        $data=["full_name"=>$full_name, "email"=>$email,"password"=>$password,
        "numberphone"=>$numberphone, "gender"=>$gender];
        insert_user($data);
        // echo "<script> alert('Đăng ký tài khoản thành công') </script>";
        push_notification('success', ['Đăng ký tài khoản thành công']);
        header('Location: /du_an_1_poly_hotel/?role=client&mod=auth&action=sign_up');
    }else if($gender == ""){
        push_notification('danger', ['Vui lòng nhập giới tính']);
        header('Location: /du_an_1_poly_hotel/?role=client&mod=auth&action=sign_up');
    }
    else{
        push_notification('danger', ['Vui lòng nhập lại mật khẩu']);
        header('Location: /du_an_1_poly_hotel/?role=client&mod=auth&action=sign_up');

        // echo "<script> alert('Mật khẩu không trùng nhau. Vui lòng nhập lại mật khẩu') </script>";
       

    }
  
}

function editAction(){
    $id=$_GET['id'];
    $item=get_user_by_id($id);
    $data['list_users'] = $item;
    load_view('edit', $data);
    $notifications = get_notification();
   
}
function saveEditPostAction(){
    $id=$_GET['id'];
    $full_name=$_POST['full_name'];
    $email=$_POST['email'];
    $numberphone=$_POST['numberphone'];
    $cmnd=$_POST['cmnd'];
    $data=["full_name"=>$full_name, "email"=> $email, "numberphone"=>$numberphone, "cmnd"=>$cmnd];
    update_user($data,$id);
    // push_notification('success', ['Chỉnh sửa danh mục sản phẩm thành công']);
    header("location:/du_an_1_poly_hotel/?role=client&mod=auth&action=infomation");
    echo "<script> alert('Cập nhập tài khoản thành công. Đăng nhập lại để cập nhật dữ liệu') </script>";

}
function changePasswordAction(){
    $notifications = get_notification();
    load_view('changePassword', [
        "notifications" => $notifications
    ]);
}
function saveChangePasswordPostAction(){
    $id=$_GET['id'];
    $email=$_POST['email'];
    $password_old=$_POST['password_old'];
    $password_new=$_POST['password_new'];
    $nhaplai_password_new=$_POST['nhaplai_password_new'];
    $item=get_auth_user($email, $password_old);
    if($item>0){
        $data=["email"=>$email, "password"=>$password_new];
        update_user($data,$id);
    }
   
  
    
}