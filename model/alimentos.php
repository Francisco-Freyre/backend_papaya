<?php
class alimentos{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    // Funcion para leer todas las categorias_alimentos, retorna el resultado de la consulta o falso
    public function readAll(){
        $sql = "SELECT * FROM categorias_alimentos";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    // Funcion para leer todos los alimentos segun la categoria
    public function readCategoria($id_categoria){
        $sql = "SELECT * FROM alimentos WHERE categoria_id = $id_categoria";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    public function readAlimento($id){
        $sql = "SELECT * FROM alimentos WHERE id = $id";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    // Funcion para leer una sola categoria de alimentos, retorna el resultado de la consulta o falso
    public function readOne($id){
        $sql = "SELECT * FROM categorias_alimentos WHERE id = $id";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    // Funcion para insertar alimentos
    public function create($nombre, $unidad, $cantidad, $id_categoria){
        $sql = "INSERT INTO alimentos VALUES(NULL, '$id_categoria', '$nombre', '$unidad', '$cantidad');";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    // Funcion para crear ingredientes
    public function crearIngrediente($platillo_id, $alimento_id, $equivalente, $cambiar, $energia, $carbohidratos, $proteina, $lipidos){
        $sql = "INSERT INTO ingredientes2 VALUES(NULL, $platillo_id, $alimento_id, $equivalente, $cambiar, $energia, $carbohidratos, $proteina, $lipidos);";
        $save = $this->db->query($sql);
        return $save;
    }

    // Hasta aqui las funciones de esta tabla

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
}
?>