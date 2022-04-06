<div class="row">
    <div class="col-6">
        <div class="">
            <div class="form-group">
                <label>Nombre <span class="required">*</span></label>
                <input type="text" name="nombre" required class="form-control" value="">
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Apellido <span class="required">*</span></label>
                <input type="text" required name="apellido" class="form-control">
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Teléfono <span class="required">*</span></label>
                <input type="text" class="form-control" name="telefono" required>
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Email <span class="required">*</span></label>
                <input type="email" class="form-control" name="email" required>
            </div>
        </div> 
    </div>
    @if (Session::has('idenvio'))
    @if (session('idenvio') != 1)
    <div class="col-6" id="datosdeenvio" style="display: block;">
    @else
    <div class="col-6" id="datosdeenvio" style="display: none;">
    @endif
    @else
    <div class="col-6" id="datosdeenvio" style="display: none;">
    @endif
        <div class="">
            <div class="form-group">
                <label>Departamento <span class="required">*</span></label>
                <select name="departamento" id="" class="form-control">
                    @foreach ($departamentos as $departamento)       
                    <option value="{{$departamento->id}}">{{$departamento->nombre}}</option>
                  
                    @endforeach
                </select>
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Distrito <span class="required">*</span></label>
                <select name="distrito" id="" class="form-control">
                    @foreach ($distritos as $distrito)       
                    <option value="{{$distrito->id}}">{{$distrito->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Dirección <span class="required">*</span></label>
                <input type="text" name="direccion"  class="form-control" placeholder="Av. Tawaintinsuyo 444">
            </div>
        </div>
        <div class="">
            <div class="form-group">
                <label>Referencia <span class="required">*</span></label>
                <input type="text" name="referencia" class="form-control" placeholder="Frente al parque">
            </div>
        </div>
    </div>
</div>