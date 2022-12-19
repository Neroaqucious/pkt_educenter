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
    <h1 class="weight-300 h3 title">Lesson Data Detail</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/portal/lessons/add_movies/'.$result->less_id); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">add_circle</span></a>
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
      <div class="card mb-4">
        <div class="card-body">
            <div class="float-left col-md-8">
                <video id="my-player" class="video-js vjs-playback-rate" controls preload="auto" poster="" data-setup='{}' width="auto">
                  <source src="<?php echo base_url('/upload/assets/adm/mov/int_/pkt_/_data/'.$result->movies); ?>" type="video/mp4"/>
                </video>
  <!-- Video files -->
            </div>

           <div class="float-left col-md-4 p-0">
              <table class="table m-0">
                  <tr>
                      <th>Lesson Name</th>
                      <td class="text-primary weight-400"><?php echo $result->title; ?></td>
                  </tr>
                  <tr>
                      <th>Lessons Part</th>
                      <td class="weight-400"><?php echo $result->part; ?></td>
                  </tr>
                  <tr>
                      <th>Slug Name</th>
                      <td class="weight-400"><i><?php echo $result->slug_name; ?></i></td>
                  </tr>
                  <tr>
                      <th>Total Minutes</th>
                      <td class="weight-400"><?php echo $result->minute; ?> Minutes</td>
                  </tr>
                  <tr>
                      <th>Created Date</th>
                      <td><?php echo $result->created_at; ?></td>
                  </tr>
                  <tr>
                      <th>Updated Date</th>
                      <td><?php echo $result->updated_at; ?></td>
                  </tr>
                  <tr>
                      <th>Status</th>
                      <td>
                          <?php if($result->status == 1) { ?>
                            <span class="badge badge-success text-white">Public</span>
                          <?php } else { ?>
                            <span class="badge badge-dark text-white">Private</span>
                          <?php } ?>
                      </td>
                  </tr>
              </table>
            <div class="clearfix"></div>              
           </div> 
           <div class="clearfix"></div>

           <div class="col-md-12 m-3">
              <h5 class="my-3">Lesson Description</h5>
                <span class="text-dark d-block py-2 px-2">
                  <?php echo $result->lessons; ?>
                </span>
              <hr>
              <div class="clearfix"></div>
              <h5 class="my-3">Main Description</h5>
                <span class="text-dark d-block py-2 px-2">
                  <?php echo $result->desc1; ?>
                </span>
                <hr>
              <div class="clearfix"></div>
              <h5 class="my-3">Sub Description</h5>
                <span class="text-dark d-block py-2 px-2">
                  <?php if(!empty($result->desc2)) { echo $result->desc2; } else { echo "Not set!"; } ?>
                </span>
            </div>
          <div class="clearfix"></div>
          <hr class="my-4 dashed clearfix">

          <a href="<?php echo base_url('adm/portal/lessons/edit_movies/'.$result->id."/".$result->less_id); ?>" class="btn btn-danger py-1 px-2 float-right ml-2" ><span class="material-icons align-text-bottom">edit</span></a>
          <a href="<?php echo base_url('adm/portal/lessons/view/'.$result->less_id); ?>" class="btn btn-secondary py-1 px-2 float-right" ><span class="material-icons align-text-bottom">keyboard_backspace</span></a>

        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header bg-dark text-light">Related <span class="text-success">Movies</span></div>
              <div class="card-body table-responsive">
              <table class="table m-0" id="studentDataOnline">
                <thead>
                  <tr class="text-center">
                    <th scope="col" class="border-top-0">Title</th>
                    <th scope="col" class="border-top-0">Part</th>
                    <th scope="col" class="border-top-0">Minutes</th>
                    <th scope="col" class="border-top-0" width="1">Created Date</th>
                    <th scope="col" class="border-top-0" width="1">Updated Date</th>
                    <th scope="col" class="border-top-0">Status</th>
                    <th scope="col" class="border-top-0" width="1">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($related as $row) { ?>
                  <tr>
                    <td>
                      <a href="<?php echo base_url('adm/portal/lessons/view_movies/'.$row->id."/".$row->less_id); ?>" class="text-dark weight-400" data-toggle="tooltip" data-placement="top" title="Movies Detail">
                        <?php echo $row->title; ?>
                      </a>
                    </td>
                    <td><?php echo $row->part; ?></td>
                    <td class="text-center"><?php echo $row->minute; ?> minutes</td>
                    <td class="text-center"><?php echo $row->created_at; ?></td>
                    <td class="text-center"><?php echo $row->updated_at; ?></td>
                    <td class="text-center">
                      <?php if($row->status == 1) { ?>
                        <span class="badge badge-success text-white">Public</span>
                      <?php } else { ?>
                        <span class="badge badge-dark text-white">Private</span>
                      <?php } ?>
                    </td>
                    <td class="text-center">
                      <a href="#" class="text-muted" id="actionDropdown" data-toggle="dropdown">
                      <span class="material-icons md-20 align-middle">more_vert</span></a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="actionDropdown">
                      <a class="dropdown-item" href="<?php echo base_url('adm/portal/lessons/edit_movies/'.$row->id."/".$row->less_id); ?>">Edit</a>
                      <a onclick="return confirm('Are you want to delete this data?');"  class="dropdown-item" href="<?php echo base_url('adm/portal/lessons/delete_movies/'.$row->id."/".$row->less_id); ?>">Delete</a>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

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