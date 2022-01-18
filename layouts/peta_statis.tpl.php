<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view($folder_themes . '/commons/meta') ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mapbox-gl/2.0.1/mapbox-gl.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/css/AdminLTE.min.css')?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/admin-style.css')?>">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/8.1.1/highcharts.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/8.1.1/highcharts-3d.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="font-primary bg-gray-100">
  <style>
    #map {
      width: 100%;
      height: 88vh !important;
    }
  </style>

  <main class="container w-full space-y-5">
    <div class="page-title text-center">
      <h2 class="text-h2">Peta <?= NAMA_DESA ?></h2>
      <a href="<?= site_url() ?>" class="inline-block" class="text-link hover:text-link">Kembali ke Beranda</a>
    </div>
    <br>
    <?php $this->load->view($halaman_peta); ?>
  </main>
  <script>
    $('.fetched-data').on('DOMNodeInserted', 'link[rel=stylesheet]', function () {
      $(this).remove();
    });
  </script>
  <?php $this->load->view('head_tags_front') ?>
</body>

</html>