@extends('emails.layout')

@section('title', 'Orden Generada')

@section('header')
    <h2>Nueva Orden Generada</h2>
@endsection

@section('content')
    <p>Estimado/a {{ $name }},</p>
    <p>Se ha generado una nueva compra con los siguientes detalles:</p>
    <h3>Información del Cliente</h3>
    <p><strong>Nombre:</strong> {{ $order['name'] }} {{ $order['surname'] }}</p>
    <p><strong>Teléfono:</strong> {{ $order['phone'] }}</p>
    <p><strong>Email:</strong> {{ $order['email'] }}</p>
    <h3>Productos Comprados</h3>
    <ul>
        @foreach ($items as $item)
            <li>{{ $item['quantity'] }}x {{ $item['title'] }} - ${{ $item['unit_price'] }}</li>
        @endforeach
    </ul>
    <h3>Precio Total</h3>
    <p><strong>${{ $order['total_amount'] }}</strong></p>
@endsection

@section('footer')
    <p>Este es un correo generado automáticamente. Por favor, no responda a este mensaje.</p>
@endsection
