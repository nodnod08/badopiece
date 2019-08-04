<template>
  <div class="content">
    <div class="animated fadeIn">
      <div class="all-in bg-white">
        <div class="row">
          <div class="col-lg-12 mb-3">
            <h4>Add New Item</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <label for>Item Name</label>
            <input
              v-model="name"
              v-validate="'required'"
              data-vv-as="item name"
              name="name"
              type="text"
              :class="(errors.first('name')) ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
            />
            <small class="invalid-feedback" v-if="errors.first('name')">{{ errors.first('name') }}</small>
          </div>
          <div class="col-lg-4">
            <label for>Item Code</label>
            <input
              v-model="code"
              v-validate="'required'"
              data-vv-as="item code"
              name="code"
              type="text"
              :class="(errors.first('code')) ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
            />
            <small class="invalid-feedback" v-if="errors.first('code')">{{ errors.first('code') }}</small>
          </div>
          <div class="col-lg-4">
            <label for>Item Price</label>
            <input
              v-model="price"
              v-validate="'required'"
              data-vv-as="item price"
              name="price"
              type="text"
              :class="(errors.first('price')) ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
            />
            <small class="invalid-feedback" v-if="errors.first('price')">{{ errors.first('price') }}</small>
          </div>
          <div class="col-lg-4">
            <label for>Item Category</label>
            <select
              v-model="category"
              v-validate="'required'"
              data-vv-as="item category"
              name="category"
              :class="(errors.first('category')) ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
              id
            >
              <option
                v-for="category in categories"
                v-bind:key="category.id"
                :value="category.id"
              >{{ category.category }}</option>
            </select>
            <small
              class="invalid-feedback"
              v-if="errors.first('category')"
            >{{ errors.first('category') }}</small>
          </div>
          <div class="col-lg-4">
            <label for>Item Quantity</label>
            <input
              v-model="quantity"
              v-validate="'required'"
              data-vv-as="item quantity"
              name="quantity"
              type="text"
              :class="(errors.first('quantity')) ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
            />
            <small
              class="invalid-feedback"
              v-if="errors.first('quantity')"
            >{{ errors.first('quantity') }}</small>
          </div>
          <div class="col-lg-4">
            <label for>Item Description</label>
            <input
              v-model="description"
              v-validate="'required'"
              data-vv-as="item description"
              name="description"
              type="text"
              :class="(errors.first('description')) ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
            />
            <small
              class="invalid-feedback"
              v-if="errors.first('description')"
            >{{ errors.first('description') }}</small>
          </div>
          <div class="col-lg-12">
            <label for>Item Photo</label>
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
            <small class="error" v-if="photoError">Please provide the Item photo</small>
            <small class="error" v-if="photoError1">Only one photo can accepted.</small>
          </div>
          <div class="col-lg-12 mt-2">
            <button type="button" v-on:click="addItem()" class="btn btn-primary btn-sm">Add Item</button>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-lg-12">
            <h4>Add New Category</h4>
          </div>
          <div class="col-lg-4">
            <label for>Category Name</label>
            <input
              v-model="cat"
              v-validate="'required'"
              data-vv-as="category name"
              name="cat"
              type="text"
              :class="(errors.first('cat')) ? 'is-invalid form-control form-control-sm' : 'form-control form-control-sm'"
            />
            <small class="invalid-feedback" v-if="errors.first('cat')">{{ errors.first('cat') }}</small>
          </div>
          <div class="col-lg-12 mt-2">
            <button
              type="button"
              v-on:click="addCategory()"
              class="btn btn-primary btn-sm"
            >Add Category</button>
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
      categories: {},
      name: "",
      code: "",
      price: "",
      category: "",
      quantity: "",
      description: "",
      myFiles: [],
      file: [],
      photoError: false,
      photoError1: false,
      form: new FormData(),
      cat: ""
    };
  },
  created() {
    this.getCategories();
  },
  methods: {
    handleFilePondInit: function() {
      //   console.log("FilePond has initialized");
      // FilePond instance methods are available on `this.$refs.pond`
    },
    getCategories: function() {
      axios.get("/inventories/getCategories").then(response => {
        this.categories = response.data;
        console.log(response.data);
      });
    },
    addItem: async function() {
      this.$validator
        .validateAll([
          "name",
          "code",
          "price",
          "category",
          "quantity",
          "description"
        ])
        .then(async result => {
          if (result && this.file.length != 0) {
            this.photoError = false;
            if (this.file.length > 1) {
              this.photoError1 = true;
            } else {
              this.photoError1 = false;
              this.form.append("image", this.file[0].file);
              this.form.append("name", this.name);
              this.form.append("code", this.code);
              this.form.append("price", this.price);
              this.form.append("category", this.category);
              this.form.append("quantity", this.quantity);
              this.form.append("description", this.description);
              const config = {
                header: {
                  "Content-Type": "multipart/form-data"
                }
              };
              axios
                .post("/inventories/addItem", this.form, config)
                .then(response => {
                  swal("", "Item successfully added.", "success");
                });
            }
          } else {
            this.photoError = true;
          }
        });
    },
    addCategory: async function() {
      this.$validator.validateAll(["cat"]).then(async result => {
        if (result) {
          axios
            .post("/inventories/addCategory", {
              category: this.cat
            })
            .then(response => {
              swal("", "New category successfully added.", "success");
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