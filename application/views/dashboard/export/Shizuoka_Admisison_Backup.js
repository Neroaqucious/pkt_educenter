function myFunctions() {
    let sheetData = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('Function');
    let siteUrl = sheetData.getRange("B2").getValue();
    let response = UrlFetchApp.fetch(siteUrl); /* get order request */
   /* get regular order request */
    let json = response.getContentText();
    let data = JSON.parse(json);
    let data1 = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('shizuoka_admission1');
    let data2 = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('shizuoka_admission2');
    let data3 = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('shizuoka_admission3');
    let data4 = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('shizuoka_admission4');
    let data5 = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('shizuoka_admission5');
    let data6 = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('shizuoka_admission6');
    let data7 = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('shizuoka_admission7');
    let data8 = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('shizuoka_admission8');
    let data9 = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('shizuoka_admission9');
    let schoolData = [];
    let schoolObject = {};
    
    let i = 0; let k = 0;
    let l = 0;
    let j = 0;
    const applicantData = data['applicant_info'];
    const otherDetailData = data['other_details'];
    const financialSponsorData = data['financial_sponsor'];
    const educationalHistoryData = data['educational_history'];
    const prevJpLangStudyData = data['previous_jp_lang_study'];
    const achievementJpLangTestData = data['achievement_jp_lang_test'];
    const testNameData = data['name_jp_lang_tests_going_to_take'];
    const historyEmploymentData = data['history_employment'];
    const familyMemberData = data['family_member'];
    const familyInJpData = data['family_in_japan'];
    const prevStayInJpData = data['previous_stay_in_japan']
    const otherInfoData = data['other_info'];
    const everBeenJapan = data['ever_been_japan'];
    applicantData.forEach((applicantElement) => {
      data1.getRange(16,6).setValue(applicantElement["applicant_name"]);
      data2.getRange(5,11).setValue(applicantElement["applicant_name"]);
      data9.getRange(26,15).setValue(applicantElement["applicant_name"]);
      data5.getRange(11,22).setValue(applicantElement["applicant_name"]);
      // data1.getRange(6,3).setValue(applicantElement["applicant_name_kanji"]);

      var dateofbirthday = applicantElement["date_of_birthday"];
      var year2 = +dateofbirthday.substring(0, 4)
      var month2 = +dateofbirthday.substring(5, 7)
      var passday2 = +dateofbirthday.substring(8,10)
      data1.getRange(20,29).setValue(year2);      
      data1.getRange(20,37).setValue(month2);      
      data1.getRange(20,41).setValue(passday2); 

      data2.getRange(8,28).setValue(year2);      
      data2.getRange(8,23).setValue(month2);      
      data2.getRange(8,17).setValue(passday2);   

      data9.getRange(32,14).setValue(year2);      
      data9.getRange(32,21).setValue(month2);      
      data9.getRange(32,26).setValue(passday2);   

      data5.getRange(14,16).setValue(year2);      
      data5.getRange(14,24).setValue(month2);      
      data5.getRange(14,31).setValue(passday2);   

      // data1.getRange(12,4).setValue(applicantElement["province"]);
      data1.getRange(23,9).setValue(applicantElement["info_nationality"]);
      data2.getRange(8,42).setValue(applicantElement["info_nationality"]);
      data9.getRange(32,38).setValue(applicantElement["info_nationality"]);
      data5.getRange(8,22).setValue(applicantElement["info_nationality"]);
      data1.getRange(23,36).setValue(applicantElement["province"]);
      data1.getRange(23,44).setValue(applicantElement["place_birth"]);
      data1.getRange(31,12).setValue(applicantElement["address"]);
      data2.getRange(11,17).setValue(applicantElement["address"]);
      data1.getRange(37,12).setValue(applicantElement["family_address"]);
      data1.getRange(37,12).setValue(applicantElement["family_address"]);
      data1.getRange(40,15).setValue(applicantElement["family_tel"]);
      data1.getRange(40,32).setValue(applicantElement["family_mail"]);
      data1.getRange(34,32).setValue(applicantElement["std_email"]);
      data2.getRange(18,17).setValue(applicantElement["std_email"]);
      data1.getRange(34,15).setValue(applicantElement["info_phone"]);
      data2.getRange(15,21).setValue(applicantElement["info_phone"]);
      data1.getRange(20,46).setValue(applicantElement["info_age"]);
      data1.getRange(47,16).setValue(applicantElement["current_status_school_name"]);
      // data1.getRange(19,1).setValue(applicantElement["occupation"]);
      data1.getRange(19,3).setValue(applicantElement["place_employment_school"]);
      // data1.getRange(22,1).setValue(applicantElement["addr_employment_school"]);
      // data1.getRange(24,6).setValue(applicantElement["tel_employment_school"]);
      // data1.getRange(25,7).setValue(applicantElement["course_study_lengh"]);
      // data1.getRange(24,6).setValue(applicantElement["tel_employment_school"]);
      data1.getRange(76,25).setValue(applicantElement["passport_no"]);

      var passportdate = applicantElement["passport_data_issue"];
      var year = +passportdate.substring(0, 4)
      var month = +passportdate.substring(5, 7)
      var passday = +passportdate.substring(8,10)
      data1.getRange(78,25).setValue(passday);      
      data1.getRange(78,34).setValue(month);      
      data1.getRange(78,42).setValue(year);      
      
      var passportdate = applicantElement["passport_data_exp"];
      var year1 = +passportdate.substring(0, 4)
      var month1 = +passportdate.substring(5, 7)
      var passday1 = +passportdate.substring(8,10)
      data1.getRange(80,25).setValue(passday1);      
      data1.getRange(80,34).setValue(month1);      
      data1.getRange(80,42).setValue(year1);      

      // data1.getRange(25,5).setValue(applicantElement["course_study_lengh"]);
        if(applicantElement["gender"] == "F"){
          data1.getRange(20,6).setValue("Female");
        }
         if(applicantElement["gender"] == "F"){
          data6.getRange(17,32).setValue("Female");
        }
         //data1.getRange(20,6).setValue(applicantElement["gender"]);
      data6.getRange(13,44).setValue(applicantElement["info_age"]);
      data6.getRange(33,5).setValue(applicantElement["family_tel"]);
      data6.getRange(33,26).setValue(applicantElement["family_tel"]);
      
       console.log(applicantElement["passport_no"]);
    });
   
    otherDetailData.forEach((otherdetailsElement) => {
      data1.getRange(47,16).setValue(otherdetailsElement["current_status_school_name"]);
      data1.getRange(52,3).setValue(otherdetailsElement["current_status_school_major"]);
      data1.getRange(52,16).setValue(otherdetailsElement["current_status_school_grade"]);
      data1.getRange(52,29).setValue(otherdetailsElement["expected_month"]);
      data1.getRange(52,42).setValue(otherdetailsElement["expected_year"]);
      data4.getRange(7,3).setValue(otherdetailsElement["purpose_studying_in_japanese"]);

      var criminalrecord = otherdetailsElement["criminal_record_when"];
      console.log(criminalrecord);
      var year3 = +criminalrecord.substring(0, 4)
      var month3 = +criminalrecord.substring(5, 7)  
      data1.getRange(85,19).setValue(month3);      
      data1.getRange(85,14).setValue(year3);      

    });
    otherInfoData.forEach((otherInfoElement) => {
      data9.getRange(73,17).setValue(otherInfoElement["consent_name"]);
      data9.getRange(79,44).setValue(otherInfoElement["consent_relation"]);
      data9.getRange(83,10).setValue(otherInfoElement["consent_address"]);
      data9.getRange(87,10).setValue(otherInfoElement["consent_tel"]);
      data9.getRange(87,34).setValue(otherInfoElement["consent_email"]);
      data7.getRange(7,6).setValue(otherInfoElement["language_can_you_use"]);
      data7.getRange(16,6).setValue(otherInfoElement["you_are_good_subject"]);
      data7.getRange(25,6).setValue(otherInfoElement["special_ability"]);
      data7.getRange(34,6).setValue(otherInfoElement["hobbies"]);
      data7.getRange(43,6).setValue(otherInfoElement["what_todo_japan"]);
      data6.getRange(71,3).setValue(otherInfoElement["father_work_place"]);
      data6.getRange(76,3).setValue(otherInfoElement["type_work_father"]);
      data6.getRange(84,3).setValue(otherInfoElement["mother_work_place"]);
      data6.getRange(89,3).setValue(otherInfoElement["type_work_mother"]);
      data5.getRange(70,9).setValue(otherInfoElement["defraying_name"]);
      data5.getRange(73,9).setValue(otherInfoElement["defraying_address"]);
      data5.getRange(76,10).setValue(otherInfoElement["defraying_tel"]);
      data5.getRange(76,35).setValue(otherInfoElement["defraying_tel"]);
      data5.getRange(82,24).setValue(otherInfoElement["defraying_company"]);
      data5.getRange(85,13).setValue(otherInfoElement["defraying_work_tel"]);
      data5.getRange(42,29).setValue(otherInfoElement["six_tuition_fee"] + "yen");
      data5.getRange(45,29).setValue(otherInfoElement["first_year_tuitioin_fee"] + "yen (for the first year)");
      data5.getRange(47,29).setValue(otherInfoElement["second_year_tuitioin_fee"] + "yen (for the second year)");
      data5.getRange(50,38).setValue(otherInfoElement["tuition_study_period"] + "yen");
      data5.getRange(53,33).setValue(otherInfoElement["living_expense_amount"]);
      data5.getRange(26,4).setValue(otherInfoElement["defraying_details"]);
      data5.getRange(26,4).setValue(otherInfoElement["defraying_details"]);
      if(otherInfoElement["payment_method"]=="Bank Transfer (Overseas Remittance)"){
          data5.getRange(58,5).insertCheckboxes("Checked").check();
      }else  if(otherInfoElement["payment_method"]=="Credit Card"){
          data5.getRange(58,24).insertCheckboxes("Checked").check();
      }else{
          data5.getRange(58,34).insertCheckboxes("Checked").check();
      };
      if(otherInfoElement["defraying_relation"]=="father"){
          data5.getRange(79,18).insertCheckboxes("Checked").check();
      }else  if(otherInfoElement["defraying_relation"]=="mother"){
          data5.getRange(79,24).insertCheckboxes("Checked").check();
      }else  if(otherInfoElement["defraying_relation"]=="brother"){
          data5.getRange(79,30).insertCheckboxes("Checked").check();
      }else{
          data5.getRange(79,39).insertCheckboxes("Checked").check();
      };
      var defrayingdate = otherInfoElement["defraying_date"];
      console.log(defrayingdate);
      var year3 = +defrayingdate.substring(0, 4)
      var month3 = +defrayingdate.substring(5, 7)  
      var passday3 = +defrayingdate.substring(8,10)
      data5.getRange(88,32).setValue(year3); 
      data5.getRange(88,40).setValue(month3);     
      data5.getRange(88,47).setValue(passday3);

    });
  
    let eduCounter = 0;
    educationalHistoryData.forEach((eduData) => {
      console.log(eduData, eduCounter);
      data2.getRange((32 + eduCounter),2).setValue(eduData["edu_name"]);
      data2.getRange((32 + eduCounter),18).setValue(eduData["edu_address"]);
      data2.getRange((32 + eduCounter),39).setValue(eduData["edu_start_date"]);
      data2.getRange((34 + eduCounter),39).setValue(eduData["edu_end_date"]);
      data2.getRange((32 + eduCounter),49).setValue(eduData["edu_year"]);
      eduCounter++
    });
    let jpCounter = 0;
    achievementJpLangTestData.forEach((jpData) => {
       console.log(jpData, jpCounter);
       data2.getRange((84 +jpCounter),2).setValue(jpData["exam_year"]);
       data2.getRange((84 +jpCounter),13).setValue(jpData["achiv_name"]);
       data2.getRange((84 +jpCounter),43).setValue(jpData["level"]);
      jpCounter++
    });
    let empCounter = 0;
    historyEmploymentData.forEach((empData) => {
       console.log(empData, empCounter);
      data3.getRange((9 +empCounter),2).setValue(empData["emp_name"]);
      data3.getRange((9+empCounter),16).setValue(empData["emp_job_description"]);
      data3.getRange((9 +empCounter),24).setValue(empData["emp_address"]);

      var empstartdate = empData["emp_start_date"];
      var year2 = +empstartdate.substring(0, 4)
      var month2 = +empstartdate.substring(5, 7)
      data3.getRange((9 +empCounter),39).setValue(year2);      
      data3.getRange((9 +empCounter),34).setValue(month2); 

      var empenddate = empData["emp_end_date"];
      var year3 = +empenddate.substring(0, 4)
      var month3 = +empenddate.substring(5, 7)
      data3.getRange((9 +empCounter),48).setValue(year3);      
      data3.getRange((9 +empCounter),43).setValue(month3);     
      empCounter++
      //data3.getRange((9 +empCounter),34).setValue(empData["emp_start_date"]);
      //data3.getRange((9 +empCounter),43).setValue(empData["emp_end_date"]);     
    });
    let famCounter = 0;
    familyMemberData.forEach((famData) => {
       console.log(famData, famCounter);
      data6.getRange((44 +famCounter),3).setValue(famData["fam_name"]);
      data6.getRange((44 +famCounter),29).setValue(famData["fam_age"]);
      data6.getRange((44 +famCounter),15).setValue(famData["fam_relationship"]);
      data6.getRange((44 +famCounter),35).setValue(famData["occupation"]);
      if(famData["fam_gender"] == "Male"){
        data6.getRange((44 +famCounter),23).setValue("男");
      }else{
        data6.getRange((44 +famCounter),23).setValue("女");
      }
      //data6.getRange((44 +famCounter),23).setValue(famData["fam_gender"]);
      famCounter++
    });
    let jafamCounter = 0;
    familyInJpData.forEach((jafamData) => {
       console.log(jafamData, jafamCounter);
      data7.getRange((71 +jafamCounter),2).setValue(jafamData["ja_fam_name"]);
      data7.getRange((71 +jafamCounter),11).setValue(jafamData["ja_fam_date_birth"]);
      data7.getRange((71 +jafamCounter),17).setValue(jafamData["ja_fam_relationship"]);
      data7.getRange((71 +jafamCounter),22).setValue(jafamData["ja_fam_work_place"]);
      data7.getRange((71 +jafamCounter),34).setValue(jafamData["ja_fam_address"]);
      data7.getRange((71 +jafamCounter),44).setValue(jafamData["residence_card_no"]);
      jafamCounter++
    });
    let prestayCounter = 0;
    prevStayInJpData.forEach((prestayData) => {
       console.log(prestayData, prestayCounter);
      data3.getRange((27 +prestayCounter),4).setValue(prestayData["entry_purpose"]);
      data3.getRange((27 +prestayCounter),19).setValue(prestayData["pre_stay_visa"]);

      var prestaydate = prestayData["arrival_date"];
      var year2 = +prestaydate.substring(0, 4)
      var month2 = +prestaydate.substring(5, 7)
      var passday2 = +prestaydate.substring(8,10)
      data3.getRange((27 +prestayCounter),39).setValue(year2);      
      data3.getRange((27 +prestayCounter),35).setValue(month2); 
      data3.getRange((27 +prestayCounter),32).setValue(passday2); 

      var prestaydepdate = prestayData["depature_date"];
      var year2 = +prestaydepdate.substring(0, 4)
      var month2 = +prestaydepdate.substring(5, 7)
      var passday2 = +prestaydepdate.substring(8,10)
      data3.getRange((27 +prestayCounter),49).setValue(year2);      
      data3.getRange((27 +prestayCounter),45).setValue(month2); 
      data3.getRange((27 +prestayCounter),42).setValue(passday2); 

      prestayCounter++
    });
    /* get sheet data */
  
  }