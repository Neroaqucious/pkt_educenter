<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>            
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">JLS Applicant Management</h1>
    </div>
    
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/portal/student/add'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">add_circle</span></a>
      </div>
    </div>
  </div> 

  <?php if(!empty($_SESSION['msg_success'])){ ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Success!</strong>  <?php echo $_SESSION['msg_success']; ?> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" class="material-icons md-18">clear</span>
      </button>
    </div>
  <?php } ?>    

  <?php if(!empty($_SESSION['msg_error'])){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Warning!</strong>  <?php echo $_SESSION['msg_error']; ?> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" class="material-icons md-18">clear</span>
      </button>
    </div>
  <?php } ?>

  <div class="card">
    <div class="card-body">
      <div class="status-menu">
        <ul class="manage-menu tabs">
        <li class="tab-link current" data-tab="tab-1" style="color: #EA585A;"><a href="<?php echo base_url('adm/portal/jls_applicant/new'); ?>">New Applicant(10)</a></li>
              <li class="tab-link" data-tab="tab-2">Interview(10)</li>
              <li class="tab-link" data-tab="tab-3">Interview Failed(0)</li>
              <li>Admission(10)</li>
              <li>Admission Complete(10)</li>
              <li>COE Waiting(10)</li>
              <li>COE Result(10)</li>
              <li>Cancel(1)</li>
        </ul>
    </div>
    <div id="tab-1" class="tab-content current">     
      <table class="table table-striped bg-white text-nowrap table-responsive" id="studentDataOnline">   
      <thead>
        <tr class="text-center">
          <th>#</th>
          <!-- <th width="1">Student ID&nbsp;<a href="#" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-secondary">notifications_active</span></a>&nbsp;</th> -->
          <th>Applicant ID</th>
          <th>Applicant Name</th>
          <th>School Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Register Date</th>
          <th>Action</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $x = 1;
          $y = 0;
          foreach ($lists as $row) {
        ?>
        <tr>
          <th class="text-right"><?php echo $x; ?></th>
          <th width="1" class="text-left">
          <!-- <?php echo $row->user_id; ?> -->
            <span class="text-left">
              <?php foreach($course as $result) {
                if($row->id == $result->std_id && $result->status == 0) { $y++;
                } else { $y = 0; } ?>
                <?php if($y > 0) { 
                  if($y == 1) { ?>
                  <a href="<?php echo base_url('adm/portal/student/view/'.$row->id); ?>" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-danger">notifications_active</span></a>
              <?php } } } ?>
            </span>
          </th>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/student/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"></a>
          </td>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/student/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"></a>
          </td>
          <td class="text-left"></td>
          <td class="text-center"></td>
          <td class="text-center"></td>
          <!-- <td class="text-center"><?php if($row->activate_date == "30-11--0001 00:00:00"){ echo " - "; } else { echo $row->activate_date; } ?></td> -->
          <td class="text-center">
           
          <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
            <span class="material-icons md-20 align-middle">more_vert</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/student/edit/'.$row->id); ?>">Edit</a>
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/student/pdf/'.$row->id); ?>">Print PDF</a>
              <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/student/delete/'.$row->id); ?>">Delete</a>
            </div>
          </td>
          <td class="text-center">
            <?php if($row->status == 1) { ?>
              <span class="md-18">Register</span>
              <!-- <a class="text-success" onclick="return confirm('Are you want to deactive this student status?');" data-toggle="tooltip" data-placement="top" title="Active" href="<?php echo base_url('adm/portal/student/deactivated/'.$row->id); ?>"><span class="material-icons align-middle md-18">Register</span></a> -->
           
            <?php } ?>
            <?php if($row->status == 0) { ?>
              <span class="md-18">Register</span>
              <!-- <a class="text-success" onclick="return confirm('Are you want to deactive this course permission?');" data-toggle="tooltip" data-placement="top" title="Allow" href="<?php echo base_url('adm/portal/student/permission/deactivated/'.$row->id); ?>"><span class="material-icons align-middle md-18">Register</span></a> -->
           
            <?php } ?>
         
            </div>
          </td>
        </tr>
        <?php $x++; } ?>
      </tbody>
        </div>
    </table>
  </div>
    <div id="tab-2" class="tab-content">    
      <table class="table table-striped bg-white text-nowrap table-responsive" id="studentDataLocal">      
      <thead>
        <tr class="text-center">
          <th>#</th>
          <!-- <th width="1">Student ID&nbsp;<a href="#" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-secondary">notifications_active</span></a>&nbsp;</th> -->
          <th>Applicant ID</th>
          <th>Applicant Name</th>
          <th>School Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Register Date</th>
          <th>Interview Date</th>
          <th>Action</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $x = 1;
          $y = 0;
          foreach ($lists as $row) {
        ?>
        <tr>
          <th class="text-right"><?php echo $x; ?></th>
          <th width="1" class="text-left">
          <!-- <?php echo $row->user_id; ?> -->
            <span class="text-left">
              <?php foreach($course as $result) {
                if($row->id == $result->std_id && $result->status == 0) { $y++;
                } else { $y = 0; } ?>
                <?php if($y > 0) { 
                  if($y == 1) { ?>
                  <a href="<?php echo base_url('adm/portal/student/view/'.$row->id); ?>" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-danger">notifications_active</span></a>
              <?php } } } ?>
            </span>
          </th>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/student/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"></a>
          </td>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/student/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"></a>
          </td>
          <td class="text-left"></td>
          <td class="text-center"></td>
          <td class="text-center"></td>
          <td class="text-center"></td>
          <!-- <td class="text-center"><?php if($row->activate_date == "30-11--0001 00:00:00"){ echo " - "; } else { echo $row->activate_date; } ?></td> -->
          <td class="text-center">
           
          <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
            <span class="material-icons md-20 align-middle">more_vert</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/student/edit/'.$row->id); ?>">Edit</a>
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/student/pdf/'.$row->id); ?>">Print PDF</a>
              <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/student/delete/'.$row->id); ?>">Delete</a>
            </div>
          </td>
          <td class="text-center">
            <?php if($row->status == 1) { ?>
              <span class="md-18">Register</span>
              <!-- <a class="text-success" onclick="return confirm('Are you want to deactive this student status?');" data-toggle="tooltip" data-placement="top" title="Active" href="<?php echo base_url('adm/portal/student/deactivated/'.$row->id); ?>"><span class="material-icons align-middle md-18">Register</span></a> -->
           
            <?php } ?>
            <?php if($row->status == 0) { ?>
              <span class="md-18">Register</span>
              <!-- <a class="text-success" onclick="return confirm('Are you want to deactive this course permission?');" data-toggle="tooltip" data-placement="top" title="Allow" href="<?php echo base_url('adm/portal/student/permission/deactivated/'.$row->id); ?>"><span class="material-icons align-middle md-18">Register</span></a> -->
           
            <?php } ?>
         
            </div>
          </td>
        </tr>
        <?php $x++; } ?>
      </tbody>
    </table>
    </div>
    </div>
  </div>

