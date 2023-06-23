@component('mail::message')
# Cotización

Hola {{ $name }},

**Título:** {{ $title }}

**Descripción:** {{ $description }}

Gracias por tu interés en nuestros servicios.

Saludos,<br>
{{ config('app.name') }}
@endcomponent
