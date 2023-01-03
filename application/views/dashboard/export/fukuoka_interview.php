$html = '
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8" /> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta name="author" content="John Doe">
    <link rel="stylesheet" href="asset/css/style.css">             
</head>
<body>
    <section class="personal-info" style="width:100%;display:block;">
        <dl>
            <dt style="width:300px;float:left;font-weight:bold;font-size:14px;">番号 No. : <span>_________</span></dt>
            <dd style="width:50%;float: right;text-align:right;font-weight:bold;font-size:14px;">記号 ：<span>___________________</span></dd>
        </dl>
        <h3 style="font-family: sjis;margin-bottom:0px;">九州外国語学院　4月期 ・ 7月期 ・ 10月期 ・ 1月期 </h3>
        <p>KFLA  Applicants for the term of April and July and October and January </p>
        <dl style="margin:0 0 5px;">
            <dt style="width:150px;float:left;"><h2 style="font-family: sjis;margin-bottom:0px;">面接試験申込書</h2></dt>
            <dd style="width:60%;float: right;"><h2 style="font-family: sjis;margin-bottom:0px;">希望校: 　福岡本校 ・ 東京日本橋校</h2></dd>
        </dl>
        <dl style="margin:0px;">
            <dt style="width:250px;float:left;"><h2 style="font-family: sjis;margin-bottom:0px;font-size:16px;">Entrance Interview Sheet</h2></dt>
            <dd style="width:55%;float: right;">
            <p style="font-family: sjis;margin-bottom:0px;">* 東京日本橋校志望の場合で選考に漏れた場合、</p>
            <p style="padding-left: 10px;">福岡本校での入学を　希望する ・ 希望しない</p>
            </dd>
        </dl>
      
        <dl style="margin:0px;">
            <dt style="width:450px;float:left;"><h3 style="font-family: sjis;margin-bottom:0px;padding-top:0px;">日本語センター名：<span style="font-size:14px;font-weight:normal;"><?php echo $resultprejpstudy->jp_name?></span></h3></dt>
            <dd style="width:25%;float: right;"><h3 style="font-family: sjis;margin-bottom:0px;padding-top:0px;"><?php echo $splitted = date('Y', strtotime($result->register_date));?>年　<?php echo $splitted = date('m', strtotime($result->register_date));?>月　<?php echo $splitted = date('d', strtotime($result->register_date));?>日</h3></dd>
      
        </dl>
    </section>
    <section class="address" style="width:100%;">
    <p style="margin:0px;">The mediation company</p>
		<table style="width:100%;">
		<tr>
			<th style="width: 10%;">氏名 <br> NAME</th>
			<td colspan="2"><?php echo $result->applicant_name?></td>
            <th style="width: 10%;">性別 <br> SEX</th>
			<td colspan="4"><?php if($result->gender == '1'){echo 'Male';}else{echo 'Female';}?></td>
            <td colspan="3" rowspan="4" style="text-align: center;">
            <?php if(!empty($result->image_file)) { ?>
              <img style="width:15%"; src="<?php echo base_url('upload/assets/adm/usr/'.$result->image_file); ?>"  class="pb-1">
            <?php } ?></td>
            </tr>
		<tr>
			<th style="width: 10%;">国籍 <br> Nationality</th>
			<td colspan="2"><?php echo $result->info_nationality?></td>
            <th style="width: 10%;">生年月日 <br> Birthday</th>
			<td colspan="4" style="text-align: left;"><?php echo $splitted = date('Y', strtotime($result->date_of_birthday));?>年　<?php echo $splitted = date('m', strtotime($result->date_of_birthday));?>月　<?php echo $splitted = date('d', strtotime($result->date_of_birthday));?>日</td>
            </tr>
		<tr>
			<th style="width: 10%;">固定電話 <br> Phone</th>
			<td colspan="2"><?php echo $result->info_phone?></td>
            <th style="width: 10%;">携帯電話 <br> Mobile</th>
			<td colspan="4"><?php echo $result->info_phone?></td>
        </tr>
        <tr>
			<th style="width: 10%;">E-mail</th>
			<td colspan="7"><?php echo $result->std_email?></td>
           
        </tr>
        <tr>
			<th colspan="2" style="width:20%;text-align: left;">保護者住所 <br>Parents address</th>
			<td colspan="9"><?php echo $result->family_address?></td>
        </tr>
        <tr>
			<th colspan="2" style="width:20%;text-align: left;">在学年数 <br>Period of study</th>
			<td colspan="9"><?php echo $result->course_study_lengh?></td>
        </tr>
        <tr style="border-top: 0px;">
			<th colspan="2" style="width:20%;text-align: left;">本人現住所 <br> Present address</th>
			<td colspan="9"><?php echo $result->address?></td>
        </tr>
        <tr>
			<th colspan="2" style="width:20%;text-align: left;">最終学歴 <br> Latest educational history School name
