<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />

        <link rel="stylesheet" href="css/stylz.css" />

        <title>Untitled Document | Skeleton CSS</title>
    </head>
    <body>
        <?php
        
        echo"<form name=fLogin method=POST action=index.php>";
        echo "usuario: <input type=text name=nombre required>";
        echo "contraseña: <input type=password name=clave required>";
        echo "repetir contraseña: <input type=password name=clave2 required>";
        echo "<input type=submit name=registrar value=registrar>";
        echo "</form>";
        
        if(isset($_POST['registrar'])){
            if($_POST['clave']==$_POST['clave2']){
                session_start();
                $_SESSION['usuario']=$_POST['nombre'];
                $_SESSION['contra']=$_POST['clave'];
            }else{

            }
        }

        ?>
    </body>
</html>