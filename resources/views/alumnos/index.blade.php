@extends('layouts.app')

@section('content')
	<h3>Escuela/Alumnos</h3>
    
        <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#altaAlumnosModal">Agregar</a>
    
    <table class="table table-dark table-hover">
                    <head>
                    <br><br>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Fecha de nacimiento</th>
                            <th>Acciones</th>
                        </tr>
                    </head>
                    <body>
                        @foreach($alumnos as $alu)
                            <tr>
                                <td>{{$alu->id}}</td>
                                <td>{{$alu->nombre}}</td>
                                <td>{{$alu->direccion}}</td>
                                <td>{{$alu->telefono}}</td>
                                <td>{{$alu->fec_nac}}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#modificacionAlumnosModal" onclick="llenaUpdate(
                                        {{$alu->id}},
                                        '{{$alu->nombre}}',
                                        '{{$alu->direccion}}',
                                        '{{$alu->telefono}}',
                                        '{{$alu->fec_nac}}'

                                    )"><i class='fas fa-user-edit' style='font-size:16px'></i></button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#bajasAlumnosModal"
                                    onclick="llenaDelete({{$alu->id}},'{{$alu->nombre}})'"><i class="material-icons" style="font-size:16px">delete</i></button>
                                </td>
                            </tr>
                        @endforeach
                    </body>
    </table>

    <div class="row">
    	<div class="col-sm-5"></div>
    	<div class="col-sm-2">
    		{{ $alumnos->links() }}
    	</div>
    	<div class="col-sm-5"></div>
    </div>

    <!-- Modal de altas -->
  <div class="modal fade" id="altaAlumnosModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Alta de alumnos</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form action="{{route('alumnos.altas')}}">
        <!-- Modal body -->
        <div class="modal-body">
        <div class="input-group mb-3 input-group-sm">
				    <div class="input-group-prepend">
				       <span class="input-group-text">Nombre</span>
				    </div>
				    <input type="text" class="form-control" name="nombre">
				</div>

				<div class="input-group mb-3 input-group-sm">
				    <div class="input-group-prepend">
				       <span class="input-group-text">Dirección</span>
				    </div>
				    <input type="text" class="form-control" name="direccion">
				</div>

				<div class="input-group mb-3 input-group-sm">
				    <div class="input-group-prepend">
				       <span class="input-group-text">Telefono</span>
				    </div>
				    <input type="text" class="form-control" name="telefono">
				</div>

				<div class="input-group mb-3 input-group-sm">
				    <div class="input-group-prepend">
				       <span class="input-group-text">Fecha de nacimiento</span>
				    </div>
				    <input type="date" class="form-control" name="fec_nac">
				</div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
		        	<button type="submit" class="btn btn-primary">Guardar</button>
		          	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>

        </form>
        
      </div>
    </div>
  </div>


<!--******************************************************************-->
<!-- Modal de modificacion -->
<div class="modal fade" id="modificacionAlumnosModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modificacion de alumnos</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form id="updateForm">
        <!-- Modal body -->
        <div class="modal-body">
        <div class="input-group mb-3 input-group-sm">
				    <div class="input-group-prepend">
				       <span class="input-group-text">Nombre</span>
				    </div>
				    <input type="text" class="form-control" name="nombre" id="nombre">
				</div>

				<div class="input-group mb-3 input-group-sm">
				    <div class="input-group-prepend">
				       <span class="input-group-text">Dirección</span>
				    </div>
				    <input type="text" class="form-control" name="direccion" id="direccion">
				</div>

				<div class="input-group mb-3 input-group-sm">
				    <div class="input-group-prepend">
				       <span class="input-group-text">Telefono</span>
				    </div>
				    <input type="text" class="form-control" name="telefono" id="telefono">
				</div>

				<div class="input-group mb-3 input-group-sm">
				    <div class="input-group-prepend">
				       <span class="input-group-text">Fecha de nacimiento</span>
				    </div>
				    <input type="date" class="form-control" name="fec_nac" id="fec_nac">
				</div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
		        	<button type="submit" class="btn btn-primary">Guardar</button>
		          	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>

        </form>
        
      </div>
    </div>
  </div>



<!--******************************************************************-->
<!-- Modal de Eliminar -->
<div class="modal fade" id="bajasAlumnosModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Baja de alumnos</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form id="deleteForm">
        <!-- Modal body -->
        <div class="modal-body">
            <h3>¿Estas seguro de eliminar el alumno: ?</h3>
            <h5><b id="nom"></b> </h5>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
		        	<button type="submit" class="btn btn-primary">Eliminar</button>
		          	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>

        </form>
        
      </div>
    </div>
  </div>

@endsection

@section ('js')
    <script>
        function llenaUpdate(id,nom,dir,tel,fn)
        {
            document.getElementById('nombre').value=nom;
            document.getElementById('direccion').value=dir;
            document.getElementById('telefono').value=tel;
            document.getElementById('fec_nac').value=fn;
            
            r="update/"+id;
			$('#updateForm').attr('action', r);
        }


        function llenaDelete(id,nom)
        {
          document.getElementById('nom').innerHTML=nom;

          r="delete/"+id;
          $('#deleteForm').attr('action', r);
        }


    </script>
@endsection