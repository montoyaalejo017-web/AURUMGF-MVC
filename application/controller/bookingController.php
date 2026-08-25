<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

//crear una clase y heredar del controlador principal
class bookingController extends Controller {
    //cerar atributos
    private $modelB;
    private $modelC; // Assuming you have a client/guest model, if not, adjust or remove

    //CREAR EL CONSTRUCTOR
    public function __construct() {
        //instanciamiento del modelo
        $this->modelB = $this->loadModel("mdlBooking");
        // If you have a separate model for clients/guests, load it here
        $this->modelC = $this->loadModel("mdlClients");
    }

    //metodo el admin
    public function main() {
        require APP . 'view/_templates/header.php';
        require APP . 'view/Users/main.php'; // This might be incorrect, should it be Booking/main.php?
        require APP . 'view/_templates/footer.php';
    }

    //metodo para ver las reservas
    public function viewBooking() {
        //metodo para atuactilizar
        if (isset($_POST['btnUpdate'])) {
            //primero va los atributos del modelo luego los names del formulario
            $this->modelB->__SET('checkIn', $_POST['txtCheckin']); 
            $this->modelB->__SET('checkOut', $_POST['txtCheckout']);
            $this->modelB->__SET('idLodging', $_POST['txtLodging']);
            $this->modelB->__SET('idBooking', $_POST['txtIdBooking']);

            $update = $this->modelB->updateBooking();
            // var_dump($update); exit;
            //aca quedara el condicional para usar la libreria del seetalert
            if ($update == true) {
                $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '¡Hecho!',
                    showConfirmButton:false,
                    timer:1500})";
                header("Location:" . URL . "bookingController/viewBooking");
                exit();
            } else {
                $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: '¡Error!',
                    showConfirmButton:false,
                    timer:1500})";
                header("Location:" . URL . "bookingController/viewBooking"); // Redirect back to viewBooking
                exit();
            }
        }
        //variables para llamar los metodos necesarios
        $booking = $this->modelB->viewBooking();
        $lodging = $this->modelB->viewLodging();
        $clients = $this->modelB->viewClients(); // This might be idClient, adjust if needed
        require APP . 'view/_templates/header.php';
        require APP . 'view/Booking/viewBooking.php';
        require APP . 'view/_templates/footer.php';
    }

    //metodo para registrar reservas
    public function registerBooking() {
        if (isset($_POST['btnSendB'])) {
            // Ensure you're using modelB (Booking Model) and correct attribute names
            $this->modelB->__SET('checkIn', $_POST['txtCheckin']);
            $this->modelB->__SET('checkOut', $_POST['txtCheckout']);
            $this->modelB->__SET('idClient', $_POST['sellClient']); // Assuming a select for guests/clients
            $this->modelB->__SET('idLodging', $_POST['sellLodging']);

            $result = $this->modelB->registersBooking(); // Call the corrected method
            // var_dump($result);exit;
            //aca quedara el condicional para usar la libreria del seetalert
            if ($result == true) {
                $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '¡Reserva registrada!',
                    showConfirmButton:false,
                    timer:1500})";
                header("Location:" . URL . "bookingController/viewBooking"); // Redirect to booking view
                exit();
            } else {
                $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: '¡Error al registrar reserva!',
                    showConfirmButton:false,
                    timer:1500})";
                header("Location:" . URL . "bookingController/registerBooking");
                exit();
            }
        }
        //METODO PARA REGISTRAR CLIENTES
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
                // var_dump($client); exit;
                //aca quedara el condicional para usar la libreria del seetalert
                if($client == true){
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Done!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "bookingController/registerBooking");
                    exit();
                }else {
                    $_SESSION['alert'] = "Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: 'Error!',
                    showConfirmButton:false,
                    timer:1500})";
                    header("Location:" . URL . "bookingController/registerBooking");
                    exit();
                }
            }
        //variables para llamar los metodos necesarios
        $lodging = $this->modelB->viewLodging();
        $clients = $this->modelB->viewClients(); // Get clients for the form
        $documents = $this -> modelB -> viewTypeDocumet();
        require APP . 'view/_templates/header.php';
        require APP . 'view/Booking/registerBooking.php'; // Assuming a register booking view
        require APP . 'view/_templates/footer.php';
    }

    //metodo para filtrar la reserva
    public function bookingId() {
        //variable para controlara la llegada del dato
        $booking = $this->modelB->bookingId($_POST['id']);
        echo json_encode($booking); //trasformar los datos del la base de datos en archivo json
    

        
    }

    //metodo para cambiar el estado
    public function changeStatusB() {
        //variable para controlara la llegada del dato
        $status = $this->modelB->changeStatusB($_POST['id']);
        echo 1;
        
    }
}
?>