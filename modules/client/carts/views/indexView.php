<?php require "layout/client/header_client.php" ?>
<form action="/MiuStore/?role=client&mod=carts&action=insertBill" method="post">
    <h3>Giỏ hàng của tôi</h3>
    <hr>
<div class="thongtinsanpham">
        <table>
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th><a href="/MiuStore/?role=client&mod=carts&action=delete" class="">Xoá tất cả</a></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_cart = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $item) {
                        $price = $item['order_quantity'] * $item['price'];
                        $total_cart += $item['order_quantity'] * $item['price'];

                        echo '
                        <tr>
                            <td>' . $item['name'] . '</td>
                            <td><img src="' . $item['image'] . '" width="50"></td>
                          
                            <td>
                            <a href="/MiuStore/?role=client&mod=carts&action=plus&id=' . $key . '"> <image style="width:18px; margin-right:20px" src="public/image/plus (1).png" ></a>
                            ' . $item['order_quantity'] . '
                           <a href="/MiuStore/?role=client&mod=carts&action=minos&id=' . $key . '"> <image style="width:18px; margin-left:20px" src="public/image/minus.png" </a>
                              </td>
                            <td>$' . $price . '</td>

                            <td><a href="/MiuStore/?role=client&mod=carts&action=delete&id=' . $key . '">Xóa  </a>  </td>
                        </tr>
                        
                        ';
                    }
                }
                ?>

            </tbody>

        </table>
    </div>

    <br>
    <div class="d-flex justify-content-between">
    <h2>Tổng tiền: <?= $total_cart ?> VND</h2>
    

    <div class="dongydathang">
       <a href="/MiuStore/?role=client&mod=bill&action=index">Thanh toán</a>
        <input type="reset" value="Nhập lại" name="nhaplai">
    </div>
    
    </div>
</form>

<style>
    h3 {
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
        font-size: 25px;
    }

    table {
        width: 100%;
        text-align: center;
        border-collapse: collapse;

    }

    table,
    td,
    th {
        border: 1px solid black;
    }

    th {
        padding: 15px;
    }

    .dongydathang input {
        width: 150px;
        height: 35px;
        border-radius: 5px;
        border: 1px solid gray;
        float: right;
        margin-left: 10px;
        background-color: black;
        color: white;
    }

    .dongydathang a {
        width: 150px;
        height: 35px;
        border-radius: 5px;
        border: 1px solid gray;
        float: right;
        margin-left: 10px;
        background-color: black;
        color: white;
        text-decoration: none;
        text-align: center;
        padding-top: 6px;
    }

    .dongydathang input:hover {
        background-color: white;
        color: black;
    }
    .dongydathang a:hover {
        background-color: white;
        color: black;
    }
</style>


<?php include "./layout/client/footer_client.php" ?>