<?php 
  $title = 'PTITCOVID';
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <?php include('header.php') ;?>

 <body>
 	<?php include('navbar.php'); ?>
  
    <!-- Banner-->
  <div class="container">
    <div class="row row-grid align-items-center">
      <div class="col-12 col-md-5 col-lg-6 order-md-2 text-center">
        <!-- Image -->
        <figure class="w-100">
          <img alt="Image placeholder" src="asset/banner.jpg" class="img-fluid mw-md-120">
        </figure>
      </div>
      <div class="col-12 col-md-7 col-lg-6 order-md-1 pr-md-5">
        <!-- Heading -->
        <h1 class="display-4 text-center text-md-left mb-3">
          Khai báo y tế với <strong class="text-danger">PTITCOVID</strong>
        </h1>
        <!-- Text -->
        <p class="lead text-center text-md-left text-muted">
          Trang web quản lí khai báo y tế của<br> <strong>Học Viện Công Nghệ Bưu Chính Viễn Thông
            (PTIT)</strong>
        </p>
        <!-- Buttons -->
        <div class="text-center text-md-left mt-5">
          <a href="#" class="btn btn-danger btn-icon" target="_blank">
            <span class="btn-inner--text">Xem thêm</span>
            <span class="btn-inner--icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="feather feather-chevron-right">
                <polyline points="9 18 15 12 9 6"></polyline>
              </svg></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Feature -->
  <div id="feature-container">
    <h1 class="p-4 text-center font-weight-bold">Tính Năng</h1>

    <div class="feature">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-xl-7">
            <div class="image-container">
              <img class="img-fluid" src="asset/form.jpg" alt="alternative">
            </div>
          </div>
          <div class="col-lg-6 col-xl-5">
            <div class="text-container">
              <h2>Khai báo y tế nhanh chóng</h2>
              <p class="lead">Khai báo lịch trình đi lại ngay trên website, nhận thông báo khi bạn đã đi qua vùng nguy hiểm</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="feature">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-xl-5">
            <div class="text-container">
              <h2>Quản lí khai báo tiện lợi</h2>
              <p class="lead">Cập nhật các khai báo y tế đầy đủ, chính xác, quản lí dễ dàng, thuận tiện cho việc truy vết. 
              </p>
            </div>
          </div>
          <div class="col-lg-6 col-xl-7">
            <div class="image-container">
              <img class="img-fluid" src="asset/search-2.jpg" alt="alternative">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="feature">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-xl-7">
            <div class="image-container">
              <img class="img-fluid" src="asset/statistic-3.jpg" alt="alternative">
            </div>
          </div>
          <div class="col-lg-6 col-xl-5">
            <div class="text-container">
              <h2>Thống kê chi tiết</h2>
              <p class="lead">Thống kê covid theo từng ngày, từng tháng tại các địa phương trên cả nước. Cập nhật tin tức mới nhất về Covid.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Review -->
  <div class="cards-2 bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="h2-heading">Đánh giá của người dùng</h2>
        </div> <!-- end of col -->
      </div> <!-- end of row -->
      <div class="row">
        <div class="col-lg-12">

          <!-- Card -->
          <div class="card">
            <i class="fas fa-quote-right fa-3x quotes"></i>
            <!-- <i class="fas fa-quote-right fa-3x quotes"></i> -->
            <div class="card-body">
              <p class="testimonial-text">Tiện lợi khi cần khai báo lịch trình đi lại. Khai báo trên webiste thì không cần điền vào form giấy nữa. </p>
              <div class="testimonial-author">Nguyễn Quang Tuấn</div>
              <div class="occupation">Sinh Viên</div>
            </div>

          </div>
          <!-- end of card -->

          <!-- Card -->
          <div class="card">
            <i class="fas fa-quote-right fa-3x quotes"></i>
            <div class="card-body">
              <p class="testimonial-text">Cập nhật thông tin các khai báo, PTITCOVID giúp việc truy vết các F trở nên dễ dàng, nhanh chóng. </p>
              <div class="testimonial-author">Vũ Văn Khang</div>
              <div class="occupation">Cán bộ y tế</div>
            </div>

          </div>
          <!-- end of card -->

          <!-- Card -->
          <div class="card">
            <i class="fas fa-quote-right fa-3x quotes"></i>
            <div class="card-body">
              <p class="testimonial-text">Giao diện đẹp mắt, dễ dùng, tạo ấn tượng cho người sử dụng. Đây chắc là
                website đẹp nhất mà từng truy cập.</p>
              <div class="testimonial-author">Đào Quang Dương</div>
              <div class="occupation">Sinh Viên</div>
            </div>

          </div>
          <!-- end of card -->

        </div> <!-- end of col -->
      </div> <!-- end of row -->
    </div> <!-- end of container -->
  </div> <!-- end of cards-2 -->
  <!-- end of review -->
  
  <!-- Contact -->
  <div id = "contact" class="container-fluid">
    <h2>Liên hệ</h2>
    <div class = "contact-form">
      <form action="/" class="needs-validation" novalidate>
        <div class="form-group">
          <label for="uname" class="lead">Họ tên</label>
          <input type="text" class="form-control" id="uname" placeholder="Nhập họ tên" name="uname" required>
          <div class="valid-feedback">Hợp lệ</div>
          <div class="invalid-feedback">Nhập họ tên</div>
        </div>
        <div class="form-group">
          <label for="pwd" class="lead">Email</label>
          <input type="password" class="form-control" id="pwd" placeholder="Nhập email" name="pswd" required>
          <div class="valid-feedback">Hợp lệ</div>
          <div class="invalid-feedback">Nhập email.</div>
        </div>
        <div class="form-group">
          <label for="comment" class="lead">Nội dung tin nhắn</label>
          <textarea class="form-control" rows="5" id="comment"></textarea>
          <div class="valid-feedback">Hợp lệ</div>
          <div class="invalid-feedback">Nhập tin nhắn.</div>
        </div> 
        <button type="submit" class="btn btn-lg btn-block btn-danger">Submit</button>
      </form>
    </div>
  </div>
  <?php include('footer.php'); ?>
 </body>
 </html>