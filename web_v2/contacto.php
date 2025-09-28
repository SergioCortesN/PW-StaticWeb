<?php
include_once("./views/header.php");
?>

    <main class="main_contacto">
        <div class="container py-5">

            <div class="text-center">
                <h1>Contacto</h1>
                <h3>Red de investigadores del TecNM</h3>
            </div>

            <div class="div_text text-center my-4">
                <p class="mx-3">
                    Tel: <a href="tel:+524421123456"> 442 112 3456</a>
                </p>
                <p class="mx-3">
                    Email: <a href="mailto:22031446@itcelaya.edu.mx">22031446@itcelaya.edu.mx</a>
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <form class="form_contacto text-center" action="enviarmensaje.html" method="get">
                        
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Escriba su nombre:</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" minlength="5" maxlength="30" required>
                        </div>

                        <div class="mb-3">
                            <label for="tipo" class="form-label">Tipo de comentario:</label>
                            <select class="form-select" name="tipo" id="tipo">
                                <option value="comentario">Comentario</option>
                                <option value="queja">Queja</option>
                                <option value="inscripcion">Inscripción</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="mensaje" class="form-label">Escriba su mensaje:</label>
                            <textarea class="form-control" name="mensaje" id="mensaje" rows="6" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-custom-contact">Enviar</button>

                    </form>
                </div>
            </div>
        </div>
    </main>

<?php
include_once("./views/footer.php");
?>