EDIT.PHP

<?php
include "koneksi.php";

$no = (int) ($_GET['no'] ?? 0);

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM mahasiswa WHERE no = $no"
);

$data = mysqli_fetch_assoc($query);

if (!$data) {
    die("Data mahasiswa tidak ditemukan.");
}

if (isset($_POST['simpan'])) {

    $nama = trim($_POST['nama']);
    $nim = trim($_POST['nim']);

    if ($nama == "" || $nim == "") {
        echo "Nama dan NIM harus diisi!";
    } else {

        $query = mysqli_prepare(
            $koneksi,
            "UPDATE mahasiswa SET nama = ?, nim = ? WHERE no = ?"
        );

        mysqli_stmt_bind_param($query, "ssi", $nama, $nim, $no);

        if (mysqli_stmt_execute($query)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Gagal mengubah data. Pastikan NIM tidak digunakan mahasiswa lain.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mahasiswa</title>
</head>
<body>

    <h2>Edit Mahasiswa</h2>

    <form method="POST">

        <label>Nama:</label>

        <input
            type="text"
            name="nama"
            value="<?php echo htmlspecialchars($data['nama']); ?>"
            required
        >

        <br><br>

        <label>NIM:</label>

        <input
            type="text"
            name="nim"
            value="<?php echo htmlspecialchars($data['nim']); ?>"
            required
        >

        <br><br>

        <button type="submit" name="simpan">Simpan Perubahan</button>

    </form>

    <br>

    <a href="index.php">Kembali</a>

</body>
</html>