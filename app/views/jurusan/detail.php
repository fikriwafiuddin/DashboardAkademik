<?php

$jurusan = $data['jurusan'];

?>

<main class="p-6">
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
        <div class="flex gap-2 mt-4">
            <a class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="<?= BASEURL ?>/jurusan/index">Kembali</a>
            <button type="button" id="openModalEditJurusan" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
        </div>
        <h2 class="text-2xl font-semibold">Detail Dosen</h2>
        <div class="grid grid-cols-3 gap-y-2 text-gray-700 mt-4">
            <div class="font-medium">Id</div>
            <div class="col-span-2">: <?= htmlspecialchars($jurusan['jurid']) ?></div>

            <div class="font-medium">Nama</div>
            <div class="col-span-2">: <?= htmlspecialchars($jurusan['nama_jurusan']) ?></div>
        </div>
        <h3 class="text-xl font-semibold mt-6">Data dosen:</h3>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIDN</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fakultas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jabatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($data['dosen'] as $col) : ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $col['nidn'] ?></td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900"><?= $col['nama_dosen'] ?></div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $col['jurusan'] ?></td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <?= $col['jabatan'] ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="<?= BASEURL; ?>/dosen/detail/<?= $col['nidn'] ?>" class="text-blue-600 hover:text-blue-900 mr-3">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?= BASEURL; ?>/dosen/delete/<?= $col['nidn'] ?>" class="text-red-600 hover:text-red-900">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>


<div id="modalEditJurusan" class="fixed hidden inset-0 bg-black/20 flex justify-center items-center">
    <div class="bg-white rounded w-full max-w-md p-8 relative">
        <button id="closeModalEditJurusan" type="button" class="absolute top-2 right-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <h2 class="text-center text-2xl font-medium mb-3">Form Edit Jurusan</h2>
        <form id="formEditJurusan" action="<?= BASEURL; ?>/jurusan/edit" method="post">
            <div class="space-y-2">
                <input type="hidden" name="jurid" value="<?= $jurusan['jurid'] ?>">
                <div class="flex flex-col">
                    <label for="nama_jurusan">Nama</label>
                    <input type="text" value="<?= $jurusan['nama_jurusan'] ?>" class="bg-gray-100 py-2 px-1" name="nama_jurusan" id="nama_jurusan">
                </div>
            </div>
            <button id="submitBtn" type="submit" class="bg-blue-600 hover:bg-blue-700 w-full py-2 text-white rounded mt-3">Submit</button>
        </form>
    </div>
</div>