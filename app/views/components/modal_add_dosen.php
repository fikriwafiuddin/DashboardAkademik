<div id="modalAddDosen" class="fixed hidden inset-0 bg-black/20 flex justify-center items-center">
    <div class="bg-white rounded w-full max-w-md p-8 relative">
        <button id="closeModalAddDosen" type="button" class="absolute top-2 right-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
        <h2 class="text-center text-2xl font-medium mb-3">Form Tambah Dosen</h2>
        <form action="" method="post">
            <div class="space-y-2">
                <div class="flex flex-col">
                    <label for="nidn">NIDN</label>
                    <input type="text" class="bg-gray-100 py-2 px-1" name="nidn" id="nidn">
                </div>
                <div class="flex flex-col">
                    <label for="nama">Nama</label>
                    <input type="text" class="bg-gray-100 py-2 px-1" name="nama" id="nama">
                </div>
                <div class="flex flex-col">
                    <label for="nama">Tanggal Lahir</label>
                    <input type="date" class="bg-gray-100 py-2 px-1" name="nama" id="nama">
                </div>
                <div class="flex flex-col">
                    <label for="alamata">Alamat</label>
                    <textarea name="alamat" class="bg-gray-100 py-2 px-1" id="alamat" cols="5"></textarea>
                </div>
                <div class="flex flex-col">
                    <label for="jabatan">Jabatan</label>
                    <select name="jabatan" id="jabatan" class="bg-gray-100 py-2 px-1">
                        <?php foreach ($data['jabatan'] as $jabatan) : ?>
                            <option value="<?= $jabatan['jbtid'] ?>"><?= $jabatan['nama_jabatan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="jurusan">jurusan</label>
                    <select name="jurusan" id="jurusan" class="bg-gray-100 py-2 px-1"></select>
                </div>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 w-full py-2 text-white rounded mt-3">Submit</button>
        </form>
    </div>
</div>

<?php var_dump($data['jabatan'])?>