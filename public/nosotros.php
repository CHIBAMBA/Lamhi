<?php
include ('header.html');
?>

<section class="banner-area relative"  id="home" style="padding:0;margin:0;height:65vh;background: url(img/B2.jpg) center;">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center" style="width:100%">
      <div class="about-content col-lg-12" style="width:100%">
        <br>
          <h1 id="pagDif1" class="text-white" style="width:100%;background:rgba(93,97,99, 0.35);height:100px;display: flex;justify-content: center;align-items: center;"></h1>
      </div>
    </div>
  </div>
</section>

<section class="open-hour-area" style="margin-top:-5%;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 open-hour-wrap" style="padding-top:0px;padding-bottom:90px">
        <div class="date-list d-flex flex-row justify-content-center" style="padding:0px">
          <p style="width:60%;margin-left:auto;margin-right:auto;text-align:justify">
              Somos una firma líder en Consultoría y Desarrollo de Negocios, cuyo compromiso con la calidad es TOTAL,
               al ofrecer alternativas confiables para el adecuado cumplimiento con
               las obligaciones y contribuciones FISCALES, IMSS, INFONAVIT y Laborales.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="service-area section-gap" style="margin-top:0px;padding-top:0px">
  <br>
  <div class="container" style="padding-top:25px;margin-top:10px">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <ul class="nav nav-pills" style="padding-left: 20px">
          <li class="nav-item" >
            <a id="lmision" style="padding:15px;font-weight:bold;background:#8db4e2;color:white" onclick="mision()" data-toggle="pill" href="#mision">Misión | Visión</a>
          </li>
          <li class="nav-item">
            <a id="lobjetivo" style="padding:15px;color:#004e58;font-weight:bold" data-toggle="pill" onclick="objetivo()" href="#objetivo">Objetivos</a>
          </li>
          <li class="nav-item">
            <a id="lpolitica" style="padding:15px;color:#004e58;font-weight:bold" data-toggle="pill" onclick="politica()" href="#politica">Políticas</a>
          </li>
        </ul>
        <br><br>
          <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane container active" id="mision">
              <blockquote class="generic-blockquote" style="text-align:justify;line-height:2.2;font-size:14px">
                <h5>Misión</h5><br>
                Somos una firma líder en consultoría y desarrollo de negocios, cuyo objetivo es optimizar y expandir las operaciones de nuestros clientes, ofreciéndoles soluciones legales, administrativas, fiscales, migratorias y de seguridad social de alta calidad.
                <br><br>
                <h5>Visión</h5><br>
                Consultoría y desarrolladora de negocios reconocida en México por su alto estándar de calidad en los servicios que ofrecemos, procurando que nuestros clientes puedan optimizar y expandir todos sus recursos.
              </blockquote>
            </div>
            <div class="tab-pane container fade" id="objetivo">
              <blockquote class="generic-blockquote" style="text-align:justify;line-height:2.2;font-size:14px">
                <h5>Objetivos</h5><br>
                ⦁	Ofrecer alternativas confiables para el adecuado cumplimiento con las obligaciones y contribuciones de nuestros clientes. <br><br>
                ⦁	Ayudar a las empresas a optimizar y expandir sus operaciones a nivel local e internacionalmente, permitiéndoles enfocarse en lo que es más importante: la venta de sus productos y servicios.

              </blockquote>
            </div>
            <div class="tab-pane container fade" id="politica">
              <blockquote class="generic-blockquote" style="text-align:justify;line-height:2.2;font-size:14px">
                <h5>Políticas</h5><br>
                ⦁	Brindar trato justo y esmerado a todos los clientes, en sus solicitudes y reclamos, considerando que el fin de la empresa es la optimización y expansión de sus oportunidades de sus negocios.
                <br>
                ⦁	Realizar evaluaciones periódicas constantemente a todos los procesos de la organización.
                <br>
                ⦁	Preservar el entorno ambiental y la seguridad de la comunidad en todo trabajo.
                <br>
                ⦁	Asegurar la satisfacción de nuestros clientes internos y externos respecto al desempeño de las actividades realizadas en la jornada laboral.
                <br>
                ⦁	Evaluar y certificar la competencia técnica del personal, asegurándonos de mejorar el desempeño de nuestros colaboradores para que los servicios sean de mejor calidad e innovación.
              </blockquote>
            </div>
        </div><br>
      </div>
      <div class="col-lg-6 col-md-6" >
        <br><br><br><br><br><br>
        <div class="embed-responsive embed-responsive-16by9">
          <video style="width:100%;height:100%;border:solid 1px gray" autoplay controls src="img/lamhi.mp4"></video>
      </div>
      </div>
    </div>
  </div>
</section>

<?php
include ('footer.html');
?>