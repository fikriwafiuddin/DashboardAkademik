<?php
$current_url = $_SERVER['REQUEST_URI'];

$nav_links = [
    [
        "url" => 'dashboard',
        "title" => 'Dashboard',
        "icon" => 'fas fa-tachometer-alt'
    ],
    [
        "url" => 'dosen',
        "title" => 'Data Dosen',
        "icon" => 'fas fa-chalkboard-teacher'
    ],
    [
        "url" => 'jurusan',
        "title" => 'Data Jurusan',
        "icon" => 'fas fa-user-graduate'
    ]
]
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Akademik</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation Sidebar -->
    <div id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-blue-800 to-blue-900 transform transition-transform duration-300 ease-in-out">
        <div class="flex items-center justify-center h-16 bg-blue-900">
            <h1 class="text-white text-xl font-bold">
                <i class="fas fa-graduation-cap mr-2"></i>Dashboard Akademik
            </h1>
        </div>
        
        <nav class="mt-8">
            <div class="px-4 space-y-2">
                <?php foreach ($nav_links as $link) : ?>
                    <a
                    href="<?= BASEURL; ?>/<?= $link['url'] ?>/index" 
                    class="<?= strpos($current_url, $link['url']) !== false ? "bg-blue-700" : "hover:bg-blue-700" ?> nav-item flex items-center px-4 py-3 text-white hover:bg-blue-700 rounded-lg transition-colors duration-200"
                    data-section="<?= $link['url'] ?>">
                        <i class="<?= $link['icon'] ?> mr-3"></i>
                        <span><?= $link['title'] ?></span>
                    </a>
                <?php endforeach; ?>
                <a href="#" class="nav-item flex items-center px-4 py-3 text-white hover:bg-blue-700 rounded-lg transition-colors duration-200" data-section="laporan">
                    <i class="fas fa-chart-bar mr-3"></i>
                    <span>Laporan</span>
                </a>
            </div>
        </nav>
    </div>

        <!-- Main Content -->
    <div class="ml-64">
        <!-- Top Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center">
                    <button id="sidebarToggle" class="text-gray-500 hover:text-gray-700 focus:outline-none lg:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h2 id="pageTitle" class="text-2xl font-semibold text-gray-800 ml-4">Dashboard Overview</h2>
                </div>
                
                <div class="flex items-center space-x-4">
                    <div class="flex items-center space-x-2 text-gray-600">
                        <i class="fas fa-user-circle text-2xl"></i>
                        <span class="hidden md:block"><?= $_SESSION['user']['username'] ?></span>
                    </div>
                    <button id="logoutBtn" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        <span class="hidden md:block">Logout</span>
                    </button>
                </div>
            </div>
        </header>