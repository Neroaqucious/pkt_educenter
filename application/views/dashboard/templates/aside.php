<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php include("html head.php"); ?>
<?php include("function.php"); ?>

<section class="wrapper">
  <!-- SIDEBAR -->
  <aside class="sidebar">
    <nav class="navbar navbar-dark bg-danger">
      <span>PKT Education Center</span>
    </nav>

  <nav class="navigation" >
    <ul>
      <li class="<?php if($uri[0] != "" && $uri[0] == "dashboard") { echo "open active"; } ?>"><a href="<?php echo base_url('adm/portal/d-panel'); ?>" title="Dashboard"><span class="nav-icon material-icons">dashboard</span> Dashboard</a></li>
    </ul>

    <?php if(string_pos($sess_config, "pe_student") !== FALSE ){ ?>
      <ul>
        <li class="<?php if($uri[0] != "" && $uri[0] == "student") { echo "open active"; } ?>">
          <a href="#" title="Layout Options"><span class="nav-icon material-icons">account_box</span> Student  </a>
          <ul class="sub-nav">
              <li class="<?php if($uri[1] != "" && $uri[1] == "std_lists") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/student'); ?>" title="">List</a>
              </li>
              <li class="<?php if($uri[1] != "" && $uri[1] == "std_add") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/student/add'); ?>" title="">Add New</a>
              </li>
          </ul>
        </li>  
      </ul>
    <?php } ?>

    <!-- <?php if(string_pos($sess_config, "pe_student") !== FALSE ){ ?> -->
      <ul>
        <li class="<?php if($uri[0] != "" && $uri[0] == "langschoolapplicant") { echo "open active"; } ?>">
          <a href="#" title="Layout Options"><span class="nav-icon material-icons">account_box</span> JLSApplicant</a>
          <ul class="sub-nav">
              <li class="<?php if($uri[1] != "" && $uri[1] == "jls_lists") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/jls_applicant'); ?>" title="">List</a>
              </li>
              <li class="<?php if($uri[1] != "" && $uri[1] == "jls_add") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/jls_applicant/add'); ?>" title="">Add New</a>
              </li>
          </ul>
        </li>  
      </ul>
    <!-- <?php } ?> -->

    <?php if (string_pos($sess_config, "pe_course")!== FALSE ){ ?>
      <ul>
        <li class="<?php if($uri[0] != "" && $uri[0] == "category") { echo "open active"; } ?>">
          <a href="#" title="Layout Options">
            <span class="nav-icon material-icons">category</span> Category  </a>
          <ul class="sub-nav">
            <li class="<?php if($uri[1] != "" && $uri[1] == "category_lists") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/category'); ?>" title="">Category List</a>
            </li>
            <li class="<?php if($uri[1] != "" && $uri[1] == "subcategory_lists") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/subcategory'); ?>" title="">Subcategory List</a>
            </li>
            <li class="<?php if($uri[1] != "" && $uri[1] == "level_lists") { echo "active"; } ?>">
              <a href="<?php echo base_url('adm/portal/level'); ?>" title="">Level List</a>
            </li>
          </ul>
        </li> 
        
        <li class="<?php if($uri[0] != "" && $uri[0] == "instructor") { echo "open active"; } ?>">
        <a href="#" title="Layout Options"><span class="nav-icon material-icons">record_voice_over</span> Instructor  </a>
          <ul class="sub-nav">
            <li class="<?php if($uri[1] != "" && $uri[1] == "instructor_lists") { echo "active"; } ?>">
              <a href="<?php echo base_url('adm/portal/instructor'); ?>" title="">List</a>
            </li>
            <li class="<?php if($uri[1] != "" && $uri[1] == "instructor_add") { echo "active"; } ?>">
              <a href="<?php echo base_url('adm/portal/instructor/add'); ?>" title="">Add New</a>
            </li>
          </ul>
        </li>

        <li class="<?php if($uri[0] != "" && $uri[0] == "course") { echo "open active"; } ?>">
        <a href="#" title="Layout Options"><span class="nav-icon material-icons">book</span> Course  </a>
          <ul class="sub-nav">
            <li class="<?php if($uri[1] != "" && $uri[1] == "course_lists") { echo "active"; } ?>">
              <a href="<?php echo base_url('adm/portal/course'); ?>" title="">List</a>
            </li>
            <li class="<?php if($uri[1] != "" && $uri[1] == "course_add") { echo "active"; } ?>">
              <a href="<?php echo base_url('adm/portal/course/add'); ?>" title="">Add New</a>
            </li>
          </ul>
        </li> 
        
        <li class="<?php if($uri[0] != "" && $uri[0] == "batch") { echo "open active"; } ?>">
          <a href="#" title="Layout Options"><span class="nav-icon material-icons">cast_connected</span> Batch  </a>
          <ul class="sub-nav">
            <li class="<?php if($uri[1] != "" && $uri[1] == "batch_lists") { echo "active"; } ?>">
              <a href="<?php echo base_url('adm/portal/batch'); ?>" title="">List</a>
            </li>
            <li class="<?php if($uri[1] != "" && $uri[1] == "batch_add") { echo "active"; } ?>">
              <a href="<?php echo base_url('adm/portal/batch/add'); ?>" title="">Add New</a>
            </li>
          </ul>
        </li>  

      </ul>
    <?php } ?>

    <?php if (string_pos($sess_config, "pe_data")!== FALSE ){ ?>
      <ul>
        <li class="<?php if($uri[0] != "" && $uri[0] == "lessons") { echo "open active"; } ?>">
            <a href="#" title="UI Componets"><span class="nav-icon material-icons ">video_library</span> Media   </a>
            <ul class="sub-nav">
                <li class="<?php if($uri[1] != "" && $uri[1] == "lessons_lists") { echo "active"; } ?>">
                  <a href="<?php echo base_url('adm/portal/lessons'); ?>" title="">List</a>
                </li>
            </ul>
          </li>
      </ul>
    <?php } ?>

    <?php if (string_pos($sess_config, "pe_activity")!== FALSE ){ ?>
      <ul>
        <li class="<?php if($uri[0] != "" && $uri[0] == "event") { echo "open active"; } ?>">
            <a href="#" title="eCommerce"><span class="nav-icon material-icons ">fiber_new</span> Event & News   </a>
            <ul class="sub-nav">
              <li class="<?php if($uri[1] != "" && $uri[1] == "event_list") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/news'); ?>" title="Event List">List</a>
              </li>
              <li class="<?php if($uri[1] != "" && $uri[1] == "event_add") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/news/add'); ?>" title="Add New">Add New</a>
              </li>
            </ul>
          </li>

          <li class="<?php if($uri[0] != "" && $uri[0] == "tag") { echo "open active"; } ?>">
            <a href="#" title="eCommerce"><span class="nav-icon material-icons ">loyalty</span> Tags  </a>
            <ul class="sub-nav">
              <li class="<?php if($uri[1] != "" && $uri[1] == "tag_add") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/tags'); ?>" title="Tag List">List</a>
              </li>
            </ul>
          </li>

          <li class="<?php if($uri[0] != "" && $uri[0] == "qanda") { echo "open active"; } ?>">
            <a href="#" title="Blogger"><span class="nav-icon material-icons">help</span> Q & A   </a>
            <ul class="sub-nav">
              <li class="<?php if($uri[1] != "" && $uri[1] == "list") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/qanda'); ?>" title="QandA List">List</a>
              </li>
              <li class="<?php if($uri[1] != "" && $uri[1] == "add") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/qanda/add'); ?>" title="Feed List">Add New</a>
              </li>
            </ul>
          </li>

        <?php if($alert['feedback'] > 0) { ?>
          <li class="notification alert-notify <?php if($uri[0] != "" && $uri[0] == "feedback") { echo "open active"; } ?>">
            <a href="<?php echo base_url('adm/portal/feedback'); ?>"><span class="nav-icon material-icons">forum</span> Feedback </a></li>
        <?php } else { ?>
            <li class="alert-notify <?php if($uri[0] != "" && $uri[0] == "feedback") { echo "open active"; } ?>">
            <a href="<?php echo base_url('adm/portal/feedback'); ?>"><span class="nav-icon material-icons">forum</span> Feedback </a></li>
        <?php } ?>
      </ul>
    <?php } ?>

    <?php if (string_pos($sess_config, "pe_payment") !== FALSE){ ?>
    <ul>   
      <li class="<?php if($uri[0] != "" && $uri[0] == "payment") { echo "open active"; } ?>">
        <a href="" title="Documentation"><span class="nav-icon material-icons">credit_card</span> Payment  </a>
        <ul class="sub-nav">
          <li class="<?php if($uri[1] != "" && $uri[1] == "payment_list") { echo "active"; } ?>">
            <a href="<?php echo base_url('adm/portal/payment') ?>" title="Feed List">List</a></li>
          <li class="<?php if($uri[1] != "" && $uri[1] == "payment_add") { echo "active"; } ?>">
            <a href="<?php echo base_url('adm/portal/payment/add') ?>" title="Feed List">Add New</a></li>
        </ul>
      </li>
    </ul>
    <?php } ?>
    
    <?php if (string_pos($sess_config, "pe_admin") !== FALSE){ ?>
      <ul>
          <li class="<?php if($uri[0] != "" && $uri[0] == "admin") { echo "open active"; } ?>">
            <a href="" title="Documentation"><span class="nav-icon material-icons">security</span> Administrator  </a>
            <ul class="sub-nav">
              <li class="<?php if($uri[1] != "" && $uri[1] == "admin_list") { echo "active"; } ?>">
                  <a href="<?php echo base_url('adm/portal/auth/lists') ?>" title="Feed List">List</a></li>
              <li class="<?php if($uri[1] != "" && $uri[1] == "admin_add") { echo "active"; } ?>">
                  <a href="<?php echo base_url('adm/portal/auth/add') ?>" title="Feed List">Add New</a></li>
            </ul>
          </li>

          <li class="<?php if($uri[0] != "" && $uri[0] == "role") { echo "open active"; } ?>">
            <a href="" title="Documentation"><span class="nav-icon material-icons">stars</span> User Role  </a>
            <ul class="sub-nav">
              <li class="<?php if($uri[1] != "" && $uri[1] == "role_list") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/auth/role') ?>" title="Feed List">List</a></li>
              <li class="<?php if($uri[1] != "" && $uri[1] == "role_add") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/auth/role_add') ?>" title="Feed List">Add New</a></li>
            </ul>
          </li>
      </ul>
    <?php } ?>
    
    <?php if (string_pos($sess_config, "pe_config")!== FALSE ){ ?>
      <ul>  
        <li class="<?php if($uri[0] != "" && $uri[0] == "email") { echo "open active"; } ?>">
          <a href="" title="Documentation"><span class="nav-icon material-icons">alternate_email</span> Email  
        </a>
          <ul class="sub-nav">
            <li class="<?php if($uri[1] != "" && $uri[1] == "email_list") { echo "active"; } ?>">
              <a href="<?php echo base_url('adm/portal/email') ?>" title="Email List">List</a></li>
            <li class="<?php if($uri[1] != "" && $uri[1] == "email_add") { echo "active"; } ?>">
                <a href="<?php echo base_url('adm/portal/email/add') ?>" title="Add New">Add New</a></li>
          </ul>
        </li>
      </ul>
    <?php } ?>



  </nav>
</aside>