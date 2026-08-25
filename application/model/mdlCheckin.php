<?php
    //crear nuestro primer objeto o clase
    class mdlCheckin{
        //atributos
        public $idCheckin;
        public $idClient;
        public $idLodging;
        public $checkIn;
        public $checkOut;
        public $checkInTime;
        public $checkOutTime;
        public $idPaymentDetail;
        public $statusCI;
        public $num_lodging;
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
    
        //metodo para ver losdato del checkin
        public function viewCheckIn(){
            //crear la consulta
            $sql = "SELECT * FROM checkin AS CI 
            INNER JOIN clients AS C ON C.idClient = CI.idClient
            INNER JOIN payment_details AS PD ON PD.idPaymentDetail = CI.idPaymentDetail
            INNER JOIN lodging AS L ON L.idLodging = CI.idLodging";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $checkIn = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $checkIn; 
        }

        //metodo para ver datos de las cabañas
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

        //metodo para ver los detalles de pago
        public function viewPaymentDetails(){
            //crear la consulta
            $sql = "SELECT * FROM payment_details";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $paymentDetails = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $paymentDetails;
        }
        
        //metodo para registrar checkin
        public function registersCheckin(){

            $sql = "INSERT INTO checkin (idClient, idLodging, CheckIn, CheckInTime, CheckOut,
            CheckOutTime, idPaymentDetail, StatusCI) 
            VALUES (?,?,?,?,?,?,?,?)";

            $status = 1;
            $stm = $this -> db -> prepare($sql);
            $stm -> bindParam(1, $this -> idClient);
            $stm -> bindParam(2, $this -> idLodging);
            $stm -> bindParam(3, $this -> checkIn);
            $stm -> bindParam(4, $this -> checkInTime);
            $stm -> bindParam(5, $this -> checkOut);
            $stm -> bindParam(6, $this -> checkOutTime);
            $stm -> bindParam(7, $this -> idPaymentDetail);
            $stm -> bindParam(8, $status);
           
            $result = $stm -> execute();
            return $result;
            
        }

        //metodo para cambiar estado del check in 
        public function changeStatusCI($id){
            //consulata
            $sql =  "UPDATE checkin 
            SET StatusCI = (
                CASE 
                    WHEN StatusCI = 0 THEN 1
                    WHEN StatusCI = 1 THEN 0
                    ELSE 0
                END
            ) 
            WHERE idCheckIn = ?";
            //preparar la comnsulta
            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            return $query -> execute();
        }

        //filtrar check in por id
        public function checkInId($id){
            //conuslta
            $sql = "SELECT * FROM checkin AS CI 
            INNER JOIN clients AS C ON C.idClient = CI.idClient
            INNER JOIN payment_details AS PD ON PD.idPaymentDetail = CI.idPaymentDetail
            INNER JOIN lodging AS L ON L.idLodging = CI.idLodging 
            WHERE idCheckIn = ?";

            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            $query -> execute();
            return $query -> fetch(PDO::FETCH_ASSOC);
        }

    }
?>



