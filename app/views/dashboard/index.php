<?php Flaser::flash(); ?>

<?php

$jumlah_dosen_per_jurusan = $data['jumlah_dosen_per_jurusan'];
$nama_jurusan = $data['nama_jurusan'];

$jumlah_jurusan = $data['jumlah_jurusan'];
$jumlah_dosen = $data['jumlah_dosen'];

?>

<main class="p-6">
    <!-- Overview Section -->
    <div id="overview-section" class="content-section">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-full">
                        <i class="fas fa-chalkboard-teacher text-blue-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Total Dosen</p>
                        <p class="text-2xl font-bold text-gray-900"><?= $jumlah_dosen ?></p>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-full">
                        <i class="fas fa-user-graduate text-green-600 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-500">Total Jurusan</p>
                        <p class="text-2xl font-bold text-gray-900"><?= $jumlah_jurusan ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 hover:shadow-md transition-shadow mt-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">Grafik Jumlah Dosen per Jurusan</h2>
            <canvas id="dosenChart" height="100"></canvas>
        </div>
    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('dosenChart').getContext('2d');
    const dosenChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode($nama_jurusan) ?>,
            datasets: [{
                label: 'Jumlah Dosen',
                data: <?= json_encode($jumlah_dosen_per_jurusan) ?>,
                backgroundColor: '#3b82f6',
                borderRadius: 5,
                barThickness: 30,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: ctx => `Jumlah: ${ctx.raw}`
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
