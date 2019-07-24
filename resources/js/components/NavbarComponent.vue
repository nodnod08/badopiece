<template>
  <div>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" :href="'/'">
          <img class="brand-logo" src="../../../public/storage/img/core-img/LOGO3.png" alt />
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
              <a class="nav-link" href="/about-us">ABOUT US</a>
            </li>
            <li :class="path_name == '/products' ? 'nav-item active' : 'nav-item'">
              <a class="nav-link" :href="'/products'">PRODUCTS</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li v-if="username == 'none'" class="nav-item">
              <a class="nav-link" :href="'/signin'">
                <button
                  :class="path_name == '/signin' ? 'btn btn-outline-dark btn-sm my-2 my-sm-0 active' : 'btn btn-outline-dark btn-sm my-2 my-sm-0'"
                  type="submit"
                >Signin</button>
              </a>
            </li>
            <li v-if="username == 'none'" class="nav-item">
              <a class="nav-link" :href="'/signup'">
                <button
                  :class="path_name == '/signup' ? 'btn btn-outline-dark btn-sm my-2 my-sm-0 active' : 'btn btn-outline-dark btn-sm my-2 my-sm-0'"
                  type="submit"
                >Register</button>
              </a>
            </li>
            <li v-else class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >{{ username }}</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a
                  :class="path_name == '/transactions' ? 'dropdown-item active' : 'dropdown-item'"
                  :href="'/transactions'"
                >Transactions</a>
                <a
                  :class="path_name == '/account_settings' ? 'dropdown-item active' : 'dropdown-item'"
                  href="#"
                >Account settings</a>
                <a class="dropdown-item" :href="'logout_user_sesion_destroy'">Logout</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" :href="'/cart'">
                <button
                  :class="path_name == '/cart' ? 'btn btn-dark btn-sm my-2 my-sm-0 active' : 'btn btn-dark btn-sm my-2 my-sm-0'"
                  type="submit"
                >
                  <i class="fas fa-shopping-cart"></i>
                  <span v-if="count > 0" class="badge badge-light">{{ count }}</span>
                </button>
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
  props: ["username", "count"],
  components: {},
  data() {
    return {
      path_name: ""
    };
  },
  created() {
    this.path_name = window.location.pathname;
  },
  watch: {
    username: function(newVal, oldVal) {
      this.username = newVal;
    },
    count: function(newVal, oldVal) {
      this.count = newVal;
    }
  },
  methods: {}
};
</script>
<style>
.brand-logo {
  width: 140px;
  height: 60px;
}

div.dropdown-menu > a.active {
  background: #404040;
  color: #fff;
}
</style>

