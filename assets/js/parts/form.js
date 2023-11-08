$(window).ready(() => {
    $('.form_block input[name="day"], .form_block input[name="mounth"]').on("change", function(e) {
        let thisValue = $(this)[0].value;
        if(thisValue.length < 2) {
            $(this).val(`0${thisValue}`);
        }
    });

    $("form#addPipeline input#current").on("change", function(e) {
        let start = $("form#addPipeline input#start")[0].value;
        let end = $("form#addPipeline input#end")[0].value;
        let currentValue = $(this)[0].value;
        let currentValueMin = Number(currentValue) - 4;
        let currentValueMax = Number(currentValue) + 4;
        let errorContainer = $(".form_container .form_error span")[0];
        let joinContainer = $("form#addPipeline .join_container")[0];
        joinContainer.innerHTML = "";
        if(currentValue >= start && currentValue <= end) {
            $.ajax({
                url: "/functions/join.php",
                method: 'post',
	            dataType: 'html',
                data: {currentValueMin: currentValueMin, currentValueMax: currentValueMax},
                success: function(data) {
                    joinContainer.innerHTML = data;

                    $(".join_container button.btn").on('click', function (e) {
                        let dayCurrent;
                        let mountCurrent;
                        let yearCurrent;
                        let parent = $(this).parent(".join_line");
                        let dayInput = $('.form_block input[name="day"]');
                        let mounthInput = $('.form_block input[name="mounth"]');
                        let yearInput = $('.form_block input[name="year"]');
                        let joinIdInput = $('.form_block input[name="joinId"]');
                        let joinIdCurrent = $(this).attr("data-joinId");
                        let dateCurrent = parent.find("span.date")[0].innerText.split("-");
                        if(dateCurrent.length > 2) {
                            dayCurrent = dateCurrent[0];
                            mountCurrent = dateCurrent[1];
                            yearCurrent = dateCurrent[2];
                        } else {
                            mountCurrent = dateCurrent[0];
                            yearCurrent = dateCurrent[1];
                        }
                        if(dayCurrent) dayInput.val(dayCurrent);
                        if(mountCurrent) mounthInput.val(mountCurrent);
                        if(yearCurrent) yearInput.val(yearCurrent);
                        joinIdInput.val(joinIdCurrent);
                        $(".join_container")[0].innerHTML = "Ветки объеденены!"
                    });
                }
            });
        } else {
            errorContainer.innerHTML = "Некоректное значение у поля \"Привязка к км\"";
        }
    });

    $("#addPipeline").on("submit", function(e) {
        e.preventDefault();
        let formData = {};
        let $thisForm = $(this);
		let $thisFormInputs = $thisForm.find(".form_block > input, .form_block > textarea");
        let titlePipelineSelected = $(".form_block.title_pipeline select > option:selected")[0].value;
        let divisionSelected = $(".form_block.division select > option:selected")[0].value;
        $thisFormInputs.each(function(index, nextField) {
            let $nextField = $(nextField)[0];
            let $nextFieldId = $nextField.id;
            let valueField = $nextField.value;
            formData[$nextFieldId] = valueField;
        });
        if(titlePipelineSelected) formData["title_id"] = titlePipelineSelected;
        if(divisionSelected) formData["division"] = divisionSelected;
        $.ajax({
            url: "/functions/form.php",
            method: 'post',
            dataType: 'html',
            data: formData,
            success: function(data) {
                if(data == true) {
                    $(".form_container").css("display", "none");
                    $(".success_container").css("display", "flex");
                }
            }
        });
    });

    $("#clearAll").on("click", function (e) {
        let formInputs = $(".form_template > input, .form_template > textarea");
        formInputs.each(function(index, nextField) {
            let input = $(nextField);
            input.val("");
        });
        $(".form_container").css("display", "flex");
        $(".success_container").css("display", "none");
    })
});