<template>
  <div>
    <br />
    <div class="transaction container">
      <div v-for="transaction in transactions" v-bind:key="transaction.id" class="row mb-5">
        <div class="col-lg-6 col-md-6">
          <h4>Transaction Summary</h4>
        </div>
        <div class="col-lg-6 col-md-6">
          <button v-on:click="download()" :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'">
            Download PDF
            <i class="ti-files"></i>
          </button>
          <button v-on:click="print()" :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'">
            Print Now
            <i class="ti-printer"></i>
          </button>
        </div>
        <div class="col-lg-12">
          <small>
            <b>Date:</b>
            {{ month[new Date(transaction.created_at).getMonth()] +' '+new Date(transaction.created_at).getDate()+', '+new Date(transaction.created_at).getFullYear() }}
          </small>
          <br />
          <small>
            <b>Transaction Id:</b>
            {{ transaction.transaction_id }}
          </small>
          <br />
          <small>
            <b>Transaction Type:</b>
            {{ transaction.transaction_type.transaction_type }}
          </small>
          <br />
          <small>
            <b>Status:</b>
            {{ transaction.transaction_status.status }}
          </small>
          <br />
          <small>
            <b>Payment Status:</b>
            {{ transaction.payment_status.status }}
          </small>
          <br />
          <small v-if="transaction.transaction_type_id == 3">
            <b>Payment Type:</b>
            {{ transaction.payment_type }}
          </small>
          <br />
        </div>
        <br />
        <div
          v-if="transaction.transaction_type_id == 3 || transaction.transaction_type_id == 1"
          class="col-lg-12"
        >
          <h4>Billing Details</h4>
        </div>
        <div v-if="transaction.transaction_type_id == 2" class="col-lg-12">
          <h3>Meeting Place Details</h3>
          <hr />
          <small>
            <b>Recipient Name:</b>
            {{ transaction.shipping.firstname }} {{ transaction.shipping.lastname }}
          </small>
          <br />
          <small>
            <b>Phone:</b>
            {{ transaction.shipping.phone }}
          </small>
          <br />
          <small>
            <b>Email:</b>
            {{ transaction.shipping.email }}
          </small>
          <br />
          <small>
            <b>Address / Shipping Destination:</b>
            {{ transaction.shipping.street_address }} {{ transaction.shipping.city }} {{ transaction.shipping.state }} {{ transaction.shipping.country }} {{ transaction.shipping.postal }}
          </small>
          <br />
        </div>
        <div
          v-if="transaction.transaction_type_id == 3 || transaction.transaction_type_id == 1"
          class="col-lg-12"
        >
          <small>
            <b>Recipient Name:</b>
            {{ transaction.shipping.firstname }} {{ transaction.shipping.lastname }}
          </small>
          <br />
          <small>
            <b>Phone:</b>
            {{ transaction.shipping.phone }}
          </small>
          <br />
          <small>
            <b>Email:</b>
            {{ transaction.shipping.email }}
          </small>
          <br />
          <small>
            <b>Address / Shipping Destination:</b>
            {{ transaction.shipping.street_address }} {{ transaction.shipping.city }} {{ transaction.shipping.state }} {{ transaction.shipping.country }} {{ transaction.shipping.postal }}
          </small>
          <br />
          <br />
        </div>
        <div class="col-lg-12">
          <h4>Items Ordered</h4>
        </div>
        <br />
        <br />
        <div class="col-lg-12">
          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
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
                <td>
                  <small>
                    <b>Total Amount</b>
                  </small>
                </td>
                <td>
                  <small>&#8369; {{ transaction.amount }}.00</small>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { RadarSpinner } from "epic-spinners";

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
      base_64: ""
    };
  },
  async created() {
    this.countCart();
    await this.getTransaction();
    await this.getLogo();
    await this.buildPDF();
  },
  methods: {
    countCart: async function() {
      await axios.get("/countCart").then(response => {
        this.cartCount = response.data;
      });
    },
    getTransaction: async function() {
      await axios.get("/perTransaction/" + this.id).then(response => {
        this.transactions = response.data;
        console.log(response.data);
      });
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
      //   $.each(this.transactions[0].items, function(index, value) {
      //     var temp = [
      //       value.product_name,
      //       value.product_code,
      //       value.product_quantity,
      //       "₱ " + value.product_price + ".00"
      //     ];

      //     bodyContent.push(temp);
      //   });
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
              this.transactions[0].shipping.phone + "\n",
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
  font-size: 15px;
}
</style>

