    <?php      
        include('connection.php');  
        $username = $_POST['inputUsername'];  
        $password = $_POST['inputPassword'];  

         $stmt = $conn->prepare("select * from login where username = :username and password = :password");
         $stmt->bindValue(':username', $username);
         $stmt->bindValue(':password', $password);
         $stmt->execute();
         $count = $stmt->rowCount();
              
        $data =[]; 
        if($count == 0){  
            $data['success'] = false;
            $data['message'] = "Tên tài khoản hoặc Mật khẩu không đúng, vui lòng thử lại";
            // $_SESSION['status'] = "failed";  
            // header("location: login.php");
            // exit();
        }  
        else{  
            session_start();
            $_SESSION['username'] = $username;
            $data['success'] = true;
            $data['message'] = "Đăng nhập thành công";
            // header("location: admin.php");
            // exit();
        }  
        echo json_encode($data);
    ?>