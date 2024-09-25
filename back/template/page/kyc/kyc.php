<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">User</h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="#">Daftar User</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Menu User</li>
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
                    <h4 class="card-title">Daftar User</h4>
                </div>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kartu Identitas</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Email</th>
                                <th scope="col">No HP</th>
                                <th scope="col">Tanggal Lahir</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Kota</th>
                                <th scope="col">Kode Pos</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($koneksi, "SELECT * FROM tb_kyc ");
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)) {
                                $id_user = $data['id_user'];

                                ?>
                                
                                <tr>
                                    <th scope="row"><?php echo $no++; ?></th>
                                    <td>
                                     <a href="../../upload/kyc/<?php echo $data['kartu'] ?>" class="btn btn-primary"><?php echo $data['kartu_identitas'] ?></a>
                                 </td>
                                 <td><?php echo $data['nama_lengkap']; ?></td>
                                 <td><?php echo $data['email']; ?></td>
                                 <td><?php echo $data['no_ponsel']; ?></td>
                                 <td><?php echo $data['tanggal_lahir']; ?></td>
                                 <td><?php echo $data['alamat']; ?></td>
                                 <td><?php echo $data['kota']; ?></td>
                                 <td><?php echo $data['kode_pos']; ?></td>


                                 <td>
                                    <?php
                                    $query1 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE extplayer = '$id_user' ");
                                    $cek_data = mysqli_fetch_array($query1);
                                    if ($cek_data['kyc'] == "1") {
                                        ?>
                                        <a href="?page=verifikasi_kyc&id_user=<?php echo $id_user ?>" class="btn btn-success">Verifikasi</a> 
                                        <?php
                                    }else if ($cek_data['kyc'] == "2") {
                                        ?>
                                        <a href="?page=gagal_kyc&id_user=<?php echo $id_user ?>" class="btn btn-danger">Batalkan</a> 
                                        <?php                                
                                    }else{
                                        ?>
                                        <a href="?page=verifikasi_kyc&id_user=<?php echo $id_user ?>" class="btn btn-success">Verifikasi</a> 
                                        <?php
                                    }
                                    ?>

                                    
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
