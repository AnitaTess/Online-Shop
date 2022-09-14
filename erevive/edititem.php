<?php
session_start(); // Enable sessions

// If session isn't set, then the user isn't logged in - redirect them
if (!isset($_SESSION['user_id'])) {
    header('location:login.php?error=notloggedin');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>editadd</title>
    <link rel="stylesheet" href="assets1/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bevan">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Black+Ops+One">
    <link rel="stylesheet" href="assets1/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets1/css/Animated-Pretty-Product-List-v12.css">
    <link rel="stylesheet" href="assets1/css/Filter.css">
    <link rel="stylesheet" href="assets1/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets1/css/Grid-and-List-view-V10-1.css">
    <link rel="stylesheet" href="assets1/css/Grid-and-List-view-V10.css">
    <link rel="stylesheet" href="assets1/css/Header-Dark.css">
    <link rel="stylesheet" href="assets1/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets1/css/styles.css">
</head>

<body style="background: #ccd8ea;">
    <div>
            <nav class="navbar navbar-dark navbar-expand-lg navigation-clean-search" style="background: #3f6591;">
                <div class="container"><a class="navbar-brand" style="color: rgb(172,188,218);font-size: 30px;font-family: 'Black Ops One', cursive;" href="index.php">eRevive.com</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                    <div style= "margin-left: auto; margin-right: 0;">
                        <p class="navbar-text" style="font-size: 20px;padding: 0px;margin: 0px;">Hello, <?php
            echo $_SESSION['email'];
            ?></p>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="manageitems.php" style="color: rgb(255,255,255);">Manage Items</a></div>
                    </div>
                </div>
            </nav>
    </div>
    <div style="background: #ccd8ea;padding: 9px;">
        <h1 style="text-align: center;">Item edit:</h1>
        <div class="table-responsive table-bordered" style="background: #ccd8ea;border-style: solid;">
        <form action="edit.inc.php" enctype="multipart/form-data" method="POST">
            <table class="table table-striped table-bordered table-dark">
                <thead>
                    <tr>
                        <th style="text-align: center;">Picture</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Category</th>
                        <th class="text-center">Brand</th>
                        <th class="text-center">Product's Age</th>
                        <th class="text-center">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" style="text-align: center;"><input type="file" style="text-align: center;" id="image" name="image" class="form-control"></td>

                        <td class="text-center"> <input type="text" id="name" name="name" class="form-control" placeholder="Product's Name" <?php if (isset($_GET['name'])) {
                                                                                                                        echo 'value="' . $_GET['name'] . '"';
                                                                                                                    } ?>></td>
                        <td class="text-center"><select type="text" id="category" name="category" class="form-control" required="">
                                <option value="Phones" selected="">Phones</option>
                                <option value="Laptops">Laptops</option>
                                <option value="Computers">Computers</option>
                                <option value="Computer equipment">Computer equipment</option>
                                <option value="Printers">Printers</option>
                                <option value="Consoles">Consoles</option>
                                <option value="Music devices">Music devices</option>
                                <option value="Others">Others</option>
                            </select></td>

                        <td class="text-center"><select type="text" id="brand" name="brand" class="form-control" required="">
                                <option value="Apple" selected="">Apple</option>
                                <option value="Samsung">Samsung</option>
                                <option value="LG">LG</option>
                                <option value="Microsoft">Microsoft</option>
                                <option value="Dell">Dell</option>
                                <option value="ASUS">ASUS</option>
                                <option value="SONY">SONY</option>
                                <option value="HP">HP</option>
                                <option value="Xiomi">Xiomi</option>
                                <option value="Huawei">Huawei</option>
                                <option value="Nokia">Nokia</option>
                                <option value="Other">Other</option>
                            </select></td>

                        <td class="text-center">
                        <input type="number" name="age" id="age" placeholder="Age in years" style="width: 130px;">
                        </td>
                        <td class="text-center"><input type="number" step="0.01" name="price" id="price" placeholder="£" style="width: 130px;"></td>
                    </tr>
                    <tr>
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        <td class="text-center" colspan="7"><input type="submit" name="submitit" value="Submit" class="btn btn-primary"></td>
                    </tr>
                </tbody>
            </table></form>
        </div>
    </div>
    <div class="footer-basic" style="background: #3f6591;">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram" style="color: rgb(255,255,255);"></i></a><a href="#"><i class="icon ion-social-snapchat" style="color: rgb(255,255,255);"></i></a><a href="#"><i class="icon ion-social-twitter" style="color: rgb(255,255,255);"></i></a><a href="#"><i class="icon ion-social-facebook" style="color: rgb(255,255,255);"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#" style="color: rgb(255,255,255);">United Kingdom</a></li>
                <li class="list-inline-item"><a href="#" style="color: rgb(255,255,255);">+44 666 666 777</a></li>
                <li class="list-inline-item"><a href="#" style="color: rgb(255,255,255);">erevive@gmail.com</a></li>
                <li class="list-inline-item"><a href="#" style="color: rgb(255,255,255);">www.erevive.com</a></li>
                <li class="list-inline-item"><a href="#" style="color: rgb(255,255,255);">"Recycle, Sell, No Waste"</a></li>
            </ul>
            <p class="copyright">eRevive.com © 2021</p>
        </footer>
    </div>
    <script src="assets1/js/jquery.min.js"></script>
    <script src="assets1/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets1/js/Animated-Pretty-Product-List-v12.js"></script>
    <script src="assets1/js/Grid-and-List-view-V10.js"></script>
</body>

</html>