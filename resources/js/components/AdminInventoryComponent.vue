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
        <div style="margin-top: 31px;" class="col-lg-4">
          <span>
            <button v-on:click="getData()" class="btn btn-primary btn-sm">Search</button>
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
          text: "Inventory Monitoring",
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
              return value.toLocaleString();
            },
            style: {
              fontSize: "15px",
              fontFamily: "Helvetica, Arial, sans-serif",
              cssClass: "apexcharts-yaxis-label"
            },
            title: {
              text: "Stocks"
            }
          },
          title: {
            text: "Stocks"
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
      self.datasArray = [];
      var from;
      var to;

      typeof self.year == "undefined" || self.year == ""
        ? (self.year = new Date().getFullYear())
        : self.year;

      from = moment(this.dateFrom.date).format("YYYY-MM-DD");
      to = moment(this.dateTo.date).format("YYYY-MM-DD");
      var url = "/inventories/" + self.year + "/" + from + "/" + to;

      let Prices = "";
      let borderColor = "";
      let backgroundColor = "";
      var datas = {};
      var datasArray = [];
      await axios.get(url).then(response => {
        console.log(response.data);
        let data = response.data;
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

        var datas = {};
        if (data) {
          var datasets = [];

          var groupName = _.chain(data)
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
                quantity: _.sumBy(objs, "quantity")
              }))
              .value();
            // console.log(ind)
            for (let [key2, value2] of Object.entries(self.Labels)) {
              var toFind = _.result(
                _.find(groupDate, function(obj) {
                  return obj.date === value2;
                }),
                "quantity"
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
            datasArray.push(datas);
            datas = {};
            datasets = [];
          }
          // datasArray = _.sortBy(datasArray, "name");
          this.options = {
            ...this.options,
            ...{
              series: datasArray
            }
          };
          // console.log(datasArray);
        }
      });
    }
  }
};
</script>
<style>
</style>