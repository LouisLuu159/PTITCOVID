<?php
$title = 'Khai báo y tế';
// $status = "";
// session_start();
// if(isset($_SESSION['status'])){
//     $status = $_SESSION['status'];
//     unset($_SESSION['status']);
// }
?>

<!DOCTYPE html>
<html>
<?php include 'header.php';?>

<body>
    <?php include 'navbar.php';?>
    <?php  
    //   if($status == "success"){
    //     echo "<script>";
    //     echo 'swal({
    //       title: "Thành Công!",
    //       text: "Bạn đã gửi tờ khai!",
    //       icon: "success",
    //     });';
    //     echo "</script>";
    //   }
      
     ?>

    <div class="declaration-form m-5">
        <h2 class="text-center text-uppercase">Thông tin khai báo y tế</h2>
        <h4 class="text-center text-uppercase mb-5">(Phòng chống dịch COVID-19)</h4>
        <form action="" method="" id="declaration_form">
            <div class="form-row">
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label for="">Họ tên (Ghi chữ IN HOA)
                        <em class="text-danger" style="line-height: 1">(*)</em>
                    </label>
                    <input type="text" class="form-control" name="inputName" placeholder=""
                        style="text-transform: uppercase;">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label for="">CCCD/CMND
                        <em class="text-danger" style="line-height: 1">(*)</em>
                    </label>
                    <input type="text" class="form-control" name="inputID" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                    <label for="">Ngày sinh (Viết theo định dạng: dd/mm/yyyy)
                        <em class="text-danger" style="line-height: 1">(*)</em>
                    </label>
                    <input type="text" class="form-control" name="inputDOB" placeholder="">
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                    <label for="">Giới tính
                        <em class="text-danger" style="line-height: 1">(*)</em>
                    </label>
                    <div id="genderChoiceBox">
                        <table class="">
                            <tr>
                                <td><label><input type="radio" value="Male" checked="checked"
                                            name="inputGender">&nbsp;Nam</label></td>
                                <td>&nbsp;</td>

                                <td><label><input type="radio" value="Female" name="inputGender">&nbsp;Nữ</label>
                                </td>
                                <td>&nbsp;</td>

                                <td><label><input type="radio" value="Other" name="inputGender">&nbsp;Khác</label>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                    <label for="">Quốc tịch
                        <em class="text-danger" style="line-height: 1">(*)</em>
                    </label>
                    <select name="inputNation" class="form-control">
                        <option value="">Chọn</option>
                        <option value="Vietnam">Việt Nam</option>
                        <option value="Laos">Lào</option>
                        <option value="Cambodia">Campuchia</option>
                    </select>
                </div>
            </div>
            <h5 class="mt-4 mb-4 font-weight-bold">Địa chỉ liên lạc</h5>
            <div class="form-row">
                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                    <label for="">Tỉnh thành
                        <em class="text-danger" style="line-height: 1">(*)</em>
                    </label>
                    <select name="inputProvince" id="inputProvince" class="form-control required">
                        <option value="">---Chọn Tỉnh/Thành phố---</option>
                        <?php
