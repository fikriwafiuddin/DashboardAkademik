<?php

class Dosen extends Controller {
    public function index()
    {
        $limit = 5;
        $totalData = $this->model('Dosen_model')->getCountDosen();
        $totalPages = ceil($totalData / $limit);

        $page = isset($_GET['page']) && $_GET['page'] > 0 ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $data['dosen'] = $this->model('Dosen_model')->getAllDosen($offset, $limit);
        $data['jabatan'] = $this->model('Jabatan_model')->getAllJabatan();
        $data['jurusan'] = $this->model('Jurusan_model')->getAllJurusan();
        $data['totalPages'] = $totalPages;
        $data['page'] = $page;
        
        $this->view('templates/header');
        $this->view('dosen/index', $data);
        $this->view('templates/footer');
    }

    public function detail($nidn)
    {
        $data['dosen'] = $this->model('Dosen_model')->getDosenById($nidn);
        $data['jabatan'] = $this->model('Jabatan_model')->getAllJabatan();
        $data['jurusan'] = $this->model('Jurusan_model')->getAllJurusan();
        $this->view('templates/header');
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
}