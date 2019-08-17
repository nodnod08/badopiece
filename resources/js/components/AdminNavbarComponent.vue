<template>
  <header id="header" class="header">
    <div class="top-left">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">
          <img width="110" height="40" :src="'/storage/img/core-img/LOGO3.png'" alt="Logo" />
        </a>
        <a class="navbar-brand hidden" href="#">
          <img :src="'storage/img/core-img/LOGO3.png'" alt="Logo" />
        </a>
        <a id="menuToggle" class="menutoggle">
          <i class="fa fa-bars"></i>
        </a>
      </div>
    </div>
    <div class="top-right">
      <div class="header-menu">
        <div class="header-left">
          <!-- <button class="search-trigger">
            <i class="fa fa-search"></i>
          </button>-->
          <div class="form-inline">
            <form class="search-form">
              <input
                class="form-control mr-sm-2"
                type="text"
                placeholder="Search ..."
                aria-label="Search"
              />
              <button class="search-close" type="submit">
                <i class="fa fa-close"></i>
              </button>
            </form>
          </div>

          <div v-if="ready" class="dropdown for-notification">
            <button
              class="btn btn-secondary dropdown-toggle"
              type="button"
              id="notification"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <i class="fa fa-globe"></i>
              <span
                v-if="unreadNotification.length"
                class="count bg-danger"
              >{{ unreadNotification.length }}</span>
            </button>
            <div class="dropdown-menu" aria-labelledby="notification">
              <p class="red">You have {{ unreadNotification.length }} Notification</p>
              <a
                v-for="(notification, index) in unreadNotification"
                v-bind:key="index"
                class="dropdown-item media"
                :href="'/perTransactionView/'+notification.data.transaction.id+'/'+notification.id"
              >
                <i class="ti-receipt"></i>
                <p>
                  New transaction with transaction id of
                  <b>{{ notification.data.transaction.transaction_id }}</b>
                </p>
              </a>
            </div>
          </div>
        </div>

        <div class="user-area dropdown float-right">
          <a
            href="#"
            class="dropdown-toggle active"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <img
              class="user-avatar rounded-circle"
              :src="'/admin/images/avatar/user.png'"
              alt="User Avatar"
            />
          </a>

          <div class="user-menu dropdown-menu">
            <a class="nav-link" href="/admin-settings">
              <i class="ti-settings"></i> Settings
            </a>

            <a class="nav-link" href="/logout">
              <i class="ti-power-off"></i> Logout
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>
<script>
export default {
  props: ["unreads", "id"],
  data() {
    return {
      unreadNotification: [],
      ready: false
    };
  },
  async created() {
    this.ready = true;
    await this.startInterval();
    // console.log(JSON.parse(this.unreads));
    // Echo.private("App.User." + this.id).notification(notification => {
    //   console.log(notification.type);
    //   this.unreadNotification.push(notification);
    // });
  },
  methods: {
    startInterval: function() {
      setInterval(() => {
        axios.get("/checkNotification").then(response => {
          this.unreadNotification = response.data;
          // console.log(response.data);
        });
      }, 1000);
    }
  }
};
</script>
  