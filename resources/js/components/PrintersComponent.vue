<template>
    <div class="container">
        <div v-if="loading">
            <div class="loader-back"></div>
            <div class="loader">
                <radar-spinner
                    :animation-duration="1500"
                    :size="60"
                    color="#18ffff"
                />
            </div>
        </div>
        <div class="row search">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12 l12">
                    <i class="material-icons prefix">find_in_page</i>
                    <textarea v-on:keyup="getPrinters" id="icon_prefix2" v-model="search" class="materialize-textarea"></textarea>
                    <label for="icon_prefix2">Search Item</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div v-for="item in printersItem.data" class="items card col l4 m6 white">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="img activator" :src="'/storage/img/offer-img/'+item.printer_image1">
                </div>
                <div class="card-content">
                    <p class="activator grey-text text-darken-4">{{ item.printer_name }}</p>
                    <a :href="'/shop/printers/'+item.id" class="waves-effect waves-light btn  grey darken-3"><i class="material-icons left">details</i>View</a>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Printer Specifications<i class="material-icons right">close</i></span>
                    <br><br>
                    <label>Printer Name : </label>
                    <span>{{ item.printer_name }}</span>
                    <br><br>
                    <label>Printer Type : </label>
                    <span>{{ item.printer_type }}</span>
                    <br><br>
                    <label>Printer Voltage : </label>
                    <span>{{ item.printer_voltage }}</span>
                    <br><br>
                    <label>Printer Frequency : </label>
                    <span>{{ item.printer_frequency }}</span>
                    <br><br>
                    <label>Printer Technology : </label>
                    <span>{{ item.printer_technology }}</span>
                    <br><br>
                    <label>Printer Speed : </label>
                    <span>{{ item.printer_speed }}</span>
                    <br><br>
                    <label>Printer Interface : </label>
                    <span>{{ item.printer_interface }}</span>
                    <br><br>
                    <label>Printer Media Sizes : </label>
                    <span>{{ item.printer_media_sizes }}</span>
                    <br><br>
                    <label>Printer Compatible Cartridges : </label>
                    <span>{{ item.printer_toner }}</span>
                </div>
            </div>
        </div>
        <h6>Showing from {{ this.printersItem.from }} to {{ this.printersItem.to }} of {{ this.printersItem.total }}</h6>
        <pagination :data="printersItem" @pagination-change-page="getPrinters">
        <span slot="prev-nav">Previous</span>
	    <span slot="next-nav">Next</span>
        </pagination>
        <br><br><br>
    </div>
</template>

<script>
    Vue.component('pagination', require('laravel-vue-pagination'));
    import { RadarSpinner  } from 'epic-spinners'
    export default {
        components: {
            RadarSpinner
        },
        data() {
            return {
                printersItem: {},
                search: '',
                loading: false
            }
        },
        created() {
            this.getPrinters();
        },
        methods: {
            getPrinters : async function(page = 1) {
                    this.loading = true;

                    if(typeof this.search == 'undefined' || this.search == '') {
                        var url = '/getPrinters/default?page=';
                    } else {
                        var url = '/getPrinters/'+this.search+'?page=';
                    }
                    await axios.get(url + page).then(response => {
                        this.printersItem = response.data;
                    })

                    this.loading = false;
            }
        }
    }
</script>

<style>
    .items {
        margin-top: 30px;
        /* margin-left: 10px;
        margin-right: 10px; */
    }

    .img {
        width: 100px;
        height: 400px;
    }

    .opener {
        cursor: pointer;
    }

    .search {
        margin-bottom: -40px;
        margin-top: 20px;
        margin-left: -15px;
    }
</style>

