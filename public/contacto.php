<?php
include ('header.html');
?>

<section class="banner-area relative"  id="home" style="padding:0;margin:0;height:45vh;background: url(img/B7.jpg) center;display: flex;justify-content: center;align-items: center;">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center" style="width:100%;">
      <div class="about-content col-lg-12" style="width:100%;">
        <h1 id="pagDif8" class="text-white" style="width:100%;background:rgba(93,97,99, 0.35);height:100px;display: flex;justify-content: center;align-items: center;"></h1>
      </div>
    </div>
  </div>
</section>



<!-- Start contact-page Area -->
<section class="contact-page-area section-gap">
  <div class="container">
      <h3 class="mb-10">Formulario de contacto</h3><br>
      <br>
    <div class="row">
      <div class="col-lg-6">
        <div class="form-area " id="myForm" class="contact-form text-right">
          <div class="row">
            <div class="col-lg-12 form-group">

              <div class="row">
                <div class="col-lg-6 form-group">
                  <input id="cnombre" placeholder="Ingresar nombre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresar Nombre'" class="common-input mb-20 form-control" required="" type="text">
                </div>
                <div class="col-lg-6 form-group">
                  <input id="ctelefono" placeholder="Ingresar teléfono (opcional)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresar teléfono'" class="common-input mb-20 form-control" type="text">
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 form-group">
                  <input id="cemail" placeholder="Ingresar correo" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingresar Correo'" class="common-input mb-20 form-control" required="" type="email">
                </div>
                <div class="col-lg-6 form-group">
                  <select class="form-select" id="casunto" style="height:51px;color:gray;font-size:12px;padding-left:7px">
                    <option value="">Seleccionar asunto</option>
                    <option value="Consultores Corporativos">CONSULTORES CORPORATIVOS</option>
                    <option value="Seguridad Social Financiera">SEGURIDAD SOCIAL EMPRESARIAL</option>
                    <option value="Administracion Financiera">ADMINISTRACION FINANCIERA</option>
                    <option value="Outsourcing">OUTSOURCING DE NOMINA</option>
                    <option value="HeadHunter">HEADHUNTER</option>
                    <option value="Consultoria en TI | Marketing">CONSULTORIA EN TI | MARKETING</option>
                    <option value="Otro">OTRO</option>
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 form-group">
                  <textarea class="common-textarea form-control" id="cmensaje" placeholder="Mensaje..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mensaje...'" required=""></textarea>
                </div>
              </div>
              <div id="mensaje_form"></div>
              <div class="row">
                <div class="col-lg-8 form-group">
                  <div class="switch-wrap d-flex justify-content-between" style="text-align:center">
										<div class="confirm-checkbox">
											<input type="checkbox" id="confirm-checkbox" >
											<label for="confirm-checkbox"></label>
										</div>
                    <p> Acepto el <a href="aviso.php" target="_blank" style="color:#8db4e2"> aviso de privacidad</a> de Grupo Lamhi</p>
									</div>
                </div>
                <div class="col-lg-4 form-group">
                  <div class="alert-msg" style="text-align: left;"></div>
                  <button class="genric-btn primary circle" id="btnFormC" onclick="enviarContactoC()">Enviar</button>
                </div>
              </div>
              <br>
            </div>

          </div>
        </div>
      </div>
      <div class="col-lg-6" style="padding-left:90px">


        <!-- INICIO DE ICONOS --->
        <div class="single-contact-address d-flex flex-row">
          <div class="icon">
            <span class="lnr lnr-home"></span>
          </div>
          <div class="contact-details">
            <h5>Cancún</h5>
            <p>
              Quintana Roo
            </p>
          </div>
        </div>
        <div class="single-contact-address d-flex flex-row">
          <div class="icon">
            <span class="lnr lnr-phone-handset"></span>
          </div>
          <div class="contact-details">
            <h5>(998) 884 9641 | (998) 364 1750</h5>
            <p>Lunes - Viernes</p>
          </div>
        </div>
        <div class="single-contact-address d-flex flex-row">
          <div class="icon">
            <span class="lnr lnr-envelope"></span>
          </div>
          <div class="contact-details">
            <h5>info@lamhi.com.mx</h5>
            <p>Envíanos un correo</p>
          </div>
        </div>
      </div>
      <!-- FIN DE ICONOS --->


    </div>
  </div>
</section>

<?php
include ('footer.html');
?>