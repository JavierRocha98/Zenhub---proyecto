<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>edición de datos</title>
  <link rel="stylesheet" href="../style/estilo.css">
  
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	 <?php 
      include'../config/conexion.php';
      $bases=new conexion();
      if(isset($_GET['id'])){
       $Id=$_GET['id'];
       $bases->sql="select dni,nombres,apellidos from personas
       where id_persona=$Id";
       $bases->res=mysqli_query($bases->conector,$bases->sql);
      }
	  ?>
</head>
<body>
  <div class="container mt-4">
    <div class="row justify-content-center">
    <div class="col-xl-6 col-lg-6 col-md-8 col-12">
    <div class="card">
    <div class="card-header bg-danger text-white">
     <span><strong>Editar datos</strong></span>   
    </div>  
    <form action="../logica/editar.php" method="GET">
    	<input class="d-none" type="text" name="txId" value="<?=$Id?>">
    <div class="card-body">
    <div class="row">
    <?php 
     if($person=mysqli_fetch_row($bases->res)){
     ?>
    <div class="form-group">
    <label>NÚMERO IDENTIFICACIÓN</label>
    <input type="text" name="txtdni" class="form-control" placeholder="Ingrese su número de identificación" value="<?=$person[0]?>">
    </div>  
    <div class="form-group">
    <label>APELLIDOS</label>
    <input type="text" name="txtapellidos" class="form-control" placeholder="Ingrese sus apellidos.." value="<?=$person[2]?>" >
    </div>  
    <div class="form-group">
    <label>NOMBRES</label>
    <input type="text" name="txtnombres" class="form-control" placeholder="Ingrese sus nombres..." value="<?=$person[1]?>">
    </div>  
<?php } ?>
    </div>  
    </div>
    <div class="card-footer">
     <button class="btn btn-outline-success">Guardar Cambios</button> 
    </div>
    </form>
    </div>  
    </div>  
    </div>
   </div>
</body>
</html>