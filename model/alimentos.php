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
        $sql = "SELECT * FROM alimentos WHERE categoria_id = $id_categoria ORDER BY nombre";
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

    public function readIngrediente($id){
        $sql = "SELECT * FROM ingredientes2 WHERE id = $id";
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
        if($save){
            return $this->db->insert_id;
        }else{
            return $save;
        }
    }

    // Hasta aqui las funciones de esta tabla

    public function update($id, $nombre, $cantidad, $unidad){              
        return $result = $this->db->query("UPDATE alimentos SET nombre = '$nombre', unidad = '$unidad', cantidad = $cantidad WHERE id = $id");
    }

    // Funcion para eliminar un ingrediente, retorna el resultado de la consulta o falso
    public function delete($id){
        $sql = "DELETE FROM ingredientes2 WHERE id = $id";
        $response = $this->db->query($sql);
        return $response;
    }

    public function deletealimento($id){
        $sql = "DELETE FROM alimentos WHERE id = $id";
        $response = $this->db->query($sql);
        return $response;
    }
}
?>