@extends('emails.layout')

@section('title', 'Mensaje')

@section('header')
    <h2>Nuevo mensaje de contacto</h2>
@endsection

@section('content')
    <p>Hola, has recibido un nuevo mensaje desde la web</p><br>
    <p><strong>Nombre:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Mensaje:</strong> {{ $messageContent }}</p>
@endsection

@section('footer')
    <p>Este es un correo generado automáticamente. Por favor, no responda a este mensaje.</p>
@endsection
