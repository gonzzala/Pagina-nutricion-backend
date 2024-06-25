@extends('adminlte::page')

@section('title', 'Administradores')

@section('content_header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
         {{ __('Administradores') }}
    </h2>
@stop

@section('content')

@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success')}}
</div>
@endif

<div class="pb-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pb-">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
        <div class="max-w-xl">
            @include('admins.partials.create-admin-form')
        </div>
    </div>

    <div class="pt-8">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            @include('admins.partials.show-admins-table')
        </div>
    </div>
</div>
</div>

@stop

@section('css')
   @vite(['resources/css/app.css', 'resources/js/app.js'])
   
@stop