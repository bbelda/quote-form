(function($){
    $(document).ready(function(){
        nextSteps();
        totalCompute();
        inputValidations();
        inputChangeStyle();
        updateContainerNumber();
        inputSelectTag();
        maskingInput()
        addContainer();
        removeContainer();
    })

    // Variable
    function nextSteps() {
        $('#quote-form button.next-step.step-1').on('click', function(event){
            event.preventDefault();
            $("#quote-form .quote-steps.active").validate();
            if($("#quote-form .quote-steps.active").valid()){
                var requested_service  = $('input[name="requested-service"]').attr('data-service');
                var selected_service  = $('input[name="requested-service"]').val();
                var next_index;
                if(requested_service == 'ocean-freight-fcl') {
                    $('#steps ul li').eq(1).show();
                    $('.quote-steps .selected-service.active').removeClass('active');
                    $('.quote-steps #ocean-freight-fcl').addClass('active');
                    $('.quote-steps .selected-service .cargo-item-details').removeClass('active');
                    $('.quote-steps #ocean-freight-fcl .cargo-item-details').addClass('active');
                    $('.quote-steps .selected-service').fadeOut(function(){
                        $('.quote-steps #ocean-freight-fcl').fadeIn();
                    });
                    if($('html').attr('lang') == 'en-US') {
                        $('#origin-loading-change .quote-form-group label').html('Port of Loading');
                        $('#origin-loading-change .quote-form-group air-freight').attr('placeholder','Port of Loading');
                        $('#destination-loading-change .quote-form-group label').html('Port of Destination');
                        $('#destination-loading-change .quote-form-group input').attr('placeholder','Port of Destination');

                    } else if($('html').attr('lang') == 'es-ES') {
                        $('#origin-loading-change .quote-form-group label').html('Puerto de Cargamento');
                        $('#origin-loading-change .quote-form-group input').attr('placeholder','Puerto de Cargamento');
                        $('#destination-loading-change .quote-form-group label').html('Puerto de Destino');
                        $('#destination-loading-change .quote-form-group input').attr('placeholder','Puerto de Destino');
                    }
                    next_index = 1;
                } else if(requested_service == 'ocean-freight-lcl') {
                    $('#steps ul li').eq(1).show();
                    $('.quote-steps .selected-service.active').removeClass('active');
                    $('.quote-steps #ocean-freight-lcl').addClass('active');
                    // $('.quote-steps .selected-service .cargo-item-details').removeClass('active');
                    // $('.quote-steps #ocean-freight-lcl .cargo-item-details').addClass('active');
                    
                    $('.quote-steps .selected-service .cargo-item-details').removeClass('active');
                    $('.quote-steps #ocean-freight-lcl .cargo-item-details.by-totals').addClass('active');
                    $('.quote-steps .selected-service').fadeOut(function(){
                        $('.quote-steps #ocean-freight-lcl').fadeIn();
                    });
                    if($('html').attr('lang') == 'en-US') {
                        $('#origin-loading-change .quote-form-group label').html('Port of Loading');
                    $('#origin-loading-change .quote-form-group air-freight').attr('placeholder','Port of Loading');
                    $('#destination-loading-change .quote-form-group label').html('Port of Destination');
                    $('#destination-loading-change .quote-form-group input').attr('placeholder','Port of Destination');

                    } else if($('html').attr('lang') == 'es-ES') {
                        $('#origin-loading-change .quote-form-group label').html('Puerto de Cargamento');
                        $('#origin-loading-change .quote-form-group input').attr('placeholder','Puerto de Cargamento');
                        $('#destination-loading-change .quote-form-group label').html('Puerto de Destino');
                        $('#destination-loading-change .quote-form-group input').attr('placeholder','Puerto de Destino');
                    }
                    next_index = 1;
                } else if(requested_service == 'air-freight') {
                    $('#steps ul li').eq(1).show();
                    $('.quote-steps .selected-service.active').removeClass('active');
                    $('.quote-steps #air-freight').addClass('active');
                    // $('.quote-steps .selected-service .cargo-item-details').removeClass('active');
                    // $('.quote-steps #air-freight .cargo-item-details').addClass('active');

                    $('.quote-steps .selected-service .cargo-item-details').removeClass('active');
                    $('.quote-steps #air-freight .cargo-item-details.by-totals').addClass('active');
                    $('.quote-steps .selected-service').fadeOut(function(){
                        $('.quote-steps #air-freight').fadeIn();
                    });
                    if($('html').attr('lang') == 'en-US') {
                        $('#origin-loading-change .quote-form-group label').html('Airport of Loading');
                        $('#origin-loading-change .quote-form-group input').attr('placeholder','Airport of Loading');
                        $('#destination-loading-change .quote-form-group label').html('Airport of Destination');
                        $('#destination-loading-change .quote-form-group input').attr('placeholder','Airport of Destination');

                    } else if($('html').attr('lang') == 'es-ES') {
                        $('#origin-loading-change .quote-form-group label').html('Aeropuerto de Carga');
                        $('#origin-loading-change .quote-form-group input').attr('placeholder','Aeropuerto de Carga');
                        $('#destination-loading-change .quote-form-group label').html('Aeropuerto de Destino');
                        $('#destination-loading-change .quote-form-group input').attr('placeholder','Aeropuerto de Destino');
                    }
                    next_index = 1;
                } else if(requested_service == 'breakbulk') {
                    $('#steps ul li').eq(1).show();
                    $('.quote-steps .selected-service.active').removeClass('active');
                    $('.quote-steps #breakbulk').addClass('active');
                    // $('.quote-steps .selected-service .cargo-item-details').removeClass('active');
                    // $('.quote-steps #breakbulk .cargo-item-details').addClass('active');

                    $('.quote-steps .selected-service .cargo-item-details').removeClass('active');
                    $('.quote-steps #breakbulk .cargo-item-details.by-totals').addClass('active');
                    $('.quote-steps .selected-service').fadeOut(function(){
                        $('.quote-steps #breakbulk').fadeIn();
                    });
                    if($('html').attr('lang') == 'en-US') {
                        $('#origin-loading-change .quote-form-group label').html('Port/Airport of Loading');
                        $('#origin-loading-change .quote-form-group input').attr('placeholder','Port/Airport of Loading');
                        $('#destination-loading-change .quote-form-group label').html('Port/Airport of Destination');
                        $('#destination-loading-change .quote-form-group input').attr('placeholder','Port/Airport of Destination');

                    } else if($('html').attr('lang') == 'es-ES') {
                        $('#origin-loading-change .quote-form-group label').html('Puerto/Aeropuerto de Carga');
                        $('#origin-loading-change .quote-form-group input').attr('placeholder','Puerto/Aeropuerto de Carga');
                        $('#destination-loading-change .quote-form-group label').html('Puerto/Aeropuerto de Destino');
                        $('#destination-loading-change .quote-form-group input').attr('placeholder','Puerto/Aeropuerto de Destino');
                    }
                    next_index = 1;
                } else if(requested_service == 'warehousing') {
                    $('#steps ul li').eq(1).hide();
                    $('.quote-steps .selected-service.active').removeClass('active');
                    $('.quote-steps #warehousing').addClass('active');
                    // $('.quote-steps .selected-service .cargo-item-details').removeClass('active');
                    // $('.quote-steps #breakbulk .cargo-item-details').addClass('active');

                    $('.quote-steps .selected-service .cargo-item-details').removeClass('active');
                    $('.quote-steps #warehousing .cargo-item-details').addClass('active');
                    if($('html').attr('lang') == 'en-US') {
                        $('#steps ul li').eq(2).find('p').html('2.<br> Additional<br> Details');
                    } else if($('html').attr('lang') == 'es-ES') {
                        $('#steps ul li').eq(2).find('p').html('2.<br> Detalles<br> Adicionales');
                    }
                    $('.quote-steps .selected-service').hide(function(){
                        $('.quote-steps #warehousing').show();
                    });
                    next_index = 2;
                }
                goToStep(next_index);
            }
        });

        $('#quote-form .next-step.step-2').on('click', function(event){
            event.preventDefault();

            $("#quote-form .quote-steps.active .form-step-holder").validate();

            if($("#quote-form .quote-steps.active .form-step-holder").valid()){
                var next_index = $("#quote-form .form-step.active").next().index();
                goToStep(next_index);
            }
        });

        $('#quote-form .button-steps .next-step.submit-step').on('click', function(event){
            event.preventDefault();

            $('#third .selected-service.active .cargo-item-details.active').validate();

            if($('#third .selected-service.active .cargo-item-details.active').valid() && !$(this).hasClass('disabled')) {
                var button = $(this);
                var form = $('#quote-form');

                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: form.serialize() + 
                        '&english-service=' + $('input[name="requested-service"]').attr('data-service') +
                        '&english-pickup=' + $('input[name="pickup-required"]').attr('data-choice') +
                        '&english-ocean-lcl-cargo=' + $('input[name="ocean-lcl-cargo-details"]').attr('data-cargo-detail') +
                        '&english-air-cargo=' + $('input[name="air-cargo-details"]').attr('data-cargo-detail') +
                        '&english-breakbulk-cargo=' + $('input[name="breakbulk-cargo-details"]').attr('data-cargo-detail') ,
                    dataType: 'json',
                    beforeSend: function(response) {
                        button.attr('disabled','disabled');
                    },
                    success: function(response) {
                        if(response.status == 'success') {
                            $('#quote-form').fadeOut(function(){
                                $('html,body').animate({
                                    scrollTop: $('#quote-form').offset().top - 20,
                                },200)
                                $('.quote-section').css('margin-bottom','70px');
                                $('.quote-thankyou').fadeIn();
                            });
                        } else if(response.status == 'error') {
                            $('.quote-thankyou').fadeOut(function(){
                                $('html,body').animate({
                                    scrollTop: $('#quote-form').offset().top - 20,
                                },200)
                                $('.quote-section').css('margin-bottom','150px');
                                $('#quote-form').fadeIn();
                            });
                        }
                        console.log(response);
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }
        });
        
    }

    function goToStep(next_index) {
        var current_index = $("#quote-form .quote-steps.active").index();

        $('#quote-form .quote-steps.active').removeClass('active').fadeOut(function(){
            $('#quote-form .quote-steps').eq(next_index).addClass('active').fadeIn();
        });

        $('#steps ul li.active').removeClass('active');
        $('#steps ul li').eq(next_index).addClass('active');

        $('html,body').animate({
            scrollTop: $('#quote-form').offset().top - 170,
        },200)
    }

    function numberWithCommas(x) {
        //Seperates the components of the number
        var n= x.toString().split(".");
        //Comma-fies the first part
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        //Combines the two sections
        return n.join(".");
    }

    function totalCompute() {
        $(document).on('input paste','.selected-service.active .cargo-item-details.active .number-input-value',function(){
            totalComputation();
        })
    }

    function totalComputation() {
        var value = $('input[name="requested-service"]').attr('data-service');
        var cargo_detail = $('.selected-service.active .cargo-details input').attr('data-cargo-detail');
        var packages_active = '.selected-service.active .cargo-item-details.active.by-packages';
        var totals_active = '.selected-service.active .cargo-item-details.active.by-totals';
        if(cargo_detail == 'total') {
            var volume_total = 0;
            var weight_total = 0;
            var volume_weight_total = 0;
            var quantity_total = 0;
            $('.selected-service.active .cargo-item-details.active').each(function(){
                var quantity = parseFloat($(this).find('.quantity-number').val());
                var volume = parseFloat($(this).find('.total-volume-data').val());
                var weight = parseFloat($(this).find('.total-weight-data').val());
                volume_weight_total += (volume / 366) * quantity;
                volume_total += quantity * volume;
                weight_total += quantity * weight;
                quantity_total += quantity;
            });
    
            $(totals_active +' .total-container .total-volume').html(numberWithCommas(volume_total));
            $(totals_active +' .total-container .total-volume-value').val(volume_total);
    
            $(totals_active +' .total-container .total-weight').html(numberWithCommas(weight_total));
            $(totals_active +' .total-container .total-weight-value').val(weight_total);
    
            $(totals_active +' .total-container .total-volume-weight').html(numberWithCommas(volume_weight_total.toFixed(2)));
            $(totals_active +' .total-container .total-volume-weight-value').val(volume_weight_total.toFixed(2));
    
            $(totals_active +' .total-container .total-quantity').html(numberWithCommas(quantity_total));
            $(totals_active +' .total-container .total-quantity-value').val(quantity_total);
    
            if($(totals_active +' .total-container .total-volume-value').val() != 'NaN' && $(totals_active +' .total-container .total-weight-value').val() != 'NaN' && $(totals_active +' .total-container .total-volume-weight-value').val() != 'NaN' ) {
                $(totals_active +' .total-container').slideDown();
                if($(totals_active +' .total-container .total-computation .total-number.total-volume').outerWidth() >= 100 || $(totals_active +' .total-container .total-computation .total-number.total-weight').outerWidth() >= 100 || $(totals_active +' .total-container .total-computation .total-number.total-volume-weight').outerWidth() >= 59 || $(totals_active +' .total-container .total-computation .total-number.total-quantity').outerWidth() >= 100) {
                    $(totals_active +' .total-container .total-computation .total-title').css('display','block');
                } else {
                    $(totals_active +' .total-container .total-computation .total-title').css('display','inline-block');
                }
            } else {
                $(totals_active +' .total-container').slideUp();
            }
        } else if(cargo_detail == 'package') {
            var volume_total = 0;
            var weight_total = 0;
            var volume_weight_total = 0;
            var quantity_total = 0;
    
            var weight_unit = $('.selected-service.active .cargo-item-details.active .total-weight-value-unit').val();
        
            $('.selected-service.active .cargo-item-details.active .repeating').each(function(){
                var quantity = parseFloat($(this).find('.quantity-number').val());
                var length = parseFloat($(this).find('.length-data').val());
                var width = parseFloat($(this).find('.width-data').val());
                var height = parseFloat($(this).find('.height-data').val());
                var weight = parseFloat($(this).find('.weight-data').val());
                var all_unit = $(this).find('.unit-selection input').attr('data-unit');
        
                // console.log(all_unit)
                if(all_unit == 'IN') {
                    volume_total += ((length * width  * height) / 1728 ) * quantity;
                    
                    if(weight_unit == 'KGS') {
                        volume_weight_total += ( ( length * width  * height) / 366) * quantity;
                    } else if(weight_unit == 'LBS') {
                        volume_weight_total += ( ( length * width  * height) / 166) * quantity;
                    }

                } else  if(all_unit == 'FT') {
                    volume_total += length * width * height * quantity;

                    if(weight_unit == 'KGS') {
                        volume_weight_total += ( ( length * width  * height * 1728) / 366) * quantity;
                    } else if(weight_unit == 'LBS') {
                        volume_weight_total += ( ( length * width  * height * 1728) / 166) * quantity;
                    }

                }
                
        
                // console.log(volume_total)
                weight_total += quantity * weight;
                quantity_total += quantity;
            });
        
            $(packages_active+ ' .total-container .total-volume').html(numberWithCommas(volume_total.toFixed(2)));
            $(packages_active+ ' .total-container .total-volume-value').val(volume_total.toFixed(2));
        
            $(packages_active+ ' .total-container .total-weight').html(numberWithCommas(weight_total.toFixed(2)));
            $(packages_active+ ' .total-container .total-weight-value').val(weight_total.toFixed(2));
        
            $(packages_active+ ' .total-container .total-quantity').html(numberWithCommas(quantity_total));
            $(packages_active+ ' .total-container .total-quantity-value').val(quantity_total);
        
            $(packages_active+ ' .total-container .total-volume-weight').html(numberWithCommas(volume_weight_total.toFixed(2)));
            $(packages_active+ ' .total-container .total-volume-weight-value').val(volume_weight_total.toFixed(2));
        
            if($(packages_active+ ' .total-container .total-volume-value').val() != 'NaN' && $(packages_active+ ' .total-container .total-weight-value').val() != 'NaN' && $(packages_active+ ' .total-container .total-volume-weight-value').val() != 'NaN' ) {
                $(packages_active+ ' .total-container').slideDown();
                if($(packages_active+ ' .total-container .total-computation .total-number.total-volume').outerWidth() >= 100 || $(packages_active+ ' .total-container .total-computation .total-number.total-weight').outerWidth() >= 100 || $(packages_active+ ' .total-container .total-computation .total-number.total-volume-weight').outerWidth() >= 59 || $(packages_active+ ' .total-container .total-computation .total-number.total-quantity').outerWidth() >= 100 ) {
                    $(packages_active+ ' .total-container .total-computation .total-title').css('display','block');
                } else {
                    $(packages_active+ ' .total-container .total-computation .total-title').css('display','inline-block');
                }
            } else {
                $(packages_active+ ' .total-container').slideUp();
            }
        }
    }

    function removeContainer() {
        $('#quote-form').on('click', '.remove', function(event) {
            event.preventDefault();

            $(this).parents('.repeating').remove();
            updateContainerNumber();
            totalComputation();
        });
    }

    function addContainer() {
        $('#quote-form #add-container').on('click', function(event){
            event.preventDefault();
            $('.selected-service.active .cargo-item-details.active').validate();
            if($('.selected-service.active .cargo-item-details.active').valid()) {
                var clone = $('.selected-service.active .cargo-item-details.active .repeating:last-child').clone(true,true);
                event.preventDefault();
                
                clone.clone(true, true).insertAfter($('.selected-service.active .cargo-item-details.active .repeating:last-child'));
                $('.selected-service.active .cargo-item-details.active .repeating:last-child .quantity-number').mask('0#').unmask().mask('Z', {
                    translation: {
                        'Z': {
                            pattern: /[0-9]/, recursive: true
                        }
                    }
                });
                $('.selected-service.active .cargo-item-details.active .repeating:last-child .letters-format').mask('00#').unmask().mask('Z', {
                    translation: {
                        'Z': {
                            pattern: /[a-zA-Z ]/, recursive: true
                        }
                    }
                });
                $('.selected-service.active .cargo-item-details.active .repeating:last-child .letters-numbers-format').mask('000#').unmask().mask('Z', {
                    translation: {
                        'Z': {
                            pattern: /[a-zA-Z0-9 ]/, recursive: true
                        }
                    }
                });
                $('.selected-service.active .cargo-item-details.active .repeating:last-child .models-format').mask('0000#').unmask().mask('Z', {
                    translation: {
                        'Z': {
                            pattern: /[0-9a-zA-Z .]/, recursive: true
                        }
                    }
                });
                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('input[type="text"], input[type="number"], textarea').val('').trigger('input');

                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.quote-form-group.has-select-picker .fake-select input').val('').trigger('input');

                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.quote-form-group.has-select-picker .fake-select-picker ul li').removeClass('active');

                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.quote-form-group.has-select-picker .fake-input-text').removeClass('not-empty');

                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.container-size .quote-form-group.has-select-picker .fake-select-picker p').html('');


                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.container-type .quote-form-group.has-select-picker .fake-select-picker p').html('');

                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.quote-form-group.has-select-picker.hazmat-select .fake-select-picker p').html('');

                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.quote-form-group.has-select-picker.stackable-select .fake-select-picker p').html('');

                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.hazmat-class-change').hide();

                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.hazmat-un-change').hide();

                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.hazmat-park-group-change').hide();

                if($('html').attr('lang') == 'en-US') {
                    $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.container-size .quote-form-group.has-select-picker .fake-input-text p').html('Container size');
                    
                    $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.container-type .quote-form-group.has-select-picker .fake-input-text p').html('Container Type');

                    $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.quote-form-group.has-select-picker.hazmat-select .fake-input-text p').html('Is cargo hazmat?');

                    $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.quote-form-group.has-select-picker.stackable-select .fake-input-text p').html('Is cargo stackable?');

                } else if($('html').attr('lang') == 'es-ES') {
                    $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.container-size .quote-form-group.has-select-picker .fake-input-text p').html('Tamaño del envase');

                    $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.container-type .quote-form-group.has-select-picker .fake-input-text p').html('Tipo de Contenedor');

                    $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.quote-form-group.has-select-picker.hazmat-select .fake-input-text p').html('¿Es la carga de hazmat?');

                    $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.quote-form-group.has-select-picker.stackable-select .fake-input-text p').html('¿La carga es apilable?');
                }

                var container_type = ['Dry Freight','Flat Rack','Open Top','Refrigerated','Standard','Tank','High Cube','Hard Top'];

                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.container-type .fake-select-picker ul').html('');
                $.each(container_type, function(index, item){
                    var li = $('<li>'+ item +'</li>');
                    li.appendTo($('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.container-type .fake-select-picker ul'));
                });  
                $('.selected-service.active .cargo-item-details.active .repeating:last-child').find('.error').remove();
                $('.selected-service.active .cargo-item-details.active .total-container').slideUp();
                updateContainerNumber();
                // totalComputation();
            }
        })
    }

    function updateContainerNumber() {
        var x = 1;
        // clone = $('.selected-service.active .sub-service.active .repeating').clone(true,true);
        $('.selected-service.active .cargo-item-details.active .repeating').each(function(){
            $(this).find('.blue-text.padded .number').html(x);
            x++;
        });
    }

    function inputValidations() {
        $(document).on("input paste", '.min-number', function () {
            var max = parseFloat($(this).attr("max"));
            var min = parseFloat($(this).attr("min"));
            if (parseFloat($(this).val()) > max) {
                $(this).val(max);
            } else if (parseFloat($(this).val()) < 0) {
                $(this).val('');
            }
        });
    }

    function inputChangeStyle() {
        $(document).on('input paste','.total-units input',function(){
            if($(this).val() != '') {
                $(this).next().addClass('has-value');
            } else {
                $(this).next().removeClass('has-value');
            }
        })

        $(document).on('input paste','.dimension-number',function(){
            if($(this).val() != '') {
                $(this).next().removeClass('opacity-select');
            } else {
                $(this).next().addClass('opacity-select');
            }
        })
    }

    function inputSelectTag() {
        if($('.fake-select input').length > 0) {
            $(window).on('click', function() {
                $('.select-open').removeClass('select-open');
                $('.fake-select-picker').fadeOut('fast');
            });

            $(document).on('click', '.fake-select > .fake-input-text', function(event){
                $(window).click();
                // console.log('selected');
                if(!$(this).closest('.has-select-picker').hasClass('select-open')) {
                    event.stopPropagation();

                    var that = $(this);
                    that.closest('.has-select-picker').addClass('select-open');
                    that.closest('.fake-select').find('.fake-select-picker').fadeIn('fast');
                }
            });

            // Select tag list click
            $(document).on('click', '.fake-select-picker li', function(event){
                event.stopPropagation();
                var that = $(this);

                if(!that.hasClass('active')){
                    that.parent().find('.active').removeClass('active');
                    that.addClass('active');
    
                    var value = that.html();
                    var english_services = '';
                    var english_pickup = '';
                    var english_choice = '';
                    var english_type = '';
                    var english_cargo = '';
                    var english_unit = '';
                    var english_weight = '';
                    var english_warehousing = '';
    
                    var serivce_attr = that.attr('data-services');

                    var pickup_attr = that.attr('data-pickups');
                    var choice_attr = that.attr('data-choices');
                    var type_attr = that.attr('data-services-type');
                    var cargo_attr = that.attr('data-cargo-details');
                    var unit_attr = that.attr('data-units');
                    var weight_attr = that.attr('data-weights');
                    var warehousing_attr = that.attr('data-warehousing-services');

                    if (typeof serivce_attr !== typeof undefined && serivce_attr !== false) {
                        english_services = serivce_attr;
                        that.parents('.fake-select').find('input').attr('data-service', english_services);
                    }

                    if (typeof pickup_attr !== typeof undefined && pickup_attr !== false) {
                        english_pickup = pickup_attr;
                        that.parents('.fake-select').find('input').attr('data-pickup', english_pickup);
                    }

                    if (typeof choice_attr !== typeof undefined && choice_attr !== false) {
                        english_choice = choice_attr;
                        that.parents('.fake-select').find('input').attr('data-choice', english_choice);
                    }

                    if (typeof type_attr !== typeof undefined && type_attr !== false) {
                        english_type = type_attr;
                        that.parents('.fake-select').find('input').attr('data-service-type', english_type);
                    }

                    if (typeof cargo_attr !== typeof undefined && cargo_attr !== false) {
                        english_cargo = cargo_attr;
                        that.parents('.fake-select').find('input').attr('data-cargo-detail', english_cargo);
                    }

                    if (typeof unit_attr !== typeof undefined && unit_attr !== false) {
                        english_unit = unit_attr;
                        that.parents('.fake-select').find('input').attr('data-unit', english_unit);
                    }

                    if (typeof weight_attr !== typeof undefined && weight_attr !== false) {
                        english_weight = weight_attr;
                        that.parents('.fake-select').find('input').attr('data-weight', english_weight);
                    }

                    if (typeof warehousing_attr !== typeof undefined && warehousing_attr !== false) {
                        english_warehousing = warehousing_attr;
                        that.parents('.fake-select').find('input').attr('data-warehousing-service', english_warehousing);
                    }

                    that.parents('.fake-select').find('input').val(htmlDecode(value)).trigger('input');
                    that.parents('.fake-select').find('.fake-input-text p').html(htmlDecode(value));
                    that.parents('.fake-select').find('.fake-select-picker .fake-input p').html(htmlDecode(value));
                    
                    that.parents('.fake-select-picker').find('.selected').html(value);
                    
                    $('.fake-select-picker').fadeOut('fast',function(){
                        $('.select-open').removeClass('select-open');
                    });
                    
                    if(that.parents('.fake-select').find('input').val() != '') {
                        that.parents('.fake-select').find('.fake-input-text').addClass('not-empty');
                    }
                }
            })
            
            // Pickup required
            $(document).on('click', '#pickup-required .fake-select-picker li', function(event){
                var pickup = $('input[name="pickup-required"]').attr('data-choice');
                if(pickup == 'Yes') {
                    // Origin Country
                    $('#origin-country-change').removeClass('col-md-4');
                    $('#origin-country-change').removeClass('col-md-3');
                    $('#origin-country-change').addClass('col-md-3');

                    // Origin City
                    $('#origin-city-change').removeClass('col-md-4');
                    $('#origin-city-change').removeClass('col-md-3');
                    $('#origin-city-change').addClass('col-md-3');

                    // Origin Zipcode
                    $('#origin-zip-code-change').show();

                    // Origin City
                    $('#origin-loading-change').removeClass('col-md-4');
                    $('#origin-loading-change').removeClass('col-md-3');
                    $('#origin-loading-change').addClass('col-md-3');

                    $('#destination-country-change').removeClass('col-md-4');
                    $('#destination-country-change').removeClass('col-md-3');
                    $('#destination-country-change').addClass('col-md-3');

                    // Destination City
                    $('#destination-city-change').removeClass('col-md-4');
                    $('#destination-city-change').removeClass('col-md-3');
                    $('#destination-city-change').addClass('col-md-3');

                    // Destination City
                    $('#destination-loading-change').removeClass('col-md-4');
                    $('#destination-loading-change').removeClass('col-md-3');
                    $('#destination-loading-change').addClass('col-md-3');
                    
                } else if(pickup == 'No') {
                    // Origin Country
                    $('#origin-country-change').removeClass('col-md-3');
                    $('#origin-country-change').addClass('col-md-4');

                    // Origin City
                    $('#origin-city-change').removeClass('col-md-3');
                    $('#origin-city-change').addClass('col-md-4');

                    // Origin Zipcode
                    $('#origin-zip-code-change').hide();

                    // Origin Loading
                    $('#origin-loading-change').removeClass('col-md-3');
                    $('#origin-loading-change').addClass('col-md-4');

                    // Destination Country
                    $('#destination-country-change').removeClass('col-md-3');
                    $('#destination-country-change').addClass('col-md-4');

                    // Destination City
                    $('#destination-city-change').removeClass('col-md-3');
                    $('#destination-city-change').addClass('col-md-4');

                    // Destination Loading
                    $('#destination-loading-change').removeClass('col-md-3');
                    $('#destination-loading-change').addClass('col-md-4');
                }
            });

            // Container size
            $(document).on('click', '.container-size .fake-select-picker li', function() {
                var that = $(this);
                var value = that.parents('.has-select-picker').find('input').val();
                var container_type = '';

                if(value == "20'") {
                    container_type = ['Dry Freight','Flat Rack','Open Top','Refrigerated','Standard','Tank'];

                } else if (value == "40'") {
                    container_type = ['Dry Freight','Flat Rack','Open Top','Refrigerated','Standard','High Cube','Hard Top'];

                } else if (value == "45'") {
                    container_type = ['High Cube','Refrigerated','Standard'];
                }
                console.log($(this).closest('.container-size').next());

                that.closest('.container-size').next().find('.fake-select-picker ul').html('');
                that.closest('.container-size').next().find('.fake-input-text').removeClass('not-empty');
                that.closest('.container-size').next().find('.fake-input-text p').html('Container Type');
                that.closest('.container-size').next().find('.fake-input p').html('');
                $.each(container_type, function(index, item){
                    var li = $('<li>'+ item +'</li>');
                    li.appendTo(that.closest('.container-size').next().find('.fake-select-picker ul'));
                });    
            })

            // Selection service  - Menu List
            $(document).on('click','.selection-services .fake-select-picker li', function() {
                var value = $('input[name="requested-service"]').attr('data-service');
                if(value == 'ocean-freight-fcl') {
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('ocean-lcl');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('air-freight');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('breakbulk');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('warehousing');
                    $('#steps ul li').eq(2).find('span.cargo').addClass('ocean-fcl');
                    if($('html').attr('lang') == 'en-US') {
                        $('#steps ul li').eq(2).find('p').html('3.<br> Cargo<br> Details');
                    } else if($('html').attr('lang') == 'es-ES') {
                        $('#steps ul li').eq(2).find('p').html('3.<br> Detalles<br> de Carga');
                    }
                } else if(value == 'ocean-freight-lcl') {
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('ocean-fcl');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('air-freight');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('breakbulk');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('warehousing');
                    $('#steps ul li').eq(2).find('span.cargo').addClass('ocean-lcl');
                    if($('html').attr('lang') == 'en-US') {
                        $('#steps ul li').eq(2).find('p').html('3.<br> Cargo<br> Details');
                    } else if($('html').attr('lang') == 'es-ES') {
                        $('#steps ul li').eq(2).find('p').html('3.<br> Detalles<br> de Carga');
                    }
                } else if(value == 'air-freight') {
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('ocean-fcl');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('ocean-lcl');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('breakbulk');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('warehousing');
                    $('#steps ul li').eq(2).find('span.cargo').addClass('air-freight');
                    if($('html').attr('lang') == 'en-US') {
                        $('#steps ul li').eq(2).find('p').html('3.<br> Cargo<br> Details');
                    } else if($('html').attr('lang') == 'es-ES') {
                        $('#steps ul li').eq(2).find('p').html('3.<br> Detalles<br> de Carga');
                    }
                } else if(value == 'breakbulk') {
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('ocean-fcl');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('ocean-lcl');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('air-freight');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('warehousing');
                    $('#steps ul li').eq(2).find('span.cargo').addClass('breakbulk');
                    if($('html').attr('lang') == 'en-US') {
                        $('#steps ul li').eq(2).find('p').html('3.<br> Cargo<br> Details');
                    } else if($('html').attr('lang') == 'es-ES') {
                        $('#steps ul li').eq(2).find('p').html('3.<br> Detalles<br> de Carga');
                    }
                }  else if(value == 'warehousing') {
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('ocean-fcl');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('ocean-lcl');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('air-freight');
                    $('#steps ul li').eq(2).find('span.cargo').removeClass('breakbulk');
                    $('#steps ul li').eq(2).find('span.cargo').addClass('warehousing');
                    if($('html').attr('lang') == 'en-US') {
                        $('#steps ul li').eq(2).find('p').html('3.<br> Additional<br> Details');
                    } else if($('html').attr('lang') == 'es-ES') {
                        $('#steps ul li').eq(2).find('p').html('3.<br> Detalles<br> Adicionales');
                    }
                }  
            })

            // Hazmat Select
            $(document).on('click','.hazmat-select .fake-select-picker li', function() {
                var value = $(this).closest('.fake-select').find('input').attr('data-choice');
                if(value == 'Yes') {
                    $(this).closest('.row').find('.hazmat-class-change').show();
                    $(this).closest('.row').find('.hazmat-un-change').show();
                    $(this).closest('.row').find('.hazmat-park-group-change').show();
                } else if(value == 'No') {
                    $(this).closest('.row').find('.hazmat-class-change').hide();
                    $(this).closest('.row').find('.hazmat-un-change').hide();
                    $(this).closest('.row').find('.hazmat-park-group-change').hide();
                }
            })

            // Cargo Details
            $(document).on('click','.cargo-details .fake-select-picker li', function() {
                var value = $(this).closest('.fake-select').find('input').attr('data-cargo-detail');
                if(value == 'total') {
                    
                    $('.cargo-item-details.disabled').removeClass('disabled');
                    $('.cargo-item-details').removeClass('active');
                    $('.by-totals.cargo-item-details').addClass('active');
                    $('.button-steps .add-container').css("opacity","0");
                    $('.by-packages.cargo-item-details').fadeOut(function(){
                        $('.by-totals.cargo-item-details').fadeIn();
                        updateContainerNumber();
                    })
                } else if(value == 'package') {
                    $('.cargo-item-details').removeClass('active');
                    $('.by-packages.cargo-item-details').addClass('active');
                    $('.by-totals.cargo-item-details').fadeOut(function(){
                        $('.button-steps .add-container').css("opacity","1");
                        $('.by-packages.cargo-item-details').fadeIn();
                        updateContainerNumber();
                    });
                }
                $('.error').remove();
            })
            
            // Unit Change
            $(document).on('input','.unit-selection .fake-select input', function() {
                var value = $(this).attr('data-unit');
                var cargo_details = $('.selected-service.active .cargo-details .fake-select input').attr('data-cargo-detail');
                if(value == 'IN') {
                    console.log(value);
                    $('.unit-selection .fake-select .fake-input-text > p').html('(IN)');
                    $('.unit-selection .fake-select .fake-select-picker .fake-input > p').html('(IN)');
                    $('.unit-selection .fake-select .fake-select-picker ul li[data-units="CM"]').removeClass('active');
                    $('.unit-selection .fake-select .fake-select-picker ul li[data-units="IN"]').addClass('active');
                    $('.unit-selection .fake-select input').attr('data-unit','IN');
                    if(cargo_details == 'package') {
                        $('.selected-service.active .cargo-item-details.active .repeating').each(function(){
                            var length = parseFloat($(this).find('.length-data').val());
                            var width = parseFloat($(this).find('.width-data').val());
                            var height = parseFloat($(this).find('.height-data').val());

                            length = !length ? '' : (length * 12).toFixed(2);
                            width = !width ? '' : (width * 12).toFixed(2);
                            height = !height ? '' : (height * 12).toFixed(2);

                            $(this).find('.length-data').val(length);
                            $(this).find('.width-data').val(width);
                            $(this).find('.height-data').val(height);
                        });
                    }
                    totalComputation();
                } else if(value == 'FT') {
                    $('.unit-selection .fake-select .fake-input-text > p').html('(FT)');
                    $('.unit-selection .fake-select .fake-select-picker .fake-input > p').html('(FT)');
                    $('.unit-selection .fake-select input').attr('data-unit','FT');
                    $('.unit-selection .fake-select .fake-select-picker ul li[data-units="IN"]').removeClass('active');
                    $('.unit-selection .fake-select .fake-select-picker ul li[data-units="FT"]').addClass('active');
                    if(cargo_details == 'package') {
                        $('.selected-service.active .cargo-item-details.active .repeating').each(function(){
                            var length = parseFloat($(this).find('.length-data').val());
                            var width = parseFloat($(this).find('.width-data').val());
                            var height = parseFloat($(this).find('.height-data').val());

                            length = !length ? '' : (length / 12).toFixed(2);
                            width = !width ? '' : (width / 12).toFixed(2);
                            height = !height ? '' : (height / 12).toFixed(2);
                            
                            $(this).find('.length-data').val(length);
                            $(this).find('.width-data').val(width);
                            $(this).find('.height-data').val(height);
                        });
                    }
                    totalComputation();
                }
            })

            // Weight Selection
            $(document).on('input','.weight-selection .fake-select input', function() {
                var value = $(this).attr('data-weight');
                var cargo_details = $('.selected-service.active .cargo-details .fake-select input').attr('data-cargo-detail');
                if(value == 'KGS') {
                    $('.weight-selection .fake-select .fake-input-text > p').html('(KGS)');
                    $('.weight-selection .fake-select .fake-select-picker .fake-input > p').html('(KGS)');
                    $('.weight-selection .fake-select input').attr('data-weight','(KGS)');
                    $('.weight-selection .fake-select .fake-select-picker ul li[data-weights="LBS"]').removeClass('active');
                    $('.weight-selection .fake-select .fake-select-picker ul li[data-weights="KGS"]').addClass('active');
                    if(cargo_details == 'package') {
                        $('.selected-service.active .cargo-item-details.active .repeating').each(function(){
                            var weight = parseFloat($(this).find('.weight-data').val());
                            weight = !weight ? '' : (weight / 2.205).toFixed(2);
                            $(this).find('.weight-data').val(weight);
                        });
                        $('.selected-service.active .cargo-item-details.active .total-container .total-weight-value-unit').val('KGS')
                        $('.selected-service.active .total-container .total-weight-unit').html('KGS');

                        $('.selected-service.active .cargo-item-details.active .total-container .total-volume-weight-value-unit').val('KGS')
                        $('.selected-service.active .total-container .total-volume-weight-unit').html('KGS');

                    }
                    // var value_volume_weight = $('.selected-service.active .cargo-item-details.active .total-container .total-volume-weight-value').val();

                    // var total_volume_weight =  (value_volume_weight / 2.205).toFixed(2);

                    // var value_weight = $('.selected-service.active .cargo-item-details.active .total-container .total-weight-value').val();

                    // console.log(value_weight);

                    // var total_weight =  (value_weight / 2.205).toFixed(2);

                    // $('.selected-service.active .cargo-item-details.active .total-container .total-volume-weight-value').val(total_volume_weight);
                    // $('.selected-service.active .cargo-item-details.active .total-container .total-volume-weight').html(total_volume_weight);

                    // $('.selected-service.active .cargo-item-details.active .total-container .total-weight-value').val(total_weight);
                    // $('.selected-service.active .cargo-item-details.active .total-container .total-weight').html(total_weight);
                    totalComputation();

                } else if(value == 'LBS') {
                    $('.weight-selection .fake-select .fake-input-text > p').html('(LBS)');
                    $('.weight-selection .fake-select .fake-select-picker .fake-input > p').html('(LBS)');
                    $('.weight-selection .fake-select input').attr('data-weight','(LBS)');
                    $('.weight-selection .fake-select .fake-select-picker ul li[data-weights="KGS"]').removeClass('active');
                    $('.weight-selection .fake-select .fake-select-picker ul li[data-weights="LBS"]').addClass('active');
                    if(cargo_details == 'package') {
                        $('.selected-service.active .cargo-item-details.active .repeating').each(function(){
                            var weight = parseFloat($(this).find('.weight-data').val());
                            weight = !weight ? '' : (weight * 2.205).toFixed(2);
                            $(this).find('.weight-data').val(weight);
                        });
                        $('.selected-service.active .cargo-item-details.active .total-container .total-weight-value-unit').val('LBS')
                        $('.selected-service.active .cargo-item-details.active .total-container .total-weight-unit').html('LBS');

                        $('.selected-service.active .cargo-item-details.active .total-container .total-volume-weight-value-unit').val('LBS')
                        $('.selected-service.active .total-container .total-volume-weight-unit').html('LBS');

                        
                    }
                    // var value_volume_weight = $('.selected-service.active .cargo-item-details.active .total-container .total-volume-weight-value').val();

                    // var total_volume_weight =  (value_volume_weight * 2.205).toFixed(2);

                    // var value_weight = $('.selected-service.active .cargo-item-details.active .total-container .total-weight-value').val();

                    // console.log(value_weight);

                    // var total_weight =  (value_weight * 2.205).toFixed(2);

                    // $('.selected-service.active .cargo-item-details.active .total-container .total-volume-weight-value').val(total_volume_weight);
                    // $('.selected-service.active .cargo-item-details.active .total-container .total-volume-weight').html(total_volume_weight);

                    // $('.selected-service.active .cargo-item-details.active .total-container .total-weight-value').val(total_weight);
                    // $('.selected-service.active .cargo-item-details.active .total-container .total-weight').html(total_weight);
                    totalComputation();
                }
            })
        }
    }

    function maskingInput() {
        $('.letters-format').mask('Z', {
            translation: {
                'Z': {
                    pattern: /[a-zA-Z ]/, recursive: true
                }
            }
        });
        $('.letters-numbers-format').mask('Z', {
            translation: {
                'Z': {
                    pattern: /[a-zA-Z0-9 ]/, recursive: true
                }
            }
        });
        $('.address-format').mask('Z', {
            translation: {
                'Z': {
                    pattern: /[a-zA-Z0-9# ]/, recursive: true
                }
            }
        });
        $('.quantity-number').mask('Z', {
            translation: {
                'Z': {
                    pattern: /[0-9]/, recursive: true
                }
            }
        });
        $('.models-format').mask('Z', {
            translation: {
                'Z': {
                    pattern: /[0-9a-zA-Z .]/, recursive: true
                }
            }
        });
        $('.phone-format').mask('(000) 000-0000');
        $('.zip-code-format').mask('Z', {
            translation: {
                'Z': {
                    pattern: /[a-zA-Z0-9 ]/, recursive: true
                }
            }
        });
        $('.currency-format').on('input', function (event) {
            if (event.which >= 37 && event.which <= 40) {
                event.preventDefault();
            }
            var currentVal = $(this).val();
            var testDecimal = testDecimals(currentVal);
            if (testDecimal.length > 1) {
                // console.log("You cannot enter more than one decimal point");
                currentVal = currentVal.slice(0, -1);
            }
            $(this).val(replaceCommas(currentVal));
        
        });

        $(document).on('change input', '.decimal-numbers-format', function(){
            var val = this.value;
            var re = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)$/g;
            var re1 = /^([0-9]+[\.]?[0-9]?[0-9]?|[0-9]+)/g;
            if (!re.test(val)) {
                val = re1.exec(val);
                if (val) {
                    this.value = val[0];
                } else {
                    this.value = "";
                }
            } 
        });

        $(document).on('input paste','.dimension-number', function() {
            this.value = this.value.match(/^\d+\.?\d{0,2}/);
        })
        // $('.currency-format').on('input', function(){
        //     var value = $(this).val()
        //     $(this).val('Cargo Value: $'+value);
        // })
        
    }

    function htmlDecode(value){
        return $('<div/>').html(value).text();
    }

})(jQuery);
