<?php
require('controller/islogin.php');
require('database/database.php');
$db = new Database();

$no = @$_GET['id'];

$db->query('SELECT * FROM books');
$bukus = $db->get();

$db->query('SELECT * FROM customers');
$customers = $db->get();
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
                      echo "Edit Peminjaman";
                    } else {
                      echo "Tambah Peminjaman";
                    }
                    ?>
                  </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?php echo (@$no ? 'update_loans.php' : 'save_loans.php'); ?>" method="post">
                  <div class="card-body">
                    <?php
                    if ($no) {
                    ?>
                      <input type="hidden" name="id" value="<?= @$no ?>">
                    <?php
                    }
                    ?>

                    <div class="form-group">
                      <label for="no_induk">Nomor Induk</label>
                      <select name="no_induk" class="form-control">
                        <?php
                        foreach ($bukus as $buku) { ?>
                          <option value=<?= $buku['no_induk'] ?>><?= $buku['judul'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="id_cus">Customer</label>
                      <select name="id_cus" class="form-control">
                        <?php
                        foreach ($customers as $cus) { ?>
                          <option value=<?= $cus['id_cus'] ?>><?= $cus['id_cus'] . " | " . $cus['nama'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
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