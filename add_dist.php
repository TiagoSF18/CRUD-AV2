<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Bmol Marcenaria</title>
<header></header>
<?php
include "_includes/header.php";
?>

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
<h1 class="m-0 text-dark">Adicionar Clientes</h1>
</div><!-- /.col -->
<div class="col-sm-6">
<ol class="breadcrumb float-sm-right">
<li class="breadcrumb-item"><a href="index.php">Home</a></li>
<li class="breadcrumb-item"><a href="index_clientes.php">Clientes</a></li>
<li class="breadcrumb-item active">Add Clientes</li>
</ol>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
<div class="container-fluid">

<!-- general form elements -->
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Cadastro de Clientes(s)</h3>
</div>
<!-- /.card-header -->
<!-- form start -->
<form role="form" name="form_distribuidora" method="POST" action="cad_dist.php" >
<div class="card-body">
<div class="form-group">
<label for="nome">Nome</label>
<input type="text" class="form-control" id="nome" name="nome" autocomplete="off" placeholder="Nome do cliente" required>
</div>
<div class="form-group">
<label for="cpf">CPF</label>
<input type="text" class="form-control" placeholder="000.000.000-00" autocomplete="off" id="cpf" name="cpf"  maxlength="14" required>
</div>
<div class="form-group">
<label for="celular">Celular</label>
<input type="text" class="form-control" id="celular" name="celular"autocomplete="off" placeholder="(00) 0-0000-0000" required>
</div>

</div>
<!-- /.card-body -->
<div class="card-footer">
<button type="submit" class="btn btn-primary">Cadastrar</button>
</div>
</form>
</div>
<!-- /.card -->

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include "_includes/footer.php";
?>
}
<script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput-1.1.4.pack.js"/></script>
<script type='text/javascript' src='//code.jquery.com/jquery-compat-git.js'></script>
<script type='text/javascript' src='//igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js'></script>

<script type="text/javascript">
$(document).ready(function(){
  $("#cpf").mask("999.999.999-99");
});
</script>

<script>
jQuery(function($){
  $("#celular").mask("(00) 0-0000-0000");
});
</script>
</body>
</html>


