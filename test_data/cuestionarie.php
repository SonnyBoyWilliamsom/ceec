<?php include './data.php'; ?>

<form action="<?= $_SERVER['PHP_SELF'] ?>?a=corregir" method="post">
    <?php for ($i = 0; $i < count($preguntas); $i++) {
        $id_pregunta = $preguntas[$i]['id_pregunta'];
        $cuestionario=false;
        ?>
        <p><span> <?= $preguntas[$i]['numero']; ?> </span><?= $preguntas[$i]['pregunta']; ?></p>
        <?php
    
        for ($a = 0; $a < count($respuestas); $a++) {
            if ($respuestas[$a]['id_pregunta'] == $id_pregunta) {
                $id_respuesta = $respuestas[$a]['id_pregunta'].$respuestas[$a]['opcion'];
                $name_respuesta="u".$preguntas[$i]['id_unidad']."_q".$preguntas[$i]['numero']."_idq".$respuestas[$a]['id_pregunta'];
                ?>
                    <input type="radio" name="<?=$name_respuesta?>" id="<?=$id_respuesta?>">
                    <label for="<?=$id_respuesta?>"><?=$respuestas[$a]['descripcion']?></label><br>
                <?php
                $cuestionario=true;
            }
        }
    }
    if($cuestionario == true){ ?>
            <input type="submit" name="test" value="Submit">
        <?php }
    ?>
</form>

