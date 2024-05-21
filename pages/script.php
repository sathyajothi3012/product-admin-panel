<script src="assets/js/vendor.min.js"></script>
<script src="assets/libs/flatpickr/flatpickr.min.js"></script>
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/libs/selectize/js/standalone/selectize.min.js"></script>
<script src="assets/js/pages/dashboard-1.init.js"></script>
<script src="assets/js/app.min.js"></script>
<script src="assets/js/pages/datatables.init.js"></script>
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function () {
 
    $.validator.addMethod('filesize', function (value, element, param) {
      return this.optional(element) || (element.files[0].size <= param)
    }, 'File size must be less than {0}');


    $.validator.addMethod('alphaspacedot', function (value) {
      return /^[A-Za-z\. ]*$/.test(value);
    }, "Please enter only alphabetic characters,space and dot");

    $("#insertrecord").validate({
      rules: {
        'product-name': {
          required: true,
          alphaspacedot: true
        },
        'product-description': {
          required: true,
          alphaspacedot: true,
        },
        'product-category': {
          required: true,
        },
        'product-price': {
          required: true,
          number: true,
         
        },
        radioInline: {
          required: true,
        },
        uploadfile: {
          extension: "jpg,jpeg,png",
          filesize: 2097152, // 2MB in bytes
        }
      },
      messages: {
        'product-name': {
          required: "Please Enter your Product Name ",
          //alphaspacedot:"letter only allowed",
        },
        'product-description': {
          required: "Please Enter your Product Description ",
          alphaspacedot: "letter only allowed",
        },
        'product-category': {
          required: 'Please select your Product category',
        },
        'product-price': {
          required: 'This field is required',
          number: "Please enter a valid number",
        },
        radioInline: {
          required: 'This field is required',
        },
        uploadfile: {
            extension: "Please select a valid image file (jpg, jpeg, or png).",
            filesize: "The selected file must be less than 2MB in size.",
        }
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>
<script>

          function varientname(cnt) {
            // Get the select element by ID
            var selectElement = document.getElementById('options_value' + cnt);

            // Get the selected variant value
            var selectedVariant = selectElement.value;

            $('.varient_name' + cnt).text(selectedVariant);
          }


</script>