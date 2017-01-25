jQuery(document).ready(function() {

    jQuery.validator.addMethod(
        'ContainsAtLeastOneDigit',
        function (value) { 
            return /[0-9]/.test(value); 
        },  
        'Your password must contain at least one digit.'
    );  

    jQuery.validator.addMethod(
        'ContainsAtLeastOneCapitalLetter',
        function (value) { 
            return /[A-Z]/.test(value); 
        },  
        'Your password must contain at least one capital letter.'
    );

    var Validator = jQuery('#yourForm').validate({
        rules: {
            'password': { // this is from the name="password" attribute, not id="password-id" attribute
                required: true,
                rangelength: [6, 14],
                ContainsAtLeastOneDigit: true,
                ContainsAtLeastOneCapitalLetter: true
            },
            'password2': { // this is from the name="password2" attribute, not id="password2-id" attribute
                required: true,
                equalTo: '#password2-id'
            }
        }
    });

});
 