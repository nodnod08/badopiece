<template>
  <div>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" :href="'/'">
          <img class="brand-logo" src="../../../public/storage/img/core-img/logo3.png" alt>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li :class="path_name == '/' ? 'nav-item active' : 'nav-item'">
              <a class="nav-link" :href="'/'">HOME</a>
            </li>
            <li :class="path_name == '/about-us' ? 'nav-item active' : 'nav-item'">
              <a class="nav-link" href="#">ABOUT US</a>
            </li>
            <li :class="path_name == '/shop/cartridges' ? 'nav-item active' : 'nav-item'">
              <a class="nav-link" :href="'/shop/cartridges'">CARTRIDGES</a>
            </li>
            <li :class="path_name == '/shop/printers' ? 'nav-item active' : 'nav-item'">
              <a class="nav-link" :href="'/shop/printers'">PRINTERS</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" :href="'/signin'">
                <button
                  :class="path_name == '/signin' ? 'btn btn-outline-dark btn-sm my-2 my-sm-0 active' : 'btn btn-outline-dark btn-sm my-2 my-sm-0'"
                  type="submit"
                >Signin</button>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" :href="'/signup'">
                <button
                  :class="path_name == '/signup' ? 'btn btn-outline-dark btn-sm my-2 my-sm-0 active' : 'btn btn-outline-dark btn-sm my-2 my-sm-0'"
                  type="submit"
                >Register</button>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>


<script>
export default {
  components: {},
  data() {
    return {
      path_name: ""
    };
  },
  created() {
    this.path_name = window.location.pathname;
    console.log(this.path_name);
  },
  methods: {}
};
</script>
<style>
.brand-logo {
  width: 140px;
  height: 60px;
}
</style>

