<div>
   <section id="contact" class="contact" >
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row mt-1">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Localización:</h4>
                <p>Blumenau, Brasil</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>jeisonflores17s@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Telefono:</h4>
                <p>+5592992778718</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">
            <form>
               @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text"  class="form-control" id="name" placeholder="Nombre" wire:model="nombre">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control"  id="email" placeholder="Correo electrónico" wire:model="correo">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control"  id="subject" placeholder="Asunto" wire:model="asunto">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control"  rows="5" placeholder="Mensaje" wire:model="descripcion"></textarea>
              </div>
              <div class="text-center"><button class="btn btn-primary" wire:click.prevent="enviarcontacto()">Enviar mensaje</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
</div>
