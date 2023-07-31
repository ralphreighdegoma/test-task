<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- Load styles -->
    <?php $this->load->view('layouts/styles'); ?>
</head>
    <body class="hold-transition login-page">
        <div class="wrapper">
            <!-- Main content goes here -->
            <div class="content">
                <?php echo $content; ?>
            </div>
        </div>
    </body>
    <!-- Load scripts -->
    <?php $this->load->view('layouts/scripts'); ?>
</body>
</html>
