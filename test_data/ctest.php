<?php

include './data.php';
if (isset($_GET['c']) && !empty($_GET['c'])) {
    $curso_error = true;
    $unit_error = true;
    $respuestas_error = true;
    $elements = explode('#', $_GET['c']);
    $nombre_curso = $elements[0];
    $unidad_curso = $elements[1];
    $questions = array();
    $answers = array();
    //curso 1, unidad 1
    for ($i = 0; $i < count($unidades); $i++) {
      
        if ($unidades[$i]['id_curso'] == $_GET['idc']) {
            $curso_error = false;
            for ($a = 0; $a < count($preguntas); $a++) {
                if ($preguntas[$a]['id_unidad'] == $_GET['idu']) {
                    $questions [$a] = $preguntas[$a];
                    $unit_error = false;
                    for ($b = 0; $b < count($respuestas); $b++) {
//                        echo 'r'.$respuestas[$b]['id_pregunta'].'-';
//                        echo 'q'.$questions[$a]['id_pregunta'];
                        if($respuestas[$b]['id_pregunta'] == $questions[$a]['id_pregunta']){
                             $answers[$b] = $respuestas[$b];
                             $respuestas_error = false;
                        }
                    }
                }
            }
            break;
        }
    }
    echo 'c='.$curso_error.'; u='.$unit_error.'; r='.$respuestas_error;
    

    include './cuestionarie.php';
   
}
/*Antes de poder imprimir el test por pantalla se deben obtener tan solo las preguntas y respuestas correspondientes al código que muestra el curso y la unidad en la que se va a trabajar. Una vez obtenidos solo los datos con los que se va a trabajar se llamara a la vista del cuestionario.
Trabajando con BBDD se tiene que establecer primero la conexión. Es entonces cuando se establece una petición (query) para obtener los datos:
 * -Primero obtenemos las unidades que corresponden al curso en el que el alumno está matriculado. (Hay que incluir la posibilidad de que un mismo alumno esté cursando más de uno):
 * 
 * SELECT * FROM unidades  
 *  inner join cursos
 *  on unidades.id_curso = cursos.id_curso
 * 
 * Esta query nos devolverá solo las unidades correspondientes a un curso determinado.
 * 
 * -Una vez sabemos que unidades corresponden al curso que está haciendo el alumno podemos obtener las preguntas de cualquiera de las unidades:
 * 
 * SELECT * FROM preguntas  
 *  inner join unidades
 *  on preguntas.id_unidad = unidades.id_unidad
 * 
 * En este punto ya tenemos los datos que necesitamos: las preguntas de una determinada unidad que pertenece a un determinado curso.
 * 
 * -Para obtener las respuestas hacemos también una consulta a la BBDD:
 * 
 * SELECT * FROM respuestas  
 *  inner join preguntas
 *  on respuestas.id_pregunta = preguntas.id_pregunta
 * 
 *  Esto se lo pasamos a la vista del cuestionario para que imprima las preguntas y sus respuestas correspondientes
 *  */
    
