<?php
session_start();
require_once('config.php');
 
if(isset($_POST['submit']))
{
    if(isset($_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['password']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['email']) && !empty($_POST['password']))
    {
        $firstName = trim($_POST['nombre']);
        $lastName = trim($_POST['apellido']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $hashPassword = $password;
        $options = array("cost"=>4);
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        $date = date('Y-m-d H:i:s');
 
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $sql = 'select * from users where email = :email';
            $stmt = $pdo->prepare($sql);
            $p = ['email'=>$email];
            $stmt->execute($p);
            
            if($stmt->rowCount() == 0)
            {
                $sql = "insert into users (nombre, apellido, email, `password`, created_at,updated_at) values(:vnombre,:vapellido,:email,:pass,:created_at,:updated_at)";
            
                try{
                    $handle = $pdo->prepare($sql);
                    $params = [
                        ':vnombre'=>$firstName,
                        ':vapellido'=>$lastName,
                        ':email'=>$email,
                        ':pass'=>$hashPassword,
                        ':created_at'=>$date,
                        ':updated_at'=>$date
                    ];
                    
                    $handle->execute($params);
                    
                    $success = 'Usuario creado correctamente!!';
                    
                }
                catch(PDOException $e){
                    $errors[] = $e->getMessage();
                }
            }
            else
            {
                $valFirstName = $firstName;
                $valLastName = $lastName;
                $valEmail = '';
                $valPassword = $password;
 
                $errors[] = 'El correo ya esta registrado';
            }
        }
        else
        {
            $errors[] = "El correo no es valido";
        }
    }
    else
    {
        if(!isset($_POST['nombre']) || empty($_POST['nombre']))
        {
            $errors[] = 'El Nombre es requerido';
        }
        else
        {
            $valFirstName = $_POST['apellido'];
        }
        if(!isset($_POST['apellido']) || empty($_POST['apellido']))
        {
            $errors[] = 'El Apellido es requerido';
        }
        else
        {
            $valLastName = $_POST['apellido'];
        }
 
        if(!isset($_POST['email']) || empty($_POST['email']))
        {
            $errors[] = 'El Correo es requerido';
        }
        else
        {
            $valEmail = $_POST['email'];
        }
 
        if(!isset($_POST['password']) || empty($_POST['password']))
        {
            $errors[] = 'La Contraseña es requerido';
        }
        else
        {
            $valPassword = $_POST['password'];
        }
        
    }
 
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="css/mistilo.css">
    <title>Marte Studio</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="power">
    <main>
        <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <?php 
                if(isset($errors) && count($errors) > 0){
                foreach($errors as $error_msg){   
                echo '<div class="alert alert-danger">'.$error_msg.'</div>';
                }
                }
                if(isset($success)){
                echo '<div class="alert alert-success">'.$success.'</div>';
                }
                ?>
            <h3 class="form_title">Crear una cuenta</h3>
            <div class="form_container">
                <div class="form_group">
                    <label for="nombre" class="form_label">Nombre</label>
                    <input class="form_input" id="nombre" name="nombre" type="text" placeholder="Ingrese su nombre" />
                    <span class="form:line"></span>
                </div>
                <div class="form_group">
                    <label for="apellido" class="form_label">Apellido</label>
                    <input class="form_input" id="apellido" name="apellido" type="text"
                        placeholder="Ingrese su apellido" />
                    <span class="form:line"></span>
                </div>
                <div class="form_group">
                    <label for="email" class="form_label">Correo</label>
                    <input class="form_input" id="email" name="email" type="email" aria-describedby="emailHelp"
                        placeholder="Ingrese su correo" />
                    <span class="form:line"></span>
                </div>
                <div class="form_group">
                    <label for="password" class="form_label">contraseña</label>
                    <input class="form_input" id="password" name="password" type="password"
                        placeholder="Ingrese una contraseña" />
                    <span class="form:line"></span>
                </div>
                <div class="form_group">
                    <label for="repassword" class="form_label">Confirme la contraseña</label>
                    <input class="form_input" id="repassword" name="repassword" type="password"
                        placeholder="Confrime su contraseña" />
                    <span class="form:line"></span>
                </div>
                <button type="submit" name="submit" class="form_submit">Registrarse</button>
            </div>
            <div class="small"><a class="form_link" href="login.php">¿Tiene una cuenta? Ir a iniciar sesión</a></div>
        </form>
    </main>
</body>

</html>