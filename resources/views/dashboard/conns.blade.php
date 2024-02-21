@extends('layouts.app')
@section('title_page')
    Configuraciónes / Conexiones
@endsection 

@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card mb-4">
        <h5 class="card-header">Detalles del Servidor</h5>
        
        <div class="card-body"> 
            {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'POST', "autocomplete" => "off"]) !!}
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="endpoint_server" class="form-label">Endpoint del servidor</label>
                    <input
                    class="form-control"
                    type="text"
                    id="endpoint_server"
                    name="endpoint_server"
                    value="{{ $data->endpoint_server }}"
                    autofocus />
                </div>  
            </div>

            <div class="row">
              <div class="mb-3 col-md-6">
                  <label for="folder_cron" class="form-label">Ruta del archivo CRON</label>
                  <input
                  class="form-control"
                  type="text"
                  id="folder_cron"
                  name="folder_cron"
                  value="{{ $data->folder_cron }}"
                  autofocus />
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