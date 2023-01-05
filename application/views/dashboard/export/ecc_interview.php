$html = '
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="asset/css/style.css">
<style>
    @font-face {
            font-family: 'Firefly';
            font-style: normal;
            font-weight: normal;
            src: url('dompdf/dompdf/libs/fonts/DejaVuSans-Bold.ttf') format('truetype');
        }
   
    body {
                    font-size: 11px;
                    color: #111;
                    font-weight: normal;
                    font-family:firefly, DejaVu Sans, sans-serif;
                    /* font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, メイリオ, Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", "ＭＳ ゴシック" , "MS Gothic", "Noto Sans CJK JP", TakaoPGothic, sans-serif; */
                    /* font-family: "Lucida Console", "Courier New", monospace; */
                    /* font-family: 'MS PGothic', Arial, sans-serif; */
                    font-family: 'Open Sans',sjis,sans-serif; 
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
                    padding-left: 5px;
                    padding-top: 5px;
                    padding-bottom: 5px;
                    /* text-align: center; */
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
                    padding: 0px;
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
                    width: 250px;
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
                    float: left;
                }
                img{
                    width: 100%;;
                }
				.result_image{
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
            .ecc_date{
                width: 100%;
                padding: 20px;
                margin: 20px;
            }
            .ecc_dates{
                display: inline;
            }
        
                </style>
</head>
<body>
<section class="header">
	<div class="logo">
	</div>
	<div class="application-title" style="text-align:center;">
		<h3 style="font-size: 20px;font-weight:bold;">Questionnaire</h3>
	</div><br/>
    <div style="display: inline;padding: 0px;margin:0px;">
        <span class="ecc_date"  style="">Date:</span>
        <span class="ecc_date"  style=""><span><?php echo $splitted = date('Y', strtotime($result->register_date));?></span>year</span>
        <span class="ecc_date"  style=""><span><?php echo $splitted = date('m', strtotime($result->register_date));?></span>month</span>
        <span class="ecc_date"  style=""><span><?php echo $splitted = date('d', strtotime($result->register_date));?></span>date</span>
    </div>
</section>
<section class="eligibility">	
<div class="eligibility-status" style="padding: 0px 0px;">        
    </div>																	
		<table style="width: 100%;">
        

            <tr style="border-bottom:none !important;">
                <th rowspan="2" class="ecc_stu_name" style="width:10%;border-right:none !important;font-size:13px;">				
                   Name:
                </th>
                <td  colspan="2" rowspan="2" style="border-left:none !important;font-size:13px;"><?php echo $result->applicant_name?></td>
                <th style="width:20%;border-right:none !important;border-bottom:none !important;font-size:13px;">			
                   Date of Birth:											                                                                                                                                                                 
                </th>
                <td colspan="1.5" style="border-left:none !important;font-size:13px;border-bottom:none !important;"><?php echo $result->date_of_birthday?></td>
            </tr>
            <tr style="border-top:none !important;">
                <th style="width:20%;border-right:none !important;font-size:13px;">	
                Sex:		
                </th>
                <td colspan="1.5" style="border-left:none !important;font-size:13px;"><?php if($result->gender == '1'){echo 'Male';}else{echo 'Female';}?></td>
            </tr>
            <tr>
                <th class="ecc_stu_name" style="width:10%;border-right:none !important;font-size:13px;">				
                   Address:
                </th>
                <td  colspan="2" style="border-left:none !important;border-right:none !important;font-size:13px;"><?php echo $result->address?></td>
                <th style="width:30%;" style="border-right:none !important;border-left:none !important;font-size:13px;">			
                  (Married/Unmarried):											                                                                                                                                                                 
                </th>
                <td colspan="1.5" style="border-left:none !important;font-size:13px;"><?php if($result->martial_status == '1'){echo 'Unmarried';}else{echo 'Married';}?></td>
            </tr>
            <tr>
                <th class="ecc_stu_name" style="width:15%;border-right:none !important;font-size:13px;">				
                Phone number:
                </th>
                <td  colspan="2" style="border-left:none !important;border-right:none !important;font-size:13px;"><?php echo $result->info_phone?></td>
                <th style="width:20%;" style="width:20%;border-right:none !important;border-left:none !important;font-size:13px;">			
                Email:											                                                                                                                                                                 
                </th>
                <td colspan="1.5" style="border-left:none !important;font-size:13px;"><?php echo $result->std_email?></td>
            </tr>
            
        </table>																
</section>
<section class="personal-info" style="width:100%;padding-top:22px;">
    <div class="personal" style="width: 100%;display:inline-block;">
    <h4 style="margin:0px;font-family: 'Open Sans',sjis,sans-serif;font-size:14px; ">Educational History : from Elementary School to the Most Recent School</h4>
      <table style="width:100%;" class="tbl">
        <thead style=" text-align:center;padding:1px;">
            <tr class="text-center" style="font-size: 12px;background-color:#ffffff;">
                <th scope="col" style="width:35% !important; text-align: center; font-size:13px;">Name of Institution</th>
                <th scope="col" class="align-middle" style="width: 10%; text-align: center;border-right:0px;font-size:13px;">Starting<br>Year/Month </th>
                <th scope="col" style="width: 10%;border-left: none;text-align: center;border-left:0px;font-size:13px;">Finishing<br>Year/Month</th>	
                <th scope="col" style="width: 10%;text-align: center;font-size:13px;">Term of Study </th>
            </tr>
        </thead>
        <tbody id="stockList">
        <?php
          foreach($result1 as $row1){
        ?>   
            <tr>
                <td style="font-size: 11px; text-align: center;font-size:13px;"><?php echo $row1->edu_name?></td>
                <td style="font-size: 12px; text-align: center;border-right: none;font-size:13px;"><?php echo $row1->edu_start_date?></td> 
                <td style="font-size: 11px; text-align: center;border-left: none;font-size:13px;"><?php echo $row1->edu_end_date?></td>
                <td style="font-size: 11px; text-align: center;border-left: none;font-size:13px;"><?php echo $row1->edu_year?> year</td>
            </tr>
        <?php } ?>
            <!-- <tr>
                <td style="font-size: 11px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 12px; text-align: left;border-right: none;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;border-left: none;font-size:13px;"> 〜 </td>
                <td style="font-size: 11px; text-align: right;border-left: none;font-size:13px;">year</td>
            </tr>
            <tr>
                <td style="font-size: 11px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 12px; text-align: left;border-right: none;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;border-left: none;font-size:13px;"> 〜 </td>
                <td style="font-size: 11px; text-align: right;border-left: none;font-size:13px;">year</td>
            </tr>
            <tr>
                <td style="font-size: 11px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 12px; text-align: left;border-right: none;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;border-left: none;font-size:13px;"> 〜 </td>
                <td style="font-size: 11px; text-align: right;border-left: none;font-size:13px;">year</td>
            </tr>
            <tr>
                <td style="font-size: 11px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 12px; text-align: left;border-right: none;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;border-left: none;font-size:13px;"> 〜 </td>
                <td style="font-size: 11px; text-align: right;border-left: none;font-size:13px;">year</td>
            </tr> -->
            
        </tbody>
      </table>
    </div>
    </section> 
    <section class="personal-info" style="width:100%;padding-top:22px;">
    <div class="personal" style="width: 100%;display:inline-block;">
    <h4 style="margin:0px;font-family: 'Open Sans',sjis,sans-serif;font-size:14px;">Previous Japanese Language Study</h4>
      <table style="width:100%;" class="tbl">
        <thead style="text-align:center;padding:1px;">
            <tr class="text-center" style="font-size: 12px;background-color:#ffffff;">
                <th scope="col" style="width:35% !important; text-align:center;font-size:13px; ">Name of Institution</th>
                <th scope="col" class="align-middle" style="width: 10%; text-align:center;border-right:0px;font-size:13px;">Starting<br>Year/Month </th>
                <th scope="col" style="width: 10%;border-left: none;text-align:center;border-left:0px;font-size:13px;">Finishing<br>Year/Month		
                </th>
                <th scope="col" style="width: 10%;text-align:center;">Total Hours of Study </th>
            </tr>
        </thead>
        <tbody id="stockList">
        <?php
          foreach($result2 as $row2){
        ?> 
            <tr>
                <td style="font-size: 11px; text-align: center;font-size:13px;"><?php echo $row2->jp_name?></td>
                <td style="font-size: 12px; text-align: center;border-right: none;font-size:13px;"><?php echo $row2->jp_start_date?></td>
                <td style="font-size: 11px; text-align: center;border-left: none;font-size:13px;"><?php echo $row2->jp_end_date?></td>
                <td style="font-size: 11px; text-align: center;font-size:13px;"><?php echo $row2->jp_hour?> hours</td>
            </tr>
        <?php } ?>
            <!-- <tr>
                <td style="font-size: 11px; text-align: right;font-size:13px;"></td>
                <td style="font-size: 12px; text-align: left;border-right: none;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;border-left: none;font-size:13px;"> 〜 </td>
                <td style="font-size: 11px; text-align: right;font-size:13px;">hours</td>
            </tr> -->
        
        </tbody>
      </table>
    </div>
    </section> 
    <section class="personal-info" style="width:100%;display:flex;padding-top:22px;">
    <div style="width:50%;float:left;">
    <div class="personal" style="width: 100%;">
    <h4 style="margin:0px;font-family: 'Open Sans',sjis,sans-serif;font-size:14px;">Achievement in Japanese language tests  :</h4>
      <table style="width:95%;" class="tbl">
        <thead style="text-align:center;padding:1px;">
            <tr class="text-center" style="font-size: 12px;background-color:#ffffff;">
                <th scope="col" style="width:60% !important; text-align: center;font-family: 'Open Sans',sjis,sans-serif;font-size:13px; ">Name of Japanese language test </th>
                <th colspan="2" scope="col" style="width: 40%;text-align:center;font-size:13px;">Level</th>
            </tr>
        </thead>
        <tbody id="stockList">
        <?php
          foreach($result3 as $row3){
        ?> 
            <tr>
                <td style="font-size: 11px; text-align: center;border-left: none;"><?php echo $row3->achiv_name?></td>
                <td style="font-size: 11px; text-align: left;border-right:none !important;"><p style="text-align: left;padding:0px;margin:0px;display:flex;">Level:</p><?php echo $row3->level?></td>
                <td style="font-size: 11px; text-align: left;border-left:none !important;"><p style="text-align: left;padding:0px;margin:0px;display:flex;">year:</p><?php echo $row3->exam_year?></td>
            </tr>
            <?php } ?>
            <!-- <tr>
                <td style="font-size: 11px; text-align: left;border-left: none;"></td>
                <td style="font-size: 11px; text-align: left;border-right:none !important;"><p style="text-align: left;padding:0px;margin:0px;display:flex;">Level:</p></td>
                <td style="font-size: 11px; text-align: left;border-left:none !important;"><p style="text-align: left;padding:0px;margin:0px;display:flex;">year:</p></td>
            </tr> -->
        
        </tbody>
      </table>
    </div>
    </div>
    <div style="width:50%;float:right;">
    <div class="personal" style="width: 100%;">
    <h4 style="margin:0px;font-family: 'Open Sans',sjis,sans-serif;font-size:13px;">Name of Japanese language tests you are going to take</h4>
      <table style="width:100%;padding-left:10px;" class="tbl">
        <thead style="text-align:center;padding:1px;padding-left:10px;">
            <tr class="text-center" style="font-size: 12px;background-color:#ffffff;">
                <th scope="col" style="width:60% !important; text-align: center;font-size:13px; ">Name of Japanese language test </th>
                <th colspan="2" scope="col" style="width: 40%;text-align:center;font-size:13px;">Level</th>
            </tr>
        </thead>
        <tbody id="stockList">
        <?php
          foreach($result4 as $row4){
        ?> 
            <tr>
                <td style="font-size: 11px; text-align: center;border-left: none;"><?php echo $row4->going_name?></td>
                <td style="font-size: 11px; text-align: left;border-right:none !important;"><p style="text-align: left;padding:0px;margin:0px;display:flex;">Level:</p><?php echo $row4->going_level?></td>
                <td style="font-size: 11px; text-align: left;border-left:none !important;"><p style="text-align: left;padding:0px;margin:0px;display:flex;">Date:</p><?php echo $row4->going_date?></td>
            </tr>
            <!-- <tr>
                <td style="font-size: 11px; text-align: left;border-left: none;"></td>
                <td style="font-size: 11px; text-align: left;border-right:none !important;"><p style="text-align: left;padding:0px;margin:0px;display:flex;">Level:</p></td>
                <td style="font-size: 11px; text-align: left;border-left:none !important;"><p style="text-align: left;padding:0px;margin:0px;display:flex;">Date:</p></td>
            </tr> -->
            <?php } ?>
        </tbody>
      </table>
    </div>
    </div>
    </section>
    <section class="personal-info" style="width:100%;padding-top:22px;">
    <div class="personal" style="width: 100%;display:inline-block;">
    <h4 style="margin:0px;font-family: 'Open Sans',sjis,sans-serif;font-size:14px;">History of Employment (Write in order, ending with the most recent employment.):</h4>
      <table style="width:100%;" class="tbl">
        <thead style="text-align:center;padding:1px;">
            <tr class="text-center" style="font-size: 13px;background-color:#ffffff;">
                <th scope="col" style="width:35% !important; text-align: center;font-size:13px; ">Place of Employment</th>
                <th scope="col" class="align-middle" style="width: 10%; text-align: center;border-right:0px;font-size:13px;">Starting<br>Year/Month</th>
                <th scope="col" style="width: 10%;border-left: none;text-align: center;border-left:0px;font-size:13px;">Finishing<br>Year/Month		
                </th>
                <th scope="col" style="width: 10%;text-align:center;font-size:13px;">Job Description </th>
            </tr>
        </thead>
        <tbody id="">
        <?php
          foreach($result5 as $row5){
        ?> 
            <tr>
                <td style="font-size: 11px; text-align: center;font-size:13px;height:24px;"><?php echo $row5->emp_name?></td>
                <td style="font-size: 12px; text-align: center;border-right: none;font-size:13px;height:24px;"><?php echo $row5->emp_start_date?></td>
                <td style="font-size: 11px; text-align: center;border-left: none;font-size:13px;height:24px;"><?php echo $row5->emp_end_date?></td>
                <td style="font-size: 11px; text-align: center;font-size:13px;height:24px;"><?php echo $row5->emp_job_description?></td>
        <?php } ?>   
            </tr>          
            
        </tbody>
      </table>
    </div>
    </section> 
<br>
    <div>
<h4 style="padding: 0px;margin:0px;font-family: 'Open Sans',sjis,sans-serif;font-size:14px;">Have you visited Japan?</h4> 	

<div style="width:100%;display: inline;">
<p  style="width:100%;display:inline;">
    <p style="width:100px;float:left;font-size:13px;"><?php if($result->have_you_visited_jp == '1'){echo 'Yes';}else{echo 'No';}?></p>
    <p style="width:200px;float:left;font-size:13px;"> ( Status :<?php echo $result->visited_jp_status?></p> 
    <p style="width:180px;float:left;font-size:13px;">Date of Entry:<?php echo $result->visited_date?></p>
    <p style="width:200px ;float:left;font-size:13px;">Date of Departure:<?php echo $result->date_of_departure?>　) </p>
</p> 
</div>

<h4 style="padding: 0px;margin:0px;font-family: 'Open Sans',sjis,sans-serif;font-size:14px;">Have you applied for Certificate of Eligibility? </h4>	
<div style="width:100%;display: inline;">
<p>
    <p style="width:100px;float:left;font-size:13px;"><?php if($result->eligibility_have == '1'){echo 'Yes';}else{echo 'No';}?></p>
    <p style="width:100px;float:left;font-size:13px;">(times : <?php echo $result->eligibility_details?></p>                 
    <p style="width:180px;float:left;font-size:13px;">Purpose of Entry: <?php echo $result->entry_purpose1?></p>
    <p style="width:150px;float:left;font-size:13px;"> When: <?php echo $result->criminal_record_when?></p> 
    <p style="width:150px;float:right;font-size:13px;"> ) </p>
 </p> 
</div>	
<h4 style="width:400px;float:left;font-family: 'Open Sans',sjis,sans-serif;font-size:14px;">Is it possible to provide all required documents in English?</h4>
<p style="width:250px;float:right;font-size:13px;"><?php if($result->provide_english == '1'){echo 'Yes';}else{echo 'No';}?></p>							
<h4 style="padding: 0px;margin:0px;width:400px;float:left;font-size:13px;">Your future plan after completing a course in ECC:	</h4>								
<p style="padding: 0px;margin:0px;width:400px;float:left;">
    <p style="width:400px;float: left;font-size:13px;">( <?php echo $result->specific_plans_after_graduating?></p>
    <p style="width:100px;float: right;font-size:13px;">	)</p>	
</p>
<h4 style="padding: 0px;margin:0px;font-family: 'Open Sans',sjis,sans-serif;font-size:14px;">Is there any your family member who understands at least one of the languages which we understand? And, who? </h4>		

<p style="width:450px;float:left;font-family: 'Open Sans',sjis,sans-serif;font-size:13px;">( Language : <?php if($result->family_language == 'English'){echo 'English';}elseif($result->family_language == 'Chinese'){echo 'Chinese';}else{echo 'Japanese';}?> </p>
<p style="width:200px;float:left;font-size:13px;">Relationship:<span style="width:200px;float:right;font-size:13px;"></span> <?php echo $result->understand_language?>       )</p>	


</div>   
<section class="personal-info" class="personal-info" style="width:100%;padding-top:22px;">
    <h4 style="margin:0px;font-family: 'Open Sans',sjis,sans-serif;font-size:14px;">Family Member</h4>	
    <div class="personal" style="width: 100%;display:inline-block;">
    <table style="width:100%;" class="tbl">
        <thead style="padding:1px;">
            <tr class="text-center" style="font-size: 12px;background-color:#ffffff;">
                <th scope="col" style="width:20%;text-align:center;font-size:13px;" >Name</th>
                <th scope="col" style="width:10%;text-align:center;font-size:13px;">Relationship</th>
                <th scope="col" style="width:10%;text-align:center;font-size:13px;">Work Place</th>
                <th scope="col" style="width:10%;text-align:center;font-size:13px;">Occupation </th>
                <th scope="col" style="width: 10%;text-align:center;font-size:13px;">Length of Service </th>
                <th scope="col" style="width: 10%;text-align:center;font-size:13px;" >Annual Income</th>
            </tr>
        </thead>
        <tbody id="">
        <?php
          foreach($result6 as $row6){
        ?> 
           <tr>
                <td style="font-size: 11px; text-align: center;height:24px;"><?php echo $row6->fam_name?></td>
                <td style="font-size: 12px; text-align: center;height:24px;"><?php echo $row6->fam_relationship?></td>
                <td style="font-size: 11px; text-align: center;height:24px;"><?php echo $row6->fam_work_place?></td>
                <td style="font-size: 11px; text-align: center;height:24px;"><?php echo $row6->fam_occupation?></td>
                <td style="font-size: 11px; text-align: center;height:24px;"><?php echo $row6->length_sevice?></td>
                <td style="font-size: 11px; text-align: center;height:24px;"><?php echo $row6->annual_income?></td>
            </tr>
        <?php } ?>  
            <!-- <tr>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 12px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;"> </td>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;">-</td>
            </tr>
            <tr>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 12px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;">-</td>
            </tr>
            <tr>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 12px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;"> </td>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;">-</td>
            </tr>
            <tr>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 12px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;"> </td>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;">-</td>
            </tr>
            <tr>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 12px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;"> </td>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;"></td>
                <td style="font-size: 11px; text-align: left;">-</td>
            </tr> -->
        </tbody>
    </table>
    </div>
</section>


<section class="eligibility"  style="width:100%;padding-top:22px;">	
    <h4 style="margin:0px;font-family: 'Open Sans',sjis,sans-serif;font-size:14px;">Financial Sponsor</h4>			
    <div class="personal" style="width: 100%;display:inline-block;">													
		<table style="width: 100%;">
            <tr>
                <th  class="ecc_stu_name" style="width: 10%;border-right:none !important;font-size:13px;">				
                   Name:
                </th>
                <td  colspan="3" style="width:30%;text-align:left;border-left:none !important;font-size:13px;"><?php echo $result->fin_name?></td>
                <th style="width:10%;border-right:none !important;font-size:13px;">			
                  Age:										                                                                                                                                                                 
                </th>
                <td colspan="1" style="border-left:none !important;font-size:13px;"><?php echo $result->fin_age?></td>
                <th style="width:20%;border-right:none !important;font-size:13px;">			
                Relationship:											                                                                                                                                                                 
                </th>
                <td colspan="1" style="border-left:none !important;font-size:13px;"><?php echo $result->fin_relationship?></td>
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
                <th class="ecc_stu_name" style="width: 10%;border-right:none !important;border-top:none !important;border-bottom:none !important;font-size:13px;">				
                   Address:
                </th>
                <td  colspan="7" style="width:100%;border-left:none !important;text-align:left;border-top:none !important;border-bottom:none !important;font-size:13px;"><?php echo $result->fin_address?></td>
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
			  <th style="width: 10%;border-right:none !important;font-size:13px;">Phone Number:</th>
			  <td colspan="3" style="width: 30%;border-left:none !important;font-size:13px;"><?php echo $result->tel?></td>
              <th style="width: 10%;border-right:none !important;font-size:13px;">Email:</th>
			  <td colspan="3" style="width: 30%;border-left:none !important;font-size:13px;"><?php echo $result->email?></td>
            </tr>
        </table>
        <table style="width: 100%;">
            <tr>
			  <th style="width: 15%;border-right:none !important;border-top:none !important;border-bottom:none !important;font-size:13px;">Occupation:</th>
			  <td colspan="3" style="width: 30%;border-left:none !important;border-top:none !important;border-bottom:none !important;font-size:13px;"><?php echo $result->fin_occupation?></td>
              <th style="width: 15%;border-right:none !important;border-top:none !important;border-bottom:none !important;font-size:13px;">Work Place:</th>
			  <td colspan="3" style="width: 30%;border-left:none !important;border-top:none !important;border-bottom:none !important;font-size:13px;"><?php echo $result->fin_work_place?></td>
            </tr>
        </table>
            <table style="width: 100%;">
            <tr>
                <th  rowspan="2" class="ecc_stu_name" style="width: 15%;border-right:none !important;font-size:13px;">Annual Income:</th>
                <td  rowspan="2" style="text-align:left;border-left:none !important;font-size:13px;"><?php echo $result->fin_annual_income?></td>
                <th style="width:40%;border-right:none !important;font-size:13px;border-bottom: none !important;">The amount of saving  which can be proved:</th>
                <td colspan="1" style="border-left:none !important;font-size:13px;"><?php echo $result->amount_of_saving_which_proved?></td>
                <th rowspan="2" style="width:20%;border-right:none !important;font-size:13px;">Start of work date:</th>
                <td rowspan="2" colspan="1" style="border-left:none !important;font-size:13px;"><?php echo $result->start_work_date?></td>
            </tr>
            <tr style="border-top: none !important;">
                <th style="width:40%;border-right:none !important;font-size:13px;">The amount of saving  for study abroad:</th>
                <td colspan="1" style="border-left:none !important;font-size:13px;"><?php echo $result->amount_saving_for_study_abroad?></td>
            </tr>
        </table>
    </div>																
</section>
<br><br>
<section class="personal-info" style="width:100%;">
<h4 style="width:500px;float:left;margin:0px;font-family: 'Open Sans',sjis,sans-serif;font-size:13px;">Family in Japan (Father, Mother, Spouse, Child, Brother and Sisters, or Others) :</h4>
<p style="width:100px;float:left;font-size:13px;font-weight:bold;"><?php if($result->family_in_japan == '1'){echo 'Yes';}else{echo 'No';}?></p>	
    <p style="padding: 0px;margin:0px;width:400px;float:left;font-size:13px;">If yes, fill in all the family members in Japan.</p>
    <p style="padding: 0px;margin:0px;width:400px;float:left;font-size:13px;">Are you planning to stay with them in Japan? :  <?php if($result->ja_plan_to_stay_with_them == '1'){echo 'Yes';}else{echo 'No';}?></p>
    <section class="personal-info" style="width:100%;">
    <div class="personal" style="width: 100%;display:inline-block;">	
    <table style="width:100%;" class="tbl">
        <thead style="padding:1px;">
            <tr class="text-center" style="background-color:#ffffff;">
                <th scope="col" style="width:20%;text-align:center;font-size:13px;" >Name</th>
                <th scope="col" style="width:10%;text-align:center;font-size:13px;">Age</th>
                <th scope="col" style="width:10%;text-align:center;font-size:13px;">Relationship</th>
                <th scope="col" style="width:10%;text-align:center;font-size:13px;">Nationality </th>
                <th scope="col" style="width: 10%;text-align:center;font-size:13px;">Visa Status</th>
                <th scope="col" style="width: 10%;text-align:center;font-size:13px;" >Work Place</th>
            </tr>
        </thead>
        <tbody id="">
        <?php
          foreach($result7 as $row7){
        ?> 
           <tr>
                <td style="font-size: 11px; text-align: left;font-size:13px;height:24px;"><?php echo $row7->ja_fam_name?></td>
                <td style="font-size: 12px; text-align: left;font-size:13px;height:24px;"><?php echo $row7->ja_fam_age?></td>
                <td style="font-size: 11px; text-align: left;font-size:13px;height:24px;"><?php echo $row7->ja_fam_relationship?></td>
                <td style="font-size: 11px; text-align: left;font-size:13px;height:24px;"><?php echo $row7->ja_fam_nationality?></td>
                <td style="font-size: 11px; text-align: left;font-size:13px;height:24px;"><?php echo $row7->ja_fam_visa_status?></td>
                <td style="font-size: 11px; text-align: left;font-size:13px;height:24px;"><?php echo $row7->ja_fam_work_place?></td>
            </tr>
        <?php }
        ?>
            <!-- <tr>
                <td style="font-size: 11px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 12px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;font-size:13px;">-</td>
            </tr>
            <tr>
                <td style="font-size: 11px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 12px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;font-size:13px;"></td>
                <td style="font-size: 11px; text-align: left;font-size:13px;">-</td>
            </tr> -->
        </tbody>
    </table>
    </div>
</section>
</body>
</html>


</html>';