<?php

function construct()
{
      load_model('index');
}

function indexAction()
{
      if (is_auth()) {
            $notifications = get_notification();
            load_view('index', [
                  "notifications" => $notifications
            ]);
      } else {
            header('location:/MiuStore/?role=client&mod=auth');
      }
}

    function indexPostAction()
    {
          if (is_auth()) {
                $id = $_POST['id'];
                $order_quantity = $_POST['order_quantity'];
                $production = get_one_production($id);
                
                $data['productions'] = $production;
                if (!isset($_SESSION['cart'])) {
                      $_SESSION['cart'] = [];
                }
                $production['order_quantity'] = $order_quantity;
                $check = false;
                foreach ($_SESSION['cart'] as $key => $value) {
                      if ($production['id'] == $value['id']) {
                            $check = true;
                            break;
                      }
                }
                if ($check) {
                      echo "<script> alert('Sản phẩm đã được tồn tại trong giỏ hàng.Vui lòng vào giỏ hàng để hoàn thành các bước thanh toán!!!') </script>";
                      header("Refresh: 0.5; URL=/MiuStore/?role=client&mod=product_details&action=index&id=$id");
                      //header("Refresh: 0.5; URL=/du_an_1_poly_hotel/?role=client&mod=bill&action=index");
                     
                      die();
                } else {
                      $_SESSION['cart'][] = $production;
                }
    
                load_view('index');
          } else {
                header('location:/MiuStore/?role=client&mod=auth');
          }
    }

 

    
function deleteAction()
{
      if (isset($_GET['id'])) {
           unset($_SESSION['cart'][$_GET['id']]);
        } else {
            $_SESSION['cart'] = [];
        }


     
      header('location:/MiuStore/?role=client&mod=carts&action=index');
 

}

function plusAction()
{
      $_SESSION['cart'][$_GET['id']]['order_quantity'] += 1;
      header('location:/MiuStore/?role=client&mod=carts&action=index');
}
function minosAction()
{
      if ($_SESSION['cart'][$_GET['id']]['order_quantity'] == 0) {
            header('location:/MiuStore/?role=client&mod=carts&action=index');
      } else {
            $_SESSION['cart'][$_GET['id']]['order_quantity'] -= 1;
            header('location:/MiuStore/?role=client&mod=carts&action=index');
      }
}




 