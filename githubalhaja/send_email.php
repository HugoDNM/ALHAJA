<?php
// Mostrar errores de PHP (solo para desarrollo, no en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Función para enviar comandos SMTP y verificar respuestas
function send_command($socket, $command, $expected_response) {
    fputs($socket, $command);
    $response = "";
    while ($str = fgets($socket, 512)) {
        $response .= $str;
        // La línea que no empieza con un número seguido de un espacio es parte de la respuesta multi-línea
        if (substr($str, 3, 1) == " ") {
            break;
        }
    }
    if (substr($response, 0, 3) != $expected_response) {
        throw new Exception("Error en el comando SMTP: $command - Respuesta: $response");
    }
    return $response;
}

// Función para enviar correos usando sockets
function smtp_mail($to, $subject, $message, $headers, $smtp_server, $smtp_port, $username, $password) {
    $socket = fsockopen($smtp_server, $smtp_port, $errno, $errstr, 30);
    if (!$socket) {
        throw new Exception("No se pudo conectar al servidor SMTP: $errstr ($errno)");
    }

    // Leer respuesta inicial
    fgets($socket, 512);

    try {
        send_command($socket, "EHLO " . gethostname() . "\r\n", "250");
        send_command($socket, "STARTTLS\r\n", "220");

        // Habilitar criptografía de transporte
        if (!stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
            throw new Exception("Error al habilitar STARTTLS");
        }

        send_command($socket, "EHLO " . gethostname() . "\r\n", "250");
        send_command($socket, "AUTH LOGIN\r\n", "334");
        send_command($socket, base64_encode($username) . "\r\n", "334");
        send_command($socket, base64_encode($password) . "\r\n", "235");
        send_command($socket, "MAIL FROM: <$username>\r\n", "250");
        send_command($socket, "RCPT TO: <$to>\r\n", "250");
        send_command($socket, "DATA\r\n", "354");

        $full_message = "Subject: $subject\r\n$headers\r\n\r\n$message\r\n.\r\n";
        send_command($socket, $full_message, "250");

        send_command($socket, "QUIT\r\n", "221");
    } catch (Exception $e) {
        fclose($socket);
        throw $e;
    }

    fclose($socket);
    return true;
}

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validar entradas
        if (isset($_POST['email']) && isset($_POST['titulos'])) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $titulos = htmlspecialchars($_POST['titulos']);
            $cantidades = isset($_POST['cantidades']) ? htmlspecialchars($_POST['cantidades']) : '';

            $to = "panomu230695@gmail.com";
            $subject = "Nueva Orden de Compra";
            $message = "Correo del cliente: " . $email . "\n";
            $message .= "Artículos en el carrito: " . $titulos . "\n";
            $message .= "Cantidades: " . $cantidades . "\n";

            $headers = "From: panomu230695@gmail.com";

            $smtp_server = 'smtp.gmail.com';
            $smtp_port = 587;
            $username = 'panomu230695@gmail.com';
            $password = 'iizx jxda ayqj yaap';

            if (smtp_mail($to, $subject, $message, $headers, $smtp_server, $smtp_port, $username, $password)) {
                echo "Correo enviado exitosamente";
            } else {
                echo "Error al enviar el correo. Verifique la configuración del servidor.";
            }
        } else {
            echo 'Faltan datos requeridos en el formulario.';
        }
    } else {
        echo 'Método de solicitud no permitido.';
    }
} catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
?>