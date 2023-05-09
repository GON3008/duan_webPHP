<?php include "./layout/client/header_client.php" ?>

<form action="/MiuStore/?role=client&mod=bill&action=insertBill" method="post">
    <h3>Thông tin đặt hàng</h3>

    <div class="container">
    <div class="card-body">
        <div class="row">
            <div class="col col-6 mt-3">
                <div class="form-group">
                    <label>Tên người đặt hàng</label>
                    <div class="input-group">
                        <input type="text" name="full_name" class="form-control" placeholder="Tên người đặt hàng" aria-describedby="basic-addon2" />
                    </div>
                </div>
            </div>
            <div class="col col-6 mt-3">
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                        <input type="text" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon2" />
                        <!-- <div class="input-group-append"><span class="input-group-text">VND</span></div> -->
                    </div>
                </div>
            </div>
            <div class="col col-6 mt-3">
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <div class="input-group">
                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ" aria-describedby="basic-addon2" />
                        <!-- <div class="input-group-append"><span class="input-group-text">VND</span></div> -->
                    </div>
                </div>
            </div>
            <div class="col col-6 mt-3">
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <div class="input-group">
                        <input type="text" name="numberphone" class="form-control" placeholder="Tên người đặt hàng" aria-describedby="basic-addon2" />
                        <!-- <div class="input-group-append"><span class="input-group-text">VND</span></div> -->
                    </div>
                </div>
            </div>
        </div>
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
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Hình</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th><a href="/MiuStore/?role=client&mod=bill&action=delete" class="">Xoá tất cả</a></th>
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
                          
                            <td>' . $item['order_quantity'] . '</td>
                            <td>$' . $price . '</td>

                            <td><a href="/MiuStore/?role=client&mod=bill&action=delete&id=' . $key . '">Xóa  </a>  </td>
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
        <input type="submit" value="Đồng ý đặt hàng" name="dongydathang">
        <input type="reset" value="Nhập lại" name="nhaplai">
    </div>
    </div>


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
<div class="container">
  <div class="py-5 text-center">
    
    <h2>Checkout form</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap 5 form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Giỏ Hàng Của Bạn</span>
        <span class="badge badge-secondary badge-pill">3</span>
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Tên sản phẩm</h6>
            <?php
            foreach ($_SESSION['cart'] as $key => $item) {
              echo "<div> <p class='text-muted p-3'>{$item['name']}</p> </div>";
            }
            if (empty($_SESSION['cart'])) {
              echo "<p class='text-muted p-3'>Chưa có sản phẩm nào.</p>";
            }
            ?>

          </div>
            <div>
          <span style="margin-left:20px;" class="text-muted ml-6">Thành tiền</span>
          <?php  foreach ($_SESSION['cart'] as $key => $item): ?>
          <?php $price = $item['order_quantity'] * $item['price']; ?>
          <p class="p-3"><?= $price ?> VND</p>
          <?php endforeach; ?>
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0">Phí giao hàng</h6>
            <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label text-muted" for="flexCheckDefault">
   Miễn phí giao hàng
  </label>
</div>
          </div>
          <?php $ship=500000 ?>
          <span class="text-muted"><?= $ship ?> VND</span>
        </li>
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Phiếu khuyến mãi</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">0%</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Tổng tiền (VND)</span>
          <strong><?= $total_cart ?> VND</strong>
        </li>
      </ul>

      <form class="card p-2" action="/MiuStore/?role=client&mod=bill&action=insertBill" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Promo code">
          <div class="input-group-append">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Thông Tin Đặt Hàng</h4>
      <form class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="username">Username</label>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">@</span>
            </div>
            <input type="text" class="form-control" id="username" placeholder="Username" required>
            <div class="invalid-feedback" style="width: 100%;">
              Your username is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" id="email" placeholder="you@example.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" id="state" required>
              <option value="">Choose...</option>
              <option>California</option>
            </select>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" placeholder="" required>
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address">
          <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Save this information for next time</label>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Credit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Debit card</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">PayPal</label>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="cc-name">Name on card</label>
            <input type="text" class="form-control" id="cc-name" placeholder="" required>
            <small class="text-muted">Full name as displayed on card</small>
            <div class="invalid-feedback">
              Name on card is required
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="cc-number">Credit card number</label>
            <input type="text" class="form-control" id="cc-number" placeholder="" required>
            <div class="invalid-feedback">
              Credit card number is required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <label for="cc-expiration">Expiration</label>
            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
            <div class="invalid-feedback">
              Expiration date required
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="cc-cvv">CVV</label>
            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
            <div class="invalid-feedback">
              Security code required
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="dongydathang">Continue to checkout</button>
      </form>
    </div>
  </div>
</div>
<?php include "./layout/client/footer_client.php" ?>