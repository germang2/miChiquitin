# miChiquitin

## Descargar el repositorio
```bash
  git clone https://github.com/germang2/miChiquitin.git
```

## Configurar proyecto
> Entrar a la raiz del proyecto (src)

> Instalar las depedencias
```bash
  composer install
```
> Crear un nuevo archivo llamado .env y guardarlo en la raíz (src)

> Copiar el contenido del archivo .env.example en .env

> En .env modificar el contenido de las variables APP_KEY, DB_USERNAME y DB_PASSWORD 
```php
APP_KEY=
DB_USERNAME=
DB_PASSWORD=
```
* A la variable APP_KEY asignar el valor del archivo APP_KEY.txt que está en la carpeta compartida de Google Drive
* A la variable DB_USERNAME asginar el valor del nombre de usuario con permisos a la BD
* A la variable DB_PASSWORD asignar la contraseña del usuario para la BD
> NOTA: previamente se ha debido crear la Base da datos en MySql con el nombre "michiquitin", creado el usuario con contraseña y darle permisos a la BD
