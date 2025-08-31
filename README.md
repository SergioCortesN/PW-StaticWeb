# TecNM News

TecNM News es un sitio web informativo desarrollado como proyecto académico para la materia de **Páginas Web** en el Tecnológico Nacional de México (TecNM). El objetivo principal fue aplicar los conocimientos adquiridos sobre HTML y CSS para crear un portal que difunda investigaciones, muestre perfiles de miembros y facilite el contacto con una red de investigadores.

## Descripción

Durante el desarrollo de la página se realizaron las siguientes actividades:

- **Estructuración del sitio:** Se crearon varias páginas HTML (`index.html`, `miembros.html`, `investigaciones.html`, `contacto.html`) para organizar la información en secciones claras.
- **Diseño responsivo:** Se utilizó CSS moderno, incluyendo anidamiento tipo SCSS, para lograr un diseño atractivo y adaptable a diferentes dispositivos.
- **Galería de investigaciones:** Se incluyeron imágenes y descripciones de proyectos científicos relevantes.
- **Listado de miembros:** Se implementó una tabla con fotos y datos de los investigadores participantes.
- **Formulario de contacto:** Se desarrolló un formulario funcional para que los usuarios puedan enviar mensajes.
- **Navegación intuitiva:** Se añadió un menú de navegación para facilitar el acceso a todas las secciones.

### Ejemplo de la página principal (`index.html`):

```html
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>TecNM News - Inicio</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <h1>TecNM News</h1>
    <nav>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="miembros.html">Miembros</a></li>
        <li><a href="investigaciones.html">Investigaciones</a></li>
        <li><a href="contacto.html">Contacto</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section>
      <h2>Bienvenidos a TecNM News</h2>
      <p>Descubre las investigaciones más recientes y conoce a los miembros destacados de nuestra red.</p>
      <img src="images/investigaciones/alzheimer.png" alt="Investigación sobre Alzheimer" width="300">
    </section>
  </main>
  <footer>
    <p>&copy; 2025 TecNM News</p>
  </footer>
</body>
</html>
```

## Requerimientos

- Navegador web moderno (Chrome, Firefox, Edge, Safari)
- Servidor web local (opcional, para mejor manejo de rutas relativas a imágenes y CSS)

## Instalación

1. **Clona o descarga este repositorio:**

   ```sh
   git clone <URL-del-repositorio>
   ```

2. **Coloca la carpeta en tu servidor local** (opcional, pero recomendado para evitar problemas de rutas):

   - Puedes usar [Live Server](https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer) en Visual Studio Code o cualquier servidor HTTP simple.

3. **Estructura de carpetas:**

   ```
   contacto.html
   index.html
   investigaciones.html
   miembros.html
   README.md
   css/
       contacto.css
       investigaciones.css
       miembros.css
       style.css
   images/
       investigaciones/
           alzheimer.png
           Lluvia Celaya.jpg
           microalgas.png
           paneles.png
       investigadores/
           download (1).jpeg
           download (2).jpeg
           download (3).jpeg
           download (4).jpeg
           download.jpeg
       logos/
           facebook.png
           X.png
   ```

## Uso

1. **Abre `index.html` en tu navegador** para ver la página principal.
2. Navega entre las secciones usando el menú superior.
3. En la sección de contacto, puedes enviar un mensaje usando el formulario.

## Contribución

¡Las contribuciones son bienvenidas!

1. Haz un fork del repositorio.
2. Crea una rama para tu funcionalidad o corrección:  
   `git checkout -b mi-nueva-funcionalidad`
3. Realiza tus cambios y haz commit:  
   `git commit -am 'Agrega nueva funcionalidad'`
4. Haz push a la rama:  
   `git push origin mi-nueva-funcionalidad`
5. Abre un Pull Request.