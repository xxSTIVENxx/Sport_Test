# Sport Test

<img src="/public/img/logoSportTest.png" alt="Logo de Sport Test" width="200" height="200">

**Descripción:**

Sport Test es una aplicación web diseñada para satisfacer las necesidades de entrenadores y profesores en el ámbito deportivo. Nuestra plataforma ofrece una solución integral para llevar un seguimiento detallado de los deportistas en la nube, lo que facilita a los entrenadores la recopilación y gestión de datos clave para mejorar el rendimiento de sus atletas.

Nuestros principales objetivos son:

- **Registro de Deportistas:** Sport Test permite a los profesores registrar y administrar perfiles de deportistas de manera eficiente. Puedes almacenar información personal y datos de contacto.

- **Seguimiento Físico:** Ofrecemos dos pruebas específicas, el Test de 30 metros y el Test de Cooper, que proporcionan información valiosa sobre el estado físico de los deportistas. Estas pruebas son herramientas fundamentales para evaluar la resistencia y velocidad de los atletas.

- **Unidades de Entrenamiento:** Los profesores tienen la capacidad de crear unidades de entrenamiento personalizadas. Esto les permite diseñar planes de entrenamiento específicos para cada deportista, adaptados a sus necesidades y objetivos individuales.

Sport Test está diseñada para simplificar y mejorar la gestión de datos deportivos. Queremos brindar a los entrenadores las herramientas necesarias para llevar a sus atletas al siguiente nivel y garantizar que alcancen su máximo potencial.

### Instalación

Sigue estos pasos para configurar y ejecutar Sport Test en tu entorno local:

#### 1. Descargar e instalar XAMPP

Descarga e instala XAMPP, una plataforma de desarrollo que incluye Apache, MySQL, PHP y otras herramientas necesarias para ejecutar aplicaciones web. Puedes obtener XAMPP desde el sitio web oficial [aquí](https://www.apachefriends.org/index.html).

#### 2. Descargar e instalar Visual Studio Code

Visual Studio Code es un editor de código fuente gratuito y altamente personalizable. Puedes descargarlo desde la página oficial de Visual Studio Code [aquí](https://code.visualstudio.com/).

#### 3. Descargar la aplicación Sport Test

Descarga el archivo de la aplicación Sport Test desde nuestro repositorio en GitHub.

## 4. Configurar la base de datos

Antes de ejecutar Sport Test, debes configurar la base de datos y asegurarte de que tu entorno local esté preparado para la aplicación.

### 4.1 Crear un dominio local (opcional)

Si deseas utilizar un dominio local para acceder a Sport Test en lugar de `http://localhost`, sigue estos pasos:

#### Paso 1: Editar el archivo hosts

- Abre el Bloc de notas (Notepad) como administrador. Puedes hacerlo buscando "Bloc de notas" en el menú Inicio, haciendo clic derecho y seleccionando "Ejecutar como administrador".

- En el Bloc de notas, selecciona "Archivo" > "Abrir" y navega a `C:\Windows\System32\drivers\etc\`.

- Abre el archivo `hosts` (sin extensión) y agrega la siguiente línea al final del archivo: 127.0.0.1 sporttest.test

Esto mapeará el dominio `sporttest.test` a tu máquina local.

- Guarda el archivo y cierra el Bloc de notas.

#### Paso 2: Configurar el servidor virtual

- Abre XAMPP y asegúrate de que los servicios de Apache y MySQL estén en ejecución.

- Abre el explorador de archivos y navega a la carpeta de configuración de Apache en XAMPP. Esto puede variar según tu instalación, pero generalmente se encuentra en `C:\xampp\apache\conf\extra\`.

- Abre el archivo `httpd-vhosts.conf` en un editor de texto.

- Agrega las siguientes líneas al archivo para configurar el servidor virtual para `sporttest.test`: 
	<VirtualHost *:80>
	DocumentRoot "C:/xampp/htdocs"
	ServerName localhost
	</VirtualHost>

	<VirtualHost *:80>
	DocumentRoot "C:/xampp/htdocs/sport/public"
	ServerName sporttest.test
	</VirtualHost>
	
	Asegúrate de que `"C:/xampp/htdocs/sport/public"` coincida con la ruta de tu proyecto Sport Test en tu sistema.

- Guarda el archivo `httpd-vhosts.conf` y ciérralo.

#### 4.2 Crear la base de datos

- Abre tu navegador web y asegúrate de que Apache y MySQL estén en ejecución en XAMPP.

- Abre tu navegador web y navega a `http://sporttest.test/phpmyadmin/` (o `http://localhost/phpmyadmin/` si no configuraste un dominio local). Esto abrirá la interfaz de administración de MySQL.

- En la interfaz de PHPMyAdmin, crea una nueva base de datos llamada `sport_test`.

- Importa la estructura de la base de datos ejecutando el script SQL proporcionado en el archivo `sport_test.sql` incluido en el repositorio de la aplicación. Puedes importar este archivo utilizando las herramientas de importación de PHPMyAdmin.

¡Listo! Ahora estás listo para ejecutar Sport Test en tu entorno local utilizando `sporttest.test` (o `localhost` si no configuraste un dominio local) en tu navegador.


### 5. Configurar la aplicación

- Abre Visual Studio Code y abre el directorio de la aplicación Sport Test.

- Configura la conexión a la base de datos en el archivo de configuración `config.php`. Asegúrate de que las credenciales coincidan con tu entorno local.

### 6. Ejecutar la aplicación

- Puedes ir a tu navegador y colocar el dominio locar creado previamente.


