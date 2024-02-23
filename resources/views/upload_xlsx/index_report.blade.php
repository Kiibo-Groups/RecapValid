@extends('layouts.app')
@section('title_page') Reportes @endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{Asset('assets/vendor/libs/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
@endsection

@section('content')

<div class="card py-3 m-b-30">
    <div class="card-body">
        {!! Form::open(['url' => [$form_url],'target' => '_blank'],['class' => 'col s12']) !!}

            <div class="row">
                <div class="col-md-12">
                    <label for="inputEmail4">Selecciona el tipo de reporte</label>
                    <select name="type" class="form-control">
                        <option value="all">Todos los vehiculos</option>
                        <option value="status_true">Vehiculos con póilza</option>
                        <option value="status_false">Vehiculos Sin póilza</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="inputEmail4">From Date</label>
                    {!! Form::text('from',null,['class' => 'js-datepicker form-control','required' => 'required'])!!}
                </div>

                <div class="col-md-6">
                    <label for="inputEmail4">To Date</label>
                    {!! Form::text('to',null,['class' => 'js-datepicker form-control','required' => 'required'])!!}
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <label for="inputEmail4">Tipo de reporte</label>
                        <select name="type_report" class="form-control">
                            <option value="excel">Excel</option>
                            <option value="csv">CSV</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-cta mt-3">Imprimir Reporte</button>

        </form>
    </div>
</div>

@endsection

@section('js')
    <script src="{{Asset('assets/vendor/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        /**
         * @description Initialize bootstrap datepicker
         * @param {(Element|jQuery)} [context] - A DOM Element, input tag  to use as context.
         * @requires bootstrap datepicker plugin by uxsolutions
        */
        $(".js-datepicker").datepicker();
    </script>
@endsection