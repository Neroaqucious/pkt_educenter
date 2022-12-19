<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Mainconfig {

    protected $CI, $encrypt_key, $prefs;
  
  public function __construct()
  {
    $this->CI =& get_instance();
    $this->CI->load->helper('url');
    $this->CI->load->library('encrypt');
    $this->CI->load->library('session');
    $this->CI->load->library('upload');
   // $this->CI->load->library('uploads');
    $this->CI->load->library('image_lib');
    $this->CI->load->library('calendar');
    $this->CI->load->model('dashboard/Config_Model');
  }

  public function _DefaultTimeZone($zone = Null)
  {
    if(!empty($zone)) {
      date_default_timezone_set($zone);
    } else {
      date_default_timezone_set('Asia/Rangoon');
    }            
  }

  public function _DefaultNotic()
  {
    $notic = [];
    $notic['student'] = $this->CI->Config_Model->getStudentList();
    $notic['feedback'] = $this->CI->Config_Model->getFeedbackList();
    $notic['course'] = $this->CI->Config_Model->getStudentCourseList();
    return $notic;
  }

  public function _ArrayDataMarge(Array $data1,Array $data2)
  {
    $result = [];
    $result = array_merge($data1, $data2);
    return $result;
  }

  public function _customSessionChecker($checker, $value, $url) {
    if($checker == 1) {
      if($value != "") {
        redirect($url);
      }
    }
    if($checker == 0) {
      if($value == "") {
        redirect($url);
      }
    }
  }

  public function __sessionDataAssign($session, $key, $set_time = null)
	{
    $this->CI->session->set_userdata($session);
		if($set_time != "") {
      $this->CI->session->mark_as_temp(array($key => $set_time )); //Set session time 4 hour
		} else {
      $this->CI->session->mark_as_temp(array($key => 1800 )); //Set session time 30 minutes
		}
		return true;
	}

  public function _getInitialSiteConfigData()
  {
    return $this->CI->Config_Model->getSiteConfig();
  }

  public function _data64Encode($data)
  {
    return base64_encode($data);
  }

  public function _data64Decode($data)
  {
    return base64_decode($data);
  }

  public function _data64Encodes($data)
  {
    $this->encrypt_key = $this->CI->encrypt->encode($data, "kakunin");
    return $this->encrypt_key;
  }

  public function _data64Decodes($data)
  {
    $this->encrypt_key = $this->CI->encrypt->decode($data, "kakunin");
    return $this->encrypt_key;
  }

  public function _strToLower($str)
  {
    return strtolower($str);
  }

  public function _mbSplit($key, $value)
  {
    return mb_split($key, $value);
  }

  public function _fileUpload($filename,$upload_path,$max_size, $max_width, $max_height, $allow_type, $encrypt, $overwrite, $resize)
  {
    $config['file_name'] = $filename;
    $config['upload_path'] = $upload_path;
    $config['encrypt_name'] = $encrypt;
    $config['overwrite'] = $overwrite;
    $config['max_size'] = $max_size;
    $config['max_width'] = $max_width;
    $config['max_height'] = $max_height;
    $config['allowed_types'] = $allow_type;
    $config['detect_mime'] = TRUE;
    $this->CI->upload->initialize($config);
    $this->CI->load->library('upload', $config);
    if(!$this->CI->upload->do_upload('userfile')) {
      $data['msg_error'] = $this->CI->upload->display_errors();
    } else {
      $data = $this->CI->upload->data(); //data upload
      if($resize == TRUE) {
        $this->__resizeImage($data);
      }
    }
    return $data;  
  }
  
  public function _fileUploadWithByName($filename, $upload_path, $max_size, $max_width, $max_height, $allow_type, $encrypt, $overwrite, $resize, $target = 'userfile')
  {
    $configs['file_name'] = $filename;
    $configs['upload_path'] = $upload_path;
    $configs['encrypt_name'] = $encrypt;
    $configs['overwrite'] = $overwrite;
    $configs['max_size'] = $max_size;
    $configs['max_width'] = $max_width;
    $configs['max_height'] = $max_height;
    $configs['allowed_types'] = $allow_type;
    $configs['detect_mime'] = TRUE;
    $this->CI->upload->initialize($configs);
    $this->CI->load->library('upload', $configs);

      if(!$this->CI->upload->do_upload($target)) {
        $data['msg_error'] = $this->CI->upload->display_errors();
      } else {
        $data = $this->CI->upload->data(); //data upload
        if($resize == TRUE) {
          $this->__resizeImage($data);
        }
    }
    return $data;
  }
  
  public function __resizeImage($file)
  {
      $config1['image_library'] = 'gd2';
      $config1['source_image'] = $file['full_path'];
      $config1['new_image'] = $file['file_path']."_thumb";
      $config1['create_thumb'] = TRUE;
      $config1['maintain_ratio'] = TRUE;
      $config1['width']         = 300;
      $config1['height']       = 300;

      $this->CI->load->library('image_lib', $config1);
      $this->CI->image_lib->initialize($config1);

      if (!$this->CI->image_lib->resize()) {
        echo $this->CI->image_lib->display_errors();
      }
      $this->CI->image_lib->clear();
  }

  public function _slugKeyGen($str)
  {
    return url_title($str);
  }  
  
  public function _textLimiter($text, $limit) 
  {
    if (strlen($text) > $limit) {
			$text = mb_substr($text, 0, $limit) . '...';
    }
    return $text;
  }

  public function __calendarGenerate()
  {
    $this->prefs = array(
      'start_day'    => 'monday',
      'month_type'   => 'long',
      'day_type'     => 'short',
      'show_next_prev' => false,
    );

    $this->prefs['template'] = '
    {table_open}
    <table border="0" cellpadding="0" cellspacing="0" class="calender">{/table_open}

      {heading_row_start}<tr>{/heading_row_start}

      {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
      {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
      {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

      {heading_row_end}</tr>{/heading_row_end}

      {week_row_start}<tr>{/week_row_start}
      {week_day_cell}<td>{week_day}</td>{/week_day_cell}
      {week_row_end}</tr>{/week_row_end}

      {cal_row_start}<tr class="days">{/cal_row_start}
      {cal_cell_start}<td>{/cal_cell_start}
      {cal_cell_start_today}<td>{/cal_cell_start_today}
      {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

      {cal_cell_content}
        <div class="day_num">{day}</div>
        <div class="content">{content}</div>
      {/cal_cell_content}
      {cal_cell_content_today}
      <div class="">
        <div class="day_num highlight">{day}</div>
        <div class="content">{content}</div>
    </div>
    {/cal_cell_content_today}

      {cal_cell_no_content}{day}{/cal_cell_no_content}
      {cal_cell_no_content_today}<div class="day_num highlight">{day}</div>{/cal_cell_no_content_today}

      {cal_cell_blank}&nbsp;{/cal_cell_blank}

      {cal_cell_other}{day}{/cal_cel_other}

      {cal_cell_end}</td>{/cal_cell_end}
      {cal_cell_end_today}</td>{/cal_cell_end_today}
      {cal_cell_end_other}</td>{/cal_cell_end_other}
      {cal_row_end}</tr>{/cal_row_end}

      {table_close}</table>{/table_close}';

    $this->prefs['template'] = array(
      'table_open' => '<table class="col-lg-12 col-md-12 col-ls-12 my-calendar">',
      'cal_cell_start'  => '<td class="day">',
      'cal_cell_start_today' => '<td class="today">'
    );    
    return $this->prefs;
  }

  public function getTargetdays($date1, $date2, $string)
  {
    return new DatePeriod(new DateTime($date1),DateInterval::createFromDateString($string),new DateTime($date2));
  }

  public function targetDateGenerate(array $target, $start_date, $end_date) 
  {
    $array_day = [];

    if(in_array('Sun', $target)) {
      foreach ($this->getTargetdays($start_date, $end_date, 'next sunday') as $days) {
        if($days->format('l') == "Sunday") {
          $array_day[$days->format('Y-m-d')] = $days->format("Y-m-d\n");
        }   
      }
    }
    
    if(in_array('Mon', $target)) {
      foreach ($this->getTargetdays($start_date, $end_date, 'next monday') as $days) {
        if($days->format('l') == "Monday") {
          $array_day[$days->format('Y-m-d')] = $days->format("Y-m-d\n");
        }   
      }
    }

    if(in_array('Tue', $target)) {
      foreach ($this->getTargetdays($start_date, $end_date, 'next tuesday') as $days) {
        if($days->format('l') == "Tuesday") {
          $array_day[$days->format('Y-m-d')] = $days->format("Y-m-d\n");
        }   
      }
    }

    if(in_array('Wed', $target)) {
      foreach ($this->getTargetdays($start_date, $end_date, 'next wednesday') as $days) {
        if($days->format('l') == "Wednesday") {
          $array_day[$days->format('Y-m-d')] = $days->format("Y-m-d\n");
        }   
      }
    }

    if(in_array('Thu', $target)) {
      foreach ($this->getTargetdays($start_date, $end_date, 'next thursday') as $days) {
        if($days->format('l') == "Thursday") {
          $array_day[$days->format('Y-m-d')] = $days->format("Y-m-d\n");
        }   
      }
    }

    if(in_array('Fri', $target)) {
      foreach ($this->getTargetdays($start_date, $end_date, 'next friday') as $days) {
        if($days->format('l') == "Friday") {
          $array_day[$days->format('Y-m-d')] = $days->format("Y-m-d\n");
        }   
      }
    }

    if(in_array('Sat', $target)) {
      foreach ($this->getTargetdays($start_date, $end_date, 'next saturday') as $days) {
        if($days->format('l') == "Saturday") {
          $array_day[$days->format('Y-m-d')] = $days->format("Y-m-d\n");
        }   
      }
    }

    sort($array_day);    
    return $array_day;
  }

}