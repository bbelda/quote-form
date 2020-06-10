<?php

// Email template sending
function replace_empty_with_NA(&$text) {
    if($text == '' || $text == null) {
        $text = 'N/A';
    }
}
  
function quoting_form() {
    
    array_walk_recursive($_POST,'replace_empty_with_NA');

    $to_customer = $_POST['email-address'] ;
    $to_internal = 'bbelda@cyzerg.com,bbelda.cyzerg@gmail.com';
    $subject = 'Double Ace Cargo - Quote Summary';
    $headers = array();
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From: Double Ace Cargo <noreply@doubleacecargo.net>';

    $response = array();

    $services =  $_POST['english-service'];
    $languages = get_locale();

    $background = '';
    $port_origin_loading = '';
    $port_destination_loading = '';
    $routing_origin_destination = '';


    if($services == 'ocean-freight-fcl' ) {
        $background = 'http://4gw.8e7.mwp.accessdomain.com/wp-content/uploads/2020/05/fcl.png';

        if($languages == 'en_US') {

            $port_origin_loading = 'Port of Loading';
            $port_destination_loading = 'Port of Destination';

        } else  if($languages == 'es_ES') {

            $port_origin_loading = 'Puerto de Cargamento';
            $port_destination_loading = 'Puerto de Destino';

        }

    } else if($services == 'ocean-freight-lcl' ) {
        $background = 'http://4gw.8e7.mwp.accessdomain.com/wp-content/uploads/2020/05/lcl.png';

        if($languages == 'en_US') {

            $port_origin_loading = 'Port of Loading';
            $port_destination_loading = 'Port of Destination';

        } else  if($languages == 'es_ES') {

            $port_origin_loading = 'Puerto de Cargamento';
            $port_destination_loading = 'Puerto de Destino';

        }

    } else if($services == 'air-freight' ) {
        $background = 'http://4gw.8e7.mwp.accessdomain.com/wp-content/uploads/2020/05/air-freight.png';

        if($languages == 'en_US') {

            $port_origin_loading = 'Airport of Loading';
            $port_destination_loading = 'Airport of Destination';

        } else  if($languages == 'es_ES') {

            $port_origin_loading = 'Aeropuerto de Carga';
            $port_destination_loading = 'Aeropuerto de Destino';

        }

    } else if($services == 'breakbulk' ) {
        $background = 'http://4gw.8e7.mwp.accessdomain.com/wp-content/uploads/2020/05/breakbulk.png';

        if($languages == 'en_US') {

            $port_origin_loading = 'Port/Airport of Loading';
            $port_destination_loading = 'Port/Airport of Destination';

        } else  if($languages == 'es_ES') {

            $port_origin_loading = 'Puerto/Aeropuerto de Carga';
            $port_destination_loading = 'Puerto/Aeropuerto de Destino';

        }

    } else if($services == 'warehousing' ) {
        $background = 'http://4gw.8e7.mwp.accessdomain.com/wp-content/uploads/2020/05/warehousing.png';
    }


    $heading_logo ='
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Customer Quoting</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <style>
            
                .basic-title-details {
                    width: '.($languages == 'en_US' ? '140px' : '175px').' !important;
                }

                .routing-title-details {
                    width: '.($languages == 'en_US' ? '160px' : '195px').' !important;
                }

                .cargo-title-details {
                    width: '.($languages == 'en_US' ? '140px' : '195px').' !important;
                }

                .additional-title-details {
                    width: '.($languages == 'en_US' ? '190px' : '200px').' !important;
                }

                *[class="basic-title-details"] {
                    width: '.($languages == 'en_US' ? '140px' : '175px').' !important;
                }

                *[class="routing-title-details"] {
                    width: '.($languages == 'en_US' ? '160px' : '195px').' !important;
                }

                *[class="cargo-title-details"] {
                    width: '.($languages == 'en_US' ? '140px' : '195px').' !important;
                }

                *[class="additional-title-details"] {
                    width: '.($languages == 'en_US' ? '190px' : '200px').' !important;
                }
                
            </style>
        </head>
        <body width=”100%” style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly;">
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse; margin-bottom: 20px;" class="main-table">
                <tr>
                    <td align="center" class="img-holder" style="padding: 25px 0 10px;">
                        <a href="http://4gw.8e7.mwp.accessdomain.com">
                            <img src="http://4gw.8e7.mwp.accessdomain.com/wp-content/uploads/2016/06/double-ace-cargo-logo.png" width="258" alt="Double Ace Cargo Logo" class="logo">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;">
                            <tr>
                                <td style="width:600px">';
    
    
    $email_head = array(
        'internal' => array(
            'english' => '
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" style="border-collapse: collapse;">
                    <tr>
                        <td background="'.$background.'" bgcolor="#1C2F5A" style="background-size: cover; background-position: center; width: 600px;">
                        <!--[if gte mso 9]>
                        <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;xtext-align:center;">
                        <v:fill type="frame" src="'.$background.'" color="#1C2F5A" />
                        <v:textbox style="mso-fit-shape-to-text:true;" inset="0,0,0,0">
                        <![endif]-->
                            <h2 style="font-family: \'Trebuchet MS\'; font-size: 30px; font-weight: bold; letter-spacing: 0; line-height: 35px; color: #ffffff; margin: 0; text-align: center;margin-top: 72px; margin-bottom: 72px; ">Here is a Copy of Your Quote Request</h2>
                        <!--[if gte mso 9]>
                        </v:textbox>
                        </v:rect>
                        <![endif]-->
                        </td>
                    </tr>
                </table>
            ',
            'spanish' => '
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" style="border-collapse: collapse;">
                    <tr>
                        <td background="'.$background.'" bgcolor="#1C2F5A" style="background-size: cover; background-position: center; width: 600px;">
                        <!--[if gte mso 9]>
                        <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;xtext-align:center;">
                        <v:fill type="frame" src="'.$background.'" color="#1C2F5A" />
                        <v:textbox style="mso-fit-shape-to-text:true;" inset="0,0,0,0">
                        <![endif]-->
                            <h2 style="font-family: \'Trebuchet MS\'; font-size: 30px; font-weight: bold; letter-spacing: 0; line-height: 35px; color: #ffffff; margin: 0; text-align: center;margin-top: 72px; margin-bottom: 72px; ">Aquí Hay Una Copia De Su<br> Solicitud De Cotización</h2>
                        <!--[if gte mso 9]>
                        </v:textbox>
                        </v:rect>
                        <![endif]-->
                        </td>
                    </tr>
                </table>
            '
        ),
        'external' => array(
            'english' => '
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" style="border-collapse: collapse;">
                    <tr>
                        <td background="'.$background.'" bgcolor="#1C2F5A" style="background-size: cover; background-position: center; width: 600px;">
                        <!--[if gte mso 9]>
                        <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;xtext-align:left;">
                        <v:fill type="frame" src="'.$background.'" color="#1C2F5A" />
                        <v:textbox style="mso-fit-shape-to-text:true;" inset="0,0,0,0">
                        <![endif]-->
                            <h2 style="font-family: \'Trebuchet MS\'; font-size: 30px; font-weight: bold; letter-spacing: 0; line-height: 35px; color: #ffffff; margin: 0; text-align: center;margin-top: 72px; margin-bottom: 72px; ">New Online Quote Request</h2>
                        <!--[if gte mso 9]>
                        </v:textbox>
                        </v:rect>
                        <![endif]-->
                        </td>
                    </tr>
                </table>
            ',
            'spanish' => '
                <table role="presentation" cellpadding="0" cellspacing="0" border="0" width="600" style="border-collapse: collapse;">
                    <tr>
                        <td background="'.$background.'" bgcolor="#1C2F5A" style="background-size: cover; background-position: center; width: 600px;">
                        <!--[if gte mso 9]>
                        <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="width:600px;xtext-align:left;">
                        <v:fill type="frame" src="'.$background.'" color="#1C2F5A" />
                        <v:textbox style="mso-fit-shape-to-text:true;" inset="0,0,0,0">
                        <![endif]-->
                            <h2 style="font-family: \'Trebuchet MS\'; font-size: 30px; font-weight: bold; letter-spacing: 0; line-height: 35px; color: #ffffff; margin: 0; text-align: center;margin-top: 72px; margin-bottom: 72px; ">Nueva Solicitud De<br> Cotización En Línea</h2>
                        <!--[if gte mso 9]>
                        </v:textbox>
                        </v:rect>
                        <![endif]-->
                        </td>
                    </tr>
                </table>
            '
        )
    );

    $basic_details = '
    <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <tr>
            <td style="vertical-align: middle;">
                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tr>
                        <td class="horizontal-line" valign="middle" width="100%">
                            <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="140" style="vertical-align: middle;" align="center" class="basic-title-details">
                <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 20px; font-weight: bold; letter-spacing: 0; line-height: 23px; text-align: center; margin: 0;">
                    '.($languages == 'en_US' ? 'Basic Details' : 'Detalles Básicos').'
                </p>
            </td>
            <td style="vertical-align: middle;">
                <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tr>
                        <td class="horizontal-line" valign="middle" width="100%">
                            <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <tr>
            <td style="padding: 30px 30px 0;">
                <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tr>
                        <td style="text-align: left;">
                            <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Company' : 'Empresa').'
                            </p>
                        </td>
                        <td style="text-align: right;">
                            <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['company-name'].'
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Full Name*' : 'Nombre Completo*').'
                            </p>
                        </td>
                        <td style="text-align: right;">
                            <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['full-name'].'
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Phone Number*' : 'Número de Teléfono*').'
                            </p>
                        </td>
                        <td style="text-align: right;">
                            <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['phone-number'].'
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Email Address*' : 'Dirección de Correo Electrónico*').'
                            </p>
                        </td>
                        <td style="text-align: right;">
                            <a href="mailto:'.$_POST['email-address'].'" style="color: #000000 !important; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0; text-decoration: none !important;">
                                '.$_POST['email-address'].'
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Country' : 'País').'
                            </p>
                        </td>
                        <td style="text-align: right;">
                            <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['address-country'].'
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'City' : 'Ciudad').'
                            </p>
                        </td>
                        <td style="text-align: right;">
                            <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['address-city'].'
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'State' : 'Estado').'
                            </p>
                        </td>
                        <td style="text-align: right;">
                            <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['address-state'].'
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">
                            <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                            '.($languages == 'en_US' ? 'Zip Code' : 'Código Postal').'
                            </p>
                        </td>
                        <td style="text-align: right;">
                            <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['address-zip-code'].'
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left;padding: 20px 0 0;">
                            <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Requested Service' : 'Servicio Solicitado').'
                            </p>
                        </td>
                        <td style="text-align: right;padding: 20px 0 0;">
                            <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['requested-service'].'
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <tr>
            <td style="padding: 20px 30px 30px;">
                <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tr>
                        <td style="text-align: left;">
                            <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 30px; margin:0;">
                                '.($languages == 'en_US' ? 'Special Requirements' : 'Especifique Sus Requisitos').'
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding: 5px 0 0;">
                            <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 30px; margin: 0;">
                                '.nl2br($_POST['specific-requirement']).'
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>';

    if($_POST['english-pickup'] == 'Yes') {
        $routing_origin_destination = '
        <tr>
            <td style="text-align: left; padding: 20px 0 0;">
                <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'Origin' : 'Origen').'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'Country*' : 'País*').'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$_POST['origin-country'].'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'City*' : 'Ciudad*').'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$_POST['origin-city'].'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'Zip Code*' : 'Código Postal*').'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$_POST['origin-zip-code'].'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$port_origin_loading.'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$_POST['origin-loading'].'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left; padding: 20px 0 0;">
                <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'Destination' : 'Destino').'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'Country*' : 'País*').'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                '.$_POST['destination-country'].'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'City*' : 'Ciudad*').'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$_POST['destination-city'].'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$port_destination_loading.'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$_POST['destination-loading'].'
                </p>
            </td>
        </tr>
        ';
    } else if($_POST['english-pickup'] == 'No') {
        $routing_origin_destination = '
        <tr>
            <td style="text-align: left; padding: 20px 0 0;">
                <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'Origin' : 'Origen').'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'Country*' : 'País*').'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$_POST['origin-country'].'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                '.($languages == 'en_US' ? 'City*' : 'Ciudad*').'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$_POST['origin-city'].'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$port_origin_loading.'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$_POST['origin-loading'].'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left; padding: 20px 0 0;">
                <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 40px; margin:0;">
                '.($languages == 'en_US' ? 'Destination' : 'Destino').'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'Country*' : 'País*').'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                '.$_POST['destination-country'].'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'City*' : 'Ciudad*').'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$_POST['destination-city'].'
                </p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;">
                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$port_destination_loading.'
                </p>
            </td>
            <td style="text-align: right;">
                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.$_POST['destination-loading'].'
                </p>
            </td>
        </tr>
        ';
    }

    if( $services == 'ocean-freight-fcl' || $services == 'ocean-freight-lcl' || $services == 'air-freight' || $services == 'breakbulk' ) {
        $routing_details = '
        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="vertical-align: middle;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td class="horizontal-line" valign="middle" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                    <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="160" style="vertical-align: middle;" align="center" class="routing-title-details">
                    <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 20px; font-weight: bold; letter-spacing: 0; line-height: 23px; text-align: center; margin: 0;">
                        '.($languages == 'en_US' ? 'Routing Details' : 'Detalles de Ruta').'
                    </p>
                </td>
                <td style="vertical-align: middle;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td class="horizontal-line" valign="middle" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                    <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>';
        $routing_details .= '
        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="padding: 30px 30px 40px;">
                    <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Service Type' : 'Tipo de Servicio').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['services-type'].'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Pickup Required' : 'Se Requiere Recogida').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.$_POST['pickup-required'].'
                                </p>
                            </td>
                        </tr>
                        '.$routing_origin_destination.'
                    </table>
                </td>
            </tr>
        </table>';
    }

    if( $services == 'ocean-freight-fcl') {
        $cargo_details = '
        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="vertical-align: middle;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td class="horizontal-line" valign="middle" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                    <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="140" style="vertical-align: middle;" align="center" class="cargo-title-details">
                    <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 20px; font-weight: bold; letter-spacing: 0; line-height: 23px; text-align: center; margin: 0;">
                        '.($languages == 'en_US' ? 'Cargo Details' : 'Detalles de Carga').'
                    </p>
                </td>
                <td style="vertical-align: middle;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td class="horizontal-line" valign="middle" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                    <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        ';
        $cargo_details .= '
        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        ';
        for( $x = 0; $x < sizeof($_POST['ocean-fcl-quantity']); $x++ ) {
            $cargo_details .= '
            <tr>
                <td style="padding: 0 30px;">
                    <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td style="text-align: left; padding: 30px 0 0;">
                                <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Container' : 'Envase').' #'.($x+1).'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Container Quantity' : 'Cantidad de Contenedores').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.$_POST['ocean-fcl-quantity'][$x].'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Container Size' : 'Tamaño del Envase').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.str_replace('\\', '',$_POST['ocean-fcl-size'][$x]).'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Container Type' : 'Tipo de Contenedor').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.$_POST['ocean-fcl-type'][$x].'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Is Cargo Hazmat' : 'Es la Carga de Hazmat').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.$_POST['ocean-fcl-hazmat-select'][$x].'
                                </p>
                            </td>
                        </tr>';
                        if($_POST['ocean-fcl-hazmat-select'][$x] == 'Yes') {
                            $cargo_details .= '<tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.($languages == 'en_US' ? 'Hazmat Classs' : 'Clase Hazmat').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-fcl-hazmat-class'][$x].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        UN#
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-fcl-hazmat-un'][$x].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.($languages == 'en_US' ? 'Park Group#' : 'Grupo de Parques#').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.$_POST['ocean-fcl-hazmat-un'][$x].'
                                    </p>
                                </td>
                            </tr>';
                        }
                        $cargo_details .='<tr>
                            <td style="text-align: left;" colspan="2">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Cargo Description' : 'Descripción de la Carga').'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;" colspan="2">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 30px; margin:0;">
                                   '.nl2br($_POST['ocean-fcl-cargo-description'][$x]).'
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            ';
        }
        $cargo_details .= '
        </table>
        ';
    } else if($services == 'ocean-freight-lcl') {
        $cargo_details = '
        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="vertical-align: middle;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td class="horizontal-line" valign="middle" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                    <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="140" style="vertical-align: middle;" align="center" class="cargo-title-details">
                    <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 20px; font-weight: bold; letter-spacing: 0; line-height: 23px; text-align: center; margin: 0;">
                        '.($languages == 'en_US' ? 'Cargo Details' : 'Detalles de Carga').'
                    </p>
                </td>
                <td style="vertical-align: middle;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td class="horizontal-line" valign="middle" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                    <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        ';
        if($_POST['english-ocean-lcl-cargo'] == 'total') {
            $cargo_details .= '
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            ';
            $cargo_details .='
            <tr>
                <td style="padding: 0 30px;">
                    <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td style="text-align: left; padding: 30px 0 0;">
                                <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'By Totals' : 'Por Totales').'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Package Quantity' : 'Cantidad del Paquete').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.$_POST['ocean-lcl-bytotal-quantity'].'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    Package Type
                                    '.($languages == 'en_US' ? 'Package Type' : 'Cantidad del Paquete').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['ocean-lcl-bytotal-type'].'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Is Cargo Stackable' : 'La carga es apilable').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['ocean-lcl-bytotal-stackable'].'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Total Volume' : 'Volumen Total').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['ocean-lcl-bytotal-total-volume'].' FT<sup>3</sup>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Total Weight' : 'Peso Total').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['ocean-lcl-bytotal-total-weight'].' KGS
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Is Cargo Hazmat' : 'Es la Carga de Hazmat').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['ocean-lcl-bytotal-hazmat-select'].'
                                </p>
                            </td>
                        </tr>';
                        
                        if($_POST['ocean-lcl-bytotal-hazmat-select'] == 'Yes') {
                            $cargo_details .= '<tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Hazmat Classs' : 'Clase Hazmat').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-lcl-bytotal-hazmat-class'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        UN#
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-lcl-bytotal-hazmat-un'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Park Group#' : 'Grupo de Parques#').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.$_POST['ocean-lcl-bytotal-hazmat-park-group'].'
                                    </p>
                                </td>
                            </tr>';
                        }
            $cargo_details .='
            <tr>
                <td style="text-align: left;" colspan="2">
                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'Cargo Description' : 'Descripción de la Carga').'
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;" colspan="2">
                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 30px; margin:0;">
                        '.nl2br($_POST['ocean-lcl-bytotal-cargo-description']).'
                    </p>
                </td>
            </tr>
            ';
            $cargo_details .= '</table>
                    </td>
                </tr>
            </table>
            ';
            
            $cargo_details .='
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tr>
                    <td style="padding: 30px 30px 0;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.($languages == 'en_US' ? 'Total Packages' : 'Total de Paquetes').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['ocean-lcl-bytotal-total-quantity'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.($languages == 'en_US' ? 'Total Volume' : 'Volumen Total').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['ocean-lcl-bytotal-total-volume'].' FT<sup>3</sup>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.($languages == 'en_US' ? 'Total Weight' : 'Peso Total').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['ocean-lcl-bytotal-total-weight'].' KGS
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.($languages == 'en_US' ? 'Total Volume Weight' : 'Peso Total del Volumen').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['ocean-lcl-bytotal-total-volume-weight'].' KGS
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            ';
        } else if($_POST['english-ocean-lcl-cargo'] == 'package') {
            $cargo_details .= '
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tr>
                    <td style="text-align: left; padding: 30px 30px 0;">
                        <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 30px; margin:10px 0px 0px;">
                            '.($languages == 'en_US' ? 'By Packages' : 'Por Paquetes').'
                        </p>
                    </td>
                </tr>
            ';
            for( $x = 0; $x < sizeof($_POST['ocean-lcl-bypackages-quantity']); $x++ ) {
                $cargo_details .= '
                <tr>
                    <td style="padding: 0 30px;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                                <td style="text-align: left; padding: 30px 0 0;">
                                    <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.($languages == 'en_US' ? 'Package' : 'Paquete').' #'.($x+1).'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.($languages == 'en_US' ? 'Package Quantity' : 'Cantidad de Paquete').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-lcl-bypackages-quantity'][$x].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Package Type' : 'Tipo de Paquete').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-lcl-bypackages-type'][$x].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.($languages == 'en_US' ? 'Is Cargo Stackable' : 'La carga es apilable').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-lcl-bypackages-stackable'][$x].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Length' : 'Longitud').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-lcl-bypackages-length'][$x].' '.trim($_POST['ocean-lcl-bypackages-length-unit'][$x], '()').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Width' : 'Achura').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-lcl-bypackages-width'][$x].' '.trim($_POST['ocean-lcl-bypackages-width-unit'][$x], '()').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Height' : 'Altura').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-lcl-bypackages-height'][$x].' '.trim($_POST['ocean-lcl-bypackages-height-unit'][$x], '()').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Weight' : '{Peso}').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-lcl-bypackages-weight'][$x].' '.trim($_POST['ocean-lcl-bypackages-weight-unit'][$x], '()').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Is Cargo Hazmat' : 'Es la Carga de Hazmat').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-lcl-bypackages-hazmat-select'][$x].'
                                    </p>
                                </td>
                            </tr>';
                            if($_POST['ocean-lcl-bypackages-hazmat-select'][$x] == 'Yes') {
                                $cargo_details .= '<tr>
                                    <td style="text-align: left;">
                                        <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.($languages == 'en_US' ? 'Hazmat Classs' : 'Clase Hazmat').'
                                        </p>
                                    </td>
                                    <td style="text-align: right;">
                                        <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                            '.$_POST['ocean-lcl-bypackages-hazmat-class'][$x].'
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">
                                        <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                            UN#
                                        </p>
                                    </td>
                                    <td style="text-align: right;">
                                        <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                            '.$_POST['ocean-lcl-bypackages-hazmat-un'][$x].'
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">
                                        <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.($languages == 'en_US' ? 'Park Group#' : 'Grupo de Parques#').'
                                        </p>
                                    </td>
                                    <td style="text-align: right;">
                                        <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['ocean-lcl-bypackages-hazmat-un'][$x].'
                                        </p>
                                    </td>
                                </tr>';
                            }
                            $cargo_details .='<tr>
                                <td style="text-align: left;" colspan="2">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Package Description' : 'Descripción del Paquete').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;" colspan="2">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 30px; margin:0;">
                                    '.nl2br($_POST['ocean-lcl-bypackages-package-description'][$x]).'
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                ';
            }
            $cargo_details .= '
            </table>
            ';
            $cargo_details .='
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tr>
                    <td style="padding: 30px 30px 0;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Packages' : 'Total de Paquetes').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['ocean-lcl-bypackages-total-quantity'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Volume' : 'Volumen Total').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['ocean-lcl-bypackages-total-volume'].' '.$_POST['ocean-lcl-bypackages-total-volume-unit'].'<sup>3</sup>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Weight' : 'Peso Total').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['ocean-lcl-bypackages-total-weight'].' '.$_POST['ocean-lcl-bypackages-total-weight-unit'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Volume Weight' : 'Peso Total del Volumen').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['ocean-lcl-bypackages-total-volume-weight'].' '.$_POST['ocean-lcl-bypackages-total-volume-weight-unit'].'
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            ';
        }
    } else if($services == 'air-freight') {
        $cargo_details = '
        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="vertical-align: middle;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td class="horizontal-line" valign="middle" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                    <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="140" style="vertical-align: middle;" align="center" class="cargo-title-details">
                    <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 20px; font-weight: bold; letter-spacing: 0; line-height: 23px; text-align: center; margin: 0;">
                    '.($languages == 'en_US' ? 'Cargo Details' : 'Detalles de Carga').'
                    </p>
                </td>
                <td style="vertical-align: middle;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td class="horizontal-line" valign="middle" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                    <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        ';
        if($_POST['english-air-cargo'] == 'total') {
            $cargo_details .= '
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            ';
            $cargo_details .='
            <tr>
                <td style="padding: 0 30px;">
                    <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td style="text-align: left; padding: 30px 0 0;">
                                <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'By Totals' : 'Por Totales').'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Package Quantity' : 'Cantidad de Paquete').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.$_POST['air-bytotal-quantity'].'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Package Type' : 'Tipo de Paquete').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['air-bytotal-type'].'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Is Cargo Stackable' : 'La carga es apilable').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['air-bytotal-stackable'].'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Total Volume' : 'Volumen Total').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['air-bytotal-total-volume'].' FT<sup>3</sup>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Total Weight' : 'Peso Total').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['air-bytotal-total-weight'].' KGS
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Is Cargo Hazmat' : 'Es la Carga de Hazmat').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['air-bytotal-hazmat-select'].'
                                </p>
                            </td>
                        </tr>';
                        
                        if($_POST['air-bytotal-hazmat-select'] == 'Yes') {
                            $cargo_details .= '<tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Hazmat Classs' : 'Clase Hazmat').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['air-bytotal-hazmat-class'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        UN#
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['air-bytotal-hazmat-un'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.($languages == 'en_US' ? 'Park Group#' : 'Grupo de Parques#').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.$_POST['air-bytotal-hazmat-park-group'].'
                                    </p>
                                </td>
                            </tr>';
                        }
            $cargo_details .='
            <tr>
                <td style="text-align: left;" colspan="2">
                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                        '.($languages == 'en_US' ? 'Cargo Description' : 'Descripción de la Carga').'
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;" colspan="2">
                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 30px; margin:0;">
                        '.nl2br($_POST['air-bytotal-cargo-description']).'
                    </p>
                </td>
            </tr>
            ';
            $cargo_details .= '</table>
                    </td>
                </tr>
            </table>
            ';
            
            $cargo_details .='
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tr>
                    <td style="padding: 30px 30px 0;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Packages' : 'Total de Paquetes').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['air-bytotal-total-quantity'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Volume' : 'Volumen Total').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['air-bytotal-total-volume'].' FT<sup>3</sup>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Weight' : 'Peso Total').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['air-bytotal-total-weight'].' KGS
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Volume Weight' : 'Peso Total del Volumen').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['air-bytotal-total-volume-weight'].' KGS
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            ';
        } else if($_POST['english-air-cargo'] == 'package') {
            $cargo_details .= '
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tr>
                    <td style="text-align: left; padding: 30px 30px 0px;">
                        <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 30px; margin:10px 0px 0px;">
                            '.($languages == 'en_US' ? 'By Packages' : 'Por Paquetes').'
                        </p>
                    </td>
                </tr>
            ';
            for( $x = 0; $x < sizeof($_POST['air-bypackages-quantity']); $x++ ) {
                $cargo_details .= '
                <tr>
                    <td style="padding: 0 30px;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                                <td style="text-align: left; padding: 30px 0 0;">
                                    <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Package' : 'Paquete').' #'.($x+1).'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Package Quantity' : 'Cantidad de Paquete').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['air-bypackages-quantity'][$x].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Package Type' : 'Tipo de Paquete').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['air-bypackages-type'][$x].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Is Cargo Stackable' : 'La carga es apilable').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['air-bypackages-stackable'][$x].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Length' : 'Longitud').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['air-bypackages-length'][$x].' '.trim($_POST['air-bypackages-length-unit'][$x], '()').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Width' : 'Achura').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['air-bypackages-width'][$x].' '.trim($_POST['air-bypackages-width-unit'][$x], '()').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Height' : 'Altura').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['air-bypackages-height'][$x].' '.trim($_POST['air-bypackages-height-unit'][$x], '()').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Weight' : '{Peso}').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['air-bypackages-weight'][$x].' '.trim($_POST['air-bypackages-weight-unit'][$x], '()').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Is Cargo Hazmat' : 'Es la Carga de Hazmat').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['air-bypackages-hazmat-select'][$x].'
                                    </p>
                                </td>
                            </tr>';
                            if($_POST['air-bypackages-hazmat-select'][$x] == 'Yes') {
                                $cargo_details .= '<tr>
                                    <td style="text-align: left;">
                                        <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.($languages == 'en_US' ? 'Hazmat Classs' : 'Clase Hazmat').'
                                        </p>
                                    </td>
                                    <td style="text-align: right;">
                                        <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                            '.$_POST['air-bypackages-hazmat-class'][$x].'
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">
                                        <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                            UN#
                                        </p>
                                    </td>
                                    <td style="text-align: right;">
                                        <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                            '.$_POST['air-bypackages-hazmat-un'][$x].'
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left;">
                                        <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.($languages == 'en_US' ? 'Park Group#' : 'Grupo de Parques#').'
                                        </p>
                                    </td>
                                    <td style="text-align: right;">
                                        <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['air-bypackages-hazmat-un'][$x].'
                                        </p>
                                    </td>
                                </tr>';
                            }
                            $cargo_details .='<tr>
                                <td style="text-align: left;" colspan="2">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.($languages == 'en_US' ? 'Package Description' : 'Descripción del Paquete').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;" colspan="2">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 30px; margin:0;">
                                    '.nl2br($_POST['air-bypackages-package-description'][$x]).'
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                ';
            }
            $cargo_details .= '
            </table>
            ';
            $cargo_details .='
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tr>
                    <td style="padding: 30px 30px 0;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Packages' : 'Total de Paquetes').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['air-bypackages-total-quantity'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Volume' : 'Volumen Total').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['air-bypackages-total-volume'].' '.$_POST['air-bypackages-total-volume-unit'].'<sup>3</sup>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Weight' : 'Peso Total').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['air-bypackages-total-weight'].' '.$_POST['air-bypackages-total-weight-unit'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Volume Weight' : 'Peso Total del Volumen').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['air-bypackages-total-volume-weight'].' '.$_POST['air-bypackages-total-volume-weight-unit'].'
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            ';
        }
    } else if($services == 'breakbulk') {
        $cargo_details = '
        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="vertical-align: middle;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td class="horizontal-line" valign="middle" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                    <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="140" style="vertical-align: middle;" align="center" class="cargo-title-details">
                    <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 20px; font-weight: bold; letter-spacing: 0; line-height: 23px; text-align: center; margin: 0;">
                    '.($languages == 'en_US' ? 'Cargo Details' : 'Detalles de Carga').'
                    </p>
                </td>
                <td style="vertical-align: middle;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td class="horizontal-line" valign="middle" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                    <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        ';
        if($_POST['english-breakbulk-cargo'] == 'total') {
            $cargo_details .= '
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            ';
            $cargo_details .='
            <tr>
                <td style="padding: 0 30px;">
                    <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td style="text-align: left; padding: 30px 0 0;">
                                <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'By Totals' : 'Por Totales').'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Package Quantity' : 'Cantidad de Paquete').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.$_POST['breakbulk-bytotal-quantity'].'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Package Type' : 'Tipo de Paquete').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['breakbulk-bytotal-type'].'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Total Volume' : 'Volumen Total').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['breakbulk-bytotal-total-volume'].' FT<sup>3</sup>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Total Weight' : 'Peso Total').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['breakbulk-bytotal-total-weight'].' KGS
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.($languages == 'en_US' ? 'Make' : 'Hacer').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['breakbulk-bytotal-make'].'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Model Number' : 'Número de modelo').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                '.$_POST['breakbulk-bytotal-model'].'
                                </p>
                            </td>
                        </tr>';
            $cargo_details .='
            <tr>
                <td style="text-align: left;" colspan="2">
                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                    '.($languages == 'en_US' ? 'Cargo Description' : 'Descripción de la Carga').'
                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;" colspan="2">
                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 30px; margin:0;">
                        '.nl2br($_POST['breakbulk-bytotal-cargo-description']).'
                    </p>
                </td>
            </tr>
            ';
            $cargo_details .= '</table>
                    </td>
                </tr>
            </table>
            ';
            
            $cargo_details .='
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tr>
                    <td style="padding: 30px 30px 0;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Packages' : 'Total de Paquetes').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['breakbulk-bytotal-total-quantity'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Volume' : 'Volumen Total').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['breakbulk-bytotal-total-volume'].' FT<sup>3</sup>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Weight' : 'Peso Total').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['breakbulk-bytotal-total-weight'].' KGS
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Volume Weight' : 'Peso Total del Volumen').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['breakbulk-bytotal-total-volume-weight'].' KGS
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            ';
        } else if($_POST['english-breakbulk-cargo'] == 'package') {
            $cargo_details .= '
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tr>
                    <td style="text-align: left; padding: 30px 30px 0px;">
                        <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 30px; margin:10px 0px 0px;">
                        '.($languages == 'en_US' ? 'By Packages' : 'Por Paquetes').'
                        </p>
                    </td>
                </tr>
            ';
            for( $x = 0; $x < sizeof($_POST['breakbulk-bypackages-quantity']); $x++ ) {
                $cargo_details .= '
                <tr>
                    <td style="padding: 0 30px;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                                <td style="text-align: left; padding: 30px 0 0;">
                                    <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 18px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Package' : 'Paquete').' #'.($x+1).'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        Package Quantity
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['breakbulk-bypackages-quantity'][$x].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Package Quantity' : 'Cantidad de Paquete').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['breakbulk-bypackages-type'][$x].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Length' : 'Longitud').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['breakbulk-bypackages-length'][$x].' '.trim($_POST['breakbulk-bypackages-length-unit'][$x], '()').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Width' : 'Achura').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['breakbulk-bypackages-width'][$x].' '.trim($_POST['breakbulk-bypackages-width-unit'][$x], '()').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Height' : 'Altura').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['breakbulk-bypackages-height'][$x].' '.trim($_POST['breakbulk-bypackages-height-unit'][$x], '()').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Weight' : '{Peso}').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['breakbulk-bypackages-weight'][$x].' '.trim($_POST['breakbulk-bypackages-weight-unit'][$x], '()').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Make' : 'Hacer').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['breakbulk-bypackages-make'][$x].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Model Number' : 'Número de modelo').'
                                    </p>
                                </td>
                                <td style="text-align: right;">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                        '.$_POST['breakbulk-bypackages-model'][$x].'
                                    </p>
                                </td>
                            </tr>';
                            $cargo_details .='<tr>
                                <td style="text-align: left;" colspan="2">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Package Description' : 'Descripción del Paquete').'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;" colspan="2">
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 30px; margin:0;">
                                    '.nl2br($_POST['breakbulk-bypackages-package-description'][$x]).'
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                ';
            }
            $cargo_details .= '
            </table>
            ';
            $cargo_details .='
            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                <tr>
                    <td style="padding: 30px 30px 0;">
                        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Packages' : 'Total de Paquetes').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['breakbulk-bypackages-total-quantity'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Volume' : 'Volumen Total').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['breakbulk-bypackages-total-volume'].' '.$_POST['breakbulk-bypackages-total-volume-unit'].'<sup>3</sup>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Weight' : 'Peso Total').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['breakbulk-bypackages-total-weight'].' '.$_POST['breakbulk-bypackages-total-weight-unit'].'
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: left;">
                                    <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                    '.($languages == 'en_US' ? 'Total Volume Weight' : 'Peso Total del Volumen').'
                                    </p>
                                </td>
                                <td style="text-align: right;"> 
                                    <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin: 0;">
                                        '.$_POST['breakbulk-bypackages-total-volume-weight'].' '.$_POST['breakbulk-bypackages-total-volume-weight-unit'].'
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            ';
        }
    } else if($services == 'warehousing') {
        $cargo_details = '
        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="vertical-align: middle;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td class="horizontal-line" valign="middle" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                    <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="190" style="vertical-align: middle;" align="center" class="additional-title-details">
                    <p style="color: #CA1F26; font-family: \'Trebuchet MS\'; font-size: 20px; font-weight: bold; letter-spacing: 0; line-height: 23px; text-align: center; margin: 0;">
                    '.($languages == 'en_US' ? 'Additonal Details' : 'Detalles Adicionales').'
                    </p>
                </td>
                <td style="vertical-align: middle;">
                    <table role="presentation" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td class="horizontal-line" valign="middle" width="100%">
                                <table cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="background: #E0E0E0; height: 1px;">
                                    <tr><td style="font-size:0; line-height:0;">&nbsp;</td></tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        ';
        $cargo_details .= '
        <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
            <tr>
                <td style="padding: 0 30px;">
                    <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                        <tr>
                            <td style="text-align: left; padding: 30px 0 0;">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Warehouse Services' : 'Servicios de Almacén').'
                                </p>
                            </td>
                            <td style="text-align: right;">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.$_POST['warehousing-services'].'
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;" colspan="2">
                                <p style="color: #858585; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 40px; margin:0;">
                                    '.($languages == 'en_US' ? 'Specify Additional Information' : 'Especificar Información Adicional').'
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left;" colspan="2">
                                <p style="color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; letter-spacing: 0; line-height: 30px; margin:0;">
                                    '.nl2br($_POST['warehousing-specify-description']).'
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        ';
    }
    
    $email_body = ' <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
    <tr>';

    $email_body .= '<td style="border: 1px solid #DCDCDC; padding: 56px 0 56px;">
        '.$basic_details.'
        '.$routing_details.'
        '.$cargo_details.'
    </td>';


    $email_body .= '</tr>
        <tr>
            <td style="border: 1px solid #DCDCDC; padding: 30px 0 25px;">
                <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tr>
                        <td style="text-align: center; padding-bottom: 10px;">
                            <table role="presentation" align="center" cellpadding="0" cellspacing="0" width="300" style="border-collapse: collapse;">
                            <tr>
                                <td style="text-align: center;">
                                    <a href="https://www.facebook.com/doubleacecargo" style="text-decoration: none;">
                                        <img src="http://4gw.8e7.mwp.accessdomain.com/wp-content/uploads/2020/05/facebook.png" alt="" style="height: 30px;" height="30" style="padding: 0 15px;">
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a href="https://twitter.com/doubleacecargo" style="text-decoration: none;"> 
                                        <img src="http://4gw.8e7.mwp.accessdomain.com/wp-content/uploads/2020/05/twitter.png" alt="" style="height: 30px;" height="30" style="padding: 0 15px;">
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a href="https://www.linkedin.com/company/double-ace-cargo-inc" style="text-decoration: none;">
                                        <img src="http://4gw.8e7.mwp.accessdomain.com/wp-content/uploads/2020/05/linkedin.png" alt="" style="height: 30px;" height="30" style="padding: 0 15px;">
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <a href="https://plus.google.com/109268182194064491049/about?gmbpt=true&hl=en&_ga=1.71948884.695980025.1464703694" style="text-decoration: none;">
                                        <img src="http://4gw.8e7.mwp.accessdomain.com/wp-content/uploads/2020/05/google.png" alt="" style="height: 30px;" height="30" style="padding: 0 15px;">
                                    </a>
                                </td>
                                <td style="text-align: center;"> 
                                    <a href="https://www.instagram.com/explore/locations/1016636855/" style="text-decoration: none;">
                                        <img src="http://4gw.8e7.mwp.accessdomain.com/wp-content/uploads/2020/05/instagram.png" alt="" style="height: 30px;" height="30" style="padding: 0 15px;">
                                    </a>
                                </td>
                            </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style=" color: #000000; font-family: \'Trebuchet MS\'; font-size: 16px; font-weight: bold; letter-spacing: 0; line-height: 30px; text-align: center; margin: 0;">
                                '.($languages == 'en_US' ? '&copy; Copyright 2016 Double Ace Cargo. All rights reserved.' : '&copy; Copyright 2016 Double Ace Cargo. Todos los derechos reservados.').'
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>';


    $html_footer = '            </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </body>
    </html>';

    if( $languages == 'en_US') {

        $customer_template = $heading_logo . $email_head['internal']['english'] . $email_body . $html_footer;
        $company_template = $heading_logo . $email_head['external']['english'] . $email_body . $html_footer;

    } else if( $languages == 'es_ES') {

        $customer_template = $heading_logo . $email_head['internal']['spanish'] . $email_body . $html_footer;
        $company_template = $heading_logo . $email_head['external']['spanish'] . $email_body . $html_footer;

    }
    
  
    if(wp_mail( $to_customer, $subject, $customer_template, $headers) && wp_mail( $to_internal, $subject, $company_template, $headers)) {
        $response['status'] = 'success';
        $response['language'] = $languages;
    } else {
        $response['status'] = 'error'; 
        $response['language'] = $languages;
    }
        
    
    // $post['status'] = 'successs';
    echo json_encode($response); exit;
    // echo json_encode($response); exit;

}
add_action( 'wp_ajax_nopriv_quoting-form', 'quoting_form' );
add_action( 'wp_ajax_quoting-form', 'quoting_form' );