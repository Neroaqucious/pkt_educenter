<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <h1 class="weight-300 h3 title">Add New Batch</h1>
    </div>
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/portal/batch'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
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

  <div class="content">
    <div class="row">
      <div class="col-lg-12 col-md-12 mb-4 mb-lg-0">
        <div class="card">
          <div class="card-body">
          <?php
            $attributes = array('class' => 'form-horizontal form-label-left');
            echo form_open('adm/portal/batch/add', $attributes);
          ?>

          <div class="col-lg-8 col-md-8 float-left">            
            <div class="form-group">
              <?php echo form_label('Select Class', 'class', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
              $proposal = array(
                "" => "Select Class",
                "offline" => "localclass room",
                "online" => "online class"
              );
              $setarray = array( 'class' => 'form-control', 'id' => 'proposal', 'style' => '');
                echo form_dropdown(
                  'class',  //dropdown name
                  $proposal,
                  set_value('class',isset($result)?$result->ref_key:''),
                  $setarray
                );
              ?>
            </div>

            <div class="form-group">
              <?php echo form_label('Course', 'course', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
              $setarray = array( 'class' => 'form-control', 'style' => '', 'id' => 'coursedata');
              echo form_dropdown(
                'course',  //dropdown name
                $course,
                set_value('course',isset($result)?$result->course_id:''),
                $setarray
              );
              ?>
              <span class="text-danger"><?php echo form_error('course'); ?></span>
            </div>

            <div class="form-group">
              <?php echo form_label('Instructor', 'trainer', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <?php
                $setarray = array( 'class' => 'form-control', 'style' => '', 'id' => 'coursedata');
                echo form_dropdown(
                  'trainer',  //dropdown name
                  $trainer,
                  set_value('trainer',isset($result)?$result->trainer_id:''),
                  $setarray
                );
              ?>
              <span class="text-danger"><?php echo form_error('trainer'); ?></span>
            </div>

            <div class="form-group">
              <?php echo form_label('Liveclass Room', 'liveclass', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-warning text-light">Zoom, live streaming & localclass room activate</span>
              <?php
              $proposal = array(
                "on" => "on",
                "off" => "off"
              );
              $setarray = array( 'class' => 'form-control', 'id' => 'liveclass', 'style' => '');
                echo form_dropdown(
                  'liveclass',  //dropdown name
                  $proposal,
                  set_value('liveclass',isset($result)?$result->liveclass:''),
                  $setarray
                );
              ?>
              <span class="text-danger"><?php echo form_error('liveclass'); ?></span>
            </div>  

            <div class="form-group">
              <?php
                echo form_label('Description','desc', array('class' => 'col-form-label'));
              ?>
                <div class="col-md-12 col-sm-12 p-0">
                <?php
                  $data = array(
                    'name' => 'desc',
                    'value' => '',
                    'rows' => '6',
                    'cols' => '',
                    'placeholder' => 'Enter description',
                    'class' => "form-control",
                    'value' => html_escape(set_value('desc',isset($result)?$result->description:''), ENT_NOQUOTES)
                  );
                  echo form_textarea($data); ?>
                  <span class="text-danger"><?php echo form_error('desc'); ?></span>
                </div>
            </div>

            <div class="form-group">
              <?php
                echo form_label('Remarks','remark', array('class' => 'col-form-label'));
              ?>
              <div class="col-md-12 col-sm-12 p-0">
                <?php 
                  $data = array(
                  'name' => 'remark',
                  'value' => '',
                  'rows' => '5',
                  'cols' => '',
                  'placeholder' => 'Enter remark',
                  'class' => "form-control",
                  'value' => set_value('remark',isset($result)?$result->remark:'')
                );
                echo form_textarea($data); ?>
                <span class="text-danger"><?php echo form_error('remark'); ?></span>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 float-left" >
            <div class="border border-secondary-light25 bg-light p-3 mb-3" id="liveoff">
              <div class="form-group">
                <?php echo form_label('Duration (Month & Day Duration)', 'duration', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                  <div class="col-md-6 float-left">
                  <div class="input-group">
                    <?php
                      echo form_input(array(
                      'name' => 'month_duration',
                      'type' => 'text',
                      'value' => html_escape(set_value('month_duration',isset($result)?$result->month_duration:''), ENT_QUOTES),
                      'class' => 'form-control col-md-12 d-inline',
                      'id' => 'month_duration',
                    ));
                    ?>
                    <div class="input-group-append">
                      <span class="input-group-text">Month</span>
                    </div>
                  </div>
                  <span class="text-danger"><?php echo form_error('month_duration'); ?></span>
                  </div>
                  <div class="col-md-5 float-right">
                  <div class="input-group">
                    <?php
                      echo form_input(array(
                      'name' => 'day_duration',
                      'type' => 'text',
                      'value' => html_escape(set_value('day_duration',isset($result)?$result->day_duration:''), ENT_QUOTES),
                      'class' => 'form-control col-md-8 d-inline float-right',
                      'id' => 'day_duration',
                    ));
                    ?>
                    <div class="input-group-append">
                      <span class="input-group-text">Days</span>
                    </div>
                  </div>
                  <span class="text-danger"><?php echo form_error('day_duration'); ?></span>
                  </div>
                <div class="clearfix"></div>
              </div>
              <hr>
              
              <div class="form-group">
                <?php echo form_label('Days (Target Days)', 'class_days', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <div class="input-group">
                  <div class="custom-control mb-2 mr-4 custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Mon" name="class_days[]" value="Mon">
                    <label class="custom-control-label" for="Mon">Mon</label> 
                  </div>

                  <div class="custom-control mb-2 mr-4 custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Tue" name="class_days[]" value="Tue">
                    <label class="custom-control-label" for="Tue">Tue</label> 
                  </div>

                  <div class="custom-control mb-2 mr-4 custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Wed" name="class_days[]" value="Wed">
                    <label class="custom-control-label" for="Wed">Wed</label> 
                  </div>

                  <div class="custom-control mb-2 mr-4 custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Thu" name="class_days[]" value="Thu">
                    <label class="custom-control-label" for="Thu">Thu</label> 
                  </div>

                  <div class="custom-control mb-2 mr-4 custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Fri" name="class_days[]" value="Fri">
                    <label class="custom-control-label" for="Fri">Fri</label> 
                  </div>

                  <div class="custom-control mb-2 mr-4 custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Sat" name="class_days[]" value="Sat">
                    <label class="custom-control-label" for="Sat">Sat</label> 
                  </div>

                  <div class="custom-control mb-2 mr-4 custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Sun" name="class_days[]" value="Sun">
                    <label class="custom-control-label" for="Sun">Sun</label> 
                  </div>    
                </div>
                <span class="text-danger"><?php echo form_error('class_days[]'); ?></span>
              </div>
              <hr>

              <input type="checkbox" class="custom-control-input d-none" id="Sun" name="class_days[]" value="Online">

              <div class="form-group">
                <?php echo form_label('Times (Start & End time)', 'class_times', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                  
                  <div class="col-md-6 float-left">
                    <?php
                      echo form_input(array(
                      'name' => 'start_times',
                      'type' => 'time',
                      'value' => html_escape(set_value('start_times',isset($result)?$result->start_times:''), ENT_QUOTES),
                      'class' => 'form-control',
                      'id' => 'start_times',
                    ));
                    ?>
                    <span class="text-danger"><?php echo form_error('start_times'); ?></span>
                  </div>
                  <div class="col-md-6 float-right">
                    <?php
                      echo form_input(array(
                      'name' => 'end_times',
                      'type' => 'time',
                      'value' => html_escape(set_value('end_times',isset($result)?$result->end_times:''), ENT_QUOTES),
                      'class' => 'form-control',
                      'id' => 'end_times',
                    ));
                    ?>
                    <span class="text-danger"><?php echo form_error('end_times'); ?></span>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div class="form-group">
                  <label class="weight-400" for="start_date" style="margin-bottom:10px">Batch Start Date</label> 
                  <span class="badge badge-danger">Required</span>
                  <input type="date" step="1" name="start_date" id="start_date" class="form-control" placeholder="" value="<?php echo html_escape(set_value('start_date',isset($result)?$result->start_date:''), ENT_QUOTES) ?>">
                  <span class="text-danger"><?php echo form_error( 'start_date' ); ?></span>
                </div>

              </div>
                
                <div class="form-group">
                <?php echo form_label('Member Fees', 'fees', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                  <span class="badge badge-danger">Required</span>
                <div class="input-group">
                  <?php
                    echo form_input(array(
                    'name' => 'fees',
                    'type' => 'text',
                    'value' => html_escape(set_value('fees',isset($result)?$result->fees:''), ENT_QUOTES),
                    'placeholder' => '',
                    'class' => 'form-control text-right',
                    'id' => ''));
                  ?>
                  <div class="input-group-append">
                    <span class="input-group-text">MMK</span>
                  </div>
                </div>
                <span class="text-danger"><?php echo form_error('fees'); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Enroll Limited', 'total_std', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                  'name' => 'total_std',
                  'type' => 'text',
                  'value' => html_escape(set_value('total_std',isset($result)?$result->member:''), ENT_QUOTES),
                  'placeholder' => 'Enter Enroll Limited!',
                  'class' => 'form-control',
                  'id' => 'total_student'));
                ?>
                <span class="text-danger"><?php echo form_error('total_std'); ?></span>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" name="unlimit" type="checkbox" id="unlimitedCheck" >
                    <label class="form-check-label" for="unlimitedCheck">
                      Unlimited Enroll <span class="badge badge-warning text-light">Unlimited</span>
                    </label>
                  </div>
                </div>
              </div> 

              
              <div class="form-group">
                <label class="weight-400" for="release" style="margin-bottom:10px">Release Date</label> 
                <span class="badge badge-danger">Required</span>
                <input type="datetime-local" step="1" name="release" id="release" class="form-control" placeholder="" value="<?php echo html_escape(set_value('release',isset($result)?date('YYYY-MM-DDTkk:mm',strtotime($result->released_date)):''), ENT_QUOTES) ?>">
                <span class="text-danger"><?php echo form_error( 'release' ); ?></span>
              </div>

              <div class="form-group">
                <label class="weight-400" for="closed" style="margin-bottom:10px">End Release Date</label>
                <span class="badge badge-danger">Required</span>
                <input type="datetime-local" step="1" name="closed" id="closed" class="form-control" placeholder="" value="<?php echo html_escape(set_value('closed',isset($result)?$result->closed_date:''), ENT_QUOTES) ?>">
                <span class="text-danger"><?php echo form_error( 'closed' ); ?></span>
              </div>

              <div class="form-group">
                <?php echo form_label('Permission', 'status', array( 'class' => 'form-control-label', 'id'=> '')); ?>
                <div class="form-check ml-3">
                  <label class="weight-400 col-md-3 p-0 form-check-label">
                    <input type="radio" name="status" value="1"  class="form-check-input"> Public
                  </label>
                  <label class="weight-400 col-md-3 p-0 form-check-label">
                    <input type="radio" name="status" value="0" checked="checked" class="form-check-input"> Privated
                  </label>
                </div>
              </div>
          </div>

          <div class="clearfix"></div>
          <hr class="my-4 dashed clearfix">
            <button type="submit" class="btn btn-primary text-white btn-sm py-1 px-2 float-right">
              <span class="material-icons align-top md-18 mr-1">add_circle</span>Submit
            </button>
          <?php echo form_close(); ?>
        </div>

      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo base_url('asset/admin/js/ckeditor/ckeditor.js'); ?>"></script>
<script>
    CKEDITOR.replace('desc');
</script>
<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>