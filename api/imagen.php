<?php
    require_once '../model/clientes.php';
    require_once '../config/db.php';

    $_clientes = new clientes();

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
            //$_POST = json_decode(file_get_contents('php://input'), true);
            if(isset($_POST['image'])){
                if($_POST['image'] == 'true'){
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png"){
                        if(!is_dir('../uploads/perfil')){
                            mkdir('../uploads/perfil', 0777, true);
                        }

                        move_uploaded_file($file['tmp_name'], '../uploads/perfil/'.$filename);
                        $url_img = 'uploads/perfil/'.$filename;

                        $update = $_clientes->updateImage($_POST['id'], $url_img);

                        if($update){
                            $response = array(
                                'resultado' => true
                            );
                            die(json_encode($response));
                        }
                        else{
                            $response = array(
                                'resultado' => false,
                                'msg' => 'Hay un problema con la base de datos'
                            );
                            die(json_encode($response));
                        }
                    }
                }
                else{
                    $response = array(
                        'resultado' => false,
                        'msg' => 'image no es true'
                    );
                    die(json_encode($response));
                }
            }else{
                $response = array(
                    'resultado' => false,
                    'msg' => 'Falta algun valor'
                );
                die(json_encode($response));
            }
            break;
    }
?>