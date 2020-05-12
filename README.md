<p align="center"><img src="https://raw.githubusercontent.com/sazapatac1/bidscolTESW/master/public/img/logo.png" width="400"></p>


## About Bidscol

Bidscol is a global commerce leader that connects millions of buyers and sellers around the world. We exist to enable economic opportunity for individuals, entrepreneurs, businesses and organizations of all sizes. Our portfolio of brands includes Bidscol Marketplace and Bidscol Classifieds Group, operating in 190 markets around the world.

## **Time to sell it**
[Bidscol](www.bidscol.tk) is accessible, powerful, and provides tools required for auctions.

# Arquitectura del proyecto
## Diagrama de Clases
<p align="center"><img src="https://raw.githubusercontent.com/sazapatac1/bidscolTESW/master/bidsClassDiagram.png" width="800"></p>
## Diagrama de arquitectura
<p align="center"><img src="https://raw.githubusercontent.com/sazapatac1/bidscolTESW/master/bidsArchitecureDiagram.png" width="800"></p>

## Instrucciones para correr local
- Descargar repositorio
>       git clone https://github.com/sazapatac1/bidscolTESW.git
- Crear Base de datos local o remota
>       CREATE DATABASE bidcolDB
- Crear archivo .env a partir de .envexample
>       cp .env.example .env
- Reemplazar la siguiente linea en el archivo .env yponer credenciales de la DB
>       DB_DATABASE=bidcolDB
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
- Fakers
>       php artisan db:seed
- Finalmente ejecutar servidor
>       php artisan serve

## Rutas
- */* -> Home
- */item/index/all/0* -> Todos los productos
- */admin* -> Acceso administrativo para el usuario 1
