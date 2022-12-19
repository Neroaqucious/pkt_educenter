<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?>
<!-- Registration-area start Here -->
  <div class="login-area">
      <div class="container">
        <div class="row">
          <div class="form-controls">
            <?php
              $attr = array('class' => "");
              echo form_open('auth/login', $attr);
            ?>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 align-center">
                <div class="form-title">
                  <h3>Log in your account</h3>
                </div>
                <div class="login-form">
                  <label for="first-name">Email *</label>
                    <?php
                      $data = array(
                        'name'  => 'email',
                        'type' => 'email',
                        'placeholder' => '',
                        'id' => 'email',
                        'autocomplete' => "new-email"
                      );
                      echo form_input($data);
                    ?>
                    
                    <label for="password">Password *</label>
                      <?php
                        $data = array(
                          'name'  => 'password',
                          'type' => 'password',
                          'placeholder' => '',
                          'id' => 'password',
                          'autocomplete' => "new-password"
                        );
                        echo form_input($data);
                      ?>
                  </div>
                </div>
              
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 align-center">
                  <div class="registaration-btn ">
                    <button class="btn-icon">&nbsp;Login</button>
                    <a href="<?php echo base_url('auth/regist'); ?>" class="float-right">Do not have an account?</a>
                  </div>
                  <br>
                  <!-- error report area -->
                    <?php if(!empty($msg)){ ?>
                      <div class="alert alert-danger alert-dismissible show" role="alert">
                      <?php echo $msg; ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" class="fa fa-close"></span>
                      </button>
                    </div>
                  <?php } ?>
                <!-- error report area -->
                </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>

<!-- Registration-area end Here -->
  <?php include(dirname(__FILE__) ."/../template/footer.php"); ?>