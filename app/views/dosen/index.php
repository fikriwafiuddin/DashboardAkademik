<?php

Flaser::flash();

$totalPages = $data['totalPages'];
$page = $data['page'];

?>
<main class="p-6">
    <div id="dosen-section" class="content-section">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                    <h3 class="text-lg font-semibold text-gray-800">Data Dosen</h3>
                    <div class="flex space-x-2 mt-4 sm:mt-0">
                        <button id="openModalAddDosen" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                            <i class="fas fa-plus mr-2"></i>Tambah Dosen
                        </button>
                        <button id="openModalEksDsn" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                            <i class="fas fa-download mr-2"></i>Export
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="p-6">
                <form action="<?= BASEURL ?>/dosen/index" method="get">
                    <div class="mb-4 flex gap-2">
                        <input type="text" name="search" placeholder="Cari dosen..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
                
                <div class="overflow-x-auto">
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
                <?= count($data['dosen']) > 0 ? "" : '<p class="text-center text-2xl font-bold text-gray-600 mt-8">Data dosen tidak ditemukan</p>' ?>
            
            <nav aria-label="Page navigation">
                <ul class="flex items-center justify-center gap-1 mt-4">

                    <!-- Tombol Previous -->
                    <li>
                        <a href="?<?= http_build_query(['page' => max(1, $page - 1)]) ?>"
                        class="px-3 py-1 rounded-md border text-sm font-medium text-blue-600 border-blue-600
                                <?= $page <= 1 ? 'bg-blue-600 text-white cursor-not-allowed' : 'hover:bg-blue-600 hover:text-white' ?>">
                            &laquo; Prev
                        </a>
                    </li>

                    <?php
                    $range = 1; // range kiri-kanan dari halaman aktif
                    $start = max(1, $page - $range);
                    $end = min($totalPages, $page + $range);

                    if ($start > 1) {
                        echo '<li><a href="?'.http_build_query(['page' => 1]).'" class="px-3 py-1 rounded-md border border-blue-600 text-blue-600 text-sm font-medium hover:bg-blue-600 hover:text-white">1</a></li>';
                        if ($start > 2) echo '<li><span class="px-3 py-1 text-sm">...</span></li>';
                    }

                    for ($i = $start; $i <= $end; $i++): ?>
                        <li>
                            <a href="?<?= http_build_query(['page' => $i]) ?>"
                            class="px-3 py-1 rounded-md border border-blue-600 text-blue-600 text-sm font-medium
                                    <?= $i == $page ? 'bg-blue-600 text-white' : 'hover:text-white hover:bg-blue-600' ?>">
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor;

                    if ($end < $totalPages) {
                        if ($end < $totalPages - 1) echo '<li><span class="px-3 py-1 text-sm">...</span></li>';
                        echo '<li><a href="?'.http_build_query(['page' => $totalPages]).'" class="px-3 py-1 rounded-md border border-blue-600 text-blue-600 text-sm font-medium hover:bg-blue-600 hover:text-white">'.$totalPages.'</a></li>';
                    }
                    ?>

                    <!-- Tombol Next -->
                    <li>
                        <a href="?<?= http_build_query(['page' => min($totalPages, $page + 1)]) ?>"
                        class="px-3 py-1 rounded-md text-sm font-medium text-blue-600 border border-blue-600
                                <?= $page >= $totalPages ? 'bg-blue-600 text-white cursor-not-allowed' : 'hover:bg-blue-600 hover:text-white' ?>">
                            Next &raquo;
                        </a>
                    </li>

                </ul>
            </nav>


            </div>
        </div>
    </div>
</main>

<div id="modalAddDosen" class="fixed hidden inset-0 bg-black/20 flex justify-center items-center">
    <div class="bg-white rounded w-full max-w-md p-8 relative">
        <button id="closeModalAddDosen" type="button" class="absolute top-2 right-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <h2 class="text-center text-2xl font-medium mb-3">Form Tambah Dosen</h2>
        <form id="formAddDosen" action="<?= BASEURL; ?>/dosen/add" method="post">
            <div class="space-y-2">
                <div class="flex flex-col">
                    <label for="nidn">NIDN</label>
                    <input type="text" class="bg-gray-100 py-2 px-1" name="nidn" id="nidn">
                </div>
                <div class="flex flex-col">
                    <label for="nama_dosen">Nama</label>
                    <input type="text" class="bg-gray-100 py-2 px-1" name="nama_dosen" id="nama_dosen">
                </div>
                <div class="flex flex-col">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="bg-gray-100 py-2 px-1" name="tanggal_lahir" id="tanggal_lahir">
                </div>
                <div class="flex flex-col">
                    <label for="alamata">Alamat</label>
                    <textarea name="alamat" class="bg-gray-100 py-2 px-1" id="alamat" cols="5"></textarea>
                </div>
                <div class="flex flex-col">
                    <label for="jbtid">Jabatan</label>
                    <select name="jbtid" id="jbtid" class="bg-gray-100 py-2 px-1">
                        <?php foreach ($data['jabatan'] as $jabatan) : ?>
                            <option value="<?= $jabatan['jbtid'] ?>"><?= $jabatan['nama_jabatan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="jurid">jurusan</label>
                    <select name="jurid" id="jurid" class="bg-gray-100 py-2 px-1">
                        <?php foreach ($data['jurusan'] as $jurusan) : ?>
                            <option value="<?= $jurusan['jurid'] ?>"><?= $jurusan['nama_jurusan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <button id="submitBtn" type="submit" class="bg-blue-600 hover:bg-blue-700 w-full py-2 text-white rounded mt-3">Submit</button>
        </form>
    </div>
</div>