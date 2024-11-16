# Pizza Order Service

Este proyecto proporciona un servicio web para realizar pedidos de pizza. Permite a los usuarios crear pizzas personalizadas o elegir entre recetas preestablecidas. También se implementan descuentos según el día de la semana, como 2x1 los martes y miércoles, y delivery gratuito los jueves.

## Requisitos previos

Antes de comenzar, asegúrate de tener las siguientes herramientas instaladas:

- **PHP** (versión 7.4 o superior). Puedes instalarlo con [Homebrew](https://brew.sh/) en macOS o [XAMPP](https://www.apachefriends.org/index.html) en Windows.
- **Composer**: Gestor de dependencias para PHP. Si no lo tienes instalado, puedes instalarlo desde [aquí](https://getcomposer.org/download/).

## Instalación

1. Clonar el repositorio

Primero, clona este repositorio en tu máquina local:

```bash
git clone https://github.com/jahsscz/pizza-order-service.git
cd pizza-order-service

2. Instalar dependencias

En la raíz del proyecto, instala las dependencias necesarias utilizando Composer:

composer install

Esto descargará todas las dependencias necesarias (como slim/slim, php-di/php-di, etc.) y generará la carpeta vendor con el archivo autoload.php.
3. Iniciar el servidor

Para iniciar el servidor embebido de PHP, ejecuta:

php -S localhost:8080 -t public

Esto iniciará el servidor en http://localhost:8080, que será la URL donde puedes acceder a la aplicación.
Endpoints Disponibles
1. GET /api/pizzas

Obtiene todas las pizzas disponibles, tanto personalizadas como recetas predefinidas.
Respuesta Esperada

{
  "pizzas": [
    {
      "id": 1,
      "name": "Pizza Margherita",
      "price": 12.99
    },
    {
      "id": 2,
      "name": "Pizza Pepperoni",
      "price": 14.99
    },
    {
      "id": 3,
      "name": "Pizza Vegetariana",
      "price": 13.49
    }
  ]
}

2. POST /api/order

Realiza un pedido de pizza. Los usuarios pueden elegir una pizza personalizada o seleccionar una receta predefinida. Si es una pizza personalizada, deben proporcionar los ingredientes.
Parámetros

{
  "pizza": {
    "name": "Pizza Personalizada",
    "ingredients": ["Tomate", "Queso", "Jamon"],
    "size": "M"
  },
  "delivery_day": "martes"
}

Respuesta Esperada

Si el pedido es exitoso:

{
  "message": "Pedido realizado con éxito",
  "total_price": 12.99
}

Cálculo de Precios y Descuentos:

    Martes y Miércoles: 2x1 en todas las pizzas.
    Jueves: Delivery gratuito.

Si el día es martes o miércoles y se realiza un pedido de una pizza con un precio de 12.99, el precio total será 12.99.

Si el pedido es realizado un jueves, se aplicará el descuento en el costo del delivery (si corresponde).
Casos de prueba:

    Petición de pizza predefinida (Pizza Margherita) un día jueves.

    Solicitud:

{
  "pizza": {
    "id": 1
  },
  "delivery_day": "jueves"
}

Respuesta esperada:

{
  "message": "Pedido realizado con éxito",
  "total_price": 12.99
}

Pedido de pizza personalizada (Martes o Miércoles) con 2x1.

Solicitud:

{
  "pizza": {
    "name": "Pizza Personalizada",
    "ingredients": ["Tomate", "Queso", "Jamon"],
    "size": "M"
  },
  "delivery_day": "martes"
}

Respuesta esperada:

    {
      "message": "Pedido realizado con éxito",
      "total_price": 12.99
    }

3. GET /api/order/{id}

Obtiene información sobre un pedido específico.
Parámetros

    id (required): ID del pedido.

Respuesta Esperada

{
  "id": 1,
  "pizza": {
    "name": "Pizza Margherita",
    "price": 12.99
  },
  "delivery_day": "martes",
  "total_price": 12.99
}

Cómo funciona el sistema

    Pizzas Personalizadas: El usuario puede seleccionar los ingredientes para crear su propia pizza. Los ingredientes válidos incluyen tomate, queso, jamón, pepperoni, etc.
    Pizzas Predefinidas: El sistema también ofrece algunas pizzas predefinidas, como Margherita, Pepperoni, y Vegetariana.
    Descuentos: Se aplica un descuento en el precio en los siguientes casos:
        2x1: Si el pedido se realiza un martes o miércoles.
        Delivery gratuito: Si el pedido se realiza un jueves.
    Cálculo de Precio: El precio de la pizza depende de su tamaño y de si el usuario ha elegido una pizza predefinida o personalizada.

