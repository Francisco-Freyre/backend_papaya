<?php 
class ejercicios{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function create($nombre, $descripcion, $url_img){
        $sql = "INSERT INTO ejercicios VALUES(NULL, '$nombre', '$descripcion', '$url_img');";
        $save = $this->db->query($sql);
        if($save){
            return $this->db->insert_id;
        }else{
            return $save;
        }
    }

    public function read(){
        $sql = "SELECT * FROM ejercicios";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    public function readOne($id){
        $sql = "SELECT * FROM ejercicios WHERE id = $id";
        $response = $this->db->query($sql);

        if($response){
            return $response;
        }
        else{
            return $response;
        }
    }

    public function update($id, $nombre, $descripcion, $img){
        if($img != ""){
            $sql = "UPDATE ejercicios SET nombre = '$nombre', descripcion = '$descripcion', url_img = '$img' WHERE id = $id";
        }
        else{
            $sql = "UPDATE ejercicios SET nombre = '$nombre', descripcion = '$descripcion' WHERE id = $id";
        }

        $response = $this->db->query($sql);
        return $response; 
    }

    public function delete($id){
        $sql = "DELETE FROM ejercicios WHERE id = $id";
        $response = $this->db->query($sql);
        return $response;
    }
}
?>