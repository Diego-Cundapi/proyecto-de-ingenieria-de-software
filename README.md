# Proyecto de Ingeniería de Software - Tienda Ecommerce Refaccionaria ALA

Este proyecto consiste en el desarrollo de una tienda en línea para la Refaccionaria ALA, especializada en la venta de refacciones para automóviles. El sistema incluye funcionalidades clave tanto para clientes como para administradores:

- **Autenticación de usuarios**: Registro e inicio de sesión con diferentes roles y permisos.
- **Carrito de compras**: Los usuarios pueden añadir productos al carrito y proceder con la compra.
- **Gestión de inventario**: Herramienta para que el administrador controle el stock de refacciones.
- **Ventas y compras**: Los administradores pueden gestionar las ventas, mientras que los clientes pueden realizar compras de forma sencilla.

## Tecnologías utilizadas

- **HTML**: Para la estructura y contenido del sitio web.
- **Tailwind CSS**: Para el diseño responsivo y estilizado del frontend.
- **PHP 8.0.2**: Para la lógica backend.
- **Laravel 9**: Framework utilizado para la estructura del proyecto, manejo de rutas, controladores, y funcionalidades avanzadas.

## Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/Diego-Cundapi/proyecto-de-ingenieria-de-software.git
   ```
2. Navega al directorio del proyecto:
   ```bash
   cd proyecto-de-ingenieria-de-software
   ```
3. Instala las dependencias:
   ```bash
   composer install
   npm install
   ```
4. Configura el archivo `.env`:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
5. Ejecuta las migraciones de la base de datos:
   ```bash
   php artisan migrate
   ```

## Uso

Para iniciar el servidor de desarrollo, ejecuta:
```bash
php artisan serve
```
Luego, abre [http://localhost:8000](http://localhost:8000) en tu navegador.

## Contribuir

¡Gracias por considerar contribuir a este proyecto! Por favor, revisa las [directrices de contribución](https://laravel.com/docs/contributions) para más detalles.

## Licencia

Este proyecto está licenciado bajo la [Licencia MIT](https://opensource.org/licenses/MIT).
