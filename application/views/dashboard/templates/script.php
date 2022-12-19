<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php 
    $f_unlimited = (isset($result->unlimited))?$result->unlimited:"";  //Unlimited student
    $f_liveclass = (isset($result->liveclass))?$result->liveclass:"";   //Online or Offline target
    $f_proposal = (isset($result->ref_key))?$result->ref_key:"";   //Select option Online and Offline




    $f_duration_month = (isset($result->month_duration))?$result->month_duration:"";
    $f_duration_day = (isset($result->day_duration))?$result->day_duration:"";
    $f_times_start = (isset($result->start_time))?$result->start_time:"";
    $f_times_end = (isset($result->end_time))?$result->end_time:"";
    $f_start_date = (isset($result->start_date))?$result->start_date:"";
    $f_class_days = (isset($result->days))?$result->days:"";
?>
<script>

/*** function group */ 
  function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#attach-file').remove();
          $('#target-img').append('<img src="'+e.target.result+'" style="width:150px;margin-top:4px;" id="attach-file">');
        };
      reader.readAsDataURL(input.files[0]);
    }
  }

  
  var $unlimitedData = "<?php echo $f_unlimited; ?>";
  var $liveclassData = "<?php echo $f_liveclass; ?>";
  var $proposalData = "<?php echo $f_proposal; ?>";


  var $liveclass = $("#liveclass");
  var $unlimited = $("#unlimitedCheck");
  var $proposal = $("#proposal"); 
  var $liveoff = $("#liveoff");  
  var $coursedata = $("#coursedata");
  var $total_student = $("#total_student");  
  var $liveassets = $("#liveassets");

  /** For localclassroom studend **/
  var $duration_month = $("#month_duration");
  var $duration_day = $("#day_duration");
  var $times_start = $("#start_times");
  var $times_end = $("#end_times");
  var $start_date = $("#start_date");

  function checkValue_Assign($id, $data, $def) {
    if($data == "") {
      $id.val($def);
    } else {
      $id.val($data);
    }
  }

  function liveClassAsset(){
    if($liveclass.val() === "on"){
      $liveoff.show();
      checkValue_Assign($duration_month,"<?php echo $f_duration_month; ?>", "");
      checkValue_Assign($duration_day,"<?php echo $f_duration_day; ?>", "");
      checkValue_Assign($times_start,"<?php echo $f_times_start; ?>", "");
      checkValue_Assign($times_end,"<?php echo $f_times_end; ?>", "");
      checkValue_Assign($start_date,"<?php echo $f_start_date; ?>", "");
      $('input:checkbox[name="class_days[]"]').filter('[value="Online"]').attr('checked', false);
    } else if($liveclass.val()  === "off"){
      $liveoff.hide();
      checkValue_Assign($duration_month,"<?php echo $f_duration_month; ?>", "-");
      checkValue_Assign($duration_day,"<?php echo $f_duration_day; ?>", "-");
      checkValue_Assign($times_start,"<?php echo $f_times_start; ?>", "00:00");
      checkValue_Assign($times_end,"<?php echo $f_times_end; ?>", "00:00");
      checkValue_Assign($start_date,"<?php echo $f_start_date; ?>", "1970-01-01");
      $('input:checkbox[name="class_days[]"]').filter('[value="Online"]').attr('checked', true);
    }
  }
  
/*** Event Group ***/
$(document).ready(function(){
  liveClassAsset();
  $($proposal).on("change", function(){
    if ($proposal.val() != ''){
    var proposal = $proposal.val();
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

  $liveclass.change(function(){
    liveClassAsset();
  });

  $unlimited.click(function(){
    if($(this).prop("checked") == true){
      $total_student.attr("value", 0);
      $total_student.val(0);
      $total_student.attr("readonly", "readonly");
    } else if($(this).prop("checked") == false){
      $total_student.attr("value", "");
      $total_student.val("");
      $total_student.removeAttr("readonly");
      $total_student.removeAttr("disabled");
    }
  });

  $("#upload_file").change(function () {
    filePreview(this);
  });    
});
</script>
