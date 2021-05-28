<?php
class clientes{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Funcion que crea cliente nuevo, retorna el resultado de la consulta o falso
    public function create($nombre, $apellidos, $edad, $sexo, $email, $password){
        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
        $sql = "INSERT INTO clientes VALUES(NULL, '$nombre', '$apellidos', '$edad', '$sexo', '$email', '$password_hashed', '');";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    // Funcion para leer todos los clientes, retorna el resultado de la consulta o falso
    public function readAll(){
        $sql = "SELECT * FROM clientes";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    // Funcion para leer solo un cliente, retorna el resultado de la consulta o falso
    public function readOne($id){
        $sql = "SELECT * FROM clientes WHERE id = $id";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    public function update($id, $nombre, $apellidos, $edad, $sexo, $email, $password){
        if($password != ''){
            $opciones = array(
                'cost' => 12
            );
            $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
                      
            return $result = $this->db->query("UPDATE clientes SET nombre = '$nombre', apellido = '$apellidos', edad = $edad, sexo = '$sexo', email = '$email', password = '$password_hashed' WHERE id = $id");
        }
        else{
            return $result = $this->db->query("UPDATE clientes SET nombre = '$nombre', apellido = '$apellidos', edad = $edad, sexo = '$sexo', email = '$email' WHERE id = $id");
        }
    }

    // Funcion para eliminar un cliente, retorna el resultado de la consulta o falso
    public function delete($id){
        $sql = "DELETE FROM clientes WHERE id = $id";
        $response = $this->db->query($sql);
        return $response;
    }

    //Sexo de los clientes, se integra en este modelo para no hacer un nuevo modelo.
    // Funcion para leer todos los tipos de sexo.
    public function readSexo(){
        $sql = "SELECT * FROM sexo";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    //Funcion para obtener un cliente segun su correo o usuario(basicamente es lo mismo)
    public function login($correo){
        $sql = "SELECT * FROM clientes WHERE email = '$correo'";
        $response = $this->db->query($sql);
        if($response && $response->num_rows == 1){
            return $response->fetch_object();
        }else{
            return $response;
        }
    }
}
?>