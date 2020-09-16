<style>
  .btn-success {
    background: #25D366 !important;
  }

  .img-carousel {
    width: 800px;
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    position: relative;
    z-index: 2;
    color: #fff;
  }

  .img-carousel:before {
    position: absolute;
    content: "";
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background-color: #333;
    z-index: -1;
    opacity: .85;
  }

  @media screen and (max-width: 768px) {
    .img-carousel {
      width: 100%;
    }
  }

  @import url("http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic");
  @import url("//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css");

  .event-list {
    list-style: none;
    font-family: 'Lato', sans-serif;
    margin: 0px;
    padding: 0px;
  }

  .event-list>li {
    background-color: rgb(255, 255, 255);
    box-shadow: 0px 0px 5px rgb(51, 51, 51);
    box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.7);
    padding: 0px;
    margin: 0px 0px 20px;
  }

  .event-list>li>time {
    display: inline-block;
    width: 100%;
    color: rgb(255, 255, 255);
    /* background-color: rgb(197, 44, 102); */
    background-color: #004e58;
    padding: 5px;
    text-align: center;
    text-transform: uppercase;
  }

  .event-list>li:nth-child(even)>time {
    background-color: #00afc7;
    /* background-color: rgb(165, 82, 167); */
  }

  .event-list>li>time>span {
    display: none;
  }

  .event-list>li>time>.day {
    display: block;
    font-size: 56pt;
    font-weight: 100;
    line-height: 1;
  }

  .event-list>li time>.month {
    display: block;
    font-size: 24pt;
    font-weight: 900;
    line-height: 1;
  }

  .event-list>li>img {
    width: 100%;
  }

  .event-list>li>.info {
    padding-top: 5px;
    text-align: center;
  }

  .event-list>li>.info>.title {
    font-size: 17pt;
    font-weight: 700;
    margin: 0px;
  }

  .event-list>li>.info>.desc {
    font-size: 13pt;
    font-weight: 300;
    margin: 0px;
  }

  .event-list>li>.info>ul {
    display: table;
    list-style: none;
    margin: 10px 0px 0px;
    padding: 0px;
    width: 100%;
    text-align: center;
  }

  .event-list>li>.info>ul>li {
    display: table-cell;
    cursor: pointer;
    color: rgb(30, 30, 30);
    font-size: 11pt;
    font-weight: 300;
    padding: 3px 0px;
  }

  .event-list>li>.info>ul>li>a {
    display: block;
    width: 100%;
    color: rgb(30, 30, 30);
    text-decoration: none;
  }

  .event-list>li>.info>ul>li:hover {
    color: rgb(30, 30, 30);
    background-color: rgb(200, 200, 200);
  }

  @media (min-width: 768px) {
    .event-list>li {
      position: relative;
      display: block;
      width: 100%;
      height: 120px;
      padding: 0px;
    }

    .event-list>li>time,
    .event-list>li>img {
      display: inline-block;
    }

    .event-list>li>time,
    .event-list>li>img {
      width: 120px;
      float: left;
    }

    .event-list>li>.info {
      background-color: rgb(245, 245, 245);
      overflow: hidden;
    }

    .event-list>li>time,
    .event-list>li>img {
      width: 120px;
      height: 120px;
      padding: 0px;
      margin: 0px;
    }

    .event-list>li>.info {
      position: relative;
      height: 120px;
      text-align: left;
      padding-right: 40px;
    }

    .event-list>li>.info>.title,
    .event-list>li>.info>.desc {
      padding: 0px 10px;
    }

    .event-list>li>.info>ul {
      position: absolute;
      left: 0px;
      bottom: 0px;
    }
  }
</style>
<!-- <script src="https://kit.fontawesome.com/411d4749fe.js"></script> -->

<?php
include ('header.html');
?>

<section class="banner-area relative" id="home"
  style="padding:0;margin:0;height:50vh;background: url('img/terminos.jpg') center;">
  <div class="overlay overlay-bg"></div>
  <div class="container">
    <div class="row d-flex align-items-center justify-content-center" style="width:100%">
      <div class="about-content col-lg-12" style="width:100%">
        <br>
        <h1 id="pagDif12" class="text-white"
          style="width:100%;background:rgba(93,97,99, 0.35);height:100px;display: flex;justify-content: center;align-items: center;">
        </h1>
      </div>
    </div>
  </div>
</section>

