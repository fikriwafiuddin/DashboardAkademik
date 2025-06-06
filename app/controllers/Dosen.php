<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dosen extends Controller {
    public function index()
    {
        $limit = 5;
        $totalData = $this->model('Dosen_model')->getCountDosen();
        $totalPages = ceil($totalData / $limit);

        $page = isset($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $data['dosen'] = $this->model('Dosen_model')->getAllDosen($offset, $limit, $search);
        $data['jabatan'] = $this->model('Jabatan_model')->getAllJabatan();
        $data['jurusan'] = $this->model('Jurusan_model')->getAllJurusan('');
        $data['totalPages'] = $totalPages;
        $data['page'] = $page;
        $data['title'] = 'Data Dosen';

        $this->view('templates/header', $data);
        $this->view('dosen/index', $data);
        $this->view('templates/footer');
    }

    public function detail($nidn)
    {
        $data['dosen'] = $this->model('Dosen_model')->getDosenById($nidn);
        $data['jabatan'] = $this->model('Jabatan_model')->getAllJabatan();
        $data['jurusan'] = $this->model('Jurusan_model')->getAllJurusan();
        $data['title'] = 'Detail Dosen';
        $this->view('templates/header', $data);
        $this->view('dosen/detail', $data);
        $this->view('templates/footer');
    }

    public function add() {
        $result = $this->model('Dosen_model')->insertDosen($_POST);
        if ($result > 0) {
            Flaser::setFlash('Data dosen berhasil ditambahkan', 'success', "tambah");
        } else {
            Flaser::setFlash('Data dosen gagal ditambahkan', 'error', 'tambah');
        }
 
        header('Location: ' . BASEURL . '/dosen/index');
        exit;
    }

    public function delete($nidn)
    {
        $result = $this->model('Dosen_model')->deleteDosen($nidn);
                if ($result > 0) {
            Flaser::setFlash('Data dosen berhasil dihapus', 'success', 'hapus');
        } else {
            Flaser::setFlash('Data dosen gagal dihapus', 'error', 'hapus');
        }
 
        header('Location: ' . BASEURL . '/dosen/index');
        exit;
    }

    public function update() {
        $result = $this->model('Dosen_model')->updateDosen($_POST);
        if ($result > 0) {
            Flaser::setFlash('Data dosen berhasil diperbarui', 'success', "tambah");
        } else {
            Flaser::setFlash('Data dosen gagal diperbarui', 'error', 'tambah');
        }
 
        header('Location: ' . BASEURL . '/dosen/index');
        exit;
    }

    public function exportPdf()
    {
        $dosen = $this->model('Dosen_model')->getAllDosenComplete();
        $data['dosen'] = $dosen;

        ob_start();
        $this->view('dosen/export_pdf', $data);
        $html = ob_get_clean();

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $mpdf->Output('data-dosen.pdf', 'D');
    }

    public function exportExcel()
    {
        $dosen = $this->model('Dosen_model')->getAllDosenComplete();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'NIDN');
        $sheet->setCellValue('D1', 'Tanggal Lahir');
        $sheet->setCellValue('E1', "Alamat");
        $sheet->setCellValue('F1', 'Jurusan');
        $sheet->setCellValue('G1', 'Jabatan');

        $row = 2;
        $no = 1;
        foreach ($dosen as $d) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $d['nama']);
            $sheet->setCellValue('C' . $row, $d['nidn']);
            $sheet->setCellValue('D' . $row, $d['tanggal_lahir']);
            $sheet->setCellValue('E' . $row, $d['alamat']);
            $sheet->setCellValue('F' . $row, $d['jurusan']);
            $sheet->setCellValue('G' . $row, $d['jabatan']);
        }

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="data-dosen.xlsx"');
        header('Cache-Control: max-age=0');

        $write = new Xlsx($spreadsheet);
        $write->save('php://output');
    }
}