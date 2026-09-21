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

<?php if (!empty($portfolioProfile) && is_array($portfolioProfile)): ?>
    <!-- Data profil dari database (menimpa data bawaan di Code.js) -->
    <script>
        window.portfolioProfile = <?= json_encode(
            $portfolioProfile,
            JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT
        ) ?>;
    </script>
<?php endif; ?>

    <!-- JavaScript -->
    <script src="<?= $basePath ?>Code.js" defer></script>
</body>

</html>
