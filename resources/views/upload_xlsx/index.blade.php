@extends('layouts.app')
@section('title_page') Viendo /&nbsp; <strong>Listado de automovíles </strong>@endsection
    
@section('content') 

<!-- Basic Bootstrap Table -->
<div class="card">

    <div class="card-header d-flex align-items-center justify-content-between">
        <small class="list-group-item list-group-item-danger">
            IMPORTANTE! Todos los días a las 12 a.m. se realizan 10,000 peticiones a los servidores de amis.com.mx
            <br />
            Los elementos que subas se sumaran a la Pila de consultas diarias...
        </small>
    </div>
    
    <div class="card-header d-flex align-items-center justify-content-between">

        <h5 class="mb-0">Busqueda avanzada</h5>
        <section class="float-end">
            <a href="{{ route('upload_file') }}" type="button" class="btn btn-primary ">
                <i class='tf-icons bx bxs-file-json'></i>&nbsp; Subir Xlsx
            </a> 
            <a href="{{ Asset($link . 'create') }}" type="button" class="btn btn-success ">
                <i class='tf-icons bx bxs-file-plus'></i>&nbsp; Agregar elemento
            </a>
        </section>
    </div>

    <form class="card-body">
        <div class="row mb-3"> 
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="input-group">
                    <label class="input-group-text" for="inputGroupSelect01">VIN</label>
                    <input type="text" class="form-control" id="basic-default-name" placeholder="Ingresa el VIN a buscar" />
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="input-group">
                    <label class="input-group-text" for="inputGroupSelect01">Municipio</label>
                    <select class="form-select" id="inputGroupSelect01">
                        <option selected>Selecciona...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="input-group">
                    <label class="input-group-text" for="inputGroupSelect01">Colonia</label>
                    <select class="form-select" id="inputGroupSelect01">
                        <option selected>Selecciona...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
        </div> 
    </form>

    <div class="card-body">
        <div class="row mb-3">
            {!! $data->appends(request()->except('page'))->links() !!}
        </div>
    </div>

    <div class="text-nowrap table-responsive">
      <table class="table-responsive table">
        <thead>
          <tr>
            <th>#</th>
            <th>Municipio</th>
            <th>Colonia</th>
            <th>VIN</th>
            <th>Placa</th>
            <th>Adeudo</th>
            <th>Status</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($data as $row)
            <tr class="text-nowrap">
                <th scope="row">{{ $row->id }}</th>
                <td>
                    {{ $row->municipio }}
                </td>
                <td>
                    {{ $row->colonia }}
                </td> 
                <td>
                    {{ $row->vin }}
                </td>
                <td>
                    {{ $row->placa }}
                </td>
                <td>
                    {{ $row->adeudo }}
                </td> 
                <td>
                    {{-- Sin consultar --}}
                    @if ($row->status == 0)
                    <span class="badge bg-label-danger me-1">Sin consultar</span>
                    
                    {{-- Consultado pero sin data --}}
                    @elseif($row->status == 1)
                    <span class="badge bg-label-warning me-1">Sin información</span>
                    
                    {{-- Consultado y con data --}}
                    @elseif($row->status == 2)
                    <span class="badge bg-label-success me-1">Data Lista</span>
                    @endif
                </td>
                <td>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ Asset($link . $row->id . '/edit') }}" >
                            <i class="bx bx-edit-alt me-1"></i> Edit
                        </a>
                        <a class="dropdown-item" href="javascript:void(0);" onclick="deleteConfirm('{{ Asset($link . 'delete/' . $row->id) }}')">
                            <i class="bx bx-trash me-1"></i> Delete
                        </a>
                    </div>
                </div>
                </td>
            </tr> 
            @endforeach
        </tbody>
      </table>
    </div>
</div>

  
<section style="margin-top:25px;">
    {!! $data->appends(request()->except('page'))->links() !!}
</section>
  <!--/ Basic Bootstrap Table -->
@endsection