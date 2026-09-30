<?php
$base = $base ?? '';
?>
    </main>
    <footer style="text-align: center; padding: 2rem 0; color: var(--text-muted); font-size: 0.875rem; border-top: 1px solid var(--border-color); margin-top: 3rem;">
        <p>&copy; <?php echo date('Y'); ?> <strong>SIMPUS-Mini v2.0</strong> — Sistem Informasi Perpustakaan berbasis PostgreSQL</p>
    </footer>

    <!-- JavaScript Interaktif -->
    <script src="<?php echo $base; ?>assets/js/app.js"></script>
    <?php if (!empty($extra_scripts)): foreach ($extra_scripts as $src): ?>
        <script src="<?php echo $src; ?>"></script>
    <?php endforeach; endif; ?>
</body>
</html>