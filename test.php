<?php 
//  echo "Start validation";

//  $name = 'sdfsdf';
//  $errors = [];
//   if(!preg_match('/^[\p{L} ]+$/u', $name) || strlen($name) > 60){
//     $errors['inputName'] = "Tên không hợp lệ";
//     echo " <br> Tên không hợp lệ";
//   }

//   $id = "11111111111";
//   if(!preg_match('/^[0-9]+$/', $id) || strlen($id) > 12){
//     $errors['inputID'] = "CMT-CCCD không hợp lệ";
//     echo " <br> CMT-CCCD không hợp lệ";
//   }

//   $dob = "15/09/2000";
//   $dob = DateTime::createFromFormat('d/m/Y', $dob);
//   $date_errors = DateTime::getLastErrors();
//   if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
//     $errors['inputID'] = "Ngày sinh không hợp lệ";
//     echo " <br> Ngày sinh không hợp lệ";
//   }

//   $addrDetail = "17, Phan Trọng Tuệ, Huỳnh Cung";
//   if(!preg_match('/^[\p{L}0-9, ]+$/u', $addrDetail ) || strlen($addrDetail) > 500){
//     $errors['inputCountryPassing'] = "Địa chỉ không hợp lệ";
//     echo " <br> Địa chỉ không hợp lệ";
//   }
  

//   $phone = '0961137015';
//   if(!preg_match('/^[0-9]+$/', $phone) || strlen($phone) != 10){
//     $errors['inputPhone'] = "SĐT không hợp lệ";
//     echo " <br> SĐT không hợp lệ";
//   }
  
//   $email = "asdfasdf@gmail.com";
//   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     $errors['inputEmail']  = "Email không hợp lệ";
//     echo "<br> Email không hợp lệ";
//   }

//   $inputCountryPassing = "sd,sdf";
//   $inputSymptom = "sdf,fd";
//   if(!preg_match('/^[\p{L}, ]+$/u', $inputCountryPassing) || strlen($inputCountryPassing) > 1000){
//     $errors['inputCountryPassing'] = "Thông tin nhập không hợp lệ";
//     echo " <br> Thông tin nhập không hợp lệ1";
//   }

//   if(!preg_match('/^[\p{L}, ]+$/u', $inputSymptom) || strlen($inputSymptom) > 1000){
//     $errors['inputSymptom'] = "Thông tin nhập không hợp lệ";
//     echo " <br> Thông tin nhập không hợp lệ2";
//   }

//   echo '<br>'.count($errors);
//   if(count($errors) != 0){
    
//     exit();
//     echo "can't reach";
//   }

  include('connection.php'); 
  $query = 'SELECT form.*, user.name, user.dob, user.phone FROM `form`, `user` 
             WHERE form.userID = user.ID';
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $result = $stmt->fetchAll();
  echo $stmt->rowCount();
  foreach($result as $row){
    $TXcovid = 'No';
    if($row['touchCovidPatient'] == 'Yes' || $row['touchPeopleFromCovidCountry'] == 'Yes' 
           || $row['touchPeopleHasCovidSymptom'] == 'Yes'){
        $TXcovid = 'Yes';
    }
    echo '<br>';
    echo 'date = '. $row['date']. ', ';
    echo 'userID = '. $row['userID']. ', ';
    echo 'name = '. $row['name']. ', ';
    echo 'dob = '. $row['dob']. ', ';
    echo 'phone = '. $row['phone']. ', ';
    echo 'TCcovid = '. $row['symptom']. ', ';
    echo 'TXcovid = '. $TXcovid. ', ';
  }
  
 ?>