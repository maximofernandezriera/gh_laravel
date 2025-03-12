API REST de Gestión Escolar

![Laravel](https://img.shields.io/badge/Laravel-11.x-red)
![PHP](https://img.shields.io/badge/PHP-8.4-blue)
![MySQL](https://img.shields.io/badge/MySQL-5.7-orange)

Una API RESTful desarrollada con Laravel para gestionar clases y alumnos en un entorno escolar. Esta API proporciona endpoints para realizar operaciones CRUD sobre clases y gestionar alumnos dentro de cada clase.

## Características

- Gestión completa de clases (crear, listar, obtener detalles)
- Gestión de alumnos asociados a clases
- Implementación con arquitectura RESTful
- Validación de datos de entrada
- Pruebas automatizadas con PHPUnit
- Entorno de desarrollo con Docker

## Requisitos

- PHP 8.4 o superior
- Composer
- MySQL 5.7 o superior (configurado en Docker)
- Docker y Docker Compose (opcional, para desarrollo)

## Instalación

### Usando Docker

1. Clona el repositorio:
   ```bash
   git clone <url-del-repositorio>
   cd laravel-rest-api
   ```

2. Configura el archivo .env:
   ```bash
   cp .env.example .env
   ```

3. Inicia los contenedores con Docker Compose:
   ```bash
   docker-compose up -d
   ```

4. Accede al contenedor de la aplicación e instala dependencias:
   ```bash
   docker exec -it laravel_app bash
   composer install
   php artisan key:generate
   php artisan migrate
   ```

### Instalación local

1. Clona el repositorio:
   ```bash
   git clone <url-del-repositorio>
   cd laravel-rest-api
   ```

2. Instala las dependencias:
   ```bash
   composer install
   ```

3. Configura el archivo .env:
   ```bash
   cp .env.example .env
   ```

4. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

5. Configura tu base de datos en el archivo .env y ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```

6. Inicia el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

## Estructura del proyecto

- **app/Models**: Contiene los modelos Eloquent (`Classe` y `Alumne`)
- **app/Http/Controllers**: Contiene los controladores de la API
- **database/migrations**: Definiciones de las tablas de la base de datos
- **routes/api.php**: Definiciones de rutas de la API
- **tests/Feature**: Pruebas automatizadas

## Endpoints de la API

### Gestión de Clases

#### Listar todas las clases
- **URL**: `/api/classes`
- **Método**: `GET`
- **Respuesta**: Array JSON con todas las clases y sus alumnos

#### Crear una clase nueva
- **URL**: `/api/classes`
- **Método**: `POST`
- **Parámetros**:
  - `grup` (string, requerido): Nombre del grupo
  - `tutor` (string, requerido): Nombre del tutor
- **Respuesta**: Objeto JSON con la clase creada (código 201)

#### Ver detalles de una clase
- **URL**: `/api/classes/{id}`
- **Método**: `GET`
- **Respuesta**: Objeto JSON con los detalles de la clase, incluyendo sus alumnos

### Gestión de Alumnos

#### Añadir alumno a una clase
- **URL**: `/api/classes/{id}/alumnes`
- **Método**: `POST`
- **Parámetros**:
  - `nom` (string, requerido): Nombre del alumno
  - `cognom` (string, requerido): Apellido del alumno
  - `data_naixement` (date, requerido): Fecha de nacimiento
  - `nif` (string, requerido): Documento de identidad
- **Respuesta**: Objeto JSON con el alumno creado (código 201)

#### Listar alumnos de una clase
- **URL**: `/api/classes/{id}/alumnes`
- **Método**: `GET`
- **Respuesta**: Array JSON con todos los alumnos de la clase especificada

## Ejecutar pruebas

```bash
php artisan test
```

Las pruebas están definidas en ClasseControllerTest.php y prueban la creación de clases, la adición de alumnos a una clase y la obtención de alumnos de una clase.

## Configuración de Docker

El proyecto incluye un entorno Docker completo:

- **app**: Contenedor PHP con Laravel
- **db**: Contenedor MySQL
- **phpmyadmin**: Interfaz web para gestionar la base de datos

PhpMyAdmin está disponible en `http://localhost:8080`

## Licencia

[MIT](https://opensource.org/licenses/MIT)

---

Proyecto desarrollado para demostrar el uso de Laravel en la creación de APIs RESTful.
