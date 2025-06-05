<?php if (isset($_SESSION['flash'])): ?>
    <?php
        $flash = $_SESSION['flash'];
        $colors = [
            'success' => 'green',
            'error' => 'red',
            'danger' => 'red',
            'warning' => 'yellow',
            'info' => 'blue'
        ];
        $color = $colors[$flash['status']] ?? 'gray';
    ?>
    <div id="flash-message" 
        class="fixed top-4 right-4 z-50 w-full max-w-sm transition-opacity duration-700 opacity-100">
        <div class="flex items-center justify-between bg-<?= $color ?>-100 border-l-4 border-<?= $color ?>-500 text-<?= $color ?>-700 p-4 rounded shadow-lg" role="alert">
            <p class="font-medium"><?= htmlspecialchars($flash['message']) ?></p>
            <button onclick="hideFlash()" 
                    class="text-<?= $color ?>-700 hover:text-<?= $color ?>-900 font-bold text-xl leading-none">&times;</button>
        </div>
    </div>

    <script>
        const flash = document.getElementById('flash-message');

        // Auto-hide after 4 seconds
        setTimeout(() => {
            if (flash) {
                flash.classList.add('opacity-0');
                setTimeout(() => flash.remove(), 700); // remove after fade out
            }
        }, 4000);

        // Manual close
        function hideFlash() {
            if (flash) {
                flash.classList.add('opacity-0');
                setTimeout(() => flash.remove(), 700);
            }
        }
    </script>
<?php unset($_SESSION['flash']); endif; ?>
