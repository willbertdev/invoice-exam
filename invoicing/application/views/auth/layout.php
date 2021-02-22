
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?= $layout['title'] ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Invoice Exam" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

		<!-- App css -->
		<link href="../assets/css/bootstrap-modern.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
		<link href="../assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

		<link href="../assets/css/bootstrap-modern-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
		<link href="../assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />
		<link href="../assets/css/jquery.toast.min.css" rel="stylesheet" type="text/css" id="jquery-toast-stylesheet" />

		<!-- icons -->
		<link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="loading authentication-bg authentication-bg-pattern">

        <?= $content ?>


        <footer class="footer footer-alt text-white-50">
            <script>document.write(new Date().getFullYear())</script> &copy; Invoice Exam
        </footer>

        <!-- Vendor js -->
        <script src="../assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.min.js"></script>

        <!-- Toast js -->
        <script src="../assets/js/jquery.toast.min.js"></script>

        <!-- Auth js -->
        <script src="../assets/js/theme.js"></script>

        <!-- Auth js -->
        <script src="../assets/js/auth.js"></script>
        
    </body>
</html>