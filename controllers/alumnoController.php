<?php

require_once 'models/alumno.php';

class alumnoController
{
    
    public function main()
    {
        Utils::isAlumno();
        require_once 'views/alumno/sidebarInit.php';
        require_once 'views/alumno/main.php';
        require_once 'views/alumno/sidebarFin.php';
    }


    public function general()
    {
        Utils::isAlumno();
        require_once 'views/alumno/sidebarInit.php';
        $alumno = $_SESSION['identity'];
        require_once 'views/alumno/general.php';
    }

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
                    $id = $_SESSION['identity']->id;
                    $alumno->setId($id);
                    $nuevoAlumno = $alumno->editGeneral();
                    $_SESSION['identity'] = $nuevoAlumno;
                    
                    $alumnoJson = json_encode($nuevoAlumno, JSON_UNESCAPED_UNICODE);
                    echo $alumnoJson;
                }
            }
        } else {
            echo 'Aquí hubo un error';
        }
    }
}
