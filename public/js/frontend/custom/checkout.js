//checkout nuovo indirizzo -->
    $('input[name=\'shipping_address\']').on('change', function() {
        if (this.value == 'existing') {
            $('#shipping-existing').show();
            $('#shipping-new').hide();
            var list = $('#shipping-new').children();
            for(var i=0;i< list.length;i++){
                if(list[i].children[1].children[0].required){
                    list[i].children[1].children[0].required = false;
                }
                if(i == 2){
                    if(list[i].children[2].children[0].required){
                        list[i].children[2].children[0].required = false;
                    }
                }
            }
        }
        if (this.value == 'new') {
            $('#shipping-existing').hide();
            $('#shipping-new').show();
            var list = $('#shipping-new').children();
            for(var i=0;i< list.length;i++){
                if(!list[i].children[1].children[0].required){
                    list[i].children[1].children[0].required = true;
                }
                if(i == 2){
                    if(!list[i].children[2].children[0].required){
                        list[i].children[2].children[0].required = true;
                    }
                }
            }
        }

    });

$('input[name=\'payment_address\']').on('change', function() {
    if (this.value == 'existing') {
        $('#payment-existing').show();
        $('#payment-new').hide();
        var list = $('#payment-new').children();
        for(var i=0;i< list.length;i++){
            if(list[i].children[1].children[0].required){
                list[i].children[1].children[0].required = false;
            }
            if(i == 2){
                if(list[i].children[2].children[0].required){
                    list[i].children[2].children[0].required = false;
                }
            }
        }
    }
    if (this.value == 'new') {
        $('#payment-existing').hide();
        $('#payment-new').show();
        var list = $('#payment-new').children();
        for(var i=0;i< list.length;i++){
            if(!list[i].children[1].children[0].required){
                list[i].children[1].children[0].required = true;
            }
            if(i == 2){
                if(!list[i].children[2].children[0].required){
                    list[i].children[2].children[0].required = true;
                }
            }
        }
    }
    if (this.value == 'address') {
        $('#payment-existing').hide();
        $('#payment-new').hide();
        var list = $('#payment-new').children();
        for(var i=0;i< list.length;i++){
            if(list[i].children[1].children[0].required){
                list[i].children[1].children[0].required = false;
            }
            if(i == 2){
                if(list[i].children[2].children[0].required){
                    list[i].children[2].children[0].required = false;
                }
            }
        }
    }
});

$('input[name=\'payment_method\']').on('change', function() {
    if (this.value == 'paypal') {
        $('#payment-creditCard').hide();
        var list = $('#payment-creditCard-new').children();
        for(var i=0;i< list.length;i++){
            if(list[i].children[1].children[0].required){
                list[i].children[1].children[0].required = false;
            }
            if(i == 2){
                if(list[i].children[3].children[0].required){
                    list[i].children[3].children[0].required = false;
                }
            }
        }
    }
    if (this.value == 'creditCard') {
        $('#payment-creditCard').show();
    }
});

$('input[name=\'payment_creditCard_method\']').on('change', function() {
    if (this.value == 'existing') {
        $('#payment-creditCard-new').hide();
        var list = $('#payment-creditCard-new').children();
        for(var i=0;i< list.length;i++){
            if(list[i].children[1].children[0].required){
                list[i].children[1].children[0].required = false;
            }
            if(i == 2){
                if(list[i].children[3].children[0].required){
                    list[i].children[3].children[0].required = false;
                }
            }
        }
    }
    if (this.value == 'new') {
        $('#payment-creditCard-new').show();
        var list = $('#payment-creditCard-new').children();
        for(var i=0;i< list.length;i++){
            if(!list[i].children[1].children[0].required){
                list[i].children[1].children[0].required = true;
            }
            if(i == 2){
                if(!list[i].children[3].children[0].required){
                    list[i].children[3].children[0].required = true;
                }
            }
        }
    }
});

$('#button-shipping-address').on('click', function () {
    var error = false;
    $( "#errorShippingNew" ).remove();
    if(error){
        $('#shipping-new').prepend('<div id="errorShippingNew" class="alert alert-danger mr_10 ml_10">Compila tutti i campi</div>');
    }else{
        $( "#errorShippingNew" ).remove();
        $('#collapseOne').removeClass('in');
        $('#collapseOne').attr('aria-expanded', false);
        $('#collapseTwo').addClass('in');
        $('#collapseTwo').attr('aria-expanded', true);
        $('#collapseTwo').css('height', '');
    }
});

