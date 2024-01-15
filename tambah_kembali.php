<?php
require('controller/islogin.php');
require('database/database.php');
$db = new Database();

$no = @$_GET['id'];

$db->query('SELECT * FROM loans l
  INNER JOIN books b ON l.no_induk = b.no_induk
  INNER JOIN customers c ON l.id_cus = c.id_cus
  WHERE id = :id;');

$db->bind(':id', $no);

$buku = $db->single();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | General Form Elements</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php include 'template/header.php'; ?>

    <?php include 'template/sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Peminjaman</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Peminjaman</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">
                    <?php
                    if ($no) {
                      echo "Edit Peminjaman Buku";
                    } else {
                      echo "Tambah Peminjaman Buku";
                    }
                    ?>
                  </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo (@$no ? 'update_kembali.php' : 'save_loans.php'); ?>" method="post">
                  <div class="card-body">
                    <p>No Induk : <strong><?= $buku['no_induk'] ?></strong></p>
                    <p>Judul : <strong><?= $buku['judul'] ?></strong></p>
                    <p>ID Cus : <strong><?= $buku['id_cus'] ?></strong></p>
                    <p>Nama Cus : <strong><?= $buku['nama'] ?></strong></p>

                    <?php
                    if ($no) {
                    ?>
                      <input type="hidden" name="id" value=<?= @$no ?>>
                    <?php
                    }
                    ?>

                    <div class="form-group">
                      <label for="denda">Denda</label>
                      <input type="number" class="form-control" name="denda" id="denda" placeholder="Masukkan Denda" required <?= @$customer['id_cus'] ? 'readonly' : ''; ?> value="<?php echo @$customer['id_cus'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="ket">Keterangan</label>
                      <textarea class="form-control" name="ket" placeholder="Masukkan Ket" rows="3" style="height: 73px;"></textarea>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
    </div>
    <?php include 'template/footer.php'; ?>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
      $(function() {
        bsCustomFileInput.init();
      });
    </script>
</body>

</html>