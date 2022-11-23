<?php require "layout/client/header_client.php" ?>
 <!----------------------------------------------------------------------------------------------------->
    <!--Form Search-->
    <div class="container">
      <form action="">
        <div class="row mt-4">
          <div class="form-group col-md-9 col-sm-12 mt-2">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input
              type="text"
              class="form-control pl-5"
              id="exampleInput"
              placeholder="Tìm kiếm..."
            />
          </div>
          <div class="form-group col-md-3 col-sm-12 mt-2">
            <input
              type="submit"
              class="form-control bg-success"
              id="exampleInput"
              placeholder="Tìm kiếm..."
              value="Tìm kiếm"
            />
          </div>
        </div>
      </form>
    </div>
    <!--End form search-->
    <!-------------------------------------------------------------------------------------------->
    <hr class="display-4" />
    <!--Trang chi tiết-->
    <div class="container mt-5">
  
    <input type="hidden" value="<?=$productions['id']?>" name="id">
                        
    
      <div class="row">
        <div class="col-md-8">
          <div>
            <h2 value=""> <?= $productions['name']?></h2>
            <p>Địa chỉ: Trịnh Văn Bô, Hà Nội</p>
          </div>
          <div>
          <img src="<?=$productions['image'] ?>" alt="" width="100%" class="img-fluid">
          </div>
          
          
        </div>

        <div class="col-md-4 mt-3">
          <div class="card" style="width: 100%;">
         
            <div class="card-body">
             
                <div class="form-group">
                  <label for="my-input">Ngày đặt phòng</label>
                  <input id="my-input" class="form-control" type="date" name="">
                </div>

                <div class="form-group">
                  <label for="my-input">Ngày trả phòng</label>
                  <input id="my-input" class="form-control" type="date" name="" >
                </div>

              <div class="mt-3 text-danger">
                <h3>Giá:<?= $productions['price']?></h3> 
                <p>Lưu ý: Giá phòng sẽ thay đổi theo từng ngày từng thời điểm(ngày lễ, tết, cuối tuần)</p>
              </div>
              <a href="#" class="btn bg-success col-md-12">Đặt phòng</a>
              <div class="row text-center mt-2">
                <div class="col-6">
                  <p>Diện tích</p>
                  <p>15-30m2</p>
                </div>
                <div class="col-6">
                  <p>Trạng thái</p>
                  <p class="text-info">Có thể thuê</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="">
        <h3>Mô tả</h3>
        <div>
       
          <h5>
          <?=$productions['description']?>

          </h5>
          <!-- </h5>
          Tòa nhà nằm trên khu vực Mễ Trì Hạ, gần trục đường Phạm Hùng.<br />

          Cách Siêu thị BigC hơn 1 km.<br />

          Phù hợp cho sinh viên, người đi làm và hộ gia đình.<br /><br />

          <h5>
            Cho thuê nhà trọ Mễ Trì Hạ full đồ tiện nghi, trang bị đồ mới,
            không gian rộng thoáng:
          </h5>

          Đảm bảo full đồ: điều hòa, nóng lạnh, giường, tủ, bàn ghế, gương,
          bộ tranh, thảm, kệ...<br />
          Decor trẻ trung, hiện đại với tranh tường và cây xanh.<br />
          Vệ sinh phòng sạch sẽ khi khách nhận phòng, đảm bảo khách có thể
          đến ở ngay.<br />

          Cửa sổ thông thoáng, đảm bảo ánh sáng tự nhiên.<br />

          Phòng có ban công view đẹp.<br />

          Cam kết không qua trung gian.<br /><br />

          <h5>
            Khi thuê phòng trọ Mễ Trì Hạ bạn nhận được rất nhiều ưu đãi:
          </h5>

          An ninh đảm bảo với khóa vân tay, camera an ninh an toàn tuyệt
          đối, chỗ gửi xe rộng rãi, free.<br />

          Thang máy mới, nhanh.<br />

          Có nhân viên kinh nghiệm lâu năm vệ sinh tòa nhà mỗi tuần .<br />

          Dịch vụ bảo trì bảo dưỡng đồ đạc định kỳ hoàn toàn miễn phí.<br />

          Tặng ngay một bộ chăn, ga, gối, đệm mới tinh khi thuê nhà trong
          tháng này.<br />

          Ưu đãi đặc biệt với khách hàng kí hợp đồng 12 tháng.<br />

          Đặt lịch ngay để được nhân viên hỗ trợ nhanh nhất!<br /> -->
        </div>
      </div>



     
      <!-- <div class="row">
        <div class="col-md-8">
          <div>
            <h2>Phòng đơn - Trịnh Văn Bô, Hà Nội</h2>
            <p>Địa chỉ: Trịnh Văn Bô, Hà Nội</p>
          </div>
          <div>
            <img src="image/banner1.png" class="img-fluid" alt="" />
          </div>
          
          
        </div>

        <div class="col-md-4 mt-3">
          <div class="card" style="width: 100%;">
         
            <div class="card-body">
             
                <div class="form-group">
                  <label for="my-input">Ngày nhận phòng</label>
                  <input id="my-input" class="form-control" type="date" name="">
                </div>
                <div class="form-group">
                  <label for="my-input">Ngày trả phòng</label>
                  <input id="my-input" class="form-control" type="date" name="">
                </div>

              <div class="mt-3 text-danger">
                <h3>Giá: $1000/1 ngày</h3> 
                <p>Lưu ý: Giá phòng sẽ thay đổi theo từng ngày từng thời điểm(ngày lễ, tết, cuối tuần)</p>
              </div>
              <a href="#" class="btn bg-success col-md-12">Đặt phòng</a>
              <div class="row text-center mt-2">
                <div class="col-6">
                  <p>Diện tích</p>
                  <p>15-30m2</p>
                </div>
                <div class="col-6">
                  <p>Trạng thái</p>
                  <p class="text-info">Có thể thuê</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="">
        <h3>Mô tả</h3>
        <div>
          <h5>
            Chung cư mini mới tại Mễ Trì Hạ, vị trí thuận lợi giao thông:
          </h5>
          Tòa nhà nằm trên khu vực Mễ Trì Hạ, gần trục đường Phạm Hùng.<br />

          Cách Siêu thị BigC hơn 1 km.<br />

          Phù hợp cho sinh viên, người đi làm và hộ gia đình.<br /><br />

          <h5>
            Cho thuê nhà trọ Mễ Trì Hạ full đồ tiện nghi, trang bị đồ mới,
            không gian rộng thoáng:
          </h5>

          Đảm bảo full đồ: điều hòa, nóng lạnh, giường, tủ, bàn ghế, gương,
          bộ tranh, thảm, kệ...<br />
          Decor trẻ trung, hiện đại với tranh tường và cây xanh.<br />
          Vệ sinh phòng sạch sẽ khi khách nhận phòng, đảm bảo khách có thể
          đến ở ngay.<br />

          Cửa sổ thông thoáng, đảm bảo ánh sáng tự nhiên.<br />

          Phòng có ban công view đẹp.<br />

          Cam kết không qua trung gian.<br /><br />

          <h5>
            Khi thuê phòng trọ Mễ Trì Hạ bạn nhận được rất nhiều ưu đãi:
          </h5>

          An ninh đảm bảo với khóa vân tay, camera an ninh an toàn tuyệt
          đối, chỗ gửi xe rộng rãi, free.<br />

          Thang máy mới, nhanh.<br />

          Có nhân viên kinh nghiệm lâu năm vệ sinh tòa nhà mỗi tuần .<br />

          Dịch vụ bảo trì bảo dưỡng đồ đạc định kỳ hoàn toàn miễn phí.<br />

          Tặng ngay một bộ chăn, ga, gối, đệm mới tinh khi thuê nhà trong
          tháng này.<br />

          Ưu đãi đặc biệt với khách hàng kí hợp đồng 12 tháng.<br />

          Đặt lịch ngay để được nhân viên hỗ trợ nhanh nhất!<br />
        </div>
      </div>
 
        -->
      
    </div>
    <!--End trang chi tiết-->

    <!--Form bình luận-->
    <div class="container mt-3">
      <h3>Bình luận</h3> <br>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-light">
            <thead class="thead-light">
              <tr>
                <th>Name</th>
                <th>Nội dung</th>
                <th>Date/time</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Thuỷ</th>
                <th>Trịnh Xuân Thuỷ - PH26691</th>
                <th>11:35 PM 07/11/2022</th>
              </tr>
            </tbody>
            
          </table>
        </div>
      </div>
      <div class="row">
          <div class=" col-md-10 mt-1">
            <input id="my-input" class="form-control" type="text" name="" placeholder="Bình luận">
          </div>
          <div class="form-group col-md-2 mt-1">
            <input id="my-input" class=" btn btn-primary w-100" type="submit" name="" value="Gửi">
          </div>
      </div>
    </div>
    <!--End form bình luận-->

    <!--Sản phẩm liên quan-->
      <div class="container">
          <h3>Sản phẩm liên quan</h3>
      
        <div class="row">
          <div class="col-md-4">
            <div class="card text-left">
              <img class="card-img-top" src="image/banner1.png" alt="">
              <div class="card-body text col-12">
                <a href=""> <h2 class="text">Poly's Hotel - Phòng đơn </h2></a>
                <a href="" class="text-danger" style="float:left ; font-size:20px ;"> $100</a> 
                <a href="" class="text" style="float:right ;"><span class="rounded-circle"><i class="fa-solid fa-cart-plus"></i></span></a> 
             </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-left">
              <img class="card-img-top" src="image/banner1.png" alt="">
              <div class="card-body text col-12">
                <a href=""> <h2 class="text">Poly's Hotel - Phòng đơn </h2></a>
                <a href="" class="text-danger" style="float:left ; font-size:20px ;"> $100</a> 
                <a href="" class="text" style="float:right ;"><span class="rounded-circle"><i class="fa-solid fa-cart-plus"></i></span></a> 
             </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card text-left">
              <img class="card-img-top" src="image/banner1.png" alt="">
              <div class="card-body text col-12">
                <a href=""> <h2 class="text">Poly's Hotel - Phòng đơn </h2></a>
                <a href="" class="text-danger" style="float:left ; font-size:20px ;"> $100</a> 
                <a href="" class="text" style="float:right ;"><span class="rounded-circle"><i class="fa-solid fa-cart-plus"></i></span></a> 
             </div>
            </div>
          </div>
          
        </div>
      </div>
    <!--End Sản phẩm liên quan-->

    <!--Google Map-->
    <div class="container mt-3 mb-3">
      <h3>Bản đồ</h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.863855881391!2d105.7445984141576!3d21.038132792835867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b991d80fd5%3A0x53cefc99d6b0bf6f!2sFPT%20Polytechnic%20Hanoi!5e0!3m2!1sen!2s!4v1667839440057!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!--End Google Map-->
<?php require "layout/client/footer_client.php" ?>


