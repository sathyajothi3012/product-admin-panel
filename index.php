<?php
// Start the session
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
include_once ("connection.php");

$sql = "SELECT * FROM products ORDER BY `id` DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'pages/links.php'; ?>
</head>

<body class="loading"
    data-layout='{"mode": "light", "width": "fluid", "menuPosition": "fixed", "sidebar": { "color": "light", "size": "default", "showuser": false}, "topbar": {"color": "dark"}, "showRightSidebarOnPageLoad": true}'>
    <div id="wrapper">
        <?php include_once 'pages/header.php'; ?>
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bold</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                        <li class="breadcrumb-item active">Products</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Products</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <label for="inputPassword2" class="sr-only">Search</label>
                                                <input type="search" class="form-control" id="inputPassword2"
                                                    placeholder="Search">
                                            </div>
                                            <a href="ecommerce-product-edit.html"
                                                class="btn btn-danger waves-effect waves-light"><i
                                                    class="mdi mdi-plus-circle mr-1"></i> Search</a>
                                        </form>
                                    </div>
                                </div> <!-- end row -->
                            </div> <!-- end card-box -->
                        </div> <!-- end col-->
                    </div>
                    <!-- end row-->

                    <div class="row">
                        <?php if ($result->num_rows > 0) {
                            $cnt = 1;
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card-box product-box">
                                        <div class="bg-light">
                                            <img src="<?php echo htmlentities($row['file_name']); ?>" alt="product-pic"
                                                class="img-fluid" />
                                        </div>

                                        <div class="product-info">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h6 class="font-14"><a
                                                            class="text-dark"><?php echo htmlentities($row['name']); ?> - <span
                                                                class="varient_name<?php echo htmlentities($cnt); ?>"> </span>
                                                    </h6>
                                                    <p> <?php echo htmlentities($row['description']); ?></p>
                                                    <label for="options">Choose an option: </label>
                                                    <select name="options" id="options_value<?php echo htmlentities($cnt); ?>"
                                                        onchange="varientname(<?php echo htmlentities($cnt); ?>);">
                                                        <?php
                                                        $variants = explode(',', $row['varient']);

                                                        foreach ($variants as $variant) {
                                                            echo "<option value='" . htmlentities($variant) . "'>" . htmlentities($variant) . "</option>";
                                                        } ?>

                                                    </select>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="product-price-tag">
                                                        ₹ <?php echo htmlentities($row['price']); ?>
                                                    </div>
                                                </div>

                                            </div> <!-- end row -->
                                        </div> <!-- end product info-->
                                    </div> <!-- end card-box-->
                                </div>
                                <?php
                                $cnt++;

                            }
                        } ?>
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box product-box">
                                <div class="bg-light">
                                    <img src="assets/images/testimg.png" alt="product-pic" class="img-fluid" />
                                </div>

                                <div class="product-info">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14"><a class="text-dark">Product name - Varient name </h6>
                                            <p> Product Description here</p>
                                            <label for="options">Choose an option:</label>
                                            <select name="options" id="options">
                                                <option value="option1">Varient name 1</option>
                                                <option value="option2">Varient name 2</option>
                                                <option value="option3">Varient name 3</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <div class="product-price-tag">
                                                ₹ 19
                                            </div>
                                        </div>

                                    </div> <!-- end row -->
                                </div> <!-- end product info-->
                            </div> <!-- end card-box-->
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box product-box">



                                <div class="bg-light">
                                    <img src="assets/images/testimg.png" alt="product-pic" class="img-fluid" />
                                </div>

                                <div class="product-info">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14"><a class="text-dark">Product name - Varient name </h6>
                                            <p> Product Description here</p>
                                            <label for="options">Choose an option:</label>
                                            <select name="options" id="options">
                                                <option value="option1">Varient name 1</option>
                                                <option value="option2">Varient name 2</option>
                                                <option value="option3">Varient name 3</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <div class="product-price-tag">
                                                ₹ 19
                                            </div>
                                        </div>

                                    </div> <!-- end row -->
                                </div> <!-- end product info-->
                            </div> <!-- end card-box-->
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box product-box">



                                <div class="bg-light">
                                    <img src="assets/images/testimg.png" alt="product-pic" class="img-fluid" />
                                </div>

                                <div class="product-info">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14"><a class="text-dark">Product name - Varient name </h6>
                                            <p> Product Description here</p>
                                            <label for="options">Choose an option:</label>
                                            <select name="options" id="options">
                                                <option value="option1">Varient name 1</option>
                                                <option value="option2">Varient name 2</option>
                                                <option value="option3">Varient name 3</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <div class="product-price-tag">
                                                ₹ 19
                                            </div>
                                        </div>

                                    </div> <!-- end row -->
                                </div> <!-- end product info-->
                            </div> <!-- end card-box-->
                        </div> <!-- end col-->
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box product-box">



                                <div class="bg-light">
                                    <img src="assets/images/testimg.png" alt="product-pic" class="img-fluid" />
                                </div>

                                <div class="product-info">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="font-14"><a class="text-dark">Product name - Varient name </h6>
                                            <p> Product Description here</p>
                                            <label for="options">Choose an option:</label>
                                            <select name="options" id="options">
                                                <option value="option1">Varient name 1</option>
                                                <option value="option2">Varient name 2</option>
                                                <option value="option3">Varient name 3</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            <div class="product-price-tag">
                                                ₹ 19
                                            </div>
                                        </div>

                                    </div> <!-- end row -->
                                </div> <!-- end product info-->
                            </div> <!-- end card-box-->
                        </div> <!-- end col-->




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