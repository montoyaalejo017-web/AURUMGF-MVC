<?php
    //crear nuestro primer objeto o clase
    class mdlPaymentsDirect{
        //atributos
        public $idDirectP;
        public $idCheckIn;
        public $idClient;
        public $idLodging;
        public $idPaymentDetails;
        public $paymentDate;
        public $totalAmount;
        public $amountPaid;
        public $remainingAmount;
        public $idPaymentMethod;
        public $num_Transaction;
        public $StatusDP;
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

        //metodo para ver los pagos directos
        public function viewPaymentsDirect(){
            //crear la consulta
            $sql = "SELECT * FROM direct_payments AS DP
            INNER JOIN checkin AS CI ON CI.idCheckIn = DP.idCheckIn
            INNER JOIN clients AS C ON C.idClient = DP.idClient
            INNER JOIN lodging AS L ON L.idLodging = DP.idLodging
            INNER JOIN paymentmethod AS PM ON PM.idPaymentMethod = DP.idPaymentMethod
            INNER JOIN payment_details AS PD ON PD.idPaymentDetail = DP.idPaymentDetail";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $paymentsDirect = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $paymentsDirect;
        }

        //metodo para ver los checkin
        public function viewCheckin(){
            //crear la consulta
            $sql = "SELECT * FROM checkin";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $checkin = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $checkin;
        }

        //metodo para ver las habitaciones
        public function viewLodging(){
            //crear la consulta
            $sql = "SELECT * FROM lodging";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $lodging = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $lodging;
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

        //metodo para registrar pagos directos
        public function registersPaymentDirect(){

            $sql = "INSERT INTO direct_payments(idCheckIn, idClient, idLodging, PaymentDate,TotalAmount, AmountPaid, RemainingAmount, idPaymentDetail,idPaymentMethod, Num_Transaction, StatusDP ) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

            $N°Transition = 'COP' . rand(100000, 999999);
            $status = 1;
            $stm = $this -> db -> prepare($sql);
            $stm -> bindParam(1, $this -> idCheckIn);
            $stm -> bindParam(2, $this -> idClient);
            $stm -> bindParam(3, $this -> idLodging);
            $stm -> bindParam(4, $this -> paymentDate);
            $stm -> bindParam(5, $this -> totalAmount);
            $stm -> bindParam(6, $this -> amountPaid);
            $stm -> bindParam(7, $this -> remainingAmount);
            $stm -> bindParam(8, $this -> idPaymentDetail);
            $stm -> bindParam(9, $this -> idPaymentMethod);
            $stm -> bindParam(10, $N°Transition);
            $stm -> bindParam(11, $status);
           
            $result = $stm -> execute();
            return $result;
            
        }

        //metodo para cambiar estado de pagos directos
        public function changeStatusDP($id){
            //consulata
            $sql = "UPDATE direct_payments 
            SET StatusDP = (
                CASE 
                    WHEN StatusDP = 0 THEN 1
                    WHEN StatusDP = 1 THEN 2
                    WHEN StatusDP = 2 THEN 3
                    WHEN StatusDP = 3 THEN 4
                    WHEN StatusDP = 4 THEN 0
                    ELSE 0
                END
            ) 
            WHERE idDirectP = ?";
            //preparar la comnsulta
            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            return $query -> execute();
        }

        //filtrar pagos directos por id
        public function paymentDirectId($id){
            //conuslta
            $sql = "SELECT * FROM direct_payments AS DP
            INNER JOIN checkin AS CI ON CI.idCheckIn = DP.idCheckIn
            INNER JOIN clients AS C ON C.idClient = DP.idClient
            INNER JOIN lodging AS L ON L.idLodging = DP.idLodging
            INNER JOIN paymentmethod AS PM ON PM.idPaymentMethod = DP.idPaymentMethod
            INNER JOIN payment_details AS PD ON PD.idPaymentDetail = DP.idPaymentDetail 
            WHERE DP.idDirectP = ?";

            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            $query -> execute();
            return $query -> fetch(PDO::FETCH_ASSOC);
        }

    }
?>