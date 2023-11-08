<?if(file_exists('templates/header.php')) require_once 'templates/header.php';?>
<?$arDivisions = $form->getDivisions();?>
<?$arPipelines = $form->getPipelines();?>
<section class="success_container">
    <img src="./assets/img/svg/success.svg" alt="Success icon">
    <h2>Строка успешно добавлена!</h2>
    <button class="form_btn" type="button" id="clearAll">Заполнить новую форму</button>
</section>
<section class="form_container">
    <header class="form_header">Добавление строки в график шурфовок</header>
    <div class="form_error">
        <span></span>
    </div>
    <form class="form_template" id="addPipeline">
        <div class="form_line">
            <div class="form_block title_pipeline">
                <label for="titlePipeline">Наименование газопровода</label>
                <select name="titlePipeline" id="titlePipeline">
                    <?foreach($arPipelines as $arPipeline):?>
                        <option value="<?=$arPipeline["id"];?>"><?=$arPipeline["title_pipeline"];?></option>
                    <?endforeach;?>
                </select>
                <input type="hidden" value="" name="joinId" id="joinId">
            </div>
            <div class="form_block place_space">
                <label>Километр участка</label>
                <div class="many_inputs">
                    <div class="form_block">
                        <label for="start">Начало</label>
                        <input type="text" name="start" id="start" required>
                    </div>
                    <div class="form_block">
                        <label for="end">Конец</label>
                        <input type="text" name="end" id="end" required>
                    </div>
                </div>
            </div>   
            <div class="form_block current_place">
                <label for="current">Привязка к км</label>
                <input type="text" name="current" id="current">
            </div>
            <div class="form_block division">
                <label for="division">Ответственная служба</label>
                <select name="division" id="division">
                    <?foreach($arDivisions as $arDivision):?>
                        <option value="<?=$arDivision["id"];?>"><?=$arDivision["title_division"];?></option>
                    <?endforeach;?>
                </select>
            </div>
        </div>
        <div class="form_line">
            <div class="form_block date">
                <label>Срок исполнения</label>
                <div class="many_inputs">
                    <div class="form_block">
                        <label for="day">День</label>
                        <input type="text" name="day" id="day" max="2">
                    </div>
                    <div class="form_block">
                        <label for="mounth">Месяц</label>
                        <input type="text" name="mounth" id="mounth" max="2" required>
                    </div>
                    <div class="form_block">
                        <label for="year">Год</label>
                        <input type="text" name="year" id="year" max="4" min="4" required>
                    </div>
                </div>
            </div>
            <div class="form_block note">
                <label for="note">Примечание</label>
                <textarea type="text" name="note" id="note"></textarea>
            </div>
            <div class="form_block defect">
                <label for="defect">Категория дефекта</label>
                <textarea type="text" name="defect" id="defect"></textarea>
            </div>
        </div>
        <div class="form_line btns">
                <button class="form_btn" id="formBtn">Добавить строку</button>
            </div>
        <div class="join_container">
        </div>
    </form>
</section>
<?if(file_exists('templates/footer.php')) require_once 'templates/footer.php';?>