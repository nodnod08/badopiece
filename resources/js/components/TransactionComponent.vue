<template>
  <div>
    <navbar-component :count="cartCount" :username="auth"></navbar-component>
    <div v-if="loading">
      <div class="loader-back"></div>
      <div class="loader">
        <radar-spinner :animation-duration="1500" :size="60" color="#59ffa4" />
      </div>
    </div>
    <div class="transaction container">
      <div v-for="transaction in transactions" v-bind:key="transaction.id" class="row mb-5">
        <div
          v-if="ready"
          class="modal fade"
          id="exampleModal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Feedback Your Items</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-12 mt-3">
                    <div class="text-left">
                      <img height="100" :src="'/storage/img/offer-img/'+items.product_photo" alt />
                    </div>
                    <p>
                      <b>{{ items.product_name }}</b>
                    </p>
                    <label for>Rate it</label>
                    <star-rating
                      v-bind:increment="0.5"
                      v-bind:max-rating="5"
                      inactive-color="#c2c2c2"
                      active-color="#ffe330"
                      v-bind:star-size="30"
                      v-model="rating"
                      :show-rating="false"
                    ></star-rating>
                    <label class="mt-3" for>Your feedback</label>
                    <textarea
                      v-validate="'required'"
                      name="Feedback"
                      v-model="feedback"
                      class="form-control mb-3"
                    ></textarea>
                    <small
                      class="invalid-feedback"
                      v-if="errors.first('Feedback')"
                    >{{ errors.first('Feedback') }}</small>
                    <button
                      type="button"
                      v-on:click="feedbackNow(items)"
                      class="btn btn-outline-dark btn-sm my-2 my-sm-0 mb-3"
                    >Submit</button>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12"></div>
        <div class="col-lg-6 col-md-6">
          <h3>Transaction Summary</h3>
        </div>
        <div class="col-lg-6 col-md-6">
          <button v-on:click="download()" :class="'btn btn-outline-dark btn-md my-2 my-sm-0'">
            Download PDF
            <i class="fas fa-file-pdf"></i>
          </button>
          <button v-on:click="print()" :class="'btn btn-outline-dark btn-md my-2 my-sm-0'">
            Print Now
            <i class="fas fa-print"></i>
          </button>
        </div>
        <hr />
        <div class="col-lg-12">
          <p>
            <b>Date:</b>
            {{ month[new Date(transaction.created_at).getMonth()] +' '+new Date(transaction.created_at).getDate()+', '+new Date(transaction.created_at).getFullYear() }}
          </p>
          <p>
            <b>Transaction Id:</b>
            {{ transaction.transaction_id }}
          </p>
          <p>
            <b>Transaction Type:</b>
            {{ transaction.transaction_type.transaction_type }}
          </p>
          <p>
            <b>Status:</b>
            {{ transaction.transaction_status.status }}
          </p>
          <p>
            <b>Payment Status:</b>
            {{ transaction.payment_status.status }}
          </p>
          <p v-if="transaction.transaction_type_id == 3">
            <b>Payment Type:</b>
            {{ transaction.payment_type }}
          </p>
        </div>
        <br />
        <div
          v-if="transaction.transaction_type_id == 3 || transaction.transaction_type_id == 1"
          class="col-lg-12"
        >
          <h3>Billing Details</h3>
          <hr />
        </div>
        <div v-if="transaction.transaction_type_id == 2" class="col-lg-12">
          <h3>Meeting Place Details</h3>
          <hr />
          <p>
            <b>Recipient Name:</b>
            {{ transaction.shipping.firstname }} {{ transaction.shipping.lastname }}
          </p>
          <p>
            <b>Phone:</b>
            {{ transaction.shipping.phone }}
          </p>
          <p>
            <b>Email:</b>
            {{ transaction.shipping.email }}
          </p>
          <p>
            <b>Address / Shipping Destination:</b>
            {{ transaction.shipping.street_address }} {{ transaction.shipping.city }} {{ transaction.shipping.state }} {{ transaction.shipping.country }} {{ transaction.shipping.postal }}
          </p>
        </div>
        <div
          v-if="transaction.transaction_type_id == 3 || transaction.transaction_type_id == 1"
          class="col-lg-12"
        >
          <p>
            <b>Recipient Name:</b>
            {{ transaction.shipping.firstname }} {{ transaction.shipping.lastname }}
          </p>
          <p>
            <b>Phone:</b>
            {{ transaction.shipping.phone }}
          </p>
          <p>
            <b>Email:</b>
            {{ transaction.shipping.email }}
          </p>
          <p>
            <b>Address / Shipping Destination:</b>
            {{ transaction.shipping.street_address }} {{ transaction.shipping.city }} {{ transaction.shipping.state }} {{ transaction.shipping.country }} {{ transaction.shipping.postal }}
          </p>
        </div>
        <div class="col-lg-12">
          <h3>Items Ordered</h3>
          <hr />
        </div>
        <div class="col-lg-12">
          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th scope="col">
                  <small>Feedback</small>
                </th>
                <th scope="col">
                  <small>Product Name</small>
                </th>
                <th scope="col">
                  <small>Product Code</small>
                </th>
                <th scope="col">
                  <small>Product Quantity</small>
                </th>
                <th scope="col">
                  <small>Product Price</small>
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(item, index) in transaction.items" v-bind:key="index">
                <td>
                  <small>
                    <button
                      v-on:click="setItem(item)"
                      type="button"
                      class="btn btn-outline-dark btn-sm my-2 my-sm-0 mb-4"
                      data-toggle="modal"
                      data-target="#exampleModal"
                    >
                      Add Feedback To This Item
                      <i class="fas fa-comments"></i>
                    </button>
                  </small>
                </td>
                <th>
                  <small>{{ item.product_name }}</small>
                </th>
                <td>
                  <small>{{ item.product_code }}</small>
                </td>
                <td>
                  <small>{{ item.product_quantity }}</small>
                </td>
                <td>
                  <small>&#8369; {{ item.product_price }}.00</small>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <small>
                    <b>SubTotal</b>
                  </small>
                </td>
                <td>
                  <small>&#8369; {{ transaction.amount - transaction.shipping_amount }}.00</small>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <small>
                    <b>Shipping</b>
                  </small>
                </td>
                <td>
                  <small>&#8369; {{ transaction.shipping_amount }}.00</small>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <small>
                    <b>VAT %</b>
                  </small>
                </td>
                <td>
                  <small>0 %</small>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>
                  <small>
                    <b>Total Amount</b>
                  </small>
                </td>
                <td>
                  <small>&#8369; {{ transaction.amount.toLocaleString() }}.00</small>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <footer-component></footer-component>
  </div>
