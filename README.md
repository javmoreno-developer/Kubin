![image](https://user-images.githubusercontent.com/55782974/163437904-dfe9703e-cf2a-4536-bd85-ddd1de44e3e1.png)

Mi proyecto para este lunes 20 de junio de 2022 se tratará de una aplicación llamada kubin con la que podrás crear,compartir y descargar lienzos hechos por el usuario.

## Tecnologias
## Front
Para el front usaré Jquery además usaré el preprocesador Sass,Vue.js (para la reactividad),algunas librerias para animaciones (mo.js y gsap) y trazado (snap.svg).
## Back
Usaré la versión 8 de php además de usar también la version 8 del framework Laravel.
## Opciones para el usuario
Se distinguirán tres perfiles:
1.Usuario no premium y no logueado:podrá ver la landing page de la aplicación asi como el showcase y los tutoriales.
2.Usuario no premium y logueado:podrá lo anterior además de crear lienzos (un número limitado de lienzos.con la mayoria de herramientas disponibles) y además podrá compartilos (numero limitado).
3.Usuario premium y logueado:podrá crear grupos de usuarios,crear lienzos (sin limites),tendrá todas las herramientas disponibles,podrá descargarse los dibujos y personalizar el dashboard.
## Modelado
![image](https://user-images.githubusercontent.com/55782974/168254811-f0a5bfa8-f45f-44f6-b5c5-68ae4ba4dc85.png)

## Despliegue
A la hora de desplegar la app,usaré el servicio de heroku utilizando clearDB para tener la bd en otro servicio (ademas de usarlo para hacer copias de seguridad de la bd),el dominio para la app sera un .com/.io
## Diseño
https://www.figma.com/file/POVXEtSiLjYTva3qFoZzq1/KUBIN?node-id=0%3A1
## Video checkpoint
https://youtu.be/L8coQg8mF40
## Tras descargar
npm i
npm run dev,
composer install,
borrar readme por defecto de laravel.

