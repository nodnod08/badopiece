<template>
  <div class="container">
    <div v-if="loading">
      <div class="loader-back"></div>
      <div class="loader">
        <radar-spinner :animation-duration="1500" :size="60" color="#18ffff"/>
      </div>
    </div>
    <br>
    <br>
    <div v-for="item in Items" v-bind:key="item.id" class="row">
      <div class="img_zoom col l6 m6 s12">
        <v-zoom
          v-if="type == 'printers'"
          class="responsive-img"
          :img="'/storage/img/offer-img/'+item.printer_image1"
          :height="400"
          :width="300"
        ></v-zoom>
        <v-zoom
          v-else
          class="responsive-img"
          :img="'/storage/img/offer-img/'+item.cartridge_image"
          :height="400"
          :width="300"
        ></v-zoom>
      </div>
      <div v-if="type == 'printers'" class="col l6 m12 s12">
        <br>
        <br>
        <label>Printer Name :</label>
        <span>{{ item.printer_name }}</span>
        <br>
        <br>
        <label>Printer Type :</label>
        <span>{{ item.printer_type }}</span>
        <br>
        <br>
        <label>Printer Voltage :</label>
        <span>{{ item.printer_voltage }}</span>
        <br>
        <br>
        <label>Printer Frequency :</label>
        <span>{{ item.printer_frequency }}</span>
        <br>
        <br>
        <label>Printer Technology :</label>
        <span>{{ item.printer_technology }}</span>
        <br>
        <br>
        <label>Printer Speed :</label>
        <span>{{ item.printer_speed }}</span>
        <br>
        <br>
        <label>Printer Interface :</label>
        <span>{{ item.printer_interface }}</span>
        <br>
        <br>
        <label>Printer Media Sizes :</label>
        <span>{{ item.printer_media_sizes }}</span>
        <br>
        <br>
        <label>Printer Compatible Cartridges :</label>
        <span>{{ item.printer_toner }}</span>
      </div>
      <div v-else class="col l6 m12 s12">
        <br>
        <br>
        <label>Cartridge Name :</label>
        <span>{{ item.cartridge_name }}</span>
        <br>
        <br>
        <label>Cartridge Type :</label>
        <span>{{ item.cartridge_type }}</span>
        <br>
        <br>
        <label>Cartridge Color :</label>
        <span>{{ item.cartridge_color }}</span>
        <br>
        <br>
        <label>Compatible For :</label>
        <span>{{ item.cartridge_compatible }}</span>
        <br>
        <br>
        <label>Page Yield :</label>
        <span>{{ item.cartridge_yield }}</span>
        <br>
        <br>
        <label>Cartridge Price :</label>
        <span>{{ item.cartridge_price }}</span>
        <br>
        <br>
      </div>
    </div>
    <br>
    <br>
  </div>
</template>

<script>
import vZoom from "vue-zoom";
import { RadarSpinner } from "epic-spinners";
export default {
  props: ["id", "type"],
  components: {
    vZoom,
    RadarSpinner
  },
  data() {
    return {
      Items: {},
      loading: false
    };
  },
  created() {
    this.getItem();
  },
  methods: {
    getItem: async function() {
      this.loading = true;

      var url = "/getItem/" + this.type + "/" + this.id;
      await axios.get(url).then(response => {
        this.Items = response.data;
        console.log(this.Items);
      });

      this.loading = false;
    }
  }
};
</script>

<style>
.responsive-img {
  border: 1px solid #404040;
}
</style>

