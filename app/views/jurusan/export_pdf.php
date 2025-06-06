<?php

$jurusan = $data['jurusan'];

?>

<h2>Data Jurusan</h2>
<table border="1" width="100%" cellpadding="5">
    <thead>
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama</th>
            <th>Jumlah Dosen</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; foreach ($jurusan as $j): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $j['jurid'] ?></td>
                <td><?= $j['nama_jurusan'] ?></td>
                <td><?= $j['jumlah_dosen'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
