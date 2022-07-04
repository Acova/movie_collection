Descripción de la prueba técnica.

Para esta prueba técnica se nos solicitaba desarrollar una API de gestión de una colección de VHS con dos endpoints:

    - Uno que listara los VHS añadidos.
    - Otro al que se le enviaría un ID de película, y que extraería información de la API de TheMovieDB, para rellenarla.

Así, para la implementación de este ejercicio, se ha decidido implantar un arquitectura parecida a la hexagonal. Para esto,
en primer lugar, se han identificado los dominios de la aplicación, en este caso solo uno, MovieCollection.

Si entramos en la ruta src/, encontramos una sola carpeta, "MovieCollection". Si la abrimos, nos encontramos tres subcarpetas,
representando las capas de la arquitectura hexagonal: "Application", "Domain" e "Infrastructure".

La carpeta "Domain" contendrá nuestras entidades, y por ello debe permanecer totalmente desacoplada de cualquier dependencia externa.

Si entremos en ella, nos encontraremos otras dos subcarpetas, "Model" y "Repository". La carpeta "Model" incluye la definición pura de
las entidades que se ha creído necesario para esta aplciación, "Movie" y "MovieGenre". Estas clases cuentan con la menor lógica posible,
getters y setters de sus atributos, y en este caso, una función que permite obtener un array asociativo con los atributos.

Si siguiéramos la arquitectura propuesta por Symfony, estas entidades usarían la librería ORM de Doctrine para mapear los campos de la
base de datos, pero dado que intentamos que nuestro dominio esté totalmente separado de dependencias externas, no podemos hacer esto. Cuando
una aplicación crece, tener una entidad que se use a través de toda nuestra aplicación, independiente del método que usemos para conectarnos
con la BBDD nos dará flexibilidad, y nos ahorrará problemas si decidimos cambiar de BBDD.

La otra subcarpeta de "Domain", "Repository", contiene las interfaces que deben implementar los repositorios que quieran acceder a nuestras 
entidades. Todo repositorio que quiera obtener información de nuestro dominio, independientemente del método que use para ello, debe 
implementar las funciones de esa interfaz y devolver lo que estas definen.

Volviendo a la carpeta "Infrastructure", esta funciona como punto de conexión con el exterior. En la subcarpeta "Api", nos encontramos 
los controladores clásicos de Symfony. Estos sirven de forma exclusiva para recibir peticiones y devolver información. Con un poco más de tiempom
se añadirían aquí algunas comprobaciones para asegurar que las peticiones tienen la forma correcta, además de una mejor forma de devolver los errores.

En la subcarpeta "Doctrine" de "Infrastructure", nos encontramos con toda la lógica de conexión con la base de datos. Aquí encontramos tanto las 
entidades de Doctrine, como las implementaciones de los distintos repositorios que expusimos. Si en algún momento cambiásemos la librería que usamos, 
solo tendríamos que cambiarlo aquí, y no tendríamos que tocar la lógica de nuestra aplicación, ya que la lógica está desacoplada.

Por último, la carpeta "HttpClient" incluye la lógica para la conexión con la API de TheMovieDB.

Entrando ya a la última capa de nuestra estructura, nos encontramos con "Application". Esta capa sirve de conexión entre el dominio y la Infraestructura.
Usando las entidades e interfaces definidas en nuestra capa de Dominio, y las implementaciones en la capa de Infraestructura, implementamos toda la
lógica de nuestro negocio. Recibimos peticiones y usamos las herramientas definidas en Infraestructura. También usamos las interfaces de los repositorios,
por lo que si queremos cambiar la lógica de estos, solo tenemos que crear una nueva implementación.

Todo esto se ha conseguido sobreescriiendo la lógica base de Symfony. Por ejemplo, si entramos al fichero "config/services.yaml" veremos como la definición
de servicios ha cambiado del todo, alejándose de las definiciones básicas de Symfony bajo las cuales se inyectaban las dependencias. Ahora, las dependencias 
se inyectan en función de lo configurado en este fichero. Es aquí donde, por ejemplo, especificamos la implementación de la interfaz del repositorio que usaremos.

Por último, bajo la carpeta tests encontraremos los tests unitarios que se han podido realizar.

Cabe destacar que, debido a la falta de tiempo, los tests es la parte que más flaquea de la aplicación. Si bien lo mejor hubiera sido comenar el desarrollo por 
los tests, para así tener una definición básica sobre la que ir trabajando, la falta de tiempo y de experienca ha hecho necesario empezar directamente con la 
implementación de la lógica. 

Otro punto en el que puede flaquear la aplicación es en la correcta separación de capas. Con más tiempo, sobre todo para analizar, sería posible tener una 
estructura más clara y lógica, que permita separar correctamente la lógica de negocio de las dependencias externas, de una forma clara y fácil de comprender.

Para el desarrollo de esta aplicación se han dedicado las tardes del jueves, el sábado, el domingo y el lunes, ya que por razones de horario me era imposible
sentarme más tiempo.