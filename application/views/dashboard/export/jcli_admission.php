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

<section class="header" style="display: flex;height:100px;">
        <!-- <img src="asset/admin/images/jcli-header.png"> -->
	<div class="logo" style="float:left;">
    <img src="asset/admin/images/jcli-logo.png">
	</div>
	<div class="application-title" style="width:180px;margin: 0 auto;">
		<h3 style="font-family: big5;font-size:36px;font-weight:bold;margin:0 0 10px;">入 学 願 書</h3>
		<p style="text-align:center;">Application Form for Admission</p>
	</div>
	<div class="school-addr" style="width:300px;float:right;">
		<h5 style="margin:5px 0px;font-size:22px;font-family:big5;">JCLI 日本語学校</h5>													
		<h5 style="font-size: 13px;font-weight:100;margin:5px 0px;">JCLI JAPANESE LANGUAGE SCHOOL	</h5>													
		<p style="margin:0px;">〒114-0003 東京都北区豊島８丁目４番１号</p>
		<p style="margin:0px;">TEL：03-5902-5151</p>
		<p style="margin:0px;">FAX：03-5902-5152</p>														
														
														
	</div>
    </section>
    <section class="personal-info" style="width:100%;display:block;">
        <img src="asset/admin/images/personal.png" style="width:30px;float:left;margin-right:10px;">
        <h5 style="font-size:12px;font-family: sun-exta, gb;margin-bottom:10px;margin-top:5px;">申請者情報　/　Personal Information</h5>
        <div class="personal" style="width:73%;margin-right:10px;">
        <table style="">
            <tr>
                <th style="width: 20%;font-family: frutiger;background:#f5f5f5;">氏名(ローマ字)
                    <br>Name(s) as shown
                    <br>on your passport
                </th>
                <td colspan="5"><?php echo $result->applicant_name?></td>
            </tr>
            <tr>

                <th style="width: 20%;background:#f5f5f5;">氏名　（漢字)
                    <br>Name(s) in
                    <br>Chinese characterｓ　</th>
                    <td colspan="5"><?php echo $result->applicant_name_kanji?></td>
                </tr>
            <tr>
                <th style="width: 20%;background:#f5f5f5;">				
                    国籍・地域<br>Nationality/Region
                </th>
                <td style="width: 15%;">
                <?php echo $result->info_nationality?>
                </td>
                <th style="width: 15%;background:#f5f5f5;">				
                性別 <br>Sex
                </th>
                <td style="width: 15%;">
                <?php if($result->gender == '1'){echo 'Male';}else{echo 'Female';}?>
                </td>
                <th style="width: 15%;background:#f5f5f5;">			
                婚姻 <br> Marital Status
                </th>
                <td style="width: 20%;">
                <?php if($result->martial_status == '1'){echo 'Single';}else{echo 'Married';}?>
                </td>
            </tr>
            <tr>

                <th style="width: 20%;background:#f5f5f5;">
                    入学希望コース <br> Course of Admission			
                </th>
                <td style="width: 20%;"><?php if($result->course_admission == '一般'){echo '一般';}elseif($result->course_admission == '進学'){echo '進学';}elseif($result->course_admission == 'ビジネス'){echo 'ビジネス';}else{echo 'SSW';}?></td>
                <th style="width: 20%;background:#f5f5f5;">
                    生年月日 <br> Date of birth	
                </th>
                <td colspan="3"><?php echo $result->date_of_birthday?></td>
                </tr>
            <tr>
            <th style="width: 20%;border-bottom:0px;background:#f5f5f5;">出生地 <br> Place of  birth</th>
            <td colspan="5" style="border-bottom:0px;"><?php echo $result->province?></td>
            </tr>
            </table>
        </div>
        <span class="applicant_image">
            <p style="width:150px;height:200px;border:1p solid #000000;margin-left:20px;float:right;padding:10px 0px 10px 5px;font-size:10px;line-height:15px;">
            <?php if(!empty($result->image_file)) { ?>
              <img src="<?php echo base_url('upload/assets/adm/usr/'.$result->image_file); ?>" width="100%;" class="pb-1">
            <?php } ?>
           <!-- 写真貼付欄${student_photo}
             <br>Photo
            <br>（４ｃｍ×３ｃm ）
            <br><br>・最近３ヶ月以内
            　<br>・上半身正面
            　<br>・脱帽のもの（ 2枚 ）
            　<br><br>・Within ３ months
            　<br>・Full　face
            　<br>・Without hat
            　<br>・2 copies 
              <br> -->
            </p>
        </span>
    </section>
    <section class="address" style="width:100%;">
		<table style="width:100%;">
        <tr>
			<th style="width: 12.75%;border-top:0px;background:#f5f5f5;font-size:10px;">本国の戸籍住所 <br>Home address</th>
			<td colspan="3"><?php echo $result->address?></td>
            </tr>
        <tr>
			<th style="width: 12.75%;border-top:0px;background:#f5f5f5;font-size:10px;">現在の住所 <br> Present address</th>
			<td colspan="3"><?php echo $result->address?></td>
            </tr>
		<tr>
			<th style="width: 12.75%;background:#f5f5f5;font-size:10px;">電話番号 <br>Phone Number</th>
			<td><?php echo $result->info_phone?></td>
            <th style="width: 12.75%;background:#f5f5f5;font-size:10px;">Ｅメール <br> E-mail</th>
			<td><?php echo $result->std_email?></td>
            </tr>
		<tr>
			<th style="width: 12.75%;background:#f5f5f5;font-size:10px;">旅券番号 <br>Passport No</th>
			<td><?php echo $result->passport_no?></td>
            <th style="width: 12.75%;background:#f5f5f5;font-size:10px;">有効期限 <br> Date of expiration</th>
			<td><?php echo $result->passport_data_exp?></td>
            </tr>
		<tr>
			<th style="width: 12.75%;background:#f5f5f5;font-size:10px;">職業 <br> Occupation</th>
			<td colspan="3"><?php echo $result->occupation?></td>
           
            </tr>
        </table>
		
