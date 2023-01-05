$html = '
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="asset/css/style.css">
<style>
@font-face {
    font-family: sun-exta, sjis;
    font-style: normal;
    font-weight: normal;
    src: url('dompdf/dompdf/libs/fonts/DejaVuSans-Bold.ttf') format('truetype');
}
   
body {
    font-size: 13px;
    color: #111;
    font-weight: normal;
    font-family: sjis;
    line-height: 20px;
}


table {
    border-right: 0;
    border-bottom: 0;
    border-collapse: collapse;
    padding: 0px;
    margin: 0px;
}

table td,
table th {
    padding-left: 5px;
    padding-top: 5px;
    padding-bottom: 5px;
}

td {
    white-space: normal;
    padding: 8px 0px 8px 0px;
}
tr,td,th {
    border-top: 1px solid #000000;
    border-bottom: 1px solid #000000;
    border-left: 1px solid #000000;
    border-right: 1px solid #000000;
    text-align: left;
    padding: 0px;
}
section.header,.personal-info,.family-japan,.eligibility,.edu-background,.address {
    width: 100%;
    position: relative;
    margin: 0 auto;
}

.logo {
    width: 250px;
    float: left;
}
.application-title {
    width: 500px;
    margin: 0 auto;
    float: left;
}
img{
    width: 100%;;
}
th{
    background-color: #e6e4e3;
}
        
</style>
</head>

<body>
<section class="header" style="display: inline;position:absolute;">
	<div class="application-title" style="text-align:center;font-family:sjis;margin-left:80px;">
		<h2 style="font-family: sjis;padding:0px;margin:10px;">国際ことば学院日本語学校　入学願書</h2>
        <p style="font-size:14px;">Application for Admission to<br/> Kokusai Kotoba Gakuin Japanese Language School</p>
	</div>
</section>
<section class="header" style="padding: 0px;margin:0px;">
<div class="application-title" style="width:20%;height:160px;border:1px solid #000000;margin-left:550px;">
<?php if(!empty($result->image_file)) { ?>
              <img src="<?php echo base_url('upload/assets/adm/usr/'.$result->image_file); ?>" style="width:100%;height:auto;" class="pb-1">
    <?php } ?>

</div>
</section>
<section class="personal-info" style="width:100%;">
<div class="personal" style="width: 100%;display:inline-block;">
<h4 style="margin:0px;font-family: sjis;">1.氏名、性別、国籍、生年月日、年齢、出生地 <p style="font-size:12px ;">Applicant's name, sex, nationality, date of birth, age, place of birth</p></h4>
    <table style="width:100%;">
      <tr style="border-bottom:none !important;">
        <th style="width:10% !important; text-align: center; ">氏名<br>Full <br/>Name</th>
        <td style="text-align: left;"><?php echo $result->applicant_name?></td>
      </tr>
    </table>
    <table style="width:100%; ">
      <tr >
        <th style="width:10% !important; text-align: center; ">性別<br>sex</th>
        <td style="text-align: left;"><?php if($result->gender == '1'){echo 'Male';}else{echo 'Female';}?></td>
        <th style="width:15% !important; text-align: center; ">生年月日<br>Date of birth</th>
        <td style="text-align: left;"><?php echo $result->date_of_birthday?></td>
      </tr>
    </table>
    <table style="width:100%; ">
      <tr >
        <th style="width:15% !important; text-align: center; ">国籍<br>Nationality</th>
        <td style="width:30% ;text-align: left;"><?php echo $result->info_nationality?></td>
        <th style="width:15% !important; text-align: center; ">出生地<br>Place of birth</th>
        <td style="width:30% ;text-align: left;">(省Province) ・市 City)
        <br>
        <?php echo $result->province?> . <?php echo $result->place_birth?></td>
      </tr>
    </table>
<p style="font-family: sjis;font-size:11px;text-align:right;line-height:11px;">
    ※パスポートの出生地と同じように書いてくださいPlease write as same as on your Passport<br/>
    ※中国人の方は必ず「省」も書いて下さい。Chinese applicant must add the province name,too
</p>
</div>
</section>
<section class="personal-info" style="width:100%;">
<div class="personal" style="width: 100%;display:inline-block;">
<h4 style="margin:0px;font-family: sjis;">2.連絡先　Contact Details</h4>
<table style="width: 100%;">
    <tr>
        <th rowspan="2" style="width: 30%;">あなたの連絡先 <br>Contact details of yourself</th>
        <td colspan="4">
            <p style="width:100%;">現住所(Current Address) </p>
            <p><?php echo $result->address?></p>
        </td>
    </tr>
    <tr>
        <th style="width: 10%;">(TEL)</th>
        <td style="width: 30%;"><?php echo $result->info_phone?></td>
        <th style="width: 10%;">(E-mail)</th>
        <td style="width: 30%;"><?php echo $result->std_email?></td>
    </tr>
    </table>

    <table style="width: 100%;">
    <tr style="border-top: none !important;">
        <th rowspan="2" style="width: 30%;">家族の連絡先 <br>Contact details of your family</th>
        <td colspan="4">
            <p style="width:100%;">住所（Address of your family)  </p>
            <p><?php echo $result->family_address?></p>
        </td>
    </tr>
    <tr style="border-top: none !important;">
        <th style="width: 10%;">(TEL)</th>
        <td style="width: 30%;"><?php echo $result->family_tel?></td>
        <th style="width: 10%;">(E-mail)</th>
        <td style="width: 30%;"><?php echo $result->family_mail?></td>
    </tr>
    </table>
</div>
</section>

<section class="personal-info" style="width:100%;padding-top:10px;">
<div class="personal" style="width: 100%;display:inline-block;">
<h4 style="margin:0px;font-family: sjis;">3.現在の状況　Current Status　＜あなたは現在何をしていますか？＞</h4>
<div style="width: 100%;">
<p style="font-size:12px; width:27%;float:left;font-weight:bold;padding-left:10px;">A. 学校在学中（日本語学校を除く）</p>
<p style="width:70%;font-size: 10px;text-align:left;float:right;line-height:10px;">If you are currently being enrolled and registered as a student at a school (except private Japanese Language schools/intitues), please fill in the blanks below.</p>
</div>
    <table style="width:100%;">
      <tr style="border-bottom:none !important;">
        <th style="width:30% !important; text-align: center; ">学校名　Name of school</th>
        <td style="text-align: left;"><?php echo $result->current_status_school_name?></td>
      </tr>
    </table>
    <table>
      <tr>
        <th style="width:27% !important; text-align: center; ">学部・学科　Department/Major</th>
        <th style="width:25% !important; text-align: center; ">学年 Grade</th>
        <th colspan="2" style="width:30% !important; text-align: center; ">卒業予定日(Expected month and year of graduating from the school.)</th>
      </tr>
      <tr>
        <td><?php echo $result->current_status_school_major?></td>
        <td><?php echo $result->current_status_school_grade?></td>
        <th style="width:20% !important; text-align: center; ">卒業予定月年<br>will graduate in</th>
        <td> <?php echo $result->expected_month?><?php echo $result->expected_year?><br> Month Year</td>
      </tr>
    </table>
</div>
</section>

<section class="personal-info" style="width:100%;padding-top:5px;">
<div class="personal" style="width: 100%;display:inline-block;">
<div style="width: 100%;">
<p style="font-size:13px; width:27%;float:left;font-weight:bold;padding-left:10px;">B. 就職している場合</p>
<p style="width:70%;font-size: 10px;text-align:left;float:right;">If you are being employed or have a job, please fill in the blanks below.</p>
</div>
    <table style="width:100%;">
      <tr style="border-bottom:none !important;">
        <th style="width:30% !important; text-align: center; ">会社名　Company name</th>
        <td style="text-align: left;"><?php echo $result->place_employment_school?></td>
      </tr>
    </table>
    <table>
      <tr>
        <th style="width:40% !important; text-align: center; ">職種 <br>Type of job</th>
        <td style="width:60%"><?php echo $result->occupation?></td>
        <th style="width:40% !important; text-align: center; ">  在籍期間 <br>Period</th>
        <td style="width:60%"><?php echo $resulthisemp->year?></td>
      </tr>
    </table>
</div>
</section>
<section class="personal-info" style="width:100%;padding-top:5px;">
<div class="personal" style="width: 100%;display:inline-block;">
<p style="font-size:13px; width:100%;font-weight:bold;padding-left:10px;">
    C.その他（日本語学校の学生や、上記のA,B以外の場合、状況を詳しく書いて下さい。) <br>
   <span style="font-size: 10px;"> Others (If your are a student of Japanese language course, or neither a student nor a worker, explain your current situation in detail. )</span>
</p>
<table style="width: 100%;border:1px solid #000000;">
<tr>
    <td style="width: 100%;height:80px;border:1px solid #000000;"><?php echo $result9->student_work_details?></td>
 </tr>
</table>
</div>
</section>

