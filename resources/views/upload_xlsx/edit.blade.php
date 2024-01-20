
@extends('layouts.app') 
@section('title_page') Viendo /&nbsp; <strong>Editar Elemento</strong>@endsection
    
@section('content')
    {!! Form::model($data, ['url' => $form_url,'files' => true,'method' => 'PATCH']) !!}
    <input type="hidden" value="{{$data->id}}" name="id">
        @include('upload_xlsx.form')
    </form>
@endsection