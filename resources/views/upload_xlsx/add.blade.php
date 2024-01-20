@extends('layouts.app') 
@section('title_page') Viendo /&nbsp; <strong>Agregar Elemento </strong>@endsection
    
@section('content')
    {!! Form::model($data, ['url' => [ $form_url ],'files' => true]) !!} 
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        @include('upload_xlsx.form')
    </form>
@endsection