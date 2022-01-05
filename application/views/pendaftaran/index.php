<div class="container">
    <div class="card mt-3">
        <div class="card-body">

            <div class="row mt-3">
                <div class="col-md-12">
                    <h3>PENDAFTARAN CALON SISWA SSB MANDALA MAJALENGKA</h3>
                    <p>pendaftaran wajib disertai upload bukti pembayaran.</p>
                    <p> Untuk pembayaran ke nomor rekening .....</p>
                </div>
                <div class="col-md-12">
                    <form method="post" action="<?php echo base_url('pendaftaran/simpan') ?>" enctype="multipart/form-data">
                        <div class="form-group col-md-6">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input required type="text" class="form-control" id="nama" name="email" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                            </div>
                            <label>Nama</label>
                            <input required type="text" class="form-control" id="nama" name="nama_siswa" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Lahir</label>
                            <input required type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Asal</label>
                            <input required type="text" class="form-control" id="asal" name="asal" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                        </div>
                        <div class="form-group col-md-2">
                            <label>Tinggi Badan</label>
                            <div class="input-group">
                                <input required type="number" class="form-control" id="tinggi_badan" name="tinggi_badan" placeholder="tinggi badan">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">CM</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>Berat Badan</label>
                            <div class="input-group">
                                <input required type="number" class="form-control" id="berat_badan" name="berat_badan" placeholder="berat badan">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">KG</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Posisi</label>
                            <select class="form-control" id="posisi" name="posisi">
                                <option hidden> Pilih Posisi Anda </option>
                                <?php $posisi = $this->db->get('posisi')->result_array();
                                foreach ($posisi as $p) {
                                ?>
                                    <option value="<?= $p['id_posisi'] ?>"><?= $p['posisi'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="4"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama Orang Tua</label>
                            <input required type="text" class="form-control" id="nama_ortu" name="nama_ortu" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pekerjaan Orang Tua</label>
                            <input required type="text" class="form-control" id="pekerjaan_ortu" name="pekerjaan_ortu" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Alamat Orang Tua</label>
                            <textarea class="form-control" id="alamat_ortu" name="alamat_ortu" rows="4"></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pas Foto Siswa</label>
                            <input required type="file" class="form-control" id="foto" name="foto" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Upload Bukti Pembayaran</label>
                            <input required type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>