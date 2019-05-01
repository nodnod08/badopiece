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
                    <textarea v-on:keyup="getCartridges" id="icon_prefix2" v-model="search" class="materialize-textarea"></textarea>
                    <label for="icon_prefix2">Search Item</label>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div v-for="item in cartridgesItem.data" v-bind:key="item.id" class="items card col l4 m6 white">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="img activator" :src="'/storage/img/offer-img/'+item.cartridge_image">
                </div>
                <div class="card-content">
                    <p class="activator grey-text text-darken-4">{{ item.cartridge_name }}</p>
                    <a :href="'/shop/cartridges/'+item.id" class="waves-effect grey darken-3
 waves-light btn"><i class="material-icons left">details</i>View</a>
                </div>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Cartridge Specifications<i class="material-icons right">close</i></span>
                    <br><br>
                    <label>Cartridge Name : </label>
                    <span>{{ item.cartridge_name }}</span>
                    <br><br>
                    <label>Cartridge Type : </label>
                    <span>{{ item.cartridge_type }}</span>
                    <br><br>
                    <label>Cartridge Color : </label>
                    <span>{{ item.cartridge_color }}</span>
                    <br><br>
                    <label>Compatible For : </label>
                    <span>{{ item.cartridge_compatible }}</span>
                    <br><br>
                    <label>Page Yield : </label>
                    <span>{{ item.cartridge_yield }}</span>
                    <br><br>
                    <label>Cartridge Price : </label>
                    <span>{{ item.cartridge_price.toLocaleString() }}</span>
                    <br><br>
                </div>
            </div>
        </div>
        <h6>Showing from {{ this.cartridgesItem.from }} to {{ this.cartridgesItem.to }} of {{ this.cartridgesItem.total }}</h6>
        <pagination :data="cartridgesItem" @pagination-change-page="getCartridges">
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
        mounted() {
            // console.log('Printers mounted.')
        },
        data() {
            return {
                cartridgesItem: {},
                search: '',
                loading: false,
                sample: 'mehehe'
            }
        },
        created() {
            this.getCartridges();
        },
        methods: {
            getCartridges : async function(page = 1) {
                this.loading = true

                if(typeof this.search == 'undefined' || this.search == '') {
                    var url = '/getCartridges/default?page=';
                } else {
                    var url = '/getCartridges/'+this.search+'?page=';
                }
                await axios.get(url + page).then(response => {
                    this.loading = true
                    this.cartridgesItem = response.data;
                    this.loading = false
                })

                this.loading = false
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

