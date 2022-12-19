<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <h1 class="weight-300 h3 title">Student Profile</h1>
    </div> 

    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <button class="btn btn-secondary py-1 px-2" data-toggle="modal" data-target="#addNoteModal"><span class="material-icons align-text-bottom">add_circle</span></button>
      <a href="<?php echo base_url('adm/portal/langschool_applicant'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
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
  
  <?php if(!empty($msg)){ ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Warning!</strong>  <?php echo $msg; ?> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true" class="material-icons md-18">clear</span>
      </button>
    </div>
  <?php } ?>
  
  <div class="content">  
    <div class="row">
      <div class="col-lg-12">
        <div class="card h-100">
          <div class="card-body">
            <div style="text-align:center" class="col-md-2 float-left">
              <?php if(!empty($result->image_file)) { ?>
                <img src="<?php echo base_url('upload/assets/adm/usr/'.$result->image_file); ?>" class="img-thumbnail img-fluid rounded-circle" width="90">
              <?php } else { ?>
                <img src="<?php echo base_url('asset/admin/images/user.png'); ?>" class="img-thumbnail img-fluid rounded-circle" width="90">
              <?php } ?>
                <div><br></div>
              <div class="text-center">
                <a href="<?php echo base_url('adm/portal/langschool_applicant/edit/'.$result->id); ?>" class="btn btn-sm btn-dark text-light py-0 px-1" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Information"><span class="material-icons align-middle">edit</span></a>
                <a onclick="return confirm('Are you want to delete this data?');"  href="<?php echo base_url('adm/student/delete/'.$result->id); ?>" class="btn btn-sm btn-danger py-0 px-1 text-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Withdraw Account"><span class="material-icons align-middle">delete_sweep</span></a>
              </div>
            </div>

            <div class="col-md-5 float-left">
              <table class="table m-0">
                  <tr>
                      <th>Student Name</th>
                      <td><?php echo $result->name; ?></td>
                  </tr>
                  <tr>
                      <th>Student ID</th>
                      <td><?php echo $result->user_id; ?></td>
                  </tr>
                <tr>
                  <th>Email</th>
                  <td><?php echo $result->email; ?></td>
                </tr>
                <tr>
                  <th>Phone</th>
                  <td><?php echo $result->phone; ?></td>
                </tr>
                <tr>
                  <th>Address</th>
                  <td><?php if(!empty($result->address)){ echo $result->address; } else { echo "not set!"; } ?></td>
                </tr>
                <tr>
                  <th>Birthday</th>
                  <td><?php if(!empty($result->birthday)){ echo $result->birthday; } else { echo "not set!"; } ?></td>
                </tr>
                <tr>
                  <th>NRC No.</th>
                  <td><?php if(!empty($result->nrc)){ echo $result->nrc; } else { echo "not set!"; } ?></td>
                </tr>
              </table>
            </div>

            <div class="col-md-5 float-left">
              <table class="table m-0">
                <tr>
                  <th>Education</th>
                  <td><?php if(!empty($result->education)){ echo $result->education; } else { echo "not set!"; } ?></td>
                </tr>
                <tr>
                  <th>Social</th>
                  <td><?php if(!empty($result->social)){ echo $result->social; } else { echo "not set!"; } ?></td>
                </tr>

                <tr>
                  <th>Request Date</th>
                  <td><?php echo $result->request_date; ?></td>
                </tr>
                <tr>
                  <th>Activate Date</th>
                  <td><?php if($result->activate_date == "30-11--0001 00:00:00"){ echo " - "; } else { echo $result->activate_date; } ?></td>
                </tr>
                <tr>
                  <th>Expired Date</th>
                  <td><?php if($result->expired_date == "30-11--0001 00:00:00") { echo " - "; } else { echo $result->expired_date; } ?></td>
                </tr>
                <tr>
                  <th><span class="badge badge-info text-white">Authorize Status</span></th>
                  <td>
                    <?php if($result->status == 1) { ?>
                      <span class="badge badge-success text-white">Active</span>
                    <?php } else { ?>
                      <span class="badge badge-dark text-white">Deactive</span>
                    <?php } ?>
                    
                  </td>
                </tr>
                <tr>
                    <th><span class="badge badge-info text-white">Course Permission</span></th>
                    <td>
                        <?php if($result->permission == 1) { ?>
                          <span class="badge badge-success text-white">Allow</span>
                        <?php } else { ?>
                          <span class="badge badge-dark text-white">Request</span>
                        <?php } ?>
                    </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-12 mt-3"> 
        <div class="card mb-4">
          <div class="card-header p-0">
            <ul class="nav nav-tabs active-thik nav-primary border-0" id="myTab" usr_role="tablist">
              <li class="nav-item">
                <a class="nav-link px-4 py-3 active rounded-0" id="profile-tab" data-toggle="tab" href="#profile" usr_role="tab" aria-controls="profile" aria-selected="false"><span class="material-icons align-middle">book</span> Course Detail</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-4 py-3 rounded-0" id="note-tab" data-toggle="tab" href="#note" usr_role="tab" aria-controls="note" aria-selected="true"><span class="material-icons align-middle">note</span> Notes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-4 py-3 rounded-0" id="security-tab" data-toggle="tab" href="#security" usr_role="tab" aria-controls="security" aria-selected="true"><span class="material-icons align-middle">swap_vert</span> Session</a>
              </li>
            </ul>
          </div>

          <div class="card-body">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="profile" usr_role="tabpanel" aria-labelledby="profile-tab">
                <div class="card mb-4">
                  <div class="card-body table-responsive p-0">
                    <table class="table table-striped m-0">
                    <thead>
                      <tr class="text-center">
                        <th width="1">Cover</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Class</th>
                        <th>Request Date</th>
                        <th>Activited Date</th>
                        <th width="1"><span class="material-icons align-middle">more_horiz</span></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($course)) {
                      foreach ($course as $row) { ?>
                      <tr>
                        <td>
                          <div style="height: 30px;clear:both;overflow: hidden;text-align: center;">
                          <a href="<?php echo base_url('upload/assets/adm/cos/_thumb/'.$row->cos_thumb) ?>" data-gallery="example-gallery" data-toggle="lightbox">
                          <img src="<?php echo base_url('upload/assets/adm/cos/_thumb/'.$row->cos_thumb) ?>" width="60" class="img-thumbnail bg-white img-fluid mb-0">
                          </a>
                          </div>
                        </td>
                        <td class="text-left">
                          <a class="text-dark" data-toggle="tooltip" data-placement="top" title="view detail" href="<?php echo base_url('adm/portal/batch/view/'.$row->bat_id); ?>"><?php echo $row->batch_id; ?></a>
                        </td>
                        <td><a class="text-dark" data-toggle="tooltip" data-placement="top" title="view detail" href="<?php echo base_url('adm/portal/course/view/'.$row->cos_id); ?>"><?php echo $row->cos_title; ?></a></td>
                        <th class="text-center"><span class="badge badge-dark text-white"><?php echo ucfirst($row->ref_key); ?></span></th>
                        <td class="text-center"><?php echo $row->request_date; ?></td>
                        <td class="text-center">
                          <?php 
                          if($row->status == 0) {
                            echo " ~ ";
                          } else {
                            echo $row->activate_date; 
                          } ?>
                        </td>
                        <td class="text-center">  
                          <?php if($row->status == 1) { ?>
                            <a class="text-success" data-toggle="tooltip" data-placement="top" title="Active" href="#"><span class="material-icons align-middle md-18">check_circle</span></a>
                          <?php } else { ?>
                            <a class="text-dark" data-toggle="tooltip" data-placement="top" title="Request" href="#"><span class="material-icons align-middle md-18">remove_circle</span></a>
                          <?php } ?>      
                          <a class="text-secondary" href="<?php echo base_url('adm/portal/langschool_applicant/invoice/view/'.$row->id); ?>" data-toggle="tooltip" data-placement="top" title="View Invoice"><span class="material-icons align-middle md-20">assignment</span></a>       
                          <a class="text-secondary" onclick="return confirm('Are you want to delete this course?');" data-toggle="tooltip" data-placement="top" title="Delete" href="<?php echo base_url('adm/portal/langschool_applicant/course/delete/'.$row->id.'/'.$result->id); ?>"><span class="material-icons align-middle md-18">delete</span></a>
                        </td>
                      </tr>
                      <?php } 
                      } else { 
                        echo "<td colspan='7' class='text-center'> No enroll batch!</td>";
                      } ?>
                    </tbody>
                  </table>
                  </div>

                </div>
              </div>
              
              <div class="tab-pane fade" id="note" usr_role="tabpanel" aria-labelledby="note-tab">
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped m-0">
                    <thead>
                      <tr>
                        <th width="1">No</th>
                        <th width="1">Course/Batch ID</th>
                        <th width="1">Lessons name</th>
                        <th width="1">Part</th>
                        <th>Note</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($noted)) {
                      $x = 1;
                      foreach ($noted as $row) { ?>
                      <tr>
                        <td class="text-right"><?php echo $x; ?></td>
                        <td><?php echo $row->cos_title."<br> (".$row->batch_id.")"; ?></td>
                        <td><?php echo $row->title; ?></td>
                        <td><?php echo $row->name; ?></td>
                        <td style="white-space: inherit;"><?php echo $row->note; ?></td>
                      </tr>
                      <?php $x++; } 
                      } else { 
                        echo "<td colspan='5' class='text-center'> No record note!</td>";
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>

              <div class="tab-pane fade " id="security" usr_role="tabpanel" aria-labelledby="security-tab">
                <div class="card-body table-responsive p-0">
                  <table class="table table-striped  m-0">
                    <thead>
                      <tr class="text-center">
                        <th width="1">No</th>
                        <th>IP</th>
                        <th>Agent</th>
                        <th>Start</th>
                        <th>Timeout</th>
                        <th>Total Time</th>
                        <th>Authorize key</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php if(!empty($record)) {
                      $x = 1;
                      foreach ($record as $row) { ?>
                      <tr>
                        <td class="text-right"><?php echo $x; ?></td>
                        <td><?php echo $row->ipaddress; ?></td>
                        <td><?php echo $row->agent; ?></td>
                        <td><?php echo $row->session_start; ?></td>
                        <td><?php echo $row->session_timeout; ?></td>
                        <td><?php echo $row->session_time/60; ?> min</td>
                        <td><?php echo $row->csrf_token_key."".$row->csrf_slug_key; ?></td>
                      </tr>
                      <?php $x++; } 
                      } else { 
                        echo "<td colspan='7' class='text-center'> No record!</td>";
                      } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
<!-- /page content -->
<style>
table thead th {
  vertical-align: middle !important;
}
</style>
<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>

 <!-- Modal -->
 <div class="modal fade" id="addNoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog col-11 p-0" role="document">
          <div class="modal-content">
            <?php
              $attributes = array('class' => '');
              echo form_open('adm/portal/langschool_applicant/view/'.$result->id, $attributes);

              echo form_input(array(
								'name' => 'std_id',
								'type' => 'hidden',
								'value' => html_escape(set_value('std_id',isset($result)?$result->id:''), ENT_QUOTES)
							));
            ?>
            <div class="modal-header px-4">
              <h5 class="modal-title" id="exampleModalLabel">Add Batch</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="material-icons ">close</span>
              </button>
            </div>
            <div class="modal-body p-4">
              <div class="form-group">
                <?php
                  echo form_label('Batch','batch_id', array('class' => ''));
                  echo ' <span class="badge badge-danger">Required</span>';
                
                  $setarray = array( 'class' => 'form-control', 'style' => '');
                  echo form_dropdown(
                    'batch_id',  //dropdown name
                    $batch,
                    set_value('batch_id',isset($result->bat_id)?$result->bat_id:''),
                    $setarray
                  );
                ?>
                <span class="text-danger"><?php echo form_error('batch_id'); ?></span>
              </div>             
              
              <?php
                $payment = array(
                  '' => "Select Payment",
                  'aya' => "AYA Bank",
                  'yoma' => "YOMA Bank",
                  'kbz' => "KBZ Bank",
                  'kpay' => "KPay",
                  'wave' => "Wave Money",
                  'loc' => "Direct pay",
                );
              ?>
              <div class="form-group">
                <?php echo form_label('Payment', 'pay_type', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                $setarray = array( 'class' => 'form-control', 'style' => '', 'id' => 'coursedata');
                echo form_dropdown(
                  'pay_type',  //dropdown name
                  $payment,
                  set_value('pay_type',isset($result->pay_type)?$result->pay_type:''),
                  $setarray
                );
                ?>
                <span class="text-danger"><?php echo form_error('pay_type'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Information', 'pay_info', array( 'class' => '', 'id'=> '', 'style' => '', 'for' => 'std_name')); ?>
                <span class="badge badge-danger">Required</span> <span class="badge badge-warning text-light">Phone number or Other</span>
                <?php
                  echo form_input(array(
                    'name' => 'pay_info',
                    'type' => 'text',
                    'value' => html_escape(set_value('pay_info',isset($result->pay_info)?$result->pay_info:''), ENT_QUOTES),
                    'placeholder' => 'Enter payment phone number or other!',
                    'class' => 'form-control'));
                  ?>
                <span class="text-danger"><?php echo form_error('pay_info'); ?></span>
              </div>

              <div class="form-group">
                <?php
                  echo form_label('Note','note', array('class' => 'col-form-label'));
                ?>
                <div class="col-md-12 col-sm-12 p-0">
                  <?php 
                    $data = array(
                    'name' => 'note',
                    'value' => '',
                    'rows' => '3',
                    'cols' => '',
                    'placeholder' => 'Enter Note',
                    'class' => "form-control",
                    'value' => set_value('address',isset($result->description)?$result->description:'')
                  );
                  echo form_textarea($data); ?>
                  <span class="text-danger"><?php echo form_error('note'); ?></span>
                </div>
              </div>

              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                  <div class="col-sm-10">
                    <div class="form-check col-md-3 float-left">
                      <input class="form-check-input" type="radio" id="status1" name="status" value="1">
                      <label class="form-check-label" for="status1">Active</label>
                    </div>
                    <div class="form-check col-md-3 float-left">
                      <input class="form-check-input" type="radio" id="status2" name="status" value="0" checked="checked">
                      <label class="form-check-label" for="status2">Deactive</label>
                    </div>
                  </div>
                </div>
              </fieldset>

              <div class="modal-footer px-4">
                <button type="button" class="btn btn-sm btn-secondary text-white" data-dismiss="modal"><span class="material-icons align-top md-18 mr-1">close</span> Close</button>
                <button type="submit" class="btn btn-sm btn-primary text-white"><span class="material-icons align-top md-18 mr-1">add_circle</span> Submit</button>
              </div>
            </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
<!-- Modal -->