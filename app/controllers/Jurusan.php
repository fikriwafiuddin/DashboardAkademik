<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jurusan extends Controller {
    public function index()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $jurusan = $this->model("Jurusan_model")->getAllJurusan($search);
        $data['jurusan'] = $jurusan;
        $data['title'] = 'Data Jurusan';
        $this->view('templates/header', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        $result = $this->model('Jurusan_model')->addJurusan($_POST);
        if ($result > 0) {
            Flaser::setFlash('Data jurusan berhasil ditambahkan', 'success', "tambah");
        } else {
            Flaser::setFlash('Data jurusan gagal ditambahkan', 'error', 'tambah');
        }

        header('Location: ' . BASEURL . '/jurusan/index');
        exit;
    }

    public function detail($id)
    {
        $data['jurusan'] = $this->model('Jurusan_model')->getJurusanById($id);
        $data['dosen'] = $this->model("Dosen_model")->getDosenByJurusan($id);
        $data['title'] = 'Detail Jurusan';
        $this->view("templates/header", $data);
        $this->view("jurusan/detail", $data);
        $this->view("templates/footer");
    }

    public function edit()
    {
        $result = $this->model('Jurusan_model')->updateJurusan($_POST);
        if ($result > 0) {
            Flaser::setFlash('Data jurusan berhasil diubah', 'success', "tambah");
        } else {
            Flaser::setFlash('Data jurusan gagal diubah', 'error', 'tambah');
        }

        header('Location: ' . BASEURL . '/jurusan/index');
        exit;
    }

    public function exportPdf()
    {
        $jurusan = $this->model('Jurusan_model')->getAllJurusan('');
        $data['jurusan'] = $jurusan;

        ob_start();
        $this->view('jurusan/export_pdf', $data);
        $html = ob_get_clean();

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('data-jurusan.pdf', 'D');
    }

    public function exportExcel()
    {
        $jurusan = $this->model('Jurusan_model')->getAllJurusan('');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Id');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Jumlah Dosen');

        $row = 2;
        $no = 1;
        foreach ($jurusan as $j) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $j['Id']);
            $sheet->setCellValue('C' . $row, $j['nama_jurusan']);
            $sheet->setCellValue('D' . $row, $j['jumlah_dosen']);
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data-jurusan.xlsx"');
        header('Cache-Control: max-age=0');

        $write = new Xlsx($spreadsheet);
        $write->save('php://output');
    }
}