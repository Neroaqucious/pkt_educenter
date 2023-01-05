<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pdf extends CI_Controller {
    private $private_db = "dashboard/Pdf_Model";
    private $data, $key, $url;
    private $sessiondata, $authkey, $slugkey, $std_id, $usr_email, $usr_phone, $usr_name;
    private $id, $enroll_course, $enroll_batch, $enroll_package, $enroll_checker, $usertoken;
    //Initial presite config
    //Initial auth session
    protected $current_id, $current_user, $current_role, $current_csrf_key, $current_permission, $current_session_count, $current_login_time, $current_log_id, $session_checker, $user_config;
    //Initial presite config
    protected $site_name, $meta_tag, $favicon, $decimal_point, $date_format, $phone_format, $user_session, $timezone;
    //File upload data
    private $filename;
    private $filenames;
    private $upload_path = "./upload/assets/adm/usr/";
    private $upload_paths = "./upload/assets/adm/sign/";
    private $file_path = "/../../../upload/assets/adm/usr/";
    private $max_size = "202800"; // upload max size 200 MB
    private $max_width = "1024";
    private $max_height = "1024";
    private $allow_type = 'jpg|jpeg|png|JPEG';
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
        $this->load->model($this->private_db);
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('encryption');
        $this->load->library('user_agent');
        $this->load->library('upload');
        //$this->load->library('uploads');
        $this->load->library('email');
        $this->load->library('mainconfig');
        $this->load->helper('custom');
        $this->load->helper('cookie');
        //$this->load->library('userconfig');
       // $this->mainconfig->_DefaultTimeZone($this->timezone);
        
    }
    public function index() {
        $data['member'] = $this->Pdf_Model->alldata();
        $this->load->view('dashboard/export/ecc_interview', $data);
    }
    function eccinter($id) {
       // $this->mpdf->useOnlyCoreFonts = true;
       //$filename = "VISH";
       $data['result'] = $this->Pdf_Model->getAllData($id);
       $data['result1'] = $this->Pdf_Model->getJLSDetail1($id);
       $data['resulteduhis'] = $this->Pdf_Model->getEduHitory($id);
       $data['result2'] = $this->Pdf_Model->getJLSDetail2($id);
       $data['resultprejpstudy'] = $this->Pdf_Model->getPreJpStudy($id);
       $data['result3'] = $this->Pdf_Model->getJLSDetail3($id);
       $data['resultachiv'] = $this->Pdf_Model->getAchivTest($id);
       $data['result4'] = $this->Pdf_Model->getJLSDetail4($id);
       $data['resultgoingtest'] = $this->Pdf_Model->getGoingTest($id);
       $data['result5'] = $this->Pdf_Model->getJLSDetail5($id);
       $data['resulthisemp'] = $this->Pdf_Model->getHisEmp($id);          
       $data['result6'] = $this->Pdf_Model->getJLSDetail6($id);
       $data['result7'] = $this->Pdf_Model->getJLSDetail7($id);
       $data['resultfamjapan'] = $this->Pdf_Model->getFamJapan($id);
       $data['result8'] = $this->Pdf_Model->getJLSDetail8($id);
       // $html = $this->load->view('dashboard/export/ecc_interview', $data['member'], true);
        $html = $this->load->view('dashboard/export/ecc_interview', $data, true);
       // var_dump($html);
       require_once __DIR__ . '../../../../vendor/autoload.php';
       $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
      //$html = $this->load->view('html_to_pdf',[],true);
       $mpdf->WriteHTML($html);
       $mpdf->Output(); // opens in browser
      
        //$this->mpdf = new \Mpdf\Mpdf;
        
        // $mpdf = new \Mpdf\Mpdf(
        //     ['debug' => true]
            
        // );
      //  $this->$mpdf->setTitle('Posts');
        // $this->mpdf->writeHTML($html);
        // $this->mpdf->output();
       // $this->mpdf->WriteHTML($html); // write the HTML into the PDF
        $this->stylesheet = file_get_contents('asset/css/style.css');
        $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
       // $this->mpdf->Output("$output", 'I'); // save to file because we can
        exit();
    }
    function fukuokainter($id) {
        // $this->mpdf->useOnlyCoreFonts = true;
        //$filename = "VISH";
        $data['result'] = $this->Pdf_Model->getAllData($id);
        $data['result1'] = $this->Pdf_Model->getJLSDetail1($id);
        $data['resulteduhis'] = $this->Pdf_Model->getEduHitory($id);
        $data['result2'] = $this->Pdf_Model->getJLSDetail2($id);
        $data['resultprejpstudy'] = $this->Pdf_Model->getPreJpStudy($id);
        $data['result3'] = $this->Pdf_Model->getJLSDetail3($id);
        $data['resultachiv'] = $this->Pdf_Model->getAchivTest($id);
        $data['result4'] = $this->Pdf_Model->getJLSDetail4($id);
        $data['resultgoingtest'] = $this->Pdf_Model->getGoingTest($id);
        $data['result5'] = $this->Pdf_Model->getJLSDetail5($id);
        $data['resulthisemp'] = $this->Pdf_Model->getHisEmp($id);          
        $data['result6'] = $this->Pdf_Model->getJLSDetail6($id);
        $data['result7'] = $this->Pdf_Model->getJLSDetail7($id);
        $data['resultfamjapan'] = $this->Pdf_Model->getFamJapan($id);
        $data['result8'] = $this->Pdf_Model->getJLSDetail8($id);
        // $html = $this->load->view('dashboard/export/ecc_interview', $data['member'], true);
         $html = $this->load->view('dashboard/export/fukuoka_interview', $data, true);
        // var_dump($html);
         $this->mpdf = new \Mpdf\Mpdf;
 
         // $mpdf = new \Mpdf\Mpdf(
         //     ['debug' => true]
             
         // );
       //  $this->$mpdf->setTitle('Posts');
         // $this->mpdf->writeHTML($html);
         // $this->mpdf->output();
         $this->mpdf->WriteHTML($html); // write the HTML into the PDF
         $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
         $this->mpdf->Output("$output", 'I'); // save to file because we can
         exit();
     }
     function shizuka_inter($id) {
        // $this->mpdf->useOnlyCoreFonts = true;
        //$filename = "VISH";
         $data['result'] = $this->Pdf_Model->getAllData($id);
         $data['result1'] = $this->Pdf_Model->getJLSDetail1($id);
         $data['resulteduhis'] = $this->Pdf_Model->getEduHitory($id);
         $data['result2'] = $this->Pdf_Model->getJLSDetail2($id);
         $data['resultprejpstudy'] = $this->Pdf_Model->getPreJpStudy($id);
         $data['result3'] = $this->Pdf_Model->getJLSDetail3($id);
         $data['resultachiv'] = $this->Pdf_Model->getAchivTest($id);
         $data['result4'] = $this->Pdf_Model->getJLSDetail4($id);
         $data['resultgoingtest'] = $this->Pdf_Model->getGoingTest($id);
         $data['result5'] = $this->Pdf_Model->getJLSDetail5($id);
         $data['resulthisemp'] = $this->Pdf_Model->getHisEmp($id);          
         $data['result6'] = $this->Pdf_Model->getJLSDetail6($id);
         $data['result7'] = $this->Pdf_Model->getJLSDetail7($id);
         $data['resultfamjapan'] = $this->Pdf_Model->getFamJapan($id);
         $data['result8'] = $this->Pdf_Model->getJLSDetail8($id);
         $data['result9'] = $this->Pdf_Model->getJLSDetail9($id);
        // $html = $this->load->view('dashboard/export/ecc_interview', $data['member'], true);
         $html = $this->load->view('dashboard/export/shizuoka_interview', $data, true);
        // var_dump($html);
         $this->mpdf = new \Mpdf\Mpdf;
 
         // $mpdf = new \Mpdf\Mpdf(
         //     ['debug' => true]
             
         // );
       //  $this->$mpdf->setTitle('Posts');
         // $this->mpdf->writeHTML($html);
         // $this->mpdf->output();
         $this->mpdf->WriteHTML($html); // write the HTML into the PDF
         $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
         $this->mpdf->Output("$output", 'I'); // save to file because we can
         exit();
     }
    public function ecc_admiss($id)
    {
            // $this->mpdf->useOnlyCoreFonts = true;
            //$filename = "VISH";
             $data['result'] = $this->Pdf_Model->getAllData($id);
             $data['result1'] = $this->Pdf_Model->getJLSDetail1($id);
             $data['resulteduhis'] = $this->Pdf_Model->getEduHitory($id);
             $data['result2'] = $this->Pdf_Model->getJLSDetail2($id);
             $data['resultprejpstudy'] = $this->Pdf_Model->getPreJpStudy($id);
             $data['result3'] = $this->Pdf_Model->getJLSDetail3($id);
             $data['resultachiv'] = $this->Pdf_Model->getAchivTest($id);
             $data['result4'] = $this->Pdf_Model->getJLSDetail4($id);
             $data['resultgoingtest'] = $this->Pdf_Model->getGoingTest($id);
             $data['result5'] = $this->Pdf_Model->getJLSDetail5($id);
             $data['resulthisemp'] = $this->Pdf_Model->getHisEmp($id);          
             $data['result6'] = $this->Pdf_Model->getJLSDetail6($id);
             $data['result7'] = $this->Pdf_Model->getJLSDetail7($id);
             $data['resultfamjapan'] = $this->Pdf_Model->getFamJapan($id);
             $data['result8'] = $this->Pdf_Model->getJLSDetail8($id);
            // $html = $this->load->view('dashboard/export/ecc_interview', $data['member'], true);
             $html = $this->load->view('dashboard/export/ecc_admission', $data, true);
            // var_dump($html);
             $this->mpdf = new \Mpdf\Mpdf;
     
             // $mpdf = new \Mpdf\Mpdf(
             //     ['debug' => true]
                 
             // );
           //  $this->$mpdf->setTitle('Posts');
             // $this->mpdf->writeHTML($html);
             // $this->mpdf->output();
             $this->mpdf->WriteHTML($html); // write the HTML into the PDF
             $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
             $this->mpdf->Output("$output", 'I'); // save to file because we can
             exit();
    }

    public function fukuoka_admiss($id)
    {
        // $this->mpdf->useOnlyCoreFonts = true;
            //$filename = "VISH";
            $data['result'] = $this->Pdf_Model->getAllData($id);
            $data['result1'] = $this->Pdf_Model->getJLSDetail1($id);
            $data['resulteduhis'] = $this->Pdf_Model->getEduHitory($id);
            $data['result2'] = $this->Pdf_Model->getJLSDetail2($id);
            $data['resultprejpstudy'] = $this->Pdf_Model->getPreJpStudy($id);
            $data['result3'] = $this->Pdf_Model->getJLSDetail3($id);
            $data['resultachiv'] = $this->Pdf_Model->getAchivTest($id);
            $data['result4'] = $this->Pdf_Model->getJLSDetail4($id);
            $data['resultgoingtest'] = $this->Pdf_Model->getGoingTest($id);
            $data['result5'] = $this->Pdf_Model->getJLSDetail5($id);
            $data['resulthisemp'] = $this->Pdf_Model->getHisEmp($id);          
            $data['result6'] = $this->Pdf_Model->getJLSDetail6($id);
            $data['result7'] = $this->Pdf_Model->getJLSDetail7($id);
            $data['resultfamjapan'] = $this->Pdf_Model->getFamJapan($id);
            $data['result8'] = $this->Pdf_Model->getJLSDetail8($id);
            $data['result9'] = $this->Pdf_Model->getJLSDetail9($id);
           // $html = $this->load->view('dashboard/export/ecc_interview', $data['member'], true);
            $html = $this->load->view('dashboard/export/fukuoka_admission', $data, true);
           // var_dump($html);
            $this->mpdf = new \Mpdf\Mpdf;
    
            // $mpdf = new \Mpdf\Mpdf(
            //     ['debug' => true]
                
            // );
          //  $this->$mpdf->setTitle('Posts');
            // $this->mpdf->writeHTML($html);
            // $this->mpdf->output();
            $this->mpdf->WriteHTML($html); // write the HTML into the PDF
            $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
            $this->mpdf->Output("$output", 'I'); // save to file because we can
            exit();
    }
    public function shizuoka_admiss($id)

    {
         // $this->mpdf->useOnlyCoreFonts = true;
            //$filename = "VISH";
            $data['result'] = $this->Pdf_Model->getAllData($id);
            $data['result1'] = $this->Pdf_Model->getJLSDetail1($id);
            $data['resulteduhis'] = $this->Pdf_Model->getEduHitory($id);
            $data['result2'] = $this->Pdf_Model->getJLSDetail2($id);
            $data['resultprejpstudy'] = $this->Pdf_Model->getPreJpStudy($id);
            $data['result3'] = $this->Pdf_Model->getJLSDetail3($id);
            $data['resultachiv'] = $this->Pdf_Model->getAchivTest($id);
            $data['result4'] = $this->Pdf_Model->getJLSDetail4($id);
            $data['resultgoingtest'] = $this->Pdf_Model->getGoingTest($id);
            $data['result5'] = $this->Pdf_Model->getJLSDetail5($id);
            $data['resulthisemp'] = $this->Pdf_Model->getHisEmp($id);        
            $data['result6'] = $this->Pdf_Model->getJLSDetail6($id);
            $data['result7'] = $this->Pdf_Model->getJLSDetail7($id);
            $data['resultfamjapan'] = $this->Pdf_Model->getFamJapan($id);
            $data['result8'] = $this->Pdf_Model->getJLSDetail8($id);
            $data['result9'] = $this->Pdf_Model->getJLSDetail9($id);
           // $html = $this->load->view('dashboard/export/ecc_interview', $data['member'], true);
            $html = $this->load->view('dashboard/export/shizuoka_admission', $data, true);
           // var_dump($html);
            $this->mpdf = new \Mpdf\Mpdf;
    
            // $mpdf = new \Mpdf\Mpdf(
            //     ['debug' => true]
                
            // );
          //  $this->$mpdf->setTitle('Posts');
            // $this->mpdf->writeHTML($html);
            // $this->mpdf->output();
            $this->mpdf->WriteHTML($html); // write the HTML into the PDF
            $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
            $this->mpdf->Output("$output", 'I'); // save to file because we can
            exit();
    }
    public function jcli_admiss($id)

    {
         // $this->mpdf->useOnlyCoreFonts = true;
            //$filename = "VISH";
            $data['result'] = $this->Pdf_Model->getAllData($id);
            $data['result1'] = $this->Pdf_Model->getJLSDetail1($id);
            $data['resulteduhis'] = $this->Pdf_Model->getEduHitory($id);
            $data['result2'] = $this->Pdf_Model->getJLSDetail2($id);
            $data['resultprejpstudy'] = $this->Pdf_Model->getPreJpStudy($id);
            $data['result3'] = $this->Pdf_Model->getJLSDetail3($id);
            $data['resultachiv'] = $this->Pdf_Model->getAchivTest($id);
            $data['result4'] = $this->Pdf_Model->getJLSDetail4($id);
            $data['resultgoingtest'] = $this->Pdf_Model->getGoingTest($id);
            $data['result5'] = $this->Pdf_Model->getJLSDetail5($id);
            $data['resulthisemp'] = $this->Pdf_Model->getHisEmp($id);          
            $data['result6'] = $this->Pdf_Model->getJLSDetail6($id);
            $data['result7'] = $this->Pdf_Model->getJLSDetail7($id);
            $data['resultfamjapan'] = $this->Pdf_Model->getFamJapan($id);
            $data['result8'] = $this->Pdf_Model->getJLSDetail8($id);
           // $html = $this->load->view('dashboard/export/ecc_interview', $data['member'], true);
            $html = $this->load->view('dashboard/export/jcli_admission', $data, true);
           // var_dump($html);
            $this->mpdf = new \Mpdf\Mpdf;
    
            // $mpdf = new \Mpdf\Mpdf(
            //     ['debug' => true]
                
            // );
          //  $this->$mpdf->setTitle('Posts');
            // $this->mpdf->writeHTML($html);
            // $this->mpdf->output();
            $this->mpdf->WriteHTML($html); // write the HTML into the PDF
            $output = 'itemreport' . date('Y_m_d_H_i_s') . '_.pdf';
            $this->mpdf->Output("$output", 'I'); // save to file because we can
            exit();
    }
}

?>
