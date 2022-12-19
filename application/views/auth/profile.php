<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../template/header.php"); ?>
<?php include(dirname(__FILE__) ."/../template/breadcrumbs.php"); ?> 
<div class="courseone-area">
  <div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">

          <?php if(!empty($_SESSION['msg_success'])){ ?>
            <div class="alert alert-success alert-dismissible show" role="alert">
              <strong>Success!</strong>  <?php echo $_SESSION['msg_success']; ?> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class="fa fa-close"></span>
              </button>
            </div>
          <?php } ?>    

          <?php if(!empty($_SESSION['msg_error'])){ ?>
            <div class="alert alert-danger alert-dismissible show" role="alert">
              <strong>Warning!</strong>  <?php echo $_SESSION['msg_error']; ?> 
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span class="fa fa-close"></span>
              </button>
            </div>
          <?php } ?>
        <div class="courseone-view right-animate">
          <div class="profile-view right-animate">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="view-area fix">
                  <div class="view-title floatleft">
                    <h4 class="heading-padding"><i class="fa fa-info-circle"></i>&nbsp; My Profiles</h4>
                  </div>
                </div>
              </div>
            </div>
          
          <div class="profile">
            <?php if($result->image_file == "") { ?>
              <img src="<?php echo base_url('asset/admin/images/user.png'); ?>">
            <?php } else { ?>
              <img src="<?php echo base_url('upload/assets/adm/usr/'.$result->image_file); ?>">
            <?php } ?>
          </div>
          <div class="form-controls">
            <table class="member">
              <tbody>
                  <tr>
                    <th>Student ID</th>
                    <td>: <?php echo check_data($result->student_id); ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>: <?php echo check_data($result->name); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>: <?php echo check_data($result->email); ?></td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>: <?php echo preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", check_data($result->phone)) ?></td>
                </tr>                       
                  <tr>
                    <th>Address</th>
                    <td>: <?php echo check_data($result->address); ?></td>
                </tr>
                  <tr>
                    <th>Birthday</th>
                    <td>: <?php echo check_data($result->birthday); ?></td>
                </tr>
                  <tr>
                    <th>NRC</th>
                    <td>: <?php echo check_data($result->nrc); ?></td>
                </tr>
                  <tr>
                    <th>Education</th>
                    <td>: <?php echo check_data($result->education); ?></td>
                </tr>
                  <tr>
                    <th>Social Account</th>
                    <td>: <?php echo check_data($result->social); ?></td>
                </tr>
            </tbody>
          </table>
          <a href="<?php echo base_url('student/edit'); ?>" class="btn-hr edit-btn">&nbsp;Edit Profile</a>
          </div>
        </div>
      </div>
      </div>
      <?php include("sidebar_dashboard.php"); ?> 
    </div>
  </div>
</div>

<style type="text/css">
  .form-controls {
    width: 80%;
    margin: 0 auto;
}
table.member td {
    background: inherit;
    font-size: 18px;
    font-family: system-ui,'Ubuntu', sans-serif;
    line-height: 3;
    padding-right: 0px;
    padding-left: 20px;
}
  table.member th {
    position: relative;
    font-size: 18px;
    color: #444444;
    font-family: system-ui,'Ubuntu', sans-serif;
}
table.member th:before {
    position: absolute;
    content: "\f061";
    font-family: fontawesome;
    left: -40px;
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
    padding: 0px 0px 0px 22px;
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