<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bmol Marcenaria</title>
  <?php
    include "_includes/header.php";
  ?>
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php
    include "_includes/leftnav.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Clientes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
            
            //$nome           = $_POST['nome'];
            //$cnpj           = $_POST['cnpj'];
            //$celular        = $_POST['celular'];

            //echo $nome." - ".$cnpj." - ".$celular;

        ?>

        <?php
            include "conexao.php";
            $conn = connection();

            try {
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO usuario (nome, cpf, celular)
            VALUES (:nome, :cnpj, :celular)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':celular', $celular);

            // insert a row
            //$nome = "Distribuidora Juazeiro C&C";
            //$cnpj = "43.413.513/0001-52";
            //$celular = "(88)90099-0909";
            $nome           = $_POST['nome'];
            $cpf           = $_POST['cpf'];
            $celular        = $_POST['celular'];

            $stmt->execute();


            echo "Cliente cadastrado com sucesso!";
            } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
            }
            $conn = null;
        ?> 




      <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">DataTable with default features</h3> -->
                
                <small class="float-right"><a href="add_dist.php"> <button type="button" class="btn btn-block btn-primary">Add Distribuidora</button></a>    </small>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>CÓDIGO</th>
                    <th>CNPJ</th>
                    <th>NOME</th>
                    <th>FONE</th>
                  </tr>
                  </thead>
                  <tbody>

                  
                  <?php
                    //echo "<table style='border: solid 1px black;'>";
                    //echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th></tr>";

                    class TableRows extends RecursiveIteratorIterator {
                    function __construct($it) {
                        parent::__construct($it, self::LEAVES_ONLY);
                    }

                    function current() {
                        return "<td>" . parent::current(). "</td>";
                    }

                    function beginChildren() {
                        echo "<tr>";
                    }

                    function endChildren() {
                        echo "</tr>" . "\n";
                    }
                    }

                    //include "conexao.php";
                    $conn = connection();

                    try {
                    
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM usuario");
                    $stmt->execute();

                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                        echo $v;
                    }
                    } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    //echo "</table>";
                ?>

                  </tbody>                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
        



            



      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    include "_includes/footer.php";
  ?>

<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>

</body>
</html>