</th>
			<td colspan="9"><?php echo $result->educational_school_name?></td>
        </tr>
        <tr>
			<th colspan="2" style="text-align: left;">日本語学習期間 <br>Duration of Japanese language study</th>
			<td colspan="9"><?php echo $result->duration_jp_language_study?>　 年　　 ヶ月 ＊日本語能力試験、Nat, TOP-J TEST→ <span>( <?php echo $resultachiv->achiv_name?>)</span></td>
        </tr>
        <tr>
			<th colspan="2" style="text-align: left;">経費支弁者氏名 <br> The name of financial supporter</th>
			<td colspan="9"><?php echo $result->fin_name?></td>
        </tr>
        <tr>
			<th colspan="2" style="text-align: left;">経費支弁者職業・勤務先 <br>Job of financial supporter</th>
			<td colspan="9"><?php echo $result->fin_occupation?></td>
        </tr>
        <tr>
			<th colspan="2" style="text-align: left;">本人との続柄 your relation of the <br>financial supporter  e.g. father, mother </th>
			<td colspan="9"><?php echo $result->fin_relationship?></td>
        </tr>
        <tr>
			<th colspan="2" style="text-align: left;">経費支弁者勤務先電話番号 <br> phone of financial supporter</th>
			<td colspan="9"><?php echo $result->tel?></td>
        </tr>
        <tr>
			<th colspan="2" style="text-align: left;">経費支弁者年間収入 <br> financial supporter salary of a year</th>
			<td colspan="9"><?php echo $result->fin_annual_income?></td>
        </tr>
        <tr>
			<th colspan="2" style="text-align: left;">過去申請歴（取下げ歴を含む）<br> Have you already tried an application for certificate of eligibility.</th>
			<td colspan="9" style="text-align: left;">
            <label class="col-md-4">
                <input type="radio" name="eligibility_have" value="1" <?php if($result->eligibility_have== '1'){ echo "checked='checked'"; } ?>> 有　　
               (<?php echo $splitted = date('Y', strtotime($result->criminal_record_when));?>　年　<?php echo $splitted = date('m', strtotime($result->criminal_record_when));?>　月）
            </label>
            <label class="col-md-4">
                <input type="radio" name="eligibility_have" value="0" <?php if($result->eligibility_have== '0'){ echo "checked='checked'"; } ?>>無
            </label>
         </td>
        </tr>
        </table>
		
</section>	
<section class="family-japan">
    <div class="clearfix mb-5"></div>
                            <table style="width:100%; padding-top:20px" class="tbl">
                                <tr style="border-top: 0px;">
                                    <th colspan="7" style="text-align: center;">学歴・職歴（小学校卒業から年代順に記入）<br>
                                    Education, employment history （List in order all the schools, starting with the elementary school）</th>
                                </tr>
                                <tr class="text-center" style="font-size: 12px;">
                                <th scope="col" style="text-align:center;width:35%;">学校名・会社名 <br>Name of school , Company</th>
                                    <th scope="col" class="align-middle" style="text-align:center;width:45%;">学習期間・勤務期間　Period</th>
                                    <th scope="col" style="text-align:center;width:20%;">年数  Years</th>
                                   
                                    
                                </tr>
                            <tbody id="stockList">
                            <?php
                                foreach($result1 as $row1){
                                ?> 
                                    <tr>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row1->edu_name?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $splitted = date('Y', strtotime($row1->edu_start_date));?>年 <?php echo $splitted = date('m', strtotime($row1->edu_start_date));?>月　～　<?php echo $splitted = date('Y', strtotime($row1->edu_end_date));?>年<?php echo $splitted = date('m', strtotime($row1->edu_end_date));?>月</td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row1->edu_year?></td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
</section>
<section>
    <div class="footer" style="width: 97%;margin:0 auto;margin-top:20px;">
    <!-- <img src="asset/admin/images/fukuoka-footer.jpg"> -->
    <dl style="margin:0px;">
            <dt style="width:250px;float:left;">【福岡本校】<br>〒812-0035 福岡市博多区中呉服町2-1<br>TEL; +8192-273-1511  FAX; +8192-273-1522
</dt>
            <dd style="width:50%;float: right;">【東京日本橋校】<br>〒103-0007 東京都中央区浜町1-5-13 日本橋スカイビル4F</dd>
    </dl>
    <p style="text-align: center;margin:0px;">URL; http://www.kfla.jp　　E-mail; info@kfla.jp</p>

    </div>
</section>
</body>
<style>
    body {
                    font-size: 12px;
                    color: #111;
                    font-weight: normal;
                    /* font-family:firefly, DejaVu Sans, sans-serif;
                    font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, メイリオ, Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", "ＭＳ ゴシック" , "MS Gothic", "Noto Sans CJK JP", TakaoPGothic, sans-serif; */
                    /* font-family: "Lucida Console", "Courier New", monospace;*/               
                    /* font-family: sjis ; */
                    font-family: "Gothicbi", sjis, sans-serif;
                    /* font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;  */
                    /* font-family: 'Open Sans', sans-serif; */
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
                    padding-top: 5px;
                    padding-bottom: 5px;
                    text-align: left;
                    /* border:1px solid gray;      */
                }

                td {
                    white-space: normal;
                    padding: 8px 0px 8px 0px;
                }

                .page-break {
                    page-break-after: always;
                }

                /* .tbl,
                .tbl td,td
                .tbl th th{
                    border: solid black;
                    border-width: 1px 1px 0 0;
                }
                .tbl th,th,
                .tbl td,td{
                    border: solid black;
                    border-width: 0 0 1px 1px;
                    padding: 10px 5px;
                } */
                tr,td,th {
                    border-top: 1px solid #000000;
                    border-bottom: 1px solid #000000;
                    border-left: 1px solid #000000;
                    border-right: 1px solid #000000;
                    text-align: left;
                    padding: 8px;
                }
                
                .sp01 {
                    width: 200px;
                    display: inline-block;
                }

                .sp001 {
                    width: 90px;
                    display: inline-block;
                    vertical-align: bottom;
                    text-align: left;
                }

                .sp003 {
                    width: 130px;
                    display: inline-block;
                    vertical-align: bottom;
                    text-align: left;
                }

                .sp002 {
                    width: 120px;
                    display: inline-block;
                    vertical-align: bottom;
                    text-align: left;
                }

                .col-12 {
                    width: 100%;
                    clear: both;
                }
                section.header,.personal-info,.family-japan,.eligibility,.edu-background,.address {
                    width: 100%;
                    position: relative;
                    margin: 0 auto;
                }
                .logo {
                    width: 200px;
                    position: absolute;
                    left: 0;
                    float: left;
                }
                .application-title {
                    width: 500px;
                    margin: 0 auto;
                    float: left;
                }
                .school-addr {
                    width: 400px;
                    right: 0;
                    position: absolute;
                    text-align: right;
                    float: right;
                }
                .personal{
                    width:70%;
                    float:left;
                }
                img{
                    width: 100%;;
                }
				.applicant_image{
				width: 100px;
				height: 200px;
				display: block;
				border: 1px solid #000000;
				display: block;
				float: right;
				/* text-align: center; */
				padding: 15px;
				/* margin-right: 5px; */
				display: block;
			}
</style>
</html>';
