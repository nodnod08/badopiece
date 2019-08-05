<template>
  <div class="content">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="card">
            <div class="card-body">
              <div class="stat-widget-five">
                <div class="stat-icon dib flat-color-2">
                  <i class="ti-star"></i>
                </div>
                <div class="stat-content">
                  <div class="text-left dib">
                    <div class="stat-text">
                      &#8369;
                      <!-- <span>{{ Number(monthPaids).toLocaleString() }}</span> -->
                    </div>
                    <div class="stat-heading">Dress Overall</div>
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
                  <i class="ti-star"></i>
                </div>
                <div class="stat-content">
                  <div class="text-left dib">
                    <div class="stat-text">
                      &#8369;
                      <!-- <span>{{ Number(monthPaids).toLocaleString() }}</span> -->
                    </div>
                    <div class="stat-heading">Shoes Overall</div>
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
                  <i class="ti-star"></i>
                </div>
                <div class="stat-content">
                  <div class="text-left dib">
                    <div class="stat-text">
                      &#8369;
                      <!-- <span>{{ Number(monthPaids).toLocaleString() }}</span> -->
                    </div>
                    <div class="stat-heading">Bags Overall</div>
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
                  <i class="ti-star"></i>
                </div>
                <div class="stat-content">
                  <div class="text-left dib">
                    <div class="stat-text">
                      &#8369;
                      <!-- <span>{{ Number(monthPaids).toLocaleString() }}</span> -->
                    </div>
                    <div class="stat-heading">Shorts Overall</div>
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
                  <i class="ti-star"></i>
                </div>
                <div class="stat-content">
                  <div class="text-left dib">
                    <div class="stat-text">
                      &#8369;
                      <!-- <span>{{ Number(monthPaids).toLocaleString() }}</span> -->
                    </div>
                    <div class="stat-heading">Polos Overall</div>
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
                  <i class="ti-star"></i>
                </div>
                <div class="stat-content">
                  <div class="text-left dib">
                    <div class="stat-text">
                      &#8369;
                      <!-- <span>{{ Number(monthPaids).toLocaleString() }}</span> -->
                    </div>
                    <div class="stat-heading">Jackets Overall</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="all-in bg-white">
        <div class="row">
          <div class="col-lg-12 mb-3">
            <h4>Manage Inventories</h4>
          </div>
          <div class="col-lg-12">
            <div class="accordion" id="accordionExample">
              <div
                style="background: #e8e8e8"
                v-for="(item, index) in allItems"
                v-bind:key="index"
                class="card"
              >
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <div class="row">
                      <div class="col-lg-4">
                        <button
                          class="btn btn-info btn-sm"
                          type="button"
                          data-toggle="collapse"
                          :data-target="'#'+index"
                          aria-expanded="false"
                          :aria-controls="index"
                        >All items in {{ index }} category</button>
                      </div>
                      <div style="margin-top: 8px;" class="col-lg-4">
                        <input
                          type="number"
                          class="form-control form-control-sm"
                          placeholder="Set default Price"
                        />
                      </div>
                      <div class="col-lg-4">
                        <button type="button" class="btn btn-success btn-sm">Set Price</button>
                      </div>
                    </div>
                  </h2>
                </div>

                <div
                  :id="index"
                  class="collapse"
                  aria-labelledby="headingOne"
                  data-parent="#accordionExample"
                >
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">Action</th>
                              <th scope="col">Name</th>
                              <th scope="col">Code</th>
                              <th scope="col">Price</th>
                              <th scope="col">Stocks</th>
                            </tr>
                          </thead>
                          <tbody class="bg-white">
                            <tr v-for="(data, index) in item" v-bind:key="index">
                              <th>
                                <button
                                  type="button"
                                  class="btn btn-danger btn-sm"
                                  data-toggle="modal"
                                  data-target="#item"
                                >
                                  <i class="ti-trash"></i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-primary btn-sm"
                                  data-toggle="modal"
                                  data-target="#item"
                                >
                                  <i class="ti-pencil-alt"></i>
                                </button>
                              </th>
                              <th>{{ data.product_name }}</th>
                              <th>{{ data.product_code }}</th>
                              <th>{{ data.product_price }}</th>
                              <th>{{ data.product_stocks }}</th>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
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
import DatePicker from "vuejs-datepicker";
import moment from "moment";
import _ from "lodash";
export default {
  components: {
    datepicker: DatePicker
  },
  data() {
    return {
      allItems: {}
    };
  },
  created() {
    this.getAllItems();
  },
  methods: {
    getAllItems: async function() {
      await axios.get("/inventories/getAllItems").then(response => {
        this.allItems = response.data;
        console.log(response.data);
      });
    }
  }
};
</script>
<style>
.all-in {
  padding: 2%;
}
.error {
  color: red;
}
</style>