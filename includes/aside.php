<?php 
    session_start();
?>
<aside id="sidebar">

    <?php if(isset($_SESSION['user'])): ?>
        <div id="logged-user" class="block-aside" style>
            <h3>Bienvenido, <?=$_SESSION['user']['name'] .' '. $_SESSION['user']['lastname'] ?></h3>
            <a href="logout.php" class="button" style="text-align: center">Crear entrada</a>
            <a href="logout.php" class="button" style="text-align: center">Crear categoria</a>
            <a href="logout.php" class="button" style="text-align: center">Mis datos</a>
            <a href="logout.php" class="button" style="text-align: center; background: black">Cerrar Sesión</a>

        </div>
        <?php endif; ?>


    <div id="login" class='block-aside'>
        <h3>Identifícate</h3><hr><br>
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'incorrectcredentials') : ''; ?>
        <form action="login.php" method='POST'>
            <label for="email">Email</label>
            <input type="text" name='email'>

            <label for="password">Contraseña</label>
            <input type="password" name='password'>

            <input type="submit" value="Entrar">
        </form>
    </div><br>
    <div id="register" class='block-aside'>
        <h3>Regístrate</h3><hr><br>
        <?php echo isset($_SESSION['registered']) ? "<div class='alert alert-success' role='alert'>" .$_SESSION['registered']. "</div>" : '' ?>
        <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'general') : ''; ?>
        <form action="register.php" method='POST'>
            <label for="name">Nombre</label >
            <input type="text" name='name' required>
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'name') : ''; ?>

            <label for="lastname">Apellidos</label>
            <input type="text" name='lastname' required>
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'lastName') : ''; ?>

            <label for="email">Email</label>
            <input type="email" name='email' required>
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'email') : ''; ?>
            <?php echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'duplicated') : ''; ?>

            <label for="password">Contraseña</label>
            <input type="password" name='password' required>
            
            <?php 
                echo isset($_SESSION['errors']) ? showError($_SESSION['errors'], 'password') : '';
                deleteErrors();
                ?>
            
            

            <input type="submit" value="Registrar">
        </form>
    </div>
</aside> 