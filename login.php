<?php 
  $title = "Đăng nhập";
//   session_start();
 ?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.php'); ?>

<body>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal-cookies" data-backdrop="false"
        aria-labelledby="modal-cookies" aria-hidden="true">
        <div class="modal-dialog modal-dialog-aside left-4 right-4 bottom-4">
            <div class="modal-content bg-dark-dark">
                <div class="modal-body">
                    <!-- Text -->
                    <p class="text-sm text-white mb-3">
                        We use cookies so that our themes work for you. By using our website, you agree to our use of
                        cookies.
                    </p>
                    <!-- Buttons -->
                    <a href="" class="btn btn-sm btn-white" target="_blank">Learn more</a>
                    <button type="button" class="btn btn-sm btn-primary mr-2" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section>

        <div class="container d-flex flex-column">
            <div class="row align-items-center justify-content-center min-vh-100">
                <div class="col-md-6 col-lg-5 col-xl-5 py-6 py-md-0">
                    <div class="card shadow zindex-100 mb-0">
                        <div class="card-body px-md-5 py-5">
                            <div class="mb-5">
                                <h6 class="h3 text-danger">Đăng nhập</h6>
                                <p class="text-muted mb-0">Đăng nhập bằng tài khoản của bạn để tiếp tục</p>
                            </div>
                            <span class="clearfix"></span>
                            <div class="alert alert-danger alert-dismissible" id="login-error" style="display:none;">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <p></p>
                            </div>
                            <form action="" method="">
                                <div class="form-group">
                                    <label class="form-control-label">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="inputUsername"
                                            placeholder="Username">
                                    </div>

                                </div>
                                <div class="form-group mb-0">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <label class="form-control-label">Password</label>

                                        <div class="mb-2" id="show_hide_password">
                                            <a href="" class="small text-muted text-underline--dashed border-primary"
                                                data-toggle="password-text" data-target="#input-password">Xem mật
                                                khẩu</a>
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" id="input-password"
                                            name="inputPassword" placeholder="Password">
                                    </div>

                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-block btn-danger">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
    //   if(isset($_SESSION['status']) && $_SESSION['status'] == "failed"){
    //      unset($_SESSION['status']);
    //      $status = "failed";
    //      echo "<script> 
    //                 $('#login-error').css('display', 'block');
    //            </script>";
    //   }
      
     ?>

    <?php include('footer.php') ; ?>

</body>

<script>
$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        console.log("Clicked");
        if ($('#input-password').attr("type") == "text") {
            $('#input-password').attr('type', 'password');
            $('#show_hide_password a').text("Xem mật khẩu");
        } else if ($('#input-password').attr("type") == "password") {
            $('#input-password').attr('type', 'text');
            $('#show_hide_password i').removeClass("fa-eye-slash");
            $('#show_hide_password a').text("Ẩn mật khẩu");
        }
    });

    $("form").submit(function(event) {
        event.preventDefault();
        console.log("Submit");
        $.ajax({
            type: "POST",
            url: "authentication.php",
            data: $('form').serialize(),
            cache: false,
            processData: false,
            dataType: "json",
            encode: true,
        }).done(function(data) {
            console.log(data);
            if (!data.success) {
                $('#login-error p').text(data.message);
                $('#login-error').css('display', 'block');
            } else {
                // alert("success");
                location.href = 'admin.php';
            }
        });
    });
});
</script>

</html>