$('#button-shipping-method').on('click', function () {
    $('#collapseTwo').removeClass('in');
    $('#collapseTwo').attr('aria-expanded', false);
    $('#collapseThree').addClass('in');
    $('#collapseThree').attr('aria-expanded', true);
    $('#collapseThree').css('height', '');
});

$('#button-payment-method').on('click', function () {
    var error = false;
    $( "#errorPaymentMethodNew" ).remove();
    var list = $('#payment-creditCard-new').children();
    if($('input[name=\'payment_creditCard_method\']')[1].checked){
        for(var i=0;i< list.length;i++){
            if(list[i].children[1].children[0].value == ""){
                error = true;
            }
            if(i == 2){
                if(list[i].children[3].children[0].value == ""){
                    error = true;
                }
            }
        }
    }
    if(error){
        $('#payment-creditCard-new').prepend('<div id="errorPaymentMethodNew" class="alert alert-danger mr_10 ml_10">Compila tutti i campi</div>');
    }else{
        $( "#errorPaymentMethodNew" ).remove();
        if(document.getElementsByName('agree')[0].checked){
            $('#errorPaymentMethod').remove();
            $('#collapseThree').removeClass('in');
            $('#collapseThree').attr('aria-expanded', false);
            $('#collapseFour').addClass('in');
            $('#collapseFour').attr('aria-expanded', true);
            $('#collapseFour').css('height', '');
        }else{
            $('#addErrorPaymentMethod').prepend('<div id="errorPaymentMethod" class="alert alert-danger mr_10">Accetta i termini e le condizioni</div>');
        }
    }
});

$('#button-payment-address').on('click', function () {
    var error = false;
    $( "#errorPaymentNew" ).remove();
    var list = $('#payment-new').children();
    if($('input[name=\'payment_address\']')[2].checked){
        for(var i=0;i< list.length;i++){
            if(list[i].children[1].children[0].value == ""){
                error = true;
            }
            if(i == 2){
                if(list[i].children[2].children[0].value == ""){
                    error = true;
                }
            }
        }
    }
    if(error){
        $('#payment-new').prepend('<div id="errorPaymentNew" class="alert alert-danger mr_10 ml_10">Compila tutti i campi</div>');
    }else{
        $( "#errorPaymentNew" ).remove();
        $('#collapseFour').removeClass('in');
        $('#collapseFour').attr('aria-expanded', false);
        $('#collapseFive').addClass('in');
        $('#collapseFive').attr('aria-expanded', true);
        $('#collapseFive').css('height', '');
    }
});

$('#button-gift').on('click', function () {
    $('#collapseFive').removeClass('in');
    $('#collapseFive').attr('aria-expanded', false);
    $('#collapseSix').addClass('in');
    $('#collapseSix').attr('aria-expanded', true);
    $('#collapseSix').css('height', '');
});

$('#button-confirm').on('click', function () {
    if(!document.getElementsByName('agree')[0].checked){
        var element = document.getElementsByName('agree')[0];
        element.required = true;
        element.oninvalid=function () {
            $('#collapseSix').removeClass('in');
            $('#collapseSix').attr('aria-expanded', false);
            $('#collapseThree').addClass('in');
            $('#collapseThree').attr('aria-expanded', true);
            $('#collapseThree').css('height', '');
            element.setCustomValidity('Accetta i termini e le condizioni');
        };
        element.oninput= function () {
            element.setCustomValidity('');
        }
    }
    jQuery("form #shipping-new input").on("invalid", function(event) {
        $('#collapseSix').removeClass('in');
        $('#collapseSix').attr('aria-expanded', false);
        $('#collapseOne').addClass('in');
        $('#collapseOne').attr('aria-expanded', true);
        $('#collapseOne').css('height', '');
    });
    jQuery("form #payment-creditCard-new input").on("invalid", function(event) {
        $('#collapseSix').removeClass('in');
        $('#collapseSix').attr('aria-expanded', false);
        $('#collapseThree').addClass('in');
        $('#collapseThree').attr('aria-expanded', true);
        $('#collapseThree').css('height', '');
    });
    jQuery("form #payment-new input").on("invalid", function(event) {
        $('#collapseSix').removeClass('in');
        $('#collapseSix').attr('aria-expanded', false);
        $('#collapseFour').addClass('in');
        $('#collapseFour').attr('aria-expanded', true);
        $('#collapseFour').css('height', '');
    });
});
