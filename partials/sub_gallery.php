<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav role="navigation" aria-label="navigation" class="breadcrumb">
  <ol>
    <li><a href="<?= site_url() ?>">Beranda</a></li>
    <li><a href="<?= site_url('first/gallery') ?>">Galeri</a></li>
    <li aria-current="page"><?= $parent['nama'] ?></li>
  </ol>
</nav>
<h1 class="text-h2">Galeri Album <?= $parent['nama'] ?></h1>

<?php if(count($gallery ?? [])) : ?>
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-3 lg:gap-5 py-4">
    <?php 
        $jumlah = 0;
        foreach ($gallery as $album): ?>
        <?php if (file_exists(LOKASI_GALERI . "sedang_" . $album['gambar']) || $album['jenis'] == 2): 
          $gambar = $album['jenis'] == 2 ? $album['gambar'] : AmbilGaleri($album['gambar'], 'kecil'); 
          $jumlah++;
        ?>
        <a href="<?= $gambar ?>" data-fancybox="images" data-caption="<?= $album['nama'] ?>" class="h-44 w-full block bg-gray-300">
          <img src="<?= $gambar ?>" alt="<?= $album['nama'] ?>" class="h-44 w-full object-cover object-center" title="<?= $album['nama'] ?>">
        </a>
      <?php endif ?>
    <?php endforeach ?>
    <?php if ($jumlah == 0): ?>
      <div class="alert text-primary-100">Maaf isi album galeri belum tersedia!</div>
    <?php endif ?>
  </div>
  <?php else : ?>
    <div class="alert text-primary-100">Maaf isi album galeri belum tersedia!</div>
<?php endif ?>