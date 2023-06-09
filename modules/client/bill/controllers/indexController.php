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
            // $check_out_date = $_POST['check_out_date'];
            $production = get_one_production($id);

            $data['productions'] = $production;
            if (!isset($_SESSION['cart'])) {
                  $_SESSION['cart'] = [];
            }
            
            $production['order_quantity'] = $order_quantity;
            // $production['check_out_date'] = $check_out_date;
            // echo "<pre>";
            //       var_dump(  $_SESSION['cart']);die();
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


function insertBillPostAction()
{
      require_once "./mail/index.php";

      $full_name = $_POST['full_name'];
      $addressMail = $_POST['email'];
      $numberphone = $_POST['numberphone'];
      $address = $_POST['address'];
      $created_id = $_SESSION['auth']['id'];
     
      $bill = get_list_bill();
      $check = false;
      foreach ($bill as $item) {
            if ($item['created_id'] == $created_id) {
                  $check = true;
                  break;
            }
      }
      if ($check == false) {
            insert_bill(["created_id" => $created_id]);
      }

      $check2 = false;
      $bill_detail = get_list_bill_detail();
      // echo "<pre>";
      // var_dump($_SESSION['cart']);
      // var_dump($bill_detail);
      // die();
      $get_one_bill = get_one_bill($_SESSION['auth']['id']);
      foreach ($_SESSION['cart'] as $cart) {
            $price=$cart['order_quantity']*$cart['price'] ;
            
            // var_dump($price);
            // die();
           
            if ($check2 == false || count($bill_detail) == 0) {
                  insert_bill_detail([
                        "bill_id" =>  $get_one_bill['id'],
                        "product_id" => $cart['id'],
                        "full_name" => $full_name,
                        "email" => $addressMail,
                        "numberphone" => $numberphone,
                        "address" => $address,
                        "total_money" => $price,
                        "order_quantity" => $cart['order_quantity']


                  ]);

                  $title = "Thông báo dịch vụ đặt phòng tại Poly's Hotel";
                  $content = "<p>Xin chào,<b>$full_name</b></p>
                              <p>Cảm ơn <b>$full_name</b> đã sử dụng dịch vụ khách sạn của chúng tôi - khách sạn Poly's Hotel.</p>
                              
                              <p>Như lời yêu cầu, chúng tôi đã đặt phòng cho <b>$full_name</b> với tên phòng là ".$cart['name']." từ ngày ".$cart['check_in_date']." đến ngày ".$cart['check_out_date'].".
                              Tổng tiền là: $$price.
                              </p>
                              
                              <p>Chúng tôi rất mong đợi chuyếnn thăm của <b>$full_name</b></p>
                              
                              Trân trọng.
                              

                  ";
                  GuiMail($title, $content, $addressMail);
                  //push_notification('danger', ['Đặt phòng thành công']);

                  // header('location:/du_an_1_poly_hotel/?role=client&mod=bill&action=index');
                  header("Refresh: 0.1; URL=/MiuStore/?role=client&mod=bill&action=index");
                  echo "<script> alert('Đặt phòng ".$cart['name']." thành công!!!') </script>";
            } else {
                  $check2 = false;
                  echo "<script> alert('Phòng ".$cart['name']." không thể đặt. Do có người đặt trước đó rồi!!!') </script>";
                  header("Refresh: 0.5; URL=/MiuStore/?role=client&mod=bill&action=index");
            }
      }
      unset($_SESSION['cart']);
}

function listAction()
{
      if (is_auth()) {
            $created_id = $_SESSION['auth']['id'];
            $data['bill_details'] = get_bill_detail_by_id($created_id);
            load_view('list', $data);
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


     
      header('location:/MiuStore/?role=client&mod=bill&action=index');
 

}
// function show_total_order(){
//       $data['bill_details'] = get_list_bill_detail();
//       $orders_num = get_total_bill_id();
//       if(isset($orders_num['num_orders'])){
//             $data['num_orders'] = $orders_num['num_orders'];
//       }else{
//             $data['num_orders']= 0;
//       }
//       load_view('total_bil_id', $data);
// }
function show_total_order() {
      $data['bill_details'] = get_list_bill_detail();
      $orders_num = get_total_bill_id();
      if (isset($orders_num['num_orders'])) {
          $data['num_orders'] = $orders_num['num_orders'];
      } else {
          $data['num_orders'] = 0;
      }
      load_view('total_bil_id', $data);
  }
  

