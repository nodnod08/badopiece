<template>
  <div class="content">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-1">
                  <i class="pe-7s-cash"></i>
                </div>
                <div class="stat-content">
                  <div class="text-left dib">
                    <div class="stat-text">
                      &#8369;
                      <span>{{ Number(monthSales).toLocaleString() }}</span>
                    </div>
                    <div class="stat-heading">This Month Sales</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-2">
                  <i class="pe-7s-cart"></i>
                </div>
                <div class="stat-content">
                  <div class="text-left dib">
                    <div class="stat-text">
                      &#8369;
                      <span>{{ Number(monthPaids).toLocaleString() }}</span>
                    </div>
                    <div class="stat-heading">This Month Paid</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-3">
                  <i class="pe-7s-browser"></i>
                </div>
                <div class="stat-content">
                  <div class="text-left dib">
                    <div class="stat-text">
                      &#8369;
                      <span>{{ Number(yearSales).toLocaleString() }}</span>
                    </div>
                    <div class="stat-heading">This Year Sales</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  components: {},
  data() {
    return {
      yearSales: 0,
      monthSales: 0,
      monthPaids: 0
    };
  },
  async created() {
    await this.getYear();
    await this.getMonthPaids();
    await this.getMonthSales();
  },
  methods: {
    getYear: async function() {
      await axios.get("/getYear").then(response => {
        this.yearSales = response.data[0].amount;
        console.log(this.yearSales);
      });
    },
    getMonthSales: async function() {
      await axios.get("/monthSales").then(response => {
        this.monthSales = response.data[0].amount;
        console.log(this.monthSales);
      });
    },
    getMonthPaids: async function() {
      await axios.get("/monthPaids").then(response => {
        this.monthPaids = response.data[0].amount;
        console.log(this.monthPaids);
      });
    }
  }
};
</script>
<style>
</style>