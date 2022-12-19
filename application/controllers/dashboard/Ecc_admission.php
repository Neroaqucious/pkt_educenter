<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ecc_admission extends CI_Controller {

    public function index()
    {
        $mpdf = new \Mpdf\Mpdf(
            ['debug' => true]
            
        );
        $mpdf->fontdata["frutiger"] = [
            'R' => "Frutiger-Normal.ttf",
            'I' => "FrutigerObl-Normal.ttf",
        ];
        $html = $this->load->view('dashboard/export/Ecc_admission', [], true);
        $this->stylesheet = file_get_contents('asset/css/style.css');
        $mpdf->WriteHTML($html);  
        $mpdf->Output();
    }

    
    
     // $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        // $fontDirs = $defaultConfig['fontDir'];

        // $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        // $fontData = $defaultFontConfig['fontdata'];
        // $mpdf = new \Mpdf\Mpdf(
        //     ['debug' => true],
        //     [
        //     'fontDir' => array_merge($fontDirs, [
        //         __DIR__ . '/custom/font/directory',
        //     ]),
        //     'fontdata' => $fontData + [ // lowercase letters only in font key
        //         'frutiger' => [
        //             'R' => 'Frutiger-Normal.ttf',
        //             'I' => 'FrutigerObl-Normal.ttf',
        //         ]
        //     ],
        //     'default_font' => 'frutiger'
        // ]);
        

}

?>
