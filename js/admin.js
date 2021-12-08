$(document).ready(function () {
  $("#sidebar").toggleClass("active");
  $("#sidebarCollapse").on("click", function () {
    $("#sidebar").toggleClass("active");
  });

  $("button[name='add']").click(function () {
    console.log("Hit add button");
    $("#declaration_form")[0].reset();
    $(".modal-title").text("Thêm Khai báo y tế");
    $("#form-modal button[name='submit-btn']").text("Lưu tờ khai");
    $("#form-modal button[name='submit-btn']").show();
  });

  fill_dataTable();
  function fill_dataTable(filter_tc_covid = "", filter_tx_covid = "") {
    let dataTable = $("#form-table").DataTable({
      language: {
        lengthMenu: "Hiển thị _MENU_ bản ghi",
        zeroRecords: "Không tìm thấy",
        info: "Trang _PAGE_ / _PAGES_",
        infoEmpty: "Không có bản ghi nào",
        infoFiltered: "(_MAX_ bản ghi)",
      },

      processing: true,
      serverSide: true,
      order: [],
      ajax: {
        url: "fetch.php",
        type: "POST",
        data: {
          filter_tc_covid: filter_tc_covid,
          filter_tx_covid: filter_tx_covid,
        },
      },
      columnDefs: [
        {
          targets: [6, 7],
          orderable: false,
        },
      ],
    });
  }

  $("#filter").click(function () {
    let filter_tc_covid = $("#filter_tc_covid").val();
    let filter_tx_covid = $("#filter_tx_covid").val();
    if (filter_tc_covid != "" && filter_tx_covid != "") {
      $("#form-table").DataTable().destroy();
      fill_dataTable(filter_tc_covid, filter_tx_covid);
    } else {
      alert("Chọn các trường trước khi lọc");
      $("#form-table").DataTable().destroy();
      fill_dataTable();
    }
  });

  $("#exit-filter").click(function () {
    $("#form-table").DataTable().destroy();
    fill_dataTable();
    $("#filter_tc_covid").val("");
    $("#filter_tx_covid").val("");
  });

  function loadDateToForm(data) {
    for (let key in data) {
      let selector = 'input[name = "' + key + '"]';
      // console.log(selector + ": value = " + data[key]);
      switch (key) {
        case "inputDOB": {
          let date_array = data[key].split("-");
          let dob = date_array[2] + "/" + date_array[1] + "/" + date_array[0];
          $(selector).val(dob);
          break;
        }
        case "inputGender": {
          $("input[name= 'inputGender'][value='Male']").prop("checked", false);
          $("input[name= 'inputGender'][value='" + data[key] + "']").prop(
            "checked",
            true
          );
          break;
        }

        case "inputNation": {
          $("#inputNation").val(data[key]);
          break;
        }

        case "inputProvince": {
          $("#inputProvince").val(data[key]);
          $("#inputProvince").change();
          break;
        }

        case "inputDistrict": {
          setTimeout(() => {
            $("#inputDistrict").val(data[key]);
            $("#inputDistrict").change();
          }, 100);
          break;
        }

        case "inputWard": {
          setTimeout(() => {
            $("#inputWard").val(data[key]);
            $("#inputWard").change();
          }, 300);
          break;
        }

        case "inputCountryPassing": {
          if (data[key] != "") {
            $("#inputCountryPassing textarea").text(data[key]);
            $("input[name= 'showCountryPassing'][value='No']").prop(
              "checked",
              false
            );
            $("input[name= 'showCountryPassing'][value='Yes']").prop(
              "checked",
              true
            );
            $("input[name='showCountryPassing']").change();
          }
          break;
        }

        case "inputSymptom": {
          if (data[key] != "") {
            $("#inputSymptom textarea").text(data[key]);
            $("input[name= 'showSymptom'][value='No']").prop("checked", false);
            $("input[name= 'showSymptom'][value='Yes']").prop("checked", true);
            $("input[name='showSymptom']").change();
          }
          break;
        }

        case "touchCovidPatient": {
          if (data[key] == "Yes") {
            console.log("change touchCovidPatient");
            $("input[name= 'touchCovidPatient'][value='No']").prop(
              "checked",
              false
            );
            $("input[name= 'touchCovidPatient'][value='Yes']").prop(
              "checked",
              true
            );
          }
          break;
        }

        case "touchPeopleFromCovidCountry": {
          console.log("change touchPeopleFromCovidCountry");
          if (data[key] == "Yes") {
            $("input[name= 'touchPeopleFromCovidCountry'][value='No']").prop(
              "checked",
              false
            );
            $("input[name= 'touchPeopleFromCovidCountry'][value='Yes']").prop(
              "checked",
              true
            );
          }
          break;
        }

        case "touchPeopleHasCovidSymptom": {
          if (data[key] == "Yes") {
            console.log("change touchPeopleHasCovidSymptom");
            $("input[name= 'touchPeopleHasCovidSymptom'][value='No']").prop(
              "checked",
              false
            );
            $("input[name= 'touchPeopleHasCovidSymptom'][value='Yes']").prop(
              "checked",
              true
            );
          }
          break;
        }

        default:
          $(selector).val(data[key]);
      }
    }
  }

  $(document).on("click", "button[name = 'edit']", function () {
    console.log("hit edit button");
    let form_id = $(this).attr("id");
    $.ajax({
      url: "fetch-single.php",
      method: "POST",
      data: {
        form_id: form_id,
      },
      dataType: "json",
      success: function (data) {
        console.log("receive data");
        $("#form_id").val(form_id);
        $("#isEdit").val("Yes");
        $("#declaration_form")[0].reset();
        $("#form-modal").modal("show");
        $(".modal-title").text("Sửa Khai báo y tế");
        $("#form-modal button[name='submit-btn']").text("Lưu thay đổi");
        $("#form-modal button[name='submit-btn']").show();
        console.log(data);
        loadDateToForm(data);
      },
    });
  });

  $(document).on("click", "button[name = 'view']", function () {
    console.log("hit view button");
    let form_id = $(this).attr("id");
    $.ajax({
      url: "fetch-single.php",
      method: "POST",
      data: {
        form_id: form_id,
      },
      dataType: "json",
      success: function (data) {
        console.log("receive data");
        $("#declaration_form")[0].reset();
        $("#form-modal").modal("show");
        $(".modal-title").text("Khai báo y tế");
        $("#form-modal button[name='submit-btn']").hide();
        console.log(data);
        loadDateToForm(data);
      },
    });
  });

  $(document).on("click", "button[name = 'delete']", function () {
    console.log("hit delete button");
    let form_id = $(this).attr("id");
    swal({
      title: "Bạn thật sự muốn xóa bản khai báo này?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "deleteForm.php",
          method: "POST",
          data: {
            form_id: form_id,
          },
          success: function (data) {
            if (data == "Success") {
              $("#form-table").DataTable().ajax.reload();
              swal("Bản khai báo đã được xóa!", {
                icon: "success",
              });
            } else {
              swal("Bản khai báo chưa được xóa!", {
                icon: "error",
              });
            }
          },
        });
      }
    });
  });
});
