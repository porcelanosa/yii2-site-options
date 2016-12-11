/**
 * Created by Sasha-PC on 04.07.2016.
 */
$(document).ready(function () {
    $('.saveOption_btn').click(function () {
        let optionId = $(this).data('id');
        let option_type_id = $(this).data('typeid');
        let value = $('#value_' + optionId).val();
        let _this = $(this);
        let btn_text = $(this).html();
        console.log(optionId)
        $.ajax(
            {
                url: 'siteOptions/siteoptionsapi/save',
                type: 'post',
                dataType: 'json',
                data: {
                    id: optionId,
                    value: value,
                    type_id: option_type_id
                },
                beforeSend: function () {
                    _this.html('<i class="fa fa-spinner fa-spin  fa-fw"></i><span class="sr-only">Saving...</span>')
                },
                complete: function () {
                    _this.html(btn_text)
                }
            }
        )
    })
 $('.saveOptionText_btn').click(function () {
        let optionId = $(this).data('id');
        let option_type_alias = $(this).data('typealias');
        let value = $('#rich_text_' + optionId).val();
        let _this = $(this);
        let btn_text = $(this).html();
        console.log(value)
        $.ajax(
            {
                url: 'siteOptions/siteoptionsapi/save',
                type: 'post',
                dataType: 'json',
                data: {
                    id: optionId,
                    value: value,
                    type_alias: option_type_alias
                },
                beforeSend: function () {
                    _this.html('<i class="fa fa-spinner fa-spin  fa-fw"></i><span class="sr-only">Saving...</span>')
                },
                complete: function () {
                    _this.html(btn_text)
                }
            }
        )
    })

    $('.checkbox-value').on('ifChanged', function (event) {
        let optionId = $(this).data('id');
        let option_type_id = $(this).data('typeid');
        let value = $(this).is(':checked') ? 1 : 0;
        let loading_block = $(this).parents('label').siblings('span');
        //let loading_block = $(this).parent().siblings('span');

        console.log(loading_block)
        $.ajax(
            {
                url: 'siteOptions/siteoptionsapi/save',
                type: 'post',
                dataType: 'json',
                data: {
                    id: optionId,
                    value: value,
                    type_id: option_type_id
                },
                beforeSend: function () {
                    loading_block.removeClass('invisible');
                },
                complete: function () {
                    loading_block.addClass('invisible');
                }
            }
        )
    })
    $('.saveOptionImage_btn').click(function () {
        let optionId = $(this).data('id');
        let option_type_id = $(this).data('typeid');
        //let value = $('#value_' + optionId).val();
        let _this = $(this);
        let file_data = $('#value_' + optionId).prop("files")[0];   // Getting the properties of file from file field
        let form_data = new FormData();                  // Creating object of FormData class
        form_data.append("file", file_data)              // Appending parameter named file with properties of file_field to form_data
        $.ajax({
            url: "siteOptions/siteoptionsapi/saveimage",
            dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,                         // Setting the data attribute of ajax with file_data
            type: 'post'
        })
    })
})