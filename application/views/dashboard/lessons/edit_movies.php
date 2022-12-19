<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>
<!--  Video.js -->
<link href="<?php echo base_url('asset/video.js/video-js.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('asset/video.js/index.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('asset/video.js/video.min.js') ?>"></script>
<!--  Video.js -->

<div class="content-wrapper">
	<div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title border-left border-success pl-2 border-width-medium">Edit Lessons Movies</h1>
    </div>

        <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      
      <a href="<?php echo base_url('adm/portal/lessons/view/'.$result->less_id); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
      
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
              echo form_open_multipart('adm/portal/lessons/edit_movies/'.$result->id."/".$result->less_id, $attributes);

              echo form_input(array(
                'name' => 'id',
                'type' => 'hidden',
                'value' => $result->id,
              ));

              echo form_input(array(
                'name' => 'less_id',
                'type' => 'hidden',
                'value' => $result->less_id,
              ));
            ?>

            <div class="col-lg-8 col-md-8 float-left">
              
              <div class="form-group">
                <?php echo form_label('Lesson Part', 'part', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                $setarray = array( 'class' => 'form-control', 'style' => '');
                echo form_dropdown(
                  'part',  //dropdown name
                  $part,
                  set_value('part',isset($result)?$result->part_id:''),
                  $setarray
                );
                ?>
                <span class="text-danger"><?php echo form_error('part'); ?></span>
              </div>   

              <div class="form-group">
                <?php echo form_label('Lessons Title', 'title', array( 'class' => '', 'id'=> '', 'style' => 'margin-bottom:10px')); ?>
                <span class="badge badge-danger">Required</span>
                <?php
                  echo form_input(array(
                  'name' => 'title',
                  'type' => 'text',
                  'value' => html_escape(set_value('title',isset($result)?$result->title:''), ENT_QUOTES),
                  'placeholder' => 'Enter lesson title!',
                  'class' => 'form-control',
                  'id' => ''));
                ?>
                <span class="text-danger"><?php echo form_error('title'); ?></span>
              </div>
              
              <div class="form-group">
                <?php
                  echo form_label('Main Description','desc1', array('class' => 'col-form-label'));
                ?>
                <span class="badge badge-danger">Required</span>
                
                <div class="col-md-12 col-sm-12 p-0">
                  <textarea name="desc1" cols="" rows="6" placeholder="Enter description" class="form-control">
                    <?php echo html_escape(set_value('desc1',isset($result)?$result->desc1:''), ENT_NOQUOTES); ?>
                  </textarea>
                  <span class="text-danger"><?php echo form_error('desc1'); ?></span>
                </div>
              </div>

            </div>

            <div class="col-lg-4 col-md-4 float-left">
                              
              <div class="form-group">
                <?php
                  echo form_label('Sub Description','desc2', array('class' => 'col-form-label'));
                ?>
                <div class="col-md-12 col-sm-12 p-0">
                  <textarea name="desc2" cols="" rows="6" placeholder="Enter description" class="form-control"><?php echo html_escape(set_value('desc2',isset($result)?$result->desc2:''), ENT_NOQUOTES); ?></textarea>
                  <span class="text-danger"><?php echo form_error('desc2'); ?></span>
                </div>
                
                </div>       
  
            <?php if(!empty($result->movies)){ ?>
                <video id="my-player" class="video-js vjs-playback-rate" controls preload="auto" poster="" data-setup='{}' width="350">
                  <source src="<?php echo base_url('/upload/assets/adm/mov/int_/pkt_/_data/'.$result->movies); ?>" type="video/mp4"/>
                <track src="<?php echo base_url('asset/admin/images/subtitles.vtt'); ?>" kind="subtitles" srclang="en" label="English subtitles" />
              <!-- fallback for rubbish browsers -->
              </video>
            <?php } ?>

            <div class="form-group">
              <?php echo form_label('Lessons Upload', 'userfile',  array( 'class' => '', 'id' => '', 'style' => 'margin-bottom:10px')); ?>
              <span class="badge badge-danger">Required</span>
              <span class="badge badge-warning text-light">Only <?php echo ini_get('upload_max_filesize'); ?>!</span>
          
              <?php
                echo form_input(array(
                  'name' => 'userfile',
                  'type' => 'file',
                  'class' => 'form-control-file'
                ));
              ?>
              <span class="text-danger"><?php echo form_error( 'userfile' ); ?></span>
            </div>
          
            <div class="form-group">
                <?php echo form_label('Permission', 'status', array( 'class' => 'form-control-label', 'id'=> '')); ?>

                <div class="radio">
                  <label class="col-md-4">
                    <input type="radio" name="status" value="1" <?php if(($result->status) == 1) { echo "checked";}?>> Public
                  </label>
                  <label class="col-md-4">
                    <input type="radio" name="status" value="0" <?php if(($result->status) == 0) { echo "checked";}?>> Privated
                  </label>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <hr class="my-4 dashed clearfix">

            <button type="submit" class="btn btn-primary btn-sm float-right"><span class="material-icons align-middle">update</span> Update</button>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url('asset/admin/js/ckeditor/ckeditor.js'); ?>"></script>
<script>
    CKEDITOR.replace('desc1');
</script>

<script>
    var player = videojs('my-player', {
        playbackRates: [0.5, 1, 1.5, 2],
    });
    player.fluid(true);
    player.disablePictureInPicture(true);

    // var player = videojs('my-player', options, function onPlayerReady() {
    //     this.fluid(true);
    // });

</script>
<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>