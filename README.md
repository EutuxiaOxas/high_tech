# Sitio web para la empresa Rolitec    
Este sitio web esta desarrollado bajo el Framework Laravel v8.0

---
## Instalacion en local
Para instalar el proyecto en local debe seguir los siguientes pasos:

1- Clone el repositorio en su maquina local
```
git clone [https://github.com/EutuxiaOxas/e-commerce_distrialimentos.git](https://github.com/EutuxiaOxas/high_tech.git)
```

2- Cree una base de datos en su entorno local. En este proyecto se estara trabajando con MySQL.

3- En su directorio local, cree un archivo .env a partir el archivo .env.example
```
cp .env.example .env
```

4- En el archivo .env agregue los datos de conexion con la base de datos
```
nano .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=username
DB_PASSWORD=password
```

5- Ahora ejecute los siguientes comandos, para crear el enlace simbolico a la carpeta storage y para la llave del proyecto
```
php artisan storage:link
php artisan key:generate
```

6- Ahora ejecute las migraciones del proyecto, junto con los seeders. Este comando creara las tablas en la base de datos
```
php artisan migrate --seed
```

7- Listo, ahora levante el servidor local
```
php artisan serve
```

8- Con esto ya deberia tener el proyecto corriendo en el siguiete enlace: 
http://localhost:8000/

---
#### Algunos comandos utiles

- Para re-instalar todas las tablas de bases de datos. Se eliminaran todas las tablas y se volveran a instalar desde cero.
```
php artisan migrate:refresh --seed
```
- Para levantar la aplicacion en otro puerto. En este ejemplo en el puerto 3000
```
php artisan serve -p 3000
```
- Para limpiar la cache
```
php artisan cache:clear
```
- Para limpiar toda la cache(rutas, sesiones, cache de la app, etc)
```
php artisan optimize:clear
```
- Para ver mas comandos php artisan
```
php artisan
```
