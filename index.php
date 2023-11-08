<?if(file_exists('templates/header.php')) require_once 'templates/header.php';?>
<?$arPipelines = $pl->getAllPipelines();?>
<div class="main_container">
    <section class="main_content">
        <div class="main_table">
            <div class="main_thead">
                <div class="main_line">
                    <span class="main_title title_pipeline">Наименование газопровода</span>
                    <div class="main_title has_subtitle place_space">
                        <span class="main_title">Километр участка</span>
                        <div class="main_title_box">
                            <span class="main_title start">Начало</span>
                            <span class="main_title end">Конец</span>
                        </div>
                    </div>
                    <span class="main_title current_place">Привязка к трассе газопровода</span>
                    <span class="main_title division">Организация выполняющая работу</span>
                    <div class="main_title has_subtitle date">
                        <span class="main_title">Срок исполнения</span>
                        <div class="main_title_box">
                            <span class="main_title day">День</span>
                            <span class="main_title mounth">Месяц</span>
                            <span class="main_title year">Год</span>
                        </div>
                    </div>
                    <span class="main_title note">Примечание</span>
                    <span class="main_title defect">Категория дефекта</span>
                </div>
            </div>
            <div class="main_tbody">
                <?$arPassIds = [];?>
                <?if($arPipelines):?>
                    <?foreach($arPipelines as $pipeline):?>
                        <?if(!in_array($pipeline["id_pip"], $arPassIds)):?>
                            <?if($pipeline["joinId"] != ""):?>
                                <?$arJoinPipelines = $pl->getJoinPipelines($pipeline["joinId"]);?>
                                <div class="main_line join_type">
                                    <div class="join_box">
                                        <span class="title_pipeline">
                                            <?=$pl->addOptionOnTable($pipeline["title_pipeline"]);?>
                                        </span>
                                        <span class="start">
                                            <?=$pl->addOptionOnTable($pipeline["start"]);?>
                                        </span>
                                        <span class="end">
                                            <?=$pl->addOptionOnTable($pipeline["end"]);?>
                                        </span>
                                        <span class="current_place">
                                            <?=$pl->addOptionOnTable($pipeline["current"]);?>
                                        </span>
                                        <span class="division">
                                            <?=$pl->addOptionOnTable($pipeline["title_division"]);?>
                                        </span>
                                        <span class="day">
                                            <?=$pl->addOptionOnTable($pipeline["day"]);?>
                                        </span>
                                        <span class="mounth">
                                            <?=$pl->addOptionOnTable($pipeline["mounth"]);?>
                                        </span>
                                        <span class="year">
                                            <?=$pl->addOptionOnTable($pipeline["year"]);?>
                                        </span>
                                        <span class="note">
                                            <?=$pl->addOptionOnTable($pipeline["note"]);?>
                                        </span>
                                        <span class="defect">
                                            <?=$pl->addOptionOnTable($pipeline["defect"]);?>
                                        </span>
                                    </div>
                                    <?foreach($arJoinPipelines as $joinPipeline):?>
                                        <?$arPassIds[] = $joinPipeline["id_pip"];?>
                                        <div class="join_box">
                                            <span class="title_pipeline">
                                                <?=$pl->addOptionOnTable($joinPipeline["title_pipeline"]);?>
                                            </span>
                                            <span class="start">
                                                <?=$pl->addOptionOnTable($joinPipeline["start"]);?>
                                            </span>
                                            <span class="end">
                                                <?=$pl->addOptionOnTable($joinPipeline["end"]);?>
                                            </span>
                                            <span class="current_place">
                                                <?=$pl->addOptionOnTable($joinPipeline["current"]);?>
                                            </span>
                                            <span class="division">
                                                <?=$pl->addOptionOnTable($joinPipeline["title_division"]);?>
                                            </span>
                                            <span class="day">
                                                <?=$pl->addOptionOnTable($joinPipeline["day"]);?>
                                            </span>
                                            <span class="mounth">
                                                <?=$pl->addOptionOnTable($joinPipeline["mounth"]);?>
                                            </span>
                                            <span class="year">
                                                <?=$pl->addOptionOnTable($joinPipeline["year"]);?>
                                            </span>
                                            <span class="note">
                                                <?=$pl->addOptionOnTable($joinPipeline["note"]);?>
                                            </span>
                                            <span class="defect">
                                                <?=$pl->addOptionOnTable($joinPipeline["defect"]);?>
                                            </span>
                                        </div>
                                    <?endforeach;?>
                                </div>
                            <?else:?>
                                <div class="main_line">
                                    <span class="title_pipeline">
                                        <?=$pl->addOptionOnTable($pipeline["title_pipeline"]);?>
                                    </span>
                                    <span class="start">
                                        <?=$pl->addOptionOnTable($pipeline["start"]);?>
                                    </span>
                                    <span class="end">
                                        <?=$pl->addOptionOnTable($pipeline["end"]);?>
                                    </span>
                                    <span class="current_place">
                                        <?=$pl->addOptionOnTable($pipeline["current"]);?>
                                    </span>
                                    <span class="division">
                                        <?=$pl->addOptionOnTable($pipeline["title_division"]);?>
                                    </span>
                                    <span class="day">
                                        <?=$pl->addOptionOnTable($pipeline["day"]);?>
                                    </span>
                                    <span class="mounth">
                                        <?=$pl->addOptionOnTable($pipeline["mounth"]);?>
                                    </span>
                                    <span class="year">
                                        <?=$pl->addOptionOnTable($pipeline["year"]);?>
                                    </span>
                                    <span class="note">
                                        <?=$pl->addOptionOnTable($pipeline["note"]);?>
                                    </span>
                                    <span class="defect">
                                        <?=$pl->addOptionOnTable($pipeline["defect"]);?>
                                    </span>
                                </div>
                            <?endif;?>
                        <?endif;?>
                    <?endforeach;?>
                <?endif;?>
            </div>
        </div>
    </section>
</div>
<?if(file_exists('templates/footer.php')) require_once 'templates/footer.php';?>