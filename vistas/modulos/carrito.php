
<div class="container" style="margin-top: 150px; margin-bottom: 200px;">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-9">
            <div class="ibox">
                <div class="ibox-title">
                    <span class="pull-right"> <!-- (<strong>1</strong> ) --> Articulos</span>
                    <h5>Articulos en carrito</h5>
                </div>
                <div class="mostrarCarrito">
                    
                </div>
                <div class="ibox-content">
                    <button type="button" class="btn btn-warning pull-right text-white generarPedido"><i class="fa fa fa-shopping-cart"></i> Generar Pedido</button>
                    <button class="btn btn-white retroceder"><i class="fa fa-arrow-left"></i> Continuar Comprando</button>

                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="ibox totalCarrito">
                <div class="ibox-title">
                    <h5>Resumen de la compra</h5>
                </div>
                <div class="ibox-content">
                    <span>
                        Total
                    </span>
                    <h2 class="font-bold totalPedido">
                        
                    </h2>

                    <hr>

                    <div class="m-t-sm">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary generarPedido"><i class="fa fa-shopping-cart"></i> Generar Pedido</button>
                            <!-- a href="#" class="btn btn-white "> Cancelar</a -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="ibox">
                <div class="ibox-title">
                    <h5>Soporte</h5>
                </div>
                <div class="ibox-content text-center">
                    <h3><i class="fa fa-phone"></i> +52 445 119 6663</h3>
                    <span class="small">
                        Póngase en contacto con nosotros si tiene alguna pregunta. Estamos disponibles las 24h.
                    </span>
                </div>
            </div>


        </div>
    </div>
</div>
</div>


<!-- Modal para mostrar pdf-->
<div class="modal fade" id="btnCarritoPdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ticket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <object class="PDFdoc" id="mostrarPedidopdf"  name="mostrarPedidopdf"  width="100%" height="500px" type="application/pdf" data="#"></object>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <!-- button type="button" class="btn btn-primary">Save changes</button -->
      </div>
    </div>
  </div>
</div>