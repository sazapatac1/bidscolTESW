<p align="center"><img src="https://raw.githubusercontent.com/sazapatac1/bidscolTESW/master/public/img/logo.png" width="400"></p>


## About Bidscol

Bidscol is a global commerce leader that connects millions of buyers and sellers around the world. We exist to enable economic opportunity for individuals, entrepreneurs, businesses and organizations of all sizes. Our portfolio of brands includes Bidscol Marketplace and Bidscol Classifieds Group, operating in 190 markets around the world.

[Bidscol](bidscol.tk) is accessible, powerful, and provides tools required for auctions.
##**Time to sell it**

## Instrucciones para correr local
- Descargar repositorio
>       git clone https://github.com/sazapatac1/bidscolTESW.git
- Crear Base de datos local o remota
>       CREATE DATABASE bidcolDB
- Crear archivo .env a partir de .envexample
>       cp .env.example .env
- Descargar dependencias
>       composer install
- Genera Key
>       php artisan key:generate
- Migraciones
>       php artisan migrate
- Cache y routas
>       php artisan cache:clear
>       php artisan route:clear
- Link al storage
>       php artisan storage:link
- Finalmente ejecutar servidor
>       php artisan serve
Rutas
*/* -> Home
*/item/index/all/0* -> Todos los productos
*/admin* -> Acceso administrativo para el usuario 1
