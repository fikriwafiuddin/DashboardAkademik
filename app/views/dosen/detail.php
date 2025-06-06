<?php

$dosen = $data['dosen'];
$jabatan = $data['jabatan'];
$jurusan = $data['jurusan'];

?>

<main class="p-6">
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <h2 class="text-2xl font-semibold">Detail Dosen</h2>
        <div class="grid grid-cols-3 gap-y-2 text-gray-700 mt-4">
            <div class="font-medium">Nama</div>
            <div class="col-span-2">: <?= htmlspecialchars($data['dosen']['nama_dosen']) ?></div>

            <div class="font-medium">NIDN</div>
            <div class="col-span-2">: <?= htmlspecialchars($data['dosen']['nidn']) ?></div>

            <div class="font-medium">Tanggal Lahir</div>
            <div class="col-span-2">: <?= htmlspecialchars($data['dosen']['tanggal_lahir']) ?></div>

            <div class="font-medium">Alamat</div>
            <div class="col-span-2">: <?= htmlspecialchars($data['dosen']['alamat']) ?></div>

            <div class="font-medium">Jurusan</div>
            <div class="col-span-2">: <?= htmlspecialchars($data['dosen']['nama_jurusan']) ?></div>

            <div class="font-medium">Jabatan</div>
            <div class="col-span-2">: <?= htmlspecialchars($data['dosen']['nama_jabatan']) ?></div>
        </div>
        <div class="flex gap-2 mt-4">
            <a class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="<?= BASEURL ?>/dosen/index">Kembali</a>
            <button type="button" id="openModalEditDosen" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="<?= BASEURL ?>/dosen/index">Edit</button>
        </div>
    </div>
</main>

<div id="modalEditDosen" class="fixed hidden inset-0 bg-black/20 flex justify-center items-center">
    <div class="bg-white rounded w-full max-w-md p-8 relative">
        <button id="closeModalEditDosen" type="button" class="absolute top-2 right-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <h2 class="text-center text-2xl font-medium mb-3">Form Ubah Dosen</h2>
        <form id="formEditDosen" action="<?= BASEURL; ?>/dosen/update" method="post">
            <div class="space-y-2">
                <div class="flex flex-col">
                    <!-- <label for="nidn">NIDN</label> -->
                    <input type="hidden" value="<?= $dosen['nidn'] ?>" class="bg-gray-100 py-2 px-1" name="nidn" id="nidn">
                </div>
                <div class="flex flex-col">
                    <label for="nama_dosen">Nama</label>
                    <input type="text" value="<?= $dosen['nama_dosen'] ?>" class="bg-gray-100 py-2 px-1" name="nama_dosen" id="nama_dosen">
                </div>
                <div class="flex flex-col">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" value="<?= $dosen['tanggal_lahir'] ?>" class="bg-gray-100 py-2 px-1" name="tanggal_lahir" id="tanggal_lahir">
                </div>
                <div class="flex flex-col">
                    <label for="alamata">Alamat</label>
                    <textarea name="alamat" class="bg-gray-100 py-2 px-1" id="alamat" cols="5"><?= $dosen['alamat'] ?></textarea>
                </div>
                <div class="flex flex-col">
                    <label for="jbtid">Jabatan</label>
                    <select name="jbtid" value="<?= $dosen['jbtid'] ?>" id="jbtid" class="bg-gray-100 py-2 px-1">
                        <?php foreach ($jabatan as $jab) : ?>
                            <option value="<?= $jab['jbtid'] ?>"><?= $jab['nama_jabatan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="jurid">jurusan</label>
                    <select name="jurid" value="<?= $dosen['jurid'] ?>" id="jurid" class="bg-gray-100 py-2 px-1">
                        <?php foreach ($jurusan as $jur) : ?>
                            <option value="<?= $jur['jurid'] ?>"><?= $jur['nama_jurusan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button id="submitBtnEdit" type="submit" class="bg-blue-600 hover:bg-blue-700 w-full py-2 text-white rounded mt-3">Submit</button>
        </form>
    </div>
</div>