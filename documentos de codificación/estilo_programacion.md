# Estilo de codificación para el proyecto Bidscol

## Estilo para PHP
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

### Declaración de Strings
>       $greeting = "Hi, I am {$name}


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


