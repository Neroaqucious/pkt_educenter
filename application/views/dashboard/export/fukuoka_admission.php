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
            <dt style="width:100px;float:left;">
            <img src="asset/admin/images/fukuok-admiss-logo.png">
            </dt>
            <dd style="width:75%;float:right;">
                <h2 style="font-family: sjis;margin-bottom:10px;text-align:left;">九州外国語学院 <span style="font-size: 12px;">Kyushu Foreign Language Academy　福岡本校 ・ 東京日本橋校</span></h2>
                <h2 style="font-family: sjis;margin-bottom:0px;text-align:center;">入　学　願　書 <span style="font-size: 14px;">Application for Admission</span></h2></dd>
        </dl>
</section>
<section class="address" style="width:100%;margin-top:10px;">
		<table style="width:100%;">
		<tr style="border-bottom:0px;">
			<td style="width: 80%;">
            1  志望学科　Name of Course　* 東京日本橋校は4月期（2年,1年）と10月期（1.5年）のみ。</td>
            <td rowspan="8" style="width: 20%;vertical-align: text-top;line-height:20px;">
            <?php if(!empty($result->image_file)) { ?>
              <img style="width:15%"; src="<?php echo base_url('upload/assets/adm/usr/'.$result->image_file); ?>"  class="pb-1">
            <?php } ?>
            </td>
        </tr>
        <tr style="border-top: 0px;border-bottom:0px;">                                                    
            <td>
            <input type="checkbox" id="select_name_of_course" name="select_name_of_course" value="進学２年コ－ス" style="float:left;" <?php if($result9->select_name_of_course == '進学２年コ－ス') { echo "checked='checked'"; }?>> 
            <label for="select_name_of_course" style="font-size:13px;">進学２年コ－ス　　　　　２－Year course  　　　　　 ２０<span style="font-size:13px;"><?php if($result9->twyrs_crs_start_date == ''){echo '___';}else if($result9->select_name_of_course == '進学２年コ－ス'){echo $result9->twyrs_crs_start_date;}else{echo '___';} ?></span> 年０４月 -- ２０<span style="font-size:13px;"><?php if($result9->twyrs_crs_end_date == ''){echo '___';}else if($result9->select_name_of_course == '進学２年コ－ス'){echo $result9->twyrs_crs_end_date;}else{echo '___';} ?></span> 年０３月</label>
            </td>
        </tr>
        <tr style="border-top: 0px;border-bottom:0px;">
            <td>
            <input type="checkbox" id="select_name_of_course" name="select_name_of_course" value="進学1年9ヶ月コ－ス" style="float:left;" <?php if($result9->select_name_of_course == '進学1年9ヶ月コ－ス') { echo "checked='checked'"; }?>> 
            <label for="select_name_of_course">進学1年9ヶ月コ－ス　　 1 Year and 9 Months course　２０<span style="font-size:13px;"><?php if($result9->onenine_crs_start_date == ''){echo '___';}else if($result9->select_name_of_course == '進学1年9ヶ月コ－ス'){echo $result9->onenine_crs_start_date;}else{echo '___';}?></span>年０７月 -- ２０<span style="font-size:13px;"><?php if($result9->onenine_crs_end_date == ''){echo '___';}else if($result9->select_name_of_course == '進学1年9ヶ月コ－ス'){echo $result9->onenine_crs_end_date;}else{echo '___';} ?></span>年０３月</label>
            </td>
        </tr>
        <tr style="border-top: 0px;border-bottom:0px;">
            <td>
            <input type="checkbox" id="select_name_of_course" name="select_name_of_course" value="進学１.５年コ－ス" style="float:left;" <?php if($result9->select_name_of_course == '進学１.５年コ－ス') { echo "checked='checked'"; }?>> 
            <label for="select_name_of_course">進学１.５年コ－ス　　　　 1.5－Year course　　　　　２０<span style="font-size:13px;"><?php if($result9->onefive_crs_start_date == ''){echo '___';}else if($result9->select_name_of_course == '進学１.５年コ－ス'){echo $result9->onefive_crs_start_date;}else{echo '___';} ?></span>年１０月 -- ２０<span style="font-size:13px;"><?php if($result9->onefive_crs_end_date == ''){echo '___';}else if($result9->select_name_of_course == '進学１.５年コ－ス'){echo $result9->onefive_crs_end_date;}else{echo '___';}?></span> 年０３月</label>
            </td>
        </tr>
        <tr style="border-top: 0px;border-bottom:0px;">
            <td>
            <input type="checkbox" id="select_name_of_course" name="select_name_of_course" value="進学1年3ヶ月コ－ス" style="float:left;" <?php if($result9->select_name_of_course == '進学1年3ヶ月コ－ス') { echo "checked='checked'"; }?>> 
            <label for="select_name_of_course">進学1年3ヶ月コ－ス　　 1 Year and 3 Months course　２０<span style="font-size:13px;"><?php if($result9->onethree_crs_start_date == ''){echo '___';}else if($result9->select_name_of_course == '進学1年3ヶ月コ－ス'){echo $result9->onethree_crs_start_date;}else{echo '___';}?></span>年０１月 -- ２０<span style="font-size:13px;"><?php if($result9->onethree_crs_end_date == ''){echo '___';}else if($result9->select_name_of_course == '進学1年3ヶ月コ－ス'){echo $result9->onethree_crs_end_date;}else{echo '___';}?></span> 年０３月</label>
            </td>
        </tr>
        <tr style="border-top: 0px;border-bottom:0px;">
            <td>
            <input type="checkbox" id="select_name_of_course" name="select_name_of_course" value="進学１年コ－ス" style="float:left;" <?php if($result9->select_name_of_course == '進学１年コ－ス') { echo "checked='checked'"; }?>>
            <label for="vehicle1">進学１年コ－ス　　　　　１－Year course  　　　　　 ２０<span style="font-size:13px;"><?php if($result9->one_crs_start_date == ''){echo '___';}else if($result9->select_name_of_course == '進学１年コ－ス'){echo $result9->one_crs_start_date;}else{echo '___';}?></span> 年０４月 -- ２０<span style="font-size:13px;"><?php if($result9->one_crs_end_date == ''){echo '___';}else if($result9->select_name_of_course == '進学１年コ－ス'){echo $result9->one_crs_end_date;}else{echo '___';}?></span> 年０３月</label>
            </td>
        </tr>        
        <tr style="width: 80%;border-bottom:0px;"> 
			<td style="width: 80%;border-bottom:0px;">2  氏名 (漢字 or カタカナ)  In Kanji or Katakana
            <span>　　　　　 <?php echo $result->applicant_name_kanji?></span>
            </td>
        </tr>
        <tr style="width: 80%;border-top:0px;border-bottom:0px;"> 
			<td style="width: 80%;border-top:0px;padding:15px;">英字  In Roman Letters 
            <span>　　　　　 <?php echo $result->applicant_name?></span>
            </td>
        </tr>
         
        </table>
		
