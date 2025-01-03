<?php
include 'config.php';


$search = '';


if (isset($_GET['search'])) {
    $search = $_GET['search'];
    
    $stmt = $conn->prepare("SELECT * FROM inventaris WHERE nama_barang LIKE ?");
    $searchParam = "%" . $search . "%"; 
    $stmt->bind_param("s", $searchParam);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM inventaris");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Inventaris Perusahaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Data Inventaris Perusahaan</h1>
    <a href="create.php">Tambah Inventaris</a>
    
    <!-- Search Form -->
    <form method="GET" action="">
        
        <input type="text" id="searchInput" name="search" placeholder="Cari nama barang..." value="<?php echo htmlspecialchars($search); ?>">
  
    </form>
    
    <table border="1">
        <tr>
            <th>No.</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['kategori']; ?></td>
            <td><?php echo $row['jumlah']; ?></td>
            <td>
                <a href="update.php?id=<?php echo $row['id']; ?>">
                    <button class="edit">Edit</button>
                </a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    <button class="delete">Hapus</button>
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>