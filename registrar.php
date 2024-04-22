<?php
include("conexion.php");
include("conexion2.php")
// Verifica si se ha enviado el formulario de registro
if (isset($_POST['register'])) {
    // confirmacion para ver si todos los campos han sido completados
    if(
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['password']) >= 1 &&
        strlen($_POST["rut"]) >= 1
    ){
         // obtiene y limpia los valores de los campos del formulario
        $name=trim($_POST['name']);
        $email=trim($_POST['email']);
        $password=trim($_POST['password']);
        $rut=trim($_POST['rut']);
        $fecha=date("d/m/y");
         // prepara la consulta SQL para insertar los datos en la base de datos
        $consulta="INSERT INTO datos(nombre, email, contraseña, rut, fecha)
            VALUES('$name', '$email', '$password', '$rut', '$fecha')";
        // ejecuta la consulta y verifica si fue exitosa
        $resultado= mysqli_query($conex,$consulta);
        //confirmaciones dependiendo de si se ha completado o no el registro
        if ($resultado) {
         ?>
            <h3 class= "success">Se ha completado tu registro</h3>
         <?php
        
        }else{
         ?>
            <h3 class ="error">Ha ocurrido un error en tu registro</h3>
         <?php
        }
    } else {
        ?>
            <h3 class= "error">Debes llenar todos los campos</h3>
        <?php
    }
    
}
?>
