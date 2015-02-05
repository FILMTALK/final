<h1>filmdate</h1>


<p align="justify">Se trata de una aplicación para usuarios aficionados al cine.
El usuario podrá registrarse y loguearse.
Al loguearse tendrá su perfil y podrá visualizar las películas que están en la cartelera, de estreno y próximamente.
El usuario podrá comentar y valorar las peliculas de una forma intuitiva. Además podrá tanto modificar sus datos como añadir un avatar.</p>

<br>
<h3>Estructura de la app</h3>

| Nombre                             | Descripción                                                 |
| ---------------------------------- |:-----------------------------------------------------------:|
| **api**/api.php                    | Es una API propia para terceros.                            |
| **config**/database.php            | Conexión con la base de datos MongoLab (nube).              |
| **controller**/                    | Intermediario entre el modelo y la vista.                   |
| **controller**/class.messages.php  | Una clase para controlar mediante los mensajes de error.    |
| **css**/                           | Fichero estático para almacenar los diseños.                |
| **js**/                            | JavaScript por parte del cliente.                           |
| **images**/                        | Se almacenan las imágenes.                                  |
| **funciones**/                     | Compobar y controlar antes de introducir los datos en la BD.|
| **funciones**/usuarios.php         | Controlar los datos de los usuarios.                        |
| **funciones**/peliculas.php        | Comprobar los datos de las películas.                       |
| **includes**/                      | Son ficheros de HTML o PHP para incluir en otros archivos.  |
| **library**/Slim                   | Es una librería externa de Slim para utilizar la API.       |
| **model**/                         | Es la parte del servidor para obtener y manejar datos.      |
| **views**/                         | El cliente visualiza las películas y su perfil.             |
| **views**/inicio.php               | Página principal.                                           |
| index.php                          | Configuración del servidor.                                 |

<br>
Funcionamiento de la app:

    MongoLab → Base de datos en la nube.(datos JSON).
    MongoClient → Conexión a la base de datos.
    Controller→ Controlar los datos de la base de datos y los que introduce el usuario.
    Views → Visualizar datos para el usuario.

Tecnologías a usar:

    - HTML5 / CSS3
    - JavaScript + AJAX
    - PHP --> php -S localhost:8080 (el puerto que quieras).
    - MongoDB -->Base de datos no relacional.

Sistema operativo:

    - Ubuntu 14.04

<br>
<h3>API</h3>

La app filmdate ha utilizado la API de RottenTomatoes.

Esta app solicita la página de RottenTomatoes para guardar la lista de películas en la BD.

**Aparte de utilizar la libería de RottenTomatoes hay que instalar cURL.**

- <h6>Instalar cURL para la API:</h6>
  >*sudo apt-get install php5-curl*

- <h6>Reiniciar apache:</h6>
  >*sudo /etc/init.d/apache2 restart*

<br>
<h3>RESTful API</h3>

La filmdate ha creado su propia API para terceros.

**Se ha utilizado el Framework Slim para la creación.**

- <h6>Se descarga la libería a utilizar.</h6>

- <h6>En el fichero que se crean las rutas requiere la libería.</h6>
  >*require '../library/Slim/Slim.php';*

- <h6>Se accede a los métodos de la clase Slim:</h6>
  >*\Slim\Slim::registerAutoloader();*

- <h6>Se crea el objeto de tipo Slim:</h6>
  >*$app = new \Slim\Slim();*

- <h6>Se establecen las rutas:</h6>
  >*$app->get('/getPeliculas', function () { jsonAmostrar });*
<br>

<br>
<h3>Enlaces</h3>
**Enlace OpenShift** (actualizado cada semana): http://filmdate-filmdate.rhcloud.com/

**Email oficial**: filmdateee@gmail.com

**Estructura/Sitemap**:https://moqups.com/filmdateee@gmail.com/xQ8dWMoQ

**Información online:**: http://filmtalk.github.io/final/

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

- Mínimos: [pdf] (https://drive.google.com/file/d/0B9NisiPkodSLZUZVeGtrUzg4dHM/view?usp=sharing)
