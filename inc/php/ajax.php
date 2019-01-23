<?php

//form contacto
add_action('wp_ajax_nopriv_contacto', 'enviar_mail_contacto');
add_action('wp_ajax_contacto', 'enviar_mail_contacto');

//form contacto
add_action('wp_ajax_nopriv_newsletter', 'suscribir_newsletter');
add_action('wp_ajax_newsletter', 'suscribir_newsletter');

function suscribir_newsletter() {
    header('Content-type: application/json');

    $honeyPot = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    //Descarto por CSRF
    if (!check_ajax_referer('news-nonce', 'suscribir', false)) {
        echo json_encode(array('enviado' => TRUE, 'trucho' => TRUE, 'csrf' => TRUE));
        die();
    }

    //Descarto por ser un bot!
    if ($honeyPot !== '') {
        echo json_encode(array('enviado' => TRUE, 'trucho-sex' => TRUE));
        die();
    }

    if (is_null($email)) {
        echo json_encode(array('enviado' => TRUE, 'trucho-vacio' => TRUE));
        die();
    }

    //REGLAS DE SPAM
    if (substr_count($mensaje, '$') > 2 || substr_count($mensaje, '.com') > 2 || substr_count($mensaje, '.xxx') > 1) {
        echo json_encode(array('enviado' => TRUE, 'trucho' => TRUE, 'spam-loco' => TRUE));
        die();
    }

    $to = 'yair@proyectobeta.com.ar';
    $toName = 'Yair';
    $toBCC = 'nicolas@worq.com.ar';
    $toBCCName = 'Nico';
    $reply = $email;
    $replyName = 'Email';

    $email_body = "<h3>Nueva Suscripcion a Newsletter Pascal</h3>                                       
                    <p>Email: <b>{$email}</b></p>";

    $sent = send_email($to, $toName, $toBCC, $toBCCName, $reply, $replyName, $email_body);

    if (!$sent[0]) {
        echo json_encode(array('enviado' => FALSE, 'error-mailer' => $sent[1]));
        die();
    }
    echo json_encode(array('enviado' => TRUE));
    die();
}

function enviar_mail_contacto() {

    header('Content-type: application/json');

    $honeyPot = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);

    $mensaje = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_STRING);
    $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
    $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


//Descarto por CSRF
    if (!check_ajax_referer('contactar', 'panadero', false)) {
        echo json_encode(array('enviado' => TRUE, 'trucho' => TRUE, 'csrf' => TRUE));
        die();
    }


//Descarto por ser un bot!
    if ($honeyPot !== '') {
        echo json_encode(array('enviado' => TRUE, 'trucho-sex' => TRUE));
        die();
    }

    if (is_null($nombre) || is_null($email)) {
        echo json_encode(array('enviado' => TRUE, 'trucho-vacio' => TRUE));
        die();
    }

//REGLAS DE SPAM
    if (substr_count($mensaje, '$') > 2 || substr_count($mensaje, '.com') > 2 || substr_count($mensaje, '.xxx') > 1) {
        echo json_encode(array('enviado' => TRUE, 'trucho' => TRUE, 'spam-loco' => TRUE));
        die();
    }

    $to = 'nicolas@worq.com.ar';
    $toName = 'nicolas@worq.com.ar';
    $toBCC = '';
    $toBCCName = '';
    $reply = 'contact@worq.com.ar';
    $replyName = 'Contacto';


    $email_body = "<h3>Nueva Consulta desde el Formulario Web Pascal</h3>
                    <p>Nombre: <b>{$nombre}</b> </p>                    
                    <p>Email: <b>{$email}</b></p>
                    <p>Telefono: <b>{$telefono}</b></p>
                    <p>Mensaje: <b>{$mensaje}</b></p>";

    $sent = send_email($to, $toName, $toBCC, $toBCCName, $reply, $replyName, $email_body);

    if (!$sent[0]) {
        echo json_encode(array('enviado' => FALSE, 'error-mailer' => $sent[1]));
        die();
    }
    echo json_encode(array('enviado' => TRUE));
    die();
}

function send_email($to, $toName, $toBCC, $toBCCName, $reply, $replyName, $email_body) {

    include_once 'class.phpmailer.php';

    $mail = new PHPMailer;

    $mail->IsSMTP();

    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = "formulario@worq.com.ar";
    $mail->Password = "f0rmulario_de_worq_con_q";

    $mail->From = 'formulario@worq.com.ar';
    $mail->FromName = 'Formulario de Contacto Web';
    $mail->addAddress($to, $toName);

    if ($toBCC !== '') {
        $mail->addBCC($toBCC, $toBCCName);
    }

    $mail->addReplyTo($reply, $replyName);

    $mail->isHTML(true);

    $mail->Subject = 'Consulta Web';
    $mail->Body = $email_body;

    if (!$mail->send()) {
        return array(FALSE, $mail->ErrorInfo);
    }
    return array(TRUE);
}

//form contacto
add_action('wp_ajax_nopriv_shipping', 'shipping');
add_action('wp_ajax_shipping', 'shipping');

function shipping() {
    header('Content-type: application/json');

    $width = filter_input(INPUT_POST, 'width', FILTER_SANITIZE_STRING);
    $height = filter_input(INPUT_POST, 'height', FILTER_SANITIZE_STRING);
    $depth = filter_input(INPUT_POST, 'depth', FILTER_SANITIZE_STRING);
    $weight = filter_input(INPUT_POST, 'weight', FILTER_SANITIZE_STRING);
    $zip = filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_STRING);

    $params_mp = array(
        'dimensions' => "{$width}x{$height}x{$depth},{$weight}",
        //'dimensions' => "10x10x10,1",
        'zip_code' => $zip,
        'item_price' => 2000,
        'free_method' => '',
    );

    $shippingPrice = WC_MercadoEnviosKijam_Shipping::get_instance()->get_shipping_price($params_mp);

    $response = [];

    if ($shippingPrice && isset($shippingPrice['options'][0]['list_cost'])) {
        $response = ['success' => TRUE, 'shippingPrice' => round($shippingPrice['options'][0]['list_cost'], 2)];
    } else {
        $response = ['success' => FALSE, 'shippingPrice' => 0];
    }
    echo json_encode($response);
    die();
}
