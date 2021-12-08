<?php 
  // session_start();
  // foreach($_POST as $x => $x_value) {
  //   echo "Key=" . $x . ", Value=" . $x_value;
  //   echo "<br>";
  // }
  $data = [];
  $errors = [];

  $name = $_POST["inputName"];
  $id = $_POST["inputID"];
  $gender = $_POST["inputGender"];
  $nation = $_POST["inputNation"];
  $dob = $_POST["inputDOB"];
  $province = $_POST["inputProvince"]; $district = $_POST["inputDistrict"]; $ward = $_POST["inputWard"];
  $addrDetail = $_POST["inputDetailAddress"];
  $phone = $_POST["inputPhone"]; $email = $_POST["inputEmail"];
  $inputCountryPassing = $_POST["inputCountryPassing"];
  $inputSymptom = $_POST["inputSymptom"];
  $touchCovidPatient = $_POST["touchCovidPatient"];
  $touchPeopleFromCovidCountry = $_POST["touchPeopleFromCovidCountry"];
  $touchPeopleHasCovidSymptom = $_POST["touchPeopleHasCovidSymptom"];
  

  if(!preg_match('/^[\p{L} ]+$/u', $name) || strlen($name) > 60){
    $errors['inputName'] = "Tên không hợp lệ";
  }

  if(!preg_match('/^[0-9]+$/', $id) || strlen($id) > 12){
    $errors['inputID'] = "CMT-CCCD không hợp lệ";
  }

  $dob = DateTime::createFromFormat('d/m/Y', $dob);
  $date_errors = DateTime::getLastErrors();
  if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
    $errors['inputDOB'] = "Ngày sinh không hợp lệ";
  }

  if(!preg_match('/^[\p{L}0-9, ]+$/u', $addrDetail ) || strlen($addrDetail) > 500){
    $errors['inputDetailAddress'] = "Địa chỉ không hợp lệ";
  }

  if(!preg_match('/^[0-9]+$/', $phone) || strlen($phone) != 10){
    $errors['inputPhone'] = "SĐT không hợp lệ";
  }
  
  if (!filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($email) > 0) {
    $errors['inputEmail']  = "Email không hợp lệ";
  }


  if($_POST['showCountryPassing'] == "Yes"){
    if(!preg_match('/^[\p{L}, ]+$/u', $inputCountryPassing) || strlen($inputCountryPassing) > 1000){
      $errors['inputCountryPassing'] = "Thông tin nhập không hợp lệ";
    }
  }
  

  if($_POST['showSymptom'] == "Yes"){
    if(!preg_match('/^[\p{L}, ]+$/u', $inputSymptom) || strlen($inputSymptom) > 1000){
      $errors['inputSymptom'] = "Thông tin nhập không hợp lệ";
    }
  }
  
  if(count($errors) != 0){
    $data['success'] = false;
    $data['errors'] = $errors;
    echo json_encode($data);
    exit();
  }
  
  
  $dob = $dob->format('Y-m-d');
  include("connection.php");
  
  $check_exist_user_query = "SELECT * FROM user WHERE ID = :ID";
  $stmt = $conn->prepare($check_exist_user_query);
  $stmt->bindValue(":ID", $id);
  $stmt->execute();
  $count = $stmt->rowCount();
  
  if($count == 0){
    // insert
    $insert_user_query = "INSERT INTO user VALUES (:id, :name, :dob, :gender, :nation, :phone, 
    :email, :addrDetail, :provinceID, :districtID, :wardID);";
    $stmt = $conn->prepare($insert_user_query);
  }
  else{
    $update_user_query ="UPDATE user SET name = :name, dob = :dob, gender = :gender,
    nationality = :nation, provinceID = :provinceID , districtID = :districtID , 
    wardID = :wardID, addressDetail = :addrDetail, phone= :phone, email= :email
    WHERE id = :id;";
    $stmt = $conn->prepare($update_user_query);
  }
 
  
  
  $stmt->bindValue(":id", $id);
  $stmt->bindValue(":name", $name);
  $stmt->bindValue(":dob", $dob);
  $stmt->bindValue(":gender", $gender);
  $stmt->bindValue(":nation", $nation);
  $stmt->bindValue(":provinceID",$province);
  $stmt->bindValue(":districtID", $district);
  $stmt->bindValue(":wardID", $ward);
  $stmt->bindValue(":addrDetail", $addrDetail);
  $stmt->bindValue(":phone", $phone);
  $stmt->bindValue(":email", $email);
  $stmt->execute();

  
  $date = date("Y/m/d");
  if(!isset($_POST['isEdit'])){// not update form, just add form
    $insert_form_query = "INSERT INTO form (`countryPassing`, `symptom`, `touchCovidPatient`, 
    `touchPeopleFromCovidCountry`, `touchPeopleHasCovidSymptom`, `userID`, `date`) VALUES (?,?,?,?,?,?,?) ";
    $stmt= $conn->prepare($insert_form_query); 
    $stmt->execute([$inputCountryPassing,  $inputSymptom, $touchCovidPatient, $touchPeopleFromCovidCountry,
                      $touchPeopleHasCovidSymptom, $id, $date]);
  }else{// update form
    $update_form_query = "UPDATE form SET countryPassing = ?, symptom = ?, touchCovidPatient = ?, 
    touchPeopleFromCovidCountry = ?, touchPeopleHasCovidSymptom = ?, userID = ?, date = ? WHERE id = ? ";
    $stmt= $conn->prepare($update_form_query); 
    $stmt->execute([$inputCountryPassing,  $inputSymptom, $touchCovidPatient, $touchPeopleFromCovidCountry,
                      $touchPeopleHasCovidSymptom, $id, $date, $_POST['form_id']]);
  }
  
  
  // echo "success";
  // $_SESSION['status'] = "success";
  // header('location: declaration_form.php');
  // exit();
  
  $data['success'] = true;
  $data['message'] = 'Success!';
  echo json_encode($data);
?>