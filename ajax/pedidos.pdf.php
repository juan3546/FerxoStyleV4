<?php
require_once "../controladores/pedidos.controlador.php";
require_once "../modelos/pedidos.modelo.php";

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";
require "../vistas/libs/fpdf/fpdf.php";

class generarReporte extends FPDF{
    public function header(){
      $hoy = date("y/m/d");
      $pedido = $_GET["pedido"];
      $this->SetFillColor(255,193, 6);
      $this->Rect(0, 0 ,220 , 50, 'F');
      
     // $fecha = substr($this->fechaPedido,0,10);
      $this->SetTextColor(255, 255, 255);
      $this->SetFont('Arial','I',25);
      $this->SetY(20);
      $this->Cell(10,15, utf8_decode("FERXO"),0,0,'L');
      $this->SetFont('Arial','B',25);
      $this->SetX(43);
      $this->Cell(10,15, utf8_decode("STYLE "),0,0,'L');
      $this->SetFont('Arial','B',12);
  //    $this->SetTextColor(23, 162, 184);
      $this->Cell(2,15, "",0,0,'R');
      
      $this->SetFont('Arial','I',12);
      $this->ln(4);
      $this->Cell(147,15, utf8_decode("Fecha: "),0,0,'R');
      $this->SetFont('Arial','B',12);
      $this->SetX(155);
      $this->Cell(0,15, $hoy,0,0,'L');
      $this->SetFont('Arial','I',12);
      $this->ln(4);
      $this->SetX(10);
      $this->Cell(155,15, utf8_decode("No. Pedido: "),0,0,'R');
      $this->SetFont('Arial','B',12);
      $this->Cell(0,15, $pedido,0,0,'L');
    }

    public function body(){
      $pedido = $_GET["pedido"];
      $idCliente = $_GET["pdf"];
      $total = 0;

      $item = "id"; 
      $valor = $idCliente;
      $reporteDeCliente =  ControladorClientes::ctrMostrarClientes($item, $valor);

      $itemPedido = "idPedido"; 
      $valorPedido = $pedido;
      $reporteDePedidos = ControladorPedidos::ctrMostrarPedido($itemPedido, $valorPedido);
      
      
      $dir = '../vistas/img/plantilla/logo.png';
      $this->Image($dir,30,60,30,0,'PNG');
      $this->SetY(60);
      $this->SetX(120);
      $this->Cell(0,15, 'Nombre: ',0,0,'L');
      $this->SetX(145);
      $this->Cell(0,15, $reporteDeCliente["nombre"],0,0,'L');
      $this->ln(4);
      $this->SetX(120);
      $this->Cell(0,15, 'Correo: ',0,0,'L');
      $this->SetX(145);
      $this->Cell(0,15, $reporteDeCliente["correo"] ,0,0,'L');
      $this->ln(4);
     
        $this->SetX(120);
        if($reporteDeCliente["direccion"] != ""){
          $this->Cell(0,15, utf8_decode('Direccion: '),0,0,'L');
          $this->SetX(145);
          $this->Cell(0,15, $reporteDeCliente["direccion"],0,0,'L');
        }



  
      $this->SetY(100);
      $this->SetX(20);
  
      $this->SetTextColor(255, 255, 255);  
      $this->SetFillColor(79,78,77);

      $this->Cell(50,10, 'Modelo', 0, 0, 'C', 1);
      $this->Cell(70,10, utf8_decode('Talla'), 0, 0, 'C', 1); 
      $this->Cell(30,10, 'Cantidad', 0, 0, 'C', 1);
      $this->Cell(30,10, 'Precio', 0, 0, 'C', 1);

      $this->Ln();
      $this->SetLineWidth(0.5); 
      $this->SetTextColor(0, 0, 0);  
      $this->SetFillColor(255,255,255);
      $this->SetFont('Arial','I',12);
      $this->SetDrawColor(80,80, 80); 
      $this->SetX(20);

      $fechaReporte = "";
      foreach ($reporteDePedidos as $key => $value) {
        $fechaReporte = substr("17/04/2021 21:00:00", 0, -8);
        $this->Cell(50,10, utf8_decode($value["nombre"]), 'B', 0, 'C', 1);
        $this->Cell(70,10, utf8_decode($value["tallas"]), 'B', 0, 'C', 1);
        $this->Cell(30,10, $value["cantidad"], 'B', 0, 'C', 1);
        $this->Cell(30,10, $value["precio"], 'B', 0, 'C', 1);
        
        $total += intval($value["precio"]);
        
        $this->Ln();
        $this->SetX(20);
      }
  
      $this->SetX(110);
      $this->SetFont('Arial','B',12);
  
      $this->Cell(110,6, 'Total:', 0, 0, 'C', 1);
      $this->SetX(170);
      $this->SetTextColor(0, 0, 0);  
      $this->SetFillColor(255,255,255);
      $this->Cell(30,6, $total, 0, 0, 'C', 1);
      
    }



    public function footer(){
      $this -> SetY(-15);
      
    }
  }
  
  $fpdf = new generarReporte();
  $fpdf ->AddPage('PORTAIT', 'letter');
  $fpdf -> body();
  $fpdf -> OutPUT();
  
  ?>