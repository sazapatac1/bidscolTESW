# Reglas de programación y arquitectura para el proyecto BidsCol

## Gestión del repositorio
El presente repositorio es el lugar pricipal donde se localizará el código fuente del proyecto. Para él se tendrán las siguientes disposiciones.
### Ramas del repositorio y Pull request
- Esta prohibida la subida de código directo a la rama master sin haber sido revisada antes por el arquitecto
- Cada funcionalidad o desarrollo realizada por alguno de los desarrolladores debera ser puesta en una rama distinta al master
- Se deberán nombrar las ramas con nombres significativos que permitan identificar la funcionalidad que esta siendo desarrollada
- Una vez finalizada una funcionalidad se debera realizar un commit a la rama respectiva, procurando poner mensajes en el commit que identifiquen facilmente la función y el estado de esta.
- Realizar pull request al master y esperar por la verificación del arquitecto, de no ser aceptada corregir el código en la menor brevedad

## Reglas para controladores:
- Nunca haga un 'echo' en los controladores
- Cada controlador debe tener enlazada una ruta
- Para los controladores los metodos CRUD deberán ser llamados index, create, store, show, edit, update y destroy siguiendo el estandar de los creados por artisan.

## Reglas para modelos:
- La validación de los datos debe realizarse en un metodo validate dentro los modelos
- En la linea anterior de fillable dentro del modelo se debe realizar un comentario con todos los atributos del modelo y en la linea subsiguiente los atributos que son foraneos
- Colocar en plural la relación hasMany
- Colocar en singular relación belongsTo
- Los nombres de las tablas deberan ser en plural

## Reglas para vistas:
- Toda vista debe extender de layout master
- Todas las vistan deben estar realizadas en el motor de renderizado [blade](https://laravel.com/docs/7.x/blade)
- Nunca debe se debe crear sección <?php> en las vistas
