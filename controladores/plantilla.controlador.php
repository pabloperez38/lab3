<?php
//Implementación PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PlantillaControlador
{
    //método para invocar la plantilla
    public function plantilla()
    {
        include 'vistas/plantilla.php';
    }

    //metodo para crear url
    static public function url()
    {
        return "https://controlstock.com.ar/perez/";
    }

    /*=============================================
    Función para enviar correos electrónicos
    =============================================*/

    static public function enviarEmail($color, $name, $subject, $email, $message, $url, $email_envio, $nombre_envio)
    {
        date_default_timezone_set("America/Argentina/Buenos_Aires");

        $mail = new PHPMailer;

        try {
            $mail->CharSet = 'UTF-8';
            $mail->isMail();
            $mail->setFrom($email_envio, $nombre_envio);
            $mail->Subject = "Hola " . $name . " - " . $subject;
            $mail->addAddress($email);
            $mail->msgHTML(' 
			<div style="background-color: ' . $color . '; padding: 20px; color: #ffffff;">
                <img width="150px" src="https://electrogarweb.com/vistas/imagenes/logo.png" alt=""> 
				Hola, ' . $name . ':
				<p style="font-size: 20px">' . $message . '</p>
				<a href="' . $url . '">Click aquí para ingresar</a><br><br>
				Si no esperabas este mensaje, puedes eliminarlo.
			</div>
		');
            $send = $mail->Send();
            if (!$send) {
                return $mail->ErrorInfo;
            } else {
                return "ok";
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    /*=============================================
    TRAER CONFIGURACIÓN
    =============================================*/
    static public function ctrMostrarConfiguracion($item, $valor)
    {
        $tabla = "configuracion";
        $respuesta = PlantillaModelo::mdlMostrarConfiguracion($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
    GUARDAR CONFIGURACIÓN
    =============================================*/
    static public function ctrActualizarInformacion($datos)
    {
        $tabla = "configuracion";
        $id = 1;
        $respuesta = PlantillaModelo::mdlActualizarInformacion($tabla, $datos, $id);

        return $respuesta;
    }
}
