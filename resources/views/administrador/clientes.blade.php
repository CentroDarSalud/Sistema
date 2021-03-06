@extends('../admin')
@section('contenido')
<script type="text/javascript" language="javascript" class="init">
            $(document).ready(function() {
    $('#example3').DataTable();
} );
        </script>
<div class="col-lg-10 panel panel-danger" style="width:100%; background:#; margin-top:1%; padding:10px;">
<fieldset class="form-group">
  <legend>Clientes</legend>

<table id="example3" class="table table-hover" style="float:left;">
  <thead >
    <tr>
      <th>Nombre</th>
      <th>Carnet</th>
      <th>Fecha de nacimiento</th>
      <th data-orderable="false"> </th>
    </tr>
  </thead>

  <tbody style="font-size:11px;">
    <tr class="table table-hover">
    <?php
          foreach ($clientes as $cliente):
          ?>
            <th>{{$cliente->NOM_PAC.' '.$cliente->APA_PAC.' '.$cliente->AMA_PAC}}</th>
            <th>{{$cliente->CI_PAC}}</th>
            <th>{{$cliente->FEC_PAC}}</th>
            <th style=" width:85px; "><button data-toggle = "modal" data-target = "#myModal2" onclick="modificar(<?php echo "'$cliente->NOM_CLI'".','."'$cliente->APA_CLI'".','."'$cliente->AMA_CLI'".','."'$cliente->TEL_CLI'".','."'$cliente->EMA_CLI'".','."'$cliente->DIR_CLI'".','."'$cliente->id"."'";?>);" class="btn btn-primary" title="Modificar datos de cliente"> <span class="glyphicon glyphicon-pencil" style="font-size:12px;"> </span> </button> <button data-toggle = "modal" data-target = "#myModal3" onClick="eliminar(<?php echo $cliente->id;?>);" class="btn btn-danger" title="Eliminar cliente"> <span class="glyphicon glyphicon-trash"  style="font-size:12px;"></span> </button> </th>

              </tr>       </th>

              </tr>
        <?php endforeach;
        ?>

  </tbody>
</table>
</fieldset>
</div>
<div class = "modal fade" id = "myModal2" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">

   <div class = "modal-dialog">
      <div class = "modal-content">

         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>

            <h4 class = "modal-title" id = "myModalLabel">
               Modificar cliente
            </h4>
         </div>
         <div class = "modal-body">
         		<form class="form-horizontal" method="POST" action="modifcli">
				 <input type="hidden" id="idcli" name="idcli" />
				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
          <label for="ejemplo_email_3" class="col-lg-3 control-label">Nombre</label>
          <div class="col-lg-9">
            <input type="text" name="nom_usu"  class="form-control" id="nomcli"
                   placeholder="Nombre del cliente">
          </div>
        </div>
         <div class="form-group">
          <label for="ejemplo_password_3" class="col-lg-3 control-label">Apellido paterno</label>
          <div class="col-lg-9">
            <input type="text" name="apa_usu"  class="form-control" id="apacli"
                   placeholder="Apellido paterno">
          </div>
          </div>
          <div class="form-group">
          <label for="ejemplo_email_3" class="col-lg-3 control-label">Apellido materno</label>
          <div class="col-lg-9">
            <input type="text" name="ama_usu" class="form-control"  id="amacli"
                   placeholder="Apellido materno">
          </div>
          </div>
          <div class="form-group">
          <label for="ejemplo_email_3" class="col-lg-3 control-label">Telefono</label>
          <div class="col-lg-9">
            <input type="tel"  name="tel_usu" class="form-control" id="telcli"
                   placeholder="Telefono del cliente">

          </div>
          </div>
          <div class="form-group">
          <label for="ejemplo_email_3" class="col-lg-3 control-label">E-mail</label>
          <div class="col-lg-9">
            <input type="email" name="ema_usu"  class="form-control" id="emacli"
                   placeholder="Direccion e-mail del cliente">

          </div>
          </div>

          <div class="form-group">
          <label for="ejemplo_email_3" class="col-lg-3 control-label">Direccion</label>
          <div class="col-lg-9">
          <textarea type="text" name="dir_usu" class="form-control" id="dircli"
                   placeholder="Direccion de cliente"></textarea>
          </div>
          </div>

         <input type="hidden" id="idalm">
         <div class = "modal-footer" style="border-top: 0;">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><span class="glyphicon glyphicon-remove" style="font-size: 10px;"></span>
               Cancelar
            </button>

            <button type = "submit" class = "btn btn-primary"><span style="font-size: 10px;" class="glyphicon glyphicon-plus"></span>
               Registrar
            </button>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
  </div>
</div>
<div class = "modal fade" id = "myModal3" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">

   <div class = "modal-dialog">
      <div class = "modal-content">

         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               Confirmar eliminacion
            </h4>
         </div>
         <form action="elicli" method="POST">
         <div class = "modal-body">
         <input type="hidden" id="ideli" name="ideli">
            <div class=" ">Desea eliminar el elemento?</div>

         <div class = "modal-footer" style="border-top: none;">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><span class="glyphicon glyphicon-remove" style="font-size: 10px; "></span>
               Cancelar
            </button>

            <button type = "submit" class = "btn btn-primary"> <span style="font-size: 10px; " class="glyphicon glyphicon-plus"></span>
               Aceptar
            </button>
         </div>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->

</div><!-- /.modal -->

<div class = "modal fade" id = "myModal4" tabindex = "-1" role = "dialog"
   aria-labelledby = "myModalLabel" aria-hidden = "true">

   <div class = "modal-dialog">
      <div class = "modal-content">

         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <h4 class = "modal-title" id = "myModalLabel">
               Cambio de contraseña de usuario
            </h4>
         </div>
         <form action="mcousu" method="POST">
         <div class = "modal-body">
         <input type="hidden" id="idcon" name="idcon">
         <div class="form-group">
              <label class="col-lg-3 control-label">Nueva contraseña :</label>
            <div class="col-md-8">
               <input type="password" required class="form-control" name="conusu" id="conusu">
            </div>
            </div>
         <div class = "modal-footer" style="border-top: none;">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal"><span class="glyphicon glyphicon-remove" style="font-size: 10px; "></span>
               Cancelar
            </button>

            <button type = "submit" class = "btn btn-primary"> <span style="font-size: 10px; " class="glyphicon glyphicon-plus"></span>
               Aceptar
            </button>
         </div>
         </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->

</div><!-- /.modal -->
  </div>
</div>
@stop
