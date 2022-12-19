<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?> 

<!-- Registration-area start Here -->
<div class="registration-area">
  <div class="container">
    <div class="row">
      <div class="form-controls">
        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 align-center">
          <div class="form-title">
              <h3>Student Register Confirm!</h3>
            </div>
            <div class="profile-view right-animate">
              <div class="form-controls">
              <?php 
                $attr = array('class' => "");
                echo form_open('auth/regist/store', $attr); 
            
                $data = array(
                  'name'  => 'name',
                  'type' => 'hidden',
                  'value' => $lists['name'],
                );
                echo form_input($data);
                  
                $data = array(
                  'name'  => 'email',
                  'type' => 'hidden',
                  'value' => $lists['email'],
                );
                echo form_input($data);
                
                $data = array(
                  'name'  => 'phone',
                  'type' => 'hidden',
                  'value' => $lists['phone'],
                );
                echo form_input($data);
                
                $data = array(
                  'name'  => 'password',
                  'type' => 'hidden',
                  'value' => $lists['password'],
                );
                echo form_input($data);                  
              ?> 
                <table class="member">
                  <tbody>
                    <tr>
                        <th>Name</th>
                        <td>: <?php echo $lists['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: <?php echo $lists['email']; ?></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>: <?php echo preg_replace("/([0-9]{2})([0-9]{4})([0-9]{4})/", "$1-$2-$3", $lists['phone']); ?></td>
                    </tr>                       
                    <tr>
                        <th>Password</th>
                        <td>: <i class="fa fa-asterisk" aria-hidden="true"></i><i class="fa fa-asterisk" aria-hidden="true"></i><i class="fa fa-asterisk" aria-hidden="true"></i><i class="fa fa-asterisk" aria-hidden="true"></i><i class="fa fa-asterisk" aria-hidden="true"></i><i class="fa fa-asterisk" aria-hidden="true"></i><i class="fa fa-asterisk" aria-hidden="true"></i></td>
                    </tr>    
                </tbody>
              </table>
            <br>
            <button class="btn-hr edit-btn">&nbsp;Register</button>
            <a href="<?php echo base_url('auth/regist'); ?>" class="btn-hr">&nbsp;Back</a>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
<!-- Registration-area end Here -->

<style type="text/css">
  .form-controls {
    width: 100%;
    margin: 0 auto;
}
table.member td {
    padding-left: 20px;
    font-family: system-ui, sans-serif;
}
  table.member th {
    position: relative;
    font-size: 18px;
    color: #444444;
    font-weight: 500;
    font-family: system-ui, sans-serif;
}
table.member th:before {
    position: absolute;
    content: "\f061";
    font-family: fontawesome;
    left: -45px;
    top: 18px;
    color: #ffffff;
    background: #c61508;
    width: 20px;
    height: 20px;
    line-height: 20px;
    text-align: center;
    border-radius: 50%;
    font-size: 12px;
}
table.member {
    width: 100%;
    border-radius: 30px;
    background: inherit;
    padding: 0px 0px 0px 45px;
    display: block;
}
table.member tbody {
    width: 100%;
    margin: 0 auto;
    display: block;
}
.profile-view h2 {
    text-align: center;
    margin-bottom: 0px;
    color: #c71507;
    padding-bottom: 10px;
    position: relative;
}
.profile-view h2:after {
    position: absolute;
    content: "";
    width: 60px;
    height: 3px;
    background: #c61508;
    left: 44%;
    bottom: 0;
}
.profile-view p.student {
    width: 100%;
    /* margin-bottom: 20px; */
    height: 45px;
    /* padding: 10px; */
    font-size: 16px;
    color: #444444;
    text-align: left;
    /* border: 1px solid #dddddd; */
}
.form-controls form input.addr{
    width: 100%;
    margin-bottom: 20px;
    height: 80px;
    padding: 10px;
    font-size: 16px;
    color: #444444;
    border: 1px solid #dddddd;
}
.profile {
    width: 150px;
    height: 150px;
    overflow: hidden;
    margin: 20px auto;
    border-radius: 100px;
}
@media screen and (max-width: 768px){
  table.member tbody {
    width: 80%;
}
  .profile {
    width: 100px;
    height: 100px;
    overflow: hidden;
    margin: 20px auto;
    border-radius: 100px;
}
table.member th {
    position: relative;
    font-size: 16px;
    color: #444444;
    font-family: 'Ubuntu', sans-serif;
}
.profile-view p.student {
    width: 100%;
    /* margin-bottom: 20px; */
    height: 45px;
    /* padding: 10px; */
    font-size: 16px;
    color: #444444;
    text-align: left;
    /* border: 1px solid #dddddd; */
}
textarea:focus {
    outline: none;
}
table.member {
    width: 100%;
    border-radius: 30px;
    background: inherit;
    padding: 0px;
    display: block;
}
table.member th:before {
    position: absolute;
    content: "\f061";
    font-family: fontawesome;
    left: -35px;
    right: 19px;
    top: 5px;
    color: #ffffff;
    background: #c61508;
    width: 20px;
    height: 20px;
    line-height: 20px;
    text-align: center;
    border-radius: 50%;
    font-size: 12px;
}
.profile-view h2:after {
    position: absolute;
    content: "";
    width: 60px;
    height: 3px;
    background: #c61508;
    left: 41%;
    bottom: 0;
}
.form-controls {
    width: 100%;
    margin: 0 auto;
}
table.member tr{
  display: block;
  margin-bottom: 10px;
}
table.member td {
  padding-left: 0px;
  line-height: 2;
}
table.member td {
    background: inherit;
    font-size: 16px;
}
}
</style>

<?php include(dirname(__FILE__) ."/../template/footer.php"); ?> 