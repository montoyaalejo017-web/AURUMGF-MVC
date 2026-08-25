<?php
    //crear una clase y  heredar del controlador principal 
    class paymentsDirectController extends Controller{
        //cerar atributsos 
        private $modelPD;

        //CERAR EL CONSTRUCTOR
        public function __construct(){
            //intanciamiento del modelo
            $this -> modelPD = $this -> loadModel("mdlPaymentsDirect");
        }

        //metodo el admin
        public function main(){
            require APP . 'view/_templates/header.php';
            require APP . 'view/Users/main.php';
            require APP . 'view/_templates/footer.php';
        }

        //metodo para ver los pagos directos
        public function viewPaymentsDirect(){
            
            //variables para llamar los metodos necesarios
            $paymentsDirect = $this -> modelPD -> viewPaymentsDirect();
            $checkin = $this -> modelPD -> viewCheckin();
            $lodging = $this -> modelPD -> viewLodging();
            $clients = $this -> modelPD -> viewClient();
            $paymentMethod = $this -> modelPD -> viewPaymentMethod();
            $paymentDetails = $this -> modelPD -> viewPaymentDetails();
            require APP . 'view/_templates/header.php';
            require APP . 'view/Payments/viewPaymentsDirect.php';
            require APP . 'view/_templates/footer.php';
        }
        
        //metodo para  registar pagos directos
        public function registersPaymentDirect(){

            if(isset($_POST['btnSend'])){
                //primero va los atributos del modelo luego los names del formulario
                $this -> modelPD -> __SET('idCheckIn', $_POST['checkInDate']);
                $this -> modelPD -> __SET('idCheckIn', $_POST['checkInTime']);
                $this -> modelPD -> __SET('idCheckIn', $_POST['checkOutDate']);
                $this -> modelPD -> __SET('idCheckIn', $_POST['checkOutTime']);
                $this -> modelPD -> __SET('idClient', $_POST['idClient']);
                $this -> modelPD -> __SET('idLodging', $_POST['idLodging']);
                $this -> modelPD -> __SET('paymentDate', $_POST['paymentDate']);
                $this -> modelPD -> __SET('totalAmount', $_POST['totalAmount']);
                $this -> modelPD -> __SET('amountPaid', $_POST['amountPaid']);
                $this -> modelPD -> __SET('remainingAmount', $_POST['remainingAmount']);
                $this -> modelPD -> __SET('idPaymentDetail', $_POST['ratePerPerson']);
                $this -> modelPD -> __SET('idPaymentDetail', $_POST['serviceDescription']);
                $this -> modelPD -> __SET('idPaymentMethod', $_POST['idPaymentMethod']);
                // 
                $directP = $this -> modelPD -> registersPaymentDirect();
                // var_dump($directP); exit;
                //aca quedara el condicional para usar la libreria del seetalert
                if($directP == true){
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Done!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "paymentsDirectController/viewPaymentsDirect");
                    exit();
                }else {
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "paymentsDirectController/registersPaymentDirect");
                    exit();
                }
            }
            //variables para llamar los metodos necesarios
            $clients = $this -> modelPD -> viewClient();
            $paymentMethod = $this -> modelPD -> viewPaymentMethod();
            $paymentDetails = $this -> modelPD -> viewPaymentDetails();
            $lodging = $this -> modelPD -> viewLodging();
            $checkin = $this -> modelPD -> viewCheckin();
            require APP . 'view/_templates/header.php';
            require APP . 'view/Payments/registerPaymentsDirect.php';
            require APP . 'view/_templates/footer.php';
        }

        //metodo para filtrar los pagos directos
        public function paymentDirectId(){
            //variable para controlara la llegada del dato
            $paymentD = $this -> modelPD -> paymentDirectId($_POST['id']);
            echo json_encode($paymentD);//trasformar los datos del la base de datos en archivo json
        }

        //metodo para cambiar el estado
        public function changeStatusDP(){
            //variable para controlara la llegada del dato
            $status = $this -> modelPD -> changeStatusDP($_POST['id']);
            echo 1;
        }


    } 
?>