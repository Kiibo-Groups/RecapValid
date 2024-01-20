@extends('layouts.app') 
@section('title_page') Viendo /&nbsp; <strong>Agregar Archivo XLSX </strong>@endsection
    
@section('content')
    {!! Form::model($data, ['url' => [ $form_url ],'files' => true]) !!} 
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <!-- Start Content-->
        <div class="card">   
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="file" class="form-label">
                            Selecciona tu Archivo
                        </label>
                        <input type="file" name="file" id="file" class="form-control" required="required" 
                        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                        <br />
                        <small class="list-group-item list-group-item-danger">
                            * El archivo debe pesar menos de 520KB de 4 a 5mil Filas
                            <br />No se tomara en cuenta la Fila #1
                        </small>
                    </div>
                </div>
            </div>

            <div class="mt-5" style="justify-items: end;display: grid;padding:20px;">
                <button type="submit" class="btn btn-primary mb-2 btn-pill">
                    Subir archivo
                </button>
            </div>
        </div>
    </form>
@endsection