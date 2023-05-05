<?php
    include 'dataLyR.php';
    $message = '';
 if('Registrarse'){
 //echo "vales harta";

    if (isset($_POST["celularE"])) { //DESAPARECER LINEAS DE AVISO

        $celularE=$_POST["celularE"];
        $correoE= $_POST["correoE"];
        $nombreR=$_POST["nombreR"];
        $iden=$_POST["identificacion"];
        $tipo=$_POST["tipo"];
    }

    if(!empty($_POST["nombre"]) && !empty($_POST["curso"]) && !empty($_POST["celularR"]) && !empty($_POST["correoR"])  && !empty($_POST["direccion"]) && !empty($_POST["usuario"]) && !empty($_POST["password"]) ){
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
        <h1>Registro de Alumnos</h1>
    </header>

    <form action="Registrarse.php" method = "post" accep-charset = "utf-8">
        <div class = "contenedor" style="width: 350px; height: 1080px; background: #FDFEFE; text-align: center;" >
            <label>Apellidos y Nombres<br> <input type="text" name = "nombre" value = "" required="true" placeholder ="Ingrese sus 2 apellidos y sus 2 nombres"></label>
            <br>
            <br> 
            <label>Cédula<br> <input type="text" name = "identificacion" value = "" required="true" placeholder ="Ingrese su cedula"></label>
            <br>
            <br>
            <label>Curso<br> <input type="text" name = "curso" value = "" required="true" placeholder ="Ejemplo 3C"></label>
            <br>
            <br> 
            <label>Célular<br> <input type="text" name = "celularE" value = "" required="true" placeholder ="Ingresa tu numero de Celular"></label>
            <br>
            <br>
            <label>Correo electronico<br> <input type="text" name = "correoE" value = "" required="true" placeholder ="Ingrese su correo"></label>
            <br>
            <br>
            <label>Nombre del Representante<br> <input type="text" name = "nombreR" value = "" required="true" placeholder ="Nombre de su Representante"></label>
            <br>
            <br>
            <label>Célular del representante<br> <input type="text" name = "celularR" value = "" required="true" placeholder ="Ingrese el celular de su representante"></label>
            <br>
            <br>
            <label>Correo del representante<br> <input type="text" name = "correoR" value = "" required="true" placeholder ="Ingrese el correo de su representante"></label>
            <br>
            <br>
            <label>Dirección<br> <input type="text" name = "direccion" value = "" required="true" placeholder ="Ingrese su dirección domiciliaria"></label>
            <br>
            <br>     
            <label>Usuario<br> <input type="text" name = "usuario" value = "" required="true" placeholder ="Ingrese el usuario"></label>
            <br>
            <br> 
            <label>Contraseña<br> <input type="password" name = "password" value = "" required="true" placeholder ="Ingrese su contraseña"></label>
            <br>
            <br>
            <label style="display: none;">Tipo de usuario<br> <input type="text" name = "tipo" value = "0" required="true" placeholder ="Ingrese su contraseña"></label> 
            <input type="submit" value = "Registrarse">
            <br>
            <br>
            <a href="RegistrarseP.php" class="button-I">Profesores e Inspectores</a><br><br>
            <a href="Login.php" class="button-I">Inicio</a>
        </div>   
    </form>
</body>
</html>