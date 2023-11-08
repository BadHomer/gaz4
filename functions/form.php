<?
if(file_exists("../core/init.php")) require_once "../core/init.php";
if($_POST) {
    $newString = $form->addString($_POST);
    if($newString) {
        echo $newString;
    } else {
        echo "Строка не была добавлена в форму!";
    }
};
?>