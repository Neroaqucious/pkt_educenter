<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php include(dirname(__FILE__) ."/../templates/header.php"); ?>

<div class="content-wrapper">
  <div class="row page-tilte align-items-center">
    <div class="col-md-auto">
      <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
      <h1 class="weight-300 h3 title">JLS Applicant Complete</h1>
    </div> 
    <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
      <div class="controls d-flex justify-content-center justify-content-md-end float-right">
      <a href="<?php echo base_url('adm/portal/jls_applicant'); ?>" class="btn btn-secondary py-1 px-2" ><span class="material-icons align-text-bottom">reorder</span></a>
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
<style>

label {
    font-weight: 400;
    font-size: 16px !important;
}      
.std_img{
    padding-top: 12px;
}
.list_label{
    padding-top: 12px;
}
.comfirm_val{
    /* padding-left: 12px; */
    font-size: 14px;
}
.tbl_comfirmVal{
  font-size: 14px;
}
p{
  margin-bottom: 0px;
}
</style>
<div class="content">
<div class="row">
<div class="col-lg-12 col-md-12 mb-4 mb-lg-0">
<div class="card">
<div class="card-body">
<div class="" style="width: 50%;margin: 0 auto;height: 400px;">
            <p style="margin-bottom: 30px;">Japanese Language School Applicant စာရင်းသွင်းမှုအောင်မြင်ပါသည်။</p>
                              <div class="box">
                  <a href="<?php echo base_url('pkt-edu/adm/portal/jls_applicant/'); ?>" class="btn-icon confirmBtn">&nbsp;To Applicant List</a>
                </div>
                        </div>
            
             
          </div>
</div>
</div>
</div>
</div>
</div>

<?php include(dirname(__FILE__) ."/../templates/footer.php"); ?>
<script>
  function filePreview(input,div){
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $(div).empty();
          $(div).html('<embed src="'+e.target.result+'" width="50%" >');
      };
      reader.readAsDataURL(input.files[0]);
    }
  }

  $("#clickImg").change(function () {
    filePreview(this,"#showImg1");
  });
  </script>

<style>
  .table-bordered thead th, .table-bordered thead td {
    font-size: 15px;
    font-weight: 400;
    border-bottom-width: 2px;
}
input#clickImg {
    /* width: 252px; */
    padding: 3.5px;
}
.col-form-label {
  width:49%;
  padding-top: 7px;
  padding-bottom: 10px;
}
#showImg1 {
    margin: 10px 140px 0px;
}
div.content_detail{
position: relative;
margin:0 2em 1em;
}
.dropdown{
position: absolute;
left: 0;
top: 0;
/* height: 100%; */
width: 100%;
opacity:0;
visibility: 0;
}
.drop_ttl{
background:#f1797b;
color:white;
padding: 0.75rem 1.25rem;
position: relative;
margin: 0px;
border: 1px solid rgba(0, 0, 0, 0.125);
border-radius: 5px;
}
.drop_label::before {
content: "";
display: inline-block;
margin-top: 5px;
    margin-right: 5px;
border: 8px solid transparent;
border-top: 12px solid white;
}
.drop_label{
  cursor: pointer;
  position: relative;
  display: flex;
  align-items: center;
}
/* input:checked ~ p .drop_label::before {
    margin-top: 5px;
    margin-right: 5px;
    border: 8px solid transparent;
    border-top: 12px solid white;
} */

.drop_label{
cursor: pointer;
position: relative;
display: flex;
align-items: center;
margin-bottom: 0px;
}
/* div.drop_txt{
max-height:0px;
overflow: hidden;
transition:max-height 0.9s;
} */
/* div.drop_txt p {
padding:2em;
} */
.dropdown:checked ~ .drop_ttl ~ div.drop_txt{
max-height:100%;
}
a{
color:#48a1af;
}
.school_select {
    padding: 8px;
    margin: 7px 5px 7px 0px;
    border: 1px solid #ced4db;
    border-radius: 3px;
}
.school_list{
  width: 55%;
  padding: 5px 12px;
  align-items: center;
  display: flex;
}
.list_label{
  width: 49%;
  font-size: 16px;
  margin: 0px;
}
.text-right {
    padding-bottom: 27px;
    text-align: right !important;
}
.confirmBtn {
    float: right;
}
.backBtn, .confirmBtn, .home {
    display: inline-block;
    vertical-align: middle;
    -webkit-transform: perspective(1px) translateZ(0);
    transform: perspective(1px) translateZ(0);
    position: relative;
    background: #c61508;
    text-align: center;
    padding: 5px 20px 6px;
    -webkit-transition-property: color;
    transition-property: color;
    -webkit-transition-duration: 0.3s;
    transition-duration: 0.3s;
    font-size: 16px;
    line-height: 24px;
    color: #ffffff;
    text-transform: capitalize;
}
</style>