</section>
<section class="eligibility">	
<div class="eligibility-status" style="padding: 10px 0px 0px;">	
<img src="asset/admin/images/past-history.png" style="width:30px;float:left;margin-right:10px;margin-top:5px;">																
        <p class="badge badge-danger" style="float:left;width: 60%;"> 過去の在留資格認定証明書交付申請歴 <br>
            Past history of applying for a certificate of eligibility</p>
        <div class="radio" style="width:200px;float:right;margin-top:10px;">
            <label class="col-md-4">
                <input type="radio" name="eligibility_have" value="1" <?php if($result->eligibility_have== '1'){ echo "checked='checked'"; } ?>> ありYes　　
            </label>
            <label class="col-md-4">
                <input type="radio" name="eligibility_have" value="0" <?php if($result->eligibility_have== '0'){ echo "checked='checked'"; } ?>>なしNo
            </label>
        </div>	
    </div>																	
		<table style="width: 100%;">
            <tr>
                <th style="width: 20%;background:#f5f5f5;">				
                回数 <br> No. of times
                </th>
                <td colspan="1">
                <?php echo $result->entry_time?>
                </td>
                <th style="width: 30%;background:#f5f5f5;">			
                    うち不交付となった回数<br>
                    Of these applications, the number of times of non-issuance																	                                                                                                                                                                 
                </th>
                <td colspan="1">
                  <?php echo $result->eligibility_non_issuance?>
                </td>
            </tr>
        </table>																
</section>
<section class="eligibility">	
<div class="eligibility-status" style="padding: 10px 0px 0px;">		
        <img src="asset/admin/images/record_japan.png" style="width:30px;float:left;margin-right:10px;margin-top:5px;">															
        <p class="badge badge-danger" style="float:left;width: 30%;"> 過去の来日歴　/　<br>Record of entry to Japan</p>
        <div class="radio" style="width:200px;float:right;margin-top:10px;">
            <label class="col-md-4">
                <input type="radio" name="have_you_visited_jp" value="1" <?php if($result->have_you_visited_jp== '1'){ echo "checked='checked'"; } ?>> ありYes　　
            </label>
            <label class="col-md-4">
                <input type="radio" name="have_you_visited_jp" value="0"  <?php if($result->have_you_visited_jp== '0'){ echo "checked='checked'"; } ?>>なしNo
            </label>
        </div>	
    </div>																	
		<table style="width: 100%;">
            <tr>
                <th style="width: 20%;background:#f5f5f5;">				
                    回数 <br> No. of times
                </th>
                <td colspan="1">
                <?php echo $result->entry_time?>
                </td>
                <th style="width: 20%;background:#f5f5f5;">			
                    直近の出入国歴 <br>The latest entry																                                                                                                                                                                 
                </th>
                <td colspan="1">
                <?php echo $result->date_of_departure?>
                </td>
            </tr>
        </table>																
