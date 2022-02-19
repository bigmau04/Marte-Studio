<?php
session_start();
require_once('config.php');
 
if(isset($_POST['submit']))
{
	if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
	{
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
 
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$sql = "select * from users where email = :email ";
			$handle = $pdo->prepare($sql);
			$params = ['email'=>$email];
			$handle->execute($params);
			if($handle->rowCount() > 0)
			{
				$getRow = $handle->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password, $getRow['password']))
				{
					unset($getRow['password']);
					$_SESSION = $getRow;
					header('location:dashboard.php');
					exit();
				}
				else
				{
					$errors[] = "Error en  Email o Password";
				}
			}
			else
			{
				$errors[] = "Error Email o Password";
			}
			
		}
		else
		{
			$errors[] = "Email no valido";	
		}
 
	}
	else
	{
		$errors[] = "El email y la contraseña son requeridos";	
	}
 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Marte Studio</title>
    <link href="css/mistilo.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="power">
    <main>
        <form class="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <?php 
            	if (isset($errors) && count($errors) > 0) {
            	foreach ($errors as $error_msg) {
            	echo '<div class="alert alert-danger">' . $error_msg . '</div>';
            	}
            	}
            	?>
            <h2 class="form_title">Bienvenido a Marte Studio</h2>
            <h2 class="form_title">Iniciar Sesión</h2>
            <div class="form_container">
                <div class="form_group">
                    <label for="email" class="form_label"> Correo electrónico</label>
                    <input class="form_input" name="email" id="email" type="email" placeholder=" " />
                    <span class="form:line"></span>
                </div>
                <div class="form_group">
                    <label for="password" class="form_label">contraseña</label>
                    <input class="form_input" id="password" name="password" type="password" placeholder=" " />
                    <span class="form:line"></span>
                </div>
            </div>
            <button type="submit" name="submit" class="form_submit">Iniciar Sesion</button>
            <div> <a class="form_link" href="register.php">¿Aún no tienes cuenta?</a></div>
        </form>

    </main>
    </div>
</body>

</html>