<section class="open-hour-area" style="margin-top:-5%;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 open-hour-wrap" style="padding-top:0px;padding-bottom:0px">
        <div class="date-list d-flex flex-row justify-content-center" style="padding:0px;margin-bottom:30px">
          <div id="carouselLamhi" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselLamhi" data-slide-to="0" class="active"></li>
              <li data-target="#carouselLamhi" data-slide-to="1"></li>
              <!-- <li data-target="#carouselLamhi" data-slide-to="2"></li> -->
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="img-carousel d-block" src="img/calendario/Banner3.jpg" alt="Primer slide">
                <div class="carousel-caption d-none d-md-block p-0">
                  <a href="https://api.whatsapp.com/send?phone=529981400883&text=¡Hola!%20¿Podrían%20proporcionarme%20más%20información%20sobre%20el%20Taller%20SIROC%20en%20la%20práctica?%20"
                    target="_blank">
                    <button class="btn btn-success"><i class="fab fa-whatsapp"></i> Saber más</button>
                  </a>
                </div>
              </div>
              <div class="carousel-item">
                <img class="img-carousel d-block" src="img/calendario/Banner4.jpg" alt="Segundo slide">
                <div class="carousel-caption d-none d-md-block p-0">
                  <a href="https://api.whatsapp.com/send?phone=529981400883&text=¡Hola!%20¿Podrían%20proporcionarme%20más%20información%20sobre%20el%20Taller%20Nómina%20en%20la%20práctica?%20"
                    target="_blank">
                    <button class="btn btn-success"><i class="fab fa-whatsapp"></i> Saber más</button>
                  </a>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselLamhi" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselLamhi" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mt-4">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
        <h2 class="text-right" style="color:#033442;">2019</h2>
        <hr style="border: 1px solid #033442;">
        <ul class="event-list">
          <li>
            <time datetime="2014-07-20" >
              <span class="day">12</span>
              <span class="month">Nov</span>
              <span class="year">2019</span>
              <span class="time">09:00 - 16:00</span>
            </time>
            <img src="img/calendario/Banner4.jpg" alt="Conferencia SIROC">
            <div class="info ">
              <h2 class="title ">Nómina</h2>
              <p class="desc ">Taller práctico</p>
              <ul>
                <li style="width:100%;background:#25D366;"><a
                    href="https://api.whatsapp.com/send?phone=529981400883&text=¡Hola!%20¿Podrían%20proporcionarme%20más%20información%20sobre%20el%20Taller%20Nómina%20en%20la%20práctica?%20"
                    target="_blank"><i class="fab fa-whatsapp"></i> Pedir información</a></li>
              </ul>
            </div>
          </li>
          <li>
            <time datetime="2014-07-20" class="bg-secondary">
                <span class=" day">23</span>
              <span class="month">Oct</span>
              <span class="year">2019</span>
              <span class="time">09:00 - 16:00</span>
            </time>
            <img src="img/calendario/Banner3.jpg" alt="Conferencia SIROC">
            <div class="info bg-secondary">
              <h2 class="title text-white">SIROC</h2>
              <p class="desc text-white">Taller práctico</p>
              <!-- <ul>
                <li style="width:100%;background:#25D366;"><a
                    href="https://api.whatsapp.com/send?phone=529981400883&text=¡Hola!%20¿Podrían%20proporcionarme%20más%20información%20sobre%20el%20Taller%20Nómina%20en%20la%20práctica?%20"
                    target="_blank"><i class="fab fa-whatsapp"></i> Pedir información</a></li>
              </ul> -->
            </div>
          </li>
          <li>
            <time datetime="2014-07-20" class="bg-secondary">
              <span class="day">2</span>
              <span class="month">Oct</span>
              <span class="year">2019</span>
              <span class="time">09:00 - 16:00</span>
            </time>
            <img src="img/calendario/Banner2.jpg" alt="Conferencia SIROC">
            <div class="info bg-secondary">
              <h2 class="title text-white">Nómina</h2>
              <p class="desc text-white">Taller práctico</p>
              <!-- <ul>
                  <li style="width:100%;background:#25D366;"><a
                      href="https://api.whatsapp.com/send?phone=529981400883&text=¡Hola!%20¿Podrían%20proporcionarme%20más%20información%20sobre%20el%20Taller%20Nómina%20en%20la%20práctica?%20"
                      target="_blank"><i class="fab fa-whatsapp"></i> Pedir información</a></li>
                </ul> -->
            </div>
          </li>
          <li>
            <time datetime="2014-07-20" class="bg-secondary">
              <span class="day">26</span>
              <span class="month">Sep</span>
              <span class="year">2019</span>
              <span class="time">09:00 - 16:00</span>
            </time>
            <img src="img/calendario/Banner1.jpg" alt="Conferencia SIROC">
            <div class="info bg-secondary">
              <h2 class="title text-white">SIROC</h2>
              <p class="desc text-white">Taller práctico</p>
              <!-- <ul>
                  <li style="width:100%;background:#25D366;"><a
                      href="https://api.whatsapp.com/send?phone=529981400883&text=¡Hola!%20¿Podrían%20proporcionarme%20más%20información%20sobre%20el%20Taller%20SIROC%20en%20la%20práctica?%20"
                      target="_blank"><i class="fab fa-whatsapp"></i> Pedir información</a></li>
                </ul> -->
            </div>
          </li>
          <li>
            <time datetime="2014-07-20" class="bg-secondary">
              <span class="day">6-7</span>
              <span class="month">Agt</span>
              <span class="year">2019</span>
              <span class="time">09:00 - 14:00</span>
            </time>
            <img src="img/calendario/TallerNIS.jfif" alt="Conferencia SIROC">
            <div class="info bg-secondary">
              <h2 class="title text-white">Taller NIS</h2>
              <p class="desc text-white">Nómina | IMSS | SIROC</p>
            </div>
          </li>
          <li>
            <time datetime="2014-07-20" class="bg-secondary">
              <span class="day">26</span>
              <span class="month">Jun</span>
              <span class="year">2019</span>
              <span class="time">18:00</span>
            </time>
            <img src="img/calendario/ConferenciaSIROC.jpg" alt="Conferencia SIROC">
            <div class="info bg-secondary">
              <h2 class="title text-white">SIROC</h2>
              <p class="desc text-white">Conferencia para constructoras</p>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php
include ('footer.html');
?>