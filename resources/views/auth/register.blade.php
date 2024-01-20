@extends('layouts.app')

@section('content')
<div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
                <a href="javascript:void()" class="app-brand-link gap-2">
                <span class="app-brand-text demo text-body fw-bolder">Bienvenido(a)</span>
                </a>
            </div>
            <!-- /Logo -->
            <p class="mb-4 text-center">Ingresa los accesos de SuperAdministrador

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </p>
 
            <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                <div class="mb-3 form-password-toggle">
                    <label for="password" class="form-label">Contraseña</label>

                    <div class="input-group input-group-merge">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                </div>
                
                <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Ingresar</button>
                </div>
            </form>
        </div>
      </div>
      <!-- /Register -->
    </div>
</div>
@endsection
