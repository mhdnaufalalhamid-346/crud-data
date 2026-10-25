
<?php
include "koneksi.php";

$no = filter_input(INPUT_GET, "no", FILTER_VALIDATE_INT);

if ($no === false || $no === null || $no <= 0) {
    die("Nomor mahasiswa tidak valid.");
}

$query = mysqli_prepare(
    $koneksi,
    "DELETE FROM mahasiswa WHERE no = ?"
);

mysqli_stmt_bind_param($query, "i", $no);

if (mysqli_stmt_execute($query)) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menghapus data.";
}
?>