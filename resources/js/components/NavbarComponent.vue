<template>
    <div>
       <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
           <div class="container">
               <a class="navbar-brand" href="/">
                   <img class="brand-logo" :src="'storage/img/core-img/logo3.png'" alt="">
               </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CARTRIDGES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">PRINTERS</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <button class="btn btn-outline-primary btn-sm my-2 my-sm-0" type="submit">Signin</button>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <button class="btn btn-outline-primary btn-sm my-2 my-sm-0" type="submit">Register</button>
                            </a>
                        </li>
                    </ul>
                </div>
           </div>
       </nav>
    </div>
</template>


<script>
    export default {
        components: {
            
        },
        data() {
            return {
                
            }
        },
        methods: {
            
        }      
    }
</script>
<style>
    .brand-logo {
        width: 140px;
        height: 60px;
    }
</style>

