<?php include "./layout/client/header_client.php" ?>

                <?php
                $total_cart = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $item) {
                        $price = $item['order_quantity'] * $item['price'];
                        $total_cart += $item['order_quantity'] * $item['price'];
                    }
                }
                ?>
<div class="container">
  <div class="py-5 text-center">
    
    <h2>THANH TOÁN</h2>
  </div>

  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Giỏ Hàng Của Bạn</span>
        
          <span class="badge badge-secondary badge-pill">
            <?= $data['num_orders'] ?>
          </span>;
       
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
          <span style="margin-left:20px;"class="text-muted ml-6 responsive">Thành tiền</span>
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

      <form class="card p-2">
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
      <form class="needs-validation" action="/MiuStore/?role=client&mod=bill&action=insertBill" method="post" novalidate>
        
          <div class="mb-3">
            <label for="lastName">Họ và tên người nhận hàng</label>
            <input type="text" name="full_name" class="form-control" placeholder="Họ và tên người nhận hàng" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
       

        
        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" name="email" class="form-control" id="email" placeholder="you@gmail.com">
          <div class="invalid-feedback">
            Please enter a valid email address for shipping updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Địa chỉ nhận hàng</label>
          <input type="text" class="form-control" name="address" id="address" placeholder="Địa chỉ nhận hàng" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

         <div class="mb-3">
          <label for="address">Số điện thoại</label>
          <input type="text" class="form-control" name="numberphone" id="address" placeholder="Số điện thoại" required>
          <div class="invalid-feedback">
            Please enter your shipping address.
          </div>
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Tỉnh/TP</label>
            <select class="custom-select d-block w-100" id="country" required>
              <option value="">Choose...</option>
              <option>United States</option>
            </select>
            <div class="invalid-feedback">
              Please select a valid country.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">Quận/Huyện</label>
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
          <input type="checkbox" class="custom-control-input" id="save-info">
          <label class="custom-control-label" for="save-info">Lưu thông tin cho lần thanh toán sau</label>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Hình thức thanh toán</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio d-flex">
            <div style="padding: 10px">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
            <label class="custom-control-label" for="credit">Thanh toán khi nhận hàng</label>
            </div>
            <img width="45px" src="public/image/dollar.png" alt="">
            </div>
          <div class="custom-control custom-radio d-flex">
            <div style="padding:10px;">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="debit">Thẻ ngân hàng</label>
            </div>
            <img width="45px" style="margin-left: 70px;" src="public/image/atm-card.png" alt="">
          </div>
          <div class="custom-control custom-radio d-flex">
            <div style="padding:10px">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">Zalo Pay</label>
            </div>
            <img width="40px" style="margin-left: 110px;" src="public/image/zalopay.png" alt="">
          </div>
          <div class="custom-control custom-radio d-flex">
            <div style="padding:10px">
            <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
            <label class="custom-control-label" for="paypal">MoMo</label>
            </div>
            <img width="40px" style="margin-left: 120px;" src="public/image/momo.png" alt="">
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
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="dongydathang">Thanh Toán</button>
      </form>
    </div>
  </div>
</div>
<?php include "./layout/client/footer_client.php" ?>