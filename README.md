*************************************
ESTA API ESTA DESPLIEGADA EN  DIGITAL OCEAN
en una bases de datos posgresql



URL 
endpoint  publicas
https://api-tarea-frrzc.ondigitalocean.app/api/login
https://api-tarea-frrzc.ondigitalocean.app/api/register



................................................



EJEMPLO 

endpoint protegidas

Para acceder estos enpoints en la peticion  se tiene que manda token en  Hearde que segenera cuando se loguea el usuario

https://api-tarea-frrzc.ondigitalocean.app/api/Task
https://api-tarea-frrzc.ondigitalocean.app/api/usuarios
https://api-tarea-frrzc.ondigitalocean.app/api/login
https://api-tarea-frrzc.ondigitalocean.app/api/logout



**********************************
PARA EJECUTA ESTA API  EJE

composer install
php artisan serve

********************************************************
CADA  RUTA TIENE  4 ENPOINT  GET , POST, PUT Y DELETE 
************************************************

ESTA API LA CONSUME EN UNA APP EN REACT PARA EL FRONTED
tambien despliegada en VERCEL 

https://tarea-cliente.vercel.app/

REPOSITORIO


********************************************************
PUEDE EJECUTAR EL SIGUIENTE COMANDO  PARA VER TODAS LAS RUTAS
php artisan route:list 

**************************************
PORFAVOR VER EL ARCHIVO  

ROUTES/API.PHP 
Y VER ARCHIVO CONSUMIR.MD
*******************************************
PORFAVOR REVISAR LA CARPETA
app/Http/Controllers/
