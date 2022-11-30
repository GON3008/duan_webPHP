<?php include "./layout/client/header_client.php" ?>

<form action="" method="post">
    <h3>Thông tin đặt hàng</h3>

    <div class="formdathang">
        <div>
            <td>Người đặt hàng</td> <br>
            <td><input type="text" name="name"></td>
        </div>
        <div>
            <td>Địa chỉ</td><br>
            <td><input type="text" name="address"></td>
        </div>
        <div>
            <td>Email</td><br>
            <td><input type="text" name="email"></td>
        </div>
        <div>
            <td>Số điện thoại</td><br>
            <td><input type="text" name="tel"></td>
        </div>

    </div>
    <br>

   
    <style>
        .formdathang {
            margin-left: 200px;
        }

        .formdathang div {
            margin-top: 10px;
        }

        .formdathang input {
            width: 760px;
            height: 35px;
            border-radius: 5px;
            border: 1px solid gray;
        }

        .pt_thanhtoan {
            margin-left: 200px;
        }

        .pt_thanhtoan input {
            margin-top: 10px;
            /* margin-left: 10px; */
        }
    </style>


<div class="thongtinsanpham">
        <table>
            <tr>

                <th>Tên sản phẩm</th>
                <th>Hình</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
            <?php
            
              
            ?>
        </table>
    </div>

    <br>

    <div class="dongydathang">
        <input type="submit" value="Đồng ý đặt hàng" name="dongydathang">
        <input type="reset" value="Nhập lại" name="nhaplai">
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

    .dongydathang input:hover {
        background-color: white;
        color: black;
    }
</style>

<?php include "./layout/client/footer_client.php" ?>