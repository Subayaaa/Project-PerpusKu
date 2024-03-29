<?php
require('controller/islogin.php');
require('database/database.php');
$db = new Database();

$no = @$_GET['no'];

$db->query('SELECT * FROM books WHERE no_induk=:no_induk');

$db->bind(':no_induk', $no);

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
              <h1>PerpusKu</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Buku</li>
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
                      echo "Edit Buku";
                    } else {
                      echo "Tambah Buku";
                    }
                    ?>
                  </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo (@$no ? 'update_buku.php' : 'save_buku.php'); ?>" method="post">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="no_induk">No Induk</label>
                      <input type="text" class="form-control" name="no_induk" id="no_induk" placeholder="Masukkan No Induk" required <?= @$buku['no_induk'] ? 'readonly' : ''; ?> value="<?php echo @$buku['no_induk'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="judul">Judul</label>
                      <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan Judul" required value="<?php echo @$buku['judul'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="penulis">Penulis</label>
                      <input type="text" class="form-control" name="penulis" id="penulis" placeholder="Masukkan Nama Penulis" required value="<?php echo @$buku['penulis'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="tahun">Tahun</label>
                      <input type="text" class="form-control" name="tahun" id="tahun" placeholder="Masukkan Tahun Terbit" required value="<?php echo @$buku['tahun'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="penerbit">Penerbit</label>
                      <input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Masukkan Nama Penerbit" required value="<?php echo @$buku['penerbit'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="subject">Subjek</label>
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Masukkan Subjek" required value="<?php echo @$buku['subjek'] ?>">
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