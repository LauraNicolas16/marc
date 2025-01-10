<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
  	<title>SIRCAM</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/png" href="views/img/icons/hraei.ico" />
	<link rel="stylesheet" href="views/css/style.css">

<style type="text/css"> @font-face { font-family: 'Montserrat', sans-serif; src:url(http://fonts.cdnfonts.com/css/montserrat);}</style>
     <script> function noBack(){
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="";}
} </script>
	</head>
      
	
	<body class="img js-fullheight" style="background-image: url(views/img/CM.jpg);" onload="noBack()">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				 
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Sistema de Referencia de Cáncer de Mama</h3>
		      	<form method="post" class="signin-form">
		      		<div class="form-group">
                        
                        <input onKeyUp="this.value = this.value.toUpperCase();" type="text" class="form-control" placeholder="Clues de Institución"  name="Usuario" required>
                        
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" placeholder="Contraseña" required name="Password" >
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	
                     <input name="@" type="submit"  value="✔ Continuar" class="form-control btn btn-success submit px-3">
                    
                  
	            </div>
	            
	          </form>
                        
          
  <?php
  if (isset($_POST['@'])) {
    include_once("controller/conexion.php");
    $usu = mysqli_real_escape_string($conn,$_POST['Usuario']);
    $pass = mysqli_real_escape_string($conn,$_POST['Password']);
    $query = "SELECT id_user,pass,tipo_usu,id_zona_ref FROM users WHERE clues= ? ";
    $resultado=$conn->prepare($query);
    $resultado->bind_param('s',$usu);
    $resultado->execute();
    $resultado->bind_result($id_usu,$hash_default_salt,$tipo_usu,$id_zona_ref);
    $result = $resultado->fetch();
    $resultado->close();
    if ($hash_default_salt) {
      $ck = password_verify($pass,$hash_default_salt);
      if($ck){
        $_SESSION['last_reg'] = time();
        $_SESSION['Usuario'] = $usu;
        $_SESSION['id_usu'] = $id_usu;
        $_SESSION['tipo_usu'] = $tipo_usu;
        $_SESSION['id_zona_ref'] = $id_zona_ref;
        if($tipo_usu==3 || $tipo_usu==4){
 
            
           echo "<center><hr><h5 style='color: green;'><b>¡Bienvenido! $_POST[Usuario] </b></h5></center> 
      
      
      <script>
      setTimeout(function(){
        window.location = 'views/Administrador';
    }, 1700);
  
</script>"; 
            
        }else if($tipo_usu==1 || $tipo_usu==2){
            
            
        
            
              echo "<center><hr><h5 style='color: green;'><b>¡Bienvenido! $_POST[Usuario] </b></h5></center> 
      
      
      <script>
      setTimeout(function(){
        window.location = 'views/ADP';
    }, 1700);
  
</script>";      
            
            
        }else{
  
                  echo "<center><hr><h5 style='color: white;'><b>¡Error al leer privilegios de usuario! </b></h5></center> ";
 
            
        }
      }else{
       echo "<center><hr><h5 style='color: white;'><b>¡Acceso Incorrecto! </b></h5></center> ";
      }
    }else {
       echo "<center><hr><h5 style='color: white;'><b>¡Acceso Incorrecto! </b></h5></center> ";
   }
    mysqli_close($conn);
  }
  ?>              
                        
		      </div>
				</div>
			</div> 
		</div>
	</section>

  <script src="views/js/jquery.min.js"></script>
  <script src="views/js/popper.js"></script>
  <script src="views/js/bootstrap.min.js"></script>
  <script src="views/js/main.js"></script>

	</body>
    
  
    
    
    
    
    
    
    
    
</html>

