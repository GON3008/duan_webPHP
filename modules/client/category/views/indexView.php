<?php require "layout/client/header_client.php" ?>

    <!--Sản phẩm liên quan-->
      <div class="container">
          <h3>Sản phẩm liên quan</h3>
      
        <div class="row">
              <div class="col-12">
             
            <div class="card text-left">
             
              <div class="card-body text col-12">
              <?php
            foreach($pro_cat as $item) :
             
             ?>
                <a href="/du_an_1_poly_hotel/?role=client&mod=product_details&action=index&id=<?= $item['id'] ?>"> <h2 class="text">🏡<?= $item['name'] ?></h2></a>
                
                <?php endforeach ?>
             </div>
            </div>
           
            </div>
        </div>
      </div>
    <!--End Sản phẩm liên quan-->

<?php require "layout/client/footer_client.php" ?>


