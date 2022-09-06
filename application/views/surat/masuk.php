<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-icon" data-background-color="orange">
						<i class="material-icons">mail</i>
					</div>
					<div class="card-content">
						<h4 class="card-title">Surat Masuk</h4>
						<div class="toolbar">
							<!--        Here you can write extra buttons/actions for the toolbar              -->
							<a href="<?= base_url() ?>surat/tambah_surat_masuk">
								<button class="btn btn-info">
									<span class="btn-label">
										<i class="material-icons">check</i>
									</span>
									Tambah
								</button>
							</a>

							<?php if ($this->session->flashdata('success') == TRUE) : ?>
							<div class="alert alert-success">
								<span><?= $this->session->flashdata('success'); ?></span>
							</div>
							<?php endif; ?>

						</div>
						<div class="material-datatables">
							<table id="datatables" class="table table-striped table-no-bordered table-hover"
								cellspacing="0" width="100%" style="width:100%">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Surat</th>
										<th>Tanggal</th>
										<th>Keterangan</th>
										<th>File</th>
										<th class="disabled-sorting text-right">Actions</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Nama Surat</th>
										<th>Tanggal</th>
										<th>Keterangan</th>
										<th>File</th>
										<th class="text-right">Actions</th>
									</tr>
								</tfoot>
								<tbody>

									<?php $no = 1; ?>
									<?php foreach ($data as $key) : ?>
									<tr>
										<td><?= $no; ?></td>
										<td><?= $key['nama_surat_masuk']; ?></td>
										<td><?= $key['tanggal_surat_masuk']; ?></td>
										<td><?= $key['keterangan_surat_masuk']; ?></td>
										<td>
											<!-- <a href="#" class="btn btn-simple btn-info btn-icon like"><i class="material-icons">remove_red_eye</i></a> -->
											<!-- <a href="#" class="btn btn-simple btn-warning btn-icon edit"><i class="material-icons">dvr</i></a>
                                                <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></a> -->
											<button class="btn btn-simple btn-info" data-toggle="modal"
												data-target="#lihatSurat<?= $key['id_surat_masuk']; ?>"><i
													class="material-icons">remove_red_eye</i></button>
										</td>
										<td class="text-right">

											<a href="<?= base_url() ?>surat/editSuratMasuk/<?= $key['id_surat_masuk']; ?>"
												class="btn btn-simple btn-primary btn-icon"><i
													class="material-icons">edit</i></a>
											<button class="btn btn-simple btn-warning btn-icon" data-toggle="modal"
												data-target="#hapusSuratMasuk<?= $key['id_surat_masuk']; ?>"><i
													class="material-icons">close</i></button>
										</td>
									</tr>
									<?php $no++; ?>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>


						<!-- small modal hapus user -->

						<?php foreach ($data as $key) : ?>
						<div class="modal fade" id="hapusSuratMasuk<?= $key['id_surat_masuk']; ?>" tabindex="-1"
							role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-small ">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
												class="material-icons">clear</i></button>
									</div>

									<form method="post"
										action="<?= base_url(); ?>surat/hapusSuratMasuk/<?= $key['id_surat_masuk']; ?>">
										<div class="modal-body text-center">
											<h5>Apakah anda yakin untuk menghapus surat masuk? </h5>
										</div>
										<div class="modal-footer text-center">
											<button type="button" class="btn btn-simple"
												data-dismiss="modal">Tidak</button>
											<button type="submit" class="btn btn-success btn-simple">Ya</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
						<!--    end small modal hapus user -->

						<!-- notice modal -->

						<?php foreach ($data as $key) : ?>
						<div class="modal fade" id="lihatSurat<?= $key['id_surat_masuk']; ?>" tabindex="-1"
							role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-notice">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
												class="material-icons">clear</i></button>
										<h5 class="modal-title text-center" id="myModalLabel">Surat Masuk</h5>
									</div>
									<div class="modal-body">
										<div class="instruction">
											<div class="row">
												<div class="col-md-12">
													<embed type="application/pdf" width="100%" height="450px;"
														src="<?= base_url('uploads/surat_masuk') ?>/<?= $key['file_surat_masuk'] ?>"></embed>
												</div>

											</div>
										</div>

									</div>
									<div class="modal-footer text-center">
										<button type="button" class="btn btn-info btn-round"
											data-dismiss="modal">Tutup</button>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
						<!-- end notice modal -->


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
