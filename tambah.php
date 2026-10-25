TAMBAH.PHP

<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];

    if ($nama == "" || $nim == "") {
        echo "Nama dan NIM harus diisi!";
    } else {

        $nama = mysqli_real_escape_string($koneksi, $nama);
        $nim = mysqli_real_escape_string($koneksi, $nim);

        $query = mysqli_query(
            $koneksi,
            "INSERT INTO mahasiswa (nama, nim)
             VALUES ('$nama', '$nim')"
        );

        if ($query) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal menambahkan data: " . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>

    <h2>Tambah Mahasiswa</h2>

    <form method="POST">

        <label>Nama:</label>
        <input type="text" name="nama" required>

        <br><br>

        <label>NIM:</label>
        <input type="text" name="nim" required>

        <br><br>

        <button type="submit" name="simpan">Simpan</button>

    </form>

    <br>

    <a href="index.php">Kembali</a>

</body>
</html>