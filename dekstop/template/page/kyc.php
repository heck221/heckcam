 <!-- Account Balance -->
 <main id="main-route">
    <div class="main-content register post">
        <div class="container">
            <div class="row">
                <div class ="col-lg-12">
                    <div class="register__container">
                        <div class="page-header"><i class="fas fa-user-alt mr-2"></i>| Formulir KYC</div>
                        <form id="register-form" method="POST" action="function/kyc.php"enctype="multipart/form-data">
                            <?php
                                $nama_lengkap = $punya_user['nama_lengkap'];
                                $email = $punya_user['email'];
                                $no_hp = $punya_user['no_hp'];
                                $extplayer = $punya_user['extplayer'];

                            ?>
                            <div class="register-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="register__note">
                                            <div class="note__head">Catatan :</div>
                                            <div class="note__content">
                                                *Mohon Data Di Isi Dengan Benar<br>
                                                *Estimasi Persetujuan Admin 1x24 Jam
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                            <label for="username_register">Nama Lengkap*</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="hidden" name="extplayer"
                                            id="username_register" value="<?php echo $extplayer ?>">
                                            <input class="form-control" type="text" name="nama_lengkap"
                                            id="username_register" minlength="6" maxlength="15"
                                            placeholder="Nama Pengguna"
                                            required="" value="<?php echo $nama_lengkap ?>" readonly>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                            <label for="email">Email*</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input class="form-control" type="email" name="email"
                                            id="email" minlength="6" maxlength="50"
                                            placeholder="nama@domain.com" required="" value="<?php echo $email ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group" id="phoneInput">
                                    <div class="row">
                                        <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                            <label for="phone">Nomor Ponsel*</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">+62</span>
                                                </div>
                                                <input class="form-control" type="text" name="no_ponsel"
                                                id="phone" minlength="8" maxlength="20" placeholder="Nomor Ponsel*" required="" value="<?php echo $no_hp ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="phoneInput">
                                    <div class="row">
                                        <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                            <label for="phone">Tanggal Lahir*</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input class="form-control" type="date" name="tanggal_lahir"
                                                id="phone" required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="register__notemail">
                                            <div class="note__content">
                                                *Alamat / Tempat Tinggal.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="phoneInput">
                                    <div class="row">
                                        <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                            <label for="phone">Alamat*</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="alamat"
                                                id="phone" required="" placeholder="Jl. Kenangan">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="phoneInput">
                                    <div class="row">
                                        <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                            <label for="phone">Kota*</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input class="form-control" type="text" name="kota"
                                                id="phone" required="" placeholder="Jakarta">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="phoneInput">
                                    <div class="row">
                                        <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                            <label for="phone">Kode POS*</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input class="form-control" type="number" name="kode_pos"
                                                id="phone" required="" placeholder="123345">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="register__notemail">
                                            <div class="note__content">
                                                *Upload Dokumen
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group" id="phoneInput">
                                    <div class="row">
                                        <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                            <label for="phone">Kartu Identitas Diri*</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <select class="form-control" name="kartu_identitas">
                                                    <option value="KTP">Kartu Tanda Penduduk</option>
                                                    <option value="SIM">Surat Izin Mengemudi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group" id="phoneInput">
                                    <div class="row">
                                        <div class="col-lg-4 d-flex align-items-center justify-content-start">
                                            <label for="phone">Upload Kartu*</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="input-group">
                                                <input class="form-control" type="file" name="kartu"
                                                id="phone" required="" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="term" class="register-terms">
                                                <span class="text-justify">Saya Bersedia Memberikan Data Pribadi Kepada Admin Situs Untuk Verifikasi Akun</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">

                                        <input type="submit" name="submit" value="Verifikasi" class="daftar btn-custom button-submit">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    
                </div>
            </main>