<section class="personal-info" style="width:100%;padding-top:22px;">
<div class="personal" style="width: 100%;display:inline-block;">
<div style="width: 100%;">
<h4 style="width:30%;float:left;font-weight:bold;padding-left:10px;margin:0px;font-family: sjis;">4.旅券　Passport</h4>
<p style="width:40%;font-size: 14px;text-align:left;float:left;">
<input type="checkbox" <?php if($result->passport == '1'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">ありYes</label>
<input type="checkbox" <?php if($result->passport == '0'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">なし No</label>


</p>
</div>
    <table style="width:100%;">
      <tr style="border-bottom:none !important;">
        <th style="width:30% !important; text-align: center; ">旅券番号　Passport number</th>
        <td colspan="3" style="width:80%;text-align: left;"><?php echo $result->passport_no?></td>
      </tr>
      <tr style="border-bottom:none !important;">
        <th style="width:30% !important; text-align: center; ">発行年月日　Date of issue</th>
        <td style="text-align: left;border-right:none !important;text-align: right; "><span style="width:80px;float:right;"></span><?php echo $splitted = date('d', strtotime($result->passport_data_issue));?>日Day</td>
        <td style="text-align: left;border-left:none !important;border-right:none !important;text-align: right;"><span style="width:80px;float:right;"></span><?php echo $splitted = date('m', strtotime($result->passport_data_issue));?>月Month</p></td>
        <td style="text-align: left;border-left:none !important;text-align: right;"><span style="width:80px;float:right;"></span><?php echo $splitted = date('Y', strtotime($result->passport_data_issue));?>年Year</p></td>
      </tr>
      <tr>
        <th style="width:30% !important; text-align: center; ">有効期限　Date of expiration</th>
        <td style="text-align: left;border-right:none !important;text-align: right;"><span style="width:80px;float:right;"></span></span><?php echo $splitted = date('d', strtotime($result->passport_data_exp));?> 日Day</td>
        <td style="text-align: left;border-left:none !important;border-right:none !important;text-align: right;"><span style="width:80px;float:right;"></span></span> <?php echo $splitted = date('m', strtotime($result->passport_data_exp));?>月Month</p></td>
        <td style="text-align: left;border-left:none !important;text-align: right;"><span style="width:80px;float:right;"></span></span> <?php echo $splitted = date('Y', strtotime($result->passport_data_exp));?>年Year</p></td>
      </tr>
    </table>
</div>
</section>

<section class="personal-info" style="width:100%;padding-top:22px;">
<div class="personal" style="width: 100%;display:inline-block;">
<div style="width: 100%;">
<h4 style="width:60%;float:left;font-weight:bold;padding-left:10px;margin:0px;font-family: sjis;">5.申請歴　Have you ever applied for Certificate of Eligibility?</h4>
<p style="width:25%;font-size: 14px;text-align:left;float:right;">
<input type="checkbox" <?php if($result->eligibility_have == '1'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">ありYes</label>
<input type="checkbox" <?php if($result->eligibility_have == '0'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">なし No</label>
</p>
</div>
    <table style="width:100%;">
    <tr>
      <td style="width:10%;border-right:none !important;">
        <p style="font-size: 12px;text-align:left;float:right;">
            <input type="checkbox" <?php if($result9->intended_roll== "1"){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">交付<br/>issued</label>
        </p>
      </td>
      <td style="font-size:12px;width:27%;text-align:left;border-right:none !important;border-left:none !important;">(申請時の入学予定 年 月期生<br/>Intended to enroll  </td>
      <td style="width:12%;text-align:left;border-right:none !important;border-left:none !important;"><?php if($result9->intended_roll == '1'){ echo $splitted = date('Y', strtotime($result9->issued_date));}?>年<br/>year</td>
      <td style="width:12%;text-align:left;border-left:none !important;border-right:none !important;"><?php if($result9->intended_roll == '1'){ echo $splitted = date('m', strtotime($result9->issued_date));}?>月期生)<br/>month</td>
      <td style="width:12%;border-right:none !important;border-left:none !important;">
        <p style="font-size: 12px;text-align:left;float:right;">
            <input type="checkbox" <?php if($result9->intended_roll== "0"){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">不交付<br/>denied</label>
        </p>
      </td>  
      <td style="font-size:12px;width:25%;text-align:left;border-right:none !important;border-left:none !important;">(申請時の入学予定 年 月期生<br/>Intended to enroll  </td>
      <td style="width:12%;text-align:left;border-right:none !important;border-left:none !important;"><?php if($result9->intended_roll == '0'){echo $splitted = date('Y', strtotime($result9->issued_date));}?>年<br/>year</td>
      <td style="width:12%;text-align:left;border-left:none !important;border-right:none !important;"><?php if($result9->intended_roll == '0'){echo $splitted = date('m', strtotime($result9->issued_date));}?>月期生)<br/>month</td>
    </tr>
    </table>

    <table style="width:100%;">
    <tr>
      <td style="width:25%;text-align:left;border-right:none !important;border-left:none !important;">ビザの種類 type of visa </td>
      <td style="width:12%;text-align:left;border-right:none !important;border-left:none !important;">
         <p style="font-size: 12px;text-align:left;float:right;">
            <input type="checkbox" <?php if($result9->eligibility_visa == 'Student'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">留学<br/>Student</label>
         </p>
      </td>
      <td style="width:12%;text-align:left;border-right:none !important;border-left:none !important;">
         <p style="font-size: 12px;text-align:left;float:right;">
            <input type="checkbox" <?php if($result9->eligibility_visa == 'Trainee'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">研修<br/>Trainee</label>
         </p>
      </td>
      <td style="width:12%;text-align:left;border-right:none !important;border-left:none !important;">
         <p style="font-size: 12px;text-align:left;float:right;">
            <input type="checkbox" <?php if($result9->eligibility_visa == 'Technical'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">技能実習<br/>Technical Intern Training</label>
         </p>
      </td>
      <td style="width:12%;text-align:left;border-right:none !important;border-left:none !important;">
         <p style="font-size: 12px;text-align:left;float:right;">
            <input type="checkbox" <?php if($result9->eligibility_visa == 'Others'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">その他<br/>Others</label>
         </p>
      </td>
      <td style="width:12%;text-align:left;border-right:none !important;border-left:none !important;">(</td>
      <td style="width:12%;text-align:right;border-right:none !important;border-left:none !important;">)</td>
    </tr>
      
    </table>
</div>
</section>
<style>
    input{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: none !important;
  border-bottom: 2px solid red;
}
input {
    border: 0;
    outline: 0;
    border-bottom: 2px solid #1890ff;
}
</style>
<section class="header" style="display: inline;padding-top:15px;">
	<div class="application-title" style="text-align:center;font-family:sjis;margin-left:80px;">
		<h2 style="font-family: sjis;padding:0px;margin:10px;">≪履 歴 書≫ PERSONAL HISTORY </h2>
	</div>
</section>
<section class="header" style="display: inline;">
<form style="border:none !important;border-bottom:2px solid red !important;">
<table style="width: 100%;">
  <tr style="border: none !important;">
    <th style="width: 10%;background-color:none !important;border: none !important;">1. 氏名 <span  style="font-size: 11px;"> < Name > </span></th>
    <td style="width: 80%;border: none !important;"><?php echo $result->applicant_name?></td>
  </tr>
  </table>

<table style="width: 100%;">
  <tr style="border: none !important;width:20%;">
    <th rowspan="2" style="width: 16%;background-color:none !important;border: none !important;">2. 生年月日<span  style="font-size: 12px;"> < Date of birth > </span></th>
    <td style="width: 6%;border: none !important;text-align:center;"><?php echo $splitted = date('d', strtotime($result->date_of_birthday));?></td>
    <td style="width: 6%;border: none !important;text-align:center;">/<?php echo $splitted = date('m', strtotime($result->date_of_birthday));?></td>
    <td style="width: 6%;border: none !important;text-align:center;">/<?php echo $splitted = date('Y', strtotime($result->date_of_birthday));?></td>
    <th rowspan="2" style="width: 14%;background-color:none !important;border: none !important;">3. 国籍　<span  style="font-size: 12px;"> < Nationality > </span></th>
    <td rowspan="2" style="width: 10%;border: none !important;"><?php echo $result->info_nationality?></td>
  </tr>
  <tr style="border: none !important;">
  <td style="width: 10%;border: none !important;text-align:center;">Day</td>
  <td style="width: 10%;border: none !important;text-align:center;">Month</td>
  <td style="width: 10%;border: none !important;text-align:center;">Year</td>
  </tr>
</table>
<table style="width: 100%;">
  <tr style="border: none !important;">
    <th style="width: 25%;background-color:none !important;border: none !important;">4.現住所 <span  style="font-size: 12px;">< current housing address > </span><p style="font-size: 11px;">(the place you are living now)</p></th>
    <td style="width: 55%;border: none !important;"><?php echo $result->address?></td>
  </tr>
</table>
<br>
<table style="width: 100%;">
  <tr style="border: none !important;">
    <th style="width: 20%;background-color:none !important;border: none !important;">5. 電話番号 <span  style="font-size: 12px;">  < Phone number > </span></th>
    <td style="width: 30%;border: none !important;text-align:left;">(Home) <?php echo $result->info_phone?></td>
    <td style="width: 30%;border: none !important;text-align:right;text-align:left;">/(Mobile) <?php echo $result->info_phone?></td>
  </tr>
</table>
<br>
  <table style="width: 100%;">
  <tr style="border: none !important;">
    <th style="width: 30%;background-color:none !important;border: none !important;">6.  Eメール <span  style="font-size: 12px;"> < E-Mail address > </span></th>
    <td style="width: 65%;border: none !important;"><?php echo $result->std_email?></td>
  </tr>
  </table>
  <br>
  <table style="width: 100%;">
  <tr style="border: none !important;">
    <th style="width: 28%;background-color:none !important;border: none !important;">7.配偶者の有無 <span  style="font-size: 12px;"> < Marital Status > </span></th>
    <td style="width: 35%;border: none !important;">
    <input type="checkbox" <?php if($result->martial_status == '0'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">あり < Married ></label>
    <input type="checkbox" <?php if($result->martial_status == '1'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">なし < Single ></label>
    </td>
    <th style="width: 28%;background-color:none !important;border: none !important;"> <span style="font-size: 12px;">配偶者名 < Name of your spouse > </span></th>
    <td  style="width: 8%;border: none !important;"><?php if($result->partaner_name == ''){echo '-';}else{echo "$result->partaner_name";}?></td>
  </tr>
</table>
<br>
<p style="font-weight: bold;"> 8. 学歴  小学校～最終学歴 < Academic Accomplishments ></p>
<p style="line-height: 2px;">Please complete your detailed educational backgrounds from elementary to your most recent academic record.</p>
<table>
    <tr style="border-bottom: none !important;">
        <th rowspan="2" style="text-align:center;">学校名 <br>Name of School</th>
        <th rowspan="2" style="text-align:center;">所在地(住所) <br><span style="font-size: 11px;">Location(Address) <br>Town, City, State/Province and Country</span></th>
        <th colspan="3" style="text-align:center;border-bottom: none !important;"><span style="font-size: 11px;">在籍年月(入学年月~卒業年月) </span><br><span style="font-size: 11px;">Dates of Attendance</span></th>
        <th rowspan="2" style="text-align:center;">期間  <br><span style="font-size: 11px;">Duration total years</span></th>
    </tr>
    <tr style="border-top: none !important;">
      <th style="border-right:none !important;border-top: none !important;"></th>
      <th style="text-align:center;border-left:none !important;border-right:none !important;border-top: none !important;"><span style="font-size: 11px;">Month </span></th>
      <th style="text-align:center;border-left:none !important;border-top: none !important;"> <span style="font-size: 11px;">Year</span></th>
    </tr>
    <?php
          foreach($result1 as $row1){
        ?>  
    <tr>
        <td rowspan="2" style="width: 15%;"><?php echo $row1->edu_name?></td>
        <td rowspan="2" style="width: 25%;"><?php echo $row1->edu_address?></td>
        <th style="width: 10%;"><span style="font-size: 11px;">from</span></th>
        <td style="border-right:none !important;"><?php echo $row1->edu_start_date?></td> 
        <td style="border-left:none !important;">/<?php echo $row1->edu_start_date?></td>  
        <td rowspan="2" style="width: 15%;"><?php echo $row1->edu_year?></td>
    </tr>
    <tr>
       <th style="width: 10%;"><span style="font-size: 11px;">to</span></th>
       <td style="border-right:none !important;"><?php echo $row1->edu_end_date?></td> 
       <td style="border-left:none !important;">/<?php echo $row1->edu_end_date?></td>  
    </tr>
    <?php } ?>
    
</table>

<br><br>

<p for="" style="font-weight: bold;"> 9. 日本語学習経験　< Experience of studying Japanese ></p>
<p style="line-height: 11px;">(1)日本語学習時間　< Total study hours of Japanese Language ><span style="font-size: 10px;">Please describe your completed hours of studying Japanese. </span> </p>
<table style="width: 75%;">
    <tr >
        <th style="text-align:center;width:20%;font-size: 14px;">学校名 <p style="font-size:11px;">Name of School(s)</p></th>
        <th style="text-align:center;width:40%;font-size: 14px;">所在地(住所)  <p style="font-size:12px;">Location(Address) <br>Town, City, State/Province and Country</p></th>
        <th style="text-align:center;width:10%;font-size: 14px;">受講コース、<br>レベル <br> Name of <br>class/level </th>
        <th colspan="3" style="text-align:center;width:10%;font-size: 14px;">在籍年月(入学年月~卒業年月) <br>Dates of Attendance <br>Month     Year</th>
        <th style="text-align:center;width:10%;font-size: 14px;">コースの  <br>  総時間数 <br> total hours of the course </th>
        <th style="text-align:center;width:10%;font-size: 14px;">   既習時間数 <br>  総時間数 <br> Total completed hours (up to now)  </th>
        <th style="text-align:center;width:10%;font-size: 14px;">学習状況 <br> Status </th>
    </tr>
    <?php
          foreach($result2 as $row2){
    ?>  
    <tr>
        <td rowspan="2" style="width: 15%;"><?php echo $row2->jp_name?></td>
        <td rowspan="2" style="width: 15%;"><?php echo $row2->jp_address?></td>
        <td rowspan="2" style="width: 25%;"><?php echo $row2->jp_level?></td>
        <th style="width: 10%;font-size:11px;">from</th>
        <td style="border-right:none !important;width: 10%;"><?php echo $row2->jp_start_date?></td> 
        <td style="border-left:none !important;width: 10%;">/<?php echo $row2->jp_start_date?></td>  
        <td rowspan="2" style="width: 15%;text-align:center;"><?php echo $row2->jp_hour?><br/>hours</td>
        <td rowspan="2" style="width: 15%;text-align:center;"><?php echo $row2->jp_hour?><br/>hours</td>
        <td rowspan="2" style="width: 15%;">
        <input type="checkbox" <?php if($row2->jp_status == '1'){ echo "checked='checked'"; }else{echo"-";} ?>><label for="" style="font-size: 14px;">Completed</label>
        <input type="checkbox" <?php if($row2->jp_status == '0'){ echo "checked='checked'"; }else{echo"-";} ?>><label for="" style="font-size: 14px;">Still Studying</label><br>
      </td>
    </tr>
    <tr>
       <th style="width: 10%;font-size:11px;">to</th>
       <td style="border-right:none !important;width: 10%;"><?php echo $row2->jp_end_date?></td> 
       <td style="border-left:none !important;width: 10%;">/<?php echo $row2->jp_end_date?></td>  
    </tr>
    <?php } ?>
   
</table>

<br><br>
<p style="line-height: 2px;"> (2)日本語能力試験合格　< Japanese Language Tests (JLPT, NAT-TEST, J.TEST, TOP-J etc. )></p>
<p style="padding-left: 9px;line-height: 3px;">Please write name(s) of Japanese Proficiency Test you have taken and the passed level(s).  </p>
<table style="width: 100%;">
   <tr style="border-bottom: none !important;">
    <th colspan="2" style="text-align: center;width:10%;">受験日 <span style="font-size: 10px;">(Month/Year of the Test)</span></th>
    <th rowspan="2" style="text-align: center;width:40%;">  試験名　 <span style="font-size: 10px;">< Name of the test(s) > </span></th>
    <th rowspan="2" style="text-align: center;width:20%;">合格した級 <br><span style="font-size: 10px;"> level passed </span></th>
   </tr>
   <tr style="border-top: none !important;">
    <th style="text-align: center;width:15%;border-right: none !important;"><span style="font-size: 10px;">月Month</span></th> 
    <th style="text-align: center;width:15%;border-left: none !important;"><span style="font-size: 10px;">年 Year</span></th>
   </tr>
   <?php
          foreach($result3 as $row3){
    ?>  
   <tr>
    <td style="border-right: none !important; "><?php echo $row3->date_qualification?></td>
    <td style="border-left: none !important">/<?php echo $row3->date_qualification?></td>
    <td><?php echo $row3->achiv_name?></td>
    <td><?php echo $row3->level?></td>
   </tr>
  
   <?php } ?>
</table>
</form>
</section>
<section class="personal-info" style="width:100%;">
<div class="personal" style="width: 100%;display:inline-block;">
<div style="width: 100%;">
<h4 style="width:50%;float:left;font-weight:bold;padding-left:10px;margin:0px;font-family: sjis;">10. 仕事の経験 < Vocational experience(s) ></h4>
<p style="width:40%;font-size: 14px;text-align:left;float:right;">
<input type="checkbox" name="employment_experience" value="1" <?php if($result->employment_experience== '1'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;" >ある(Yes)・</label>
<input type="checkbox" name="employment_experience" value="0" <?php if($result->employment_experience== '0'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">なし (No)</label>
</p>
</div>
    <table style="width:100%;">
      <tr style="text-align: center;border-bottom: none !important;">
        <th rowspan="2" style="width:17%;text-align: center;">勤務先< 会社名 > <br/><span style="font-size: 11px;"> Name of Company </span></th>
        <th rowspan="2" style="width:18%;text-align: center;">職種 <br> <span style="font-size: 11px;">Occupation/type of job </span></th>
        <th rowspan="2" style="width:15%;text-align: center;">所在地 <br> <span style="font-size: 11px;">Place/Location </span></th>
        <th colspan="2" style="width:18%;text-align: center;">入社年月   <br><span style="font-size: 11px;">Starting </span></th>
        <th colspan="2" style="width:18%;text-align: center;">退社年月 <br><span style="font-size: 11px;"> Leaving</span></th>
      </tr>
    <tr style="border-top: none !important;">
      <th style="text-align: center;border-right:none !important;"><span style="font-size: 11px;">Month</span></th>
      <th style="text-align: center;border-left:none !important;"><span style="font-size: 11px;">Year</span></th>
      <th style="text-align: center;border-right:none !important;"><span style="font-size: 11px;">Month</span></th>
      <th style="text-align: center;border-left:none !important;"><span style="font-size: 11px;">Year</span></th>
    </tr>
    <?php
          foreach($result5 as $row5){
    ?>  
    <tr>
      <td><?php echo $row5->emp_name?></td>
      <td><?php echo $row5->emp_job_description?></td>
      <td><?php echo $row5->emp_address?></td>
      <td style="border-right: none !important;"><?php echo $row5->emp_start_date?></td>
      <td style="border-left: none !important;">/<?php echo $row5->emp_start_date?></td>
      <td style="border-right: none !important;"><?php echo $row5->emp_end_date?></td>
      <td style="border-left: none !important;">/<?php echo $row5->emp_end_date?></td>
    </tr>
    <?php } ?>
    </table>
</div>
</section>

<section class="personal-info" style="width:100%;">
<div class="personal" style="width: 100%;display:inline-block;padding:0px;margin:0px;">
<div style="width: 100%;">
<h4 style="width:50%;float:left;font-weight:bold;padding-left:10px;margin:0px;font-family: sjis;">11. 来日歴 < Experience of stay in Japan ></h4>
<p style="width:40%;font-size: 14px;text-align:left;float:right;">
<input type="checkbox" <?php if($result->have_you_visited_jp == '1'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">ある(Yes)・</label>
<input type="checkbox" <?php if($result->have_you_visited_jp == '0'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">なし (No)</label> 
</p>
</div>
    <table style="width:100%;border-bottom: none !important;">
      <tr style="text-align: center;border-bottom: none !important;">
        <th colspan="2" rowspan="2" style="width:40%;text-align: center;">滞在理由/場所 <br> <span style="font-size: 11px;">Purpose and Place of stay </span></th>
        <th rowspan="2" style="width:15%;text-align: center;">在留資格  <br> <span style="font-size: 11px;">Visa</span></th>
        <th colspan="3" style="width:15%;text-align: center;">入国年月日   <br> <span style="font-size: 11px;">Date of Arrival</span></th>
        <th colspan="3" style="width:15%;text-align: center;">出国年月日 <br>  <span style="font-size: 11px;">Date of Departure </span></th>
      </tr>
    <tr style="border-top: none !important;">
      <th style="text-align: center;border-right: none !important;width:10%;"> <span style="font-size: 11px;">Day</span></th>
      <th style="text-align: center;border-right: none !important;border-left: none !important;width:10%;"> <span style="font-size: 11px;">Month</span></th>
      <th style="text-align: center;border-left: none !important;width:10%;"> <span style="font-size: 11px;">Year</span></th>
      <th style="text-align: center;border-right: none !important;border-left: none !important;width:10%;"> <span style="font-size: 11px;">Day</span></th>
      <th style="text-align: center;border-right: none !important;border-left: none !important;width:10%;"> <span style="font-size: 11px;">Month</span></th>
      <th style="text-align: center;border-left: none !important;width:10%;"> <span style="font-size: 11px;">Year</span></th>
    </tr>
    <?php
          foreach($result8 as $row8){
    ?> 
    <tr>
      <td style="width: 3%;">1</td>
      <td><?php echo $row8->entry_purpose?></td>
      <td><?php echo $row8->pre_stay_visa?></td>
      <td style="border-right: none !important;"><?php echo $splitted = date('Y', strtotime($row8->arrival_date));?></td>
      <td style="border-left: none !important;border-right: none !important;">/<?php echo $splitted = date('m', strtotime($row8->arrival_date));?></td>
      <td style="border-left: none !important;">/<?php echo $splitted = date('d', strtotime($row8->arrival_date));?></td>
      <td style="border-right: none !important;"><?php echo $splitted = date('Y', strtotime($row8->depature_date));?></td>
      <td style="border-left: none !important;border-right: none !important;">/<?php echo $splitted = date('m', strtotime($row8->depature_date));?></td>
      <td style="border-left: none !important;">/<?php echo $splitted = date('d', strtotime($row8->depature_date));?></td>
    </tr>
    <?php } ?>
    </table>
    <p style="padding-left: 9px;padding-top: 5px;">●４回以上来日した場合、下欄に記入してください。
    <span style="font-size: 9px;"> If you have stayed in Japan more than four times, please use the blank below.</span>
    <?php echo $result->japan_four_times?>
    <hr><hr><hr>
  </p>
    
</div>
</section>

<div style="width: 100%;padding-top:20px;">
<h4  style="font-family: sjis;">12. 母国や日本での犯罪(交通違反を含む)による処分・強制送還歴はありますか？<span style="font-size: 11px;">< Regarding Criminal record etc. ></span></h4>
<p style="width:70%;float:left;font-family: sjis;"> (1) 犯罪歴　<span style="font-size: 11px;"> "Criminal record in your home country or Japan including dispositions due to traffic violations, etc."	</span></p>
<p style="width:28%;font-size: 14px;text-align:left;float:right;">
<input type="radio" <?php if($result->criminal_record == '1'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">ある Yes</label>
<input type="radio" <?php if($result->criminal_record == '0'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">なし No</label> 
</p>
<p style="width:70%;float:left;font-family: sjis;"> (2) 強制送還歴   Departure by deportation or departure order</p>
<p style="width:28%;font-size: 14px;text-align:left;float:right;">
<input type="radio" <?php if($result->departure_deportation == '1'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">ある Yes</label>
<input type="radio" <?php if($result->departure_deportation == '0'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">なし No</label> 
</p>
</div>
<br>
<div style="width: 100%;">
<h4  style="font-family: sjis;padding:0px;margin:0px;">13.  この学校を卒業した後の予定 < Future plan after graduating from this school.></h4>
 <input type="radio" style="font-size: 16px;" <?php if($result9->future_plan_after_graduating== 'A. 進学 Advancing to higher education'){ echo "checked='checked'"; } ?>><label for="">A. 進学　< Advancing to higher education></label><br><br>
 <p style="width: 50%;float:left;padding-left:12px;">
 <input type="checkbox" style="font-size: 16px;" <?php if(($result9->future_plan_checkdata01== "大学院( Master's degree / Doctoral course)") && ($result9->future_plan_after_graduating== 'A. 進学 Advancing to higher education')){ echo "checked='checked'"; } ?>><label for="">大学院< Master's degree / Doctoral course</label><br>
 <input type="checkbox" style="font-size: 16px;" <?php if(($result9->future_plan_checkdata01== '短期大学( Junior College )') && ($result9->future_plan_after_graduating== 'A. 進学 Advancing to higher education')){ echo "checked='checked'"; } ?>><label for="" > 短期大学< Junior College>  </label><br>
 <input type="checkbox" style="font-size: 16px;" <?php if(($result9->future_plan_checkdata01== 'その他 ( Other )') && ($result9->future_plan_after_graduating== 'A. 進学 Advancing to higher education')){ echo "checked='checked'"; } ?>><label for="">その他 < Other > </label><br>
 </p>
 <p style="width: 40%;float:right;padding-top:8px;">
 <input type="checkbox" style="font-size: 16px;" <?php if(($result9->future_plan_checkdata01== '大学( Undergraduate(Bachelor) )') && ($result9->future_plan_after_graduating== 'A. 進学 Advancing to higher education')){ echo "checked='checked'"; } ?>><label for="">大学< Undergraduate(Bachelor) > </label><br>
 <input type="checkbox" style="font-size: 16px;" <?php if(($result9->future_plan_checkdata01== '専門学校( Vocational School )') && ($result9->future_plan_after_graduating== 'A. 進学 Advancing to higher education')){ echo "checked='checked'"; } ?>><label for="">専門学校< Vocational School ></label>
 </p>
 <input type="radio" style="font-size: 16px;" <?php if($result9->future_plan_after_graduating== 'B. 就職 Planning to work'){ echo "checked='checked'"; } ?>><label for="">B. 就職 < Planning  to work></label><br><br>
 <input type="radio" style="font-size: 16px;" <?php if($result9->future_plan_after_graduating== 'C. 帰国 Returning home'){ echo "checked='checked'"; } ?>><label for="">C. 帰国 < Returning home> </label><br><br>
 <input type="radio" style="font-size: 16px;" <?php if($result9->future_plan_after_graduating== 'D. その他 < Other> (Specify)'){ echo "checked='checked'"; } ?>><label for="">D. その他 < Other> (Specify)</label>
 <textarea name="" id="" cols="30" rows="3" style="width:100%;border: 1px solid #000000;">-</textarea>
</div>
<div style="width: 100%;padding-top:15px;">
 <h4 style="font-family: sjis;">14. 日本語学習目的〈Purpose of Learning Japanese in Japan Kokusai Kotoba Gakuin JLS)〉</h4>
 <?php echo $result->purpose_studying_in_japanese?>
<hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr><hr>
</div>
<p>この履歴書は私が自分自身で書いたものであり、その内容はすべて事実であることを誓います。<br>
 I hereby swear that the all above is true and that I wrote this personal history myself.
</p>
<div>
  <p style="width:25%;float: left;padding-left:40%;">日付 Date:</p>
     <p style="width:5%;float: right;"><?php echo $splitted = date('d', strtotime($result->register_date));?>日　<br>day</p>
     <p style="width:15%;float: right;"><?php echo $splitted = date('m', strtotime($result->register_date));?>月 <br>month</p>
     <p style="width:15%;float: right;"><?php echo $splitted = date('Y', strtotime($result->register_date));?>年 <br>year</p>
     
</div>
<div style="width: 60%;float:right">
  <p>署名 Signature:<span>
  <?php if(!empty($result->sign_file)) { ?>
      <img src="<?php echo base_url('upload/assets/adm/usr/'.$result->sign_file); ?>" style="width:20%;height:auto;" class="pb-1">
    <?php } ?>
  </span></p>
</div>
   
<div style="width: 100%;">
<h1 style="text-align: center;margin:0px;padding-bottom:10px;">Written Oath for Defraying Expenses </h1>
</div>
<h4 style="line-height: 1px;margin:0px;padding:10px;">To the Minister of Justice of Japan:</h4>
<div style="width: 100%;">
<div style="width: 13%;border:3px solid #000000;height:20px;text-align:center;line-height:50px;font-size:18px;font-weight:bold;float:left">April</div>
<div style="width: 85%;float:right;">
  <table style="width: 100%;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
      <th style="width:30%;background-color:none !important;border-top:none!important;border-right:none!important;border-left:none!important;font-size:15px;text-align:center;font-weight:normal;">Applicant Nationality</th>
      <td style="width:70%;border-top:none !important;border-right:none!important;border-left:none!important;"><?php echo $result->info_nationality?></td>
    </tr>
  </table>
  <table style="width: 100%;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
      <th style="width:30%;background-color:none !important;border-top:none!important;border-right:none!important;border-left:none!important;font-size:15px;text-align:center;font-weight:normal;">Applicant Name in Full</th>
      <td style="width:70%;border-top:none !important;border-right:none!important;border-left:none!important;"><?php echo $result->applicant_name?></td>
    </tr>
  </table>
  <table style="width: 100%;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
      <th style="width:10%;background-color:none !important;border-top:none!important;border-right:none!important;border-left:none!important;font-size:15px;text-align:center;font-weight:normal;">Date of birth</th>
      <td style="width:12%;border-top:none !important;border-right:none!important;border-left:none!important;text-align:right;"><?php echo $splitted = date('Y', strtotime($result->date_of_birthday));?>year/</td>
      <td style="width:12%;border-top:none !important;border-right:none!important;border-left:none!important;text-align:right;"><?php echo $splitted = date('m', strtotime($result->date_of_birthday));?>month/</td>
      <td style="width:12%;border-top:none !important;border-right:none!important;border-left:none!important;text-align:right;"><?php echo $splitted = date('d', strtotime($result->date_of_birthday));?>day</td>
      <td style="width:20%;border-top:none !important;border-right:none!important;border-left:none!important;text-align:left;">
      <!-- ( <input style="width:10%;font-size:16px;" type="radio" name="" id="" ><label> male/</label>
     <input style="width:10%;font-size:16px;" type="radio" name="" id=""> <label>female )</label> -->
    (<input style="width:10%;font-size:16px;"type="radio" <?php if($result->gender == '1'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">male</label>
     <input style="width:10%;font-size:16px;" type="radio" <?php if($result->gender == '0'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">female</label> )

    </td>
    </tr>
  </table>
</div>
</div>
<br>
<p style="padding-left: 30px;font-size:14px;">
  I agree to defray all costs for the above person upon his/her stay in/visit to Japan. I will explain <br>
 the circumstances of this agreement below and give an oath to defray expenses.
</p>
<p style="font-size:16px;font-weight:bold;padding:0px;margin:0px;">1. Below please explain in detail the circumstances for your defraying the costs of the <br>
 applicant and your relationship to the applicant. </p>

 <table style="width:100%;">
  <tr style="border-bottom: 1px dotted #000000;">
    <td><?php echo $result9->defraying_details?></td>
  </tr>
  <br>
  <tr style="border-top:none !important;border-bottom: 1px dotted #000000; ">
    <td></td>
  </tr>
  <br>

  <tr style="border-top:none !important;">
    <td></td>
  </tr>
  <br>
 </table>

 <p style="font-size:16px;font-weight:bold;">2. Contents of Oath for Defraying Expenses  </p>
 <p style="padding-left: 30px;font-size:14px;">I do give an oath to defray the costs of the above person's stay in Japan. <br>
Further, when the above person applies for an extension of period of stay, I will provide copies of <br> proof of Telegraphic Transfer or of the applicant's bank account book (a document proving the <br> defraying of funds), showing that I defrayed the living expenses for the above person. 
</p>


<div style="width: 100%;padding-left:100px;">
<div style="width: 20%;text-align:left;font-size:16px;font-weight:bold;float:left;">1) Tuition</div>
<div style="width: 70%;float:right;">
<table style="width: 100%;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <th style="width:30%;font-size:16px;background-color:none !important;border-top:none!important;border-right:none!important;border-left:none!important;font-size:15px;text-align:left;font-weight:normal;">
      <input type="checkbox" style="font-size: 14px;" <?php if($result9->six_tuition_fee){ echo "checked='checked'"; } ?>><label for="" >Every 6months</label>
    </th>
      <td style="width:60%;font-size:16px;border-top:none !important;border-right:none!important;border-left:none!important;text-align:left;">300,000yen</td>
    </tr>
  </table>
  <table style="width: 100%;">
    <tr style="border-top: none !important;border-bottom: none !important;border-right:none!important;border-left:none!important;">
      <th rowspan="2" style="width:30%;background-color:none !important;border-top:none!important;border-right:none!important;border-left:none!important;font-size:15px;text-align:left;font-weight:normal;">
       <input type="checkbox" style="font-size: 14px;" <?php if(($result9->first_year_tuitioin_fee) || ($result9->second_year_tuitioin_fee)){ echo "checked='checked'"; } ?>><label for="" >Every year</label>
      </th>
      <td style="width:30%;font-size:16px;border-top:none !important;border-right:none!important;border-left:none!important;">600,000yen(for the first year) </td>
    </tr>
    <tr style="border-top: none !important;border-top: none !important;border-right:none!important;border-left:none!important;">
     <td style="width:30%;font-size:16px;border-top:none !important;border-right:none!important;border-left:none!important;border-bottom: none !important">600,000yen(for the second year)  </td>
    </tr>
  </table>
  
  <table style="width: 100%;">
    <tr style="border-right:none!important;border-left:none!important;">
      <th style="width:20%;background-color:none !important;border-top:none!important;border-right:none!important;border-left:none!important;font-size:15px;text-align:left;font-weight:normal;">
      <input type="checkbox"  style="font-size: 14px;" <?php if($result9->tuition_study_period){ echo "checked='checked'"; } ?>><label for="" >The whole period of studying</label>
    </th>
      <td style="width:10%;font-size:16px;border-top:none !important;border-right:none!important;border-left:none!important;text-align:center;">1,200,222yen</td>
    </tr>
  </table>
</div>
</div><br>

<div style="width: 100%;padding-left:100px;">
<div style="width: 30%;text-align:left;font-size:16px;font-weight:bold;float:left;">2) Living expenses</div>
<div style="width: 70%;float:right;">
<p style="width:30%;font-size:15px;float:left;">Monthly Amount</p>
<div style="width: 70%;float:right">
<table style="width: 60%;float:right;">
  <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
      <td style="width:20%;font-size:16px;border-top:none !important;border-right:none!important;border-left:none!important;text-align:right;line-height:2px;">
      <?php echo $result9->living_expense_amount ?>yen
    </td>
  </tr>
  </table>
</div>
  </div>
</div>
<div style="width: 100%;padding-left:100px;">
<p style="width: 100%;text-align:left;font-size:16px;font-weight:bold;float:left;">3) Method of payment
 <span style="font-size:12px;">(Please write the method of payment in detail; bank transfer, remittance etc.)</span>
</p>
<div style="width: 100%;">
<div style="width: 40%;float:left;">
<p style="font-size: 14px;"><input type="checkbox" style="font-size: 19px;line-height:1px;" <?php if($result9->payment_method == 'Bank Transfer (Overseas Remittance)'){ echo "checked='checked'"; } ?>>Bank Transfer </span><span style="font-size: 11px;">(Overseas Remittance)</span></p>
</div>
<div style="width: 20%;padding-left:20px;float:left;">
<p style="font-size: 14px;"><input type="checkbox" style="font-size: 19px;line-height:1px;" <?php if($result9->payment_method == 'Credit Card'){ echo "checked='checked'"; } ?>>Credit  Card</p>
</div>
<div style="width: 20%;padding-left:20px;float:right;">
<p for="" style="font-size: 14px;"><input type="checkbox" style="font-size: 19px;line-height:1px;" <?php if($result9->payment_method == 'Others'){ echo "checked='checked'"; } ?>>Others()</p>
</div>
</div>
</div>
<table style="width:100%;">
  <tr style="border-bottom: 1px dotted #000000;">
    <td></td>
  </tr>
  <br>
  <tr style="border-top:none !important;border-bottom: 1px dotted #000000; ">
    <td></td>
  </tr>
  <br>
  <tr style="border-top:none !important;">
    <td></td>
  </tr>
  <br>
 </table>
 <br>
 <h3 style="line-height: 2px;margin:0px;padding:0px;font-family: sjis;">《 Name of person defraying expenses 》</h3>
 <table style="width: 100%;">
  <tr style="border-top: none !important;border-left: none !important;border-right: none !important;">
    <th style="width: 10%;background-color:none !important;border-right: none !important;font-size:14px;">Name:</th>
    <td style="width: 90%;border-left: none !important;font-size:14px;"><?php echo $result9->defraying_name ?></td>
  </tr> 
 </table>
 <table style="width: 100%;">
  <tr style="border-top: none !important;border-left: none !important;border-right: none !important;">
    <th style="width: 20%;background-color:none !important;border-right: none !important;font-size:14px;">Address:</th>
    <td style="width: 80%;border-left: none !important;font-size:14px;"><?php echo $result9->defraying_address ?></td>
  </tr>
 </table>
 <div style="width: 100%;">
 <div style="width: 48%;float:left;">
 <table style="width: 100%;">
  <tr style="border-top: none !important;border-left: none !important;border-right: none !important;">
    <th style="width: 10%;background-color:none !important;border-right: none !important;font-size:14px;">TEL(home):</th>
    <td style="width: 30%;border-left: none !important;font-size:14px;"><?php echo $result9->defraying_tel ?></td>
  </tr>
 </table>
 </div>
 <div style="width: 48%;float:right;">
 <table style="width: 100%;">
  <tr style="border-top: none !important;border-left: none !important;border-right: none !important;">
    <th style="width: 10%;background-color:none !important;border-right: none !important;font-size:14px;">TEL(mobile):</th>
    <td style="width: 30%;border-left: none !important;font-size:14px;"><?php echo $result9->defraying_tel ?></td>
  </tr>
 </table>
 </div>
 </div>
 <div style="width: 100%;">
 <table style="width: 100%;">
  <tr style="border-top: none !important;border-left: none !important;border-right: none !important;">
    <th style="width: 20%;background-color:none !important;border-right: none !important;font-size:14px;">Relationship to the applicant:</th>
    <td style="width: 15%;border-left: none !important;border-right: none !important;font-size:14px;">
      <input type="checkbox" style="font-size: 16px;" <?php if($result9->defraying_relation == 'father'){ echo "checked='checked'"; } ?>><span style="font-size:14px;">Father</span>
    </td>
    <td style="width: 15%;border-left: none !important;border-right: none !important;font-size:14px;">
     <input type="checkbox" style="font-size: 16px;" <?php if($result9->defraying_relation == 'mother'){ echo "checked='checked'"; } ?>><span style="font-size:14px;">Mother</span>
    </td>
    <td style="width: 15%;border-left: none !important;border-right: none !important;font-size:14px;">
     <input type="checkbox" style="font-size: 16px;" <?php if($result9->defraying_relation == 'brother'){ echo "checked='checked'"; } ?>><span style="font-size:14px;">Brother/Sister</span>
    </td>
    <td style="width: 15%;border-left: none !important;font-size:14px;">
      <input type="checkbox" style="font-size: 16px;" <?php if($result9->defraying_relation == 'other'){ echo "checked='checked'"; } ?>><span style="font-size:14px;">Other()</span>
    </td>
  </tr>
 </table>
 </div>
 <table style="width: 100%;">
  <tr style="border-top: none !important;border-left: none !important;border-right: none !important;">
    <th style="width: 30%;background-color:none !important;border-right: none !important;font-size:14px;">Name of the company (Type of business):</th>
    <td style="width: 60%;border-left: none !important;font-size:14px;"><?php echo $result9->defraying_company ?></td>
  </tr>
 </table>
 <table style="width: 100%;">
  <tr style="border-top: none !important;border-left: none !important;border-right: none !important;">
    <th style="width: 30%;background-color:none !important;border-right: none !important;font-size:14px;">TEL(workplace) :</th>
    <td style="width: 60%;border-left: none !important;font-size:14px;"><?php echo $result9->defraying_work_tel ?></td>
  </tr>
 </table>

 <div style="width: 100%;">
 <div style="width: 48%;float:left;">
 <table style="width: 100%;">
  <tr style="border-top: none !important;border-left: none !important;border-right: none !important;">
    <th style="width: 10%;background-color:none !important;border-right: none !important;font-size:14px;">Signature:</th>
    <td style="width: 30%;border-left: none !important;font-size:14px;text-align:left;">
    <?php if(!empty($result->image_file)) { ?>
                             <img style="width:10%"; src="<?php echo base_url('upload/assets/adm/usr/'.$result->sign_file); ?>" width="100px;" class="pb-1">
                            <?php } ?>
  </td>
  </tr>
 </table>
 </div>
 <div style="width: 48%;float:right;">
 <table style="width: 100%;">
  <tr style="border-top: none !important;border-left: none !important;border-right: none !important;">
    <th style="width: 10%;background-color:none !important;border-right: none !important;font-size:14px;">Date:</th>
    <td style="width: 20%;border-left: none !important;border-right: none !important;font-size:14px;text-align:right;"> <?php echo $splitted = date('Y', strtotime($result->created_at));?><span style="font-size: 11px;"> year/</span></td>
    <td style="width: 20%;border-left: none !important;border-right: none !important;font-size:14px;text-align:right;"><?php echo $splitted = date('m', strtotime($result->created_at));?><span style="font-size: 11px;"> month/ </span></td>
    <td style="width: 20%;border-left: none !important;border-right: none !important;font-size:14px;text-align:right;"><?php echo $splitted = date('d', strtotime($result->created_at));?><span style="font-size: 11px;"> day </span></td>
  </tr>
 </table>
 </div>
 </div>

 <h2 style="text-align: center;font-family: sjis;">≪質 問 書≫ Questionnaire </h2>
 <p style="font-size:13.5px;font-family: sjis;">
 この質問書は、在留許可申請書を作成する際に必要ですので、具体的かつ詳しく記入してください。<br>
 This questionnaire may serve as reference information for preparing an application for your stay permission. <br>
 Please fill it in concretely and details.
</p>

<div style="width: 100%;">

<div style="width: 70%;float:left;">
<p style="width:25%;font-size:15px;float:left;">氏名 < Name ></p>
<div style="width: 75%;float:left">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <td style="width:100%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php echo $result->applicant_name?></td>
    </tr>
  </table>
</div>
</div>
<div style="width: 30%;float:right;">
<p style="width:10%;font-size:15px;float:left;">年齢 < Age ></p>
<div style="width: 55%;float:right">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <td style="width:100%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php echo $result->info_age?></td>
    </tr>
  </table>
</div>
</div>

</div>
<br>
<div style="width: 100%;">

<div style="width: 50%;float:left;">
<p style="width:45%;font-size:15px;float:left;">国籍 < Nationality ></p>
<div style="width: 50%;float:left">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <td style="width:100%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php echo $result->info_nationality?></td>
    </tr>
  </table>
</div>
</div>
<div style="width: 50%;float:right;">
<p style="width:25%;font-size:15px;float:left;"> 性別 < Sex ></p>
<div style="width: 75%;float:right">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <td style="width:100%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;text-align:center;">
     <input type="radio" <?php if($result->gender == '1'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">男＜Male＞</label>
     <input type="radio" <?php if($result->gender == '0'){ echo "checked='checked'"; } ?>><label for="" style="font-size: 14px;">女＜Female＞</label> 

  </td>
    </tr>
  </table>
</div>
</div>

</div>
<br>
<p style="font-size: 14px;">Ⅰ. あなたの家族についての質問 < Questions about your family.></p>
<p style="font-size: 14px;">（1） 家族の住所 < Family's address > </p>
<?php echo $result->family_address?>
<hr>
<hr>

<div style="width: 90%;">

<div style="width: 50%;float:left;">
<p style="width:10%;font-size:13px;float:left;">Tel:</p>
<div style="width: 80%;float:left">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <td style="width:100%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php echo $result->family_tel?></td>
    </tr>
  </table>
</div>
</div>
<div style="width: 50%;float:right;">
<p style="width:20%;font-size:13px;float:left;">Mobile:</p>
<div style="width: 80%;float:right">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <td style="width:100%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php echo $result->family_tel?></td>
    </tr>
  </table>
</div>
</div>

</div>
<div style="width: 90%;float:left;">
<p style="width:20%;font-size:13px;float:left;">E-mail （if any):</p>
<div style="width: 75%;float:left">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <td style="width:100%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php echo $result->family_mail?></td>
    </tr>
  </table>
</div>
</div>
<br><br>
<div style="width: 100%;">
  <p style="width:100%;">2） 家族のメンバー (Members of your family)</p>
</div>
<table style="width: 100%;">
  <tr>
    <th style="background-color:none !important;">氏名 Name</th>
    <th style="background-color:none !important;">続柄 Relation</th>
    <th style="background-color:none !important;">性別 Sex</th>
    <th style="background-color:none !important;">年齢 Age</th>
    <th style="background-color:none !important;">職業 Occupation</th>
  </tr>
  <?php
          foreach($result6 as $row6){
  ?> 
  <tr>
    <td><?php if($row6->fam_name == ''){echo '-';}else{echo $row6->fam_name;}?></td>
    <td><?php echo $row6->fam_relationship?></td>
    <td><?php echo $row6->fam_gender?></td>
    <td><?php echo $row6->fam_age?></td>
    <td><?php echo $row6->fam_occupation?></td>
  </tr>
  <?php } ?>
</table>
<br>
<div style="width: 100%;">
  <p style="width:100%;">（3）父親について < Questions about your father ></p>
</div>
<div style="width: 100%;">
<p style="width:60%;font-size:13px;float:left;">勤務先名称 < Name of the place where your father is working > </p>
<div style="width: 100%;">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <td style="width:100%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php if($result9->father_work_place){echo "$result9->father_work_place";}else{echo"-";} ?></td>
    </tr>
  </table>
</div>
</div>
<br>
<div style="width: 100%;">
<p style="width:60%;font-size:13px;float:left;">職種・役職 < Type of work/post >  </p>
<div style="width: 100%;">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <td style="width:100%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php if($result9->type_work_father){echo "$result9->type_work_father";}else{echo"-";} ?></td>
    </tr>
  </table>
</div>
</div>

<br>
<div style="width: 100%;">
  <p style="width:100%;">（4）母親について <Questions about your mother> </p>
</div>
<div style="width: 100%;">
<p style="width:60%;font-size:13px;float:left;">勤務先名称 < Name of the place where your mother is working > </p>
<div style="width: 100%;">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <td style="width:100%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php if($result9->mother_work_place){echo "$result9->mother_work_place";}else{echo"-";} ?></td>
    </tr>
  </table>
</div>
</div>
<br>
<div style="width: 100%;">
<p style="width:60%;font-size:13px;float:left;">職種・役職 < Type of work/post >  </p>
<div style="width: 100%;">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <td style="width:100%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php if($result9->type_work_mother){echo "$result9->type_work_mother";}else{echo"-";} ?></td>
    </tr>
  </table>
</div>
</div>
<p style="width: 100%;font-size: 14px;">Ⅱ. あなた自身についての質問　< Questions about yourself> </p>
<div style="width: 100%;">
<p style="width:60%;font-size:13px;float:left;">使える言語 < What language can you use? > </p>
<div style="width: 100%;">
<section class="personal-info">
    <p class="note" style="width: 100%;padding: 30px 10px;border: 1px solid #000000;"><?php if($result9->language_can_you_use){echo "$result9->language_can_you_use";}else{echo"-";} ?></p>
</section>
</div>
</div>

<div style="width: 100%;">
<p style="width:60%;font-size:13px;float:left;">得意な学科 < What subjects are you good at? > </p>
<div style="width: 100%;">
<section class="personal-info">
    <p class="note" style="width: 100%;padding: 30px 10px;border: 1px solid #000000;"><?php if($result9->you_are_good_subject){echo "$result9->you_are_good_subject";}else{echo"-";} ?></p>
</section>
</div>
</div>

<div style="width: 100%;">
<p style="width:60%;font-size:13px;float:left;">特技 < What is your special ability? >  </p>
<div style="width: 100%;">
<section class="personal-info">
    <p class="note" style="width: 100%;padding: 30px 10px;border: 1px solid #000000;"><?php if($result9->special_ability){echo "$result9->special_ability";}else{echo"-";} ?></p>
</section>
</div>
</div>

<div style="width: 100%;">
<p style="width:60%;font-size:13px;float:left;">趣味 < What are your hobbies? >  </p>
<div style="width: 100%;">
<section class="personal-info">
    <p class="note" style="width: 100%;padding: 30px 10px;border: 1px solid #000000;"><?php if($result9->hobbies){echo "$result9->hobbies";}else{echo"-";} ?></p>
</section>
</div>
</div>

<div style="width: 100%;">
<p style="width:60%;font-size:13px;float:left;">日本でやってみたいこと < What do you want to do in Japan? > </p>
<div style="width: 100%;">
<section class="personal-info">
    <p class="note" style="width: 100%;padding: 30px 0px;border: 1px solid #000000;"><?php echo $result9->what_todo_japan?></p>
</section>
</div>
</div>
<br>
<div style="width: 100%;">

<p style="width: 70%;text-align:left;font-size:16px;float:left;">
 <span style="font-size:13px;font-family: sjis;">薬や食べ物のアレルギーがありますか？ <span style="font-size: 11px;">〈Are you allergic to any medicine or foods?〉<span></span>
</p>

<div style="width: 30%;float:right;">
<div style="width: 45%;float:left;">

<p style="font-size: 14px;"><input type="radio" name="allergic_medicine" value="1" style="font-size: 19px;line-height:1px;" <?php if($result9->allergic_medicine== '1'){ echo "checked='checked'"; } ?>>はい Yes</p>
</div>
<div style="width: 45%;float:left;">
<p style="font-size: 14px;"><input type="radio" name="allergic_medicine" value="0" style="font-size: 19px;line-height:1px;" <?php if($result9->allergic_medicine== '0'){ echo "checked='checked'"; } ?>>いいえ No</p>
</div>
</div>
<div style="width: 100%;">
<p style="font-size: 12px;width:60%;float:left;">
※「はい」の場合、アレルギーについて詳しく教えてください <br>
If you select ”Yes”, please tell us in detal about your allegy.
</p>
<div style="width: 40%;float:right;">
<table style="width: 100%;">
  <tr style="border-top: none !important;border-left: none !important;border-right: none !important;">
    <td style="width: 30%;border-left: none !important;font-size:14px;"><?php if($result9->allergic_medicine_details){echo "$result9->allergic_medicine_details";}else{echo"-";} ?></td>
  </tr>
 </table>
 </div>
</div>
</div>
<br>
<p style="width: 100%;font-size: 14px;">Ⅲ.　日本に住んでいる兄弟や親戚がいれば書いてください。(氏名、住所、電話、勤務先、学校名等) 　</p> 
<p style="width: 100%;font-size: 14px;padding-left:22px;">※在留カードのコピーを提出していただきますよう、お願いします。 </p>
<p style="font-size: 12px;padding-left:18px;">If you have family who lives in Japan now, write his/her name, address, company/school name, <br>
and telephone number etc.　Please show us the copy of Residence card for confirm the information of them. 
</p>
<table style="width: 100%;">
  <tr>
    <th style="background-color:none !important;">氏名 <p style="font-size: 11px;"> Name </p></th>
    <th style="background-color:none !important;">生年月日 <p style="font-size: 11px;"> Date of Birth </p> </th>
    <th style="background-color:none !important;">続柄 <p style="font-size: 11px;"> Relationship </p></th>
    <th style="background-color:none !important;">勤務先/通学先 <p style="font-size: 11px;"> Company/School name</p></th>
    <th style="background-color:none !important;">住所/電話<p style="font-size: 11px;"> Address/Phone </p></th>
    <th style="background-color:none !important;">在留カード番号 <p style="font-size: 11px;">Residence Card number</p>  </th>
  </tr>
  <?php
          foreach($result7 as $row7){
  ?> 
  <tr>
    <td><?php echo $row7->ja_fam_name?></td>
    <td><?php if($row7->ja_fam_date_birth == ''){echo '-';}else{echo $row7->ja_fam_date_birth;}?></td>
    <td><?php echo $row7->ja_fam_relationship?></td>
    <td><?php echo $row7->ja_fam_work_place?></td>
    <td><?php echo $row7->ja_fam_address?></td>
    <td><?php echo $row7->residence_card_no?></td>
  </tr>
  <?php } ?>
</table>
<br><br><br><br>
<p style="width: 100%;font-size: 14px;">Ⅳ.　日本人の友人、知り合いがいれば書いてください。(氏名、住所、電話、関係など) </p> 
<p>you/your family have Japanese friends or acquaintances, please write his/her name, address, <br>  phone number, relationship, etc.</p>
<section class="personal-info">
    <p class="note" style="width: 100%;padding: 140px 0px;border: 1px solid #000000;"><?php echo $result9->family_inJpfri?></p>
</section>
<br><br>
<p style="width: 100%;font-size: 14px;">Ⅴ.　あなたと家族の写真をこの下に貼って下さい。<span style="font-size: 12px;"> Please attach the picture of you and your family below this.</span> </p>
<br>
<section class="personal-info">
    <p class="note" style="width: 90%;padding: 160px 0px;border: 1px solid #000000;text-align:center;">
    <?php if(!empty($result->family_file)) { ?>
      <img src="<?php echo base_url('upload/assets/adm/usr/'.$result->family_file); ?>" style="width:20%;height:auto;" class="pb-1">
    <?php } ?></p>
</section>
<br><br><br><br><br>
<h2 style="text-align: center;font-family: sjis;">家族同意書 </h2>
<h2 style="text-align: center;font-family: sjis;padding:0px;margin:0px;">LETTER OF FAMILY MEMBER'S CONSENT  </h2>
<br>
<p style="font-size: 20px;font-weight:bold;">国際ことば学院日本語学校　御中 <br><span style="font-size:18px;">
To Kokusai Kotoba GakuinJapanese Language School </span>
</p>
<br>
<div style="width:100%;padding-left: 22px;line-height:4px;">
  <p style="font-size:16px;">私は、下記の者の日本留学に同意します。また、次のことを約束します。</p>
  <p style="font-size:14px;">I gave a consent to the study in Japan of the person below. I also promise you the following </p>
  <p style="font-size:14px;">matters. </p>
</div>
<p style="text-align: center;font-family: sjis;font-size:14px;">記</p>
<div style="padding-left:60px;">
<table style="width: 90%;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <th style="width:30%;font-size:14px;background-color:none !important;border-top:none!important;border-right:none!important;border-left:none!important;font-size:15px;text-align:left;font-weight:normal;">
    留学生氏名 <br>
Applicant name
    </th>
      <td style="width:60%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;text-align:left;"><?php echo $result->applicant_name?></td>
    </tr>
</table>
</div>
<div style="width:90%;padding-left:60px;">
<div style="width: 50%;float:left;">
<table style="width: 90%;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <th style="width:40%;font-size:14px;background-color:none !important;border-top:none!important;border-right:none!important;border-left:none!important;font-size:15px;text-align:left;font-weight:normal;">
    生年月日 <br> Date of birth  
    </th>
      <td style="width:23%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;text-align:right;"><?php echo $splitted = date('Y', strtotime($result->date_of_birthday));?>年</td>
      <td style="width:23%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;text-align:right;"><?php echo $splitted = date('m', strtotime($result->date_of_birthday));?>月</td>
      <td style="width:23%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;text-align:right;"><?php echo $splitted = date('d', strtotime($result->date_of_birthday));?>日</td>
    </tr>
</table>
</div>
<div style="width: 45%;float:right;">
<table style="width: 90%;">
  <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <th style="width:20%;font-size:14px;background-color:none !important;border-top:none!important;border-right:none!important;border-left:none!important;font-size:15px;text-align:left;font-weight:normal;">国籍 <br> Nationality</th>
    <td style="width:20%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;text-align:left;"><?php echo $result->info_nationality?></td>
  </tr>
</table>
</div>
</div>
<br><br>
<div style="width:100%;padding-left: 22px;line-height:4px;">
  <p style="font-size:16px;">1. 学費は、学校が指定する期日までに支払います。</p>
  <p style="font-size:14px;padding-left: 22px;">I will pay his/her school tuition fee by the specified date of the school. </p>
</div>
<br>
<div style="width:100%;padding-left: 22px;line-height:4px;">
  <p style="font-size:16px;">2.本人を勉学に専念させ、日本国の法令に違反したり、在学中勉学を中止して</p>
  <p style="font-size:14px;padding-left: 22px;">逃亡したりすることがないように指導します。  </p>
  <br><br><br>
  <p style="font-size:14px;padding-left: 22px;">I will have the person concentrate in the study, and will guide him/her so that</p>
  <p style="font-size:14px;padding-left: 22px;">he/she will not be against the laws of Japan, will not quit study or not flee away. </p>
</div>
<br>
<div style="width:100%;padding-left: 22px;line-height:4px;">
  <p style="font-size:16px;">3. 国際ことば学院日本語学校より退学の処分を受けたときは、責任を持って帰国させます。</p>
  <br><br><br>
  <p style="font-size:14px;padding-left: 22px;">If he/she should be dismissed by Kokusai Kotoba Gakuin Japanese Language School,</p>
  <p style="font-size:14px;padding-left: 22px;">I will have him/her repatriate in my responsibility.  </p>
</div>
<div style="width:40% ;float:right">
<table style="width: 100%;text-align:right">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;float:right">
      <td style="width:23%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;text-align:right;"><?php echo $splitted = date('Y', strtotime($result->register_date));?>年</td>
      <td style="width:23%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;text-align:right;"><?php echo $splitted = date('m', strtotime($result->register_date));?>月</td>
      <td style="width:23%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;text-align:right;"><?php echo $splitted = date('d', strtotime($result->register_date));?>日</td>
    </tr>
</table>
<table style="width: 100%;text-align:right">
    <tr style="border-top: none !important;border-bottom: none !important;border-right:none!important;border-left:none!important;float:right">
      <td style="width:23%;font-size:14px;border-top:none !important;border-bottom: none !important;border-right:none!important;border-left:none!important;text-align:right;">year</td>
      <td style="width:23%;font-size:14px;border-top:none !important;border-bottom: none !important;border-right:none!important;border-left:none!important;text-align:right;">month</td>
      <td style="width:23%;font-size:14px;border-top:none !important;border-bottom: none !important;border-right:none!important;border-left:none!important;text-align:right;">day</td>
    </tr>
</table>
<br>
<table style="width: 100%;text-align:right">
    <tr style="border-top: none !important;border-bottom: none !important;border-right:none!important;border-left:none!important;float:right">
      <td style="width:23%;font-size:14px;border-top:none !important;border-bottom: none !important;border-right:none!important;border-left:none!important;text-align:right;">（署名　Signature） </td>
      <td style="width:23%;font-size:14px;border-top:none !important;border-bottom: none !important;border-right:none!important;border-left:none!important;text-align:center;">
      <?php if(!empty($result->image_file)) { ?>
    <img style="width:20%;" src="<?php echo base_url('upload/assets/adm/usr/'.$result->sign_file); ?>" width="150px;">
 <?php } ?>
    </td>
    </tr>
</table>
</div>

<div style="width: 100%;">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <th style="width:20%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;background-color:none !important;text-align:center;">同意者氏名 <br> Name of person who <br>gave the consent </th>
    <td style="width:80%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php echo $result9->consent_name?></td>
    </tr>
  </table>
</div>
<div style="width: 100%;">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <th style="width:10%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;background-color:none !important;text-align:center;">続柄<br>Relation </th>
    <td style="width:20%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;">
      <input type="checkbox" value="father" <?php if($result9->consent_relation == 'father'){ echo "checked='checked'"; } ?>><label for="">父親 Father </label>
    </td>
    <td style="width:15%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;">
      <input type="checkbox" value="mother" <?php if($result9->consent_relation == 'mother'){ echo "checked='checked'"; } ?>><label for="">母親 Mother </label>
    </td>
    <td style="width:25%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;">
      <input type="checkbox" value="brother" <?php if($result9->consent_relation == 'brother'){ echo "checked='checked'"; } ?>><label for="">兄弟/姉妹 Brother／Sister  </label>
    </td>
    <td style="width:20%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;">
      <input type="checkbox" value="other" <?php if($result9->consent_relation == 'other'){ echo "checked='checked'"; } ?>><label for="">その他 Others ()</label>
    </td>
    
    </tr>
  </table>
</div>
<div style="width: 100%;">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <th style="width:10%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;background-color:none !important;text-align:center;">住所 <br>Address </th>
    <td style="width:90%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php echo $result9->consent_address?></td>
    </tr>
  </table>
</div>


<div style="width: 100%;">

<div style="width: 48%;float:left">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <th style="width:20%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;background-color:none !important;text-align:center;">電話番号 <br> Telephone</th>
    <td style="width:60%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php echo $result9->consent_tel?></td>
    </tr>
  </table>
</div>
<div style="width: 48%;float:right">
  <table style="width: 100%;float:right;">
    <tr style="border-top: none !important;border-right:none!important;border-left:none!important;">
    <th style="width:50%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;background-color:none !important;text-align:center;">Eメール(あれば）<br> E-mail（if you have) </th>
    <td style="width:50%;font-size:14px;border-top:none !important;border-right:none!important;border-left:none!important;"><?php echo $result9->consent_email?></td>
    </tr>
  </table>
</div>

</div>
</body>
</html>
</html>';