</template>

<script>
import { RadarSpinner } from "epic-spinners";
import StarRating from "vue-star-rating";
Vue.component("star-rating", StarRating);
export default {
  props: ["id", "auth", "payment"],
  components: {
    RadarSpinner
  },
  data() {
    return {
      loading: true,
      cartCount: "",
      transactions: {},
      logo: "",
      month: [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
      ],
      base_64: "",
      items: [],
      ready: false,
      rating: 0,
      feedback: ""
    };
  },
  async created() {
    this.countCart();
    await this.getTransaction();
    await this.getLogo();
    this.buildPDF();
    this.checkNew();
  },
  methods: {
    countCart: async function() {
      await axios.get("/countCart").then(response => {
        this.cartCount = response.data;
      });
    },
    feedbackNow: async function(items) {
      // console.log(this.transactions[0].customer.name);
      // console.log(items.product_id);
      console.log(items);
      // console.log(this.feedback);
      // console.log(this.rating);

      if (this.feedback == null || this.feedback == "") {
        swal("", "Please make your feedback message.", "error");
      } else {
        axios
          .post("/feedback", {
            product_id: items.product_id,
            item_name: items.product_name,
            item_code: items.product_code,
            item_photo: items.product_photo,
            name: this.transactions[0].customer.name,
            feedback: this.feedback,
            rating: this.rating,
            transaction_id: this.transactions[0].id
          })
          .then(response => {
            swal("", "Thank you for rating our product.", "success");
            this.rating = 0;
            this.feedback = "";
          });
      }
    },
    getTransaction: async function() {
      await axios.get("/getTransaction/" + this.id).then(response => {
        this.transactions = response.data;
        // console.log(response.data);
      });
    },
    setItem: async function(item) {
      this.items = await item;
      this.ready = true;
    },
    getLogo: async function() {
      await axios.get("/getLogo").then(response => {
        this.logo = response.data;
      });
    },
    record: async function() {
      axios
        .get("/recordTransaction/" + this.transactions[0].id)
        .then(response => {});
    },
    checkNew: async function() {
      if (process.env.MIX_SEND_EMAIL) {
        axios
          .get("/checkNew/" + this.transactions[0].id)
          .then(async response => {
            if (response.data == "none") {
              var self = this;
              var encoded = "";
              var docDefinition = await this.buildPDF();
              await pdfMake
                .createPdf(docDefinition)
                .getBase64(async function(encodedString) {
                  encoded = await encodedString;
                  axios
                    .post("/sendTransaction", {
                      data: encoded,
                      email: self.transactions[0].customer.email
                    })
                    .then(response_1 => {
                      self.loading = false;
                      swal({
                        title:
                          "Thank you for purchasing Badopiece Collection product(s).",
                        text:
                          "We also send the transaction details to your email as PDF. Thank you",
                        icon: "success",
                        showCancelButton: false,
                        showConfirmButton: true,
                        dangerMode: false,
                        closeOnClickOutside: false
                      }).then(success => {
                        if (success) {
                          self.record();
                        }
                      });
                    });
                });
            } else {
              this.loading = false;
            }
          });
      }
    },
    print: async function() {
      pdfMake.createPdf(await this.buildPDF()).print();
    },
    download: async function() {
      pdfMake
        .createPdf(await this.buildPDF())
        .download(
          this.transactions[0].shipping.lastname +
            "_transaction_" +
            this.transactions[0].created_at
        );
    },
    buildPDF: function() {
      var bodyContent = [
        [
          {
            text: "Product Name",
            bold: true,
            fillColor: "#404040",
            color: "#fff"
          },
          {
            text: "Product Code",
            bold: true,
            fillColor: "#404040",
            color: "#fff"
          },
          {
            text: "Product Quantity",
            bold: true,
            fillColor: "#404040",
            color: "#fff"
          },
          {
            text: "Product Price",
            bold: true,
            fillColor: "#404040",
            color: "#fff"
          }
        ]
      ];
      $.each(this.transactions[0].items, function(index, value) {
        var temp = [
          value.product_name,
          value.product_code,
          value.product_quantity,
          "₱ " + value.product_price + ".00"
        ];

        bodyContent.push(temp);
      });
      var sub = [
        {
          text: "Subtotal",
          bold: true,
          fillColor: "#fff",
          border: false,
          color: "#fff"
        },
        {
          text: "Subtotal",
          bold: true,
          fillColor: "#fff",
          border: false,
          color: "#fff"
        },
        { text: "Subtotal", bold: true },
        {
          text:
            "₱ " +
            Number(
              this.transactions[0].amount - this.transactions[0].shipping_amount
            ) +
            ".00",
          bold: true
        }
      ];
      bodyContent.push(sub);
      var shipping = [
        {
          text: "Shipping",
          bold: true,
          fillColor: "#fff",
          border: false,
          color: "#fff"
        },
        {
          text: "Shipping",
          bold: true,
          fillColor: "#fff",
          border: false,
          color: "#fff"
        },
        { text: "Shipping", bold: true },
        {
          text: "₱ " + this.transactions[0].shipping_amount + ".00",
          bold: true
        }
      ];
      bodyContent.push(shipping);
      var vat = [
        {
          text: "VAT",
          bold: true,
          fillColor: "#fff",
          border: false,
          color: "#fff"
        },
        {
          text: "VAT",
          bold: true,
          fillColor: "#fff",
          border: false,
          color: "#fff"
        },
        { text: "VAT", bold: true },
        {
          text: "0%",
          bold: true
        }
      ];
      bodyContent.push(vat);
      var amount = [
        {
          text: "Total Amount",
          bold: true,
          fillColor: "#fff",
          border: false,
          color: "#fff"
        },
        {
          text: "Total Amount",
          bold: true,
          fillColor: "#fff",
          border: false,
          color: "#fff"
        },
        { text: "Total Amount", bold: true },
        {
          text: "₱ " + Number(this.transactions[0].amount) + ".00",
          bold: true
        }
      ];
      bodyContent.push(amount);

      var docDefinition = {
        pageSize: "A4",
        pageOrientation: "portrait",
        pageMargins: [40, 60, 40, 60],
        footer: function(currentPage, pageCount) {
          // return currentPage.toString() + " of " + pageCount;
          return [
            {
              text: currentPage.toString() + " of " + pageCount,
              margin: [40, 2, 10, 40]
            }
          ];
        },
        header: function(currentPage, pageCount, pageSize) {
          // you can apply any logic and return any valid pdfmake element

          return [];
        },
        content: [
          {
            image: this.logo[0].content,
            width: 120,
            height: 55
          },
          {
            text: "\n Transaction Details \n\n\n",
            fontSize: 17,
            bold: true,
            alignment: "center"
          },
          {
            text: [
              { text: "Transaction Summary \n", bold: true, fontSize: 13 },
              "--------------------------------------------------------------------\n",
              { text: "Date: ", bold: true },
              this.month[new Date(this.transactions[0].created_at).getMonth()] +
                " " +
                new Date(this.transactions[0].created_at).getDate() +
                ", " +
                new Date(this.transactions[0].created_at).getFullYear() +
                "\n",
              { text: "Transaction Id: ", bold: true },
              this.transactions[0].id + "\n",
              { text: "Transaction Type: ", bold: true },
              this.transactions[0].transaction_type.transaction_type + "\n",
              { text: "Status: ", bold: true },
              this.transactions[0].transaction_status.status + "\n",
              { text: "Payment Status: ", bold: true },
              this.transactions[0].payment_status.status + "\n",
              { text: "\nBilling Details \n", bold: true, fontSize: 13 },
              "--------------------------------------------------------------------\n",
              { text: "Recipient Name: ", bold: true },
              this.transactions[0].shipping.firstname +
                " " +
                this.transactions[0].shipping.lastname +
                "\n",
              { text: "Phone: ", bold: true },
              "0" + this.transactions[0].shipping.phone + "\n",
              { text: "Email: ", bold: true },
              this.transactions[0].shipping.email + "\n",
              { text: "Address / Shipping Destination: ", bold: true },
              this.transactions[0].shipping.street_address +
                " " +
                this.transactions[0].shipping.city +
                " " +
                this.transactions[0].shipping.state +
                " " +
                this.transactions[0].shipping.country +
                " " +
                this.transactions[0].shipping.postal +
                "\n\n",
              { text: "Items Ordered \n", bold: true, fontSize: 13 },
              "--------------------------------------------------------------------\n"
            ],
            fontSize: 10,
            alignment: "left"
          },
          {
            // optional
            table: {
              // headers are automatically repeated if the table spans over multiple pages
              // you can declare how many rows should be treated as headers
              headerRows: 1,
              widths: ["*", "*", "*", "*"],

              body: bodyContent
            },
            alignment: "center"
          }
        ]
      };

      return docDefinition;
    }
  }
};
</script>

<style>
.transaction {
  margin-top: 150px;
}
</style>

