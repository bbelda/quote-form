(function($) {
    function preg_quote(str) {
        return (str + "").replace(
            /([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:])/g,
            "\\$1"
        );
    }
    var errorTextRequired = '';
    var errorEmailValidation = '';
    var errorPhoneValidation = '';
    var errorFaxValidation = '';

    if($('html').attr('lang') == 'en-US') {
        errorTextRequired = 'This field is required';
        errorEmailValidation = 'Invalid email address';
        errorPhoneValidation = 'Invalid phone number';
        errorFaxValidation = 'Invalid fax number';
        errorDecimalValidation = 'Value must greater than 0';

    } else if($('html').attr('lang') == 'es-ES') {
        errorTextRequired = 'Este campo es requerido';
        errorEmailValidation = 'Dirección de correo electrónico no válida';
        errorPhoneValidation = 'Número de teléfono no válido';
        errorFaxValidation = 'Número de fax no válido';
        errorDecimalValidation = 'El valor debe ser mayor que 0';

    }

    $.fn.validate = function() {
        $(".error").remove();
        this.find("input[required], textarea[required]").each(function() {
            if ($(this).is(":visible")) {
                if (!$(this).val()) {
                    var error_message = $(
                        '<span class="error">'+errorTextRequired+'</span>'
                    );
                    error_message.insertAfter($(this));
                }
            }
        });
        this.find("input").each(function() {
            if ($(this).val()) {
                if ($(this).attr("type") == "email") {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test($(this).val())) {
                        if ($(this).next().length > 0) {
                            $(this).next().html(errorEmailValidation);
                        } else {
                            var error_message = $(
                                '<span class="error">'+errorEmailValidation+'</span>'
                            );
                            error_message.insertAfter($(this));
                        }
                    }
                }
                if ($(this).attr("type") == "tel") {
                    var accepted_regex = /^(\([0-9]{3}\) |[0-9]{3}-)[0-9]{3}-[0-9]{4}$/;
                    if (!accepted_regex.test($(this).val()) || $(this).val() == "(000) 000-0000" ) {
                        if ($(this).next().length > 0) {
                            $(this).next().html(errorPhoneValidation);
                        } else {
                            var error_message = $(
                                '<span class="error">'+errorPhoneValidation+'</span>'
                            );
                            error_message.insertAfter($(this));
                        }
                    }
                }
                if ($(this).attr("type") == "tel" && $(this).attr("name") == "fax") {
                    var accepted_regex = /^(\([0-9]{3}\) |[0-9]{3}-)[0-9]{3}-[0-9]{4}$/;
                    if (!accepted_regex.test($(this).val()) ||
                        $(this).val() == "(000) 000-0000"
                    ) {
                        if ($(this).next().length > 0) {
                            $(this).next().html(errorFaxValidation);
                        } else {
                            var error_message = $(
                                '<span class="error">'+errorFaxValidation+'</span>'
                            );
                            error_message.insertAfter($(this));
                        }
                    }
                }
                if($(this).hasClass("min-number") && $(this).val() == 0) {
                    if ($(this).parent().find('.error').length > 0) {
                        $(this).parent().find('.error').html(errorDecimalValidation);
                    } else {
                        var error_message = $(
                            '<span class="error">'+errorDecimalValidation+'</span>'
                        );
                        error_message.insertAfter($(this));
                    }
                }
            }
        });
        this.find(".fake-input-text.required").each(function(){
            if(!$(this).hasClass('not-empty')) {
                var attr = $(this).attr('data-if-empty');
                if (typeof attr !== typeof undefined && attr !== false) {
                    error_message = $(this).attr('data-if-empty');
                } else {
                    error_message = errorTextRequired;
                }
                $('<span class="error">'+ error_message +'</span>').insertAfter($(this).parent());
            }
        });
        return this;
    };
    $.fn.valid = function() {
        var valid = true;
        this.find("input[required], textarea[required]").each(function() {
            if ($(this).is(":visible")) {
                if (!$(this).val()) {
                    valid = false;
                }
            }
        });
        this.find("input").each(function() {
            if ($(this).val()) {
                if ($(this).attr("type") == "email") {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test($(this).val())) {
                        if ($(this).next().length > 0) {
                            valid = false;
                        } else {
                            valid = false;
                        }
                    }
                }
                if ($(this).attr("type") == "tel") {
                    var accepted_regex = /^(\([0-9]{3}\) |[0-9]{3}-)[0-9]{3}-[0-9]{4}$/;
                    if (!accepted_regex.test($(this).val()) ||
                        $(this).val() == "(000) 000-0000"
                    ) {
                        if ($(this).next().length > 0) {
                            valid = false;
                        } else {
                            valid = false;
                        }
                    }
                }
                if($(this).hasClass("min-number") && $(this).val() == 0) {
                    if ($(this).parent().find('.error').length > 0) {
                        valid = false;
                    } else {
                        valid = false;
                    }
                }
            }
        });
        this.find(".fake-input-text.required").each(function(){
            if(!$(this).hasClass('not-empty')) {
                valid = false;
            }
        });
        return valid;
    };
    $.fn.resetValidation = function() {
        $(".error").remove();
        return this;
    };
    $.fn.resetForm = function() {
        this.find("input").each(function() {
            $(this).val("");
        });
        return this;
    };
})(jQuery);