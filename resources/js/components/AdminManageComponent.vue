<template>
  <div class="content">
    <div class="animated fadeIn">
      <div
        v-if="itemToEdit"
        class="modal fade"
        id="mediumModal"
        tabindex="-1"
        role="dialog"
        aria-labelledby="mediumModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="mediumModalLabel">Edit {{ itemToEdit.product_name }}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-lg-6 mb-3">
                  <label for>Product Name</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    v-model="itemToEdit.product_name"
                  />
                </div>
                <div class="col-lg-6 mb-3">
                  <label for>Product Code</label>
                  <input
                    type="text"
                    class="form-control form-control-sm"
                    v-model="itemToEdit.product_code"
                  />
                </div>
                <div class="col-lg-6 mb-3">
                  <label for>Product Price</label>
                  <input
                    type="number"
                    class="form-control form-control-sm"
                    v-model="itemToEdit.product_price"
                  />
                </div>
                <div class="col-lg-6 mb-3">
                  <label for>Product Quantity</label>
                  <input
                    type="number"
                    class="form-control form-control-sm"
                    v-model="itemToEdit.product_stocks"
                  />
                </div>
                <div class="col-lg-6 mb-3">
                  <label for>Product Description</label>
                  <textarea class="form-control form-control-sm" v-model="itemToEdit.product_desc"></textarea>
                </div>
                <div class="col-lg-6 mb-3">
                  <label for>Product Photo</label>
                  <br />
                  <img height="200" :src="'storage/img/offer-img/'+itemToEdit.product_photo" alt />
                </div>
                <div class="col-lg-12">
                  <label for>Update Photo</label>
                  <file-pond
                    name="test"
                    ref="pond"
                    label-idle="Drop image here or click this..."
                    allow-multiple="false"
                    accepted-file-types="image/jpeg, image/png, image/jpg"
                    v-bind:files="myFiles"
                    v-model="file"
                    v-on:init="handleFilePondInit"
                  />
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" v-on:click="updateItem()" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
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
                      <span>{{ Number(countDress).toLocaleString() }}</span>
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
                      <span>{{ Number(countShoes).toLocaleString() }}</span>
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
                      <span>{{ Number(countBags).toLocaleString() }}</span>
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
                      <span>{{ Number(countShort).toLocaleString() }}</span>
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
                      <span>{{ Number(countPolo).toLocaleString() }}</span>
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
                      <span>{{ Number(countJackets).toLocaleString() }}</span>
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
                          :id="'price'+index"
                          type="number"
                          class="form-control form-control-sm"
                          placeholder="Set default Price"
                        />
                      </div>
                      <div class="col-lg-4">
                        <button
                          type="button"
                          v-on:click="setPrice(index,'price'+index)"
                          class="btn btn-success btn-sm"
                        >Set Price</button>
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
                                  v-on:click="remove(data.product_id)"
                                >
                                  <i class="ti-trash"></i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-primary btn-sm"
                                  data-toggle="modal"
                                  data-target="#mediumModal"
                                  v-on:click="setItem(data)"
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
import vueFilePond from "vue-filepond";
import "filepond/dist/filepond.min.css";
import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import FilePondPluginImagePreview from "filepond-plugin-image-preview";
const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview
);
import DatePicker from "vuejs-datepicker";
import moment from "moment";
import _ from "lodash";
export default {
  components: {
    datepicker: DatePicker,
    FilePond
  },
  data() {
    return {
      allItems: {},
      itemToEdit: {},
      form: new FormData(),
      file: [],
      price: 0,
      countDress: 0,
      countPolo: 0,
      countShort: 0,
      countShoes: 0,
      countBags: 0,
      countJackets: 0
    };
  },
  created() {
    this.getAllItems();
    this.getDress();
    this.getPolo();
    this.getShort();
    this.getShoes();
    this.getBags();
    this.getJackets();
  },
  methods: {
    getAllItems: async function() {
      await axios.get("/inventories/getAllItems").then(response => {
        this.allItems = response.data;
        console.log(response.data);
      });
    },
    remove: async function(id) {
      await swal({
        title: "Are you sure?",
        text: "You want to delete this item?",
        icon: "info",
        buttons: true,
        dangerMode: true,
        closeOnClickOutside: false
      }).then(success => {
        if (success) {
          axios
            .post("/inventories/remove", {
              id: id
            })
            .then(response => {
              swal("", "Item has been deleted.", "success");
              // console.log(response.data);
              this.getAllItems();
            });
        }
      });
    },
    getDress: function() {
      axios.get("/inventories/getDress").then(response => {
        this.countDress = response.data[0].count;
      });
    },
    getPolo: function() {
      axios.get("/inventories/getShort").then(response => {
        this.countPolo = response.data[0].count;
      });
    },
    getBags: function() {
      axios.get("/inventories/getBags").then(response => {
        this.countBags = response.data[0].count;
      });
    },
    getShoes: function() {
      axios.get("/inventories/getShoes").then(response => {
        this.countShoes = response.data[0].count;
      });
    },
    getShort: function() {
      axios.get("/inventories/getShort").then(response => {
        this.countShort = response.data[0].count;
      });
    },
    getJackets: function() {
      axios.get("/inventories/getJackets").then(response => {
        this.countJackets = response.data[0].count;
      });
    },
    setItem: async function(data) {
      this.itemToEdit = await data;
    },
    updateItem: async function() {
      this.photoError1 = false;
      if (this.file.length != 0) {
        this.form.append("image", this.file[0].file);
      }
      this.form.append("id", this.itemToEdit.product_id);
      this.form.append("name", this.itemToEdit.product_name);
      this.form.append("code", this.itemToEdit.product_code);
      this.form.append("price", this.itemToEdit.product_price);
      this.form.append("category", this.itemToEdit.product_category);
      this.form.append("quantity", this.itemToEdit.product_stocks);
      this.form.append("description", this.itemToEdit.product_desc);
      const config = {
        header: {
          "Content-Type": "multipart/form-data"
        }
      };
      axios
        .post("/inventories/updateItem", this.form, config)
        .then(response => {
          this.getAllItems();
          swal("", "Item successfully added.", "success");
        });
    },
    setPrice: async function(index, id) {
      var price = document.getElementById(id).value;
      await swal({
        title: "Do you really want to proceed?",
        text: "All items of " + index + " category will be updated",
        icon: "info",
        buttons: true,
        dangerMode: true,
        closeOnClickOutside: false
      }).then(success => {
        if (success) {
          axios
            .post("/inventories/defaultPrice", {
              category: index,
              price: price
            })
            .then(response => {
              swal(
                "",
                "Price for " + index + " category has been updated.",
                "success"
              );
              console.log(response.data);
              this.getAllItems();
            });
        }
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