<?php
include_once("./views/header.php");
?>

    <main class="main_inv">
        <div class="container my-5">

            <h1 class="text-center mb-5">Investigaciones</h1>

            <div class="row">

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-media-hover">
                            <img src="./images/investigaciones/paneles.png" alt="Paneles Solares">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/e5Y2ZYkQBAQ?mute=1&autoplay=1&loop=1&playlist=e5Y2ZYkQBAQ" 
                                        title="Video sobre paneles solares" allow="autoplay" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Optimización de Paneles Solares con Seguimiento Inteligente</h5>
                            <p class="card-text">
                                Con el objetivo de aumentar el aprovechamiento energético de sistemas fotovoltaicos, 
                        un grupo de investigadores ha desarrollado un sistema de seguimiento solar automatizado. 
                        Utilizando algoritmos de optimización como lógica difusa y control PID, el sistema permite orientar 
                        los paneles solares según la posición del sol en tiempo real. A través de simulaciones en MATLAB 
                        y prototipos funcionales con servomotores y sensores de luz, se ha demostrado un aumento significativo 
                        en la eficiencia energética. Este proyecto busca contribuir a la transición hacia energías limpias,
                         ofreciendo una alternativa de bajo costo adaptable a hogares y comunidades rurales.
                            </p>
                            <br>
                            <div class="text-center">
                                <a href="./miembros.php" class="btn-custom-inv mt-auto">Ver Investigadores</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-media-hover">
                            <img src="./images/investigaciones/alzheimer.png" alt="Resonancia Magnética Cerebral">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/d4_5A2JO72g?mute=1&autoplay=1&loop=1&playlist=d4_5A2JO72g"
                                        title="Video sobre Alzheimer" allow="autoplay" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">IA para la Detección Temprana del Alzheimer con Resonancia Magnética</h5>
                            <p class="card-text">
                                El Alzheimer, una de las principales enfermedades neurodegenerativas, presenta síntomas visibles 
                        solo en etapas avanzadas. Por ello, investigadores han desarrollado un modelo basado en redes neuronales 
                        convolucionales (CNN) para analizar imágenes por resonancia magnética cerebral y detectar patrones tempranos 
                        relacionados con la enfermedad. Utilizando datasets clínicos internacionales y técnicas de aprendizaje profundo, 
                        el modelo logró una precisión superior al 90% en pruebas de validación. Esta herramienta representa un gran 
                        avance en medicina preventiva, ofreciendo a los profesionales de la salud una herramienta no invasiva y eficaz 
                        para diagnósticos tempranos.
                            </p>
                            <div class="text-center">
                                <a href="./miembros.php" class="btn-custom-inv mt-auto">Ver Investigadores</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-media-hover">
                            <img src="./images/investigaciones/microalgas.png" alt="Microalgas en un laboratorio">
                            <div class="ratio ratio-16x9">
                                <iframe src="https://www.youtube.com/embed/X4uZLi2QPEE?mute=1&autoplay=1&loop=1&playlist=X4uZLi2QPEE"
                                        title="Video sobre microalgas" allow="autoplay" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Uso de Microalgas para el Tratamiento de Aguas Residuales Urbanas</h5>
                            <p class="card-text">
                                Este proyecto explora el uso de microalgas como alternativa ecológica en el tratamiento 
                        de aguas residuales. Mediante biorreactores cerrados, especies como Chlorella vulgaris 
                        y Spirulina se utilizan para absorber nutrientes y contaminantes presentes en aguas urbanas, 
                        como nitratos, fosfatos y metales pesados. Las pruebas de laboratorio mostraron reducciones 
                        superiores al 80% en contaminantes, además de generar biomasa útil para biocombustibles. 
                        Esta solución sostenible apunta a reemplazar procesos costosos y contaminantes, proponiendo 
                        una opción accesible y ambientalmente responsable para el saneamiento de agua.
                            </p>
                            <br>
                            <div class="text-center">
                                <a href="./miembros.php" class="btn-custom-inv mt-auto">Ver Investigadores</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 
        </div> 
    </main>

<?php
include_once("./views/footer.php");
?>