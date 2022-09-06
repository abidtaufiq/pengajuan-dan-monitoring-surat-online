
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left" style="color:white">Copyright © Kelurahan Pulau <?= date('Y')?>
					</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Contact</a>
                        <a href="#!">Other</a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="<?= base_url()?>assets/mail/jqBootstrapValidation.js"></script>
        <script src="<?= base_url()?>assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="<?= base_url()?>assets/js/scripts2.js"></script>
        <script src="<?= base_url();?>assets/jquery-ui-1.12.1/jquery-ui.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#nik').autocomplete({
                    source: "<?php echo site_url('Penduduk/get_autocomplete');?>",

                    select: function (event, ui) {
                    console.log(ui.item)
                            $('[name="nik"]').val(ui.item.label);
                            $('[name="nama"]').val(ui.item.nama);
                            $('[name="no_hp"]').val(ui.item.no_hp);
                    },
                    response: function(event, ui){
                        if(ui.content.length === 0){
                            console.log('No results loaded!');
                        }else{
                            console.log('success!');
                        }
                    },
                });

            });
        </script>

        <script>
            $('#jenis').change(function(){
                var e = document.getElementById("jenis");
                var jenisSurat =  e.value;
                // console.log(jenisSurat)

                const spkk = ['KK Lama (Asli & FC)', 'KTP', 'Surat Pindah dari daerah asal', 'FC Buku Nikah', 'Surat Pengantar/Keterangan RT & RW']
                const spna = ['FC KK Calon Suami & Istri', 'FC KTP Calon Suami & Istri', 'Pas Foto 3x4 Calon Suami & Istri', 'Surat Pengantar/Keterangan RT & RW', 'FC Akta Cerai (Bagi Janda/Duda)']
                const skkl = ['KK (Asli & FC)', 'KTP', 'Surat Keterangan Kelahiran dari Bidan/RS (Jika ada/ Optional)', 'Surat Pengantar/Keterangan RT & RW']
                const skkm = ['KK (Asli & FC)', 'KTP', 'Surat Keterangan Kematian (Jika ada/Optional)', 'Surat Pengantar/Keterangan RT & RW']
                const skp = ['KK (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW', 'Data alamat daerah tujuan']
                const skd = ['KK (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW', 'Data alamat daerah asal']
                const skbm = ['KK (Asli & FC)', 'KTP (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW']
                const skph = ['KK (Asli & FC)', 'KTP (Asli & FC)', 'Surat Pernyataan dari yang bersangkutan(Optional)', 'Surat Pengantar/Keterangan RT & RW']
                const skm = ['KK (Asli & FC)', 'KTP (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW']
                const sku = ['KK (Asli & FC)', 'KTP (Asli & FC)', 'Izin Usaha', 'Surat Pengantar/Keterangan RT & RW']
                const skt = ['KTP (Asli & FC)', 'Surat Dasar Kepemilikan']
                const skgg = ['KTP (Asli & FC)', 'KTP (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW']
                const situ = ['KTP (Asli & FC)', 'KTP (Asli & FC)', 'Surat Pengantar/Keterangan RT & RW']
                const simb = ['KTP (Asli & FC)', 'FC Surat Tanah Lokasi Bangunan', 'Surat Pengantar/Keterangan RT & RW']

                const showList = (surat) => {
                    surat.forEach(item => {
                        $('#syarat').append(
                            `
                            <ul>
                                <li>${item}</li>
                            </ul>
                            `
                        )
                    });
                }

                if (jenisSurat == 'SPKK') {
                    $('#syarat').html('')
                    showList(spkk)
                }else if(jenisSurat == 'SPNA'){
                    $('#syarat').html('')
                    showList(spna)
                }else if(jenisSurat == 'SKKL'){
                    $('#syarat').html('')
                    showList(skkl)
                }else if(jenisSurat == 'SKKM'){
                    $('#syarat').html('')
                    showList(skkm)
                }else if(jenisSurat == 'SKP'){
                    $('#syarat').html('')
                    showList(skp)
                }else if(jenisSurat == 'SKD'){
                    $('#syarat').html('')
                    showList(skd)
                }else if(jenisSurat == 'SKBM'){
                    $('#syarat').html('')
                    showList(skbm)
                }else if(jenisSurat == 'SKPH'){
                    $('#syarat').html('')
                    showList(skph)
                }else if(jenisSurat == 'SKM'){
                    $('#syarat').html('')
                    showList(skm)
                }else if(jenisSurat == 'SKU'){
                    $('#syarat').html('')
                    showList(sku)
                }else if(jenisSurat == 'SKT'){
                    $('#syarat').html('')
                    showList(skt)
                }else if(jenisSurat == 'SKGG'){
                    $('#syarat').html('')
                    showList(skgg)
                }else if(jenisSurat == 'SITU'){
                    $('#syarat').html('')
                    showList(situ)
                }else if(jenisSurat == 'SIMB'){
                    $('#syarat').html('')
                    showList(simb)
                }else{
                    console.log('Nothing')
                }
            })
        </script>
    </body>
</html>
