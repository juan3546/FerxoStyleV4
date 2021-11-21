<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class ControladorCorreo{

    /*=============================================
	Enviar Pedido Personalizado
	=============================================*/

	static public function ctrEnviarPedidoPersonalizado(){
        if(isset($_POST["nombrePersonalizados"]) && isset($_POST["correoPersonalizados"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombrePersonalizados"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.@ ]+$/', $_POST["correoPersonalizados"]) &&
            preg_match('/^[0-9]+$/', $_POST["cantidadPersonalizados"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ:.\s ]+$/', $_POST["detallePersonalizados"])){
                 //Create an instance; passing `true` enables exceptions
                 $mail = new PHPMailer(true);

                 $item = "id";
                 $valor = "1";
         
                 $configRedes = ControladorConfiguracion::ctrMostrarConfigRedes($item, $valor);
    
                 try {
                     //Server settings
                     $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                     $mail->isSMTP();                                            //Send using SMTP
                     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                     $mail->Username   = $configRedes["email"];                     //SMTP username
                     $mail->Password   = $configRedes["passwordEmail"];                               //SMTP password
                     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                     //Recipients
                     $mail->setFrom($_POST["correoPersonalizados"], $_POST["nombrePersonalizados"]);
                     $mail->addAddress( $configRedes["email"],'Ferxo Style' );     //Add a recipient
         
                    
                     if(isset($_FILES["images"]["tmp_name"]) && $_FILES["images"]["tmp_name"][0] !== ""){
                         for ($i=0; $i < count($_FILES["images"]["tmp_name"]); $i++) { 
                             $mail->addAttachment($_FILES["images"]["tmp_name"][$i], $_FILES["images"]["name"][$i]);
                             
                         }
                     }
            
         
                     
                     /*
                     //Attachments
                     $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                     $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                     */
                       // HTML email starts here
                       $full_name  = strip_tags($_POST['nombrePersonalizados']);
                       $email      = strip_tags($_POST['correoPersonalizados']);
                       $text_message    = "Necesito ".$_POST["cantidadPersonalizados"]." diseño personalizado con las siguientes características..";    
                       $mail->AddEmbeddedImage('vistas/img/plantilla/logo.png', 'logo', 'attachment', 'base64', 'image/png');  
                       if($_POST['telefonoPersonalizados'] != ""){
                            $telefono = ' Y mi numero Telefónico es '.$_POST['telefonoPersonalizados'];
                       }else{
                            $telefono = "";
                       }
                       
                   $message  = "<html><body>";
       
                   $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
       
                   $message .= "<tr><td>";
       
                   $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
        
                   $message .= "<thead>
                              <tr height='80'>
                               <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >
                               <img src='cid:logo' alt='' width='330px' class='mx-5'>
                               </th>
                              </tr>
                              </thead>";
        
                   $message .= "<tbody>
    
          
                  <tr>
                   <td colspan='4' style='padding:15px;'>
                    <p style='font-size:20px;'>Hola Ferxo Style Me llamo ".$full_name.", mi correo es ".$_POST["correoPersonalizados"].$telefono."</p>
                    <hr />
                    <p style='font-size:25px;'></p>
                    <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>".$text_message.".</p>
                    <br>
                    <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>".$_POST["detallePersonalizados"].".</p>
                   </td>
                  </tr>
          
                  </tbody>";
        
                   $message .= "</table>";
       
                   $message .= "</td></tr>";
                   $message .= "</table>";
       
                   $message .= "</body></html>";
       
    
                     //Content
                     $mail->isHTML(true);                                  //Set email format to HTML
                     $mail->Subject = 'Pedido Personalizado';
                     $mail->Body    =  $message;
         
                     if($mail->send()){
                         echo '<br><br><div class="alert alert-success">Correo Enviado Correctamente</div>';
                     }else{
                        echo '<br><br><div class="alert alert-danger">Error al enviar</div>';
                     }
                     
                     
                 } catch (Exception $e) {
                     echo '<br><br><div class="alert alert-danger">Error Al enviar el correo: {$mail->ErrorInfo}</div>';
                 }
            }else{
                echo '<br><br><div class="alert alert-danger">Debe de capturar los datos que tienen signo ‘*’ y sin caracteres especiales</div>';
            }
    
        }

   
       
	}

    /*=============================================
	Enviar Cotización
	=============================================*/

	static public function ctrEnviarCotización(){
        if(isset($_POST["nombrePersonalizados"]) && isset($_POST["correoPersonalizados"]) && isset($_POST["slectAsunto"])){
            if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombrePersonalizados"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ.@ ]+$/', $_POST["correoPersonalizados"]) &&
            preg_match('/^[0-9]+$/', $_POST["cantidadPersonalizados"]) &&
            preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ:.\s ]+$/', $_POST["detallePersonalizados"])){
                 //Create an instance; passing `true` enables exceptions
                 $mail = new PHPMailer(true);
                 $item = "id";
                 $valor = "1";
         
                 $configRedes = ControladorConfiguracion::ctrMostrarConfigRedes($item, $valor);
    
                 try {
                     //Server settings
                     $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                     $mail->isSMTP();                                            //Send using SMTP
                     $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                     $mail->Username   = $configRedes["email"];                     //SMTP username
                     $mail->Password   = $configRedes["passwordEmail"];                               //SMTP password
                     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                 
                     //Recipients
                     $mail->setFrom($_POST["correoPersonalizados"], utf8_decode($_POST["nombrePersonalizados"]));
                     $mail->addAddress( $configRedes["email"],'Ferxo Style' );     //Add a recipient
         
                    
                     if(isset($_FILES["images"]["tmp_name"]) && $_FILES["images"]["tmp_name"][0] !== ""){
                         for ($i=0; $i < count($_FILES["images"]["tmp_name"]); $i++) { 
                             $mail->addAttachment($_FILES["images"]["tmp_name"][$i], $_FILES["images"]["name"][$i]);
                             
                         }
                     }
            
         
                     
                     /*
                     //Attachments
                     $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                     $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                     */
                       // HTML email starts here
                       $full_name  = strip_tags($_POST['nombrePersonalizados']);
                       $email      = strip_tags($_POST['correoPersonalizados']);
                       $text_message    = "Necesito un@ ".$_POST["slectAsunto"]."  de ".$_POST["cantidadPersonalizados"]." producto con las siguientes características..";    
                       $mail->AddEmbeddedImage('vistas/img/plantilla/logo.png', 'logo', 'attachment', 'base64', 'image/png');  
                       if($_POST['telefonoPersonalizados'] != ""){
                            $telefono = ' Y mi numero Telefónico es '.$_POST['telefonoPersonalizados'];
                       }else{
                            $telefono = "";
                       }
                       
                   $message  = "<html><body>";
       
                   $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
       
                   $message .= "<tr><td>";
       
                   $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
        
                   $message .= "<thead>
                              <tr height='80'>
                               <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >
                               <img src='cid:logo' alt='' width='330px' class='mx-5'>
                               </th>
                              </tr>
                              </thead>";
        
                   $message .= "<tbody>
    
          
                  <tr>
                   <td colspan='4' style='padding:15px;'>
                    <p style='font-size:20px;'>Hola Ferxo Style Me llamo ".$full_name.", mi correo es ".$_POST["correoPersonalizados"].$telefono."</p>
                    <hr />
                    <p style='font-size:25px;'></p>
                    <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>".$text_message.".</p>
                    <br>
                    <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>".$_POST["detallePersonalizados"].".</p>
                   </td>
                  </tr>
          
                  </tbody>";
        
                   $message .= "</table>";
       
                   $message .= "</td></tr>";
                   $message .= "</table>";
       
                   $message .= "</body></html>";
       
    
                     //Content
                     $mail->isHTML(true);                                  //Set email format to HTML
                     $mail->Subject = utf8_decode($_POST["slectAsunto"]);
                     $mail->Body    =  $message;
         
                     if($mail->send()){
                         echo '<br><br><div class="alert alert-success">Correo Enviado Correctamente</div>';
                     }else{
                        echo '<br><br><div class="alert alert-danger">Error al enviar</div>';
                     }
                     
                     
                 } catch (Exception $e) {
                     echo "Error Al enviar el correo: {$mail->ErrorInfo}";
                 }
            }else{
                echo '<br><br><div class="alert alert-danger">Debe de capturar los datos que tienen signo ‘*’ y sin caracteres especiales</div>';
            }
    
        }

   
       
	}



    

}