<template>
  <div class="content">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-lg-12 mb-4">
          <h4>Inventory Dashboard</h4>
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
        <div class="col-lg-4">
          <span>
            <button v-on:click="getData()" class="btn btn-primary">Search</button>
          </span>
        </div>
        <div class="col-lg-12 mt-4">
          <apexchart
            :width="options.chart.width"
            :height="options.chart.height"
            :type="options.chart.type"
            :options="options"
            :series="options.series"
          ></apexchart>
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
      Labels: [],
      year: "",
      vendor: "",
      dateFrom: {
        date: {},
        name: "date_to",
        class: "form-control"
      },
      dateTo: {
        date: {},
        name: "date_to",
        class: "form-control"
      },
      options: {
        chart: {
          background: "#fff",
          height: "400",
          width: "100%",
          type: "bar",
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
        colors: ["#12c7c4"],
        dataLabels: {
          enabled: true
        },
        stroke: {
          curve: "smooth"
        },
        series: [],
        title: {
          text: "Products Overview By Category(s)",
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
            text: "Item(s) Category"
          }
        },
        yaxis: {
          title: {
            text: "Quantity"
          }
        },
        legend: {
          position: "top",
          horizontalAlign: "right",
          floating: true,
          offsetY: -25,
          offsetX: -5
        }
      }
    };
  },
  created() {
    this.dateFrom.date = this.setDateFrom();
    this.dateTo.date = this.setDateTo();
    this.getData();
  },
  methods: {
    setDateFrom: function() {
      var now = new Date();
      return now.setDate(now.getDate() - 30);
    },
    setDateTo: function() {
      return new Date();
    },
    getData: async function() {
      var self = this;
      var datas = {};
      var datasets = [];
      await axios.get("inventories/get-all-items").then(response => {
        let data = response.data;
        console.log(data);
        this.Labels = _.sortedUniq(data[data.length - 1]);
        this.options = {
          ...this.options,
          ...{
            xaxis: {
              categories: _.sortedUniq(data[data.length - 1])
            }
          }
        };
        data.splice(data.length - 1, 1);

        // $.each(data, function(ind, val) {
        //   datasets.push(data[ind].quantity);
        // });
        for (let [key, value] of Object.entries(data)) {
          datasets.push(data[key].quantity);
        }
        datas = {
          name: "Category Quantity",
          data: datasets
        };
        this.options = {
          ...this.options,
          ...{
            series: [datas]
          }
        };
        datas = {};
        datasets = [];
      });
      this.dataCollected = 1;
    }
  }
};
</script>
<style>
</style>