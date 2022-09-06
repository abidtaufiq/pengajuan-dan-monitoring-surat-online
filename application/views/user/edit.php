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
                        <h4 class="card-title">Edit User</h4>

                        <div class="form-group">
                            <label class="label-control">Username</label>
                            <input class="form-control" name="username" id="username" type="text" value="<?= $user['username'] ?>" />
                        </div>
                        <?= form_error('username', '<div class="text-danger">', '</div>'); ?>

                        <div class="form-group">
                            <label class="label-control">Password</label>
                            <input class="form-control" name="password" id="password" type="password" value="<?= $user['password'] ?>" />
                        </div>
                        <?= form_error('password', '<div class="text-danger">', '</div>'); ?>

                        <div class="form-group">
                            <label class="label-control">Konfirmasi Password</label>
                            <input class="form-control" name="password2" id="password2" type="password" value="<?= $user['password'] ?>" />
                        </div>
                        <?= form_error('password2', '<div class="text-danger">', '</div>'); ?>

                        <?php if ($this->session->userdata('level') == 'administrator') : ?>
                            <div class="form-group">
                                <label class="label-control">Hak Akses</label>
                                <select class="selectpicker" name="level" id="level" data-style="btn btn-primary btn-round" title="Single Select" data-size="7">
                                    <option disabled selected>Pilih Hak Akses</option>
                                    <?php if ($user['level'] == 'administrator') : ?>
                                        <option selected='true' value="administrator">Administrator</option>
                                        <option value="pegawai">Pegawai</option>
                                    <?php else : ?>
                                        <option value="administrator">Administrator</option>
                                        <option selected='true' value="pegawai">Pegawai</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <?= form_error('level', '<div class="text-danger">', '</div>'); ?>

                        <?php endif; ?>







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