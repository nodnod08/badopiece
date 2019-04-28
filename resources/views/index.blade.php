{{-- @extends('navbar')

@section('content')
  <div class="showcase">
    <div class="row container">
      <div class="col l6">
        <div class="first-offer card grey darken-4 z-depth-5">
          <div class="card-content white-text">
            <span class="card-title">Give you a lot of Choice</span>
            <p>We make your business comportable on our products.</p>
            <br>
            <p>WE OFFER SERVICES AND PRODUCTS:</p>
            <div class="row">
              <div class="col l6">
                <ul class="offer-ul">
                  <li><i style="font-size: 11px;" class="material-icons prefix cyan accent-2">adjust</i> Multifuntion Printers</li>
                  <li><i style="font-size: 11px;" class="material-icons prefix cyan accent-2">adjust</i> Colored And Monochrome</li>
                  <li><i style="font-size: 11px;" class="material-icons prefix cyan accent-2">adjust</i> Lan, USB And WI-FI Connected</li>
                  <li><i style="font-size: 11px;" class="material-icons prefix cyan accent-2">adjust</i> Fast And Reliable Printers</li>
                  <li><i style="font-size: 11px;" class="material-icons prefix cyan accent-2">adjust</i> Good Quality Printout</li>
                </ul>
              </div>
              <div class="col l6">
                <ul class="offer-ul">
                  <li><i style="font-size: 11px;" class="material-icons prefix cyan accent-2">adjust</i> Preventive Maintenance</li>
                  <li><i style="font-size: 11px;" class="material-icons prefix cyan accent-2">adjust</i> Good Support And Downtime Blocker</li>
                  <li><i style="font-size: 11px;" class="material-icons prefix cyan accent-2">adjust</i> Technical Support</li>
                  <li><i style="font-size: 11px;" class="material-icons prefix cyan accent-2">adjust</i> Guide And Installation Instruction</li>
                  <li><i style="font-size: 11px;" class="material-icons prefix cyan accent-2">adjust</i> Good Customer Assist</li>
                </ul>
              </div>
            </div>
          </div>
          <hr style="margin: 0 5%;">
          <br>
        </div>
      </div>
    </div>
  </div>
  <div class="row section-first">
    <div class="container center-align">
      <h4>WHY CHOOSE US?</h4>
      <div class="col l4">
        <img class="icon-photo" src="{{ asset('storage/img/bg-img/save.png') }}" alt="">
        <h6>GUARANTEE SAVE YOUR MONEY</h6>
        <p>A lot of choice from our products that applicable to your budgets and save your money for purchasing.</p>
      </div>
      <div class="col l4">
        <img class="icon-photo" src="{{ asset('storage/img/bg-img/durable.png') }}" alt="">
        <h6>PRODUCTS DURABILITY ARE PERFECT</h6>
        <p>Durability of all printers and cartridges are tested and ensured for the use of all.</p>
      </div>
      <div class="col l4">
        <img class="icon-photo" src="{{ asset('storage/img/bg-img/support.png') }}" alt="">
        <h6>GOOD ASSIST AND FAST SUPPORT</h6>
        <p>Will give you an immediate support and information, also a fast support for avoiding downtime.</p>
      </div>
    </div>
  </div>
  <div class="showcase-second">
    <div class="container">
      <div class="center-align">
        <button class="center-shop"><a href="{{ route('cartridges') }}" class="a-button">START SHOPPING</a></button>
      </div>
    </div>
  </div>
  <div class="client">
    <div class="container">
      <div class="row">
        <div class="col l12 col m12 col s12 col xs12 center-align">
          <h4>HERE IS SOME OF OUR BIG CLIENTS</h4>
          <p>We introduce some of our long time clients who still trust our services.</p>
        </div>
      </div>
      <div class="row">
        <div class="col l3 col m12 col s12 col xs12 center-align">
          <a href="https://online-appointment.marina.gov.ph/">
            <img height="200" src="{{ asset('storage/img/core-img/client-1.png') }}" alt="">
          </a>
        </div>
        <div class="col l3 col m12 col s12 col xs12 center-align">
          <a href="https://www.nykline.com/ecom/CUP_HOM_3000.do?redir=Y">
            <img height="200" src="{{ asset('storage/img/core-img/client-2.png') }}" alt="">
          </a>
        </div>
        <div class="col l3 col m12 col s12 col xs12 center-align">
          <a href="http://www.tsmphil.com.ph/">
            <img height="200" src="{{ asset('storage/img/core-img/client-3.png') }}" alt="">
          </a>
        </div>
        <div class="col l3 col m12 col s12 col xs12 center-align">
          <a href="http://www.elburgshipmanagement.com.ph/esmv2/">
            <img height="200" src="{{ asset('storage/img/core-img/client-4.png') }}" alt="">
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col l3 col m12 col s12 col xs12 center-align">
          <a href="http://www.snackattack.ph/">
            <img height="200" src="{{ asset('storage/img/core-img/client-5.png') }}" alt="">
          </a>
        </div>
        <div class="col l3 col m12 col s12 col xs12 center-align">
          <a href="https://robocash.ph/">
            <img height="200" src="{{ asset('storage/img/core-img/client-6.png') }}" alt="">
          </a>
        </div>
        <div class="col l3 col m12 col s12 col xs12 center-align">
          <a href="http://ssc.edu.ph/">
            <img height="200" src="{{ asset('storage/img/core-img/client-7.png') }}" alt="">
          </a>
        </div>
        <div class="col l3 col m12 col s12 col xs12 center-align">
          <a href="https://www.chinabank.ph/personal.aspx">
            <img height="200" src="{{ asset('storage/img/core-img/client-8.png') }}" alt="">
          </a>
        </div>
      </div>
    </div>
  </div>
  <subscribe-component></subscribe-component>
@endsection --}}
@extends('template')

@section('content')
  <div id="index">
    <index-component></index-component>
  </div>
@endsection
