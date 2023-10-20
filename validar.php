<?php
include_once 'includes/user.php';
include_once 'includes/user_session.php';


$userSession = new UserSession();
$user = new User();

if(isset($_SESSION['user'])){
    //(echo "hay sesion";
    $user->setUser($userSession->getCurrentUser());
    include_once 'perfil2.php';

}else if(isset($_POST['telefono']) ){
    //echo "Validacion de login";
    $userForm = $_POST['telefono'];


    //$user = new User();
    if($user->userExists($userForm )){
        //echo "Existe el usuario";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);

        include_once 'perfil2.php';
   }else{
        //echo "Número de teléfono no registrado";
        $errorLogin = " Número de teléfono incorrecto y/o no registrado";
        include_once 'login.php';
   }
}else{
   //echo "login";
  include_once 'login.php';
}

?>