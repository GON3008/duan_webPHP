
<!doctype html>
<html lang="en">

<head>
    <title>Trang chủ</title>

    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Bootstrao Icons-->
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <!--Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="public/css/swiper-bundle.min.css">
    <!--Link CSS-->
    <link rel="stylesheet" href="public/css/style.css">
</head>
  <style>
    .navbar {
    background-color: #F5F5F5 !important;
}
    .navbar li a{
        color: black !important;
    }
    .navbar li a:hover {
    color: #87CBB9 !important;
}
  </style>
<body>

    <!--Menu-->
    <nav style="" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href=""><img src="public/image/lg (1).png" class="" width="110"
                    alt=""></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars" style="color:#fdb913;"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul  class="navbar-nav mx-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/MiuStore/?role=client">Trang chủ<span class="sr-only">(current)</span></a>
                    </li>

                    

                    <li class="nav-item dropdown">
                        <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Chính sách
                        </a>
                        <div class="dropdown-menu bg-color" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" style="color:gray;" href="/MiuStore/?role=client&mod=Privacy_Policy&action=index">Chính sách bảo mật</a>
                            <a class="dropdown-item" style="color:gray;" href="/MiuStore/?role=client&mod=return_Policy&action=index">Chính sách đổi trả</a>
                            <a class="dropdown-item" style="color:gray;" href="/MiuStore/?role=client&mod=service_Policy&action=index">Chính sách dịch vụ</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a   class="nav-link" href="/MiuStore/?role=client&mod=news&action=index">Tin tức</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="/MiuStore/?role=client&mod=introduce&action=index">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="/MiuStore/?role=client&mod=contact&action=index">Liên hệ</a>
                    </li>
                </ul>
                <?php if(isset($_SESSION['auth'])){ ?>
                    <ul class="navbar-nav ml-auto">
                        <a style="margin: 0px 0px 0px 9px; margin-right: 10px" href="/MiuStore/?role=client&mod=carts&action=index">
                            <img width="40px" src="public/image/basket.png" alt="">
                         
                        </a>
                       <a href="" style="margin-right:10px;"><span class="rounded-circle"> <i class="fa-solid fa-heart" style="color:black; margin:7px 0px 0px 5px ; font-size:22px;"></i></span></a> 
                        <a href="/MiuStore/?role=client&mod=auth&action=infomation"><span class="rounded-circle pl-1"> <i style="color:black; font-size:22px; margin:5px 0px 0px 3px ;" class="fa-regular fa-user"></i></span></a>
                        
                    </ul>
                    <?php }else{ ?>
                        <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a  class="nav-link" href="/MiuStore/?role=client&mod=auth&action=sign_up">Đăng ký</a>
                    </li>
                    <li class="nav-item">
                        <a  class="nav-link" href="/MiuStore/?role=client&mod=auth">Đăng nhập</a>
                    </li>
                </ul>
                        <?php } ?>
               

                

            </div>
        </div>
    </nav>

    <!--End Menu--> 