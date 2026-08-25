<?php
    //crear una clase y  heredar del controlador principal 
    class userController extends Controller{
        //cerar atributsos 
        private $modelU;

        //CERAR EL CONSTRUCTOR
        public function __construct(){
            //intanciamiento del modelo
            $this -> modelU = $this -> loadModel("mdlUser");
        }

        //crarar la funcion para loguear

        public function LogIn(){
            //variable para controlara los errores 
            $error = false;//desactivar
            //validacion de dotos
            if(isset($_POST['btnLogin'])){
                //enviar los datos a los atributos del modelo, recibiendo del formulario
                $this -> modelU -> __SET('username', $_POST['txtUsername']);
                $this -> modelU -> __SET('password', sha1(md5(sha1( $_POST['txtPassword']))));

                //llmar al metodo del modelo que balida la informacion
                $validate = $this -> modelU -> validateUser();
                // var_dump($validate);exit;

                //revisar la validacion
                if($validate == true){
                    $_SESSION['SESSION START'] = true;//crear la session
                    $error = false;

                    //informacion para trabajar o disponer
                    $_SESSION['Names'] = $validate['Names'];
                    $_SESSION['Lastnames'] = $validate['Lastnames'];
                    $_SESSION['idUser'] = $validate['idUser'];
                    $_SESSION['Document'] = $validate['Document'];
                    $_SESSION['Username'] = $validate['Username'];
                    $_SESSION['StatusU'] = $validate['StatusU'];

                    //despues de la validacion caragar admin
                    header("location:". URL . "userController/main");
                }else{
                    $error = true;
                }
            }
            require APP . 'view/Users/login.php';
        }

        //metodo el admin
        public function main(){
            require APP . 'view/_templates/header.php';
            require APP . 'view/Users/main.php';
            require APP . 'view/_templates/footer.php';
        }

        //metodo para cerrar sesion
        public function LogOut(){
            //condicional para validar si hay sessiones activas
            if (isset($_SESSION['SESSION_START'])) {
                session_destroy();
            }
            header("Location:" . URL . "userController/LogIn");
            exit;
        }

        //metodo para ver ususrios
        public function viewUsers(){
            if(isset($_POST['btnSendU'])){
                //primero va los atributos del modelo luego los names del formulario
                $this -> modelU -> __SET('idUser', $_POST['id']);
                $this -> modelU -> __SET('names', $_POST['txtNames']);
                $this -> modelU -> __SET('lastnames', $_POST['txtLastNames']);
                $this -> modelU -> __SET('email', $_POST['txtEmail']);
                $this -> modelU -> __SET('phone', $_POST['txtPhone']);
                $this -> modelU -> __SET('address', $_POST['txtAddres']);
                $this -> modelU -> __SET('username', $_POST['txtUsername']);
                //
                $update = $this -> modelU -> updateUser();
                // var_dump($update); exit;
                //aca quedara el condicional para usar la libreria del seetalert
                if($update == true){
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Done!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "userController/viewUsers");
                    exit();
                }else {
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "userController/registerUsers");
                    exit();
                }
            }
            //variables para llamar los metodos necesarios
            $user = $this -> modelU -> viewUsers();
            $roles = $this -> modelU -> viewRoles();
            $documents = $this -> modelU -> viewTypeDocuments();
            require APP . 'view/_templates/header.php';
            require APP . 'view/Users/viewUsers.php';
            require APP . 'view/_templates/footer.php';
        }
        //metodo para registar ususrios 
        public function registerUsers(){

            if(isset($_POST['btnSend'])){
                //primero va los atributos del modelo luego los names del formulario
                $this -> modelU -> __SET('document', $_POST['txtDocument']);
                $this -> modelU -> __SET('names', $_POST['txtNames']);
                $this -> modelU -> __SET('lastnames', $_POST['txtLastNames']);
                $this -> modelU -> __SET('email', $_POST['txtEmail']);
                $this -> modelU -> __SET('phone', $_POST['txtPhone']);
                $this -> modelU -> __SET('address', $_POST['txtAddres']);
                $this -> modelU -> __SET('gender', $_POST['sellGender']);
                $this -> modelU -> __SET('birthdate', $_POST['txtBirthdate']);
                $this -> modelU -> __SET('username', $_POST['txtUsername']);
                $this -> modelU -> __SET('password', sha1(md5(sha1( $_POST['txtPassword']))));
                $this -> modelU -> __SET('idTypeDocument', $_POST['sellTypeDocument']);
                $this -> modelU -> __SET('idRol', $_POST['sellRol']);

                //
                $user = $this -> modelU -> registersUsers();
                // var_dump($user); exit;
                //aca quedara el condicional para usar la libreria del seetalert
                if($user == true){
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Done!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "userController/viewUsers");
                    header("Location:" . URL . "userController/viewUsers");
                    exit();
                }else {
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "userController/registerUsers");
                    exit();
                }
            }
            //variables para llamar los metodos necesarios
            $user = $this -> modelU -> viewUsers();
            $roles = $this -> modelU -> viewRoles();
            $documents = $this -> modelU -> viewTypeDocuments();
            require APP . 'view/_templates/header.php';
            require APP . 'view/Users/registerUsers.php';
            require APP . 'view/_templates/footer.php';
        }

        //metodo para filtrar el ususrio
        public function userId(){
            //variable para controlara la llegada del dato
            $user = $this -> modelU -> userId($_POST['id']);
            echo json_encode($user);//trasformar los datos del la base de datos en archivo json
        }


        //metodo para cambiar el estado
        public function changeStatus(){
            //variable para controlara la llegada del dato
            $status = $this -> modelU -> changeStatus($_POST['id']);
            echo 1;
        }

        

    }
?>