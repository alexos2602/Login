<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    
    <link rel="stylesheet" href="icon/style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="image/animal.png">

</head>
<body>

<div class="container"> 
<div class="container-form">
        <div class="header">
            <div class="logo-title">
                <img src="image/animal.png" alt="">
                <h2>SuperPollo</h2>
            </div>
            <div class="menu">
                <a href="login.php"><li class="module-login active">Login</li></a>
                <a href="register.php"><li class="module-register">Register</li></a>
            </div>
        </div>
        
        <!-- $_SERVER["PHP_SELF"] Variable global que retorna los datos a la pagina actual-->
        <!-- htmlspecialchars convierte caracters especiales a HTML entities -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">
            <div class="welcome-form"><h1>Bienvenido</h1><h2>SuperPollo</h2></div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Nombre Usuario" name="usuario">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="clave">
            </div>
            
            <!-- Mensaje de error -->
             <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <button type="submit">Entrar<label class="lnr lnr-chevron-right"></label></button>
        </form>
    </div>
</div>
    
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
</body>
</html>