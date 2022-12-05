<?php

function construct()
{
    //    
    load_model('index');
}

function indexAction()
{
    //  request_auth(true);
    $notifications = get_notification();
    load_view('index', [
        "notifications" => $notifications
    ]);
}
function indexPostAction()
{
    // request_auth(true);
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

// function indexPostAction() {
//     // request_auth(true);
//     // validation
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     if (empty($email) || empty($password)) {
//         push_notification('danger', ['Vui lòng nhập đầy đủ thông tin tài khoản và mật khẩu']);
//         header('Location: /du_an_1_poly_hotel/?role=client&mod=auth');
//     }
//     // xử lý đăng nhập
//     $auth = get_auth_user($email, $password);
//     if ($auth && $auth['role'] == 1) {
//         push_auth($auth);
//         header('Location: /du_an_1_poly_hotel/?role=client');
//     } else {
//         push_notification('danger', ['Tài khoản hoặc mật khẩu không chính xác']);
//         header('Location: /du_an_1_poly_hotel/?role=client&mod=auth');
//     }
// }
function infomationAction()
{
    //request_auth(true);
    if (is_auth()) {
        load_view('infomation');
        header('Location:/du_an_1_poly_hotel/?role=client');
    }
}

function logoutAction()
{
    //request_auth(true);
    // session_unset();

    // header('Location: /du_an_1_poly_hotel/?role=client');

    if (is_auth()) {
        remove_auth();
        header('Location:/du_an_1_poly_hotel /?role=client');
    }
}
function sign_upAction()
{
    $notifications = get_notification();
    load_view('sign_up', [
        "notifications" => $notifications
    ]);
}
function saveSignUpPostAction()
{
    // $user = get_auth();
    // request_auth(true);
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nhaplaipassword = $_POST['nhaplaipassword'];
    $numberphone = $_POST['numberphone'];
    $gender = $_POST['gender'];
    if ($password === $nhaplaipassword && $gender != "") {
        $data = [
            "full_name" => $full_name, "email" => $email, "password" => $password,
            "numberphone" => $numberphone, "gender" => $gender
        ];
        insert_user($data);
        // echo "<script> alert('Đăng ký tài khoản thành công') </script>";
        push_notification('success', ['Đăng ký tài khoản thành công']);
        header('Location: /du_an_1_poly_hotel/?role=client&mod=auth&action=sign_up');
    } else if ($gender == "") {
        push_notification('danger', ['Vui lòng nhập giới tính']);
        header('Location: /du_an_1_poly_hotel/?role=client&mod=auth&action=sign_up');
    }
    // else if($email==$user['email']){
    //     push_notification('danger', ['Email đã tồn tại trong hệ thống']);
    //     header('Location: /du_an_1_poly_hotel/?role=client&mod=auth&action=sign_up');
    // } 
    
    else  {
        push_notification('danger', ['Vui lòng nhập lại mật khẩu']);
        header('Location: /du_an_1_poly_hotel/?role=client&mod=auth&action=sign_up');

        // echo "<script> alert('Mật khẩu không trùng nhau. Vui lòng nhập lại mật khẩu') </script>";


    }
}

function editAction()
{
    request_auth(true);

    $id = $_GET['id'];
    $item = get_user_by_id($id);
    $data['list_users'] = $item;
    load_view('edit', $data);
    $notifications = get_notification();
}
function saveEditPostAction()
{
    request_auth(true);
    $id = $_GET['id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];

    $numberphone = $_POST['numberphone'];
    $cmnd = $_POST['cmnd'];
    $data = ["full_name" => $full_name, "email" => $email, "numberphone" => $numberphone, "cmnd" => $cmnd];
    update_user($data, $id);
    // push_notification('success', ['Chỉnh sửa danh mục sản phẩm thành công']);
    header("location:/du_an_1_poly_hotel/?role=client&mod=auth&action=infomation");
    echo "<script> alert('Cập nhập tài khoản thành công. Đăng nhập lại để cập nhật dữ liệu') </script>";
}
function changePasswordAction()
{
    //request_auth(true);
    if (is_auth()) {
        $notifications = get_notification();
        load_view('changePassword', [
            "notifications" => $notifications
        ]);
    } else {
        header("location:/du_an_1_poly_hotel/?role=client&mod=auth");
    }
}
function saveChangePasswordPostAction()
{
    //request_auth(true);
    if (is_auth()) {
        global $conn;
        // $id=$_GET['id'];
        $email = $_POST['email'];
        $password_old = $_POST['password_old'];
        $password_new = $_POST['password_new'];
        // $item=get_auth_user($email, $password_old);
        $sql = "select * from users where email='$email' and password='$password_old' limit 1";
        $results = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($results);
        if ($count > 0) {
            $sql_update = mysqli_query($conn, "update users set email='$email' , password='$password_new' where email='$email' and password='$password_old'");
            echo "<script> alert('Đổi mật khẩu thành công!!!') </script>";
                  header("Refresh: 0.5; URL=/du_an_1_poly_hotel/?role=client&mod=auth&action=changePassword");
        } else {
            echo "<script> alert('Đổi mật khẩu không thành công!!!') </script>";
            header("Refresh: 0.5; URL=/du_an_1_poly_hotel/?role=client&mod=auth&action=changePassword");
        }
    } else {
        header("location:/du_an_1_poly_hotel/?role=client&mod=auth");
    }

    // $data=["email"=>$email, "password"=>$password_new];
    // update_user($data,$id); 
}

function forgotPasswordAction()
{
    //request_auth(true);

   

        $notifications = get_notification();
        load_view('forgotPassword', [
            "notifications" => $notifications
        ]);
    } 

function saveForgotPasswordPostAction()
{
    require_once "mail/index.php";
   
        //$id = $_GET['id'];
        $id=$_SESSION['auth']['id'];
        global $conn;
        $addressMail = $_POST['email'];
        $sql = mysqli_query($conn, "select * from users where email='$addressMail'");
        //$row=mysqli_fetch_array($sql);
        if ($_SESSION['auth']['email'] === $addressMail) {

            $code = substr(rand(0, 999999), 0, 6);
            $title = "Mật khẩu mới Poly's Hotel";
            $content = "Mật khẩu mới của bạn là: <p style='color:red;'>$code</p> Vui lòng không chia sẽ mã này với ai khác để tránh mất mật khẩu
            <br>
            Cảm ơn quý khách đã sử dụng dịch vụ của Poly's Hote!!! <br>
            Chúc quý khách một ngày tốt lành!!!
            ";
            GuiMail($title, $content, $addressMail);
            //$sql_update=mysqli_query($conn,"update users password='$code'");
            $data=["password"=>$code];
            update_user($data,$id);
            push_notification('success', ['Mật khẩu đã được gửi về mail của bạn']);
            header("location:/du_an_1_poly_hotel/?role=client&mod=auth&action=forgotPassword");
        } else {
            push_notification('success', ['Email không trùng khớp']);
            header("location:/du_an_1_poly_hotel/?role=client&mod=auth&action=forgotPassword");
        }
    } 

   


