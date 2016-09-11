<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        
        if(isset($_SESSION['id']) && empty($_SESSION['id']) == false){
            echo "Área restrita";
        }else{
            //redirecionar para a pagina de login
            header("Location: login.php");
        }
            
        ?>
    </body>
</html>
