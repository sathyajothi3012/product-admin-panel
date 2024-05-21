<?php


session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
include_once ("connection.php");
// Insert operation

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $productName = $_POST['product-name'];
    $productDescription = $_POST['product-description'];
    $productCategory = $_POST['product-category'];
    $productPrice = $_POST['product-price'];
    $productStatus = $_POST['radioInline'];
    $varient = $_POST['varient'];

    if ($_FILES["uploadfile"]["name"] != '') {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "upload/" . $filename;

        move_uploaded_file($tempname, $folder);
    } else {
        $folder = null;
    }
    $sql = "INSERT INTO products (name, description, category, price,file_name, varient,status) 
            VALUES ('$productName', '$productDescription', '$productCategory', '$productPrice','$folder','$varient', '$productStatus')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Product Added Successfully!";

    } else {
        $error_message = "Something wrong!";

    }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'pages/links.php'; ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
    <div id="wrapper">
        <?php include_once 'pages/header.php'; ?>
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">MJ Fresh Produce</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                                        <li class="breadcrumb-item active">Add Product</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add / Edit Product</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-box">
                                <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>

                                <?php if (isset($success_message)): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $success_message; ?>
                                    </div>

                                <?php endif; ?>
                                <?php if (isset($error_message)): ?>

                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error_message; ?>
                                    </div>
                                <?php endif; ?>
                                <form name="insertrecord" id="insertrecord" action="<?php echo $_SERVER['PHP_SELF']; ?>"
                                    method="post" enctype='multipart/form-data'>

                                    <div class="form-group mb-3">
                                        <label for="product-name">Product Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" id="product-name" name="product-name" class="form-control"
                                            placeholder="e.g : Apple iMac" required="">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="product-description">Product Description <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control" name="product-description"
                                            id="product-description" rows="5"
                                            placeholder="Please enter description"></textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="product-category">Categories <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control select2" id="product-category"
                                            name="product-category">
                                            <option value="">Select</option>
                                            <optgroup label="Fruits">
                                                <option value="Fruits 1">Fruits 1</option>
                                                <option value="Fruits 2">Fruits 2</option>
                                                <option value="Fruits 3">Fruits 3</option>
                                                <option value="Fruits 4">Fruits 4</option>
                                            </optgroup>
                                            <optgroup label="Vegetable">
                                                <option value="Vegetable 1">Vegetable 1</option>
                                                <option value="Vegetable 2">Vegetable 2</option>
                                                <option value="Vegetable 3">Vegetable 3</option>
                                                <option value="Vegetable 4">Vegetable 4</option>
                                            </optgroup>
                                            <optgroup label="Flowers">
                                                <option value="Flowers 1">Flowers 1</option>
                                                <option value="Flowers 2">Flowers 2</option>
                                                <option value="Flowers 3">Flowers 3</option>
                                                <option value="Flowers 4">Flowers 4</option>
                                            </optgroup>

                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="product-price">Price <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="product-price" id="product-price"
                                            placeholder="Enter amount">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="mb-2">Status <span class="text-danger">*</span></label>
                                        <br />
                                        <div class="radio form-check-inline">
                                            <input type="radio" id="inlineRadio1" value="Active" name="radioInline"
                                                checked="">
                                            <label for="inlineRadio1"> Active </label>
                                        </div>
                                        <div class="radio form-check-inline">
                                            <input type="radio" id="inlineRadio2" value="Inactive" name="radioInline">
                                            <label for="inlineRadio2"> Innactive </label>
                                        </div>
                                    </div>
                            </div> <!-- end card-box -->
                        </div> <!-- end col -->

                        <div class="col-lg-6">

                            <div class="card-box">
                                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>

                                <div class="dropzone" id="myAwesomeDropzone" data-plugin="dropzone"
                                    data-previews-container="#file-previews"
                                    data-upload-preview-template="#uploadPreviewTemplate">
                                    <div class="fallback">

                                        <input type="file" name="uploadfile" id="uploadfile" multiple>
                                    </div>

                                    <div class="dz-message needsclick">
                                        <i class="h1 text-muted dripicons-cloud-upload"></i>
                                        <h3>Drop files here or click to upload.</h3>
                                        <span class="text-muted font-13">(This is just a demo dropzone. Selected files
                                            are
                                            <strong>not</strong> actually uploaded.)</span>
                                    </div>
                                </div>

                                <!-- Preview -->
                                <div class="dropzone-previews mt-3" id="file-previews"></div>

                            </div> <!-- end col-->
                            <div class="card-box">
                                <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Add Varient (Multiple) Like... Red,
                                    Blue, Green Etc</h5>
                                <input type="text" id="varient" name="varient" class="form-control"
                                    placeholder="Add your Varients name seperated by comma">
                                <div class="dropzone-previews mt-3" id="file-previews"></div>

                            </div> <!-- end col-->

                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-3">
                                <button type="button" class="btn w-sm btn-light waves-effect">Cancel</button>
                                <button type="submit"
                                    class="btn w-sm btn-success waves-effect waves-light">Save</button>
                                <button type="button"
                                    class="btn w-sm btn-danger waves-effect waves-light">Delete</button>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    </form>

                    <!-- end row -->


                    <!-- file preview template -->
                    <div class="d-none" id="uploadPreviewTemplate">
                        <div class="card mt-1 mb-0 shadow-none border">
                            <div class="p-2">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">
                                    </div>
                                    <div class="col pl-0">
                                        <a href="javascript:void(0);" class="text-muted font-weight-bold"
                                            data-dz-name></a>
                                        <p class="mb-0" data-dz-size></p>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button -->
                                        <a href="#" class="btn btn-link btn-lg text-muted" data-dz-remove>
                                            <i class="dripicons-cross"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div> <!-- container -->

            </div> <!-- content -->
            <?php include_once 'pages/footer.php'; ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <?php include_once 'pages/script.php'; ?>
</body>

</html>