</section>	
<section class="family-japan">
    <div class="clearfix mb-5"></div>
    <table style="width:100%; padding_top:20px" class="tbl">
                                
        <tr class="text-center" style="font-size: 12px;">
            <th scope="col" colspan="3" style="text-align:left;border-right:0px;">3  生年月日<br>Date of Birth
            </th>
            <th scope="col" colspan="3" style="text-align:left;border-left:0px;">
                <span style="font-weight:normal;"><?php echo $splitted = date('Y', strtotime($result->date_of_birthday));?>年　<?php echo $splitted = date('m', strtotime($result->date_of_birthday));?>月　<?php echo $splitted = date('d', strtotime($result->date_of_birthday));?>日</span>
            </th>
            <th scope="col" colspan="3" class="align-middle" style="text-align:left;">4  出生地Place of Birth <br>
                <span style="font-weight:normal;"><?php echo $result->place_birth?></span>
            </th>
            <th scope="col" colspan="2" style="text-align:left;">5  国籍Nationality<br>
                <span style="font-weight:normal;"><?php echo $result->info_nationality?></span>
            </th>                                   
        </tr>
        <tr style="border-top:none;border-bottom:none;">
                <th colspan="1" style="text-align:left;border-right:0px;">6 性别 <br>Sex
                </th>
                <td style="text-align:left;border-left:0px;border-right:0px;">  
                    <input type="checkbox" id="gender" name="gender" value="1" style="float:left;" <?php if($result->gender== '1'){ echo "checked='checked'"; } ?>> 
                    <br><label for="gender">男Male</label>
                </td>   
                <td style="text-align:left;border-left:0px;border-right:0px;">  
                    <input type="checkbox" id="gender" name="gender" value="0" style="float:left;" <?php if($result->gender== '0'){ echo "checked='checked'"; } ?>> 
                    <br><label for="gender">女Female </label>     
                </td>
                <th scope="col" colspan="1" style="text-align:left;border-right:0px;">7 婚姻関係 <br>Marital
                </th>
                <th colspan="1" style="text-align:left;border-left:0px;border-right:0px;">  
                    <input type="checkbox" id="martial_status" name="martial_status" value="1" style="float:left;"  <?php if($result->martial_status== '1'){ echo "checked='checked'"; } ?>> 
                    <br><label for="martial_status">未婚Single</label>
                </th>
                <th colspan="1" style="text-align:left;border-left:0px;">
                    <input type="checkbox" id="martial_status" name="martial_status" value="0" style="float:left;" <?php if($result->martial_status== '0'){ echo "checked='checked'"; } ?>> 
                    <br><label for="martial_status"> 既婚Married </label>
                </th>
                <th colspan="3" scope="col" class="align-middle" style="text-align:cenleftter;">8  職業 <br>Occupation 
                    <span style="font-weight:normal;"><?php echo $result->occupation?></span>
                </th>
                <th colspan="2" scope="col" class="align-middle" style="text-align:cenleftter;">9  小学校入学年龄 <br>Entrance Age to　Elementary School<br>
                    <span>満　<?php echo $result->entry_age_ele_school?>　　歳 </span>
                </th>
               
                     
            </tr>
            <tr style="border-bottom:0px;"> 
                <th colspan="11" style="width: 100%;border-bottom:0px;">10  現住所Present Address　　　　　                   
                    <span style="font-weight:normal;"><?php echo $result->address?></span>
                </th>
            </tr>
            <tr  style="width: 100%;border-top:0px;">
                <td colspan="11" style="text-align: right;border-bottom:0px;">電話 Phone <span><?php echo $result->info_phone?></span></td>
            </tr>
    </table>                  
