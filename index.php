<?php

// se requiere utilizar los controladores
require_once "controladores/plantilla.controlador.php";
require_once "controladores/inicio.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/enviarCorreo.controlador.php";
require_once "controladores/configuracion.controlador.php";
require_once "controladores/comentario.controlador.php";
require_once "controladores/perfil.controlador.php";
require_once "controladores/pedidos.controlador.php";
require_once "controladores/tallas.controlador.php";


// se requiere utilizar los modelos
require_once "modelos/inicio.modelo.php";
require_once "modelos/clientes.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/rutas.php";
require_once "modelos/configuracion.modelo.php";
require_once "modelos/comentario.modelo.php";
require_once "modelos/perfil.modelo.php";
require_once "modelos/pedidos.modelo.php";
require_once "modelos/tallas.modelo.php";


// PLUGINS


require 'vistas/libs/PHPMailer/Exception.php';
require 'vistas/libs/PHPMailer/PHPMailer.php';
require 'vistas/libs/PHPMailer/SMTP.php';

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();