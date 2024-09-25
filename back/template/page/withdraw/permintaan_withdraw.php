<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Permintaan Withdraw</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Daftar Permintaan Withdraw</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Menu Permintaan Withdraw</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Permintaan Withdraw</h4>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Username</th>
                                <th scope="col">Transfer Ke</th>
                                <th scope="col">Nomor Rekening</th>
                                <th scope="col">Atas Nama</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE status = 'Pending' AND transaksi = 'Withdraw' ");
                        $no = 1;
                        while ($data = mysqli_fetch_array($query)) {
                            $id_user = $data['id_user'];
                            $query1 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE extplayer = '$id_user' ");
                            $d = mysqli_fetch_array($query1);
                            $query2 = mysqli_query($koneksi, "SELECT * FROM tb_bank WHERE id_user = '$id_user' ");
                            $e = mysqli_fetch_array($query2);
                            ?>
                            
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td><?php echo $data['tanggal']; ?></td>
                                    <td><?php echo $d['username']; ?></td>
                                    <td><?php echo $e['nama_bank']; ?></td>
                                    <td><?php echo $e['nomor_rekening']; ?></td>
                                    <td><?php echo $e['nama_pemilik']; ?></td>
                                    <td>Rp. <?php echo number_format($data['total']); ?></td>
                                    <td>
                                        <a href="?page=proses_withdraw&id=<?php echo $data['id'] ?>" class="btn btn-primary">Proses</a>
                                        <a href="?page=proses_batal_withdraw&id=<?php echo $data['id'] ?>" class="btn btn-danger">Reject</a>
                                    </td>
                                   
                                </tr>
                            
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
