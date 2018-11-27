//Сеанс
var nameHall = [], timeS =[], idFilm =[];

$('#newS').each(function () {
    if ($(this).children('ul').length !== 0){
        var indexHall = $(this).children('ul').children('span'),
            indexTime = $(this).children('ul').children('li');
        nameHall.push(indexHall.text());
        idFilm.push(indexHall.attr('idf'));
        timeS.push(indexTime.text());
    }
})

$('.saveDB').click(function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var data= {id: JSON.stringify(idFilm),nameHall: JSON.stringify(nameHall),timeS: JSON.stringify(timeS)};
    console.log(data);
    $.ajax({
        type: 'POST',
        url: '/scheduleManAdd',
        data: JSON.stringify(data),
        contentType: 'application/json; charset=utf-8',
        success: function(result){
            console.log(result);
        }
    });
})