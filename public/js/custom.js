$('form[class="form-vat"]').validate({
    rules: {
        country_code: 'required',
        vat_number: {
            required: true,
            minlength: 8,
            maxlength: 12,
        }
    },
    messages: {
        country_code: 'This field is required',
        vat_number: 'This field is required',
        vat_number: {
            minlength: 'This field must be at least 8 characters.'
        },
        vat_number: {
            maxlength: 'This field must be max 12 characters.'
        }
    },
    submitHandler: function(form) {
        form.submit();
    }
});
