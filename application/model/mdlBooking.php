<?php
    //crear nuestro primer objeto o clase
    class mdlBooking{
        //atributos
        public $idBooking;
        public $num_booking;
        public $checkIn;
        public $checkInTime;
        public $checkOut; 
        public $checkOutTime; 
        public $names;
        public $idClient;
        public $idLodging;
        public $statusB;
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

        //metodo para ver las reservas
        public function viewBooking(){
            //crear la consulta
            // $sql = "SELECT * FROM booking AS B INNER JOIN clients AS C ON B.idClient = C.idClient INNER JOIN lodging AS L ON B.idLodging = L.idLodging";
            $sql ="SELECT * FROM booking AS B INNER JOIN clients AS C ON B.idClient = C.idClient INNER JOIN lodging AS L ON B.idLodging = L.idLodging";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $booking = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $booking;
        }

        //metodo para ver las cabañas
        public function viewLodging(){
            //crear la consulta 
            $sql = "SELECT * FROM lodging";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $lodging = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $lodging;
        }

        //metodo para ver los huéspedes
        public function viewClients(){
            //crear la consulta
            $sql = "SELECT * FROM clients";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $clients = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $clients;
        }

        //metodo para ver los tipos de documentos
        public function viewTypeDocumet(){
            //crear la consulta
            $sql = "SELECT * FROM typedocument";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $typeDocument = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $typeDocument;
        } 


        //metodo para registrar reservas
        public function registersBooking(){

            $sql = "INSERT INTO booking(Num_Booking, Check_in, CheckInTime, Check_out, CheckOutTime, idClient, idLodging, StatusB ) VALUES (?,?,?,?,?,?,?,?)";

            $N°Booking = 'RES' . rand(100000, 999999);
            $inTime = '03:00pm';
            $outTime = '12:00pm';
            $status = 1;
            $stm = $this -> db -> prepare($sql);
            $stm -> bindParam(1, $N°Booking);
            $stm -> bindParam(2, $this -> checkIn);
            $stm -> bindParam(3, $inTime);
            $stm -> bindParam(4, $this -> checkOut);
            $stm -> bindParam(5, $outTime);
            $stm -> bindParam(6, $this -> idClient);
            $stm -> bindParam(7, $this -> idLodging);
            $stm -> bindParam(8, $status);
           
            $result = $stm -> execute();
            return $result;
            
        }

        //metodo para cambiar estado de la reserva
        public function changeStatusB($id){
            //consulata
            $sql = "UPDATE booking 
            SET StatusB = (
                CASE 
                    WHEN StatusB = 0 THEN 1
                    WHEN StatusB = 1 THEN 0
                    ELSE 0
                END
            ) 
            WHERE idBooking = ?";
            //preparar la comnsulta
            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            return $query -> execute();
        }

        //filtrar reservas por id
        public function bookingId($id){
            //conuslta
            $sql = "SELECT * FROM booking AS B INNER JOIN clients AS C ON B.idClient = C.idClient INNER JOIN lodging AS L ON B.idLodging = L.idLodging 
            WHERE B.idBooking = ?";

            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            $query -> execute();
            return $query -> fetch(PDO::FETCH_ASSOC);
        }

        //metodo para editare
        public function updateBooking(){
            $sql = "UPDATE booking SET Check_in = ?, Check_out = ?, idLodging = ? WHERE idBooking = ?";
            
            $stm = $this -> db -> prepare($sql);
            $stm -> bindParam(1, $this -> checkIn);
            $stm -> bindParam(2, $this -> checkOut);
            $stm -> bindParam(3, $this -> idLodging);
            $stm -> bindParam(4, $this -> idBooking);
            
            $result = $stm -> execute();
            return $result;

        }

    }
?>  