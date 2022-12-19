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
      <a href="<?php echo base_url('adm/portal/jls_applicant/add'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">add_circle</span></a>
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
        <li class="tab-link current" data-tab="tab-1" style="color: #EA585A;"><a href="<?php echo base_url('adm/portal/jls_applicant/'); ?>">New Applicant(<?php  echo $registerlists[0]->totalRegister ?>)</a></li>
              <li class="tab-link" data-tab="tab-2">Interview(<?php  echo $interlists[0]->totalInter ?>)</li>
              <li class="tab-link" data-tab="tab-3">Interview Failed(<?php  echo $interfail[0]->totalInterFail ?>)</li>
              <li class="tab-link" data-tab="tab-4">Admission(<?php  echo $admisslists[0]->totalAdmission ?>)</li>
              <li class="tab-link" data-tab="tab-5">Admission Complete(<?php  echo $admisscomplete[0]->totalAdmissCompete ?>)</li>
              <li class="tab-link" data-tab="tab-6">COE Waiting(<?php  echo $coewait[0]->totalCOEWait ?>)</li>
              <li class="tab-link" data-tab="tab-7">COE Result(<?php  echo $coeresult[0]->totalCOEResult ?>)</li>
              <li class="tab-link" data-tab="tab-8">Cancel(<?php  echo $cancellists[0]->totalCancel ?>)</li>
        </ul>
        
    </div>
    <div id="tab-1" class="tab-content current">     
      <table class="table table-striped bg-white text-nowrap table-responsive" id="studentDataOnline">   
      <thead>
        <tr class="text-center">
          <th>No</th>
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
        <?php if($row->appli_status == 'Register') { ?>
          <th class="text-right"><?php echo $x; ?></th>
          <th width="1" class="text-left">
          <?php echo $row->applicant_id; ?>
            <span class="text-left">
              <?php foreach($lists as $result) {
                // if($row->id == $result->std_id && $result->status == 0) { $y++;
                // } else { $y = 0; } ?>
                <?php if($y > 0) { 
                  if($y == 1) { ?>
                  <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'); ?>" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-danger">notifications_active</span></a>
              <?php } } } ?>
            </span>
          </th>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->applicant_name; ?></a>
          </td>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->jls_name; ?></a>
          </td>
          <td class="text-left"><?php echo $row->std_email; ?></td>
          <td class="text-left"><?php echo $row->info_phone; ?></td>
          <td class="text-center"><?php echo $row->register_date; ?></td>
          <td class="text-center">
           
          <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
            <span class="material-icons md-20 align-middle">more_vert</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/edit/'.$row->id); ?>">Edit</a>
              <!-- <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/fukuoka_interview/'.$row->id); ?>">Print PDF</a> -->
              <div class="dropdown-item" style="_blank">
              <?php 
                if($row->jls_name =='ECC'){
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_interview/$row->id","Interview PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
              ?>
              </div>
              <div class="dropdown-item">
              <?php 
               if($row->jls_name =='ECC'){
                echo anchor("adm/portal/jls_applicant/ecc_admission/$row->id","Admission PDF");
              }elseif($row->jls_name == 'shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'JCLI'){ 
                  echo anchor("adm/portal/jls_applicant/jcli_admission/$row->id","Admission PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ojls_admission/$row->id","Admission PDF");
                }
              ?>
              </div>
              <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/delete/'.$row->id); ?>">Delete</a>
            </div>
          </td>
          <td class="text-center">
          <span class="md-18"><?php echo $row->appli_status; ?></span>
           
         
            </div>
          </td>
         <?php } ?>
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
          <th>No</th>
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
        <?php if($row->appli_status == 'Interview') { ?>
          <th class="text-right"><?php echo $x; ?></th>
          <th width="1" class="text-left">
          <?php echo $row->applicant_id; ?>
            <span class="text-left">
              <?php foreach($lists as $result) {
                // if($row->id == $result->std_id && $result->status == 0) { $y++;
                // } else { $y = 0; } ?>
                <?php if($y > 0) { 
                  if($y == 1) { ?>
                  <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'); ?>" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-danger">notifications_active</span></a>
              <?php } } } ?>
            </span>
          </th>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->applicant_name; ?></a>
          </td>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->jls_name; ?></a>
          </td>
          <td class="text-left"><?php echo $row->std_email; ?></td>
          <td class="text-center"><?php echo $row->info_phone; ?></td>
          <td class="text-center"><?php echo $row->register_date; ?></td>
          <td class="text-center"><?php echo $row->interview_date; ?></td>
          <td class="text-center">
           
          <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
            <span class="material-icons md-20 align-middle">more_vert</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/edit/'.$row->id); ?>">Edit</a>
              <!-- <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/fukuoka_interview/'.$row->id); ?>">Print PDF</a> -->
              <div class="dropdown-item" style="_blank">
              <?php 
                if($row->jls_name =='ECC'){
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_interview/$row->id","Interview PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
              ?>
              </div>
              <div class="dropdown-item">
              <?php 
               if($row->jls_name =='ECC'){
                echo anchor("adm/portal/jls_applicant/ecc_admission/$row->id","Admission PDF");
              }elseif($row->jls_name == 'shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'JCLI'){ 
                  echo anchor("adm/portal/jls_applicant/jcli_admission/$row->id","Admission PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ojls_admission/$row->id","Admission PDF");
                }
              ?>
              </div>
              <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/delete/'.$row->id); ?>">Delete</a>
            </div>
          </td>
          <td class="text-center"><?php echo $row->appli_status; ?></td>
          <?php } ?>
        </tr>
        <?php $x++; } ?>
      </tbody>
        </div>
    </table>
  </div>
    <div id="tab-3" class="tab-content">    
      <table class="table table-striped bg-white text-nowrap table-responsive" id="studentDataLocal">      
      <thead>
        <tr class="text-center">
          <th>No</th>
          <!-- <th width="1">Student ID&nbsp;<a href="#" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-secondary">notifications_active</span></a>&nbsp;</th> -->
          <th>Applicant ID</th>
          <th>Applicant Name</th>
          <th>School Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Register Date</th>
          <th>Failed Date</th>
          <th>Inter Fail Times</th>
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
        <?php if($row->appli_status == 'Interview Failed') { ?>
          <th class="text-right"><?php echo $x; ?></th>
          <th width="1" class="text-left">
          <?php echo $row->applicant_id; ?>
            <span class="text-left">
              <?php foreach($lists as $result) {
                // if($row->id == $result->std_id && $result->status == 0) { $y++;
                // } else { $y = 0; } ?>
                <?php if($y > 0) { 
                  if($y == 1) { ?>
                  <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'); ?>" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-danger">notifications_active</span></a>
              <?php } } } ?>
            </span>
          </th>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->applicant_name; ?></a>
          </td>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->jls_name; ?></a>
          </td>
          <td class="text-left"><?php echo $row->std_email; ?></td>
          <td class="text-center"><?php echo $row->info_phone; ?></td>
          <td class="text-center"><?php echo $row->register_date; ?></td>
          <td class="text-center"><?php echo $row->inter_fail_date; ?></td>
          <td class="text-center"><?php echo $row->inter_fail_times; ?></td>
          <td class="text-center">
           
           <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
             <span class="material-icons md-20 align-middle">more_vert</span></a>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
             <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/edit/'.$row->id); ?>">Edit</a>
               <!-- <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/fukuoka_interview/'.$row->id); ?>">Print PDF</a> -->
               <div class="dropdown-item" style="_blank">
               <?php 
                 if($row->jls_name =='ECC'){
                   echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                 }
                 elseif($row->jls_name == 'shizuoka'){ 
                   echo anchor("adm/portal/jls_applicant/shizuoka_interview/$row->id","Interview PDF");
                 }
                 elseif($row->jls_name == 'Fukuoka'){ 
                   echo anchor("adm/portal/jls_applicant/fukuoka_interview/$row->id","Interview PDF");
                 }
                 else{ 
                   echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                 }
               ?>
               </div>
               <div class="dropdown-item">
               <?php 
                if($row->jls_name =='ECC'){
                 echo anchor("adm/portal/jls_applicant/ecc_admission/$row->id","Admission PDF");
               }elseif($row->jls_name == 'shizuoka'){ 
                   echo anchor("adm/portal/jls_applicant/shizuoka_admission/$row->id","Admission PDF");
                 }
                 elseif($row->jls_name == 'Fukuoka'){ 
                   echo anchor("adm/portal/jls_applicant/fukuoka_admission/$row->id","Admission PDF");
                 }
                 elseif($row->jls_name == 'JCLI'){ 
                   echo anchor("adm/portal/jls_applicant/jcli_admission/$row->id","Admission PDF");
                 }
                 else{ 
                   echo anchor("adm/portal/jls_applicant/ojls_admission/$row->id","Admission PDF");
                 }
               ?>
               </div>
               <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/delete/'.$row->id); ?>">Delete</a>
             </div>
           </td>
           <td class="text-center">
          <span class="md-18"><?php echo $row->appli_status; ?></span>
           </td>
          <?php } ?>
        </tr>
        <?php $x++; } ?>
      </tbody>
    </table>
    </div>
    <div id="tab-4" class="tab-content">    
      <table class="table table-striped bg-white text-nowrap table-responsive" id="studentDataLocal">      
      <thead>
        <tr class="text-center">
          <th>No</th>
          <!-- <th width="1">Student ID&nbsp;<a href="#" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-secondary">notifications_active</span></a>&nbsp;</th> -->
          <th>Applicant ID</th>
          <th>Applicant Name</th>
          <th>School Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Register Date</th>
          <th>Admission Date</th>
          <th>Collect Date Exp Date	</th>
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
        <?php if($row->appli_status == 'Admission') { ?>
          <th class="text-right"><?php echo $x; ?></th>
          <th width="1" class="text-left">
          <?php echo $row->applicant_id; ?>
            <span class="text-left">
              <?php foreach($lists as $result) {
                // if($row->id == $result->std_id && $result->status == 0) { $y++;
                // } else { $y = 0; } ?>
                <?php if($y > 0) { 
                  if($y == 1) { ?>
                  <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'); ?>" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-danger">notifications_active</span></a>
              <?php } } } ?>
            </span>
          </th>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->applicant_name; ?></a>
          </td>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->jls_name; ?></a>
          </td>
          <td class="text-left"><?php echo $row->std_email; ?></td>
          <td class="text-center"><?php echo $row->info_phone; ?></td>
          <td class="text-center"><?php echo $row->register_date; ?></td>
          <td class="text-center"><?php echo $row->admission_date; ?></td>
          <td class="text-center"><?php echo $row->data_expired_date; ?></td>
          <td class="text-center">
           
          <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
            <span class="material-icons md-20 align-middle">more_vert</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/edit/'.$row->id); ?>">Edit</a>
              <!-- <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/fukuoka_interview/'.$row->id); ?>">Print PDF</a> -->
              <div class="dropdown-item" style="_blank">
              <?php 
                if($row->jls_name =='ECC'){
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_interview/$row->id","Interview PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
              ?>
              </div>
              <div class="dropdown-item">
              <?php 
               if($row->jls_name =='ECC'){
                echo anchor("adm/portal/jls_applicant/ecc_admission/$row->id","Admission PDF");
              }elseif($row->jls_name == 'shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'JCLI'){ 
                  echo anchor("adm/portal/jls_applicant/jcli_admission/$row->id","Admission PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ojls_admission/$row->id","Admission PDF");
                }
              ?>
              </div>
              <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/delete/'.$row->id); ?>">Delete</a>
            </div>
          </td>
          <td class="text-center"><?php echo $row->appli_status; ?></td>
          <?php } ?>
        </tr>
        <?php $x++; } ?>
      </tbody>
    </table>
    </div>
    <div id="tab-5" class="tab-content">    
      <table class="table table-striped bg-white text-nowrap table-responsive" id="studentDataLocal">      
      <thead>
        <tr class="text-center">
          <th>No</th>
          <!-- <th width="1">Student ID&nbsp;<a href="#" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-secondary">notifications_active</span></a>&nbsp;</th> -->
          <th>Applicant ID</th>
          <th>Applicant Name</th>
          <th>School Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Register Date</th>
          <th>Complete Date</th>
          <th>Tracking Code</th>
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
        <?php if($row->appli_status == 'Admission Complete') { ?>
          <th class="text-right"><?php echo $x; ?></th>
          <th width="1" class="text-left">
          <?php echo $row->applicant_id; ?>
            <span class="text-left">
              <?php foreach($lists as $result) {
                // if($row->id == $result->std_id && $result->status == 0) { $y++;
                // } else { $y = 0; } ?>
                <?php if($y > 0) { 
                  if($y == 1) { ?>
                  <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'); ?>" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-danger">notifications_active</span></a>
              <?php } } } ?>
            </span>
          </th>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->applicant_name; ?></a>
          </td>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->jls_name; ?></a>
          </td>
          <td class="text-left"><?php echo $row->std_email; ?></td>
          <td class="text-center"><?php echo $row->info_phone; ?></td>
          <td class="text-center"><?php echo $row->register_date; ?></td>
          <td class="text-center"><?php echo $row->adm_complete_date; ?></td>
          <td class="text-center"><?php echo $row->tracking_code; ?></td>
          <td class="text-center">
           
          <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
            <span class="material-icons md-20 align-middle">more_vert</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/edit/'.$row->id); ?>">Edit</a>
              <!-- <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/fukuoka_interview/'.$row->id); ?>">Print PDF</a> -->
              <div class="dropdown-item" style="_blank">
              <?php 
                if($row->jls_name =='ECC'){
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_interview/$row->id","Interview PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
              ?>
              </div>
              <div class="dropdown-item">
              <?php 
               if($row->jls_name =='ECC'){
                echo anchor("adm/portal/jls_applicant/ecc_admission/$row->id","Admission PDF");
              }elseif($row->jls_name == 'shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'JCLI'){ 
                  echo anchor("adm/portal/jls_applicant/jcli_admission/$row->id","Admission PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ojls_admission/$row->id","Admission PDF");
                }
              ?>
              </div>
              <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/delete/'.$row->id); ?>">Delete</a>
            </div>
          </td>
          <td class="text-center"><?php echo $row->appli_status; ?></td>
          <?php } ?>
        </tr>
        <?php $x++; } ?>
      </tbody>
    </table>
    </div>
    <div id="tab-6" class="tab-content">    
      <table class="table table-striped bg-white text-nowrap table-responsive" id="studentDataLocal">      
      <thead>
        <tr class="text-center">
          <th>No</th>
          <!-- <th width="1">Student ID&nbsp;<a href="#" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-secondary">notifications_active</span></a>&nbsp;</th> -->
          <th>Applicant ID</th>
          <th>Applicant Name</th>
          <th>School Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Register Date</th>
          <th>COE Date</th>
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
        <?php if($row->appli_status == 'COE Waiting') { ?>
          <th class="text-right"><?php echo $x; ?></th>
          <th width="1" class="text-left">
          <?php echo $row->applicant_id; ?>
            <span class="text-left">
              <?php foreach($lists as $result) {
                // if($row->id == $result->std_id && $result->status == 0) { $y++;
                // } else { $y = 0; } ?>
                <?php if($y > 0) { 
                  if($y == 1) { ?>
                  <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'); ?>" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-danger">notifications_active</span></a>
              <?php } } } ?>
            </span>
          </th>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->applicant_name; ?></a>
          </td>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->jls_name; ?></a>
          </td>
          <td class="text-left"><?php echo $row->std_email; ?></td>
          <td class="text-center"><?php echo $row->info_phone; ?></td>
          <td class="text-center"><?php echo $row->register_date; ?></td>
          <td class="text-center"><?php echo $row->coe_date; ?></td>
          <td class="text-center">
           
          <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
            <span class="material-icons md-20 align-middle">more_vert</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/edit/'.$row->id); ?>">Edit</a>
              <!-- <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/fukuoka_interview/'.$row->id); ?>">Print PDF</a> -->
              <div class="dropdown-item" style="_blank">
              <?php 
                if($row->jls_name =='ECC'){
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_interview/$row->id","Interview PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
              ?>
              </div>
              <div class="dropdown-item">
              <?php 
               if($row->jls_name =='ECC'){
                echo anchor("adm/portal/jls_applicant/ecc_admission/$row->id","Admission PDF");
              }elseif($row->jls_name == 'shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'JCLI'){ 
                  echo anchor("adm/portal/jls_applicant/jcli_admission/$row->id","Admission PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ojls_admission/$row->id","Admission PDF");
                }
              ?>
              </div>
              <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/delete/'.$row->id); ?>">Delete</a>
            </div>
          </td>
          <td class="text-center"><?php echo $row->appli_status; ?></td>
          <?php } ?>
        </tr>
        <?php $x++; } ?>
      </tbody>
    </table>
    </div>
    <div id="tab-7" class="tab-content">    
      <table class="table table-striped bg-white text-nowrap table-responsive" id="studentDataLocal">      
      <thead>
        <tr class="text-center">
          <th>No</th>
          <!-- <th width="1">Student ID&nbsp;<a href="#" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-secondary">notifications_active</span></a>&nbsp;</th> -->
          <th>Applicant ID</th>
          <th>Applicant Name</th>
          <th>School Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Register Date</th>
          <th>COE Pass Date</th>
          <th>COE Fail Date</th>
          <th>COE Fail Times</th>
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
        <?php if($row->appli_status == 'COE Passed' || $row->appli_status == 'COE Failed') { ?>
          <th class="text-right"><?php echo $x; ?></th>
          <th width="1" class="text-left">
          <?php echo $row->applicant_id; ?>
            <span class="text-left">
              <?php foreach($lists as $result) {
                // if($row->id == $result->std_id && $result->status == 0) { $y++;
                // } else { $y = 0; } ?>
                <?php if($y > 0) { 
                  if($y == 1) { ?>
                  <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'); ?>" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-danger">notifications_active</span></a>
              <?php } } } ?>
            </span>
          </th>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->applicant_name; ?></a>
          </td>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->jls_name; ?></a>
          </td>
          <td class="text-left"><?php echo $row->std_email; ?></td>
          <td class="text-center"><?php echo $row->info_phone; ?></td>
          <td class="text-center"><?php echo $row->register_date; ?></td>          
          <td class="text-center"><?php echo $row->coe_pass_date; ?></td>
          <td class="text-center"><?php echo $row->coe_fail_date; ?></td>
          <td class="text-center"><?php echo $row->coe_fail_times; ?></td>
          <td class="text-center">
           
          <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
            <span class="material-icons md-20 align-middle">more_vert</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/edit/'.$row->id); ?>">Edit</a>
              <!-- <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/fukuoka_interview/'.$row->id); ?>">Print PDF</a> -->
              <div class="dropdown-item" style="_blank">
              <?php 
                if($row->jls_name =='ECC'){
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_interview/$row->id","Interview PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
              ?>
              </div>
              <div class="dropdown-item">
              <?php 
               if($row->jls_name =='ECC'){
                echo anchor("adm/portal/jls_applicant/ecc_admission/$row->id","Admission PDF");
              }elseif($row->jls_name == 'shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'JCLI'){ 
                  echo anchor("adm/portal/jls_applicant/jcli_admission/$row->id","Admission PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ojls_admission/$row->id","Admission PDF");
                }
              ?>
              </div>
              <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/delete/'.$row->id); ?>">Delete</a>
            </div>
          </td>
          <td class="text-center"><?php echo $row->appli_status; ?></td>
          <?php } ?>
        </tr>
        <?php $x++; } ?>
      </tbody>
    </table>
    </div>
    
    <div id="tab-8" class="tab-content">    
      <table class="table table-striped bg-white text-nowrap table-responsive" id="studentDataLocal">      
      <thead>
        <tr class="text-center">
          <th>No</th>
          <!-- <th width="1">Student ID&nbsp;<a href="#" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-secondary">notifications_active</span></a>&nbsp;</th> -->
          <th>Applicant ID</th>
          <th>Applicant Name</th>
          <th>School Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Register Date</th>
          <th>Interview Date</th>
          <th>Cancel Date</th>
          <th>Cancel Times</th>
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
        <?php if($row->appli_status == 'Cancel') { ?>
          <th class="text-right"><?php echo $x; ?></th>
          <th width="1" class="text-left">
          <?php echo $row->applicant_id; ?>
            <span class="text-left">
              <?php foreach($lists as $result) {
                // if($row->id == $result->std_id && $result->status == 0) { $y++;
                // } else { $y = 0; } ?>
                <?php if($y > 0) { 
                  if($y == 1) { ?>
                  <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'); ?>" class="text-light" data-toggle="tooltip" data-placement="top" title="Request Course"><span class="material-icons align-text-bottom md-18 text-danger">notifications_active</span></a>
              <?php } } } ?>
            </span>
          </th>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->applicant_name; ?></a>
          </td>
          <td class="text-left">
            <a href="<?php echo base_url('adm/portal/langschool_applicant/view/'.$row->id); ?>" class="text-dark" data-toggle="tooltip" data-placement="top" title="Detail"><?php echo $row->jls_name; ?></a>
          </td>
          <td class="text-left"><?php echo $row->std_email; ?></td>
          <td class="text-center"><?php echo $row->info_phone; ?></td>
          <td class="text-center"><?php echo $row->register_date; ?></td>
          <td class="text-center"><?php echo $row->interview_date; ?></td>
          <td class="text-center"><?php echo $row->cancel_date; ?></td>
          <td class="text-center"><?php echo $row->cancel_times; ?></td>
          <td class="text-center">
           
          <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
            <span class="material-icons md-20 align-middle">more_vert</span></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
              <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/edit/'.$row->id); ?>">Edit</a>
              <!-- <a class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/fukuoka_interview/'.$row->id); ?>">Print PDF</a> -->
              <div class="dropdown-item" style="_blank">
              <?php 
                if($row->jls_name =='ECC'){
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'Shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_interview/$row->id","Interview PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_interview/$row->id","Interview PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ecc_interview/$row->id","Interview PDF");
                }
              ?>
              </div>
              <div class="dropdown-item">
              <?php 
               if($row->jls_name =='ECC'){
                echo anchor("adm/portal/jls_applicant/ecc_admission/$row->id","Admission PDF");
              }elseif($row->jls_name == 'Shizuoka'){ 
                  echo anchor("adm/portal/jls_applicant/shizuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'Fukuoka'){ 
                  echo anchor("adm/portal/jls_applicant/fukuoka_admission/$row->id","Admission PDF");
                }
                elseif($row->jls_name == 'JCLI'){ 
                  echo anchor("adm/portal/jls_applicant/jcli_admission/$row->id","Admission PDF");
                }
                else{ 
                  echo anchor("adm/portal/jls_applicant/ojls_admission/$row->id","Admission PDF");
                }
              ?>
              </div>
              <a onclick="return confirm('Are you want to delete this data?');" class="dropdown-item" href="<?php echo base_url('adm/portal/jls_applicant/delete/'.$row->id); ?>">Delete</a>
            </div>
          </td>
           <td class="text-center"><?php echo $row->appli_status; ?></td>
          <?php } ?>
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
    padding: 0px;
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
.table-responsive{
    display: table !important;
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
	list-style: none;
}
ul.tabs li{
	background: none;
	color: #222;
	display: inline-block;
	padding: 10px 15px;
	cursor: pointer;
}

ul.tabs li.current{
	background: #ededed;
	color: #EA585A;
}

.tab-content{
	display: none;
	padding: 15px 0px;
}

.tab-content.current{
	display: inherit;
  overflow-x: auto;
}
a {
    color: #000000;
    text-decoration: none;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
a:hover {
    color: #000000;
    /* text-decoration: underline; */
}
ul.tabs li.current a{
  color: #EA585A;
}

</style>