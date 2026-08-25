<?php
    //crear una clase y  heredar del controlador principal 
    class clientController extends Controller{
        //cerar atributsos 
        private $modelC;

        //CERAR EL CONSTRUCTOR
        public function __construct(){
            //intanciamiento del modelo
            $this -> modelC = $this -> loadModel("mdlClients");
        }

        //metodo el admin
        public function main(){
            require APP . 'view/_templates/header.php';
            require APP . 'view/Users/main.php';
            require APP . 'view/_templates/footer.php';
        }

        //metodo para ver los clientes
        public function viewClients(){
            //metodo para editar clientes
            if(isset($_POST['btnUpdate'])){
                //primero va los atributos del modelo luego los names del formulario
                $this -> modelC -> __SET('names', $_POST['txtNames']);
                $this -> modelC -> __SET('lastnames', $_POST['txtLastNames']);
                $this -> modelC -> __SET('email', $_POST['txtEmail']);
                $this -> modelC -> __SET('phone', $_POST['txtPhone']);
                $this -> modelC -> __SET('adults', $_POST['selAdults']);
                $this -> modelC -> __SET('minors', $_POST['selMinors']);
                $this -> modelC -> __SET('idClient', $_POST['txtIdClient']);
                //
                $update = $this -> modelC -> updateClient();
                // var_dump($update); exit;
                //aca quedara el condicional para usar la libreria del seetalert
                if($update == true){
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Done!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "clientController/viewClients");
                    exit();
                }else {
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "clientsController/registerClients");
                    exit();
                }
            }
            //variables para llamar los metodos necesarios
            $clients = $this -> modelC -> viewClients();
            $typeDocument = $this -> modelC -> viewTypeDocumet();
            require APP . 'view/_templates/header.php';
            require APP . 'view/Clients/viewClients.php';
            require APP . 'view/_templates/footer.php';
        }

        public function registerClient(){

            if(isset($_POST['btnSend'])){
                //primero va los atributos del modelo luego los names del formulario
                $this -> modelC -> __SET('document', $_POST['txtDocument']);
                $this -> modelC -> __SET('names', $_POST['txtNames']);
                $this -> modelC -> __SET('lastnames', $_POST['txtLastNames']);
                $this -> modelC -> __SET('email', $_POST['txtEmail']);
                $this -> modelC -> __SET('phone', $_POST['txtPhone']);
                $this -> modelC -> __SET('adults', $_POST['selAdults']);
                $this -> modelC -> __SET('minors', $_POST['selMinors']);
                $this -> modelC -> __SET('idTypeDocument', $_POST['sellTypeDocument']);
                //
                $client = $this -> modelC -> registerClient();
                // var_dump($user); exit;
                //aca quedara el condicional para usar la libreria del seetalert
                if($client == true){
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Done!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "clientController/viewClients");
                    header("Location:" . URL . "clientController/viewClients");
                    exit();
                }else {
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "clientController/registerClients");
                    exit();
                }
            }
            //variables para llamar los metodos necesarios
            $clients = $this -> modelC -> viewClients();
            $documents = $this -> modelC -> viewTypeDocumet();
            require APP . 'view/_templates/header.php';
            require APP . 'view/Clients/registerClients.php';
            require APP . 'view/_templates/footer.php';
        }
        

        //metodo para filtrar el cliente
        public function clientsId(){
            //variable para controlara la llegada del dato
            $clients = $this -> modelC -> clientsId($_POST['id']);
            echo json_encode($clients);//trasformar los datos del la base de datos en archivo json
        }

        // //metodo para cambiar el estado
        public function changeStatusC(){
            //variable para controlara la llegada del dato
            $status = $this -> modelC -> changeStatusC($_POST['id']);
            echo 1;
        }


    }
?>