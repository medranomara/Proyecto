<!doctype html>

<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>MARA MEDRANO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	    <link rel="stylesheet" href="../css/contacto.css">
	    <link rel="icon" href="imagenes/favico.png" sizes="16x16" type="image/png" >

        

    </head>

    <body>
            <header>
                <h1>mara medrano</h1>
                 <nav>
                    
                    <a href="../index.html">Inicio</a>
                    <a href="../contacto.html">Contacto</a>
                    
                </nav>
            
            
                </header>

                <section class="contenido">
                    <h2>Formulario de Contacto</h2>
                        <!-- Estoy en enviar.php
                        Acá estaba el formulario
                        -->
		            <?php
                            // Consigo los datos del form
                            session_start();
                            $nombre = $_POST['nombre'];
                            $email  = $_POST['email'];
                            $comentario = $_POST['comentario'];
                        
                            include("conexion.php");
                                    // escribir la query
                            $insertar = "INSERT INTO sitiocontacto
                                            VALUES(
                                                    null,
                                                    '$nombre',
                                                    '$email',
                                                    '$comentario'
                                                    )";
                                    //Ejecuto query
                            $insertar_ej = mysqli_query($conexion, $insertar);
                            if($insertar_ej == true){
                                    // ingreso destino
                                $destinatario = "marayuna@maramedrano.com";
                        
                                $asunto = "Formulario desde web";
                        
                                    // Junto todos los datos necesarios
                                $cuerpo = "$nombre te envío el formulario, contactalo a su mail $email Su mensaje es: $comentario ";
                                $cabecera = "From: Nombre <mail@sitio.com>";
                                    
                                mail($destinatario,
                                $asunto,
                                $cuerpo,
                                $cabecera);
                            
                            echo "Mensaje enviado¡";	
                            }else{
                                echo "Error, no se pudo enviar comentario.";
                            }
                            session_destroy();
                    ?>
                    

                </section>
    </body>

</html>