<?php

class Dashboard extends Controller {
    public function index()
    {
        $data['jumlah_jurusan'] = $this->model('Jurusan_model')->getCountJurusan();
        $data['jumlah_dosen'] = $this->model("Dosen_model")->getCountJurusan();
        $this->view('templates/header');  
        $this->view('dashboard/index', $data);  
        $this->view('templates/footer');  
    }
}