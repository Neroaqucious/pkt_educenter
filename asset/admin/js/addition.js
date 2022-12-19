$(document).ready(function(){

$("#add_sumit").click(function(e){
   e.preventDefault();
   Send();
});

function check_empty($field){
  if($field.val() != "") {
    return $field.val();
  }
  return false;
}

function Send(){
  var $productname = $("#product_Name");
  var $productdesc = $("#product_Desc");
  var $otherdesc = $("#other_Desc");
  var $productcode = $("#product_Code");
  var $productprice = $("#product_Price");
  var $cateogry = $("#categoryid");
  var $subcategory = $("#subcategoryid");
  var $appetizer = $("#appetizerid");
  var $file = $("#clickImg");
  var $emptycheck = 0;

  if(check_empty($productname)){
    $productname.removeClass("is-invalid");
    $emptycheck ++;
  } else {
    $productname.addClass("is-invalid");
    $emptycheck = 0;
  }

  if(check_empty($productdesc)){
    $productdesc.removeClass("is-invalid");
    $emptycheck ++;
  } else {
    $productdesc.addClass("is-invalid");
    $emptycheck = 0;
  }

  // if(check_empty($otherdesc)){
  //   $otherdesc.removeClass("is-invalid");
  //   $emptycheck ++;
  // } else {
  //   $otherdesc.addClass("is-invalid");
  //   $emptycheck = 0;
  // }

  if(check_empty($productcode)){
    $productcode.removeClass("is-invalid");
    $emptycheck ++;
  } else {
    $productcode.addClass("is-invalid");
    $emptycheck = 0;
  }

  if(check_empty($productprice)){
    $productprice.removeClass("is-invalid");
    $emptycheck ++;
  } else {
    $productprice.addClass("is-invalid");
    $emptycheck = 0;
  }

  if(check_empty($cateogry)){
    $cateogry.removeClass("is-invalid");
    $emptycheck ++;
  } else {
    $cateogry.addClass("is-invalid");
    $emptycheck = 0;
  }

  if(check_empty($subcategory)){
    $subcategory.removeClass("is-invalid");
    $emptycheck ++;
  } else {
    $subcategory.addClass("is-invalid");
    $emptycheck = 0;
  }

  if(check_empty($appetizer)){
    $appetizer.removeClass("is-invalid");
    $emptycheck ++;
  } else {
    $appetizer.addClass("is-invalid");
    $emptycheck = 0;
  }

  if(check_empty($file)){
    $file.removeClass("is-invalid");
    $emptycheck ++;
  } else {
    $file.addClass("is-invalid");
    $emptycheck = 0;
  }

  if(parseInt($emptycheck) == 8) {
    $("form").submit();
  } 

}



// --- subcategory with categorylist ---
  $('#categoryid').change(function(){
    var categoryid = $('#categoryid').val();
      if (categoryid != ''){
        $.ajax({
            url: "<?php echo base_url(); ?>admin/product/fetch_category", 
            method: "POST", 
            data:{categoryid : categoryid},
            success: function(data)
            {
              $('#subcategoryid').html(data);
            }
        });
    } else {
      $('#subcategoryid').html('<option value="">Select Subcategory Name</option>');
    }
  });

// ---   Return subcategory id after validation ---
  $('#subcategoryid').change(function(){
    var subcat = $('#subcategoryid').val();
    $('.subcategory').val(subcat);
  });

  var categoryid = $('#categoryid').val();
  var subcategoryid = $('.subcategory').val();

    if (categoryid != ''){
      $.ajax({
          url: "<?php echo base_url(); ?>admin/product/fetch_category", 
          method: "POST", 
          data:{categoryid:categoryid,subcategoryid:subcategoryid},
          success: function (data)
          {
            $('#subcategoryid').html(data);
          }
      });
    } else {
      $('#subcategoryid').html('<option value="">Select Subcategory Name</option>');
    }

  


  function filePreview(input){
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#showImg').empty();
            $('#showImg').html('<embed src="'+e.target.result+'" width="50%" height="40%">');
        };
        reader.readAsDataURL(input.files[0]);
    }
  }

  $("#clickImg").change(function () {
    filePreview(this);
  });



}); 