<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Simple Voting App (Aplikasi Voting Terbaik)">
  <title>PilihanKu - <?= $data['judul']; ?></title>
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <link href="<?= BASEURL; ?>/assets/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css">
</head>

<body>
  <div class="container">
    <?php require_once('navbar.php'); ?>

    <div id="section-content">