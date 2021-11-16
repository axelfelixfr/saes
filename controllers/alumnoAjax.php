<?php
require_once 'models/alumno.php';

class alumnoAjax
{
    public function updateGeneral()
    {
        if (isset($_POST['tabName'])) {
            if (isset($_POST['sexo']) && !empty($_POST['sexo'])) {
                $cartilla = isset($_POST['cartilla']) ? $_POST['cartilla'] : false;
                $pasaporte = isset($_POST['pasaporte']) ? $_POST['pasaporte'] : false;
                $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : false;
                if ($sexo) {
                    $alumno = new Alumno();
                    $alumno->setSexo($sexo);
                    if ($cartilla) {
                        $alumno->setCartilla($cartilla);
                    }
                    if ($pasaporte) {
                        $alumno->setPasaporte($pasaporte);
                    }
                    $id = $_SESSION['identity']->general->id;
                    $alumno->setId($id);

                    $consultUpdate = $alumno->editGeneral();
                    
                    $nuevoAlumno = $alumno->getAlumno();

                    $_SESSION['identity']->general = $nuevoAlumno;
                    
                    $alumnoJson = json_encode($nuevoAlumno, JSON_UNESCAPED_UNICODE);
                    echo $alumnoJson;
                }
            }
        } else {
            echo 'Aquí hubo un error';
        }
    }

    public function updateNacimiento()
    {
        if (isset($_POST['tabName'])) {
            if (isset($_POST['nacimiento']) && !empty($_POST['nacimiento'])) {
                $nacimiento = isset($_POST['nacimiento']) ? $_POST['nacimiento'] : false;
                if ($nacimiento) {
                    $alumno = new Alumno();
                    $alumno->setNacimiento($nacimiento);
                    
                    $id = $_SESSION['identity']->general->id;
                    $alumno->setId($id);
                    
                    $consultUpdate = $alumno->editNacimiento();
                    $nuevoAlumno = $alumno->getAlumno();

                    $_SESSION['identity']->general = $nuevoAlumno;
                    
                    $alumnoJson = json_encode($nuevoAlumno, JSON_UNESCAPED_UNICODE);
                    echo $alumnoJson;
                }
            }
        } else {
            echo 'Aquí hubo un error';
        }
    }

    public function updateDireccion()
    {
        if (isset($_POST['tabName'])) {
            if (isset($_POST['calle']) && !empty($_POST['calle']) && isset($_POST['numExt']) && !empty($_POST['numExt']) && isset($_POST['numInt']) && isset($_POST['colonia']) && !empty($_POST['colonia']) && isset($_POST['codigoPostal']) && !empty($_POST['codigoPostal']) && isset($_POST['estado']) && !empty($_POST['estado']) && isset($_POST['municipio']) && !empty($_POST['municipio']) && isset($_POST['movil']) && isset($_POST['emailGeneral']) && isset($_POST['telOficina']) && isset($_POST['labora'])) {
                // Obligatorias
                $calle = isset($_POST['calle']) ? $_POST['calle'] : false;
                $num_ext = isset($_POST['numExt']) ? $_POST['numExt'] : false;
                $colonia = isset($_POST['colonia']) ? $_POST['colonia'] : false;
                $codigo_postal = isset($_POST['codigoPostal']) ? $_POST['codigoPostal'] : false;
                $estado = isset($_POST['estado']) ? $_POST['estado'] : false;
                $municipio = isset($_POST['municipio']) ? $_POST['municipio'] : false;
                // Opcionales
                $num_int = isset($_POST['numInt']) ? $_POST['numInt'] : false;
                $movil = isset($_POST['movil']) ? $_POST['movil'] : false;
                $email_general = isset($_POST['emailGeneral']) ? $_POST['emailGeneral'] : false;
                $tel_oficina = isset($_POST['telOficina']) ? $_POST['telOficina'] : false;
                $labora = isset($_POST['labora']) ? $_POST['labora'] : false;


                if ($calle && $num_ext && $colonia && $codigo_postal && $estado && $municipio) {
                    $alumno = new Alumno();
                    $alumno->setCalle($calle);
                    $alumno->setNumExt($num_ext);
                    $alumno->setColonia($colonia);
                    $alumno->setCodigoPostal($codigo_postal);
                    $alumno->setEstado($estado);
                    $alumno->setMunicipio($municipio);

                    if ($num_int) {
                        $alumno->setNumInt($num_int);
                    }
                    if ($movil) {
                        $alumno->setMovil($movil);
                    }
                    if ($email_general) {
                        $alumno->setEmailGeneral($email_general);
                    }
                    if ($tel_oficina) {
                        $alumno->setTelOficina($tel_oficina);
                    }
                    if ($labora) {
                        $alumno->setLabora($labora);
                    }
                    
                    $id = $_SESSION['identity']->general->id;
                    $alumno->setId($id);
                    
                    $consultUpdate = $alumno->editDireccion();

                    // var_dump($consultUpdate);
                    // AQUÍ SE DEBE CAMBIAR POR UN MÉTODO QUE OBTENGA LA DIRECCION, TUTOR Y GENERAL (DIFERENTES TABLAS)
                    $nuevoAlumno = $alumno->getDireccionAlumno();
                    $_SESSION['identity']->direccion = $nuevoAlumno;
                    $alumnoJson = json_encode($nuevoAlumno, JSON_UNESCAPED_UNICODE);
                    echo $alumnoJson;
                }
            }
        } else {
            echo 'Aquí hubo un error';
        }
    }


    public function updateTutor()
    {
        if (isset($_POST['tabName'])) {
            if (isset($_POST['nombreTutor']) && !empty($_POST['nombreTutor'])) {
                $nombreTutor = isset($_POST['nombreTutor']) ? $_POST['nombreTutor'] : false;
                $rfcTutor = isset($_POST['rfcTutor']) ? $_POST['rfcTutor'] : false;
                $padre = isset($_POST['padre']) ? $_POST['padre'] : false;
                $madre = isset($_POST['madre']) ? $_POST['madre'] : false;

                if ($nombreTutor) {
                    $alumno = new Alumno();
                    $alumno->setNombreTutor($nombreTutor);
                    
                    if ($rfcTutor) {
                        $alumno->setRfcTutor($rfcTutor);
                    }
                    
                    if ($padre) {
                        $alumno->setPadre($padre);
                    }
                    
                    if ($madre) {
                        $alumno->setMadre($madre);
                    }
                    
                    $id = $_SESSION['identity']->general->id;

                    $alumno->setId($id);

                    $consultUpdate = $alumno->editTutor();
                    
                    $nuevoAlumno = $alumno->getTutor();

                    $_SESSION['identity']->tutor = $nuevoAlumno;
                    
                    $alumnoJson = json_encode($nuevoAlumno, JSON_UNESCAPED_UNICODE);
                    echo $alumnoJson;
                }
            }
        } else {
            echo 'Aquí hubo un error';
        }
    }
}
