<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	function array_transfer($datas, array $values)
	{
		if(!empty($datas) && !empty($values))
		{
			foreach ($datas as $row)
			{
				if (is_array($values))
				{
					foreach ($values as $key => $val)
					{
						$row->$key = change_format($row->$key, $val);
					}
				}
			}
			return $datas;
		} else {
			return [];
		}
	}
	
	function object_transfer($object, array $values)
	{
		if (is_array($values))
			{
				foreach ($values as $key => $val)
				{
					$object->$key = change_format($object->$key, $val);
				}
			}
		return $object;
	}

	function _transfer_key_prepare($keys = Null) {
		$data = [];
		if($keys != Null) {
			foreach ($keys as $key) {
				switch ($key){
					case "phone":
						if(isset($_SESSION['__admin_config_data']['phone_format'])) {
							$data['phone'] = isset($data['phone'])?$data['phone']:"";
							$data['phone'] .= $_SESSION['__admin_config_data']['phone_format'];
						}
						break;
					
					case "created_at":
						if(isset($_SESSION['__admin_config_data']['date_format'])) {
							$data['created_at'] = isset($data['created_at'])?$data['created_at']:"";
							$data['created_at'] .= "timeformat";
						}
						break;
					
					case "updated_at":
						if(isset($_SESSION['__admin_config_data']['date_format'])) {
							$data['updated_at'] = isset($data['updated_at'])?$data['updated_at']:"";
							$data['updated_at'] .= "timeformat";
						}
						break;
						
					case "released_date":
						if(isset($_SESSION['__admin_config_data']['date_format'])) {
							$data['released_date'] = isset($data['released_date'])?$data['released_date']:"";
							$data['released_date'] .= "timeformat";
						}
						break;
					
					case "activate_date":
						if(isset($_SESSION['__admin_config_data']['date_format'])) {
							$data['activate_date'] = isset($data['activate_date'])?$data['activate_date']:"";
							$data['activate_date'] .= "timeformat";
						}
						break;
					
					case "request_date":
						if(isset($_SESSION['__admin_config_data']['date_format'])) {
							$data['request_date'] = isset($data['request_date'])?$data['request_date']:"";
							$data['request_date'] .= "timeformat";
						}
						break;
					
					case "closed_date":
						if(isset($_SESSION['__admin_config_data']['date_format'])) {
							$data['closed_date'] = isset($data['closed_date'])?$data['closed_date']:"";
							$data['closed_date'] .= "timeformat";
						}
						break;

					case "expired_date":
						if(isset($_SESSION['__admin_config_data']['date_format'])) {
							$data['expired_date'] = isset($data['expired_date'])?$data['expired_date']:"";
							$data['expired_date'] .= "timeformat";
						}
						break;
					
					case "role":
						if($key == "role") {
							$data['role'] = isset($data['role'])?$data['role']:"";
							$data['role'] .= "str_upper";
						}
						break;
					
					case "username":
						if($key == "username") {
							$data['username'] = isset($data['username'])?$data['username']:"";
							$data['username'] .= "url_decode";
						}
						break;
					
					default:
						$data = $data;
						break;
				}
			}
		}
		return $data;
	}

	function change_format($data, $key) {
		switch ($key)
		{
			case "334":
				$data = preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $data);
				break;
			
			case "433":
				$data = preg_replace("/([0-9]{4})([0-9]{3})([0-9]{3})/", "$1-$2-$3", $data);
				break;
				
			case "244":
				$data = preg_replace("/([0-9]{2})([0-9]{4})([0-9]{4})/", "$1-$2-$3", $data);
				break;
				
			case "str_lower":
				$data = strtolower($data);
				break;
			
			case "str_upper":
				$data = strtoupper($data);
				break;
			
			case "str_ucf":
				$data = ucfirst($data);
				break;
			
			case "url_encode":
				$data = base64_encode($data);
				break;
			
			case "url_decode":
				$data = base64_decode($data);
				break;
				
			case "timeformat":
				if(isset($_SESSION['__admin_config_data']['date_format'])) {
					$data = date($_SESSION['__admin_config_data']['date_format'], strtotime($data));
				} else {
					return $data;
				}
				break;
				
			case "decimal_point":
				if(isset($_SESSION['__admin_config_data']['decimal_point'])) {
					$data = number_format($data, $_SESSION['__admin_config_data']['decimal_point']);
				} else {
					return $data;
				}
				break;
				
			default:
				$data = $data;
				break;
		}
		return $data;
	}
	
	function object_key_checker($array) {
		
		if(!empty($array)) {
			return array_keys((array)$array);
		} else {
			return [];
		}
	}
	
	function array_keys_checker($array) {
		
		if(!empty($array[0])) {
			return array_keys((array)$array[0]);
		} else {
			return [];
		}
	}
	
	function serial_id_generate($key, $data, $length) {
		return $key.str_pad(($data+1), $length, '0', STR_PAD_LEFT);
	}
	
	function sum_duration($times) {
		$minutes = 0; //declare minutes either it gives Notice: Undefined variable
		// loop throught all the times
		foreach ($times as $time) {
			list($hour, $minute) = explode(':', $time);
			$minutes += $hour * 60;
			$minutes += $minute;
		}
		
		$hours = floor($minutes / 60);
		$minutes -= $hours * 60;
		
		// returns the time already formatted
		return sprintf('%02d:%02d', $hours, $minutes);
	}

	function media_duration($array) {
		$totalminute = [];
		foreach($array as $row) {
			$totalminute[] = $row->minute;
		}
		$result = sum_duration($totalminute);
		return $result;
	}

	function compare_date($date1, $date2) {
		$today = date("Y-m-d");
		$date1 = date('Y-m-d',strtotime($date1));
		$date2 = date('Y-m-d',strtotime($date2));
		if(date_different($date1, $today) > 0 && date_different($date2, $today) <= 0) {
			return true;
		} else {
			return false;
		}
	}

	function date_different($date1, $date2)
	{  
		$date = new DateTime($date1);
		$now = new DateTime($date2);
		return $date->diff($now)->format("%R%a");
	}