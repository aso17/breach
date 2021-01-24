 <!-- Bootstrap core JavaScript-->
 <script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
 <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?php echo base_url('js/sb-admin-2.min.js') ?>"></script>

 <!-- toastr -->
 <script src="<?php echo base_url('assets/toastr/toastr.min.js') ?>"></script>

 <script>
     <?php if ($this->session->flashdata('success')) { ?>
         toastr.success("<?php echo $this->session->flashdata('success'); ?>");
     <?php } else if ($this->session->flashdata('error')) { ?>
         toastr.error("<?php echo $this->session->flashdata('error'); ?>");
     <?php } else if ($this->session->flashdata('warning')) { ?>
         toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
     <?php } else if ($this->session->flashdata('info')) { ?>
         toastr.info("<?php echo $this->session->flashdata('info'); ?>");
     <?php } ?>
 </script>