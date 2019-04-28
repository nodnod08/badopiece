<template>
    <li class="">
        <a class="black-text" href="">
            <i class="material-icons left">shopping_cart</i>
            <span class="new badge">4</span>
        </a>
    </li>
</template>

<script>
    
    export default {
        props: ['sample'],
        components: {
            
        },
        mounted() {
            // console.log('Printers mounted.')
        },
        data() {
            return {
                loading: false
            }
        },
        created() {
            console.log(this.sample)
        },
        methods: {
            
        }
    }
</script>

<style>

</style>

