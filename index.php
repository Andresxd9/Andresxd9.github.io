<?php
session_start();
 include 'dataLyR.php';
 if (isset($_POST['txtcurso'])) {
   $cur=$_POST['txtcurso'];
 }
 

if('Ingresar'){

if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT * FROM registro WHERE usuario = :usuario');
    $records->bindParam(':usuario', $_POST['usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    //var_dump($results);
    $message = '';
    if ($results) {   

    if (count($results)  && password_verify($_POST['password'], $results['pass'])) {

       // var_dump($results);
      $_SESSION['usr_id']     = $results['id'];
     /* $_SESSION['usr_alias']  = $results['usr_alias'];
      $_SESSION['usr_tipo']   = $results['usr_tipo'];
      $_SESSION['usr_sta']    = $results['usr_status'];*/
     //$results['id']
        
     header("Location:Ingreso-Sistema/IngresoSistema.php?curs=".$cur);
    }else{
        echo '<script language="javascript">alert("Su contraseña es incorrecta");window.location.href="Login.php"</script>';        
    }
    
    }else{

        echo '<script language="javascript">alert("Tu usuario o contraseña estan incorrectos o aun no te has registrado");window.location.href="Login.php"</script>';
    }
}
}
?>
<!--DISEÑO DE INICIO DE SESION-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <link rel = "stylesheet" type = "text/css" href="css/Registrarse.css">
    <link rel="shortcut icon" type="image/x-icon" href="css/Imagenes/icono.png">

</head>
<body>
    <header>
        <h1>Iniciar Sesión</h1>
    </header>

  <form action="Login.php"method = "post" accep-charset = "utf-8">
        <div class = "contenedor1" style="width: 350px; height: 450px; background: #FDFEFE; bottom: -80px;" >
            <label>USUARIO <br> <input type="text" name = "usuario" value = "" required="true" placeholder ="Ingrese el usuario"></label>
            <br>
            <br>  
            <label>CONTRASEÑA <br> <input type="password" name = "password" value = "" required="true" placeholder ="Ingrese su contraseña"></label>
            <br>
            <br>
            <label>Si eres profesor, escoja el curso</label>
            <br>
            <br>
                <?php 
                $alu=$conn->query("SELECT DISTINCT (curso) FROM registro WHERE
                curso!=''")->fetchAll(PDO::FETCH_OBJ);
              ?>

              <br> <br>
              <select name="txtcurso" class="form-control">
                <option value="">Selecione curso</option>
                <?php foreach ($alu as $fila): ?>
                  <option value="<?php echo $fila->curso; ?>"><?php echo $fila->curso?></option>
                <?php endforeach ?>
              </select>
             <input type="submit" class="button-R" value = "Ingresar" style="bottom: -55px;">
            <br>
            <br>
            <a href="Registrarse.php" class="button-R" style="bottom: 130px;">Registrate</a>
        </div>
    </form>
</body>
</html>