</section>

<section class="edu-background">	
                        <table style="width:100%;" class="tbl">
                                <tr style="border-top:0px;"> 
                                    <th colspan="5" style="width: 100%;">11 学  歴(小学校から初めて順に記入すること)Educational Background (List in order all the schools ,starting with the elementary school)                   
                                        <span></span>
                                    </th>
                                </tr>
                                <tr class="text-center" style="font-size: 12px;text-align:center;">
                                    <th scope="col" style="width:25% !important;text-align:center;">学 校 名<br> Name of School</th>
                                    <th scope="col" class="align-middle" style="width: 40%;text-align:center;">所在地 <br>Address</th>
                                    <th scope="col" style="width: 10%;border-left: none;text-align:center;">年　数<br> Years</th>
                                    <th scope="col" style="width: 25%;text-align:center;">修学期間<br>Period</th>
                                </tr>
                                
                                <?php
                                foreach($result1 as $row1){
                                ?>
                                    <tr>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row1->edu_name?></td>
                                        <td style="font-size: 12px; text-align: center;"><?php echo $row1->address?></td>
                                        <td style="font-size: 11px; text-align: center;border-left: none;"><?php echo $row1->year?></td>
                                        <td style="font-size: 11px; text-align: left;">
                                       
                                        自from <span><?php if($splitted == date('Y', strtotime($row1->start_date))){echo'-';}else{echo $splitted = date('Y', strtotime($row1->start_date));}?></span> 年 <span><?php if($splitted == date('m', strtotime($row1->start_date))){echo'-';}else{echo $splitted = date('m', strtotime($row1->start_date));}?></span> 月 <br>
                                        至to   <span><?php if($splitted == date('Y', strtotime($row1->end_date))){echo'-';}else{echo $splitted = date('Y', strtotime($row1->end_date));}?></span> 年 <span><?php if($splitted == date('m', strtotime($row1->end_date))){echo'-';}else{echo $splitted = date('m', strtotime($row1->end_date));}?></span> 月 
                                        </td>
                                    </tr>
                                <?php } ?>
                        </table>                     
</section>
<section class="edu-background">	
                        <table style="width:100%;" class="tbl">
                                <tr style="border-top:0px;"> 
                                    <th colspan="5" style="width: 100%;">12 日本語学習歴  Previous Study of Japanese               
                                    </th>
                                </tr>
                                <tr class="text-center" style="font-size: 12px;text-align:center;">
                                    <th scope="col" style="width:25% !important;text-align:center;">日本語教育機関名 <br>Name of Institution</th>
                                    <th scope="col" class="align-middle" style="width: 40%;text-align:center;">所在地 <br>Address</th>
                                    <th scope="col" style="width: 10%;border-left: none;text-align:center;">年　数<br> Years</th>
                                    <th scope="col" style="width: 25%;;text-align:center;">修学期間<br>Period</th>
                                </tr>
                                <?php
                                foreach($result2 as $row2){
                                ?>
                                    <tr>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row2->jp_name?></td>
                                        <td style="font-size: 12px; text-align: center;"><?php echo $row2->address?></td>
                                        <td style="font-size: 11px; text-align: center;border-left: none;"><?php echo $row2->hour?></td>
                                        <td style="font-size: 11px; text-align: left;">
                                        自from <span><?php echo $splitted = date('Y', strtotime($row2->start_date));?></span> 年 <span><?php echo $splitted = date('m', strtotime($row2->start_date));?></span> 月 <br>
                                        至to   <span><?php echo $splitted = date('Y', strtotime($row2->end_date));?></span> 年 <span><?php echo $splitted = date('m', strtotime($row2->end_date));?></span> 月 
                                        </td>
                                    </tr>
                                    <?php } ?>
                        </table>                     
