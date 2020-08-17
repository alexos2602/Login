<!-- session_start trae los valores de $_SESSION-->

<?php session_start();

    // "isset" retorna TRUE si la variable existe y no es NULL
    if(isset($_SESSION['usuario'])) {
        header('location: principal.php');
    }else{
        header('location: login.php');
    }

?>