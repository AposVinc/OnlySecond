$('input[name=\'select_payment\']').on('change', function() {
    if (this.value == 'existing') {
        $('#payment-existing').show();
        $('#payment-new').hide();
        $('#payment-delete').hide();
    }
    if (this.value == 'new') {
        $('#payment-existing').hide();
        $('#payment-new').show();
        $('#payment-delete').hide();
    }
    if (this.value == 'delete') {
        $('#payment-existing').hide();
        $('#payment-new').hide();
        $('#payment-delete').show();
    }
});
