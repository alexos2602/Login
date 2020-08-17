<!-- session_start trae los valores de $_SESSION-->
<?php session_start();

    /* "isset" retorna TRUE si la variable existe y no es NULL */
    if(isset($_SESSION['usuario'])) {
        header('location: index.php');
    }

    /* incluye la conexion  */
    include ("conexion.php");
    $error = '';
    
    /* verificacion de usuario */ 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $clave = hash('sha512', $clave);
        
        /* Prepare() Crea plantilla del query y envia a la base de datos sin ejecutarla */
        $statement = $conexion->prepare('SELECT * FROM login WHERE usuario = :usuario AND clave = :clave');
        
        /*Ejecuta la sentencia preparada*/
        $statement->execute(array(
            ':usuario' => $usuario,
            ':clave' => $clave
        ));
            
        /*Obtiene una fila de un conjunto de resultados*/
        $resultado = $statement->fetch();
        
        if ($resultado !== false){
            $_SESSION['usuario'] = $usuario;
            header('location: principal.php');
        }else{
            $error .= '<i>Este usuario no existe</i>';
        }
    }
    
require 'frontend/login-vista.php';

?>