include 'connection.php';
$query = "SELECT * FROM province";
$stmt = $conn->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    echo '<option value="' . $row["matp"] . '">' . $row["name"] . '</option>';
}
?>

                    </select>
                </div>

                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                    <label for="">Quận/Huyện
                        <em class="text-danger" style="line-height: 1">(*)</em>
                    </label>
                    <select name="inputDistrict" id="inputDistrict" class="form-control">

                    </select>
                </div>

                <div class="form-group col-md-4 col-sm-4 col-xs-12">
                    <label for="">Phường/Xã
                        <em class="text-danger" style="line-height: 1">(*)</em>
                    </label>
                    <select name="inputWard" id="inputWard" class="form-control">

                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <label for="">Số nhà, phố, tổ dân phố/thôn/đội
                        <em class="text-danger" style="line-height: 1">(*)</em>
                    </label>
                    <input type="text" class="form-control" name="inputDetailAddress" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 col-sm-6 col-xs-12 has-error">
                    <label for="">Điện thoại
                        <em class="text-danger" style="line-height: 1">(*)</em>
                    </label>
                    <input type="text" class="form-control" name="inputPhone" placeholder="">
                </div>
                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="inputEmail" placeholder="">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 col-xs-12 ">
                    <div class="form-group ">
                        <label class="mr-3">Trong vòng 14 ngày qua, Anh/Chị có đến tỉnh/thành phố, quốc gia/vùng lãnh
                            thổ nào (Có thể đi
                            qua nhiều nơi)</label>


                        <div class="choicebox d-inline-block">
                            <div class="form-check d-inline-block">
                                <input class="form-check-input" type="radio" name="showCountryPassing" value="No"
                                    id="showCountryPassing0" checked>
                                <label class="form-check-label" for="showCountryPassing0">
                                    <span>Không</span>
                                </label>
                            </div>
                            <div class="form-check d-inline-block ml-3">
                                <input class="form-check-input" type="radio" name="showCountryPassing"
                                    id="showCountryPassing1" value="Yes">
                                <label class="form-check-label" for="showCountryPassing1">
                                    <span>Có</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-3 showCountryPassing" style="display: none" id="inputCountryPassing">
                            <textarea class="form-control" rows="2" name="inputCountryPassing"
                                placeholder="Ghi lại địa điểm."></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 col-xs-12 ">
                    <div class="form-group ">
                        <label class="mr-3">Trong vòng 14 ngày qua, Anh/Chị có thấy xuất hiện ít nhất 1 trong các dấu
                            hiệu: sốt, ho, khó thở, viêm phổi, đau họng, mệt mỏi không?</label>


                        <div class="choicebox d-inline-block">
                            <div class="form-check d-inline-block">
                                <input class="form-check-input" type="radio" name="showSymptom" value="No"
                                    id="showSymptom0" checked>
                                <label class="form-check-label" for="showSymptom0">
                                    <span>Không</span>
                                </label>
                            </div>
                            <div class="form-check d-inline-block ml-3">
                                <input class="form-check-input" type="radio" name="showSymptom" id="showSymptom1"
                                    value="Yes">
                                <label class="form-check-label" for="showSymptom1">
                                    <span>Có</span>
                                </label>
                            </div>
                        </div>


                        <div class="mt-3 showSymptom" id="inputSymptom" style="display: none;">
                            <div>
                                <textarea class="form-control" rows="2" name="inputSymptom"
                                    placeholder="Ghi lại triệu chứng."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12 col-xs-12">
                    <label for="choiceTable">Trong vòng 14 ngày qua, Anh/Chị có tiếp xúc với
                        <em class="text-danger" style="line-height: 1">(*)</em>
                    </label>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-center">Có</th>
                                <th scope="col" class="text-center">Không</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Người bệnh hoặc nghi ngờ, mắc bệnh COVID-19
                                    <em class="text-danger" style="line-height: 1">(*)</em>
                                    <br>
                                    <label class="error" for="touchCovidPatient"></label>
                                </td>
                                <td class="text-center">
                                    <input class="style-radio" type="radio" name="touchCovidPatient"
                                        id="touchCovidPatient1" value="Yes">

                                </td>
                                <td class="text-center">
                                    <input class="style-radio" type="radio" name="touchCovidPatient"
                                        id="touchCovidPatient0" value="No" checked>

                                </td>
                            </tr>
                            <tr>
                                <td>Người từ nước có bệnh COVID-19
                                    <em class="text-danger" style="line-height: 1">(*)</em>
                                    <br>
                                    <label class="error" for="touchPeopleFromCovidCountry"></label>
                                </td>

                                <td class="text-center">
                                    <input class="style-radio" type="radio" name="touchPeopleFromCovidCountry"
                                        id="touchPeopleFromCovidCountry1" value="Yes">

                                </td>
                                <td class="text-center">
                                    <input class="style-radio" type="radio" name="touchPeopleFromCovidCountry"
                                        id="touchPeopleFromCovidCountry0" value="No" checked>
                                </td>
                            </tr>
                            <tr>
                                <td>Người có biểu hiện (Sốt, ho, khó thở , Viêm phổi)
                                    <em class="text-danger" style="line-height: 1">(*)</em>
                                    <br>
                                    <label class="error" for="touchPeopleHasCovidSymptom"></label>
                                </td>

                                <td class="text-center">
                                    <input class="style-radio" type="radio" name="touchPeopleHasCovidSymptom"
                                        id="touchPeopleHasCovidSymptom1" value="Yes">

                                </td>
                                <td class="text-center">
                                    <input class="style-radio" type="radio" name="touchPeopleHasCovidSymptom"
                                        id="touchPeopleHasCovidSymptom0" value="No" checked>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="btn-submit-box text-center">
                <button type="submit" class="mt-3 btn btn-lg btn-danger">Gửi tờ khai</button>
            </div>
        </form>
    </div>



    <?php include 'footer.php';?>
</body>
<script src="js/form.js"></script>

</html>