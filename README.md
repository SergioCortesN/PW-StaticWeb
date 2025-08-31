# TecNM News

TecNM News es un sitio web informativo que presenta investigaciones, miembros y datos de contacto de una red de investigadores del Tecnológico Nacional de México (TecNM). El sistema está diseñado para difundir proyectos científicos, mostrar perfiles de investigadores y facilitar la comunicación con el equipo.

## Descripción

El sitio cuenta con varias secciones:

- **Inicio (index.html):** Resumen de las investigaciones destacadas.
- **Miembros (miembros.html):** Tabla con información y fotos de los investigadores.
- **Investigaciones (investigaciones.html):** Detalles de proyectos científicos, imágenes y videos relacionados.
- **Contacto (contacto.html):** Formulario para enviar mensajes y datos de contacto de la red.

El diseño utiliza CSS moderno (con anidamiento tipo SCSS) para una experiencia visual atractiva y responsiva.

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

## Licencia

Este proyecto está bajo la Licencia MIT. Consulta el archivo `LICENSE` para más detalles.
