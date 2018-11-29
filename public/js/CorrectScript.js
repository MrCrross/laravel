//Выравнивание зала
var NumCol = $("#row").data("col");
if(NumCol>5){
    $(".row_column").css({"margin-left": "20%" ,});
    $(".column").css({"width": "30px" ,});
}
//Генерирование зала
$('#gen').click(function () {
    $(this).siblings('#newS').children('table').detach();

    var Head=$(this).siblings('#newS');
    Head.append('<table class="table" ><thead class="thead-light" ><tr><th scope="col">Название фильма</th><th scope="col">Зал</th><th scope="col">Расписание</th></tr></thead><tbody></tbody></table>');

    var row=Head.children('table').children('tbody');
    row.append('<tr><td>123</td><td>love</td><td>12:15</td></tr>');
    row.append('<tr><td>12235</td><td>classic3d</td><td>12:30</td></tr>');
})