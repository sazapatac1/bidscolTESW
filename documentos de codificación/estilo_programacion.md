# Estilo de codificación para el proyecto Bidscol

# Estilo para PHP
### Codificación Estandar
- Los archivos deben usar solo los tags 
>       <?php
y
>       <?=
- Los archivos deben emplear solamente la codificación UTF-8
- Los archivos DEBERÍAN declarar cualquier estructura (clases, funciones, constantes, etc,...) o realizar partes de la lógica de negocio (por ejemplo, generar una salida, cambio de configuración ini, etc,...) pero NO DEBERÍAN hacer las dos cosas.
- Los nombres de clases deben ser declarados en la notación ***StudlyCaps***
- Los nombres de los metodos deben declararse en notación ***camelCase***
### Tipo de retorno nulo
Todo metodo que no devuelva nada, debe indicarse con void
### Declaración y concatenación de Strings
Forma correcta
>       $greeting = "Hi, I am {$name}
Forma incorrecta
>       $greeting = 'Hi, I am ' . $name . '.';
### Routing
- Los nombres de las rutas deben usar la notacion ***camelCase*** al igual que los parametros de estas
- Una url de ruta no debe comenzar a / menos que la url sea una cadena vacía
### Controladores
- Seran nombrados en singular
- Se debe procurar mantener los controladores simples y adherirse a las palabras clave por defecto de CRUD ( index, create, store, show, edit, update, destroy)


## Estructuración del código
### Condicionales IF

>		if (
>		    ...
>		}

### Ciclo While
>		while (
>		    ...
>		}

### Ciclo For
>       for(-; -; -){
>           ...
>       }

### Definición de clases
>		final class OpenSourceController (
>		    ...
>		}

### Funciones dentro de clases
>		final class OpenSourceController (
>		    public function index() {
>               return view('openSource');
>		}



### Otras convenciones
- Identación unicámente mediante la tecla Tabulador
- Se deberá crear una carpeta para las vistas que usen un controlador específico
- Siempre se seguiran los nombres acordados en el diagrama de clases para los modelos y los controladores


## Estilo para Blade
### Condicionales IF
>		@if(...)
>           ...
>       @elseif(...)
>           ...
>       @else
>           ...
>       @endif

### Ciclo For & Foreach
>       @foreach(...)
>           ...
>       @endforeach

### Ciclo While
>       @while (true)
>           ...
>       @endwhile

### Declaración Switch
>       @switch(...)
>           @case(1)
>           ...
>           @break
>
>           @case(2)
>           ...
>           @break
>
>           @default
>           ...
>       @endswitch

### Otras convenciones
- Se hara uso de la herramienta [Localization](https://laravel.com/docs/7.x/localization) de Laravel para los textos dentro de las vistas.


