<?php
class formularios{
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    //Leer el formulario de un cliente
    public function getFormulario($id_cliente){
        $sql = "SELECT * FROM formularios WHERE id_cliente = $id_cliente";
        $response = $this->db->query($sql);

        if($response){
            if($response->num_rows > 0){
                return $response->fetch_object();
            }
            else{
                return false;
            }
        }
        else{
            return $response;
        }
    }

    public function insertMeta($id_cliente, $objetivo){
        $sql = "INSERT INTO formularios VALUES(NULL, $id_cliente, 0.0, 0.0, '$objetivo', '', '', '');";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdateMeta($id_cliente, $objetivo){
        $sql = "UPDATE formularios SET meta = '$objetivo' WHERE id_cliente = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function insertApetito($id_cliente, $apetito){
        $sql = "INSERT INTO formularios VALUES(NULL, $id_cliente, 0.0, 0.0, '', '', '', '$apetito');";
        $response = $this->db->query($sql);
        return $response;
    }

    public function updateApetito($id_cliente, $apetito){
        $sql = "UPDATE formularios SET apetito = '$apetito' WHERE id_cliente = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function insertActividadFisica($id_cliente, $actividad){
        $sql = "INSERT INTO formularios VALUES(NULL, $id_cliente, '', '', '', '$actividad', '', '');";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdateActividadFisica($id_cliente, $actividad){
        $sql = "UPDATE formularios SET actividad_fisica = '$actividad' WHERE id_cliente = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function insertExcluidos($id_cliente, $alimento){
        $sql = "INSERT INTO excluido VALUES(NULL, $id_cliente ,'$alimento');";
        $response = $this->db->query($sql);
        if($response){
            if($this->db->affected_rows > 0){
                return $this->db->affected_rows;
            }
            else{
                return false;
            }
        }
        else{
            return $response;
        }
    }

    public function getExcluidos($id_cliente){
        $sql = "SELECT * FROM excluido WHERE id_cliente = $id_cliente";
        $response = $this->db->query($sql);

        if($response){
            if($response->num_rows > 0){
                return $response->num_rows;
            }
            else{
                return false;
            }
        }
        else{
            return $response;
        }
    }

    public function deleteExcluidos($id_cliente){
        $sql = "DELETE FROM excluido WHERE id_cliente = $id_cliente";
        return $response = $this->db->query($sql);
    }

    public function InsertFechaEstatura($id_cliente, $estatura, $peso){
        $sql = "INSERT INTO formularios VALUES(NULL, $id_cliente ,'$estatura', '$peso', '', '', '', '');";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdateFechaEstatura($id_cliente, $estatura, $peso){
        $sql = "UPDATE formularios SET altura = '$estatura', peso = '$peso' WHERE id_cliente = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function edadSexo($id_cliente, $edad, $sexo){
        $sql = "UPDATE clientes SET edad = $edad, sexo = '$sexo' WHERE id = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function InsertAlchohol($id_cliente, $alcohol){
        $sql = "INSERT INTO formularios VALUES(NULL, $id_cliente ,'', '', '', '', '$alcohol', '');";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdateAlcohol($id_cliente, $alcohol){
        $sql = "UPDATE formularios SET alcohol = '$alcohol' WHERE id_cliente = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function InsertPesoInicial($id_cliente, $type, $peso){
        $sql = "INSERT INTO pesos VALUES(NULL, $id_cliente ,'$peso', '$type', CURDATE());";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdatePesoInicial($id_cliente, $peso){
        $sql = "UPDATE pesos SET peso = '$peso' WHERE id_cliente = $id_cliente AND tipo = 'inicial'";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdatePeso($id_cliente, $peso){
        $sql = "UPDATE formularios SET peso = '$peso' WHERE id_cliente = $id_cliente";
        $response = $this->db->query($sql);
        return $response;
    }

    public function InsertPesoMeta($id_cliente, $peso){
        $sql = "INSERT INTO pesos VALUES(NULL, $id_cliente ,'$peso', 'meta', CURDATE());";
        $response = $this->db->query($sql);
        return $response;
    }

    public function UpdatePesoMeta($id_cliente, $peso){
        $sql = "UPDATE pesos SET peso = '$peso' WHERE id_cliente = $id_cliente AND tipo = 'meta'";
        $response = $this->db->query($sql);
        return $response;
    }

    //Confirma si ya hay peso meta
    public function getPesoMeta($id_cliente){
        $sql = "SELECT * FROM pesos WHERE id_cliente = $id_cliente AND tipo = 'meta'";
        $response = $this->db->query($sql);

        if($response){
            if($response->num_rows > 0){
                return $response->num_rows;
            }
            else{
                return false;
            }
        }
        else{
            return $response;
        }
    }

    //Obtiene el peso meta
    public function getPesoIdeal($id_cliente){
        $sql = "SELECT * FROM pesos WHERE id_cliente = $id_cliente AND tipo = 'meta'";
        return $response = $this->db->query($sql);
    }

    public function getForm_Result($idCliente){
        $sql = "SELECT * FROM form_result WHERE cliente_id = $idCliente";
        return $response = $this->db->query($sql);
    }

    public function insertForm_Result($idCliente, $kcal){
        $sql = "INSERT INTO form_result VALUES(NULL, $idCliente ,$kcal, 0);";
        $response = $this->db->query($sql);
        return $response;
    }

    public function uodateForm_ResultKcal($idCliente, $kcal){
        $sql = "UPDATE form_result SET kcal = $kcal WHERE cliente_id = $idCliente";
        $response = $this->db->query($sql);
        return $response;
    }
}
?>