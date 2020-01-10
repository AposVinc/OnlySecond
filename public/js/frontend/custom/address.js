$('input[name=\'select_address\']').on('change', function() {
    if (this.value == 'existing') {
        $('#address-existing').show();
        $('#address-new').hide();
        $('#address-delete').hide();
    }
    if (this.value == 'new') {
        $('#address-existing').hide();
        $('#address-new').show();
        $('#address-delete').hide();
    }
    if (this.value == 'delete') {
        $('#address-existing').hide();
        $('#address-new').hide();
        $('#address-delete').show();
    }
});
