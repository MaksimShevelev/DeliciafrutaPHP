<section class="contactos">
    <h2>Contactos</h2>
    <div id="contacto">
        <div id="form">
            <h3>Suscribete, para recibir novedades y ofertas</h3>
            <form action="index.php?sec=respuesta" method="POST">
                <div class="mb-3">
                    <label for="InputNombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="InputNombre" name="nombre"
                        placeholder="Ingrese su nombre" required pattern="[A-Za-zА-Яа-я\s]+" title="Ingrese solo letras, por favor">
                </div>
                <div class="mb-3">
                    <label for="InputApellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="InputApellido" name="apellido"
                        placeholder="Ingrese su apellido" required pattern="[A-Za-zА-Яа-я\s]+" title="Ingrese solo letras, por favor">
                </div>
                <div class="mb-3">
                    <label for="InputEmail" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="InputEmail" name="email"
                        placeholder="example@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="InputTel" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="InputTel" name="tel"
                        placeholder="Ingrese su número de teléfono" required pattern="\d+" title="Ingrese solo números, por favor">
                </div>
                <div class="mb-3">
                    <label for="InputComment" class="form-label">Comentario</label>
                    <textarea class="form-control" id="InputComment" name="comment" rows="3"
                        placeholder="Escribe algo..."></textarea>
                </div>
                <div class="terminos">
                    <input type="checkbox" class="form-check-input" id="exampieCheck1" required>
                    <label for="exampieCheck1" class="form-check-label ms-2">Aceptar los términos y condiciones</label>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
        <div id="mapa">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.992669539754!2d-58.39857512439329!3d-34.604346872954046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccaea670d4e67%3A0x2198c954311ad6d9!2sEscuela%20Da%20Vinci%20Primera%20Escuela%20de%20Arte%20Multimedial!5e0!3m2!1sru!2sar!4v1706090784208!5m2!1sru!2sar"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
