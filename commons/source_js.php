<?php  defined('BASEPATH') || exit('No direct script access allowed'); ?>

<?php if (cek_koneksi_internet()): ?>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://unpkg.com/datatables@1.10.18/media/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-providers/1.6.0/leaflet-providers.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/2.0.1/mapbox-gl.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl-leaflet/0.0.14/leaflet-mapbox-gl.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.carousel.js"></script>
<?php endif ?>

<?php $this->load->view('head_tags_front') ?>

<script>
    $.extend($.fn.dataTable.defaults, {
        lengthMenu: [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "Semua"]
        ],
        pageLength: 10,
        language: {
        url: "<?= base_url('assets/bootstrap/js/dataTables.indonesian.lang') ?>",
        }
    });
</script>

<?php if (! setting('inspect_element')): ?>
    <script src="<?= asset('js/disabled.min.js') ?>"></script>
<?php endif ?>