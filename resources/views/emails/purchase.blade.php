<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Orden Generada</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 20px;
            border: 1px solid #ddd;
            margin: 0 auto;
            max-width: 600px;
        }
        .header {
            text-align: center;
            background-color: #f8f8f8;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }
        .content {
            padding: 10px 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Nueva Orden Generada</h2>
        </div>
        <div class="content">
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
        </div>
        <div class="footer">
            <p>Este es un correo generado automáticamente. Por favor, no responda a este mensaje.</p>
        </div>
    </div>
</body>
</html>
