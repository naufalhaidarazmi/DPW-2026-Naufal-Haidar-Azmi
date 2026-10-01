// Initial Mock Data jika Storage Masih Kosong
const initialBuku = [
    { id: 1, judul: "Pemrograman Web Modern", pengarang: "Fulan", tahun: 2024, kategori: "Teknologi", stok: 15 },
    { id: 2, judul: "Struktur Data & Algoritma", pengarang: "Fulani", tahun: 2023, kategori: "Sains", stok: 2 }
];

const initialAnggota = [
    { id: 1, no_anggota: "ANG-202609-001", nama: "Naufal Haidar", alamat: "Malang", no_hp: "08123456789" }
];

// Helper LocalStorage
function getBuku() {
    return JSON.parse(localStorage.getItem('simpus_buku')) || initialBuku;
}
function saveBuku(data) {
    localStorage.setItem('simpus_buku', JSON.stringify(data));
}
function getAnggota() {
    return JSON.parse(localStorage.getItem('simpus_anggota')) || initialAnggota;
}
function saveAnggota(data) {
    localStorage.setItem('simpus_anggota', JSON.stringify(data));
}

// Inisialisasi Data Pertama Kali
if (!localStorage.getItem('simpus_buku')) saveBuku(initialBuku);
if (!localStorage.getItem('simpus_anggota')) saveAnggota(initialAnggota);

// --- RENDER DASHBOARD ---
function renderDashboard() {
    const buku = getBuku();
    const anggota = getAnggota();
    
    document.getElementById('totalBuku').innerText = buku.length;
    document.getElementById('totalAnggota').innerText = anggota.length;
    
    const totalStok = buku.reduce((acc, curr) => acc + parseInt(curr.stok), 0);
    document.getElementById('totalStok').innerText = totalStok;
    
    const stokKritis = buku.filter(b => parseInt(b.stok) <= 3).length;
    document.getElementById('stokKritis').innerText = stokKritis;

    // Render Tabel Dashboard (5 Teratas)
    const tbody = document.getElementById('tbodyDashboard');
    if (tbody) {
        tbody.innerHTML = '';
        buku.slice(0, 5).forEach(b => {
            let badge = b.stok > 3 ? '<span class="badge bg-success">Tersedia ('+b.stok+')</span>' :
                       (b.stok > 0 ? '<span class="badge bg-warning text-dark">Kritis ('+b.stok+')</span>' : '<span class="badge bg-danger">Habis</span>');
            tbody.innerHTML += `
                <tr>
                    <td><strong>${b.judul}</strong></td>
                    <td>${b.pengarang}</td>
                    <td>${b.tahun}</td>
                    <td><span class="badge bg-light text-dark">${b.kategori}</span></td>
                    <td>${badge}</td>
                </tr>
            `;
        });
    }
}

// --- RENDER & CRUD BUKU ---
function renderBukuTable(search = '') {
    const tbody = document.getElementById('tbodyBuku');
    if (!tbody) return;
    
    let list = getBuku();
    if (search) {
        list = list.filter(b => b.judul.toLowerCase().includes(search.toLowerCase()) || b.pengarang.toLowerCase().includes(search.toLowerCase()));
    }
    
    tbody.innerHTML = '';
    list.forEach((b, idx) => {
        let badge = b.stok > 3 ? `<span class="badge bg-success">Tersedia (${b.stok})</span>` :
                   (b.stok > 0 ? `<span class="badge bg-warning text-dark">Kritis (${b.stok})</span>` : `<span class="badge bg-danger">Habis</span>`);
        tbody.innerHTML += `
            <tr>
                <td>${idx + 1}</td>
                <td><strong>${b.judul}</strong></td>
                <td>${b.pengarang}</td>
                <td>${b.tahun}</td>
                <td><span class="badge bg-light text-dark border">${b.kategori}</span></td>
                <td>${badge}</td>
                <td>
                    <button class="btn btn-sm btn-outline-primary me-1" onclick="openEditBukuModal(${b.id})">✏️ Edit</button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteBuku(${b.id})">🗑️ Hapus</button>
                </td>
            </tr>
        `;
    });
}

