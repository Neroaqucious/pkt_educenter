<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/templates/header.php"); ?>

<div class="content-wrapper">
    <div class="row page-tilte align-items-center">
      <div class="col-md-auto">
        <h1 class="weight-300 h3 title border-left border-success pl-2 border-width-large">Dashboard Management</h1>
        <p class="text-muted m-0 desc">Monthly Overview Report</p>
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
    <div class="card mb-2">
      <div class="card-body p-lg-3">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-lg-0">
            <h6 class="weight-400 mb-3 border-left border-success pl-2 border-width-medium">Total <span class="text-muted">  Earnings</span></h6>
            <div class="media align-items-center">
              <span class="material-icons text-light mr-3 circle p-3 border border-success bg-success">monetization_on</span>
              <div class="media-body">
                <h4 class="weight-400 m-0">
                  <?php  
                  $totalAllFees = 0;
                  foreach($total_cash as $row) {
                      if(date('Y-m') == date('Y-m',strtotime($row->year."-".$row->month))) {
                        //echo number_format($row->total_amount)." MMK";
                        $totalAllFees += $row->total_amount;
                      } else{
                        echo "0 MMK";
                      }
                    }
                    echo number_format($totalAllFees)." MMK";
                  ?>
                </h4>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 mb-lg-0">
            <h6 class="weight-400 mb-3 border-left border-success pl-2 border-width-medium">Today <span class="text-muted">  Earnings</span></h6>
            <div class="media align-items-center">
              <span class="material-icons text-light mr-3 circle p-3 border border-success bg-success">monetization_on</span>
              <div class="media-body">
                <h4 class="weight-400 m-0">
                  <?php  
                  $totalFees = 0;
                  foreach($total_cash as $row) {
                      if(date('Y-m-d') == date('Y-m-d',strtotime($row->year."-".$row->month."-".$row->day))) {
                        $totalFees += $row->total_amount;
                        //echo number_format($row->total_amount)." MMK";
                      } else{
                        //echo "0 MMK";
                      }
                    }
                    echo number_format($totalFees) ." MMK";
                  ?>
                </h4>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-2 mb-lg-0">   
            <h6 class="weight-400 mb-3 border-left border-info pl-2 border-width-medium">Total <span class="text-muted">  Students</span></h6>
            <div class="media align-items-center">
              <span class="material-icons text-light mr-3 circle p-3 border border-info bg-info">how_to_reg</span>
              <div class="media-body">
                <h4 class="weight-400 m-0"><?php echo $total_student; ?>&nbsp;Nos</h4>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-2 mb-lg-0">   
            <h6 class="weight-400 mb-3 border-left border-warning pl-2 border-width-medium">Total <span class="text-muted">  Enroll Batch</span></h6>
            <div class="media align-items-center">
              <span class="material-icons text-light mr-3 circle p-3 border border-warning bg-warning">class</span>
              <div class="media-body">
                <h4 class="weight-400 m-0"><?php echo $course_count; ?>&nbsp;Nos</h4>
              </div>
            </div> 
          </div>
          
          <div class="col-md-6 col-lg-2 mb-lg-0">  
            <h6 class="weight-400 mb-3 border-left border-success pl-2 border-width-medium">Total <span class="text-muted">  Instructor</span></h6>
            <div class="media align-items-center">
                <span class="material-icons text-light mr-3 circle p-3 border border-success bg-success">record_voice_over</span>
                <div class="media-body">
                  <h4 class="weight-400 m-0 text-success"><?php echo $instructor; ?>&nbsp;Nos</h4>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-2">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header bg-dark text-success py-1">Monthly Enroll <span class="text-light">Report</span></div>
          <div class="card-body">
              <canvas id="canvas"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header bg-dark text-success py-1">End Date <span class="text-light">Batch</span></div>
          <div class="card-body" style="overflow: scroll;height: 312px;">
            <table class="table m-0">
              <tbody>
                <tr>
                  <td class="align-middle">
                    <div class="weight-400"> 591  Valley Drive, Philadelphia</div>
                  </td>
                  <td class="align-middle">
                    <div class="weight-400"> 2021-12-01 12:12:12</div>
                  </td>
                  <td class="align-middle">3 day left</td>
                  <td class="align-middle text-right"><span class="material-icons align-middle md-18 text-danger">menu</span></td>
                </tr>
                <tr>
                  <td class="align-middle">
                    <div class="weight-400"> 591  Valley Drive, Philadelphia</div>
                  </td>
                  <td class="align-middle">
                    <div class="weight-400"> 2021-12-01 12:12:12</div>
                  </td>
                  <td class="align-middle">3 day left</td>
                  <td class="align-middle text-right"><span class="material-icons align-middle md-18 text-danger">menu</span></td>
                </tr>
                <tr>
                  <td class="align-middle">
                    <div class="weight-400"> 591  Valley Drive, Philadelphia</div>
                  </td>
                  <td class="align-middle">
                    <div class="weight-400"> 2021-12-01 12:12:12</div>
                  </td>
                  <td class="align-middle">3 day left</td>
                  <td class="align-middle text-right"><span class="material-icons align-middle md-18 text-danger">menu</span></td>
                </tr>
                <tr>
                  <td class="align-middle">
                    <div class="weight-400"> 591  Valley Drive, Philadelphia</div>
                  </td>
                  <td class="align-middle">
                    <div class="weight-400"> 2021-12-01 12:12:12</div>
                  </td>
                  <td class="align-middle">3 day left</td>
                  <td class="align-middle text-right"><span class="material-icons align-middle md-18 text-danger">menu</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row mb-2">
      <div class="col-lg-4">
        <div class="card">
          <div class="card-header bg-dark text-success py-1">Task <span class="text-light">Calendar</span></div>
          <div class="card-body h-75">
            <?php echo $calendar; ?>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="card mb-lg-0">
          <div class="card-header bg-dark text-success py-1">Today <span class="text-light">Schedule</span></div>
          <div class="card-body">
            <ul class="list-unstyled recent-activites" style="height: 218px;overflow: scroll;">
                <li>
                  <span class="activity-icon border-primary"></span>
                  <div class="media align-items-center">
                      <div class="media-body">
                        <h6 class="weight-400 mb-0">New task <a href="#" class="text-dark">#709875</a> has been created </h6>
                        <small class="text-muted">by Akshay kumar on 23 sep 2018</small>
                      </div>
                      <div class="dropdown">
                        <a href="#" class="text-muted" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="material-icons">more_vert</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                  </div>
                </li>

                <li>
                  <span class="activity-icon border-secondry"></span>
                  <div class="media align-items-center">
                      <div class="media-body">
                        <h6 class="weight-400 mb-0">malesuada fames ac ante ipsum primis</h6>
                        <small class="text-muted">by Akshay kumar on 23 sep 2018</small>
                      </div>
                      <div class="dropdown">
                        <a href="#" class="text-muted" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="material-icons">more_vert</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                  </div>
                </li>

                <li>
                  <span class="activity-icon border-info"></span>
                  <div class="media align-items-center">
                      <div class="media-body">
                        <h6 class="weight-400 mb-0">Phasellus vitae leo at sapien leo.</h6>
                        <small class="text-muted">by Akshay kumar on 23 sep 2018</small>
                      </div>
                      <div class="dropdown">
                        <a href="#" class="text-muted" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="material-icons">more_vert</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                  </div>
                </li>

                <li>
                  <span class="activity-icon border-warning"></span>
                  <div class="media align-items-center">
                      <div class="media-body">
                        <h6 class="weight-400 mb-0">Vivamus rhoncus ullamcorper justo</h6>
                        <small class="text-muted">by Akshay kumar on 23 sep 2018</small>
                      </div>
                      <div class="dropdown">
                        <a href="#" class="text-muted" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="material-icons">more_vert</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                  </div>
                </li>

                <li>
                  <span class="activity-icon border-secondry"></span>
                  <div class="media align-items-center">
                      <div class="media-body">
                        <h6 class="weight-400 mb-0">New task <a href="#" class="text-dark">#709875</a> has been created </h6>
                        <small class="text-muted">by Akshay kumar on 23 sep 2018</small>
                      </div>
                      <div class="dropdown">
                        <a href="#" class="text-muted" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="material-icons">more_vert</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                  </div>
                </li>

                <li>
                  <span class="activity-icon border-success"></span>
                  <div class="media align-items-center">
                      <div class="media-body">
                        <h6 class="weight-400 mb-0">Sed id dictum augue. Cras ac</h6>
                        <small class="text-muted">by Akshay kumar on 23 sep 2018</small>
                      </div>
                      <div class="dropdown">
                        <a href="#" class="text-muted" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="material-icons">more_vert</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                  </div>
                </li>

                <li>
                  <span class="activity-icon border-danger"></span>
                  <div class="media align-items-center">
                      <div class="media-body">
                        <h6 class="weight-400 mb-0">Donec accumsan eros tellus.</h6>
                        <small class="text-muted">by Akshay kumar on 23 sep 2018</small>
                      </div>
                      <div class="dropdown">
                        <a href="#" class="text-muted" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="material-icons">more_vert</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                  </div>
                </li>

                <li>
                  <span class="activity-icon border-secondry"></span>
                  <div class="media align-items-center">
                      <div class="media-body">
                        <h6 class="weight-400 mb-0">malesuada fames ac ante ipsum.</h6>
                        <small class="text-muted">by Akshay kumar on 23 sep 2018</small>
                      </div>
                      <div class="dropdown">
                        <a href="#" class="text-muted" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="material-icons">more_vert</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="#">Action</a>
                          <a class="dropdown-item" href="#">Another action</a>
                          <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                      </div>
                  </div>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
  
    <div class="row mb-2">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header bg-dark text-success py-1">Update <span class="text-light">Student Record</span></div>
          <div class="card-body table-responsive p-0">
            <table class="table  m-0">
              <thead>
                <tr>
                <th scope="col" class="border-top-0">Name</th>
                  <th scope="col" class="border-top-0">Address</th>
                  <th scope="col" class="border-top-0">Phone</th>
                  <th scope="col" class="border-top-0 text-right">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  foreach($lists as $row) {
                ?>
                <tr>
                  <td class="align-middle">
                    <small class="text-muted weight-300">
                      <?php echo $row->name; ?> (<?php echo $row->student_id; ?>)
                    </small>
                    <div><a href="<?php echo base_url('student'); ?>" class="weight-400"><?php echo $row->email; ?></a></div>
                  </td>
                  <td class="align-middle">
                    <div class="weight-400"><?php if(!empty($row->address)){ echo $row->address; } else { echo "..........."; } ?></div>
                  </td>
                  <td class="align-middle"><?php echo $row->phone; ?></td>
                <?php if($row->status == 1) { ?>
                  <td class="align-middle text-right text-success"><span class="material-icons align-middle md-18 text-success">check_circle</span> Activated</td>
                <?php } else { ?>
                  <td class="align-middle text-right"><span class="material-icons align-middle md-18 text-muted">info</span> Requested</td>
                <?php } ?>
                </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

<!-- ChartJS -->
<script src="<?php echo base_url('asset/admin/js/chartjs/Chart.js'); ?>"></script>
<script src="<?php echo base_url('asset/admin/js/chartjs/utils.js'); ?>"></script>  
<?php include(dirname(__FILE__) ."/templates/footer.php"); ?>
<script>
  "use strict";
  var color = Chart.helpers.color;
  var ch_month = [];
  var std_data = [];
  var obj = <?php print_r($json); ?>;

  $.each(obj, function(test,item){
    ch_month.push(item.month);
    std_data.push(item.std_count);          
  });
  window.onload = function() {
      var ctx = document.getElementById('canvas').getContext('2d');
      window.myBar = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ch_month,
            datasets: [{
                label: 'Enroll Student',
                data: std_data,
                backgroundColor: color(window.chartColors.green).alpha(0.7).rgbString(),
                borderColor: window.chartColors.black
            }]
          },
          options: {
            responsive: true,
            legend: {
              position: 'bottom',
              display: false,
            },
            title: {
              display: false,
              text: 'Monthly Enroll Report',
            }
          }
      });
    };
  
    $($proposal).on("change", function(){
      if ($proposal.val() != ''){
        var proposal = $proposal.val();
          classBirdge(proposal);
          $.ajax({
              url: "<?php echo base_url(); ?>adm/batch/fetch_course", 
              method: "POST", 
              data:{proposal : proposal},
              success: function(data)
              {
                $coursedata.html(data);
              }
          });
      } else {
        $coursedata.html('<option value="">Select Course</option>');
      }
    });


</script>
    
    