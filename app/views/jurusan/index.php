<?php Flaser::flash(); ?>
<main class="p-6">
    <button id="openModalAddJurusan" type="button" class="bg-blue-600 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Tambah Jurusan +</button>

    <div class="bg-white mt-4 rounded-xl shadow-sm p-6 border border-gray-100">
        <form class="mt-2" action="<?= BASEURL ?>/jurusan/add" method="get">
            <input type="text" class="py-2 px-4 rounded shadow-sm bg-gray-100" name="search" id="search" placeholder="Cari dosen">
            <button type="submit" class="bg-blue-600 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <table class="w-full mt-4">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-3 py-1 text-left">Id</th>
                    <th class="px-3 py-1 text-left">Nama</th>
                    <th class="px-3 py-1 text-left" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody >
                <?php foreach ($data['jurusan'] as $col) : ?>
                    <tr>
                        <?php foreach ($col as $key => $value) : ?>
                            <td class="px-3 py-1"><?= $value ?></td>
                        <?php endforeach; ?>
                        <td class="px-3 py-1 flex gap-2 items-center">
                            <a href="<?= BASEURL; ?>/jurusan/detail/<?= $col['jurid'] ?>" class="px-2 bg-blue-600 text-white rounded-sm">detail</a>
                        </td>     
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
        <form action="<?= BASEURL; ?>/jurusan/add" method="post">
            <div class="space-y-2">
                <div class="flex flex-col">
                    <label for="nama_jurusan">Nama</label>
                    <input type="text" class="bg-gray-100 py-2 px-1" name="nama_jurusan" id="nama_jurusan">
                </div>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 w-full py-2 text-white rounded mt-3">Submit</button>
        </form>
    </div>
</div>
