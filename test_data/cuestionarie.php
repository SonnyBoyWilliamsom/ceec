
<form action="<?= $_SERVER['PHP_SELF'] ?>?a=corregir" method="post">
    <?php 
    var_dump($questions);
    var_dump($answers);
     echo  '<br>p'.$questions[$i]['id_pregunta'];
    for ($i = 0; $i < count($questions); $i++) {
        echo  'p'.$questions[$i]['id_pregunta'];
        echo 'in for 1';
        $id_pregunta = $questions[$i]['id_pregunta'];
        $cuestionario=false;
        ?>
        <p><span> <?= $questions[$i]['numero']; ?> </span><?= $questions[$i]['pregunta']; ?></p>
        <?php
    
        for ($a = 0; $a < count($answers); $a++) {
            if ($answers[$a]['id_pregunta'] == $id_pregunta) {
                $id_respuesta = $answers[$a]['id_pregunta'].$answers[$a]['opcion'];
                $name_respuesta="u".$questions[$i]['id_unidad']."_q".$questions[$i]['numero']."_idq".$answers[$a]['id_pregunta'];
                ?>
                    <input type="radio" name="<?=$name_respuesta?>" id="<?=$id_respuesta?>">
                    <label for="<?=$id_respuesta?>"><?=$answers[$a]['descripcion']?></label><br>
                <?php
                $cuestionario=true;
            }
        }
    }
    if($cuestionario == true){ ?>
            <input type="submit" name="test" value="Submit">
        <?php }
 unset($questions);
 unset($answers);
    ?>
</form>

