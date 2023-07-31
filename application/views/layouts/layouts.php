<!DOCTYPE html>
<html>
<head>
    <title></title>
    <!-- Load styles -->
    <?php $this->load->view('layouts/styles'); ?>
</head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Load the navbar and sidebar components -->
            <?php $this->load->view('layouts/navbar'); ?>
            <?php $this->load->view('layouts/sidebar'); ?>

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
