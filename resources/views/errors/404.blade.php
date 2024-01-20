@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-misc.css') }}" />
@endsection  


@section('content')
<!-- Error -->
<div class="misc-wrapper">
    <h2 class="mb-2 mx-2">Página no encontrada :(</h2>
    <p class="mb-4 mx-2">Oops! 😖 La URL solicitada no se encontró en este servidor.</p>
    <a href="{{ route('home') }}" class="btn btn-primary">Volver al inicio</a>
    <div class="mt-3">
      <img src="{{ asset('assets/img/illustrations/page-misc-error-light.png') }}"
        alt="Error, Página no encontrada"
        width="500"
        class="img-fluid" />
    </div>
</div>
  <!-- /Error -->
@endsection