</section>
<section class="edu-background">	
        <table style="width:100%;" class="tbl">
            <tr style="border-top:0px;"> 
                    <th colspan="5" style="width: 100%;">13日本語能力検定試験、J.TEST、BJTビジネス日本語能力テストなど <br>Japanese Language Test For example J.TEST·BJT·JLPT…            
                    </th>
            </tr>                                
            <tr class="text-center" style="font-size: 12px;border-top:0px;border-bottom:0px;">
                <th scope="col" style="text-align:right;width:25%;border-right:0px;">
                <span><?php echo $resultachiv->achiv_name?></span>
                級  
                </th>
                <th scope="col" class="align-middle" style="width:40%;text-align: left;"> 証書番号　Number <br>
                </th>
                <th scope="col" style="text-align:right;width:35%;"><?php echo $splitted = date('Y', strtotime($resultachiv->date_qualification));?>年　<?php echo $splitted = date('m', strtotime($resultachiv->date_qualification));?>月　<?php echo $splitted = date('d', strtotime($resultachiv->date_qualification));?>日取得  <br>
                </th>                                   
            </tr>
            <tr class="text-center" style="font-size: 12px;border-top:0px;">
                <th scope="col" style="text-align:right;width:25%;border-right:0px;"><?php echo $resultachiv->level?>Level
                </th>
                <th scope="col" class="align-middle" style="width:40%;text-align: right;"><?php echo $result9->jp_certificate_number?>号
                </th>
                <th scope="col" style="text-align:center;width:35%;">Date of Qualification
                </th>                                   
            </tr>
        </table>                     
