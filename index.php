<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de Fortnite</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
   <?php
        require_once('includes/connect.php');
        require_once('includes/helpers.php'); 
        include_once 'includes/header.php';
   ?>

    <div id="container">   
        <?php
            include_once 'includes/aside.php';
        ?>
            
        <div id="main">
            <h1>Últimas entradas</h1>

            <article class= 'entry'>
                <a href="">
                    <h2>Como construir mas rápido en fortnite</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione repudiandae nisi obcaecati. Architecto aliquam facilis animi maiores veniam aspernatur ea distinctio officiis consectetur dolorum delectus sequi ad nostrum, sed facere!</p>
                    
                </a>
            </article>
            <article class='entry'>
            <a href="">
                    <h2>Como construir mas rápido en fortnite</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione repudiandae nisi obcaecati. Architecto aliquam facilis animi maiores veniam aspernatur ea distinctio officiis consectetur dolorum delectus sequi ad nostrum, sed facere!</p>
                </a>
            </article>
            <article class='entry'>
            <a href="">
                    <h2>Como construir mas rápido en fortnite</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione repudiandae nisi obcaecati. Architecto aliquam facilis animi maiores veniam aspernatur ea distinctio officiis consectetur dolorum delectus sequi ad nostrum, sed facere!</p>
                </a>
            </article>
            <div id="ver-todas"><a href="">Ver todas las entradas</a></div>
        </div>
        <div class="clearfix"></div>
        
    </div>

    <?php
        include_once 'includes/footer.php';
    ?>

</body>
</html>