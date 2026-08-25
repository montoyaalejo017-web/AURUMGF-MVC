<?php
    //crear una clase y  heredar del controlador principal 
    class paymentsBookingController extends Controller{
        //cerar atributsos 
        private $modelPB;

        //CERAR EL CONSTRUCTOR
        public function __construct(){
            //intanciamiento del modelo
            $this -> modelPB = $this -> loadModel("mdlPaymentsBooking");
        }

        //metodo el admin
        public function main(){
            require APP . 'view/_templates/header.php';
            require APP . 'view/Users/main.php';
            require APP . 'view/_templates/footer.php';
        }

        //metodo para ver los pagos por reservas
        public function viewPaymentsBooking(){
            
            //variables para llamar los metodos necesarios
            $paymentsBooking = $this -> modelPB -> viewPaymentsBooking();
            $booking = $this -> modelPB -> viewBooking();
            $clients = $this -> modelPB -> viewClient();
            $paymentMethod = $this -> modelPB -> viewPaymentMethod();
            $paymentDetails = $this -> modelPB -> viewPaymentDetails();
            require APP . 'view/_templates/header.php';
            require APP . 'view/Payments/viewPaymentsBooking.php';
            require APP . 'view/_templates/footer.php';
        }
        
        //metodo para  registar pagos por reservas
        public function registersPaymentBooking(){

            if(isset($_POST['btnSend'])){
                //primero va los atributos del modelo luego los names del formulario
                $this -> modelPB -> __SET('idBooking', $_POST['idBooking']);
                $this -> modelPB -> __SET('idPaymentDetail', $_POST['idPaymentDetailDescription']);
                $this -> modelPB -> __SET('paymentDate', $_POST['paymentDate']);
                $this -> modelPB -> __SET('idPaymentDetail', $_POST['idPaymentDetailRate']);
                $this -> modelPB -> __SET('totalAmount', $_POST['totalAmount']);
                $this -> modelPB -> __SET('amountPaid', $_POST['amountPaid']);
                $this -> modelPB -> __SET('remainingAmount', $_POST['remainingAmount']);
                $this -> modelPB -> __SET('idPaymentMethod', $_POST['idPaymentMethod']);
                $this -> modelPB -> __SET('idClient', $_POST['idClient']);
                // 
                $paymetB = $this -> modelPB -> registersPaymentBooking();
                // var_dump($paymetB); exit;
                //aca quedara el condicional para usar la libreria del seetalert
                if($paymetB == true){
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Done!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "paymentsBookingController/viewPaymentsBooking");
                    exit();
                }else {
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "paymentsBookingController/registersPaymentBooking");
                    exit();
                }
            }
            //variables para llamar los metodos necesarios
            $paymentsBooking = $this -> modelPB -> viewPaymentsBooking();
            $booking = $this -> modelPB -> viewBooking();
            $clients = $this -> modelPB -> viewClient();
            $paymentMethod = $this -> modelPB -> viewPaymentMethod();
            $paymentDetails = $this -> modelPB -> viewPaymentDetails();
            require APP . 'view/_templates/header.php';
            require APP . 'view/Payments/registerPaymentsBooking.php';
            require APP . 'view/_templates/footer.php';
        }

        //metodo para filtrar los pagos por reservas
        public function paymentBookingId(){
            //variable para controlara la llegada del dato
            $paymentB = $this -> modelPB -> paymentBookingId($_POST['id']);
            echo json_encode($paymentB);//trasformar los datos del la base de datos en archivo json
        }

        //metodo para cambiar el estado
        public function changeStatusPB(){
            //variable para controlara la llegada del dato
            $status = $this -> modelPB -> changeStatusPB($_POST['id']);
            echo 1;
        }


    } 
?>