
<!-- 
<?php //if(isset($_SESSION['auth']) && ($_SESSION['auth']['role']== 1) ){ 
    //header("location:/du_an_1/?role=client");   
//}

?> -->
<?php get_header('', 'Tổng quan') ?>

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Tổng quan</h5>
               
                <!--end::Page Title-->
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
        <div class="container px-4">
  <div class="row gx-5">
    <div class="col">
     <div style="height: 150px; " class="p-3 border bg-light">
     <div class="d-flex p-6">
     <img style="width: 90px;" src="public/image/box.png" alt="">
     <div>
     <p style="text-align: center; font-size: 15px;"><?php echo $data['total_orders'] ?></p>
     <h4>Đơn hàng</h4>
     </div>
     </div>
    </div>
    </div>
    <div class="col">
    <div style="height: 150px; " class="p-3 border bg-light">
     <div class="d-flex p-6">
     <img style="width: 90px;" src="public/image/comment (1).png" alt="">
     <div>
     <p style="text-align: center; font-size: 15px;"><?php echo $data['total_comments'];?></p>
     <h4 style="">Bình luận</h4>
     </div>
     </div>
    </div>
    </div>
    <div class="col">
    <div style="height: 150px; " class="p-3 border bg-light">
     <div class="d-flex p-6">
     <img style="width: 90px;" src="public/image/group.png" alt="">
     <div>
     <p style="text-align: center; font-size: 15px;"><?php echo $data['total_users'];?></p>
     <h4 style="">Thành viên</h4>
     </div>
     </div>
    </div>
    </div>
    <div class="col">
    <div style="height: 150px; " class="p-3 border bg-light">
     <div class="d-flex p-6">
     <img style="width: 90px;" src="public/image/viewers.png" alt="">
     <div>
     <p style="text-align: center; font-size: 15px;"><?php echo $data['total_view'];?></p>
     <h4 style="">Người xem</h4>
     </div>
     </div>
    </div>
    </div>
  </div>
</div>
        </div>
        <!--end::Container-->

    </div><!--end::Entry-->

<?php get_footer() ?>
