<?php

$dosen = $data['dosen'];

?>

<h2>Data Dosen</h2>
<table border="1" width="100%" cellpadding="5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIDN</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Jurusan</th>
            <th>Jabatan</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($dosen as $d): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['nama_dosen'] ?></td>
                <td><?= $d['nidn'] ?></td>
                <td><?= $d['tanggal_lahir'] ?></td>
                <td><?= $d['alamat'] ?></td>
                <td><?= $d['jurusan'] ?></td>
                <td><?= $d['jabatan'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
