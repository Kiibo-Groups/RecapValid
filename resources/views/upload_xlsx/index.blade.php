@extends('layouts.app')
@section('title_page') Viendo /&nbsp; <strong>Listado de automovíles </strong>@endsection
    
@section('css')
    <!-- Tablesaw css
    <link href="{{ asset('assets/vendor/libs/tablesaw/tablesaw.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('assets/vendor/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    
    <link href="{{ asset('assets/css/config/default/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{ asset('assets/css/config/default/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{ asset('assets/css/config/default/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled="disabled" />
    <link href="{{ asset('assets/css/config/default/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled="disabled" />
 -->
@endsection
@section('content') 

<!-- Basic Bootstrap Table --> 
<div class="card py-3 m-b-30">
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

    <div class="card-body">
        <div class="row">  
            <form action="{{ route('upload_xlsx.FilexSearchCats') }}" method="POST" class="row">
                @csrf
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="input-group">
                        <label class="input-group-text" for="MunicipiosGroup">Municipio</label>
                        <select class="form-select" name="municipio" id="MunicipiosGroup">
                            @if (isset($municipio) && $municipio != 'null')
                                <option value="null">Selecciona...</option>
                                <option selected value="{{ $municipio }}">{{ $municipio }}</option>
                            @else 
                                <option selected value="null">Selecciona...</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="input-group">
                        <label class="input-group-text" for="ColoniasGroup">Colonia</label>
                        <select class="form-select" name="colonia" id="ColoniasGroup">
                            @if (isset($colonia) && $colonia != 'null')
                                <option value="null">Selecciona...</option>
                                <option selected value="{{ $colonia }}">{{ $colonia }}</option>
                            @else 
                                <option selected value="null">Selecciona...</option>
                            @endif
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="input-group">
                        <button class="btn btn-success" id="btn_search" disabled>Realizar busqueda</button>
                    </div>
                </div>
            </form>
        </div> 
    </div>

    <div class="card-body">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="input-group">
                <label class="input-group-text" for="VinSearchGroup">VIN</label>
                <input type="text" class="form-control" id="VinSearchGroup" placeholder="Ingresa el VIN a buscar" />
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12  mt-3">
            {!! $data->appends(request()->except('page'))->links() !!}
        </div>
        
    </div>

    <div class="card-body">
        <div class="text-nowrap table-responsive">
            <table id="table-filex" class="table-responsive table" data-tablesaw-sortable data-tablesaw-sortable-switch>
            <thead>
                <tr>
                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">#</th>
                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Municipio</th>
                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Colonia</th>
                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">VIN</th>
                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Placa</th>
                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">Adeudo</th>
                <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">Status</th>
                <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                <tr>
                    <th>{{ $row->id }}</th>
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
                            @if($row->status == 2)
                            {!! Form::open(['url' => ['upload_xlsx/download_info'],'target' => '_blank'],['class' => 'col s12']) !!}
                                <button class="dropdown-item">
                                    <input type="hidden" name="id" value="{{ $row->id }}">
                                    <i class="bx bx-download me-1"></i> Descargar Info
                                </button>
                            </form>
                            @endif
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
</div>

 
<section style="margin-top:25px;">
    {!! $data->appends(request()->except('page'))->links() !!}
</section>
  <!--/ Basic Bootstrap Table -->
@endsection

@section('js') 
    <script>
        (async() => {
            
            'use strict';


            var MunicipiosGroup = document.querySelector("#MunicipiosGroup");
            var ColoniasGroup = document.getElementById("ColoniasGroup");

            // Solicitamos Info
            fetch("{{ route('upload_xlsx.getAllFilex') }}")
            .then(response => {
                if (!response.ok) {
                    throw new Error(response.statusText)
                } 
                return response.json()
            })
            .then(data => {
                let municipios = data.municipios;
                let colonias   = data.colonias;
 
                municipios.map((item) => { 
                    var option = document.createElement("option"); 
                    option.text = item.municipio;
                    option.value = item.municipio;

                    MunicipiosGroup.add(option);
                });
 
                colonias.map((item) => { 
                    var option = document.createElement("option");
                    option.text = item.colonia;
                    option.value = item.colonia;

                    ColoniasGroup.add(option);
                });
            })
            .catch(error => {
                Swal.fire(`Request failed: ${error}`);
            });


            /**
             * 
             * Validamos si se relleno algun input para realizar busqueda
             *  
            */
            MunicipiosGroup.addEventListener("change", (event) => {
               if (event.target.value != 'null') {
                console.log(event.target.value);
                document.getElementById('btn_search').disabled = false;
               }else {
                if (ColoniasGroup.value == 'null') {
                    document.getElementById('btn_search').disabled = true;
                }
               }
            });
            
            ColoniasGroup.addEventListener("change", (event) => {
               if (event.target.value != 'null') {
                console.log(event.target.value);
                document.getElementById('btn_search').disabled = false;
               }else {
                if (MunicipiosGroup.value == 'null') {
                    document.getElementById('btn_search').disabled = true;
                }
               }
            });


            /**
             * 
             * Busqueda avanzada
             *  1C4RJYB62P8787601
            */
            let FilexAll;
            $(document).ready(function(){
                $("#VinSearchGroup").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    // Realizamos peticion a la BD
                    postData("{{ route('upload_xlsx.FilexSerach') }}", { search: value }).then((data) => {
                        console.log(data); 
                        $("#table-filex tbody").html(data.data)
                    });
                });
            });


            // Example POST method implementation:
            async function postData(url = "", data = {}) {
                const token = document.head.querySelector("[name~=csrf-token][content]").content;

                // Default options are marked with *
                const response = await fetch(url, {
                    method: "POST", // *GET, POST, PUT, DELETE, etc.
                    mode: "cors", // no-cors, *cors, same-origin
                    cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
                    credentials: "same-origin", // include, *same-origin, omit
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-Token": token
                    },
                    redirect: "follow", // manual, *follow, error
                    referrerPolicy: "no-referrer", // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                    body: JSON.stringify(data), // body data type must match "Content-Type" header
                });
                return response.json(); // parses JSON response into native JavaScript objects
            }
        })();
    </script>
@endsection