POST http://localhost:8000/api/register

{"name":"zero",
 "email" : "zerohero@gmail.com",
 "password" : "prueba",
 "password_confirmation":"prueba"
}

POST http://localhost:8000/api/login 

{
 "email" : "zerohero@gmail.com",
 "password" : "prueba"
}
 


POST : http://localhost:8000/api/tarea 


{
      "tarea_titulo": "esto es una prueba",
      "tarea_descripcion": "esto una prueba",
      "tarea_estado":"ACTIVO",
      "codigo_user": 1
}


http://localhost:8000/api/tarea/3

{
      "tarea_titulo": "esto es una prueba",
      "tarea_descripcion": "esto esssssssssssssssssssssssssssssssss una prueba",
      "tarea_estado":"PENDIENTE",
      "codigo_user": 1
}