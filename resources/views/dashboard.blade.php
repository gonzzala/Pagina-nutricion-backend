@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
    {{ __('Panel de administracion') }}
</h2>
@stop

@section('content')
<div class="pb-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <p class="text-center">Hola {{ auth()->user()->name }}, bienvenido/a a tu panel de administración. <br>
                    En la barra de navegación podrás gestionar los productos, administradores e información de la cuenta. <br>
                    Tambien podrás observar información relacionada con las compras
                </p>
            </div>
        </div>
    </div>
    </div>
    
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop
