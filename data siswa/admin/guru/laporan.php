<?php
include '../koneksi.php';

// Ambil data guru dari database
$result = $koneksi->query("SELECT * FROM guru WHERE id ORDER BY id DESC");
$tanggal = date("d-m-Y");
// Header laporan
echo '<html>';
echo '<head>';
echo '<title>Laporan Data Guru</title>';
echo '<style>';
echo 'table {border-collapse: collapse; width: 100%;}';
echo 'th, td {border: 1px solid #ddd; padding: 8px; text-align: left;}';
echo 'th {background-color: #f2f2f2;}';
echo '</style>';
echo '</head>';
echo '<body>';
echo '<h2>Laporan Data Guru</h2>';
echo '<p> Tanggal Cetak : ' . $tanggal . '</p>';

// Tabel untuk menampilkan data guru
echo '<table>';
echo '<tr>';
echo '<th>NIP</th>';
echo '<th>Nama</th>';
echo '<th>Alamat</th>';
echo '<th>Nomor Telepon</th>';
echo '<th>Email</th>';
echo '<th>Tanggal Lahir</th>';
echo '<th>Jenis Kelamin</th>';
echo '<th>Bidang Pengajaran</th>';
echo '<th>Pendidikan Terakhir</th>';
echo '<th>Pengalaman Kerja</th>';
echo '<th>Gambar</th>';
echo '</tr>';

// Loop untuk menampilkan data guru
while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['nip'] . '</td>';
    echo '<td>' . $row['nama'] . '</td>';
    echo '<td>' . $row['alamat'] . '</td>';
    echo '<td>' . $row['nomor_telepon'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['tanggal_lahir'] . '</td>';
    echo '<td>' . $row['jenis_kelamin'] . '</td>';
    echo '<td>' . $row['bidang_pengajaran'] . '</td>';
    echo '<td>' . $row['pendidikan_terakhir'] . '</td>';
    echo '<td>' . $row['pengalaman_kerja'] . '</td>';
    echo '<td><img src="uploads/' . $row['gambar'] . '" alt="" style="width: 100px;"></td>';
    echo '</tr>';
}

echo '</table>';

// Footer laporan
echo '</body>';
echo '<script>
';
echo 'window.onload = function() { window.print(); }'; // Mencetak otomatis saat halaman dimuat
echo '
</script>';
echo '

</html>';
