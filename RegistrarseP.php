<?php
    include 'dataLyR.php';
    $message = '';
 if('Registrarse'){
  //echo "vales harta";

    if (isset($_POST["nombreR"])) { //DESAPARECER LINEAS DE AVISO

         $celularE=$_POST["celularE"];
         $correoE= $_POST["correoE"];
         $nombreR=$_POST["nombreR"];
         $iden=$_POST["identificacion"];
         $tipo=$_POST["tipo"];
    }

    if(!empty($_POST["nombre"]) && !empty($_POST["usuario"]) && !empty($_POST["password"]) ){
        $sql = "INSERT INTO registro (nombre, curso, celularE, correoE, nombreR, celularR, correoR, direccion, usuario, cedula, pass, tipo) VALUES (:nombre, :curso, :celularE, :correoE, :nombreR, :celularR, :correoR,:direccion, :usuario, :identificacion, :passw, :tipo)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':curso',$_POST['curso']);
        $stmt->bindParam(':celularE',$_POST['celularE']);
        $stmt->bindParam(':correoE',$_POST['correoE']);
        $stmt->bindParam(':nombreR',$_POST['nombreR']);
        $stmt->bindParam(':celularR',$_POST['celularR']);
        $stmt->bindParam(':correoR',$_POST['correoR']);
        $stmt->bindParam(':direccion',$_POST['direccion']);
        $stmt->bindParam(':usuario',$_POST['usuario']);
        $passw = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':passw',$passw);
        $stmt->bindParam(':identificacion',$iden);
        $stmt->bindParam(':tipo',$tipo);
        //$stmt->execute();
        //$results = $stmt->fetch(PDO::FETCH_ASSOC);
       
        if($stmt->execute()){
            $message = 'Usuario resgistrado correctamente';
            header("Location:Login.php");
        }else{
            $message = 'Se ha producido un error al registrar su contraseña';
            header("Location:Login.php");
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de REGISTRO</title>
    <link rel = "stylesheet" type = "text/css" href="Css/Registrarse.css">
</head>
<body>
    <?php if(!empty($message)):?>
        <p><?= $message ?></p>
        <?php endif; ?>

    <header>
        <h1>Registro de Profesores e Inspectores</h1>
    </header>

    <form action="RegistrarseP.php" method = "post" accep-charset = "utf-8">
        <div class = "contenedor" style="width: 350px; height: 460px; background: #FDFEFE; text-align: center;" >
            <label>Apellidos y Nombres<br> <input type="text" name = "nombre" value = "" required="true" placeholder ="Ingrese nombre y apellido"></label>
            <br>
            <br> 
            <label style="display: none;">Cédula<br> <input type="text" name = "identificacion" value = "" placeholder ="Ingrese su cedula"></label>

            <label style="display: none;">Curso<br> <input type="text" name = "curso" value = "" placeholder ="Ejemplo 3C"></label>

            <label style="display: none;">Célular<br> <input type="text" name = "celularE" value = "" placeholder ="Ingresa tu numero de Celular"></label>

            <label style="display: none;">Correo electronico<br> <input type="text" name = "correoE" value = "" placeholder ="Ingrese su correo"></label>

            <label style="display: none;">Nombre del Representante<br> <input type="text" name = "nombreR" value = "" placeholder ="Nombre de su Representante"></label>

            <label style="display: none;">Célular del representante<br> <input type="text" name = "celularR" value = "" placeholder ="Ingrese el celular de su representante"></label>

            <label style="display: none;">Correo del representante<br> <input type="text" name = "correoR" value = "" placeholder ="Ingrese el correo de su representante"></label>

            <label style="display: none;">Dirección<br> <input type="text" name = "direccion" value = "" placeholder ="Ingrese su dirección domiciliaria"></label>     
            <label>Usuario<br> <input type="text" name = "usuario" value = "" required="true" placeholder ="Ingrese un usuario"></label>
            <br>
            <br> 
            <label>Contraseña<br> <input type="password" name = "password" value = "" required="true" placeholder ="Ingrese su contraseña"></label>
            <br>
            <br> 
            <label>Tipo de usuario
            <select  name = "tipo" required="true">
                <option type="text" value ="1">Profesor</option>
                <option type="text" value ="2">Inspector</option>
            </select>
            </label>
            <br>
            <input type="submit" value = "Registrarse">
            <br>
            <br>
            <a href="Login.php" class="button-I">Inicio</a>
            <br>
            <br>
        </div>   
    </form>
</body>
</html>