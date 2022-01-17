<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Ubah Password</h2>
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
            <form method="post" action="<?php echo base_url('dashboard/ubah_password') ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Password Lama</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input required type="password" class="form-control" id="old_password" name="old_password" aria-describedby="emailHelp" placeholder="Masukan password lama">
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Password Baru</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input required type="password" class="form-control" id="new_password" name="new_password" aria-describedby="emailHelp" placeholder="Masukan password baru">
                        <?= form_error('new_password', ' <div class="text-danger">', ' </div>') ?>
                    </div>
                </div>
                <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align">Konfirmasi Password Baru</label>
                    <div class="col-md-6 col-sm-6 ">
                        <input required type="password" class="form-control" id="confirm" name="confirm" aria-describedby="emailHelp" placeholder="Konfirmasi password baru">
                        <?= form_error('confirm', ' <div class="text-danger">', ' </div>') ?>
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