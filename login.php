<?php
session_start();
if(isset($_POST['email']) && !empty($_POST['email'])){
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $dsn = "mysql:dbname=blog;host=127.0.0.1";
    $dbuser = "root";
    $dbpass = "";
 
    try{
        $db = new PDO($dsn, $dbuser, $dbpass);
        //verifica no bd
        $sql = $db->query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");
        //informacao do usuario
        
            if($sql->rowCount() > 0){
            $dado = $sql->fetch();
            
           $_SESSION['id'] = $dado['id'];
            
            
            header("Location: index.php");
            }       
    } catch (PDOException $ex) {
       echo "Falhou: " .$e->getMessage();
    }
  } 
?>
<form method="POST">
    
    E-mail:<br/>
    <input type="text" name="email"/><br/><br/>
    Senha: <br/>
    <input type="password" name="senha"/><br/><br/>
    <input type="submit" value="Entrar"/>
</form>