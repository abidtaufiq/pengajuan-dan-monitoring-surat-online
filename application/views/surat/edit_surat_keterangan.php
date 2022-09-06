<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <?php echo form_open_multipart(); ?>
                    <!-- <form id="RegisterValidation" action="" method=""> -->
                    <div class="card-header card-header-icon" data-background-color="rose">
                        <i class="material-icons">mail_outline</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Edit Surat Keterangan</h4>

                        <div class="form-group">
                            <label class="label-control">Nama Surat</label>
                            <input class="form-control" name="nama_surat" id="nama_surat" type="text" value="<?= $surat_keterangan['nama_surat_keterangan']; ?>" required="true" />
                        </div>

                        <div class="form-group">
                            <label class="label-control">Tanggal Surat</label>
                            <input type="text" class="form-control datepicker" name="tanggal_surat" id="tanggal_surat" value="<?= $surat_keterangan['tanggal_surat_keterangan']; ?>" />
                        </div>

                        <div class="form-group">
                            <label class="label-control">Keterangan Surat</label>
                            <input class="form-control" name="keterangan_surat" id="keterangan_surat" value="<?= $surat_keterangan['keterangan_surat_keterangan']; ?>" type="text" required="true" />
                        </div>

                        <div class="form-group">
                            <label class="label-control">File Surat</label>



                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <!-- <img src="<?= base_url('./uploads/surat_keterangan/') ?>" alt="..."> -->
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                    <span class="btn btn-danger btn-file">
                                        <i class="material-icons">cloud_upload</i>
                                        <span class="fileinput-new">Select File</span>
                                        <span class="fileinput-exists">Change</span>
                                        <input type="file" name="file_surat" id="file_surat" />
                                    </span>
                                    <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>

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