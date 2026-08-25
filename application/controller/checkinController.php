<?php
    //crear una clase y  heredar del controlador principal 
    class checkInController extends Controller{
        //cerar atributsos 
        private $modelCI;

        //CERAR EL CONSTRUCTOR
        public function __construct(){
            //intanciamiento del modelo
            $this -> modelCI = $this -> loadModel("mdlCheckin");
        }

        //metodo el admin
        public function main(){
            require APP . 'view/_templates/header.php';
            require APP . 'view/Users/main.php';
            require APP . 'view/_templates/footer.php';
        }

        //metodo para ver los checkin
        public function viewCheckIn(){

            //variables para llamar los metodos necesarios
            $checkIn = $this -> modelCI -> viewCheckIn();
            $clients = $this -> modelCI -> viewClient();
            $paymentDetails = $this -> modelCI -> viewPaymentDetails();
            $lodging = $this -> modelCI -> viewLodging();
            require APP . 'view/_templates/header.php';
            require APP . 'view/Lodging/viewCheckin.php';
            require APP . 'view/_templates/footer.php';
        }

        //metodo para filtrar los check in
        public function checkInId(){
            //variable para controlar la llegada del dato
            $checkIn = $this -> modelCI -> checkInId($_POST['id']);
            // var_dump($checkIn);exit;
            echo json_encode($checkIn);//trasformar los datos del la base de datos en archivo json
        }


        //metodo para cambiar el estado
        public function changeStatusCI(){
            //variable para controlara la llegada del dato
            $status = $this -> modelCI -> changeStatusCI($_POST['id']);
            echo 1;
        }


    }
?>