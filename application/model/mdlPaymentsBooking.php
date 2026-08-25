<?php
    //crear nuestro primer objeto o clase
    class mdlPaymentsBooking{
        //atributos
        public $idPaymentB;
        public $idBooking;
        public $idPaymentDetails;
        public $paymentDate;
        public $totalAmount;
        public $amountPaid;
        public $remainingAmount;
        public $idPaymentMethod	;
        public $idTypePaymentMethod;
        public $numTransaction;
        public $idClient;
        public $statusB;
        public $num_bookings;

        public $db;
 
        //setter y getters __METODOS MAGICOS
        public function __SET($attr, $value){
            //$value grada el dato y se los pasa a $attr quien se encarga de repartirlos a los atribustos
            $this -> $attr = $value;
        }
        public function __GET($attr){
            return $this -> $attr;
        }

        //primera coneccion de la base de datos

        public function __construct($db){
            //vamos a intentar si no hay coneccion madamos un error
            try {
                $this -> db = $db;
            } catch (PDOException $e) {
                //exit para salir p detener la ejecucion 
                exit("Error to connect");
            }
        }

        //metodo para ver los pagos por reservas
        public function viewPaymentsBooking(){
            //crear la consulta
            $sql = "SELECT * FROM payments_bookings AS PY INNER JOIN booking AS B ON PY.idBooking = B.idBooking INNER JOIN payment_details AS PD ON PY.idPaymentDetail = PD.idPaymentDetail INNER JOIN clients AS CL ON PY.idClient = CL.idClient INNER JOIN paymentmethod AS PM ON PY.idPaymentMethod = PM.idPaymentMethod";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $paymentsBooking = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $paymentsBooking;
        }
 
        //metodo para ver las reservas
        public function viewBooking(){
            //crear la consulta 
            $sql = "SELECT * FROM booking";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $booking = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $booking;
        }

        //metodo para ver los huéspedes
        public function viewClient(){
            //crear la consulta
            $sql = "SELECT * FROM clients";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $clients = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $clients;
        }

        //metodo para ver los tipos de pagos
        public function viewPaymentMethod(){
            //crear la consulta
            $sql = "SELECT * FROM paymentMethod";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $paymentMethod = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $paymentMethod;
        }

        //metodo para ver los detalles de pago
        public function viewPaymentDetails(){
            //crear la consulta
            $sql = "SELECT * FROM payment_details";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $paymentDetails = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $paymentDetails;
        }

        //metodo para registrar pagos por reservas
        public function registersPaymentBooking(){

            $sql = "INSERT INTO payments_bookings(idBooking, idPaymentDetail, PaymentDate, TotalAmount, AmountPaid, RemainingAmount, idPaymentMethod, Num_Transaction, idClient, StatusPB ) VALUES (?,?,?,?,?,?,?,?,?,?)";

            $N°Transition = 'COP' . rand(100000, 999999);
            $status = 1;
            $stm = $this -> db -> prepare($sql);
            $stm -> bindParam(1, $this -> idBooking);
            $stm -> bindParam(2, $this -> idPaymentDetail);
            $stm -> bindParam(3, $this -> paymentDate);
            $stm -> bindParam(4, $this -> totalAmount);
            $stm -> bindParam(5, $this -> amountPaid);
            $stm -> bindParam(6, $this -> remainingAmount);
            $stm -> bindParam(7, $this -> idPaymentMethod);
            $stm -> bindParam(8, $N°Transition);
            $stm -> bindParam(9, $this -> idClient);
            $stm -> bindParam(10, $status);
           
            $result = $stm -> execute();
            return $result;
            
        }

        //metodo para cambiar estado de pagos por reservas
        public function changeStatusPB($id){
            //consulata
            $sql = "UPDATE payments_bookings 
            SET StatusPB = (
                CASE 
                    WHEN StatusPB = 0 THEN 1
                    WHEN StatusPB = 1 THEN 2
                    WHEN StatusPB = 2 THEN 3
                    WHEN StatusPB = 3 THEN 4
                    WHEN StatusPB = 4 THEN 0
                    ELSE 0
                END
            ) 
            WHERE idPaymentB = ?";
            //preparar la comnsulta
            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            return $query -> execute();
        }

        //filtrar pagos de freservas por id
        public function paymentBookingId($id){
            //conuslta
            $sql = "SELECT * FROM payments_bookings AS PB
            INNER JOIN payment_details AS PD ON PD.idPaymentB = PB.idPaymentB
            INNER JOIN booking AS B ON PB.idBooking = B.idBooking
            INNER JOIN paymentmethod AS PM ON PB.idPaymentMethod = PM.idPaymentMethod
            INNER JOIN clients AS C ON PB.idClient = C.idClient 
            WHERE PB.idPaymentB = ?";

            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            $query -> execute();
            return $query -> fetch(PDO::FETCH_ASSOC);
        }
    }
?>