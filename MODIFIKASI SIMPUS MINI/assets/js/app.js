document.addEventListener("DOMContentLoaded", function () {
    // 1. Fitur Pencarian / Filter Real-Time pada Tabel Data
    const searchInputs = document.querySelectorAll("input[name='search']");
    
    searchInputs.forEach(input => {
        input.addEventListener("keyup", function () {
            const filterText = this.value.toLowerCase();
            const tableRows = document.querySelectorAll(".data-table tbody tr");

            tableRows.forEach(row => {
                // Jangan sembunyikan baris jika berupa pesan 'data tidak ditemukan'
                if (row.children.length === 1) return;

                const textContent = row.textContent.toLowerCase();
                if (textContent.includes(filterText)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });

    // 2. Animasi Angka Penghitung pada Kartu Statistik (Dashboard)
    const statValues = document.querySelectorAll(".stat-value");
    
    statValues.forEach(counter => {
        const target = +counter.innerText.replace(/,/g, '');
        if (isNaN(target) || target === 0) return;

        let count = 0;
        const speed = Math.ceil(target / 30); // Kecepatan animasi

        const updateCount = () => {
            count += speed;
            if (count < target) {
                counter.innerText = count.toLocaleString('id-ID');
                setTimeout(updateCount, 25);
            } else {
                counter.innerText = target.toLocaleString('id-ID');
            }
        };

        updateCount();
    });

    // 3. Auto-Dismiss Notifikasi Alert setelah 4 Detik
    const alertBox = document.querySelector(".alert");
    if (alertBox) {
        setTimeout(() => {
            alertBox.style.transition = "opacity 0.5s ease";
            alertBox.style.opacity = "0";
            setTimeout(() => alertBox.remove(), 500);
        }, 4000);
    }

    // 4. Highlight Navigasi Aktif Otomatis Berdasarkan URL
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll(".nav-links a");

    navLinks.forEach(link => {
        const href = link.getAttribute("href");
        if (href && currentPath.includes(href.replace('../', '')) && href !== 'index.php') {
            link.classList.add("active");
        } else if ((currentPath.endsWith('/') || currentPath.endsWith('index.php')) && href.includes('index.php')) {
            link.classList.add("active");
        }
    });
});