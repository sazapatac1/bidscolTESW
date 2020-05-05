# Reglas de programación y arquitectura para el proyecto BidsCol

## Gestión del repositorio
El presente repositorio es el lugar pricipal donde se localizará el código fuente del proyecto. Para él se tendrán las siguientes disposiciones.
### Ramas del repositorio y Pull request
- Esta prohibida la subida de código directo a la rama master sin haber sido revisada antes por el arquitecto
- Cada funcionalidad o desarrollo realizada por alguno de los desarrolladores debera ser puesta en una rama distinta al master
- Se deberán nombrar las ramas con nombres significativos que permitan identificar la funcionalidad que esta siendo desarrollada
- Una vez finalizada una funcionalidad se debera realizar un commit a la rama respectiva, procurando poner mensajes en el commit que identifiquen facilmente la función y el estado de esta.
- Realizar pull request al master y esperar por la verificación del arquitecto, de no ser aceptada corregir el código en la menor brevedad

## Gestión de la programación
### Reglas para controladores:
- Nunca haga un 'echo' en los controladores
- Cada controlador debe tener enlazada una ruta
- Para los controladores los metodos CRUD deberán ser llamados index, create, store, show, edit, update y destroy siguiendo el estandar de los creados por artisan.

### Reglas para modelos:
- La validación de los datos debe realizarse en un metodo validate dentro los modelos
- En la linea anterior de fillable dentro del modelo se debe realizar un comentario con todos los atributos del modelo y en la linea subsiguiente los atributos que son foraneos
- Colocar en plural la relación hasMany
- Colocar en singular relación belongsTo
- Los nombres de las tablas deberan ser en plural

## Reglas para vistas:
- Toda vista debe extender de layout master
- Todas las vistan deben estar realizadas en el motor de renderizado [blade](https://laravel.com/docs/7.x/blade)
- Nunca debe se debe crear sección <?php> en las vistas

## Reglas para rutas:
- Las rutas se separaran por medio de un comentario que indique a que controlador pertenecen. 
- No debe haber salto de linea entre rutas a menos que sea una nueva categoria
- Siempre se ha de hacer uso de un name al que se pueda invocar dicha ruta
- Solo se hará uso de routas de tipo *get, post y delete* quedando descartadas *update, edit...* y siendo reemplazadas por post y update
- Las rutas correspondientes a servicios API deberan ser puestas en el archivo api.php y deberán seguir las mismas reglas citadas arriba
