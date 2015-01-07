
<h1>filmdate</h1>


Se trata de una aplicación para usuarios aficionados al cine.
El usuario podrá registrarse y loguearse.
Al loguearse tendrá su perfil y podrá visualizar las películas que están en la cartelera, de estreno y próximamente.
El usuario podrá comentar y valorar las peliculas de una forma intuitiva. Además podrá tanto modificar sus datos como añadir un avatar.


<h3>Estructura de la app</h3>

| Nombre                             | Descripción                                                 |
| ---------------------------------- |:-----------------------------------------------------------:|
| **config**/database.php            | Conexión con la base de datos MongoLab (nube).              |
| **controller**/                    | Intermediario entre el modelo y la vista.                   |
| **controller**/class.messages.php  | Una clase para controlar los mensajes de error.             |
| **css**/                           | Fichero estático para almacenar los diseños.                |
| **js**/                            | JavaScript por parte del cliente.                           |
| **images**/                        | Se almacenan las imágenes.                                  |
| **funciones**/                     | Comprueban los datos antes de introducir a la bd.           |
| **model**/                         | Es la parte del servidor para obtener y manejar datos.      |
| **views**/                         | El cliente visualiza las películas y su perfil.             |
| **views**/inicio.php               | Página principal.                                           |
| index.php                          | Configuración del servidor.                                 |

Funcionamiento de la app:

    MongoLab → Base de datos en la nube.(datos JSON).
    MongoClient → Conexión a la base de datos.
    Controller.php → Intermediario en el Schema de la base de datos y la vista.
    Views → Visualizar datos para el usuario.

Tecnologías a usar:

    - HTML5 / CSS3 + JavaScript
    - PHP --> php -S localhost:8080(el puerto que quieras)
    - MongoDB

Sistema operativo:

    - Ubuntu 14.04

<br>
<h3>API</h3>

La app filmdate utilizará la API de RottenTomatoes.

**Aparte de utilizar la libería de RottenTomatoes hay que instalar cURL.**

- <h6>Instalar cURL para la API:</h6>
  >*sudo apt-get install php5-curl*

- <h6>Reiniciar apache:</h6>
  >*sudo /etc/init.d/apache2 restart*

<br>
<h3>Enlaces</h3>
**Enlace OpenShift** (actualizado cada semana): http://filmdate-filmdate.rhcloud.com/

**Email oficial**: filmdateee@gmail.com

**Estructura/Sitemap**:https://moqups.com/filmdateee@gmail.com/xQ8dWMoQ

**Web oficial**: http://filmtalk.github.io/info./

**Dominio propio**: http://filmdate.tk/

<br />
<h3>Referencias</h3>

- Conexión mongo+php:

   [Tutorial Mongo] (http://php.net/manual/es/mongo.tutorial.connecting.php)

   [MongoDB y PHP] (http://www.tutorialspoint.com/mongodb/mongodb_php.htm)



- Video: 
    [Login y registro para php] (https://www.youtube.com/watch?v=OjuRJsFOj9g)



- Ejemplo página web: 
    [The Movie Database] (https://www.themoviedb.org/)

- Mínimos: [Moodle] (http://www.euripean.com/moodle2/file.php/16/minimoak.pdf)
