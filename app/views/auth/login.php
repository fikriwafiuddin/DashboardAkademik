<?php Flaser::flash(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/style.css">
</head>
<body>
    <div class="h-screen w-screen px-3 flex justify-center items-center">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 w-full max-w-96">
            <h1 class="text-center text-2xl font-semibold">Login</h1>
            <p class="text-center text-xl">Dashboard Siakad</p>
            <form id="formLogin" action="<?= BASEURL ?>/auth/post_login" method="post">
                <div class="space-y-2 mt-6">
                    <div class="flex flex-col">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="bg-gray-100 py-2 px-1">
                    </div>
                    <div class="flex flex-col">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="bg-gray-100 py-2 px-1">
                    </div>
                </div>
                <button id="submitBtn" type="submit" class="w-full py-1 bg-blue-600 hover:bg-blue-700 text-white rounded mt-4">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>