<?php require "layout/client/header_client.php" ?>
<div class="user">
    <div class="user1">
        <div class="item1">
            <img src="public/image/user.png" alt="" style="width:200px; margin-left:10px;">
            <p style="margin-left:5px;"><?= $_SESSION["auth"]['full_name']  ?></p>
        </div>
        <div class="item2">
            <?php
            if (($_SESSION['auth']['role']) == 2) { ?>
                <a href="/MiuStore/?role=admin">Đăng nhập trang quản trị</a>
            <?php } ?>

        </div>
        <div class="item3">
            <a href="/MiuStore/?role=client&mod=bill&action=index">Đặt hàng</a>
        </div>
        <div class="item3">
            <a href="/MiuStore/?role=client&mod=bill&action=list">Danh sách đặt hàng</a>
        </div>
        <div class="item4">
            <a href="">Danh sách yêu thích</a>
        </div>
        <div class="item2">
            <a href="/MiuStore/?role=client&mod=auth&action=forgotPassword">Quên mật khẩu</a>
        </div>
        <div class="item5">
            <a href="/MiuStore/?role=client&mod=auth&action=logout">Đăng xuất</a>
        </div>
    </div>

    <div class="use2">
        <p style="font-size:25px;color:red;text-align:center;">DANH SÁCH ĐẶT HÀNG</p>
        <form action="" method="post" class="w3-container">
            <div class="row">

                <table class="table">
                    <thead>
                        <th>Mã hóa đơn</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt hàng</th>
                    </thead>
                    <tbody>
                        <?php foreach ($bill_details as $value) {
                            echo '
                                    <tr> 
                                    <td>' . $value['id'] . '</td>
                                    <td>' . $value['name'] . '</td>
                                    <td>' . $value['order_quantity'] . '</td>
                                    <td>' . $value['price'] . '</td>
                                    <td>' . $value['created_at'] . '</td>
                                    <td> <button>Xóa</button> </td>
                                    </tr>
                                    
                                    ';
                        }



                        ?>
                    </tbody>
                </table>

            </div>
        </form>

    </div>
</div>



<?php require "layout/client/footer_client.php" ?>