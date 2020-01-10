var filterGroup;

filterGroup = $('#filter-group-brands');
if ($('#filter-group-brands .checkbox').length > 6) AddShowMore(filterGroup);

filterGroup = $('#filter-group-collections');
if ($('#filter-group-collections .checkbox').length > 6) AddShowMore(filterGroup);

filterGroup = $('#filter-group-categories');
if ($('#filter-group-categories .checkbox').length > 6) AddShowMore(filterGroup);

filterGroup = $('#filter-group-colors');
if ($('#filter-group-colors .checkbox').length > 6) AddShowMore(filterGroup);

filterGroup = $('#filter-group-materials');
if ($('#filter-group-materials .checkbox').length > 6) AddShowMore(filterGroup);

function AddShowMore(gen){
    gen.parent().switchClass('mb_10','mb_15');  //poiche viene aggiunto "mostra altro", i div sono troppo appiccicati
    var DivShowMore = $('<div class="showMore">\n' +
        '                                <i class="fa fa-angle-down"></i>\n' +
        '                                <a class="ml_7">Mostra Altro</a>\n' +
        '                            </div>');
    gen.addClass("content hideContent"); //aggiungo la classe solo a quelli >6
    gen.children(':eq(5)').after(DivShowMore);
}

$(document).on('click', '.showMore a', function(){
    var elementClick = $(this);
    var divContent = elementClick.parents('.content');
    elementClick.parent().remove();
    var DivShowLess = $('<div class="showLess">\n' +
        '                                <i class="fa fa-angle-up"></i>\n' +
        '                                <a class="ml_7">Mostra Meno</a>\n' +
        '                            </div>');
    DivShowLess.appendTo(divContent);
    divContent.switchClass("hideContent", "showContent",400);
});

$(document).on('click', '.showLess a', function(){
    var elementClick = $(this);
    var divContent = elementClick.parents('.content');
    elementClick.parent().remove();
    divContent.removeClass("content showContent");
    AddShowMore(divContent);
});



$("#input-sort").change(function() {

    var select_sort = $("#input-sort").val();
    $('input[name=\'select_sort\']').val(select_sort);
    $('#btnSubmit').trigger('click');
});
