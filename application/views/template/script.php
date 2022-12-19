<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>   
    <script src="<?php echo base_url('asset/js/vendor/jquery-1.12.0.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/ajex-lap.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/jquery.counterup.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/jquery.meanmenu.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/jquery-ui.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/wow.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/plugins.js'); ?>"></script>    
    <script src="<?php echo base_url('asset/inc/custom-slider/js/jquery.nivo.slider.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('asset/inc/custom-slider/home.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('asset/js/jquery.nice-select.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/jquery.magnific-popup.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/isotope.js'); ?>"></script> 
    <script src="<?php echo base_url('asset/js/jquery.bxslider.min.js'); ?>"></script>
    <script src="<?php echo base_url('asset/admin/js/ekko-lightbox/ekko-lightbox.js'); ?>"></script>
    <script src="<?php echo base_url('asset/js/main.js'); ?>"></script>
    <script>
    $(document).ready(function(){
      $('#pay_method').change(function(){
        var pay_id = $('#pay_method').val();
        if(pay_id != '') {
        $.ajax({
          url:"<?php echo base_url(); ?>enroll/fetch_payment",
          method:"POST",
          data:{pay_id:pay_id},
          success:function(data)
          {
            console.log(data);
            $('#pay_state').html(data);
          }
        });
        } else {
          $('#pay_state').html('<option value="">ၿမို႕ အမည္</option>');
        }
      });
    });
    </script>
    
  </body>
</html>
