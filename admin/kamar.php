<?php
$title = "Kamar"; // Definisikan Halaman.
$script = "kamar.script.php"; // Definisikan Tempat Script.
$modals = "kamar.modals.php";  // Definisikan Tempat Modals.
?>

<?php
include_once('header.php') // Include Header
?>

<!-- [ Main Content ] start -->
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Kamar</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Menu Admin</a></li>
                            <li class="breadcrumb-item" aria-current="page">Kamar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Kamar</h5>
                        <button data-pc-animate="fade-in-scale" type="button"
                            class="btn btn-primary float-end" data-action-url="aksi/kamar.php?action=insert" data-status-modal="Tambah" data-bs-toggle="modal" data-bs-target="#animateModal">Tambah Data</button>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive">
                            <table id="tables" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Tipe</th>
                                        <th>Harga Per Malam</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM rooms";
                                    $query = $koneksi->query($sql);
                                    $i = 1;

                                    if ($query && $query->num_rows > 0): // Pastikan query berhasil dan memiliki data
                                        while ($row = $query->fetch_assoc()): // Ambil data per baris
                                    ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($row['no']); ?></td> <!-- Data -->
                                                <td><?php echo htmlspecialchars($row['tipe']); ?></td> <!-- Data -->
                                                <td><?php echo formatRupiah(htmlspecialchars($row['harga'])); ?></td> <!-- Data -->
                                                <td><?php echo htmlspecialchars($row['status']); ?></td> <!-- Data -->
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        <button type="button" data-id="<?= $row['id'] ?>" data-no="<?= $row['no'] ?>" data-tipe="<?= $row['tipe'] ?>" data-harga="<?= $row['harga'] ?>" data-status-modal="Edit" data-status="<?= $row['status'] ?>" data-action-url="aksi/kamar.php?action=update" data-pc-animate="fade-in-scale" data-status="Edit" data-bs-toggle="modal" data-bs-target="#animateModal" class="btn btn-warning">Edit</button>
                                                        <button type="button" class="btn btn-danger" onclick="hapusData('<?= $row['id'] ?>')">Hapus</button>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                        endwhile;
                                    endif; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

<?php
include_once('footer.php') // Include Footer
?>