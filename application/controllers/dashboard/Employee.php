<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Employee extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->model('dashboard/EmployeeModel');
    }    
	public function index() {
        $data['page'] = 'export-excel';
        $data['title'] = 'Export Excel data';
        $data['employeeData'] = $this->EmployeeModel->employeeList();
		$this->load->view('dashboard/export_excel/employee', $data);
    }
	public function createExcel() {
		$fileName = 'employee.xlsx';  
		$employeeData = $this->EmployeeModel->employeeList();

		$spreadsheet = new Spreadsheet();
        // $sheet = $spreadsheet->getActiveSheet();

        // 


        $sheet = $spreadsheet->setActiveSheetIndex(0)->mergeCells('A1:C1');
        $sheet->setCellValue('D1', '入　学　願　書 ');
        // $sheet->setActiveSheetIndex(0)->mergeCells('E1:G1');
        // $sheet->setActiveSheetIndex(2)->mergeCells('A2:C2');
        // $sheet->setCellValue('D2', '入　学　願　書 ');
        // $sheet->setActiveSheetIndex(3)->mergeCells('E2:G2');



        // $sheet = $spreadsheet->getActiveSheet()->getComment('A1:A3')->getText()->createTextRun('My comment for all cells in the range A6 to A11');
        // $sheet->setCellValue('A3', '入　学　願　書 ');

        $sheet->getStyle('A2')->applyFromArray([
            'font' => [
                'name' => 'Arial',
                'bold' => true,
                'italic' => false,
                'underline' => Font::UNDERLINE_DOUBLE,
                'strikethrough' => false,
                'color' => [
                    'rgb' => '808080'
                ]
            ],
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_DASHDOT,
                    'color' => [
                        'rgb' => '808080'
                    ]
                ],
                'top' => [
                    'borderStyle' => Border::BORDER_DASHDOT,
                    'color' => [
                        'rgb' => '808080'
                    ]
                ]
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
            'quotePrefix'    => true
        ]
    );













        // $sheet = $spreadsheet->getActiveSheet();
        // $sheet->setCellValue('A1:B1', '');
        // $sheet->setCellValue('A2:B2', '');
       	
        // $sheet->setCellValue('C3:F3', 'Name');
        // $sheet->setCellValue('A5:D5', 'Skills');
        // $sheet->setCellValue('E5', 'Address');
	// $sheet->setCellValue('F5', 'Age');
    //     $sheet->setCellValue('H5:I5', 'Designation');       
        // $rows = 2;
        // foreach ($employeeData as $val){
        //     $sheet->setCellValue('A' . $rows, $val['id']);
        //     $sheet->setCellValue('B' . $rows, $val['name']);
        //     $sheet->setCellValue('C' . $rows, $val['skills']);
        //     $sheet->setCellValue('D' . $rows, $val['address']);
	    // $sheet->setCellValue('E' . $rows, $val['age']);
        //     $sheet->setCellValue('F' . $rows, $val['designation']);
        //     $rows++;
        // } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);  

  
        
    }    
}
?>