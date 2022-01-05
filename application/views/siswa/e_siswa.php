<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Form Design <small>different form elements</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a class="dropdown-item" href="#">Settings 1</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form method="post" action="<?php echo base_url('siswa/update_siswa/'.$col['id_siswa']) ?>" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">No HP</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input required type="text" value ="<?= $col['no_hp']; ?>" class="form-control" id="no_hp" name="no_hp" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                        <?= form_error('no_hp', '<div class="col-12"><small class="text-danger">', '</small></div>') ?>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input required type="text" value ="<?= $col['nama_siswa']; ?>" class="form-control" id="nama" name="nama_siswa" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input required type="date" value ="<?= $col['tanggal_lahir']; ?>" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Asal</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input required type="text" value ="<?= $col['asal']; ?>" class="form-control" id="asal" name="asal" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Tinggi Badan</label>
                    <div class="col-md-6 col-sm-6">
                        <div class="input-group">
                            <input required type="number" value ="<?= $col['tinggi_badan']; ?>" class="form-control col-md-2 col-sm-2" id="tinggi_badan" name="tinggi_badan">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">CM</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Berat Badan</label>
                    <div class="col-md-6 col-sm-6">
                        <div class="input-group">
                            <input required type="number" value ="<?= $col['berat_badan']; ?>" class="form-control col-md-2 col-sm-2" id="berat_badan" name="berat_badan" placeholder="berat badan">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">KG</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item form-group">
                <?php $data = $this->db->get_where('posisi',['id_posisi'=> $col['id_posisi']])->row_array(); ?>
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Posisi</label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="posisi" name="posisi">
                            <option hidden value="<?= $col['id_posisi']?>"> <?= $data['posisi']?> </option>
                            <?php $posisi = $this->db->get('posisi')->result_array();
                            foreach ($posisi as $p) {
                            ?>
                                <option value="<?= $p['id_posisi'] ?>"><?= $p['posisi'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                    <div class="col-md-6 col-sm-6">
                        <textarea class="form-control" id="alamat" name="alamat" rows="4"><?= $col['alamat']; ?></textarea>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Orang Tua</label>
                    <div class="col-md-6 col-sm-6">
                        <input required type="text" value ="<?= $col['nama_ortu']; ?>" class="form-control" id="nama_ortu" name="nama_ortu" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Pekerjaan Orang Tua</label>
                    <div class="col-md-6 col-sm-6">
                        <input required type="text" value ="<?= $col['pekerjaan_ortu']; ?>" class="form-control" id="pekerjaan_ortu" name="pekerjaan_ortu" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Alamat Orang Tua</label>
                    <div class="col-md-6 col-sm-6">
                        <textarea class="form-control" id="alamat_ortu" name="alamat_ortu" rows="4"><?= $col['alamat_ortu']; ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="fotolama" value="<?= $col['foto']; ?>">
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Pas Foto Siswa</label>
                    <div class="col-md-6 col-sm-6">
                    <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="<?= base_url('foto/' . $col['foto']) ?>">
                        <input type="file"  class="form-control imgInput" onchange="previewImage()" id="foto" name="foto" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Upload Bukti Pembayaran</label>
                    <div class="col-md-6 col-sm-6">
                        <input type="file" class="form-control" id="bukti_pembayaran" name="bukti_pembayaran" aria-describedby="emailHelp" placeholder="Masukan nama lengkap">
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="item form-group">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('.imgInput');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>