<?php

class Utils
{
    public static function show_error()
    {
        $error = new errorController();
        $error->index();
    }

    public static function deleteSession($name)
    {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }

        return $name;
    }

    public static function isIdentity()
    {
        if (!isset($_SESSION['identity'])) {
            header("Location:".base_url);
        } else {
            return true;
        }
    }

    public static function isProfesor()
    {
        if (!isset($_SESSION['profesor'])) {
            header("Location:".base_url);
        } else {
            return true;
        }
    }
    
    public static function isAlumno()
    {
        if (!isset($_SESSION['alumno'])) {
            header("Location:".base_url);
        } else {
            return true;
        }
    }

    public static function saludar()
    {
        
        date_default_timezone_set('America/Mexico_City');
        
        $temprano = 11;
        $tarde = 19;

        $hora_actual = intval(date("H"));
        if ($hora_actual <= $temprano) {
            echo "Buenos días";
        } elseif ($hora_actual > $temprano && $hora_actual <= $tarde) {
            echo "Buenas tardes";
        } else {
            echo "Buenas noches";
        }
    }

    public static function sacarPromedio($primer, $segundo, $tercer)
    {
        $calificaciones = array();
        $suma = 0;
        /*

        $hayNP = false;

        if ($primer == 'NP') {
            $hayNP = true;
        } elseif ($primer != null) {
            $calif_primer = (int)$primer;
            array_push($calificaciones, $calif_primer);
        }

        if ($segundo == 'NP') {
            $hayNP = true;
        } elseif ($segundo != null) {
            $calif_segundo = (int)$segundo;
            array_push($calificaciones, $calif_segundo);
        }
        if ($tercer == 'NP') {
            $hayNP = true;
        } elseif ($tercer != null) {
            $calif_tercer = (int)$tercer;
            array_push($calificaciones, $calif_tercer);
        }

        if ($hayNP) {
            return 'NP';
        } else {
            // Hacemos la suma del array
            $suma = array_sum($calificaciones);

            // Contamos cuantos elementos hay en el array
            $total_numeros = count($calificaciones);

            // Realizamos el promedio
            $media = $suma/$total_numeros;

            // Realizamos el redondeo
            $promedio = round($media);


            return $promedio;
        }
        */
       
        if ($primer != null) {
            if ($primer == 'NP') {
                $calif_primer = 0;
            } else {
                $calif_primer = (int)$primer;
            }
            array_push($calificaciones, $calif_primer);
        }

        if ($segundo != null) {
            if ($segundo == 'NP') {
                $calif_segundo = 0;
            } else {
                $calif_segundo = (int)$segundo;
            }
            array_push($calificaciones, $calif_segundo);
        }
        
        if ($tercer != null) {
            if ($tercer == 'NP') {
                $calif_tercer = 0;
            } else {
                $calif_tercer = (int)$tercer;
            }
            array_push($calificaciones, $calif_tercer);
        }

        
        // Hacemos la suma del array
        $suma = array_sum($calificaciones);

        // Contamos cuantos elementos hay en el array
        $total_numeros = count($calificaciones);

        // Realizamos el promedio
        $media = $suma/$total_numeros;

        // Realizamos el redondeo
        $promedio = round($media);


        return $promedio;
    }
}
