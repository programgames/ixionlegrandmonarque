const $ = require('jquery');

$('.calculate').click( function(){
    var url = $('#advanced_historic_test').val();
    $.ajax({
        url:'/advanced/historic/ajax',
        type: "POST",
        dataType: "json",
        data: {
            "url": url
        },
        async: true,
        success: function (data)
        {
            $(".summoner-name").text(data.summoner)
            $(".time-played-hour").text(data.time)
            $(".time-played-days").text(data.time / 24)
        }
    })
});
