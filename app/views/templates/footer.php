    <!-- Logout Modal -->
    <div id="logoutModal" class="fixed hidden inset-0 bg-gray-600/50 items-center justify-center z-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-xl max-w-sm w-full mx-4">
            <div class="flex items-center mb-4">
                <i class="fas fa-exclamation-triangle text-yellow-500 text-xl mr-3"></i>
                <h3 class="text-lg font-semibold">Konfirmasi Logout</h3>
            </div>
            <p class="text-gray-600 mb-6">Apakah Anda yakin ingin keluar dari dashboard?</p>
            <div class="flex space-x-4">
                <button id="cancelLogout" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                    Batal
                </button>
                <a href="<?= BASEURL ?>/auth/logout" class="flex-1 text-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-200">
                    Logout
                </a>
            </div>
        </div>
    </div>

    <!-- Modal Eksport Dosen -->
    <div id="modalEksDsn" class="fixed hidden inset-0 bg-gray-600/50 items-center justify-center z-50 flex justify-center items-center">
        <div class="relative bg-white p-6 rounded-lg shadow-xl max-w-sm w-full mx-4">
            <button id="closeModalEksDsn" class="absolute top-2 right-3" type="button"><i class="fa-solid fa-xmark"></i></button>
            <div class="flex items-center mb-4">
                <i class="fas fa-download mr-2"></i>
                <h3 class="text-lg font-semibold">Eksport Data Dosen</h3>
            </div>
            <p class="text-gray-600 mb-6">Pilih dokumen</p>
            <div class="flex space-x-4">
                <a href="<?= BASEURL ?>/dosen/exportExcel" id="cancelLogout" class="flex-1 text-center px-4 py-2 bg-green-500 rounded-lg text-white hover:bg-green-600 transition-colors duration-200">
                    <i class="fa-solid fa-file-excel"></i> EXCEL
                </a>
                <a href="<?= BASEURL ?>/dosen/exportPdf" class="flex-1 text-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-200">
                    <i class="fa-solid fa-file-pdf"></i> PDF
                </a>
            </div>
        </div>
    </div>

    <!-- Modal Eksport Jurusan -->
    <div id="modalEksJur" class="fixed hidden inset-0 bg-gray-600/50 items-center justify-center z-50 flex justify-center items-center">
        <div class="relative bg-white p-6 rounded-lg shadow-xl max-w-sm w-full mx-4">
            <button id="closeModalEksJur" class="absolute top-2 right-3" type="button"><i class="fa-solid fa-xmark"></i></button>
            <div class="flex items-center mb-4">
                <i class="fas fa-download mr-2"></i>
                <h3 class="text-lg font-semibold">Eksport Data Jurusan</h3>
            </div>
            <p class="text-gray-600 mb-6">Pilih dokumen</p>
            <div class="flex space-x-4">
                <a href="<?= BASEURL ?>/dosen/exportExcel" id="cancelLogout" class="flex-1 text-center px-4 py-2 bg-green-500 rounded-lg text-white hover:bg-green-600 transition-colors duration-200">
                    <i class="fa-solid fa-file-excel"></i> EXCEL
                </a>
                <a href="<?= BASEURL ?>/jurusan/exportPdf" class="flex-1 text-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-200">
                    <i class="fa-solid fa-file-pdf"></i> PDF
                </a>
            </div>
        </div>
    </div>

    <script>
        // Navigation functionality
        const navItems = document.querySelectorAll('.nav-item');
        const contentSections = document.querySelectorAll('.content-section');
        const pageTitle = document.getElementById('pageTitle');
    </script>
    <script src="<?= BASEURL; ?>/js/script.js"></script>
</body>
</html>