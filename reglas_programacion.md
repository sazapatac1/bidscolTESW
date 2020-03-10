Reglas de programación

- Se deberá enviar un pull request cuando una tarea asignada ya esté realizada en la rama del programador
- 

Reglas para controladores:
    - Nunca haga un 'echo' en los controladores
    - Cada controlador debe tener enlazada una ruta
    - Los controladores deben tener metodos CRUD llamados index, create, store, show, edit, update y destroy

Reglas para modelos:
    - La validación de los datos debe realizarse en los modelos
    - En la linea anterior de fillable se debe realizar un comentario con todos los atributos del modelo
    y luego un comentario en la linea siguiente con los atributos foraneos.
        *Colocar en plural la relación hasMany
        *Colocar en singular relación belongsTo
    - Los nombres de las tablas deberan ser en plural

Reglas para vistas:
    - Toda vista debe extender de layout master
    - Todas las vistan deben estar realizadas en blade
    - Nunca debe se debe crear sección <?php> en las vistas
    - Boton 'Delete' debe tener color rojo (danger)
    - Boton 'Edit' debe tener color azul