<template>
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <ul class="main">
            <li>
              <h5>Our Team</h5>
            </li>
            <li>
              <i class="fas fa-user"></i> Ms. Emma Argon ( Owner )
            </li>
            <li>
              <i class="fas fa-user"></i> Ms. Trixie Racoma ( Web Developer of this site )
            </li>
            <li>
              <i class="fas fa-user"></i> Ms. Jeanne Paquia ( Web Developer of this site )
            </li>
            <li>
              <i class="fas fa-user"></i> Ms. Kisha Mae Sidon ( Web Developer of this site )
            </li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul>
            <li>
              <h5>Contact us</h5>
            </li>
            <li>
              <i class="fas fa-envelope"></i> badopiece.ph@gmail.com
            </li>
            <li>
              <i class="fas fa-envelope"></i> badopiece.inquire@gmail.com
            </li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul>
            <li>
              <h5>Locate us</h5>
            </li>
            <li>
              <i class="fas fa-map-marker-alt"></i> Calamba, Laguna
            </li>
            <li>
              <i class="fas fa-calendar-alt"></i> Store hrs. Monday to Friday ( 8:00 am to 5:00 pm )
            </li>
          </ul>
        </div>
      </div>
      <br />
      <div class="row">
        <div class="col-lg-6">
          <ul class="main">
            <li>
              <p>© {{ year }} Copyright Badopiece Collection | Clothes and Accessories</p>
            </li>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul class="main">
            <li>
              <h5 class="text-right">
                <a :href="'https://www.facebook.com/badopiececollection/'">
                  <i class="fab fb-page fa-facebook-square"></i>
                </a>
                <a :href="'#'">
                  <i class="fab fb-page fa-twitter-square"></i>
                </a>
                <a :href="'#'">
                  <i class="fab fa-instagram"></i>
                </a>
              </h5>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: false,
      email: "",
      year: ""
    };
  },
  created() {
    this.year = new Date().getFullYear();
  }
};
</script>
<style>
.footer {
  padding-top: 20px;
  background: #404040;
  color: #ffffff;
}
li {
  list-style: none;
}
.footer h5 {
  margin-bottom: 10px;
}

.fb-page,
.fa-instagram {
  color: #fff;
}

.payment {
  background: #fff;
  padding: 2%;
}

@media (max-width: 480px) {
  .payment-photo {
    height: 50px;
    width: 300px;
  }
}

@media (max-width: 390px) {
  .payment-photo {
    height: 40px;
    width: 250px;
  }
}

@media (max-width: 350px) {
  .payment-photo {
    height: 35px;
    width: 200px;
  }
}

ul.main {
  padding-left: 0;
}
</style>

