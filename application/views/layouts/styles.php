<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/adminlte.css'); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap4.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css'); ?>">

<?php
//get current view
if($this->uri->segment(1) !== null) {
  $content_type = $this->uri->segment(1);
  switch ($content_type) {
        case 'users':
            echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">';
        break;
        case 'employees':
            echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">';
        break;
        case 'dashboard':
            echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">';
            echo '<link rel="stylesheet" type="text/css" href="' . base_url('assets/plugins/toaster/jquery.toast.min.css') . '">';
        break;
  }
}
?>