</section>
<section class="edu-background">	
                        <table style="width:100%;" class="tbl">
                                <tr style="border-top:0px;"> 
                                    <th colspan="5" style="width: 100%;">14職歴（兵役含む）  Occupational Career　　　　　<span style="font-weight:normal;"><?php echo $result->occupation?>  </span>     
                                    </th>
                                </tr>
                                <tr class="text-center" style="font-size: 12px;text-align:center;">
                                    <th scope="col" style="width:25% !important;text-align:center;">勤務先 <br> Name of Employer</th>
                                    <th scope="col" class="align-middle" style="width: 40%;text-align:center;">所在地 <br>Address</th>
                                    <th scope="col" style="width: 10%;border-left: none;text-align:center;">職種 <br> Type of Work</th>
                                    <th scope="col" style="width: 25%;text-align:center;">修学期間<br>Period</th>
                                </tr>
                                <?php
                                foreach($result5 as $row5){
                                ?> 
                                    <tr>
                                        <td style="font-size: 11px; text-align: center;"><?php echo $row5->emp_name?></td>
                                        <td style="font-size: 12px; text-align: center;"><?php echo $row5->address?></td>
                                        <td style="font-size: 11px; text-align: center;border-left: none;"><?php echo $row5->job_description?></td>
                                        <td style="font-size: 11px; text-align: left;">
                                        自from <span><?php echo $splitted = date('Y', strtotime($row5->start_date));?></span> 年 <span><?php echo $splitted = date('m', strtotime($row5->start_date));?></span> 月 <br>
                                        至to   <span><?php echo $splitted = date('Y', strtotime($row5->end_date));?></span> 年 <span><?php echo $splitted = date('m', strtotime($row5->end_date));?></span> 月 
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    
                        </table>                     
</section>
<section class="edu-background">
                        <table style="width:100%;" class="tbl">
                        <tr style="border-top:0px;border-bottom:none;"> 
                                    <th colspan="5" style="width: 100%;">15 過去日本に留学申請歴（不交付,取下げ,交付後の未入国を含む）   Did you apply before in Japan ?  </th>
                        </tr>                      
                        <tr style="border-top:none;border-bottom:none;">
                        
                            <td style="width: 50%;border:none;">				
                            <input type="checkbox" id="school_apply_before_japan" name="school_apply_before_japan" value="1" style="width: 50%;float:left;" <?php if($result->school_apply_before_japan== '1'){ echo "checked='checked'"; } ?>>
                            <label>
                               有 Yes  ·いつですか   When？ </label>
                            </td>
                            <td colspan="4" style="border:none;">
                            <?php echo $result->school_apply_date?>
                            </td>
                        </tr>
                        <tr style="border-top:none;border-bottom:none;">
                            <td style="width: 50%;border:none;">　　·どんなビザですか  Status？ </td>
                            <td colspan="4" style="border:none;">
                            <?php echo $result->school_apply_status?>
                            </td>
                        </tr>
                        <tr style="border-top:none;border-bottom:none;">
                            <td style="width: 50%;border:none;">　　·どこの学校(校名)　Name of school    </td>
                            <td colspan="4" style="border:none;">
                            <?php echo $result->school_apply_name?>
                            </td>
                        </tr>
                        <tr style="border-top:none;border-bottom:none;">
                            <td style="width: 50%;border:none;">　　·どこの入国管理局ですか  Which one？</td>
                            <td colspan="4" style="border:none;">
                            <?php echo $result->immigration_office?>
                            </td>
                        </tr>
                       
                        <tr style="border-top:none;border-bottom:none;">
                            <td style="width: 50%;border:none;">　　·審査結果はどうでしたか  Result？</td>
                            <td colspan="4" style="border:none;">
                         
                            </td>
                        </tr>
                        <tr style="border-top:none;border-bottom:none;">
                            <td colspan="5" style="border:none;">
                            　　　　<input type="checkbox" id="vehicle1" name="vehicle1" value="交付" style="width: 50%;float:left;" <?php if($result->immigration_result== '交付'){ echo "checked='checked'"; } ?>>
                            <label for="vehicle1">交付</label>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="不交付" style="width: 50%;float:left;" <?php if($result->immigration_result== '不交付'){ echo "checked='checked'"; } ?>>
                            <label for="vehicle1"> 不交付 </label>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="取下げ" style="width: 50%;float:left;" <?php if($result->immigration_result== '取下げ'){ echo "checked='checked'"; } ?>>
                            <label for="vehicle1">取下げ</label>
                            <input type="checkbox" id="vehicle1" name="vehicle1" value="交付後の未入国" style="width: 50%;float:left;" <?php if($result->immigration_result== '交付後の未入国'){ echo "checked='checked'"; } ?>>
                            <label for="vehicle1">交付後の未入国</label>
                            </td>                         
                        </tr>
                        <tr style="border-top:none;border-bottom:none;">
                        <td colspan="5" style="border-top:none;">　　　　Reasons(                                                            )</td>
                        </tr>
                        <tr style="border-top:none;">
                                    <th style="width: 50%;border:none;">				
                                    <input type="checkbox" id="school_apply_before_japan" name="school_apply_before_japan" value="school_apply_before_japan" style="width: 50%;float:left;" <?php if($result->school_apply_before_japan== '0'){ echo "checked='checked'"; } ?>>
                                    <label for="vehicle1"> 無 No </label>
                                    </th>
                                    <td colspan="4" style="border:none;">
                                    </td>
                                </tr>
                        </table>                     
</section>
<section class="edu-background">	
                        <table style="width:100%;" class="tbl">
                                <tr style="border-top:0px;"> 
                                    <th colspan="5" style="width: 100%;">16 日本滞在歴（三ヶ月以内の短期滞在及び家族滞在含む全て）　Have you ever been japan (Including 3 moth short visa)    
                                </th>
                                </tr>
                                <tr class="text-center" style="font-size: 12px;text-align:center;">
                                    <th scope="col" style="width:20% !important;text-align:center;">入国目的 <br>Purpose</th>
                                    <th scope="col" class="align-middle" style="width: 20%;text-align:center;">在留資格 <br>Status</th>
                                    <th scope="col" style="width: 40%;border-left: none;text-align:center;">在留期間 <br> Period of Stay</th>
                                    <th scope="col" style="width: 20%;text-align:center;">備  考</th>
                                </tr>
                                <?php
                                foreach($result10 as $row10){
                                ?> 
                                <tr>
                                        <td style="font-size: 11px; text-align: left;"><?php echo $row10->shortVisa_purpose?></td>
                                        <td style="font-size: 12px; text-align: left;"><?php echo $row10->shortVisa_status?></td>
                                        <td style="font-size: 11px; text-align: left;border-left: none;">
                                        自from <span><?php echo $splitted = date('Y', strtotime($row10->shortVisa_period));?></span> 年 <span><?php echo $splitted = date('m', strtotime($row10->shortVisa_period));?></span> 月 <br>
                                        至to   <span><?php echo $splitted = date('Y', strtotime($row10->shortVisa_period));?></span> 年 <span><?php echo $splitted = date('m', strtotime($row10->shortVisa_period));?></span> 月 
                                    </td>
                                        <td style="font-size: 11px; text-align: left;"><?php echo $row10->shortVisa_prepare?></td>
                                </tr>   
                                <?php } ?>                            
                        </table>                     
</section>
<section class="edu-background">	
                        <table style="width:100%;" class="tbl">
                        <tr style="border-top:0px;border-bottom:none;"> 
                                    <th colspan="5" style="width: 100%;font-size:14px;">17 旅券　Passport</th>
                        </tr>
                        <tr style="border-bottom:none;border-top:none;">
                            <td style="width: 25%;border:none;font-size:14px;">				
                            番号　Number
                            </td>
                            <td style="width: 25%;border:none;font-size:14px;">
                            <?php echo $result->passport_no?>
                            </td>
                            <td style="width: 25%;border:none;font-size:14px;">			
                            発行年月日Date of issue
                            </td>
                            <td style="width: 25%;border:none;font-size:14px;">
                            <?php echo $splitted = date('Y', strtotime($result->passport_data_issue));?>年　<?php echo $splitted = date('m', strtotime($result->passport_data_issue));?>月　<?php echo $splitted = date('d', strtotime($result->passport_data_issue));?>日
                            </td>
                        </tr>
                        <tr style="border-top:none;">
                            <td style="width: 25%;border:none;font-size:14px;">				
                            有効期限Date of expiry
                            </td>
                            <td style="width: 25%;border:none;font-size:14px;">
                            <?php echo $splitted = date('Y', strtotime($result->passport_data_exp));?>年　<?php echo $splitted = date('m', strtotime($result->passport_data_exp));?>月　<?php echo $splitted = date('d', strtotime($result->passport_data_exp));?>日
                            </td>
                            <td style="width: 25%;border:none;font-size:14px;">				
                            発行機関Authority
                            </td>
                            <td style="width: 25%;border:none;font-size:14px;">
                            <?php echo $result9->passport_issue_authority?>
                            </td>
                        </tr>
                        </table>                     
</section>
<section class="edu-background">	
                        <table style="width:100%;" class="tbl">
                                <tr style="border-top:0px;"> 
                                    <th colspan="5" style="width: 100%;font-size:14px;">18 家族(本人を中心に記入すること) Family members (showing the relation of each person to yourself ) </th>
                                </tr>
                                <tr class="text-center" style="font-size: 12px;text-align:center;">
                                    <th scope="col" style="width:20% !important;text-align:center;font-size:14px;">続柄 Relation</th>
                                    <th scope="col" class="align-middle" style="width: 25%;text-align:center;font-size:14px;">氏名　Name</th>
                                    <th scope="col" style="width: 10%;border-left: none;text-align:center;">年齢<br>Age</th>
                                    <th scope="col" style="width: 45%;text-align:center;font-size:14px;">現住所　 Address</th>
                                    <th scope="col" style="width: 10%;text-align:center;font-size:14px;">職業 Occupation</th>
                                </tr>
                                <?php
                                foreach($result6 as $row6){
                                ?> 
                                <tr>
                                    <td style="font-size: 11px; text-align: center;height:39px;font-size:14px;"><?php echo $row6->fam_relationship?></td>
                                    <td style="font-size: 12px; text-align: center;height:39px;font-size:14px;"><?php echo $row6->fam_name?></td>
                                    <td style="font-size: 11px; text-align: center;border-left: none;height:39px;font-size:14px;"><?php echo $row6->fam_age?></td>
                                    <td style="font-size: 11px; text-align: center;height:39px;font-size:14px;"><?php echo $row6->address?></td>
                                    <td style="font-size: 11px; text-align: center;height:39px;font-size:14px;"><?php echo $row6->occupation?></td>
                                </tr>
                                <?php } ?>
                        </table>  
                        <br>  <br>     <br>              
</section>
<section class="edu-background">	
                        <table style="width:100%;" class="tbl">
                                <tr> 
                                    <th colspan="8" style="width: 100%;">19 在日親族(父・母・配偶者・子・兄弟姉妹など)及び同居者  Relatives residing in Japan</th>
                                </tr>
                                <tr class="text-center" style="font-size: 12px;text-align:center;">
                                    <th scope="col" style="width:10% !important;text-align:center;">続柄 <br>Relation</th>
                                    <th scope="col" class="align-middle" style="width: 13%;text-align:center;">氏名　<br> Name</th>
                                    <th scope="col" style="width: 15%;border-left: none;text-align:center;">生年月日 <br> Date of Birth</th>
                                    <th scope="col" style="width: 12%;border-left: none;text-align:center;">国籍 <br>Nationality </th>
                                    <th scope="col" style="width: 25%;text-align:center;">勤務先 <br>Name of Employer</th>
                                    <th scope="col" style="width: 25%;text-align:center;">外国人登録証明書番号 <br> Certificate of Alien <br> Registration No.</th>
                                </tr>
                                <?php
                                foreach($result7 as $row7){
                                ?> 
                                <tr>
                                    <td style="font-size: 11px; text-align: center;height:39px;"><?php echo $row7->ja_fam_relationship?></td>
                                    <td style="font-size: 12px; text-align: center;height:39px;"><?php echo $row7->ja_fam_name?></td>
                                    <td style="font-size: 11px; text-align: center;border-left: none;height:39px;"><?php echo $row7->ja_fam_date_birth?></td>
                                    <td style="font-size: 11px; text-align: center;height:39px;"><?php echo $row7->ja_fam_nationality?></td>
                                    <td style="font-size: 11px; text-align: center;height:39px;"><?php echo $row7->ja_fam_name?></td>
                                    <td style="font-size: 11px; text-align: center;height:39px;"><?php echo $row7->ja_certificate_alien?></td>
                                </tr>
                                <?php } ?>
                        </table>                     
</section>
<section class="edu-background">	
                        <table style="width:100%;" class="tbl">
                        <tr style="border-top:0px;border-bottom:none;"> 
                                    <th colspan="5" style="width: 100%;">20 学費·生活費負担者   The person who pays tuition and other expenses  </th>
                        </tr>
                        <tr style="border-bottom:none;border-top:none;">
                            <th style="width: 10%;border:none;">				
                               氏名 <br> Name
                            </th>
                            <td style="width: 40%;border:none;">
                            <?php echo $result->fin_name?>
                            __________________________________________
                            </td>
                            <th style="width: 10%;border:none;">				
                              続柄 <br>Relation
                            </th>
                            <td style="width: 40%;border:none;">
                            <?php echo $result->fin_relationship?>
                            __________________________________________
                            </td>
                        </tr>
                        <tr style="border-top:none;">
                            <th style="width: 10%;border:none;">				
                              職業 <br> Occupation
                            </th>
                            <td style="width: 40%;border:none;">
                            <?php echo $result->fin_occupation?>
                            __________________________________________
                            </td>
                            <th style="width: 10%;border:none;">				
                              電話 <br>Telephone
                            </th>
                            <td style="width: 40%;border:none;">
                            <?php echo $result->tel?>
                            __________________________________________
                            </td>
                        </tr>
                        <tr style="">
                            <th style="width: 10%;border:none;">				
                              住所 <br> Address
                            </th>
                            <td colspan="4" style="border:none;">
                            <?php echo $result->address?>
                            ____________________________________________________________________________________
                            </td>
                        </tr>
                        </table>                     
</section>
<section class="edu-background">	
                        <table style="width:100%;">
                        <tr style="border-top:0px;border-bottom:none;"> 
                            <th colspan="5" style="width: 100%;font-size:15px;">21 本学卒業後の予定  Your plan after graduate from this school </th>
                        </tr>
                        <tr style="border-bottom:none;border-top:none;">
                            <td style="width: 40%;border:none;font-size:14px;">				
                                <input type="checkbox" id="specific_plans_after_graduating" name="specific_plans_after_graduating" value="Postgraduate Course" style="width: 50%;float:left;" <?php if($result->specific_plans_after_graduating == 'Postgraduate Course') { echo "checked='checked'"; }?>>
                                <label for="specific_plans_after_graduating"> Postgraduate Course</label>
                            </td>
                            <td style="width: 10%;border:none;"></td>
                            <td style="width: 40%;border:none;font-size:14px;">				
                                <input type="checkbox" id="specific_plans_after_graduating" name="specific_plans_after_graduating" value="Undergraduate Course" style="width: 50%;float:left;" <?php if($result->specific_plans_after_graduating == 'Undergraduate Course') { echo "checked='checked'"; }?>>
                                <label for="specific_plans_after_graduating"> 大学 Undergraduate Course </label>
                            </td>
                            <td style="width: 10%;border:none;"></td>
                        </tr>
                        <tr style="border-bottom:none;border-top:none;">
                            <td style="width: 40%;border:none;font-size:14px;">				
                                <input type="checkbox" id="specific_plans_after_graduating" name="specific_plans_after_graduating" value="Junior College" style="width: 50%;float:left;" <?php if($result->specific_plans_after_graduating == 'Junior College') { echo "checked='checked'"; }?>>
                                <label for="specific_plans_after_graduating"> 短大  Junior College    </label>
                            </td>
                            <td style="width: 10%;border:none;"></td>
                            <td style="width: 40%;border:none;font-size:14px;">				
                                <input type="checkbox" id="specific_plans_after_graduating" name="specific_plans_after_graduating" value="Professional School" style="width: 50%;float:left;" <?php if($result->specific_plans_after_graduating == 'Professional School') { echo "checked='checked'"; }?>>
                                <label for="specific_plans_after_graduating"> 専門学校  Professional School</label>
                            </td>
                           <td style="width: 10%;border:none;"></td>
                        </tr>
                        <tr style="border-top:none;width:100%;">
                            <td style="width: 20%;border:none;font-size:14px;">学 校 名 Name of school</th>
                            <td style="width: 20%;border:none;font-size:14px;"><?php echo $result->specific_plan_school_name?></td>
                            <td style="width: 20%;border:none;font-size:14px;">				
                            課　程 Course
                            </th>
                           <td style="width: 30%;border:none;font-size:14px;"><?php echo $result->specific_plan_type_schools?></td>
                        </tr>
                        </table>                     
</section>
<section class="edu-background">	
                    <table style="width:100%;" class="tbl">
                        <tr style="border-top:0px;border-bottom:none;"> 
                            <th colspan="5" style="width: 100%;font-size:12px;">22  留学理由書 Purpose of Studying Japanese 
                            <br>
                                <p> 日本語を学ぶ目的(詳しく)  </p><br>
                                <span style="width: 100%;font-weight:normal;"><?php echo $result->purpose_studying_in_japanese?></span>
                            </th>
                        </tr>
                        <tr style="border-top:0px;"> 
                            <td style="width: 100%;font-size:19px;">
                        </tr>
                    </table>                     
</section>
<section class="edu-background">	
                        <table style="width:100%;" class="tbl">
                        <tr style="width:100%;margin:0 auto;border-top:0px;border-bottom:none;"> 
                                <td colspan="5" style="line-height:20px;letter-spacing: 1px;">
                                <p style="width:100%;padding-left:100px;">　　　上記のとおり相違ありません。I hereby declare the above statement is true and correct.<br>
                                　　　</p>
                                <p>　　　I swear to abide Japanese law and schools’ rule after I obtain permission of Japan entrance.</p>
                                </td>
                        </tr>
                        <tr style="width:80%;margin:0 auto;border-top:none;border-bottom:none;">
                            <!-- <th colspan="1" style="border:none;"></th> -->
                            <td colspan="2" style="border:none;padding-left:85px;">				
                            申請日Date of Application
                            </td>
                            <td colspan="3" style="border:none;padding-left:50px;"><?php echo $splitted = date('Y', strtotime($result->register_date));?>年　　<?php echo $splitted = date('m', strtotime($result->register_date));?>月　　<?php echo $splitted = date('d', strtotime($result->register_date));?>日
                                <br> 　　year　　month　　day
                            </td>
                        </tr>
                        <tr style="width:100%;margin:0 auto;border-bottom:none;border-top:none;">
                            <!-- <th colspan="1" style="border:none;"></th> -->
                            <td colspan="3" style="border:none;padding-left:85px;">				
                            申請人署名　 Signature of Applicant
                            </td>
                            <td colspan="3" style="border:none;"></td>
                        </tr>
                        <tr style="width:100%;margin:0 auto;border-top:none;">
                        <th colspan="5" style="border:none;float:right;text-align:center;padding-bottom:20px;"> 
                            <?php if(!empty($result->image_file)) { ?>
                             <img style="width:15%"; src="<?php echo base_url('upload/assets/adm/usr/'.$result->sign_file); ?>" width="100px;" class="pb-1">
                            <?php } ?>
                        </th>
                        </tr>
                        </table>                     
</section>
<p>（各項目を必ず記入すること。空白の場合は該当内容はないものと見なす。用紙不足の場合は別紙利用可 ） </p>
</body>
<style>
    body {
                    font-size: 12px;
                    color: #111;
                    font-weight: normal;
                    /* font-family:firefly, DejaVu Sans, sans-serif;
                    font-family: "ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", Osaka, メイリオ, Meiryo, "ＭＳ Ｐゴシック", "MS PGothic", "ＭＳ ゴシック" , "MS Gothic", "Noto Sans CJK JP", TakaoPGothic, sans-serif; */
                    /* font-family: "Lucida Console", "Courier New", monospace;*/               
                    /* font-family: sjis; */
                    font-family: "MS 明朝",sjis,serif; 
                    /* font-family: "Gothicbi", sjis, sans-serif; */
                    /* font-family: 'Open Sans', sans-serif; */
                    line-height: 20px;
                    letter-spacing: 1px;
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
