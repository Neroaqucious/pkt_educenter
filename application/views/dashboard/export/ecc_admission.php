$html = '
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="asset/css/style.css">
<style>
@font-face {
    font-family: sun-exta, big5;
    font-style: normal;
    font-weight: normal;
    src: url('dompdf/dompdf/libs/fonts/DejaVuSans-Bold.ttf') format('truetype');
}
   
body {
    font-size: 14px;
    color: #111;
    font-weight: normal;
    font-family: big5;
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
td{
    padding: 20px 0px;
}
        
</style>
</head>
<body>
<section class="header">
    <div class="logo">
    </div>
        <h2 style="text-align:center;font-family:big5;">入　学　願　書 </h2>
       <p class="application-title" style="text-align:center;font-weight:normal;font-size:20px;line-height:1px;">Application for Admission</p>
</section>
<br>
<section class="eligibility">   
<div style="width:120px;height:149px;float: right;border:1px solid #000000;margin:0px;padding:0px;">
    <?php if(!empty($result->image_file)) { ?>
              <img src="<?php echo base_url('upload/assets/adm/usr/'.$result->image_file); ?>" style="width:100%;height:auto;" class="pb-1">
    <?php } ?>
</div>      
<div  style="width: 558px;float: left;margin:0px;padding:0px;">
<table style="width: 100%;border-bottom:none !important;margin-top:30px;">
    <tr style="border-bottom:none !important;">
        <th style="width: 40%;border-right:none !important;">氏名 Name in Full (Family → Given):</th>
        <td style="width: 30%;border-left:none !important;"><?php echo $result->applicant_name?></td>
        <th style="width: 15%;border-right:none !important;">性別 SEX</th>
        <td style="border-left:none !important;"><?php if($result->gender == '1'){echo 'Male';}else{echo 'Female';}?></td>
    </tr>
</table> 
<table style="width: 100%;border-top:none !important;border-bottom:none !important;">
    <tr style="border-bottom:1px dotted #000000;">
        <th style="width:22%;border-bottom:none !important;border-bottom:1px dotted #000000;border-right:1px dotted #000000;text-align:center;">アルファベット<br>Alphabet</th>
        <td style="border-bottom:1px dotted #000000;border-left:1px dotted #000000;"><?php echo $result->applicant_name?></td>
    </tr>
</table>
<table style="width: 100%;border-top:none !important;">
    <tr style="border-top:none !important;">
        <th style="width:22%;border-bottom:none !important;border-bottom:1px dotted #000000;border-right:1px dotted #000000;text-align:center;">漢字<br>Chinese Character</th>
        <td style="border-bottom:1px dotted #000000;border-left:1px dotted #000000;"><?php echo $result->applicant_name_kanji?></td>
    </tr>
</table> 
</div>
<table style="padding:0px;margin:0px;width:100%;border-top:none !important;text-align:center;" class="tbl">
    <tr class="text-center" style="font-size: 12px;border-top:none !important;text-align:center;border-bottom:1px dotted #000000;">
        <th scope="col" style="border-top:none !important;text-align:left;">生年月日 Date of Birth</th>
        <th scope="col" class="align-middle" style="border-top:none !important;text-align:left;">出生地 Place of Birth</th>
        <th scope="col" style="border-top:none !important;text-align:left;">国籍  Nationality</th>
    </tr>
    <tr class="text-center" style="font-size: 12px;border-top:none !important;">
        <td><?php echo $result->date_of_birthday?></td>
        <td><?php echo $result->place_birth?></td>
        <td><?php echo $result->info_nationality?></td>
    </tr>
 </table>
 <table style="padding:0px;margin:0px;width:100%;border-top:none !important;border-bottom:none !important;" class="tbl">
    <tr style="border-top:none !important;">
        <th style="border-top:none !important;text-align:left;">現住所(本人)  Applicant's Address</th>
    </tr>
    <tr style="border-top:none !important;border-bottom:none !important;" >
        <td  style="width: 60%;border-top:none !important;"></td>
    </tr>
    <tr style="border-top:none !important;border-bottom:none !important;" >
        <td  style="width: 60%;border-top:none !important;"><?php echo $result->address?></td>
    </tr>
    <tr style="border-top:none !important;border-bottom:none !important;" >
        <td  style="width: 60%;border-top:none !important;"></td>
    </tr>
    <tr style="border-top:none !important;border-bottom:none !important;" >
        <td  style="width: 60%;border-top:none !important;"></td>
    </tr>
</table>
<table style="border-bottom:none !important;width:100%;">
    <tr  style="border-bottom:none !important;font-size:14px;">
        <th colspan="2" style="width:25%;text-align:center;border-right:none !important;">E-mail</th>
        <td style="width:25%;border-left:none !important;border-right:none !important;font-size:14px;"><?php echo $result->std_email?></td>
        <th style="width:25%;text-align:center;border-right:none !important;border-left:none !important;font-size:14px;">TEL</th>
        <td style="width:25%;border-left:none !important;font-size:14px;"><?php echo $result->info_phone?></td>
    </tr>
</table> 
<table style="width:100%;">
    <tr style="font-size:14px;border-bottom:1px dotted #000000;">
        <th style="width: 30%;">職業 Occupation</th>
        <th style="width: 50%;">勤務先・通学先 Place of Employment or School</th>
    </tr>
    <tr style="border-top:none !important;border-bottom:none !important;">
        <td  style="text-align:left;"></td>
        <td  style="text-align:center;"></td>
    </tr>
    <tr style="border-top:none !important;border-bottom:none !important;">
        <td  style="text-align:left;"><?php echo $result->occupation?></td>
        <td  style="text-align:left;"><?php echo $result->place_employment_school?><?php echo $result->educational_school_name?></td>
    </tr>
    <tr style="border-top:none !important;border-bottom:none !important;">
        <td  style="text-align:center;"></td>
        <td  style="text-align:center;"></td>
    </tr>

</table> 
<table style="padding:0px;margin:0px;width:100%;text-align:left;" class="tbl">
    <tr>
        <th style="text-align:left;">勤務先・通学先の住所 Address of Occupation or School</th>
    </tr>
  
    <tr style="border-top:none !important;border-bottom:none !important;">
        <td  style="text-align:center;"></td>
    </tr>
    <tr style="border-top:none !important;border-bottom:none !important;">
        <td  style="text-align:left;"><?php echo $result->addr_employment_school?></td>
    </tr>
    <tr style="border-top:none !important;border-bottom:none !important;">
        <td  style="text-align:center;"></td>
    </tr>
    <tr style="border-top:none !important;border-bottom:none !important;">
        <td  style="text-align:center;"></td>
    </tr>
</table>
<table style="border-bottom:none !important;width:100%;">
    <tr  style="border-bottom:none !important;font-size:14px;">
        <th clospan="2" style="width:50%;text-align:right;border-right:none !important;border-left:none !important;font-size:14px;">TEL</th>
        <td style="width:50%;text-align:left;border-left:none !important;font-size:14px;">　　　<?php echo $result->tel_employment_school?></td>
    </tr>
</table> 
<table style="padding:0px;margin:0px;width:100%;text-align:left;" class="tbl">
    <tr style="border-bottom: none !important;">
        <th style="border-bottom: none !important;border-right: none !important;"></th>
        <td style="border-bottom: none !important;border-left: none !important;"></td>
    </tr>
    <tr style="border-top:none !important;border-bottom:none !important;">
        <th  rowspan="1" style="width: 50%;border-top:none !important;border-right:none !important;text-align:left;">本校での学習予定期間 Length of Study at ECC</th>
        <td  rowspan="1" style="text-align:center;width: 40%;border-left:none !important;"><?php echo $result->course_study_lengh?>  年　year(s)</td>
    </tr>
    <tr style="border-top: none !important;">
        <th style="border-bottom: none !important;border-right: none !important;"></th>
        <td style="border-bottom: none !important;border-left: none !important;"></td>
    </tr>
</table>
<table style="padding:0px;margin:0px;width:100%;text-align:left;" class="tbl">
    <tr style="border-top:none !important;border-bottom:1px dotted #000000;">
        <th rowspan="2" style="border-right:none !important;">旅券 Passport</th>
        <td rowspan="2" style="border-left:none !important;border-right:none !important;"><?php if($result->passport == '1'){echo 'Yes';}elseif($result->passport == '1'){echo 'No';}else{echo '-';}?></td>
        <th style="border-bottom:none !important;border-left:1px dotted #000000;border-bottom:none !important;border-right:none !important">(1) 番号  Number</th>
        <td style="border-bottom:none !important;border-left:none !important"><?php echo $result->passport_no?></td>
    </tr>
    <tr style="border-top:none !important;">
        <th style="border-top:none !important;border-left:1px dotted #000000;border-top:1px dotted #000000;border-right:none !important">(2) 有効期限  Valid Until</th>
        <td style="border-top:none !important;border-left:none !important"><?php echo $result->passport_data_exp?></td>
    </tr>
</table> 
<table style="width:100%;">
    <tr style="border-bottom:none !important;">
        <td style="margin:0px;font-family: big5;">学歴：初等教育(小学校)から順次最終学歴まで  <br/>Educational History : from Elementary School to the Most Recent School</td>
    </tr>
    <tr style="border-top:none !important;">
        <td></td>
    </tr>
</table>
<table style="width:100%;">
    <tr class="text-center" style="border-bottom:1.5px dotted #000000;font-size:12px;border-top:none !important;">
        <th scope="col" style="width:35% !important; text-align: center;border-right:1.5px dotted #000000;border-bottom:1.5px dotted #000000;">学校名<br/>Name of Institution</th>
        <th scope="col" style="width:35% !important; text-align: center;border-right:1.5px dotted #000000;border-left:none !important; border-bottom:1.5px dotted #000000;">住所<br/>Address</th>
        <th scope="col" class="align-middle" style="width: 10%; text-align: center;border-right:none !important;border-left:none !important;border-bottom:1.5px dotted #000000;">入学年月<br/>Starting<br>Year/Month </th>
        <th scope="col" style="width: 10%;border-left: none;text-align: center;border-left:none !important;border-bottom:1.5px dotted #000000;">卒業年月<br/>Finishing<br>Year/Month</th>	
    </tr>
    <?php
        foreach($result1 as $row1){
    ?> 
    <tr style="border-bottom:1.5px dotted #000000;font-size:12px;">
        <td style="text-align: center;border-top: none;border-right:1.5px dotted #000000;border-bottom:1.5px dotted #000000;"><?php echo $row1->edu_name?></td>
        <td style="text-align: center;border-left: none;border-right:1.5px dotted #000000;border-left:none !important;border-top: none;border-bottom:1.5px dotted #000000; "><?php echo $row1->address?></td>
        <td style="text-align: center;border-right: none;border-left:none !important; border-top: none;border-bottom:1.5px dotted #000000;"><?php echo $row1->start_date?></td>
        <td style="text-align: center;border-left: none;border-top: none;"> ~ <?php echo $row1->end_date?></td>
    </tr>
    <?php } ?>
    
</table>
<br><br><br>
<table style="width:100%;">
    <tr style="border-bottom:1.5px dotted #000000;padding:20px 0px;">
        <td style="padding:14px 0px;">日本語学習歴　Previous Japanese Language Study</td>
    </tr>
</table>
<table style="width:100%;">
    <tr class="text-center" style="font-size:12px;border-top:none !important;border-bottom:1.5px dotted #000000;">
        <th scope="col" style="width:35% !important; text-align: center;border-right:1.5px dotted #000000;">学校名<br/>Name of Institution</th>
        <th scope="col" style="width:35% !important; text-align: center;border-right:1.5px dotted #000000;border-left:none !important; ">住所<br/>Address</th>
        <th scope="col" class="align-middle" style="width: 10%; text-align: center;border-right:none !important;border-left:none !important;">入学年月<br/>Starting<br>Year/Month </th>
        <th scope="col" style="width: 10%;border-left: none;text-align: center;border-left:none !important;">卒業年月<br/>Finishing<br>Year/Month</th>	
    </tr>
    <?php
        foreach($result2 as $row2){
    ?> 
    <tr style="border-bottom:1.5px dotted #000000;border-top:none !important;font-size:12px;">
        <td style="text-align: center;border-right:1.5px dotted #000000;"><?php echo $row2->jp_name?></td>
        <td style="text-align: center;border-left: none;border-right:1.5px dotted #000000;border-left:none !important; "><?php echo $row2->address?></td>
        <td style="text-align: center;border-right: none;border-left:none !important; "><?php echo $row2->start_date?></td>
        <td style="text-align: center;border-left: none;"> ~ <?php echo $row2->end_date?></td>
    </tr>
    <?php } ?>
</table>
<table style="width:100%;">
    <tr style="border-top:none !important;border-bottom:1.5px dotted #000000;">
        <td style="padding:14px 0px;">職歴(就職年月日順に記載すること) <br>
History of Employment (Write in order, ending with the most recent employment.)</td>
    </tr>
</table>
<table style="width:100%;">
    <tr class="text-center" style="font-size:12px;border-top:none !important;border-bottom:1.5px dotted #000000;">
        <th scope="col" style="width:35% !important; text-align: center;border-right:1.5px dotted #000000;">勤務先 <br/>Place of Employment</th>
        <th scope="col" style="width:35% !important; text-align: center;border-right:1.5px dotted #000000;border-left:none !important; ">住所<br/>Address</th>
        <th scope="col" class="align-middle" style="width: 10%; text-align: center;border-right:none !important;border-left:none !important;">就職年月<br/>Starting<br>Year/Month </th>
        <th scope="col" style="width: 10%;border-left: none;text-align: center;border-left:none !important;">退職年月<br/>Finishing<br>Year/Month</th>	
    </tr>
    <?php
        foreach($result5 as $row5){
    ?> 
    <tr style="border-bottom:1.5px dotted #000000;font-size:12px;">
        <td style="text-align: center;border-right:1.5px dotted #000000;"><?php echo $row5->emp_name?></td>
        <td style="text-align: center;border-left: none;border-right:1.5px dotted #000000;border-left:none !important; "><?php echo $row5->address?></td>
        <td style="text-align: center;border-center: none;border-left:none !important;border-right:none !important; "><?php echo $row5->start_date?></td>
        <td style="text-align: center;border-center: none;border-left:none !important;"> ~ <?php echo $row5->end_date?></td>
    </tr>
    <?php } ?>
</table>
<table style="width: 100%;">
    <tr style="border-top:none !important;border-bottom:none !important;">
        <td style="margin:0px;font-family: big5;padding:14px 0px;">家族 Family</td>
    </tr>
</table>
<table style="width:100%;">
    <thead>
        <tr style="font-size: 12px;border-top:none !important;border-bottom:1.5px dotted #000000;border-top:1.5px dotted #000000;background-color:#ffffff;">
            <th style="width:20%;text-align:center;border-right:1.5px dotted #000000;" >氏名<br>Name</th>
            <th scope="col" style="width:10%;text-align:center;border-left: none;border-right:1.5px dotted #000000;">続柄<br>Relation</th>
            <th scope="col" style="width:10%;text-align:center;border-left: none;border-right:1.5px dotted #000000;">生年月日<br>Date of Birth</th>
            <th scope="col" style="width:10%;text-align:center;border-left: none;border-right:1.5px dotted #000000;">職業<br>Occupation </th>
            <th scope="col" style="width:10%;text-align:center;border-left: none !important;">住所<br>Address </th>
        </tr>
    </thead>
    <tbody id="">
    <?php
        foreach($result6 as $row6){
    ?> 
        <tr style="border-bottom:1.5px dotted #000000;font-size:12px;">
            <td style=" text-align: center;border-right:1.5px dotted #000000;"><?php echo $row6->fam_name?></td>
            <td style="text-align: center;border-left: none;border-right:1.5px dotted #000000;"><?php echo $row6->fam_relationship?></td>
            <td style="text-align: center;border-left: none;border-right:1.5px dotted #000000;"><?php if($row6->birthday == ''){echo '-';}else{echo $row6->birthday;}?></td>
            <td style="text-align: center;border-left: none;border-right:1.5px dotted #000000;"><?php echo $row6->occupation?></td>
            <td style="text-align: center;border-left: none !important;"><?php echo $row6->address?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<table style="width: 100%;">
    <tr style="border-bottom: none !important;border-top:none !important;">
        <td style="padding:14px 0px;">* 同居する全ての家族について記入してください。父母、兄弟姉妹は、別居していても記入してください。<br> 別居の場合は住所を記入してください (同居の場合は不要です)。</td>

    </tr>
    <tr style="border-top: none !important;">
        <td style="padding:12px 0px;">
        * Write about every member of family who lives together (No need to write the address). Parents, <br>
        brothers and sisters must be written about even if they live separately (Write the address).
        </td>
    </tr>
</table>
<br>
<table style="width:100%;">
<tr style="border-bottom:1.5px dotted #000000;">
        <td style="padding:14px 0px;">在日親族 ( 父 ･ 母 ･ 配偶者 ・子 ･ 兄弟姉妹 ) 及び同居者 <br>
        Family in Japan (Father, Mother, Spouse, Child, Brother and Sisters, or Others) or Co-residents
</td>
    </tr>
</table>
<table style="width:100%;" class="tbl">
    <thead style="background: #f5f5f5;padding:1px;">
        <tr class="text-center" style="font-size: 12px;border-top:none !important;border-bottom:1.5px dotted #000000;background-color:#ffffff;">
            <th scope="col" style="width:20%;text-align:center;border-right:1.5px dotted #000000;" >続柄<br/>Relation</th>
            <th scope="col" style="width:10%;text-align:center;border-left: none;border-right:1.5px dotted #000000;">氏名<br/>Name</th>
            <th scope="col" style="width:10%;text-align:center;border-left: none;border-right:1.5px dotted #000000;">生年月日<br>Date of Birth</th>
            <th scope="col" style="width:10%;text-align:center;border-left: none;border-right:1.5px dotted #000000;">国籍<br/>Nationality </th>
            <th scope="col" style="width: 10%;text-align:center;border-left: none;border-right:1.5px dotted #000000;">同居予定<br>Residing with Applicant or Not </th>
            <th scope="col" style="width:10%;text-align:center;border-left: none;border-right:1.5px dotted #000000;">勤務先･通学先<br>Place of Employment/School </th>
            <th scope="col" style="width: 10%;text-align:center;border-left: none !important;">在留カード番号<br>Residence Card Number </th>
        </tr>
    </thead>
    <tbody id="">
    <?php
        foreach($result7 as $row7){
    ?> 
        <tr style="border-bottom:1.5px dotted #000000;font-size:12px;">
            <td style="text-align: center;border-right:1.5px dotted #000000;"><?php echo $row7->ja_fam_relationship?></td>
            <td style="text-align: center;border-left: none;border-right:1.5px dotted #000000;"><?php echo $row7->ja_fam_name?></td>
            <td style="text-align: center;border-left: none;border-right:1.5px dotted #000000;"><?php echo $row7->ja_fam_date_birth?></td>
            <td style="text-align: center;border-left: none;border-right:1.5px dotted #000000;"> <?php echo $row7->ja_fam_nationality?></td>
            <td style="text-align: center;border-left: none;border-right:1.5px dotted #000000;"><?php if($row7->ja_fam_residing_applicant == '1'){echo 'Yes';}elseif($row7->ja_fam_residing_applicant == '0'){echo 'No';}else{echo '-';}?></td>
            <td style="text-align: center;border-left: none;border-right:1.5px dotted #000000;"><?php echo $row7->ja_fam_work_place?></td>
            <td style="text-align: center;border-left: none !important;"><?php echo $row7->residence_card_no?></td>
        </tr>
    <?php } ?>    
    </tbody>
</table>
<br>
<table style="width:100%;">
    <tr style="border-bottom:1.5px dotted #000000;font-size:14px;">
        <td style="padding:14px 0px;font-size:14px;">出入国歴 <br>Previous Stay in Japan</td>
    </tr>
</table>
<table style="width:100%;">
    <tr class="text-center" style="font-size: 12px;border-top:none !important;border-bottom:1.5px dotted #000000;">
        <th scope="col" style="text-align: center;border-right:1.5px dotted #000000; ">入国年月日 <br/>Date of Entry</th>
        <th scope="col" style=" text-align: center;border-left: none;border-right:1.5px dotted #000000; ">出国年月日<br/>Date of Departure</th>
        <th scope="col" class="align-middle" style=" text-align: center;border-left: none;border-right:1.5px dotted #000000;">在留資格 <br/>Status</th>
        <th scope="col" style="border-left: none;text-align: center;border-left: none !important;">入国目的<br/>Purpose of Entry</th>	
    </tr>
    <?php
        foreach($result8 as $row8){
    ?>
    <tr style="border-bottom:1.5px dotted #000000;font-size: 14px;">

        <td style="font-size: 14px; text-align: center;border-right:1.5px dotted #000000;"><?php if($row8->entry_date == '') {echo'-';} else{echo $row8->entry_date;}?></td>
        <td style="font-size: 14px; text-align: center;border-left: none;border-right:1.5px dotted #000000;"><?php if($row8->arrival_date == ''){echo '-';}else{echo $row8->arrival_date;}?></td>
        <td style="font-size: 14px; text-align: center;border-left: none;border-right:1.5px dotted #000000;"><?php echo $row8->status?></td>
        <td style="font-size: 14px; text-align: center;"><?php echo $row8->entry_purpose?></td>
    </tr>
    <?php } ?>
</table>
<table style="padding-top:10%;margin:0px;width:100%;border-top:none !important;text-align:left;" class="tbl">
    <tr style="border-top: none !important;">
        <th style="width: 30%;padding:12px 0px;">VISA申請予定地<br/>Place to Apply for VISA</th>
        <td style="padding:12px 2px;">　　<?php echo $result->place_apply_visa?></td>
    </tr>
</table>
<table style="padding-top:10%;margin:0px;width:100%;border-top:none !important;text-align:left;" class="tbl">
    <tr style="width: 100%;border-top: none !important;">
        <th style="padding:12px 0px;">在留資格認定証明書交付申請歴<br/>Previous Application of Certificate of Eligibility</th>
    </tr>
</table>
<table style="padding-top:10%;margin:0px;width:100%;border-top:none !important;" class="tbl">
    <tr style="width: 100%;border-top: none !important;">
        <td colspan="3" style="text-align: left;border-right:none !important;padding:12px 0px;"><?php if($result->eligibility_have == '1'){echo 'Yes';}elseif($result->eligibility_have == '0'){echo 'No';}else{echo '-';}?></td>
        <td colspan="2" style=" text-align: right;border-right:none !important;border-left:none !important;padding:12px 0px;"><?php echo $result->eligibility_details?></td>
        <th colspan="2" style="text-align: left;border-right:none !important;border-left:none !important;padding:12px 0px;">　times</th>
        <th colspan="2" style="text-align: right;border-right:none !important;border-left:none !important;padding:12px 0px;">入国目的 Purpose of Entry：</th>
        <td colspan="2" style=" text-align: left;border-right:none !important;border-left:none !important;padding:12px 0px;"><?php echo $result->entry_purpose1?></td>
    </tr>
</table>
<table style="padding-top:10%;margin:0px;width:100%;border-top:none !important;text-align:left;" class="tbl">
    <tr style="width: 100%;border-top:none !important;">
        <th style="width: 50%;border-right:none !important;padding:12px 0px;">同伴者 Accompanying Persons, if Any</th>
        <th style="text-align:center;width: 50%;border-left:none !important;padding:12px 0px;">配偶者 Marital Status</th>
    </tr>
    <tr style="width: 100%;">
           <td style="text-align:left;border-right:none !important;padding:12px 0px;"><?php if($result->accompanying_person == '1'){echo 'Yes';}elseif($result->accompanying_person == '0'){echo 'No';}else{echo '-';}?></td>
           <td style="text-align:center;border-left:none !important;padding:12px 0px;"><?php if($result->martial_status == '1'){echo 'Single';}else{echo 'Married';}?></td>
    </tr>
</table>
<table style="padding-top:10%;margin:0px;width:100%;border-top:none !important;text-align:left;" class="tbl">
    <tr style="width: 100%;font-family: big5;border-top:none !important;">
        <th style="padding:12px 0px;">犯罪歴(日本または海外)  Criminal Record (in Japan or Overseas)</th>
    </tr>
</table>
<table style="padding-top:10%;margin:0px;width:100%;border-top:none !important;text-align:left;" class="tbl">
    <tr style="width: 100%;border-top: none !important;">
        <td style="font-size: 14px; text-align: left;width:15%;border-right:none !important;padding:12px 0px;font-weight:bold;"><?php if($result->criminal_record == '1'){echo 'Yes';}elseif($result->criminal_record == '0'){echo 'No';}else{echo '-';}?></td>
        <th style="border-right:none !important;border-left:none !important;padding:12px 0px;text-align: right;">具体的内容 Details:</th>
        <td style="font-size: 14px; text-align: left;border-right:none !important;border-left:none !important;padding:12px 0px;">　<?php echo $result->criminal_record_details?></td>
    </tr>
</table>
<table style="padding-top:10%;margin:0px;width:100%;border-top:none !important;text-align:left;" class="tbl">
    <tr style="width: 100%;font-family: big5;border-top:none !important;">
        <th style="padding:12px 0px;">退去強制又は出国命令による出国の有無     Departure by deportation / departure order or not</th>
    </tr>
</table>
<table style="padding-top:10%;margin:0px;width:100%;border-top:none !important;text-align:left;" class="tbl">
    <tr style="width: 100%;border-top: none !important;">
        <td style="font-size: 14px; text-align: left;width:15%;border-right:none !important;padding:12px 0px;"><?php if($result->departure_deportation == '1'){echo 'Yes';}elseif($result->departure_deportation == '0'){echo 'No';}else{echo '-';}?></td>
    </tr>
</table>
<table style="padding-top:10%;margin:0px;width:100%;border-top:none !important;text-align:left;" class="tbl">
    <tr style="width: 100%;font-family: big5;border-top:none !important;">
        <th style="padding:12px 0px;">本校での学習終了後の予定<br/>Specific Plans after Graduating from ECC</th>
    </tr>
</table>
<table style="padding-top:10%;margin:0px;width:100%;border-top:none !important;text-align:left;" class="tbl">
    <tr style="width: 100%;border-top:none !important;">
        <td style="font-size: 13px; text-align: left;width:15%;padding:12px 0px;"><?php echo $result->specific_plans_after_graduating?>
        </td>
    </tr>
</table>
<br>
<table style="border:none !important;padding-top:10%;margin:0px;width:100%;border-top:none !important;text-align:left;" class="tbl">
    <tr style="border:none !important;">
     <th style="width: 100%;font-size:18px;">学習理由　Purpose of Study in Japan</th>
    </tr>
</table>
<section class="personal-info">
    <p class="note" style="width: 100%;height:200px;border: 1px solid #000000;vertical-align: top;"><?php echo $result->purpose_studying_in_japanese?></p>
</section>
<section class="personal-info" style="width:100%;"> 
<p style="font-family: big5;">
 上記は全て真実であり、私が直筆あるいはコンピュータで作成したものです。<br/>
 I hereby declare the above statement is true and correct, and I myself filled in by my own handwriting or by computer. 
</p>
</section>
<section class="personal-info" style="width:100%;"> 
    <table style="border:none !important;padding-top:10%;margin:0px;width:50%;border-top:none !important;text-align:left;" class="tbl">
        <tr style="border:none !important;width: 60%;">
            <td style="border:none !important; text-align: center;"><?php echo $splitted = date('Y', strtotime($result->register_date));?></td>
            <th style="border:none !important;">年 Year</th>
            <td style="border:none !important;text-align: center;"><?php echo $splitted = date('m', strtotime($result->register_date));?></td>
            <th style="border:none !important;">月 Month</th>
            <td style="border:none !important;text-align: center;"><?php echo $splitted = date('d', strtotime($result->register_date));?></td>
            <th style="border:none !important;">日 Date</th> 
        </tr>
    </table>
    </section> 
    <section class="personal-info" style="width:100%;float:right;padding-top:12px;"> 
    <div style="width: 45%;float:right">
    <p style="padding-left:150px;"><?php if(!empty($result->image_file)) { ?>
    <img style="width:40%;" src="<?php echo base_url('upload/assets/adm/usr/'.$result->sign_file); ?>" width="150px;" class="pb-1">
 <?php } ?></p>
  <p>署名 Signature:<span>____________________________</span></p>
</div>
    
    </section>
    <section class="personal-info" style="width:100%;float:right;padding-top:12px;padding-right:32px;">
    <div class="edu-logo" style="width: 300px;float:right;">      
    <img src="asset/admin/images/eccImg.jpg">
    </div>
    </section>
</div>
</section> 
</body>
</html>
</html>';