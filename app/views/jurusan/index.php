<?php Flaser::flash(); ?>
<main class="p-6">
    <div class="bg-white mt-4 rounded-xl shadow-sm p-6 border border-gray-100">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center">
                <h3 class="text-lg font-semibold text-gray-800">Data Jurusan</h3>
                <div class="flex space-x-2 mt-4 sm:mt-0">
                    <button id="openModalAddJurusan" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                        <i class="fas fa-plus mr-2"></i>Tambah Jurusan
                    </button>
                    <button id="openModalEksJur" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg transition-colors duration-200">
                        <i class="fas fa-download mr-2"></i>Export
                    </button>
                </div>
            </div>
        </div>
        <form action="<?= BASEURL ?>/jurusan/index" method="get">
            <div class="mb-4 flex gap-2">
                <input type="text" name="search" placeholder="Cari jurusan..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                <button type="submit" class="bg-blue-600 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </form>
        <div class="overflow-x-auto">
            <table class="min-w-full mt-4  divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah Dosen</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" colspan="2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($data['jurusan'] as $col) : ?>
                        <tr class="hover:bg-gray-50">
                            <?php foreach ($col as $key => $value) : ?>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= $value ?></td>
                            <?php endforeach; ?>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="<?= BASEURL; ?>/jurusan/detail/<?= $col['jurid'] ?>" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>     
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?= count($data['jurusan']) > 0 ? "" : '<p class="text-center text-2xl font-bold text-gray-600 mt-8">Data jurusan tidak ditemukan</p>' ?>
    </div>
</main>

<div id="modalAddJurusan" class="fixed hidden inset-0 bg-black/20 flex justify-center items-center">
    <div class="bg-white rounded w-full max-w-md p-8 relative">
        <button id="closeModalAddJurusan" type="button" class="absolute top-2 right-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <h2 class="text-center text-2xl font-medium mb-3">Form Tambah Jurusan</h2>
        <form id="formAddJurusan" action="<?= BASEURL; ?>/jurusan/add" method="post">
            <div class="space-y-2">
                <div class="flex flex-col">
                    <label for="nama_jurusan">Nama</label>
                    <input type="text" class="bg-gray-100 py-2 px-1" name="nama_jurusan" id="nama_jurusan">
                </div>
            </div>
            <button id="submitBtn" type="submit" class="bg-blue-600 hover:bg-blue-700 w-full py-2 text-white rounded mt-3">Submit</button>
        </form>
    </div>
</div>
