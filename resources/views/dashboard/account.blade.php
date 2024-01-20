@extends('layouts.app')
@section('title_page')
    Configuraciónes / Cuenta
@endsection 

@section('content')
<div class="row">
    <div class="col-md-12">
      
        
      <div class="card mb-4">
        <h5 class="card-header">Detalles de la cuenta</h5>
        
        <div class="card-body"> 
            {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'POST', "autocomplete" => "off"]) !!}
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="name" class="form-label">Usuario</label>
                    <input
                    class="form-control"
                    type="text"
                    id="name"
                    name="name"
                    value="{{ $data->name }}"
                    autofocus />
                </div> 
              
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input
                    class="form-control"
                    type="text"
                    id="email"
                    name="email"
                    value="{{ $data->email }}"
                    placeholder="john.doe@example.com" />
                </div>
                  
                <div class="mb-3 col-md-6">
                    <label for="new_pass" class="form-label">Nueva contraseña <small>(Solo si requiere actualizarla)</small> </label>
                    <input class="form-control" type="password" id="new_pass" name="new_pass" autocomplete="false" readonly onfocus="this.removeAttribute('readonly');" onblur="this.addAttribute('readonly');" />
                </div> 
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-primary me-2">Guardar cambios</button>
            </div>
          </form>
        </div>
        <!-- /Account -->
      </div>
       
    </div>
  </div>
@endsection