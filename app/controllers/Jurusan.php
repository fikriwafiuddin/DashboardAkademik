<?php

class Jurusan extends Controller {
    public function index()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : '';

        $jurusan = $this->model("Jurusan_model")->getAllJurusan($search);
        $data['jurusan'] = $jurusan;
        $this->view('templates/header');
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
        $this->view("templates/header");
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
}