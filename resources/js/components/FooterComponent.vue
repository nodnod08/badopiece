<template>
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <ul>
            <li>
              <h5>Our Team</h5>
            </li>
            <li>
              <i class="fas fa-user"></i> Mr. JP Escartin
            </li>
            <li>
              <i class="fas fa-user"></i> MR. Riki Pardo
            </li>
            <li>
              <i class="fas fa-user"></i> MR. Alvin Valeza
            </li>
            <li>
              <i class="fas fa-user"></i> MR. Marlon Dungca
            </li>
            <li>
              <i class="fas fa-user"></i> MR. Jonard Lero Escartin
            </li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul>
            <li>
              <h5>Contact us</h5>
            </li>
            <li>
              <i class="fas fa-envelope"></i> ppe.sales@proprintsenterprise.com
            </li>
            <li>
              <i class="fas fa-envelope"></i> techsupport@proprintsenterprise.com
            </li>
            <li>
              <i class="fas fa-phone"></i> Landline 517-3813
            </li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-4">
          <ul>
            <li>
              <h5>Locate us</h5>
            </li>
            <li>
              <i class="fas fa-map-marker-alt"></i> 586 Jenny’s Ave., Maybunga, Pasig City Sison Mansion, Rockefeller St., San Isidro, Makati City
            </li>
            <li>
              <i class="fas fa-calendar-alt"></i> Office hrs. Monday to Friday ( 8:00 am to 5:00 pm )
            </li>
          </ul>
        </div>
      </div>
      <br>
      <br>
      <div class="row">
        <div class="col-lg-6">
          <ul>
            <li>
              <p>© {{ year }} Copyright Pro Prints Enterprise | Cartridges and Printers</p>
            </li>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul>
            <li>
              <h5 class="text-right">
                <a :href="'https://m.facebook.com/1164924420327481'">
                  <i class="fab fb-page fa-facebook-square"></i>
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

.fb-page {
  color: #fff;
}
</style>

