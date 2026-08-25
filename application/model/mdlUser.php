<?php
    //crear nuestro primer objeto o clase
    class mdlUser{
        //atributos
        public $idUser;
        public $document;
        public $names;
        public $lastnames;
        public $email;
        public $phone;
        public $address;
        public $gender;
        public $birthdate;
        public $username;
        public $password;
        public $idTypeDocument;
        public $idRol;
        public $statusU;
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

        //metodo para inicciar secion como administrador y validar datos
        public function validateUser(){
            //crear la consulata
            //? ENCIA EL PARAMETRO DEL ID
            $sql = "SELECT * FROM users AS U INNER JOIN typedocument AS TD ON U.idTypeDocument = TD.idTypeDocument INNER JOIN roles AS R ON U.idRol = R.idRol WHERE U.Username = ? AND U.Password = ? AND R.idRol = 1 AND U.StatusU = 1;";

            //PREPARAR SIEMPRE LA CONSULATA 
            // stn =  statement - sentencia
            $stm = $this -> db -> prepare($sql);
            //puente de enlace entre una pasicion y un parametro
            $stm -> bindParam(1, $this -> username);
            $stm -> bindParam(2, $this -> password);
            $stm -> execute();
            //retormanmos los datos
            //extare los datos y los asocia
            $user = $stm -> fetch(PDO::FETCH_ASSOC);
            return $user;
        }

        //metodo para ver datos de ususrios
        public function viewUsers(){
            //crear la consulta
            $sql = "SELECT * FROM users AS U INNER JOIN typedocument AS TD ON U.idTypeDocument = TD.idTypeDocument INNER JOIN roles AS R ON U.idRol = R.idRol";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $user = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $user;
        }

        //metodo para ver roles
        public function viewRoles(){
            //crear la consulta 
            $sql = "SELECT * FROM roles";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $roles = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $roles;
        }

        //metodo para ver los tipos de documentos
        public function viewTypeDocuments(){
            //crear la consulta
            $sql = "SELECT * FROM typedocument ";
            $stm = $this -> db -> prepare($sql);
            $stm -> execute();
            $documents = $stm -> fetchAll(PDO::FETCH_ASSOC);
            return $documents;
        }

        public function registersUsers(){

            $sql = "INSERT INTO users(Document,Names,Lastnames, Email, Phone, Address, Gender,
            Birthdate, Username, Password, idTypeDocument, idRol,StatusU ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

            $status = 1;
            $stm = $this -> db -> prepare($sql);
            $stm -> bindParam(1, $this -> document);
            $stm -> bindParam(2, $this -> names);
            $stm -> bindParam(3, $this -> lastnames);
            $stm -> bindParam(4, $this -> email);
            $stm -> bindParam(5, $this -> phone);
            $stm -> bindParam(6, $this -> address);
            $stm -> bindParam(7, $this -> gender);
            $stm -> bindParam(8, $this -> birthdate);
            $stm -> bindParam(9, $this -> username);
            $stm -> bindParam(10, $this -> password);
            $stm -> bindParam(11, $this -> idTypeDocument);
            $stm -> bindParam(12, $this -> idRol);
            $stm -> bindParam(13, $status);
           
            $result = $stm -> execute();
            return $result;
            
        }

        //metodo para cambiar estado del ususrio
        public function changeStatus($id){
            //consulata
            $sql = "UPDATE users SET statusU = (CASE WHEN statusU = 1 THEN 0 ELSE 1 END) WHERE idUser = ?";
            //preparar la comnsulta
            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            return $query -> execute();
        }

        //filtrar ususrios por id
        public function userId($id){
            //conuslta
            $sql = "SELECT * FROM users AS U INNER JOIN typedocument AS TD ON U.idTypeDocument = TD.idTypeDocument INNER JOIN roles AS R ON U.idRol = R.idRol WHERE idUser = ?";

            $query = $this -> db -> prepare($sql);

            $query -> bindParam(1, $id);
            $query -> execute();
            return $query -> fetch(PDO::FETCH_ASSOC);
        }

        //metodo para editare
        public function updateUser(){
            $sql = "UPDATE users SET Names = ?, Lastnames = ?, Email = ?, Phone = ?, Address = ?, Username = ? WHERE idUser = ?";
            
            $stm = $this -> db -> prepare($sql);
            $stm -> bindParam(1, $this -> names);
            $stm -> bindParam(2, $this -> lastnames);
            $stm -> bindParam(3, $this -> email);
            $stm -> bindParam(4, $this -> phone);
            $stm -> bindParam(5, $this -> address);
            $stm -> bindParam(6, $this -> username);
            $stm -> bindParam(7, $this -> idUser);
           
            $result = $stm -> execute();
            return $result;

        }



    }
?>



