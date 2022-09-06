<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<?php if ($this->session->flashdata('success') == TRUE) : ?>
				<div class="alert alert-success">
					<span><?= $this->session->flashdata('success'); ?></span>
				</div>
				<?php endif; ?>
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="purple">
						<i class="material-icons">people</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Ketua RT & RW</h4>
						<image class="img-fluid" src="<?= base_url('/assets/galery/');  echo $profil[0]['k_rtrw'] ?>" alt="Ketua RT & RW"></image>
						<hr />
						<form  enctype="multipart/form-data" action="<?= base_url('galery/edit_k_rtrw/')?><?= $profil[0]['id']?>" method="post">
                        
							<label for="k_rtrw">Ganti Ketua RT & RW</label>
							<input type="file" accept="image/*" name="k_rtrw" id="k_rtrw">
							<input type="hidden" name="k_rtrw_old" value="<?= $profil[0]['k_rtrw'] ?>" id="k_rtrw">
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
