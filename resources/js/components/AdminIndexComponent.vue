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
                  <i class="ti-check-box"></i>
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
      <div class="row">
        <div class="col-lg-12 mb-4">
          <h4>
            <b>Sales Dashboard</b>
          </h4>
        </div>
        <div class="col-lg-4">
          <label for>From:</label>
          <span>
            <datepicker
              v-model="dateFrom.date"
              :name="dateFrom.name"
              id="date_from"
              :input-class="dateFrom.class"
            ></datepicker>
          </span>
        </div>
        <div class="col-lg-4">
          <label for>To:</label>
          <span>
            <datepicker
              v-model="dateTo.date"
              :name="dateTo.name"
              id="date_to"
              :input-class="dateTo.class"
            ></datepicker>
          </span>
        </div>
        <div style="margin-top: 31px;" class="col-lg-4">
          <span>
            <button v-on:click="getData()" class="btn btn-primary btn-sm">Search</button>
          </span>
        </div>
        <div class="col-lg-12 mt-3">
          <button type="button" v-on:click="savePrint(1)" class="btn btn-primary btn-sm">
            Print
            <i class="ti-printer"></i>
          </button>
          <button type="button" v-on:click="saveDocs(1)" class="btn btn-primary btn-sm">
            Save Docs
            <i class="ti-files"></i>
          </button>
        </div>
        <div class="col-lg-12 mt-4">
          <apexchart
            ref="demoChart"
            :width="options.chart.width"
            :height="options.chart.height"
            :type="options.chart.type"
            :options="options"
            :series="options.series"
          ></apexchart>
        </div>
        <div class="col-lg-12">
          <table id="htmlTableId1" v-if="ready && Labels.length" class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th>Transaction Status</th>
                <th v-for="(label, index) in Labels" v-bind:key="index">{{ label }}</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(data, index) in datasArray2" v-bind:key="index">
                <td>{{ data.name }}</td>
                <td
                  v-for="(data2, index1) in data.data"
                  v-bind:key="index1"
                >{{ data2.toLocaleString() }}.00</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-lg-12 mt-4">
          <h4>
            <b>Most Purchased Items</b>
          </h4>
        </div>
        <div class="col-lg-4">
          <label for>From:</label>
          <span>
            <datepicker
              v-model="dateFrom.date"
              :name="dateFrom.name"
              id="date_from"
              :input-class="dateFrom.class"
            ></datepicker>
          </span>
        </div>
        <div class="col-lg-4">
          <label for>To:</label>
          <span>
            <datepicker
              v-model="dateTo.date"
              :name="dateTo.name"
              id="date_to"
              :input-class="dateTo.class"
            ></datepicker>
          </span>
        </div>
        <div style="margin-top: 31px;" class="col-lg-4">
          <span>
            <button v-on:click="getItems()" class="btn btn-primary btn-sm">Search</button>
          </span>
        </div>
        <div class="col-lg-12 mt-3">
          <button type="button" v-on:click="savePrint(2)" class="btn btn-primary btn-sm">
            Print
            <i class="ti-printer"></i>
          </button>
          <button type="button" v-on:click="saveDocs(2)" class="btn btn-primary btn-sm">
            Save Docs
            <i class="ti-files"></i>
          </button>
        </div>
        <div class="col-lg-12 mt-4">
          <apexchart
            ref="demoChart2"
            :width="manifest.chart.width"
            :height="manifest.chart.height"
            :type="manifest.chart.type"
            :options="manifest"
            :series="manifest.series"
          ></apexchart>
        </div>
        <div class="col-lg-12">
          <table id="htmlTableId2" v-if="ready && Labels1.length" class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th>Item Category</th>
                <th v-for="(label, index) in Labels1" v-bind:key="index">{{ label }}</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(data, index) in datasArray" v-bind:key="index">
                <td>{{ data.name }}</td>
                <td
                  v-for="(data2, index1) in data.data"
                  v-bind:key="index1"
                >{{ data2.toLocaleString() }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import DatePicker from "vuejs-datepicker";
import moment from "moment";
import _ from "lodash";
import jsPDF from "jspdf";
import "jspdf-autotable";

export default {
  components: {
    datepicker: DatePicker
  },
  data() {
    return {
      ready: false,
      ready1: false,
      data: [],
      datasArray: [],
      data1: [],
      datasArray2: [],
      Labels: [],
      Labels1: [],
      year: "2019",
      dateFrom: {
        date: {},
        name: "date_to",
        class: "form-control form-control-sm"
      },
      dateTo: {
        date: {},
        name: "date_to",
        class: "form-control form-control-sm"
      },
      yearSales: 0,
      monthSales: 0,
      monthPaids: 0,
      options: {
        colors: [],
        chart: {
          id: "salesOverview",
          background: "#fff",
          height: "400",
          width: "100%",
          type: "line",
          shadow: {
            enabled: true,
            color: "#000",
            top: 18,
            left: 7,
            blur: 10,
            opacity: 1
          },
          toolbar: {
            show: true
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function(val, opts) {
            return val.toLocaleString();
          }
        },
        stroke: {
          curve: "smooth"
        },
        series: [],
        title: {
          text: "Sales Overview",
          align: "left"
        },
        grid: {
          borderColor: "#e7e7e7",
          row: {
            colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
            opacity: 0.5
          }
        },
        markers: {
          size: 6
        },
        xaxis: {
          categories: [],
          title: {
            text: "Date(s)"
          }
        },
        yaxis: {
          labels: {
            formatter: function(value) {
              return "₱ " + value.toLocaleString();
            },
            style: {
              fontSize: "15px",
              fontFamily: "Helvetica, Arial, sans-serif",
              cssClass: "apexcharts-yaxis-label"
            },
            title: {
              text: "Amount"
            }
          },
          title: {
            text: "Amount"
          }
        },
        legend: {
          position: "top",
          horizontalAlign: "right",
          floating: true,
          offsetY: -18,
          offsetX: -5
        }
      },
      manifest: {
        chart: {
          background: "#fff",
          height: "400",
          width: "100%",
          type: "line",
          shadow: {
            enabled: true,
            color: "#000",
            top: 18,
            left: 7,
            blur: 10,
            opacity: 1
          },
          toolbar: {
            show: true
          }
        },
        dataLabels: {
          enabled: true,
          formatter: function(val, opts) {
            return val.toLocaleString();
          }
        },
        stroke: {
          curve: "smooth"
        },
        series: [],
        title: {
          text: "Most Purchased Item",
          align: "left"
        },
        grid: {
          borderColor: "#e7e7e7",
          row: {
            colors: ["#f3f3f3", "transparent"], // takes an array which will be repeated on columns
            opacity: 0.5
          }
        },
        markers: {
          size: 6
        },
        xaxis: {
          categories: [],
          title: {
            text: "Date(s)"
          }
        },
        yaxis: {
          labels: {
            formatter: function(value) {
              return "₱ " + value.toLocaleString();
            },
            style: {
              fontSize: "15px",
              fontFamily: "Helvetica, Arial, sans-serif",
              cssClass: "apexcharts-yaxis-label"
            },
            title: {
              text: "Overall Amount"
            }
          },
          title: {
            text: "Overall Amount"
          }
        },
        legend: {
          position: "top",
          horizontalAlign: "right",
          floating: true,
          offsetY: -18,
          offsetX: -5
        }
      }
    };
  },
  created() {
    this.dateFrom.date = this.setDateFrom();
    this.dateTo.date = this.setDateTo();
    this.getYear();
    this.getMonthPaids();
    this.getMonthSales();
    this.getData();
    this.getItems();
  },
  methods: {
    saveDocs: async function(id) {
      if (id == 1) {
        this.$refs.demoChart.dataURI().then(uri => {
          const doc = new jsPDF("landscape", "cm");
          doc.addImage(uri, "JPEG", 2, 0.5);
          doc.autoTable({
            html: "#htmlTableId1",
            headStyles: { fillColor: [64, 64, 64] },
            margin: { top: 13 }
          });
          doc.save("SalesOverview.pdf");
        });
      } else {
        this.$refs.demoChart2.dataURI().then(uri => {
          const doc = new jsPDF("landscape", "cm");
          doc.addImage(uri, "JPEG", 2, 0.5);
          doc.autoTable({
            html: "#htmlTableId2",
            headStyles: { fillColor: [64, 64, 64] },
            margin: { top: 13 }
          });
          doc.save("MostPurchased.pdf");
        });
      }
    },
    savePrint: async function(id) {
      if (id == 1) {
        this.$refs.demoChart.dataURI().then(uri => {
          const doc = new jsPDF("landscape", "cm");
          doc.addImage(uri, "JPEG", 2, 0.5);
          doc.autoTable({
            html: "#htmlTableId1",
            headStyles: { fillColor: [64, 64, 64] },
            margin: { top: 13 }
          });
          // doc.save("table.pdf");
          // doc.autoPrint();
          window.open(doc.output("bloburl"), "_blank");
        });
      } else {
        this.$refs.demoChart2.dataURI().then(uri => {
          const doc = new jsPDF("landscape", "cm");
          doc.addImage(uri, "JPEG", 2, 0.5);
          doc.autoTable({
            html: "#htmlTableId2",
            headStyles: { fillColor: [64, 64, 64] },
            margin: { top: 13 }
          });
          // doc.save("table.pdf");
          // doc.autoPrint();
          window.open(doc.output("bloburl"), "_blank");
        });
      }
    },
    getYear: function() {
      axios.get("/getYear").then(response => {
        this.yearSales = response.data[0].amount;
        // console.log(this.yearSales);
      });
    },
    getMonthSales: function() {
      axios.get("/monthSales").then(response => {
        this.monthSales = response.data[0].amount;
        // console.log(this.monthSales);
      });
    },
    getMonthPaids: async function() {
      axios.get("/monthPaids").then(response => {
        this.monthPaids = response.data[0].amount;
        // console.log(this.monthPaids);
      });
    },
    setDateFrom: function() {
      var now = new Date();
      return now.setDate(now.getDate() - 30);
    },
    setDateTo: function() {
      return new Date();
    },
    getData: async function() {
      var self = this;
      self.datasArray2 = [];
      self.Labels = [];
      var from;
      var to;

      typeof self.year == "undefined" || self.year == ""
        ? (self.year = new Date().getFullYear())
        : self.year;

      from = moment(this.dateFrom.date).format("YYYY-MM-DD");
      to = moment(this.dateTo.date).format("YYYY-MM-DD");
      var url = "/sales/" + self.year + "/" + from + "/" + to;

      let Prices = "";
      let borderColor = "";
      let backgroundColor = "";
      var datas = {};
      await axios.get(url).then(response => {
        // console.log(response.data);
        this.data = response.data;
        this.Labels = _.sortedUniq(this.data[this.data.length - 1]);
        // console.log(this.Labels);
        // this.Labels.forEach(function(index, value) {
        //   console.log(index);
        // });
        this.options = {
          ...this.options,
          ...{
            xaxis: {
              categories: _.sortedUniq(this.data[this.data.length - 1])
            }
          }
        };
        this.data.splice(this.data.length - 1, 1);
        if (this.Labels.length == 4) {
        }
        var datas = {};
        if (this.data) {
          var datasets = [];

          var groupName = _.chain(this.data)
            .groupBy("name")
            .value();
          var paidUnpaid = _.chain(this.data)
            .groupBy("payment_status")
            .value();

          for (let [key, value] of Object.entries(paidUnpaid)) {
            var toName = key == 1 ? "Paid" : "Unpaid";
            groupName[toName] = value;
          }
          var colors = [];
          // complete, paid, incomplete, unpaid
          // colors: ["#007ad1", "#1fff84", "#d9f233", "424242"],
          for (let [key, value] of Object.entries(groupName)) {
            // console.log(key);
            if (key == "Fulfilled") {
              colors.push("#007ad1");
            } else if (key == "Unfulfilled") {
              colors.push("#e7f551");
            } else if (key == "Paid") {
              colors.push("#1fff84");
            } else {
              colors.push("#424242");
            }
          }

          this.options = {
            ...this.options,
            ...{
              colors: colors
            }
          };
          // console.log(groupName);
          var self = this;
          for (let [key, value] of Object.entries(groupName)) {
            var groupDate = _.chain(value)
              .groupBy("date")
              .map((objs, key1) => ({
                name: objs[0].name,
                date: objs[0].date,
                total_price: _.sumBy(objs, "total_price")
              }))
              .value();
            // console.log(ind)
            for (let [key2, value2] of Object.entries(self.Labels)) {
              var toFind = _.result(
                _.find(groupDate, function(obj) {
                  return obj.date === value2;
                }),
                "total_price"
              );
              // console.log(name)
              if (typeof toFind != "undefined") {
                datasets.push(toFind);
              } else {
                datasets.push("0");
              }
            }

            datas = {
              name: key,
              data: datasets
            };
            self.datasArray2.push(datas);
            // console.log(self.datasArray);
            datas = {};
            datasets = [];
          }
          // datasArray = _.sortBy(datasArray, "name");
          this.options = {
            ...this.options,
            ...{
              series: self.datasArray2
            }
          };

          self.ready = true;
          // console.log(datasArray);
        }
      });
    },
    getItems: async function() {
      var self = this;
      self.datasArray = [];
      self.Labels1 = [];
      var from;
      var to;

      typeof self.year == "undefined" || self.year == ""
        ? (self.year = new Date().getFullYear())
        : self.year;

      from = moment(this.dateFrom.date).format("YYYY-MM-DD");
      to = moment(this.dateTo.date).format("YYYY-MM-DD");
      var url = "/inventories/item/" + self.year + "/" + from + "/" + to;

      let Prices = "";
      let borderColor = "";
      let backgroundColor = "";
      var datas = {};
      var datasArray = [];
      await axios.get(url).then(response => {
        // console.log(response.data);
        this.data1 = response.data;
        this.Labels1 = _.sortedUniq(this.data1[this.data1.length - 1]);

        this.manifest = {
          ...this.manifest,
          ...{
            xaxis: {
              categories: _.sortedUniq(this.data1[this.data1.length - 1])
            }
          }
        };
        this.data1.splice(this.data1.length - 1, 1);

        var datas = {};
        if (this.data1) {
          var datasets = [];

          var groupName = _.chain(this.data1)
            .groupBy("category")
            .value();
          // console.log(groupName);
          var self = this;
          for (let [key, value] of Object.entries(groupName)) {
            var groupDate = _.chain(value)
              .groupBy("date")
              .map((objs, key1) => ({
                category: objs[0].category,
                date: objs[0].date,
                price: _.sumBy(objs, "price")
              }))
              .value();
            // console.log(ind)
            for (let [key2, value2] of Object.entries(self.Labels1)) {
              var toFind = _.result(
                _.find(groupDate, function(obj) {
                  return obj.date === value2;
                }),
                "price"
              );
              // console.log(name)
              if (typeof toFind != "undefined") {
                datasets.push(toFind);
              } else {
                datasets.push("0");
              }
            }

            datas = {
              name: key,
              data: datasets
            };
            self.datasArray.push(datas);
            datas = {};
            datasets = [];
          }
          // datasArray = _.sortBy(datasArray, "name");
          this.manifest = {
            ...this.manifest,
            ...{
              series: self.datasArray
            }
          };
          self.ready1 = true;
          // console.log(datasArray);
        }
      });
    }
  }
};
</script>
<style>
</style>