<template>
    <div>
       <navbar-component></navbar-component>
        <div class="showcase">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="message-intro text-white">
                            <h1>Gives you a lot of Choice</h1>
                            <h3>We make your business comportable on our products.</h3>
                            <br>
                            <a href="#"><button class="button-social" type="button"><i class="fab fa-google-plus-g"></i> Sign in with Google</button></a>
                            <p>Easily sign in with your google.</p>
                            <p>Register <a href="#">here</a> to get updated about new products.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center text-black">
                        <h4>WHY CHOOSE US?</h4>
                    </div>
                    <br>
                    <br>
                    <br>    
                </div>
            </div>
            <div class="container">
                <div class="row text-black text-center">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="card choose-us">
                            <div class="text-center">
                                <img height="150" width="160" :src="'storage/img/bg-img/save.png'" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">GUARANTEE SAVE YOUR MONEY</h5>
                                <small>A lot of choice from our products that applicable to your budgets and save your money for purchasing.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                        <div class="card choose-us">
                            <div class="text-center">
                                <img height="150" class="" :src="'storage/img/bg-img/durable.png'" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">PRODUCTS DURABILITY ARE PERFECT</h5>
                                <small>Durability of all printers and cartridges are tested and ensured for the use of all.</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 text-center">
                        <div class="card choose-us">
                            <div class="text-center">
                                <img height="150" class="" :src="'storage/img/bg-img/support.png'" alt="">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">GOOD ASSIST AND FAST SUPPORT</h5>
                                <small>Will give you an immediate support and information, also a fast support for avoiding downtime.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container get-touch">
                <div class="row">
                    <div class="col-lg-6 col-md-6 text-center">
                        <div class="touch-box">
                            <h3 class="title">GET IN TOUCH</h3>
                            <br>
                            <textarea name="" id="" class="form-control" placeholder="Leave a message or question"></textarea>
                            <br>
                            <input type="email" class="form-control" placeholder="Your Email">
                            <br>
                            <button class="" type="button">Submit</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="jumbotron client">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h4>HERE IS SOME OF OUR BIG CLIENTS</h4>
                        <p>We introduce some of our long time clients who still trust our services.</p>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-lg-3">
                        <a href="https://online-appointment.marina.gov.ph/">
                            <img height="150" :src="'storage/img/core-img/client-1.png'" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="https://www.nykline.com/ecom/CUP_HOM_3000.do?redir=Y">
                            <img height="150" :src="'storage/img/core-img/client-2.png'" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="http://www.tsmphil.com.ph/">
                            <img height="150" :src="'storage/img/core-img/client-3.png'" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="http://www.elburgshipmanagement.com.ph/esmv2/">
                            <img height="150" :src="'storage/img/core-img/client-4.png'" alt="">
                        </a>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-lg-3">
                        <a href="http://www.snackattack.ph/">
                            <img height="150" :src="'storage/img/core-img/client-5.png'" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="https://robocash.ph/">
                            <img height="150" :src="'storage/img/core-img/client-6.png'" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="http://ssc.edu.ph/">
                            <img height="150" :src="'storage/img/core-img/client-7.png'" alt="">
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="https://www.chinabank.ph/personal.aspx">
                            <img height="150" :src="'storage/img/core-img/client-8.png'" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
       <!-- <footer-component></footer-component> -->
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
    .showcase {
        background-image: url('../../../public/storage/img/bg-img/bg-new3.jpg');
        background-repeat: no-repeat;
        background-size:100% auto;
        position: relative;
        width: 100%;
        min-height: 100vh;
        margin: 0;
        padding: 0;
    }

    @media(max-width: 1000px) {
        .showcase {
            min-height: 70vh;
            margin-top: 70px;
        }
    }

    @media(max-width: 540px) {
        .showcase {
            background-image: url('../../../public/storage/img/bg-img/bg-new3-center.jpg');
        }
    }

    .message-intro {
        margin-top: 250px;
        background: transparent;
        padding: 0;
        margin-bottom: 50px;
    }

    @media(max-width: 690px) {
        .message-intro {
            margin-top: 250px;
            background: rgba(64, 64, 64, 0.7);
            padding: 2%;
            border-radius: 5px;
        }
    }

    li {
        list-style: none;
    }

    .jumbotron {
        margin-bottom: 0;
    }
    .fa-medal {
        color: #fcff63;
    }
    .get-touch {
        margin-top: 50px;
    }

    .choose-us {
        margin-bottom: 50px;
    }

    .button-social, .button-social:focus {
        background: #DB4437;
        color: #fff;
        outline: none;
        border: none;
    }

    .touch-box {
        background: #404040;
        padding: 2%;
    }

    .touch-box .title {
        color: #fff;
    }

    .touch-box button {
        border: none;
        outline: none;
        width: 70%;
    }
    
</style>
