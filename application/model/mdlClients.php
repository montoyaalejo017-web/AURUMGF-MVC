<?php
    //crear nuestro primer objeto o clase
    class mdlClients{
        //atributos
        public $idClient;
        public $document;
        public $names;
        public $lastnames;
        public $email;
        public $phone;
        public $adults;
        public $minors;
        public $idTypeDocument;
        public $statusC;
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

        //metodo para ver los huespedes
        public function viewClients(){
            //crear la consulta
            $sql = "SELECT * FROM clients AS C INNER JOIN typedocument AS TD ON C.idTypeDocument = TD.idTypeDocument";
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

        //metodo para registrar Clientes
        public function registerClient(){

            $sql = "INSERT INTO clients(Document, Names, Lastnames, Email, Phone, Adults, Minors, idTypeDocument, StatusC) VALUES (?,?,?,?,?,?,?,?,?)";

            $status = 1;
            $stm = $this -> db -> prepare($sql);
            $stm -> bindParam(1, $this -> document);
            $stm -> bindParam(2, $this -> names);
            $stm -> bindParam(3, $this -> lastnames);
            $stm -> bindParam(4, $this -> email);
            $stm -> bindParam(5, $this -> phone);
            $stm -> bindParam(6, $this -> adults);
            $stm -> bindParam(7, $this -> minors);
            $stm -> bindParam(8, $this -> idTypeDocument);
            $stm -> bindParam(9, $status);
           
            $result = $stm -> execute();
            return $result;
            
        }

        // //metodo para cambiar estado de los clientes
        public function changeStatusC($id){
            //consulata
            $sql = "UPDATE clients SET StatusC = (CASE WHEN StatusC = 1 THEN 0 ELSE 1 END) WHERE idClient = ?";
            //preparar la comnsulta
            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            return $query -> execute();
        }

        // //filtrar clientes por id
        public function clientsId($id){
            //conuslta
            $sql = "SELECT * FROM clients AS C INNER JOIN typedocument AS TD ON C.idTypeDocument = TD.idTypeDocument
            WHERE C.idClient = ?";

            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            $query -> execute();
            return $query -> fetch(PDO::FETCH_ASSOC);
        }

        //metodo para editar clientes
        public function updateClient(){
            $sql = "UPDATE clients SET Names = ?, Lastnames = ?, Email = ?, Phone = ?, Adults = ?, Minors = ? WHERE idClient = ?";
            
            $stm = $this -> db -> prepare($sql);
            $stm -> bindParam(1, $this -> names);
            $stm -> bindParam(2, $this -> lastnames);
            $stm -> bindParam(3, $this -> email);
            $stm -> bindParam(4, $this -> phone);
            $stm -> bindParam(5, $this -> adults);
            $stm -> bindParam(6, $this -> minors);
            $stm -> bindParam(7, $this -> idClient);
            
            $result = $stm -> execute();
            return $result;

        }

    }
?>