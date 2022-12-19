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
    font-size: 14px;
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
</style>
</head>
   
<body>
<section class="header" style="border: 1px solid #080707;background-color: #e6e4e3">
	<div class="application-title" style="text-align:center;font-family:sjis;">
		<h2 style="padding:8px 0px ;margin:0px;font-family: sjis;"><span style="font-family: freeserif ;">2023</span>年 <span style="font-family: freeserif ;">4</span>月生  エントリーシート</h2>
    <h2 style="padding:0px 0px 8px 0px;margin:0px;font-family: freeserif;">Entry form for 2023-April students</h2>
	</div>
</section>
<section class="eligibility">	
  <table style="width: 100%;">
        <tr style="border-top: none !important;">
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">記入日<br/>date Y/M/D</th>
            <td style="border-left: none !important;font-weight:normal;"><?php echo $splitted = date('Y', strtotime($result->register_date));?>年Y<?php echo $splitted = date('m', strtotime($result->register_date));?>月M<?php echo $splitted = date('d', strtotime($result->register_date));?>日D</td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr style="border-top: none !important;">
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">国<br/>Country</th>
            <td style="width:32%;border-left: none !important;font-weight:normal;"><?php echo $result->info_nationality?></td>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;border-left: none !important;font-weight:normal;">学校名（紹介者）<br/>Name of School<br/>or Introducer</th>
            <td style="text-align: left;border-left: none !important;"><p style="text-align: left;font-weight:normal;"></p>PKT Education Center</td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr style="border-top: none !important;border-bottom: none !important;">
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">応募者名<br/>Name of <br/>Applicant</th>
            <td style="border-left: none !important;"><?php echo $result->applicant_name?></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr >
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">性別<br/>Sex</th>
            <td style="width:32%;border-left: none !important;font-weight:normal;"><?php if($result->gender == '1'){echo 'Male';}else{echo 'Female';}?></td>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;border-left: none !important;font-weight:normal;">既婚・未婚<br/>Marital status</th>
            <td style="border-left: none !important;font-weight:normal;"><?php if($result->martial_status == '1'){echo 'Single';}else{echo 'Married';}?></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr style="border-top: none !important;">
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">生年月日<br/>Date of Birth </th>
            <td style="width:32%;border-left: none !important;font-weight:normal;"><?php echo $splitted = date('Y', strtotime($result->date_of_birthday));?>年Y<?php echo $splitted = date('m', strtotime($result->date_of_birthday));?>月M<?php echo $splitted = date('d', strtotime($result->date_of_birthday));?>日D</td>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;border-left: none !important;font-weight:normal;">年齢<br/>Age</th>
            <td style="text-align: right;border-left: none !important;"><p style="width:10%;text-align: right;font-weight:normal;"><?php echo $result->info_age?> 歳Years old</p></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr style="border-top: none !important;border-bottom: none !important;">
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">最終学歴<br/>Final Education</th>
            <td style="width:32%;border-left: none !important;font-weight:normal;"><?php echo $result->educational_school_name?></td>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;border-left: none !important;font-weight:normal;">卒業の年<br/>When did (will) <br/>you graduate?</th>
            <td style="text-align: right;border-left: none !important;"><p style="width:10%;text-align: right;font-weight:normal;"><?php echo $result->graduate_date?>年Year</p></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">今の状況<br/>Current situation</th>
            <td style="border-left: none !important;font-weight:normal;"><?php echo $result9->student_work_details?></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr style="border-top: none !important;">
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">テスト合格級<br/>Japanese <br/>Language test<br/> you passed </th>
            <td style="width:32%;text-align: left;border-left: none !important;font-weight:normal;">
                <p style="text-align: left;font-weight:normal;">テストName of Test:<?php echo $resultachiv->achiv_name?></p><br/>
                <p style="text-align: left;font-weight:normal;">級 Level:<?php echo $resultachiv->level?></p>
            </td>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;border-left: none !important;font-weight:normal;">テスト合格日<br/>when did you pass?</th>
            <td style="border-left: none !important;font-weight:normal;"><?php echo $resultachiv->date_qualification?></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr style="border-top: none !important;border-bottom: none !important;">
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">受験予定<br/>When will you take <br>the exam？</th>
            <td style="width:32%;border-left: none !important;font-weight:normal;"><?php echo $splitted = date('Y', strtotime($resultgoingtest->going_date));?>年Year<?php echo $splitted = date('m', strtotime($resultgoingtest->going_date));?>月Month</td>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;border-left: none !important;font-weight:normal;">受験番号<br/>Examinee's No.</th>
            <td style="text-align: right;border-left: none !important;font-weight:normal;"><?php echo $resultgoingtest->going_level?></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr>
            <th rowspan="2" style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">日本語学習期間<br/>Period of studying Japanese</th>
            <td style="width:32%;border-left: none !important;font-weight:normal;">From:<?php echo $splitted = date('Y', strtotime($resultprejpstudy->start_date));?>年Y<?php echo $splitted = date('m', strtotime($resultprejpstudy->start_date));?>月M<?php echo $splitted = date('d', strtotime($resultprejpstudy->start_date));?>日D</td>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;border-left: none !important;font-weight:normal;">日本語学習時間<br/> <span style="color:red;">（今までの既習時間) <br/>Had studied until now </span></th>
            <td style="text-align: right;border-left: none !important;"><p style="width:10%;text-align: right;font-weight:normal;"><?php echo $resultprejpstudy->hour?>時間Hours</p></td>
        </tr>
        <tr style="border-top: none !important;">
            <td style="width:32%;border-left: none !important;font-weight:normal;">To:<?php echo $splitted = date('Y', strtotime($resultprejpstudy->end_date));?>年Y<?php echo $splitted = date('m', strtotime($resultprejpstudy->end_date));?>月M<?php echo $splitted = date('d', strtotime($resultprejpstudy->end_date));?>日D</td>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;border-left: none !important;font-weight:normal;">他の学校に応募したこと<br/>Have you ever applied  <br/>for another school?</th>
            <td style="border-left: none !important;font-weight:normal;"><?php if($result->school_apply_before_japan == '1'){echo 'Yes';}else{echo 'No';}?></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr style="border-top: none !important;border-bottom: none !important;">
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">ビザ申請歴<br/>Have you applied for Japanese Visa/COE?</th>
            <td style="width:32%;border-left: none !important;font-weight:normal;"><?php if($result->COE_reject == '1'){echo 'Yes';}else{echo 'No';}?></td>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;border-left: none !important;font-weight:normal;">ビザの種類<br/>Type of Visa</th>
            <td style="border-left: none !important;font-weight:normal;"><?php echo $result->place_apply_visa?></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr style="border-bottom: none !important;">
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">来日歴<br/>Experience of stay in Japan</th>
            <td style="width:32%;border-left: none !important;border-right: none !important;font-weight:normal;"><?php if($result->have_you_visited_jp == '1'){echo 'Yes';}else{echo 'No';}?></td>
            <td style="width:18%;text-align:center;border-left: none !important;border-right: none !important;border-right: none !important;font-weight:normal;">(<?php echo $result9->eligibility_visa?>)<br/>ビザVisa</td>
            <td style="border-left: none !important;font-weight:normal;">From <?php echo $splitted = date('Y', strtotime($result->visited_date));?>年Y<?php echo $splitted = date('m', strtotime($result->visited_date));?>月M<?php echo $splitted = date('d', strtotime($result->visited_date));?>日D<br/>To <?php echo $splitted = date('Y', strtotime($result->date_of_departure));?>年Y<?php echo $splitted = date('m', strtotime($result->date_of_departure));?>月M<?php echo $splitted = date('d', strtotime($result->date_of_departure));?>日D</td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr >
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">犯罪歴<br/>Criminal Record</th>
            <td style="border-left: none !important;"><?php if($result->criminal_record == '1'){echo 'Yes';}else{echo 'No';}?></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr style="border-bottom: none !important;">
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">経費支弁者<br/>Financial Supporter</th>
            <td style="width:32%;border-left: none !important;font-weight:normal;"><?php echo $result->fin_name?></td>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;border-left: none !important;font-weight:normal;">続柄<br/>Relation</th>
            <td style="border-left: none !important;font-weight:normal;"><?php echo $result->fin_relationship?></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr style="border-bottom: none !important;">
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">支弁者の職業<br/>Supporter's Occupaton </th>
            <td style="width:32%;border-left: none !important;font-weight:normal;"><?php echo $result->fin_occupation?></td>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;border-left: none !important;font-weight:normal;">支弁者のビザ<br/>Supporter's Visa<br/>(if he/she is in Japan)</th>
            <td style="border-left: none !important;font-weight:normal;"><?php echo $result->fin_visa?></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr style="border-bottom: none !important;">
            <th rowspan="2" style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">在日親族<br/>Relatives in Japan</th>
            <td rowspan="2" style="width:32%;border-left: none !important;border-right: none !important;font-weight:normal;"><?php if($result->family_in_japan == '1'){echo 'Yes';}else{echo 'No';}?></td>
            <th style="width:18%;text-align:left;border-right:none !important; border-bottom:none !important;font-weight:normal;">名前Name:</th>
            <td style="border-left:none !important;border-bottom:none !important;font-weight:normal;"><?php echo $resultfamjapan->ja_fam_name?></td>
        </tr>
        <tr style="border-top: none !important;border-bottom: none !important;">
            <th style="width:18%;text-align:left;border-right:none !important; border-top:none !important;font-weight:normal;">関係Relation:</th>
            <td style="border-left:none !important;border-top:none !important;font-weight:normal;"><?php echo $resultfamjapan->ja_fam_relationship?></td>
        </tr>
  </table>
  <table style="width: 100%;border-bottom: none !important;">
        <tr>
            <th style="width:18%;background-color: #e6e4e3;text-align:center;border-top: none !important;font-weight:normal;">本人のEメール<br/>Applicant's E-mail</th>
            <td style="border-left: none !important;font-weight:normal;"><?php echo $result->std_email?></td>
        </tr>
  </table>
  <table style="width: 100%;">
        <tr style="border-top: none !important;">
            <th style="width:18%;background-color: #e6e4e3;text-align:center;font-weight:normal;">面接のURL送付先<br/>Who should we <br/>email the URL to?</th>
            <td style="border-left: none !important;">(  <?php echo $result->std_email?>    )</td>
        </tr>
  </table>
  <p>
◆このエントリーシートは代筆でもかまいません。（ただし、正しい情報を記入してください）<br/>
School staff or Introducer can fill out this form instead of Applicant. Please give us the true information.<br/><br/>        
◆JLPTのN5、NAT-TEST5級のA・Bで合格している方は、面接は原則として免除します。<br/>
Basically, the applicant who has already passed JLPT-N5 or NAT-5Q(A or B rank), will be excused from our Interview test.   <br/>                   
</p>
</section>
<!-- 
<section class="eligibility" style="padding-top:12px;">	
  <p>
◆このエントリーシートは代筆でもかまいません。（ただし、正しい情報を記入してください）<br/>
School staff or Introducer can fill out this form instead of Applicant. Please give us the true information.<br/><br/>        
◆JLPTのN5、NAT-TEST5級のA・Bで合格している方は、面接は原則として免除します。<br/>
Basically, the applicant who has already passed JLPT-N5 or NAT-5Q(A or B rank), will be excused from our Interview test.   <br/>                   
</p>
</section> -->
</body>

</html>
</html>';
