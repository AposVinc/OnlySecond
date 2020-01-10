//checkout nuovo indirizzo
function ActiveForm(){
    var checkbox = $('<div class="checkbox col-sm-9 col-md-offset-3" style="left: 25px;">\n' +
        '               <input type="checkbox" value="true" id="change_psw" name="change_psw" onclick="changePassword()"><span>Vuoi Cambiare Password?</span>\n' +
        '             </div>');
    $('#divCheckbox').addClass('form-group required');
    $('#password').hide();
    checkbox.appendTo('#divCheckbox');

    $('input').prop('disabled',false);
    $('#buttonBack').hide();
    $('#buttonEdit').hide();
    $('#buttonReset').show();
    $('#buttonSave').show();
}

function changePassword() {
    if($('#change_psw').is(':checked')){
        if($('#password').children().length != 4){
            var old_password = $(' <div class="form-group required">\n' +
                '                                    <label for="old-password" id="label-old-password" class="col-sm-3 control-label" style="padding-top: 0; top: -5px">Vecchia Password</label>\n' +
                '                                    <div class="col-sm-9">\n' +
                '                                        <input type="password" class="form-control" id="old-password" placeholder="Vecchia Password" value="" name="old-password">\n' +
                '                                    </div>\n' +
                '                                </div>');
            var new_password = $('<div class="form-group required">\n' +
                '                                    <label for="new-password" id="label-new-password" class="col-sm-3 control-label" style="padding-top: 0; top: -5px">Nuova Password</label>\n' +
                '                                    <div class="col-sm-9">\n' +
                '                                        <input type="password" class="form-control" id="new-password" placeholder="Nuova Password" value="" name="new-password">\n' +
                '                                    </div>\n' +
                '                                </div>'    );
            var confirm_new_password = $('<div class="form-group required">\n' +
                '                                    <label for="confirm-new-password" id="label-confirm-new-password" class="col-sm-3 control-label" style="padding-top: 0; top: -5px">Conferma Nuova Password</label>\n' +
                '                                    <div class="col-sm-9">\n' +
                '                                        <input type="password" class="form-control" id="confirm-new-password" placeholder="Conferma Nuova Password" value="" name="confirm-new-password">\n' +
                '                                    </div>\n' +
                '                                </div>'    );
            old_password.appendTo('#password');
            new_password.appendTo('#password');
            confirm_new_password.appendTo('#password');
        }else{
            $('#password').children().show();
        }
        $('#password').show();
        $('#password').children().eq(0).hide();
    }else{
        $('#password').hide();
    }
}

function DisableForm(){
    $('#divCheckbox').removeClass('form-group required');
    $('.checkbox').remove();

    $('#password').children().hide();
    $('#password').children().eq(0).show();
    $('#password').show();

    $('input').prop('disabled',true);
    $('#buttonBack').show();
    $('#buttonEdit').show();
    $('#buttonReset').hide();
    $('#buttonSave').hide();
}
