'use strict';

$(document).ready(function () {
    $('.calc__dropdown--loaders').select2({
        width: '196px'
    });

    function formatState(state) {
        if (!state.id) {
            return state.text;
        }
        var baseUrl = "assets/img/car";
        return $('<div class="item-down"><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.jpg" class="item-down--img" /><div class="item-down--text">' + state.text + '</div></div>');
    }

    $('.calc__dropdown--selectbox').select2({
        width: '90%',
        templateResult: formatState
    });

    $('.calc__dropdown--from').select2({
        width: '85%'
    });

    $('.calc__dropdown--to').select2({
        width: '85%'
    });

    $('.calc__dropdown--time').select2({
        width: '70%'
    });

    $('.calc__dropdown--durability').select2({
        width: '55%'
    });
});