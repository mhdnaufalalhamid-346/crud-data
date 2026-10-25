
<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
</head>
<body>

    <h2>Data Mahasiswa</h2>

    <a href="tambah.php">Tambah Mahasiswa</a>

    <br><br>

    <table border="1" cellpadding="8">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Aksi</th>
        </tr>

        <?php
        while ($data = mysqli_fetch_assoc($query)) {
        ?>

        <tr>
            <td><?php echo $data['no']; ?></td>

            <td><?php echo htmlspecialchars($data['nama']); ?></td>

            <td><?php echo htmlspecialchars($data['nim']); ?></td>

            <td>
                <a href="edit.php?no=<?php echo $data['no']; ?>">Edit</a>

                |

                <a href="hapus.php?no=<?php echo $data['no']; ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                   Hapus
                </a>
            </td>
        </tr>

        <?php
        }
        ?>

    </table>

</body>
</html>