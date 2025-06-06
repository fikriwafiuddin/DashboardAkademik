<?php

class Dashboard extends Controller {
    public function index()
    {
        $data_jurusan = $this->model('Jurusan_model')->getCountDosenPerJurusan();
        $data['nama_jurusan'] = array_column($data_jurusan, 'nama_jurusan');
        $data['jumlah_dosen_per_jurusan'] = array_column($data_jurusan, 'jumlah_dosen');

        $data['jumlah_jurusan'] = $this->model('Jurusan_model')->getCountJurusan();
        $data['jumlah_dosen'] = $this->model("Dosen_model")->getCountDosen();
        $data['title'] = 'Dashboard';
        $this->view('templates/header', $data);  
        $this->view('dashboard/index', $data);  
        $this->view('templates/footer');  
    }
}