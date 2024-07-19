@extends('emails.layout')

@section('title', 'Plan nutricional')

@section('header')
    <h2>Formulario para la creación del Plan Personalizado</h2>
@endsection

@section('content')
    <p>Hola {{ $order->name }},</p>
    <p>Muchas gracias por confiar en nosotros y haber realizado la compra de un plan de nutrición personalizado.</p><br>
    <p>A continuación encontrarás el link al formulario que contiene las preguntas necesarias para la creación del plan. Tomate tu tiempo para contestarlas de la mejor manera posible, solo te tomará algunos minutos:</p><br>
    <a href="{{ $formLink }}" target="_blank">Formulario</a>
@endsection

@section('footer')
    <p>Este es un correo generado automáticamente. Por favor, no responda a este mensaje.</p>
@endsection
