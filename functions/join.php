<?
if(file_exists("../core/init.php")) require_once "../core/init.php";
$arJoins = $form->getJoin($_POST);
$strJoin = "";
if($arJoins) {
    foreach($arJoins as $arJoin) {
        $strJoin .= "
            <div class='join_line'>
                <span class='title_pipeline'>".$arJoin['title_pipeline']."</span>
                <span class='current'>".$arJoin['current']."км</span>
                <span class='title_division'>".$arJoin['title_division']."</span>
                <span class='date'>".$arJoin['day']."-".$arJoin['mounth']."-".$arJoin['year']."</span>
                <span class='note'>".$arJoin['note']."</span>
                <button type='button' class='btn' data-joinId='".$arJoin['id_pip']."'>Объеденить</button>
            </div>
        ";
    }
    echo $strJoin;
} else {
    echo "Нечего соединять!";
}
?>