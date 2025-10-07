# Guía para Agentes de IA sobre el Proyecto (Plantilla Genérica)

Este documento proporciona el contexto y las reglas para que un agente de IA pueda entender y programar en un proyecto. Rellena los marcadores `[ ... ]` con la información específica de tu proyecto.

## 1. Resumen General

- **Lenguaje Principal:** `[Lenguaje de programación y versión, ej. Python 3.9, Node.js 20]`
- **Framework Principal:** `[Framework de Backend, ej. Django 4.2, Express 4.18, Laravel 10]`
- **Base de Datos:** `[Sistema Gestor de BD, ej. PostgreSQL 15, MongoDB 6]`
- **Frontend:** `[Framework o librería de Frontend, ej. React 18, Vue 3]` o `[Librerías CSS, ej. Bootstrap 5, Tailwind CSS 3]`
- **Arquitectura:** `[Patrón de Arquitectura, ej. MVC, MVVM, Microservicios, Monolítico]`

## 2. Estructura del Proyecto

Describe aquí las carpetas más importantes del proyecto.

- `[ruta/a/fuentes]/`: **Código Fuente Principal.** `[Descripción del propósito de esta carpeta, ej. Contiene toda la lógica de la aplicación Django.]`
- `[ruta/a/modelos]/`: **Modelos / Entidades.** `[Descripción, ej. Define las estructuras de datos y la interacción con la BD a través del ORM.]`
- `[ruta/a/vistas]/`: **Vistas / Plantillas.** `[Descripción, ej. Contiene las plantillas de la interfaz de usuario (templates).]`
- `[ruta/a/controladores]/`: **Controladores / Rutas.** `[Descripción, ej. Maneja las peticiones HTTP entrantes y las dirige a la lógica apropiada.]`
- `[ruta/a/estaticos]/`: **Recursos Estáticos.** `[Descripción, ej. Contiene CSS, JavaScript del lado del cliente e imágenes.]`
- `[ruta/a/tests]/`: **Pruebas.** `[Descripción, ej. Contiene las pruebas unitarias y de integración.]`
- `[archivo_de_configuracion]`: **Configuración.** `[Descripción, ej. settings.py, contiene toda la configuración del proyecto.]`

## 3. Arquitectura y Flujo de Datos

Describe aquí el flujo típico de una petición en tu arquitectura.

**Ejemplo de Flujo:**

1.  La petición llega a `[Archivo de entrada, ej. urls.py, server.js]`.
2.  El enrutador `[Nombre del enrutador]` la dirige al controlador/vista `[Nombre del controlador]`.
3.  El controlador interactúa con el servicio o modelo `[Nombre del servicio/modelo]` para obtener o modificar datos.
4.  El controlador pasa los datos a la plantilla `[Nombre de la plantilla]` para renderizar la respuesta.
5.  La respuesta (normalmente HTML o JSON) se envía al cliente.

## 4. Base de Datos

- **ORM/ODM:** El proyecto utiliza `[Nombre del ORM/ODM, ej. SQLAlchemy, Mongoose, Eloquent]` para interactuar con la base de datos.
- **Configuración:** La conexión se configura en `[Ruta al archivo de configuración, ej. .env, settings.py]`.
- **Migraciones:** Las migraciones de esquema de la base de datos se gestionan con `[Herramienta de migración, ej. Alembic, Knex.js, migraciones de Django]`. Para ejecutar las migraciones, usa el comando `[comando_de_migracion]`.

## 5. Vistas y Plantillas

- **Motor de Plantillas:** Se utiliza `[Nombre del motor, ej. Jinja2, EJS, Blade, React DOM]`.
- **Plantillas Base:** Los layouts o plantillas principales se encuentran en `[Ruta a los layouts, ej. /templates/base.html]`.
- **Componentes:** Los componentes reutilizables de UI se encuentran en `[Ruta a los componentes, ej. /components]`.

## 6. Dependencias y Estilo

- **Gestor de Paquetes (Backend):** `[Gestor, ej. pip, npm, composer]`. El archivo de dependencias es `[Archivo, ej. requirements.txt, package.json, composer.json]`.
- **Gestor de Paquetes (Frontend):** `[Gestor, ej. npm, yarn]`. El archivo de dependencias es `package.json`.
- **Estilo de Código:** El proyecto sigue las guías de estilo de `[Guía de estilo, ej. PEP 8, StandardJS, PSR-12]`. Se utiliza un linter (`[Nombre del linter, ej. ESLint, Ruff, PHP_CodeSniffer]`) para asegurar la consistencia.
- **Comando de Linting:** `[Comando para ejecutar el linter]`

## 7. Pruebas (Testing)

- **Framework de Pruebas:** Se utiliza `[Framework, ej. Pytest, Jest, PHPUnit]`.
- **Ubicación:** Las pruebas se encuentran en el directorio `[ruta/a/tests]/`.
- **Comando para Ejecutar Pruebas:** `[Comando, ej. pytest, npm test, ./vendor/bin/phpunit]`
- **Regla:** Toda nueva funcionalidad o corrección de bug debe ir acompañada de su correspondiente prueba.

## 8. Cómo Empezar (Setup)

1.  Clona el repositorio: `git clone [URL_DEL_REPOSITORIO]`
2.  Instala dependencias de backend: `[Comando de instalación, ej. pip install -r requirements.txt]`
3.  Instala dependencias de frontend: `[Comando de instalación, ej. npm install]`
4.  Configura las variables de entorno: `cp .env.example .env` y edita el archivo `.env`.
5.  Ejecuta las migraciones de la base de datos: `[Comando de migración]`
6.  Inicia el servidor de desarrollo: `[Comando para iniciar, ej. python manage.py runserver, npm run dev]`
