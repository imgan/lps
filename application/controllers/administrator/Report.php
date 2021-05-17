<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Report extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('administrator/model_report');
	}

	function render_view($data)
	{
		$this->template->load('templateadmin', $data); //Display Page
	}

	public function index()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$data = array(
				'page_content'      => '../pageadmin/report/view',
				'ribbon'            => '<li class="active">Daftar Report </li>',
				'page_name'         => 'Daftar Report',
			);
			$this->render_view($data); //Memanggil function render_view
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}

	public function laporan()
	{
		if ($this->session->userdata('Nik') != null && $this->session->userdata('Username') != null) {
			$awal = $this->input->post('awal');
			$akhir = $this->input->post('akhir');
			$filename = "LeadTime_Report-$awal-$akhir.xlsx";
			$data = $this->model_report->getAllStatus($awal, $akhir)->result_array();
			if ($data != null) {
				$spreadsheet = new Spreadsheet();
				$spreadsheet->getActiveSheet(0)->mergeCells('A1:A3');
				$spreadsheet->getActiveSheet(0)->mergeCells('B1:B3');
				$spreadsheet->getActiveSheet(0)->mergeCells('C1:C3');
				$spreadsheet->getActiveSheet(0)->mergeCells('D1:G1');
				$spreadsheet->getActiveSheet(0)->mergeCells('AJ1:AM1');
				$spreadsheet->getActiveSheet(0)->mergeCells('AJ2:AM2');


				$spreadsheet->getActiveSheet(0)->mergeCells('D2:G2');
				$spreadsheet->getActiveSheet(0)->setCellValue('A1', 'No');
				$spreadsheet->getActiveSheet(0)->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('B1', 'Division');
				$spreadsheet->getActiveSheet(0)->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('C1', 'Departemen');
				$spreadsheet->getActiveSheet(0)->getStyle('C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('D1', 'Req Quotation');
				$spreadsheet->getActiveSheet(0)->getStyle('D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('D2', 'STD L/T (0-5)');
				$spreadsheet->getActiveSheet(0)->getStyle('D2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('D3', 'No');
				$spreadsheet->getActiveSheet(0)->getStyle('D3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('E3', 'Start');
				$spreadsheet->getActiveSheet(0)->getStyle('E3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('F3', 'Finish');
				$spreadsheet->getActiveSheet(0)->getStyle('F3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('G3', 'Duration (Days)');

				$spreadsheet->getActiveSheet(0)->mergeCells('H1:K1');


				$spreadsheet->getActiveSheet(0)->mergeCells('H2:K2');
				$spreadsheet->getActiveSheet(0)->setCellValue('H1', 'Budget Request');
				$spreadsheet->getActiveSheet(0)->getStyle('H1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('H2', 'STD L/T (0-2)');
				$spreadsheet->getActiveSheet(0)->getStyle('H2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('H3', 'No');
				$spreadsheet->getActiveSheet(0)->getStyle('H3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('I3', 'Start');
				$spreadsheet->getActiveSheet(0)->getStyle('I3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('J3', 'Finish');
				$spreadsheet->getActiveSheet(0)->getStyle('J3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('K3', 'Duration (Days)');

				$spreadsheet->getActiveSheet(0)->mergeCells('L1:O1');
				// 
				$spreadsheet->getActiveSheet(0)->mergeCells('L2:O2');
				$spreadsheet->getActiveSheet(0)->setCellValue('L1', 'E-Workflow Approval');
				$spreadsheet->getActiveSheet(0)->getStyle('L1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('L2', 'STD L/T (0-5)');
				$spreadsheet->getActiveSheet(0)->getStyle('L2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('L3', 'No');
				$spreadsheet->getActiveSheet(0)->getStyle('L3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('M3', 'Start');
				$spreadsheet->getActiveSheet(0)->getStyle('M3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('N3', 'Finish');
				$spreadsheet->getActiveSheet(0)->getStyle('N3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->setCellValue('O3', 'Duration (Days)');
				$spreadsheet->getActiveSheet(0)->getStyle('O3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

				$spreadsheet->getActiveSheet(0)->mergeCells('P1:S1');
				$spreadsheet->getActiveSheet(0)->mergeCells('P2:S2');
				$spreadsheet->getActiveSheet(0)->setCellValue('P1', 'Register Item');

				// $spreadsheet->getActiveSheet()->getStyle('D1:G1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF7F');
				// $spreadsheet->getActiveSheet()->getStyle('D2:G2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF7F');
				// $spreadsheet->getActiveSheet()->getStyle('D3:G3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF7F');
				// $spreadsheet->getActiveSheet()->getStyle('L1:O1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('F5F5DC');
				// $spreadsheet->getActiveSheet()->getStyle('H1:K3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('33FFFF');
				// $spreadsheet->getActiveSheet()->getStyle('H2:K2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('33FFFF');
				// $spreadsheet->getActiveSheet()->getStyle('H3:K3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('33FFFF');
				// $spreadsheet->getActiveSheet()->getStyle('L2:O2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('F5F5DC');
				// $spreadsheet->getActiveSheet()->getStyle('L3:O3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('F5F5DC');
				// $spreadsheet->getActiveSheet()->getStyle('P1:S1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF00');
				// $spreadsheet->getActiveSheet()->getStyle('P2:S2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF00');
				// $spreadsheet->getActiveSheet()->getStyle('P3:S3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF00');
				// $spreadsheet->getActiveSheet()->getStyle('T1:W1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCFFCC');
				// $spreadsheet->getActiveSheet()->getStyle('T2:W2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCFFCC');
				// $spreadsheet->getActiveSheet()->getStyle('T3:W3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCFFCC');
				// $spreadsheet->getActiveSheet()->getStyle('X1:AI1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCFFFF');
				// $spreadsheet->getActiveSheet()->getStyle('X2:AI2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCFFFF');
				// $spreadsheet->getActiveSheet()->getStyle('X3:AI3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCFFFF');

				$spreadsheet->getActiveSheet(0)->getStyle('P1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

				$spreadsheet->getActiveSheet(0)->setCellValue('P2', 'STD L/T (0-3)');
				$spreadsheet->getActiveSheet(0)->getStyle('P2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

				$spreadsheet->getActiveSheet(0)->setCellValue('P3', 'No');
				$spreadsheet->getActiveSheet(0)->setCellValue('Q3', 'Start');
				$spreadsheet->getActiveSheet(0)->setCellValue('R3', 'Finish');
				$spreadsheet->getActiveSheet(0)->setCellValue('S3', 'Duration (Days)');

				$spreadsheet->getActiveSheet(0)->mergeCells('T1:W1');
				$spreadsheet->getActiveSheet(0)->mergeCells('T2:W2');
				$spreadsheet->getActiveSheet(0)->setCellValue('T1', 'Buyer Transfer');

				$spreadsheet->getActiveSheet(0)->getStyle('T1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

				$spreadsheet->getActiveSheet(0)->setCellValue('T2', 'STD L/T (0-5)');
				$spreadsheet->getActiveSheet(0)->getStyle('T2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

				$spreadsheet->getActiveSheet(0)->setCellValue('T3', 'No');
				$spreadsheet->getActiveSheet(0)->setCellValue('U3', 'Start');
				$spreadsheet->getActiveSheet(0)->setCellValue('V3', 'Finish');
				$spreadsheet->getActiveSheet(0)->setCellValue('W3', 'Duration (Days)');

				$spreadsheet->getActiveSheet(0)->mergeCells('X1:AI1');
				$spreadsheet->getActiveSheet(0)->mergeCells('X2:AA2');
				$spreadsheet->getActiveSheet(0)->mergeCells('AB2:AE2');
				$spreadsheet->getActiveSheet(0)->mergeCells('AF2:AI2');

				$spreadsheet->getActiveSheet(0)->setCellValue('X1', 'IPPS Input');
				$spreadsheet->getActiveSheet(0)->getStyle('X1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

				$spreadsheet->getActiveSheet(0)->setCellValue('X2', 'STD L/T (0-5)');
				$spreadsheet->getActiveSheet(0)->getStyle('X2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

				$spreadsheet->getActiveSheet(0)->setCellValue('AB2', 'STD L/T (0-3)');
				$spreadsheet->getActiveSheet(0)->getStyle('AB2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

				$spreadsheet->getActiveSheet(0)->setCellValue('AF2', 'STD L/T (0-5)');
				$spreadsheet->getActiveSheet(0)->getStyle('AF2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


				$spreadsheet->getActiveSheet(0)->setCellValue('X3', 'No');
				$spreadsheet->getActiveSheet(0)->setCellValue('Y3', 'Start');
				$spreadsheet->getActiveSheet(0)->setCellValue('Z3', 'Finish');
				$spreadsheet->getActiveSheet(0)->setCellValue('AA3', 'Duration (Days)');

				$spreadsheet->getActiveSheet(0)->setCellValue('AB3', 'No');
				$spreadsheet->getActiveSheet(0)->setCellValue('AC3', 'Start');
				$spreadsheet->getActiveSheet(0)->setCellValue('AD3', 'Finish');
				$spreadsheet->getActiveSheet(0)->setCellValue('AE3', 'Duration (Days)');

				$spreadsheet->getActiveSheet(0)->setCellValue('AF3', 'No');
				$spreadsheet->getActiveSheet(0)->setCellValue('AG3', 'Start');
				$spreadsheet->getActiveSheet(0)->setCellValue('AH3', 'Finish');
				$spreadsheet->getActiveSheet(0)->setCellValue('AI3', 'Duration (Days)');

				$spreadsheet->getActiveSheet(0)->setCellValue('AJ1', 'Goods Receiving');
				$spreadsheet->getActiveSheet(0)->getStyle('AJ2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
				$spreadsheet->getActiveSheet(0)->getStyle('AJ1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

				$spreadsheet->getActiveSheet(0)->setCellValue('AJ2', 'STD L/T (0-5)');
				$spreadsheet->getActiveSheet(0)->setCellValue('AJ3', 'No');
				$spreadsheet->getActiveSheet(0)->setCellValue('AK3', 'Start');
				$spreadsheet->getActiveSheet(0)->setCellValue('AL3', 'Finish');
				$spreadsheet->getActiveSheet(0)->setCellValue('AM3', 'Duration (Days)');
				$no = 1;
				$x = 4;
				foreach ($data as $value) {
					$spreadsheet->getActiveSheet(0)->setCellValue('A' . $x, $no++);
					$spreadsheet->getActiveSheet(0)->setCellValue('B' . $x, $value['Name']);
					$spreadsheet->getActiveSheet(0)->setCellValue('C' . $x, $value['Name']);
					$spreadsheet->getActiveSheet(0)->setCellValue('D' . $x, $value['ReqNo']);
					$spreadsheet->getActiveSheet(0)->setCellValue('E' . $x, $value['StartReq']);
					$spreadsheet->getActiveSheet(0)->setCellValue('F' . $x, $value['EndReq']);
					$spreadsheet->getActiveSheet(0)->setCellValue('G' . $x, $value['Duration1']);



					$spreadsheet->getActiveSheet(0)->setCellValue('H' . $x, $value['BudgetId']);
					$spreadsheet->getActiveSheet(0)->setCellValue('I' . $x, $value['StartReq2']);
					$spreadsheet->getActiveSheet(0)->setCellValue('J' . $x, $value['EndedAt2']);
					$spreadsheet->getActiveSheet(0)->setCellValue('K' . $x, $value['Duration2']);
					// $spreadsheet->getActiveSheet()->getStyle('H'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('33FFFF');
					// $spreadsheet->getActiveSheet()->getStyle('I'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('33FFFF');
					// $spreadsheet->getActiveSheet()->getStyle('J'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('33FFFF');
					// $spreadsheet->getActiveSheet()->getStyle('K'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('33FFFF');
					// $spreadsheet->getActiveSheet()->getStyle('D'. $x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF7F');
					// $spreadsheet->getActiveSheet()->getStyle('E'. $x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF7F');
					// $spreadsheet->getActiveSheet()->getStyle('F'. $x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF7F');
					// $spreadsheet->getActiveSheet()->getStyle('G'. $x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF7F');
					// $spreadsheet->getActiveSheet()->getStyle('L'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('F5F5DC');
					// $spreadsheet->getActiveSheet()->getStyle('M'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('F5F5DC');
					// $spreadsheet->getActiveSheet()->getStyle('N'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('F5F5DC');
					// $spreadsheet->getActiveSheet()->getStyle('O'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('F5F5DC');
					// $spreadsheet->getActiveSheet()->getStyle('P'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF00');
					// $spreadsheet->getActiveSheet()->getStyle('Q'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF00');
					// $spreadsheet->getActiveSheet()->getStyle('R'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF00');
					// $spreadsheet->getActiveSheet()->getStyle('S'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('00FF00');
					// $spreadsheet->getActiveSheet()->getStyle('T'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCFFCC');
					// $spreadsheet->getActiveSheet()->getStyle('U'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCFFCC');
					// $spreadsheet->getActiveSheet()->getStyle('V'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCFFCC');
					// $spreadsheet->getActiveSheet()->getStyle('W'.$x)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('CCFFCC');


					$spreadsheet->getActiveSheet(0)->setCellValue('L' . $x, $value['EwfNo']);
					$spreadsheet->getActiveSheet(0)->setCellValue('M' . $x, $value['StartRe3']);
					$spreadsheet->getActiveSheet(0)->setCellValue('N' . $x, $value['EndReq3']);
					$spreadsheet->getActiveSheet(0)->setCellValue('O' . $x, $value['Duration3']);


					$spreadsheet->getActiveSheet(0)->setCellValue('P' . $x, $value['RegId']);
					$spreadsheet->getActiveSheet(0)->setCellValue('Q' . $x, $value['StartReq4']);
					$spreadsheet->getActiveSheet(0)->setCellValue('R' . $x, $value['EndReq4']);
					$spreadsheet->getActiveSheet(0)->setCellValue('S' . $x, $value['Duration4']);


					$spreadsheet->getActiveSheet(0)->setCellValue('T' . $x, $value['BuyerId']);
					$spreadsheet->getActiveSheet(0)->setCellValue('U' . $x, $value['StartReq5']);
					$spreadsheet->getActiveSheet(0)->setCellValue('V' . $x, $value['EndReq5']);
					$spreadsheet->getActiveSheet(0)->setCellValue('W' . $x, $value['Duration5']);

					$spreadsheet->getActiveSheet(0)->setCellValue('X' . $x, $value['LopNo']);
					$spreadsheet->getActiveSheet(0)->setCellValue('Y' . $x, $value['StartReq6']);
					$spreadsheet->getActiveSheet(0)->setCellValue('Z' . $x, $value['EndReq6']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AA' . $x, $value['Duration6']);

					$spreadsheet->getActiveSheet(0)->setCellValue('AB' . $x, $value['PrNo']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AC' . $x, $value['StartReq7']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AD' . $x, $value['EndReq7']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AE' . $x, $value['Duration7']);

					$spreadsheet->getActiveSheet(0)->setCellValue('AF' . $x, $value['PoNo']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AG' . $x, $value['StartReq8']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AH' . $x, $value['EndReq8']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AI' . $x, $value['Duration8']);

					$spreadsheet->getActiveSheet(0)->setCellValue('AF' . $x, $value['PoNo']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AG' . $x, $value['StartReq8']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AH' . $x, $value['EndReq8']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AI' . $x, $value['Duration8']);

					$spreadsheet->getActiveSheet(0)->setCellValue('AJ' . $x, $value['GrNo']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AK' . $x, $value['StartReq9']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AL' . $x, $value['EndReq9']);
					$spreadsheet->getActiveSheet(0)->setCellValue('AM' . $x, $value['Duration9']);
					$x++;
				}

				header('Content-Type: application/vnd.ms-excel');
				header('Content-Disposition: attachment;filename=' . $filename . '');
				header('Cache-Control: max-age=0');

				$writer = new Xlsx($spreadsheet);
				$writer->save('php://output');
			} else {
				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();
				header('Content-Type: application/vnd.ms-excel');
				header('Content-Disposition: attachment;filename="GeneratedFile.xlsx"');
				header('Cache-Control: max-age=0');

				$writer = new Xlsx($spreadsheet);
				$writer->save('php://output');
			}
		} else {
			$this->load->view('pageadmin/login'); //Memanggil function render_view
		}
	}
}
