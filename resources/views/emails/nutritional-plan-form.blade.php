<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Plan nutricional</title>
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
            <h2>Formulario para la creación del Plan Personalizado</h2>
        </div>
        <div class="content">
            <p>Hola {{ $order->name }},</p>
            <p>Muchas gracias por confiar en nosotros y haber realizado la compra de un plan de nutrición personalizado.</p><br>
            <p>A continuación encontrarás el link al formulario que contiene las preguntas necesarias para la creación del plan. Tomate tu tiempo para contestarlas de la mejor manera posible, solo te tomará algunos minutos:</p><br>
            <a href="{{ $formLink }}" target="_blank">Formulario</a>
        <div class="footer">
            <p>Este es un correo generado automáticamente. Por favor, no responda a este mensaje.</p>
        </div>
    </div>
</body>
</html>
