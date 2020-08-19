<?php session_start();

    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }
    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
        
        $clave = hash('sha512', $clave);
        $clave2 = hash('sha512', $clave2);
        
        include ("conexion.php");
        $error = '';
        
        if (empty($correo) or empty($usuario) or empty($clave) or empty($clave2)){
            
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }else{
            
            $statement = $conexion->prepare('SELECT * FROM login WHERE usuario = :usuario LIMIT 1');
            $statement->execute(array(':usuario' => $usuario));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<i>Este usuario ya existe.</i>';
            }
            
            if ($clave != $clave2 or $clave == '' and $clave2 == ''){
                $error .= '<i> Las contraseñas no coinciden o están vacías.</i>';
            }
            
            
        }
        
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO login (id, correo, usuario, clave) VALUES (null, :correo, :usuario, :clave)');
            $statement->execute(array(
                
                ':correo' => $correo,
                ':usuario' => $usuario,
                ':clave' => $clave
                
            ));
            
            $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
        }
    }


    require 'frontend/register-vista.php';

?>