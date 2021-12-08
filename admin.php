<?php 
 $title = "Admin" ; 
 session_start();
 if(!isset($_SESSION['username'])){
    header('location: login.php');
    exit();
 }
?>


<!DOCTYPE html>
<html>

<?php include('header.php') ; ?>


<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>PTITCOVID</h3>
            </div>

            <ul class="list-unstyled components">
                <p><strong class="font-weight-bold">ADMIN</strong></p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản
                        lí</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Khai báo y tế</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-danger">
                        <i class="fas fa-align-left"></i>
                        <span>PTITCOVID</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown mr-2">
                                <a class=" nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user-circle fa-lg"></i> <?php echo $_SESSION['username']; ?>

                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Xem thông tin cá nhân
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Đăng xuất
                                    </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <button type="button" name="add" class="btn btn-primary mb-5 float-right" data-toggle="modal"
                data-target="#form-modal"><i class="fas fa-plus"></i>Thêm khai báo</button>
            <!-- <button type="button" name="add" class="btn btn-primary mb-5 float-right">
                <i class="fas fa-plus"></i>Thêm khai báo</button> -->
            <div class="modal fade" id="form-modal" tabindex="-1" role="dialog" aria-labelledby="form-modal-label"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="form-modal-label">Khai báo y tế</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
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
                                        <label for="">Ngày sinh (dd/mm/yyyy)
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

                                                    <td><label><input type="radio" value="Female"
                                                                name="inputGender">&nbsp;Nữ</label>
                                                    </td>
                                                    <td>&nbsp;</td>

                                                    <td><label><input type="radio" value="Other"
                                                                name="inputGender">&nbsp;Khác</label>
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
                                        <select name="inputNation" id="inputNation" class="form-control">
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
                                        <input type="text" class="form-control" name="inputDetailAddress"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
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
                                            <label class="mr-3">Trong vòng 14 ngày qua, Anh/Chị có đến tỉnh/thành phố,
                                                quốc gia/vùng lãnh
                                                thổ nào (Có thể đi
                                                qua nhiều nơi)</label>


                                            <div class="choicebox d-inline-block">
                                                <div class="form-check d-inline-block">
                                                    <input class="form-check-input" type="radio"
                                                        name="showCountryPassing" value="No" id="showCountryPassing0"
                                                        checked="checked">
                                                    <label class="form-check-label" for="showCountryPassing0">
                                                        <span>Không</span>
                                                    </label>
                                                </div>
                                                <div class="form-check d-inline-block ml-3">
                                                    <input class="form-check-input" type="radio"
                                                        name="showCountryPassing" id="showCountryPassing1" value="Yes">
                                                    <label class="form-check-label" for="showCountryPassing1">
                                                        <span>Có</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mt-3 showCountryPassing" style="display: none"
                                                id="inputCountryPassing">
                                                <textarea class="form-control" rows="2" name="inputCountryPassing"
                                                    placeholder="Ghi lại địa điểm."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 col-xs-12 ">
                                        <div class="form-group ">
                                            <label class="mr-3">Trong vòng 14 ngày qua, Anh/Chị có thấy xuất hiện ít
                                                nhất 1 trong các dấu
                                                hiệu: sốt, ho, khó thở, viêm phổi, đau họng, mệt mỏi không?</label>


                                            <div class="choicebox d-inline-block">
                                                <div class="form-check d-inline-block">
                                                    <input class="form-check-input" type="radio" name="showSymptom"
                                                        value="No" id="showSymptom0" checked>
                                                    <label class="form-check-label" for="showSymptom0">
                                                        <span>Không</span>
                                                    </label>
                                                </div>
                                                <div class="form-check d-inline-block ml-3">
                                                    <input class="form-check-input" type="radio" name="showSymptom"
                                                        id="showSymptom1" value="Yes">
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
                                                        <input class="style-radio" type="radio"
                                                            name="touchPeopleFromCovidCountry"
                                                            id="touchPeopleFromCovidCountry1" value="Yes">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="style-radio" type="radio"
                                                            name="touchPeopleFromCovidCountry"
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
                                                        <input class="style-radio" type="radio"
                                                            name="touchPeopleHasCovidSymptom"
                                                            id="touchPeopleHasCovidSymptom1" value="Yes">

                                                    </td>
                                                    <td class="text-center">
                                                        <input class="style-radio" type="radio"
                                                            name="touchPeopleHasCovidSymptom"
                                                            id="touchPeopleHasCovidSymptom0" value="No" checked>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="btn-submit-box text-center">
                                    <input type="hidden" name="form_id" id="form_id" />
                                    <input type="hidden" name="isEdit" id="isEdit" />
                                    <button type="submit" name="submit-btn" class="mt-3 btn btn-lg btn-danger">Lưu tờ
                                        khai</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <br /><br />
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="filter_tc_covid">Triệu chứng</label>
                    <div class="form-group">
                        <select name="filter_tc_covid" id="filter_tc_covid" class="form-control" required>
                            <option value="">Có triệu chứng hay không?</option>
                            <option value="Yes">Có</option>
                            <option value="No">Không</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="filter_tx_covid">Tiếp xúc Covid</label>
                        <select name="filter_tx_covid" id="filter_tx_covid" class="form-control" required>
                            <option value="">Có tiếp xúc với người nghi nhiễm Covid?</option>
                            <option value="Yes">Có-Yes</option>
                            <option value="No">Không-No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group pt-4">
                        <button type="button" name="filter" id="filter" class="btn btn-info">
                            <i class="fas fa-filter"></i> Lọc</button>
                        <button type="button" name="exit-filter" id="exit-filter" class="btn btn-danger">
                            <i class="fas fa-backspace"></i> Bỏ Lọc</button>
                    </div>
                </div>
            </div>
            <div id="data" class=''>
                <table id="form-table" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10%">Ngày</th>
                            <th width="10%">CMT/CCCD</th>
                            <th width="20%">Họ tên</th>
                            <th width="10%">Ngày sinh</th>
                            <th width="10%">SĐT</th>
                            <th width="15%">TC Covid</th>
                            <th width="10%">TX Covid</th>
                            <th width="15%"></th>
                        </tr>
                    </thead>
                    <!-- <tbody>
                        <tr>

                            <td>15/12/2021</td>
                            <td>0123456789</td>
                            <td class='text-uppercase'>Lưu Quang Tùng</td>
                            <td>15/09/2000</td>
                            <td>0961137015</td>
                            <td>sốt, ho, đau họng, mệt mỏi</td>
                            <td>Yes</td>
                            <td>
                                <button type="button" class="btn btn-info"><i class="far fa-eye"></i></button>
                                <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    </tbody> -->
                    <tfoot>
                        <tr>
                            <th>Ngày</th>
                            <th>CMT/CCCD</th>
                            <th>Họ tên</th>
                            <th>Ngày sinh</th>
                            <th>SĐT</th>
                            <th>TC Covid</th>
                            <th>TX Covid</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</body>
<script src="js/admin.js"></script>
<script src="js/form.js"></script>

</html>