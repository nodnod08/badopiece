<template>
    <div>
       <h1>sample footer</h1>
    </div>
</template>


<script>
    import { RadarSpinner  } from 'epic-spinners'
    export default {
        components: {
            RadarSpinner
        },
        data() {
            return {
                loading: false,
                email: ''
            }
        },
        methods: {
            subscribe: function() {
                
            }
        }      
    }
</script>