<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>
<script>
  $(document).ready(function(){
	
	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})

})
</script>
<style>
ul.manage-menu {
    display: flex;
    width: 100%;
    border-top: 1px solid #cccc;
    border-bottom: 1px solid #cccc;
    padding: 10px;
    background: #f5f5f5;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
}
.status-menu{
    display: block;
    width: 100%;;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
}
ul.manage-menu li {
    position: relative;
    padding-right: 40px;
    font-weight: 400;
    white-space: nowrap;
}
ul.manage-menu li:last-child{
  /* padding-right: 0px; */
}
ul.manage-menu li:last-child::after{
  content: "";
  position: absolute;
  padding-left: 15px;
}
ul.manage-menu li::after{
  content: "|";
  position: absolute;
  padding-left: 15px;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
ul.tabs{
	margin: 0px;
	padding: 10px;
	list-style: none;
}
ul.tabs li{
	background: none;
	color: #222;
	display: inline-block;
	/* padding: 10px 15px; */
	cursor: pointer;
}

ul.tabs li.current{
	background: #ededed;
	color: #222;
}

.tab-content{
	display: none;
	background: #ededed;
	padding: 15px;
}

.tab-content.current{
	display: inherit;
}
a {
    color: #EA585A;
    text-decoration: none;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
a:hover {
    color: #000000;
    /* text-decoration: underline; */
}
</style>

