<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <h1 class="weight-300 h3 title">My Profile</h1>
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
      <div class="col-lg-4 mb-4">
        <div class="card h-100">
          <div class="card-body">
            <div style="text-align:center">
                <img src="<?php echo base_url('asset/admin/images/user.png'); ?>" class="img-thumbnail img-fluid rounded-circle" width="150">
            </div>
            <div class="text-center mt-3">
                <p>
                    <span>Username : </span>
                    <span class="text-dark weight-400"><?php echo $result->username; ?></span>
                </p>
                <p>
                    <span>Password : </span>
                    <span class="text-dark weight-400"> ********</span>
                </p>
                <p>
                    <span>Permission : </span>
                    <span class="text-dark weight-400"><span class="badge badge-info text-white"><?php echo $result->role; ?></span></span>
                </p>
                <hr class="my-4 dashed">
                <?php if (string_pos($sess_config, "admin")) {  ?>
                    <a href="<?php echo base_url('adm/portal/auth/add'); ?>" class="btn btn-sm btn-secondary text-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add New User"><span class="material-icons align-middle">add_circle</span></a>
                    <a href="<?php echo base_url('adm/portal/auth/lists'); ?>" class="btn btn-sm btn-secondary text-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Admin List"><span class="material-icons align-middle">list</span></a>
                <?php } ?>
                    <a href="<?php echo base_url('adm/portal/auth/useredit'); ?>" class="btn btn-sm btn-secondary text-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Information"><span class="material-icons align-middle">edit</span></a>
                    <a href="<?php echo base_url('adm/portal/auth/password'); ?>" class="btn btn-sm btn-secondary text-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Change Password"><span class="material-icons align-middle">loop</span></a>
            </div>
              
          </div>
        </div>
      </div>
      
      <div class="col-lg-8"> 
        <div class="card mb-4">
          <div class="card-header p-0">
            <ul class="nav nav-tabs active-thik nav-primary border-0" id="myTab" usr_role="tablist">
              <li class="nav-item">
                <a class="nav-link px-4 py-3 active rounded-0" id="profile-tab" data-toggle="tab" href="#profile" usr_role="tab" aria-controls="profile" aria-selected="false"><span class="material-icons align-middle">account_box</span> Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link px-4 py-3 rounded-0" id="site-tab" data-toggle="tab" href="#site" usr_role="tab" aria-controls="site" aria-selected="true"><span class="material-icons align-middle">settings_applications</span> Configuration</a>
              </li>
                <li class="nav-item">
                    <a class="nav-link px-4 py-3 rounded-0" id="logs-tab" data-toggle="tab" href="#logs" usr_role="tab" aria-controls="logs" aria-selected="true"><span class="material-icons align-middle">history</span> Login Session</a>
                </li>
            </ul>
          </div>

          <div class="card-body">
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile" usr_role="tabpanel" aria-labelledby="profile-tab">
              <p>
                <span>Full Name : </span>
                <span class="text-dark weight-400"><?php echo $result->full_name; ?></span>
              </p>
                <p>
                    <span>Email : </span>
                    <span class="text-dark weight-400"><?php echo $result->email; ?></span>
                </p>
              <p>
                <span>Phone Number : </span>
                <span class="text-dark weight-400">
                <?php echo $result->phone; ?>
                </span>
              </p>
              <p>
                <span>Address : </span>
                <span class="text-dark weight-400"><?php echo $result->address; ?></span>
              </p>
                <p>
                    <span>Facebook : </span>
                    <a href="https://www.facebook.com/<?php echo $result->facebook; ?>/" class="text-dark weight-400" target="_blank"><?php echo $result->facebook; ?></a>
                </p>
                <p>
                    <span>Twitter : </span>
                    <a href="https://twitter.com/<?php echo $result->twitter; ?>" class="text-dark weight-400"><?php echo $result->twitter; ?></a>
                </p>
                <p>
                    <span>Instagram : </span>
                    <a href="#" class="text-dark weight-400"><?php echo $result->instagram; ?></a>
                </p>
              <p>
              <span>Management : </span>
                <span class="text-dark weight-400"><?php echo str_replace('pe_','',$result->config); ?></span>
              </p>
            </div>

            <div class="tab-pane fade" id="site" usr_role="tabpanel" aria-labelledby="site-tab">
                <p>
                    <span>Site Name : </span>
                    <span class="text-dark weight-400"><?php echo $config->site_name; ?></span>
                </p>
                <p>
                    <span>Decimal Point : </span>
                    <span class="text-dark weight-400">
                      <?php echo $config->decimal_point; ?>
                    </span>
                </p>
                <p>
                    <span>Date Format : </span>
                    <span class="text-dark weight-400"><?php echo $config->date_format; ?></span>
                </p>
                <p>
                    <span>Mobile Format : </span>
                    <span class="text-dark weight-400">
                      <?php
                        if($config->phone_format == "244"){
                            echo "99-9999-9999";
                        } elseif($config->phone_format == "334") {
	                        echo "999-999-9999";
                        } elseif($config->phone_format == "433") {
	                        echo "9999-999-999";
                        }
                        ?>
                    </span>
                </p>
              <p>
                <span>Session Limit : </span>
                <span class="text-dark weight-400"><?php echo $config->user_session/60; ?> Min</span>
              </p>
                <p>
                    <span>Current Session Time : </span>
                    <span class="text-dark weight-400"><?php print_r($_SESSION['__admin_user_data']['login_time']); ?></span>
                </p>
                <p>
                    <span>Session Expired : </span>
                    <span class="text-dark weight-400"><?php print_r($_SESSION['__admin_user_data']['session_timeout']); ?></span>
                </p>
	            <?php if (string_pos($sess_config, "admin")) {  ?>
                <hr class="my-2 dashed">
                <div class="text-right">
                    <a href="<?php echo base_url('adm/portal/auth/useredit'); ?>" class="btn btn-sm btn-warning text-light" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Site Information"><span class="material-icons align-middle">edit</span></a>
                </div>
                <?php } ?>
              </div>
                
              <div class="tab-pane fade" id="logs" usr_role="tabpanel" aria-labelledby="logs-tab">
                  <div class="">
                      <div class="card">
                          <div class="card-body">
                              <div class="table-responsive">
                                  <table class="table table-striped bg-white text-nowrap">
                                  <thead>
                                  <tr>
                                      <th>ID</th>
                                      <th>Ipaddress</th>
                                      <th>agent</th>
                                      <th>Total Minutes</th>
                                      <th>Session Start</th>
                                      <th>Session Timeout</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  <?php foreach ($record as $row) { ?>
                                  <tr>
                                      <td><?php echo $row->id; ?></td>
                                      <td><?php echo $row->ipaddress; ?></td>
                                      <td><?php echo $row->agent; ?></td>
                                      <td><?php echo $row->session_time/60; ?> Min</td>
                                      <td><?php echo $row->session_start; ?></td>
                                      <td><?php echo $row->session_timeout; ?></td>
                                  </tr>
                                  <?php } ?>
                                  </tbody>
                              </table>

                          </div>
                      </div>
                  </div>
                  
                    <hr class="my-2 dashed">
                    <div class="text-right">
                        <a href="<?php echo base_url('delete/record/'.$_SESSION['__admin_user_data']['user_id']."/".$_SESSION['__admin_session_id']); ?>" class="btn btn-sm btn-secondary text-light" data-toggle="tooltip" data-placement="top" title="" data-original-title=""><span class="material-icons align-middle">autorenew</span></a>
                    </div>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
<!-- /page content -->

<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>
