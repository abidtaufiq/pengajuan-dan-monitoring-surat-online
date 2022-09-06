<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <?php echo form_open_multipart(); ?>
                    <!-- <form id="RegisterValidation" action="" method=""> -->
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Edit Pegawai</h4>

                        <div class="form-group">
                            <label class="label-control">Nama</label>
                            <input class="form-control" name="nama" id="nama" type="text" value="<?= $pegawai['nama']; ?>" />
                        </div>
                        <?= form_error('nama', '<div class="text-danger">', '</div>'); ?>

                        <div class="form-group">
                            <label class="label-control">NIP</label>
                            <input class="form-control" name="nip" id="nip" type="text" value="<?= $pegawai['nip']; ?>" />
                        </div>
                        <?= form_error('nip', '<div class="text-danger">', '</div>'); ?>

                        <div class="form-group">
                            <label class="label-control">Tempat Lahir</label>
                            <input class="form-control" name="tempat_lahir" id="tempat_lahir" type="text" value="<?= $pegawai['tempat_lahir']; ?>" />
                        </div>
                        <?= form_error('tempat_lahir', '<div class="text-danger">', '</div>'); ?>

                        <div class="form-group">
                            <label class="label-control">Tanggal Lahir</label>
                            <input type="text" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" value="<?= $pegawai['tanggal_lahir']; ?>" />
                        </div>
                        <?= form_error('tanggal_lahir', '<div class="text-danger">', '</div>'); ?>

                        <div class="form-group">
                            <label class="label-control">Alamat</label>
                            <input class="form-control" name="alamat" id="alamat" type="text" value="<?= $pegawai['alamat']; ?>" />
                        </div>
                        <?= form_error('alamat', '<div class="text-danger">', '</div>'); ?>

                        <div class="form-group">
                            <label class="label-control">Foto</label>
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="<?= base_url('./uploads/foto') ?>/<?= $pegawai['foto']; ?>" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-danger btn-file">
                                        <i class="material-icons">cloud_upload</i>
                                        <span class="fileinput-new">Select File</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="foto" id="foto" value="<?= $pegawai['foto']; ?>" />
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                        <?= form_error('foto', '<div class="text-danger">', '</div>'); ?>

                        <div class="form-group">
                            <label class="label-control">No. Hp</label>
                            <input class="form-control" name="no_hp" id="no_hp" type="text" value="<?= $pegawai['no_hp']; ?>" />
                        </div>
                        <?= form_error('no_hp', '<div class="text-danger">', '</div>'); ?>

                        <div class="form-group">
                            <label class="label-control">Jabatan</label>
                            <input class="form-control" name="jabatan" id="jabatan" type="text" value="<?= $pegawai['jabatan']; ?>" />
                        </div>
                        <?= form_error('jabatan', '<div class="text-danger">', '</div>'); ?>

                        <div class="form-group">
                            <label class="label-control">Pendidikan</label>
                            <input class="form-control" name="pendidikan" id="pendidikan" type="text" value="<?= $pegawai['pendidikan']; ?>" />
                        </div>
                        <?= form_error('pendidikan', '<div class="text-danger">', '</div>'); ?>


                        <div class="category form-category">
                            <div class="form-footer text-right">

                                <button type="submit" class="btn btn-success btn-fill">simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>