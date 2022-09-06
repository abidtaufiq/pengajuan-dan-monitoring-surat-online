<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="purple">
                        <i class="material-icons">people</i>
                    </div>
                    <div class="card-content">
                        <h4 class="card-title">Edit Profil Kelurahan</h4>
                        <form action="<?= base_url('galery/edit_profil/')?><?= $profil[0]['id']?>" method="post">
                            <label for="profil">Masukkan Profil Kelurahan</label>
                            <textarea name="profil" id="profil" cols="10" rows="10" class="form-control"><?= $profil[0]['profile']?></textarea>
                            <button class="btn btn-primary pull-right" type="submit">Update</button>
                        </form>
                    </div>
                    <!-- end content-->
                </div>
                <!--  end card  -->
            </div>
            <!-- end col-md-12 -->
        </div>
        <!-- end row -->
    </div>
</div>