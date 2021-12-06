$(function () {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $.validator.addMethod(
    "validInputCountryPassing",
    function (value, element) {
      if ($("input[name='showCountryPassing']:checked").val() == "Yes") {
        if (value == "") return false;
      }
      return true;
    },
    "Bạn chưa nhập lịch sử đi lại."
  );

  $.validator.addMethod(
    "validInputSymptom",
    function (value, element) {
      if ($("input[name='showSymptom']:checked").val() == "Yes") {
        if (value == "") return false;
      }
      return true;
    },
    "Bạn chưa nhập triệu chứng."
  );
  console.log(123);
  $(".error").remove();

  $("#declaration_form").validate({
    rules: {
      inputName: "required",

      inputID: "required",
      inputDOB: {
        required: true,
      },

      inputNation: "required",
      inputProvince: "required",
      inputDistrict: "required",
      inputWard: "required",
      inputDetailAddress: "required",
      inputPhone: "required",
      inputCountryPassing: {
        validInputCountryPassing: true,
      },

      inputSymptom: {
        validInputSymptom: true,
      },
    },
    // Specify validation error messages
    messages: {
      inputName: "Bạn chưa nhập tên.",
      inputID: "Bạn chưa nhập CMT/CCCD",
      inputDOB: {
        required: "Bạn chưa nhập ngày sinh.",
        //dateITA: "Ngày phải theo định dạng: dd/mm/yyyy",
      },
      inputNation: "Bạn chưa chọn quốc tịch",
      inputProvince: "Bạn chưa chọn thành phố",
      inputDistrict: "Bạn chưa chọn quận huyện",
      inputWard: "Bạn chưa chọn xã phường",
      inputDetailAddress: "Bạn chưa nhập địa chỉ",
      inputPhone: "Bạn chưa nhập số điện thoại",
    },

    errorPlacement: function (error, element) {
      error.insertAfter(element);
    },

    submitHandler: function (form) {},
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
  });
});

$(document).ready(function () {
  $("input[name='showSymptom']").click(() => {
    val = $("input[name='showSymptom']:checked").val();
    if (val === "Yes") {
      $("#inputSymptom").show();
    } else {
      $("#inputSymptom").hide();
    }
  });

  $("input[name='showCountryPassing']").click(() => {
    val = $("input[name='showCountryPassing']:checked").val();
    if (val === "Yes") {
      $("#inputCountryPassing").show();
    } else {
      $("#inputCountryPassing").hide();
    }
  });

  $("#inputProvince").change(function (event) {
    console.log("Province is changed");
    provinceID = $("#inputProvince").val();
    $.post(
      "district.php",
      {
        provinceID: provinceID,
      },
      (data) => {
        $("#inputDistrict").html(data);
      }
    );
  });

  $("#inputDistrict").change(function (event) {
    console.log("District is changed");
    districtID = $("#inputDistrict").val();
    $.post(
      "ward.php",
      {
        districtID: districtID,
      },
      (data) => {
        $("#inputWard").html(data);
      }
    );
  });

  $("form").submit(function (event) {
    event.preventDefault();
    $(".invalid-feedback").remove();
    let arr = $(".is-invalid");
    for (let x of arr) {
      console.log(x);
      x.classList.remove("is-invalid");
    }
    console.log("Submit");
    console.log($("form").valid());
    if (!$("form").valid()) return false;

    $.ajax({
      type: "POST",
      url: "addForm.php",
      data: $("form").serialize(),
      cache: false,
      processData: false,
      dataType: "json",
      encode: true,
    }).done(function (data) {
      console.log(data);
      if (!data.success) {
        let input_list = $("input");
        for (let node of input_list) {
          // console.log(node.name);
          let name = node.name;
          let selector = "input[name=" + name + "]";
          if (data.errors[name] != undefined) {
            // Error exists, Invalid
            $(selector).attr("class", "form-control is-invalid");
            $(selector)
              .parent()
              .append(
                '<div class="invalid-feedback">' + data.errors[name] + "</div>"
              );
          }
        }

        let getFirstElement = (arr) => {
          for (let prop in arr) {
            return prop;
          }
        };
        let x = getFirstElement(data.errors);
        let first_error_selector = "input[name=" + x + "]";
        console.log(x);
        $("html, body").animate({
          scrollTop: $(first_error_selector).offset().top,
        });
      } else {
        swal({
          title: "Thành Công!",
          text: "Bạn đã gửi tờ khai!",
          icon: "success",
          button: "OK",
        }).then(() => {
          location.reload(true);
        });
      }
    });
  });
});
