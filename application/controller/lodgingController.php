<?php
    //crear una clase y  heredar del controlador principal 
    class lodgingController extends Controller{
        //cerar atributsos 
        private $modelL;
        private $modelCI;

        //CERAR EL CONSTRUCTOR
        public function __construct(){
            //intanciamiento del modelo
            $this -> modelL = $this -> loadModel("mdlLodging");
            $this -> modelCI = $this -> loadModel("mdlCheckin");
        }

        //metodo el admin
        public function main(){
            require APP . 'view/_templates/header.php';
            require APP . 'view/Users/main.php';
            require APP . 'view/_templates/footer.php';
        }

        //metodo para ver cabañas
        public function viewLodging(){

            //metodo para registrar cabañas
            if(isset($_POST['btnRegister'])){
                //primero va los atributos del modelo luego los names del formulario
                $this -> modelL -> __SET('num_lodging', $_POST['txtNum_Lodging']);
                //llamamos al metodo del modelo
                $lodging = $this -> modelL -> registersLodging();
                // var_dump($lodging); exit;
                //aca quedara el condicional para usar la libreria del seetalert
                if($lodging == true){
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Done!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "lodgingController/viewLodging");
                    exit();
                }else {
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "lodgingController/viewLodging");
                    exit();
                }
            }

            //metodo para registrar checkin
            if(isset($_POST['btnCheckin'])){
                //primero va los atributos del modelo luego los names del formulario
                $this -> modelCI -> __SET('idClient', $_POST['idClient']);
                $this -> modelCI -> __SET('idLodging', $_POST['idLodging']);
                $this -> modelCI -> __SET('checkIn', $_POST['checkin_date']);
                $this -> modelCI -> __SET('checkInTime', $_POST['checkin_time']);
                $this -> modelCI -> __SET('checkOut', $_POST['checkout_date']);
                $this -> modelCI -> __SET('checkOutTime', $_POST['checkout_time']);
                $this -> modelCI -> __SET('idPaymentDetail', $_POST['idPaymentDetailRate']);
                $this -> modelCI -> __SET('idPaymentDetail', $_POST['idPaymentDetailDescription']);
                //llamamos al metodo del modelo
                $checkIn = $this -> modelCI -> registersCheckin();
                // var_dump($checkIn); exit;
                //aca quedara el condicional para usar la libreria del seetalert
                if($checkIn == true){
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Done!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "checkInController/viewCheckIn");
                    exit();
                }else {
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "lodgingController/viewLodging");
                    exit();
                }
            }

            //variables para llamar los metodos necesarios
            $lodging = $this -> modelL -> viewLodging();
            $checkIn = $this -> modelL -> viewCheckIn();
            $clients = $this -> modelL -> viewClient();
            $paymentDetails = $this -> modelL -> viewPaymentDetails();
            require APP . 'view/_templates/header.php';
            require APP . 'view/Lodging/viewLodging.php';
            require APP . 'view/_templates/footer.php';
        }

        //metodo para filtrar las cabañas
        public function lodgingId(){
            //variable para controlar la llegada del dato
            $lodging = $this -> modelL -> lodgingId($_POST['id']);
            echo json_encode($lodging);//trasformar los datos del la base de datos en archivo json
        }


        //metodo para cambiar el estado
        public function changeStatusL(){
            //variable para controlara la llegada del dato
            $status = $this -> modelL -> changeStatusL($_POST['id']);
            echo 1;
        }

    }
?>