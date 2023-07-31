

<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js'); ?>"></script>

<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo base_url('assets/plugins/chart.js/Chart.min.js'); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/plugins/sparklines/sparkline.js'); ?>"></script>
<!-- JQVMap -->
<script src="<?php echo base_url('assets/plugins/jqvmap/jquery.vmap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/jqvmap/maps/jquery.vmap.usa.js'); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/plugins/jquery-knob/jquery.knob.min.js'); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js'); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
<!-- Summernote -->
<script src="<?php echo base_url('assets/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<!-- overlayScrollbars -->
<!-- <script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js'); ?>"></script> -->
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/adminlte.min.js'); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/js/demo.js'); ?>"></script>


<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>


<?php



if($this->uri->uri_string !== null) {
  $content_type = $this->uri->uri_string;
  echo $content_type;
  switch ($content_type) {
      case 'users':
          echo '<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>';
          echo '<script src="' . base_url('assets/js/user.js') . '"></script>';
      break;
      case 'employees':
        echo '<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>';
        echo '<script src="' . base_url('assets/js/employees.js') . '"></script>';
      break;
      case 'user/create':
        echo '<script src="' . base_url('assets/js/user_create.js') . '"></script>';
       break;
      case 'employee/create':
        echo '<script src="' . base_url('assets/js/employee_create.js') . '"></script>';
      break;
      case 'dashboard':
        echo '<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>';
        echo '<script src="https://unpkg.com/html5-qrcode"></script>';
        echo '<script src="' . base_url('assets/plugins/toaster/jquery.toast.min.js') . '"></script>';
        echo '<script src="' . base_url('assets/js/dashboard.js') . '"></script>';
      break;
      case 'login':
        echo '<script src="' . base_url('assets/js/login.js') . '"></script>';
       break;
  }
}
?>
