<?php
require_once 'models/profesor.php';
require_once 'models/asignatura.php';

class profesorAjax
{
    public function evaluacionAlumnos()
    {
        if (isset($_POST['actionAjax'])) {
            if (isset($_POST['evaluacionAlumnos']) && !empty($_POST['evaluacionAlumnos'])) {
                $evaluacionAlumnos = $_POST['evaluacionAlumnos'];
                $arrayEvaluacion = (array) $evaluacionAlumnos;
                
                // Recorremos el arreglo para realizar la evaluación de cada alumno
                foreach ($arrayEvaluacion as $key => $evalAlumno) {
                    // Obtenemos los valores de cada item del arreglo
                    $claveAlumno = $evalAlumno['claveAlumno'];
                    $claveEvaluacion = $evalAlumno['claveEvaluacion'];
                    $claveMateria = $evalAlumno['claveMateria'];
                    $calificacion = $evalAlumno['calificacion'];

                    // Instancia de asignatura
                    $asignatura = new Asignatura();

                    // Le damos cada valor para la evaluación
                    $asignatura->setAlumnoClave($claveAlumno);
                    $asignatura->setEvaluacionClave($claveEvaluacion);
                    $asignatura->setAsignaturaClave($claveMateria);
                    $asignatura->setCalifAlumno($calificacion);
                    
                    // Realizamos la consulta sql
                    $updateCalificacion = $asignatura->updateCalificacionPorAlumno();
                    $updateCalifTercerParcial = $asignatura->updateCalificacionTercerParcial();
                    
                    // Esta si funciono
                    /*
                    $sql = "UPDATE calificacion_parcial SET calificacion ='$calificacion' WHERE alumno_clave='$claveAlumno' AND evaluacion_clave='$claveEvaluacion';";

                    $asignatura = new Asignatura();

                    $save = $asignatura->db->query($sql);

                    $result = false;
                    if ($save) {
                        $result = true;
                    }
                    */
                }

                if ($updateCalificacion && $updateCalifTercerParcial) {
                    $evaluacionJson = json_encode($evaluacionAlumnos, JSON_UNESCAPED_UNICODE);
                    echo $evaluacionJson;
                } else {
                    echo 'Algo fallo';
                }
            }
        } else {
            echo 'Aquí hubo un error';
        }
    }


    public function terminarEvaluacion()
    {
        if (isset($_POST['actionAjax'])) {
            if (isset($_POST['actaAsignatura']) && !empty($_POST['actaAsignatura']) && isset($_POST['actaEvaluacion']) && !empty($_POST['actaEvaluacion'])) {
                $actaAsignatura = $_POST['actaAsignatura'];
                $actaEvaluacion = $_POST['actaEvaluacion'];

                $asignatura = new Asignatura();
                $asignatura->setAsignaturaClave($actaAsignatura);
                $asignatura->setEvaluacionClave($actaEvaluacion);
                $updateEstatusActa = $asignatura->updateEstatusActaEvaluacionComplete();
            }

            if ($updateEstatusActa) {
                echo 'Se realizo con éxito';
            } else {
                echo 'Algo fallo';
            }
        } else {
            echo 'Aquí hubo un error';
        }
    }
}
