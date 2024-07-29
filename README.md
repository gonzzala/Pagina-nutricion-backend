# Backend de E-commerce con Laravel

Este es el backend del proyecto freelance de e-commerce para la venta de productos relacionados con la nutricion y el ejerciocio, desarrollado con Laravel. Proporciona una API para gestionar productos, carritos de compras, órdenes y la integración con MercadoPago. Además, incluye un panel de administración integrado en la estructura monolito.

## Características

-   **API RESTful** para la gestión de productos, carritos y órdenes.
-   **Autenticación** de administradores con Laravel Breeze.
-   **Panel de administración** con AdminLTE que cuenta con lo necesario para gestionar administradores, productos, información de la cuenta, y obtener información relacionada con las ventas.
-   **Integración con MercadoPago** para pagos en línea.
-   **Notificaciones por correo con información relevante** a los administradores cuando un usuario envía un mensaje, o se realiza una compra.
    **Envío de correo** a los usuarios en los que su compra contenga un plan nutricional, con la redirección hacia el formulario con las preguntas.
    **Uso de Google Forms** para las preguntas relacionadas con la personalización del plan nutricional.
-   **Validación de emails** con Laravel Disposable Email para evitar el uso de correos temporales.

## Requisitos

-   PHP 8.2 o superior
-   Composer
-   Node.js y npm/yarn
-   MySQL

## Instalación

1. Clona el repositorio:

    ```sh
    git clone https://github.com/gonzzala/Pagina-nutricion-backend.git
    cd Pagina-nutricion-backend
    ```

2. Instala las dependencias de PHP con Composer:

    ```sh
    composer install
    ```

3. Copia el archivo `.env.example` a `.env` y configura las variables de entorno:

    ```sh
    cp .env.example .env
    ```

4. Genera la clave de la aplicación:

    ```sh
    php artisan key:generate
    ```

5. Configura la conexión a la base de datos en el archivo `.env`.

6. Ejecuta las migraciones y los seeders:

    ```sh
    php artisan migrate --seed
    ```

7. Instala las dependencias de Node.js con npm o yarn:

    ```sh
    npm install
    # o
    yarn install
    ```

8. Compila los assets del panel de administración:

    ```sh
    npm run dev
    # o
    yarn dev
    ```

9. Inicia el servidor de desarrollo:
    ```sh
    php artisan serve
    ```

## Integración con MercadoPago

Para integrar las funcionalidades de MercadoPago:

1. Si no la tienes ya instalada, instala la SDK de MercadoPago:

    ```sh
    composer require mercadopago/dx-php
    ```

2. Configura las credenciales de MercadoPago en tu archivo `.env`:

    ```sh
    MERCADOPAGO_SECRET_KEY=tu_secret_key
    MERCADOPAGO_ACCESS_TOKEN=tu_access_token
    ```

3. Implementa el procesamiento de pagos en tu controlador de Laravel.

## Despliegue

Asegúrate de tener configurado el entorno de producción en Laravel (`APP_ENV=production` en el archivo `.env`) y el APP_DEBUG en falso (`APP_DEBUG`=false). En este caso, la aplicacion está servida a través de la plataforma Railway

## Licencia

Este proyecto está licenciado bajo la Licencia MIT. Ver el archivo [LICENSE](LICENSE) para más detalles.

## Contacto

Si tienes alguna pregunta o sugerencia, no dudes en contactarme a [gonzzalorodriguez13@gmail.com](mailto:gonzzalorodriguez13@gmail.com).