function saveBukuForm(e) {
    e.preventDefault();
    const id = document.getElementById('bukuId').value;
    const judul = document.getElementById('bukuJudul').value;
    const pengarang = document.getElementById('bukuPengarang').value;
    const tahun = document.getElementById('bukuTahun').value;
    const kategori = document.getElementById('bukuKategori').value;
    const stok = document.getElementById('bukuStok').value;

    let list = getBuku();
    if (id) {
        // Edit
        list = list.map(b => b.id == id ? { id: parseInt(id), judul, pengarang, tahun, kategori, stok: parseInt(stok) } : b);
    } else {
        // Tambah
        const newId = Date.now();
        list.push({ id: newId, judul, pengarang, tahun, kategori, stok: parseInt(stok) });
    }
    
    saveBuku(list);
    bootstrap.Modal.getInstance(document.getElementById('bukuModal')).hide();
    renderBukuTable();
}

function openEditBukuModal(id) {
    const b = getBuku().find(item => item.id == id);
    if (!b) return;
    document.getElementById('bukuId').value = b.id;
    document.getElementById('bukuJudul').value = b.judul;
    document.getElementById('bukuPengarang').value = b.pengarang;
    document.getElementById('bukuTahun').value = b.tahun;
    document.getElementById('bukuKategori').value = b.kategori;
    document.getElementById('bukuStok').value = b.stok;
    document.getElementById('bukuModalLabel').innerText = "Edit Data Buku";
    new bootstrap.Modal(document.getElementById('bukuModal')).show();
}

function deleteBuku(id) {
    if (confirm("Apakah Anda yakin ingin menghapus buku ini?")) {
        let list = getBuku().filter(b => b.id != id);
        saveBuku(list);
        renderBukuTable();
    }
}

// --- RENDER & CRUD ANGGOTA ---
function renderAnggotaTable(search = '') {
    const tbody = document.getElementById('tbodyAnggota');
    if (!tbody) return;
    
    let list = getAnggota();
    if (search) {
        list = list.filter(a => a.nama.toLowerCase().includes(search.toLowerCase()) || a.no_anggota.toLowerCase().includes(search.toLowerCase()));
    }
    
    tbody.innerHTML = '';
    list.forEach((a, idx) => {
        tbody.innerHTML += `
            <tr>
                <td>${idx + 1}</td>
                <td><span class="badge bg-light text-dark border">${a.no_anggota}</span></td>
                <td><strong>${a.nama}</strong></td>
                <td>${a.alamat}</td>
                <td><code>${a.no_hp}</code></td>
                <td>
                    <button class="btn btn-sm btn-outline-primary me-1" onclick="openEditAnggotaModal(${a.id})">✏️ Edit</button>
                    <button class="btn btn-sm btn-outline-danger" onclick="deleteAnggota(${a.id})">🗑️ Hapus</button>
                </td>
            </tr>
        `;
    });
}

function saveAnggotaForm(e) {
    e.preventDefault();
    const id = document.getElementById('anggotaId').value;
    const no_anggota = document.getElementById('anggotaNo').value;
    const nama = document.getElementById('anggotaNama').value;
    const alamat = document.getElementById('anggotaAlamat').value;
    const no_hp = document.getElementById('anggotaHp').value;

    let list = getAnggota();
    if (id) {
        list = list.map(a => a.id == id ? { id: parseInt(id), no_anggota, nama, alamat, no_hp } : a);
    } else {
        list.push({ id: Date.now(), no_anggota, nama, alamat, no_hp });
    }
    
    saveAnggota(list);
    bootstrap.Modal.getInstance(document.getElementById('anggotaModal')).hide();
    renderAnggotaTable();
}

function openEditAnggotaModal(id) {
    const a = getAnggota().find(item => item.id == id);
    if (!a) return;
    document.getElementById('anggotaId').value = a.id;
    document.getElementById('anggotaNo').value = a.no_anggota;
    document.getElementById('anggotaNama').value = a.nama;
    document.getElementById('anggotaAlamat').value = a.alamat;
    document.getElementById('anggotaHp').value = a.no_hp;
    document.getElementById('anggotaModalLabel').innerText = "Edit Data Anggota";
    new bootstrap.Modal(document.getElementById('anggotaModal')).show();
}

function deleteAnggota(id) {
    if (confirm("Apakah Anda yakin ingin menghapus anggota ini?")) {
        let list = getAnggota().filter(a => a.id != id);
        saveAnggota(list);
        renderAnggotaTable();
    }
}