</section>
<section class="family-japan">
    <div class="clearfix mb-5"></div>

                        <table style="width:100%; padding_top:20px" class="tbl">
                            <thead style="background: #f5f5f5; text-align:center;padding:1px;">
                                <tr class="text-center" style="font-size: 12px;">
                                    <th scope="col" colspan="2" style="width:40%">出入国年月日 <br>Previos dates of entering and leaving Japan</th>
                                    <th scope="col" class="align-middle" style="width: 20%">在留資格 <br>Residential Status</th>
                                    <th scope="col" style="width: 40%;">入国目的 <br>Previos purpose of entering Japan</th>
                                   
                                </tr>
                            </thead>
                            <tbody id="stockList">
                            <?php
                                foreach($result8 as $row8){
                                ?> 
                                    <tr>
                                    <td style="font-size: 11px; text-align: right;border-right:none;"><?php echo $row8->entry_date?>　  ~</td>
                                        <td style="font-size: 11px; text-align: right;border-left:none; text-align: left;">   <?php echo $row8->depature_date?></td>
                                        <td style="font-size: 12px; text-align: center;"><?php echo $row8->status?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row8->entry_purpose?></td>
                                    </tr>
                                    <?php } ?>
                               
                            </tbody>
                        </table>
</section>
<section class="family-japan">
    <div class="clearfix mb-5"></div>
    <div class="eligibility-status" style="height:45px;">	
        <img src="asset/admin/images/family.png" style="width:40px;float:left;margin-right:10px;margin-top:10px">															
        <p class="badge badge-danger" style="float:left;width: 77.9%;">在日親族（父・母・配偶者・子・兄弟姉妹・祖父母・叔(伯)父・叔(伯)母など）及び同居者 <br>
            Family in Japan (father, mother, spouse, children, <br>siblings,grandparents,uncle, aunt or others) and cohabitants</p>
        <div class="radio" style="width:150px;float:right;margin-top:20px;">
            <label class="col-md-4">
                <input type="radio" name="family_in_japan" value="1" <?php if($result->family_in_japan== '1'){ echo "checked='checked'"; } ?>>ありYes　　
            </label>
            <label class="col-md-4">
                <input type="radio" name="family_in_japan" value="0" <?php if($result->family_in_japan== '0'){ echo "checked='checked'"; } ?>>なしNo
            </label>
        </div>	
    </div>		
                        <table style="width:100%; padding_top:20px" class="tbl">
                            <thead style="background: #f5f5f5; text-align:center;padding:1px;">
                                <tr class="text-center" style="font-size: 12px;">
                                    <th scope="col">続柄<br>Relationship</th>
                                    <th scope="col" class="align-middle">氏名 <br>Name</th>
                                    <th scope="col">生年月日<br>Date of Birth</th>
                                    <th scope="col">国籍<br> Nationality</th>
                                    <th scope="col">住所／電話<br> Address / Telephond</th>
                                    <th scope="col">勤務先・通学先<br>Place of<br> Employment / School</th>
                                    <th scope="col">在留カード番号<br>（在留資格種類）<br>Residence card number <br>(Type of status)</th>
                                </tr>
                            </thead>
                            <tbody id="stockList">
                            <?php
                                foreach($result7 as $row7){
                                ?> 
                                    <tr>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row7->ja_fam_relationship?></td>
                                        <td style="font-size: 12px; text-align: center;"><?php echo $row7->ja_fam_name?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php if($row7->ja_fam_date_birth == ''){echo '-';}else{echo $row7->ja_fam_date_birth;}?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row7->ja_fam_nationality?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row7->ja_fam_address?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row7->ja_fam_work_place?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row7->residence_card_no?></td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
</section>

<!-- <?php print_r($result);?> -->
<section class="edu-background" style="margin-top: 20px;">
    <div class="clearfix mb-5"></div>	
    <div class="eligibility-status" style="padding: 10px 0px 0px;">	
        <div class="edu-logo" style="width: 180px;">      
        <img src="asset/admin/images/jcli-logo.png">
        </div>		
        <img src="asset/admin/images/edu.png" style="width:30px;float:left;margin-right:10px;">												
        <span class="badge badge-danger" style="float:left;width: 50%;">学歴　/　Educational background</span>
    </div>	
                        <table style="width:100%; padding_top:20px" class="tbl">
                            <thead style="background: #f5f5f5; text-align:center;padding:1px;">
                                <tr class="text-center" style="font-size: 12px;">
                                    <th scope="col" style="width:25% !important">学校名 <br>Name of School</th>
                                    <th scope="col" class="align-middle" style="width: 10%;border-right:0px;">入学年月<br> Enrollment<br>Year/Month ~</th>
                                    <th scope="col" style="width: 10%;border-left: none;">卒業年月<br>Completion<br>Year/Month		
                                    </th>
                                    <th scope="col" style="width: 10%;;">修学年数 <br>Total school years</th>
                                    <th scope="col" style="width: 35%;">所在地 <br>Location</th>
                                </tr>
                            </thead>
                            <tbody id="stockList">
                            <?php
                                foreach($result1 as $row1){
                                ?> 
                                    <tr>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row1->edu_name?></td>
                                        <td style="font-size: 12px; text-align: right;border-right:0px;"><?php echo $row1->start_date?></td>
                                        <td style="font-size: 11px; text-align: left;border-left: none;">~　<?php echo $row1->end_date?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row1->year?></td>
                                       
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row1->address?></td>
                                    </tr>
                                  
                                    <?php } ?>
                               
                            </tbody>
                        </table>
</section>
<section class="edu-background">
                        <table style="width:100%; padding_top:20px;border-top:none;" class="tbl">
                            <tbody>
                                <tr class="text-center" style="font-size: 12px;border-top:none;">
                                    <th scope="col"  style="width: 35%;">在籍状況 <br> Registered enrollment</th>
                                    <td scope="col" class="align-middle" style="width: 15%;"><?php echo $result9->registered_enrollment?></td>
                                    <th scope="col" style="width: 30%;">修学年数(小学校から最終学歴まで)<br>
 Total period of education (from elementary school to the last school attended). </th>
                                    <td scope="col" style="width: 15%;"><?php echo $resulteduhis->year?></td>
                                    <td scope="col" style="width: 10%;">年<br>Years</td>
                                </tr>
                            </tbody>
                            
                        </table>
                        
</section>
<section class="edu-background">
    <div class="clearfix mb-5"></div>
    <div class="eligibility-status" style="padding: 10px 0px 0px;">	
        <img src="asset/admin/images/occupational.png" style="width:30px;float:left;margin-right:10px;">														
        <p class="badge badge-danger" style="float:left;width: 40%;margin-top:5px;">職歴　/　Occupational experience</p>
        <div class="radio" style="width:200px;float:right;">
            <label class="col-md-4">
                <input type="radio" name="employment_experience" value="1" <?php if($result->employment_experience== '1'){ echo "checked='checked'"; } ?>> ありYes　　
            </label>
            <label class="col-md-4">
                <input type="radio" name="employment_experience" value="0" <?php if($result->employment_experience== '0'){ echo "checked='checked'"; } ?>>なしNo
            </label>
        </div>	
    </div>		
                        <table style="width:100%;" class="tbl">
                            <thead style="background: #f5f5f5; text-align:center;padding:1px;">
                                <tr class="text-center" style="font-size: 12px;">
                                    <th scope="col" style="width:35% !important;">会社・事業所名 <br>Name of company</th>
                                    <th scope="col" class="align-middle" style="width: 10%;border-right:0px;">入学年月<br> Enrollment<br>Year/Month ~</th>
                                    <th scope="col" style="width: 10%;border-left: none;border-left:0px;">卒業年月<br>Completion<br>Year/Month		
                                    </th>
                                    <th scope="col" style="width: 10%;;">修学年数 <br>職業 <br>Job content</th>
                                    <th scope="col" style="width: 35%;">"所在地 <br>Location</th>
                                </tr>
                            </thead>
                            <tbody id="stockList">
                            <?php
                                foreach($result5 as $row5){
                                ?> 
                                    <tr>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row5->emp_name?></td>
                                        <td style="font-size: 12px; text-align: right;border-right: none;"><?php echo $row5->start_date?></td>
                                        <td style="font-size: 11px; text-align: left;border-left: none;">~<?php echo $row5->end_date?> </td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row5->job_description?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row5->address?></td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
</section>
<section class="edu-background">
    <div class="clearfix mb-5"></div>
    <div class="eligibility-status" style="padding: 10px 0px 0px;">		
        <img src="asset/admin/images/blank.png" style="width:30px;float:left;margin-right:10px;">														
        <p class="badge badge-danger" style="float:left;width: 50%;margin-top:5px;">空白期間／兵役　Blank period／Military service																	
        </p>
        <div class="radio" style="width:200px;float:right;">
            <label class="col-md-4">
                <input type="radio" name="military_service" value="1" <?php if($result->military_service== '1'){ echo "checked='checked'"; } ?>>ありYes　　
            </label>
            <label class="col-md-4">
                <input type="radio" name="military_service" value="0" <?php if($result->military_service== '0'){ echo "checked='checked'"; } ?>>なしNo
            </label>
        </div>	
        
    </div>		
    <table>
        <tr style="width: 100%;">
            <th style="width: 15%;background:#f5f5f5;">				
                詳細 <br> Details
            </th>
            <td colspan="6" style="width:700px;text-align:left;">
            <?php echo $result->military_service_details?>
            </td>
           
        </tr>
    </table>
    <div class="eligibility-status" style="padding: 10px 0px 0px;">	
        <img src="asset/admin/images/learn-exp.png" style="width:30px;float:left;margin-right:10px;">																
        <p class="badge badge-danger" style="float:left;width: 60%;">日本語学習歴　Learning experience for Japanese language																
        </p>
        <div class="radio" style="width:30%;float:right;">
            <label class="col-md-4">
                <input type="radio" name="jplearn_experience" value="1" <?php if($result->jplearn_experience== '1'){ echo "checked='checked'"; } ?>>ありYes　　
            </label>
            <label class="col-md-4">
                <input type="radio" name="jplearn_experience" value="0" <?php if($result->jplearn_experience== '0'){ echo "checked='checked'"; } ?>>なしNo
            </label>
        </div>	
        
    </div>	
                        <table style="width:100%;" class="tbl">
                            <thead style="background: #f5f5f5; text-align:center;padding:1px;">
                                <tr class="text-center" style="font-size: 12px;">
                                    <th scope="col" style="width:25%;text-align: center;">学校名及び所在地 <br>Name of Institution and location</th>
                                    <th scope="col" class="align-middle" style="width: 10%;border-right: none;">
                                        <span>入学年月<br> Enrollment<br>Year/Month ~ </span>
                                     </th>
                                    <th scope="col" style="width: 10%;border-left: none">卒業年月<br>Completion<br>Year/Month		
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="stockList">
                            <?php
                                foreach($result2 as $row2){
                                ?> 
                                    <tr>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row2->jp_name?>　/　<?php echo $row2->address?></td>
                                        <td style="font-size: 12px; text-align: right;border-right: none;"><?php echo $row2->start_date?></td>
                                        <td style="font-size: 11px; text-align: left;border-left: none;"> ~　 <?php echo $row2->end_date?> </td>
                                        
                                    </tr>
                                    <?php } ?>
                               
                            </tbody>
                        </table>
</section>
<section class="family-japan">
    <div class="clearfix mb-5"></div>
    <div class="eligibility-status" style="padding: 10px 0px 0px;">		
    <img src="asset/admin/images/proficiency.png" style="width:30px;float:left;margin-right:10px;">														
        <p class="badge badge-danger" style="float:left;width: 50%;">日本語能力　Japanese Language Proficiency																
        </p>
        <div class="radio" style="width:30%;float:right;">
            <label class="col-md-4">
                <input type="radio" name="jplearn_achievement" value="1" <?php if($result->jplearn_achievement== '1'){ echo "checked='checked'"; } ?>>ありYes　　
            </label>
            <label class="col-md-4">
                <input type="radio" name="jplearn_achievement" value="0" <?php if($result->jplearn_achievement== '0'){ echo "checked='checked'"; } ?>>なしNo
            </label>
        </div>	
    </div>		
                        <table style="width:100%;" class="tbl">
                            <thead style="background: #f5f5f5; text-align:center;padding:1px;">
                           
                                <tr class="text-center" style="font-size: 12px;">
                                    <th colspan="1" scope="col" style="width:20%;">受験名称 <br> Examination</th>
                                    <th colspan="1" scope="col" class="align-middle" style="width: 15%;">受験年度 <br> Exam year</th>
                                    <th colspan="1" scope="col" style="width: 15%;">受験等級 <br> Exam Level</th>
                                    <th colspan="1" scope="col" style="width: 15%;">"受験点数 <br>Score</th>
                                    <th colspan="1" scope="col" style="width: 15%;">受験結果 <br> Result</th>
                                </tr>
                               
                            </thead>
                            <tbody id="stockList">
                            <?php
                                foreach($result3 as $row3){
                                ?> 
                                    <tr>
                                        <!-- <td style="font-size: 11px; text-align: right;width:50px;"></td> -->
                                        <td style="font-size: 12px; text-align: center;"><?php echo $row3->achiv_name?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php if($row3->exam_year == ''){echo '-';}else{echo $row3->exam_year;}?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row3->level?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row3->score?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row3->result?></td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
</section>
<section class="family-japan">
    <div class="clearfix mb-5"></div>
    <div class="eligibility-status" style="padding: 0px 0px;">	
        <img src="asset/admin/images/family-mem.png" style="width:30px;float:left;margin-right:10px;">															
        <p class="badge badge-danger" style="float:left;width: 50%;margin: 5px 10px 0px;">家族　Family members													
</p>       
    </div>		
                        <table style="width:100%;" class="tbl">
                            <thead style="background: #f5f5f5; text-align:center;padding:1px;">
                                <tr class="text-center" style="font-size: 12px;">
                                    <th scope="col" style="width:10%;">続柄<br>Relationship</th>
                                    <th scope="col" class="align-middle" style="width: 20%;">氏名 <br>Name</th>
                                    <th scope="col" style="width:10%;">生年月日<br>Date of Birth</th>
                                    <th scope="col" style="width:10%;">国籍<br> Nationality</th>
                                    <th scope="col" style="width: 10%;">職業 <br> Occupation</th>
                                    <th scope="col" style="width: 30%;">住所 <br>Address</th>
                                </tr>
                            </thead>
                            <tbody id="stockList">
                            <?php
                                foreach($result6 as $row6){
                                ?>
                                    <tr>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row6->fam_relationship?></td>
                                        <td style="font-size: 12px; text-align: center;"><?php echo $row6->fam_name?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php if($row6->birthday == ''){echo '-';}else{echo $row6->birthday;}?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row6->fam_nationality?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row6->occupation?></td>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row6->address?></td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
</section>
<section class="header" style="width:100%;display: flex;height:120px;margin-top: 20px;">
	<div class="logo">
       
    <img src="asset/admin/images/jcli-logo.png">
	</div>
	<div class="application-title" style="width:800px;margin:0 auto;text-align:center;">
		<h3 style="font-family: sun-exta, gb;margin:0 0 10px;font-size:30px;">留学理由書</h3>
		<span>Your purpose of study in Japan</span>
	</div>
</section>
<section class="personal-info" style="border: 1px solid #000000;">
    <table style="width:100%; float: left;">
        <tr>

			<th colspan="1" style="background:#f5f5f5;">氏名(ローマ字)
				<br>Name(s) as shown
				<br>on your passport</th>
				<td colspan="5"><?php echo $result->applicant_name?></td>
        </tr>
		<tr>
           
			<th colspan="1" style="background:#f5f5f5;">				
				国籍・地域<br>Nationality/Region
            </th>
			<td style="width: 20%;">
            <?php echo $result->info_nationality?> 
            </td>
            <th style="width: 10%;background:#f5f5f5;">				
            性別 <br> Sex
            </th>
			<td style="width: 20%;">
            <?php if($result->gender == '1'){echo 'Male';}else{echo 'Female';}?>
            </td>
            <th style="width: 20%;background:#f5f5f5;">			
             生年月日 <br> Date of birth
            </th>
			<td style="width: 20%;">
            <?php echo $result->date_of_birthday?>
            </td>
		</tr>
       
		</table>
		
</section>
<section class="personal-info">
<img src="asset/admin/images/gradu.png" style="width:30px;float:left;margin-right:10px;margin:10px 0 0px;">
    <p style="padding: 15px 10px 0px;">卒業後の進路　Plans for after graduation																			</p>
    <table style="width:100%; float: left;">
        <tr>
			<th rowspan="3" style="width: 25%;background:#f5f5f5;">
				日本国内での進学 <br>Higher education in Japan
			</th>			
            <th colspan="1" style="width: 10%;background:#f5f5f5;">
				学校種別 <br> Type of schools
			</th>
            <td colspan="4"><?php echo $result->specific_plan_type_schools?></td>
        </tr>
        <tr>
			<th colspan="1" style="width: 15%;background:#f5f5f5;">
				学校名 <br> Name of School	
			</th>			
            
			<td colspan="4"><?php echo $result->specific_plan_school_name?></td>
        </tr>
        <tr>
			<th colspan="1" style="width: 15%;background:#f5f5f5;">
				希望科目（専攻）<br> Major
			</th>			
           
			<td colspan="4"><?php echo $result->current_status_school_major?></td>
        </tr>
        <tr>
			<th colspan="1" style="width: 25%;background:#f5f5f5;">
                就職 <br> Employment								
			</th>			
            <th colspan="1" style="width: 15%;background:#f5f5f5;">
				希望する職種 <br> Aimed occupational category
			</th>	
			<td colspan="4"><?php echo $result->aimed_occupational_category?></td>
        </tr>
        <tr>
			<th colspan="1" style="width: 25%;background:#f5f5f5;">
				帰国・復学 <br> Return to home country
			</th>			
            <th colspan="2" style="width: 30%;background:#f5f5f5;">
				いつ頃帰国する予定ですか？<br> When will you return?
			</th>	
			<td colspan="3"><?php echo $result->will_you_return?></td>
        </tr>
        <tr>
            <th colspan="1" style="background:#f5f5f5;">その他 <br> Others</th>
				<td colspan="5"><?php if($result->specific_plans_after_graduating== "Other"){echo '-';}?></td>
        </tr>		      
		</table>		
</section>
<br><br><br><br>
<section class="personal-info">
<img src="asset/admin/images/purpose.png" style="width:30px;float:left;margin-right:10px;padding:10px 0 0px;">
    <p style="padding: 10px 0px 0px;">志望理由　Statement of purpose</p>
    <p class="note" style="width: 100%;padding:30px 30px;border: 1px solid #000000;"><?php echo $result->purpose_studying_in_japanese?></p>
    <p> 以上のことはすべて事実であり、私が記入したものです。また、本入学願書に記述した全ての内容、及びその他の出願に必要となる提出書類については、その情報の取り<br>扱いにつき、貴校の募集要項の内容に同意の上出願を行うものです。<br>
        I hereby declare the above statement that I wrote is true and correct. By signing below I give consent to all of the information stated in this application form. The submitted documents will be treated in accordance with the enrollment guidelines.</p>
    <table style="width:100%; float: left;">
        <tr>
			<th colspan="1" style="width: 10%;background:#f5f5f5;">
				作成日 <br>Date	
			</th>	
            <td colspan="4"><?php echo $splitted = date('Y', strtotime($result->register_date));?>-<?php echo $splitted = date('m', strtotime($result->register_date));?>-<?php echo $splitted = date('d', strtotime($result->register_date));?></td>		
            <th colspan="1" style="width: 15%;background:#f5f5f5;">
				署名 <br> Signature
			</th>	
			<td colspan="4">
            <?php if(!empty($result->image_file)) { ?>
              <img style="width:40px;height:40px;" src="<?php echo base_url('upload/assets/adm/usr/'.$result->sign_file); ?>" width="10px;" height="10px" class="pb-1">
            <?php } ?>
            </td>
        </tr> 
		</table>	
</section>
</body>
<style>
    body {
                    font-size: 12px;
                    color: #111;
                    font-weight: normal;
                    font-family: 'Open Sans',big5,sans-serif;
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
                    text-align: center;
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
                section.personal-info {
                    /* margin-bottom: 20px; */
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
            .note{
                /* width: 100%;
                height: 500px;
                border: 1px solid #000000; */
            }
</style>
</html>';
