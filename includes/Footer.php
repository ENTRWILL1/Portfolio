<?php

/*
|--------------------------------------------------------------------------
| FOOTER
|--------------------------------------------------------------------------
| Footer portfolio menutup <main>, memuat Code.js, lalu menutup </body>
| dan </html>. Untuk dashboard ($isDashboard = true) dipakai
| dashboard-footer.php.
*/

$isDashboard = $isDashboard ?? false;
$basePath    = $basePath    ?? ($isDashboard ? '../' : '');

if ($isDashboard) {
    require __DIR__ . '/dashboard-footer.php';
    return;
}

?>
    </main>

    <!-- ================= FOOTER ================= -->
    <footer class="footer">
        <div>
            <strong id="footerName">Willy Alfaro D.P</strong>
            <p>Built with HTML, CSS & JavaScript.</p>
        </div>
        <span>© 2026 Portfolio</span>
    </footer>

    <!-- JavaScript -->
    <script src="<?= $basePath ?>Code.js" defer></script>
</body>

</html>
