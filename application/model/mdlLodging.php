<?php
    //crear nuestro primer objeto o clase
    class mdlLodging{
        //atributos
        public $idLodging;
        public $num_lodging;
        public $statusL;
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
    
        //metodo para ver datos de las cabañas
        public function viewLodging(){
            //crear la consulta
            $sql = "SELECT * FROM lodging";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $lodging = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $lodging; 
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
        
        //metodo para registrar cabañas
        public function registersLodging(){

            $sql = "INSERT INTO lodging (Num_Lodging, StatusL ) 
            VALUES (?,?)";

            $status = 1;
            $stm = $this -> db -> prepare($sql);
            $stm -> bindParam(1, $this -> num_lodging);
            $stm -> bindParam(2, $status);
           
            $result = $stm -> execute();
            return $result;
            
        }

        //metodo para cambiar estado de las cabañas
        public function changeStatusL($id){
            //consulata
            $sql =  "UPDATE lodging 
            SET statusL = (
                CASE 
                    WHEN statusL = 0 THEN 1
                    WHEN statusL = 1 THEN 2
                    WHEN statusL = 2 THEN 3
                    WHEN statusL = 3 THEN 0

                    ELSE 0
                END
            ) 
            WHERE idLodging = ?";
            //preparar la comnsulta
            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            return $query -> execute();
        }

        //filtrar cabañas por id
        public function lodgingId($id){
            //conuslta
            $sql = "SELECT * FROM lodging WHERE idLodging = ?";

            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            $query -> execute();
            return $query -> fetch(PDO::FETCH_ASSOC);
        }


    }
?>



