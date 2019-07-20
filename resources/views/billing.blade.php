@extends('template')
@section('extra-css')
<style>
    #billing {
        margin-top: 100px;
    }

    .item-summary {
        margin: 2%;
        background: #ebebeb;
    }

    .braintree-heading {
        font-size: 24px;
        font-family: "Oswald", sans-serif;
        margin-bottom: 10px;
        display: none
    }

    .empty {
        width: 200px;
        height: 200px;
    }

    .required-message {
        color: red
    }
</style>
@endsection
@section('extra-js-link')
<!-- Load PayPal's checkout.js Library. -->
<script src="https://www.paypalobjects.com/api/checkout.js" data-version-4 log-level="warn"></script>

<!-- Load the client component. -->
<script src="https://js.braintreegateway.com/web/3.47.0/js/client.min.js"></script>

<!-- Load the PayPal Checkout component. -->
<script src="https://js.braintreegateway.com/web/3.47.0/js/paypal-checkout.min.js"></script>

<script src="https://js.braintreegateway.com/web/dropin/1.18.0/js/dropin.min.js"></script>
@endsection
@section('content')
<div>
    <div id="billing">
        <navbar-component
            username="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}"
            count="{{ json_encode($data['count']) }}">
        </navbar-component>
    </div>
    <div class="container cart">
        @if(json_encode($data['count']) > 0)
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <h4>Billing Info</h4>
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <hr />
                <form id="checkoutForm" class="needs-validation" novalidate method="POST" action="/processPayment">
                    <div class="row mt-4 mb-5">
                        <div class="col-lg-12">
                            <h5>
                                <b>Personal Information</b> <small class="required-message">( Required )</small>
                            </h5>
                        </div>
                        <br />
                        <br />
                        <div class="col-lg-6 mb-2">
                            <label for>First Name</label>
                            @csrf
                            <input name="firstname" id="validationCustom01" type="text"
                                class="form-control form-control-sm" required />
                            <div class="invalid-feedback">
                                Please provide a First Name.
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>Last Name</label>
                            <input name="lastname" id="validationCustom02" type="text"
                                class="form-control form-control-sm" required />
                            <div class="invalid-feedback">
                                Please provide a Last Name.
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>Email</label>
                            <input name="email" id="validationCustom03" type="email"
                                class="form-control form-control-sm"
                                value="{{ Auth::check() ? Auth::user()->email : '' }}" required />
                            <div class="invalid-feedback">
                                Please provide an Email.
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>Phone Number</label>
                            <input name="phone" id="validationCustom04" type="number"
                                class="form-control form-control-sm" required />
                            <div class="invalid-feedback">
                                Please provide a Phone Number.
                            </div>
                        </div>
                        <br />
                        <div class="col-lg-12 mt-4 mb-4">
                            <h5>
                                <b>Shipping Address Information</b> <small class="required-message">( Required )</small>
                            </h5>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>Address</label>
                            <input name="address" id="validationCustom05" type="text"
                                class="form-control form-control-sm" required />
                            <div class="invalid-feedback">
                                Please provide an Address.
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>City</label>
                            <input name="city" id="validationCustom06" type="text" class="form-control form-control-sm"
                                required />
                            <div class="invalid-feedback">
                                Please provide a City.
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>State / Province</label>
                            <input name="state" id="validationCustom07" type="text" class="form-control form-control-sm"
                                required />
                            <div class="invalid-feedback">
                                Please provide a State or Province.
                            </div>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>Postal Code</label>
                            <input name="postal" id="validationCustom08" type="number"
                                class="form-control form-control-sm" required />
                            <input name="payment_method_nonce" type="hidden" id="payment_method_nonce"
                                class="form-control form-control-sm" />
                            <input name="transaction_type" type="hidden" id="transaction_type"
                                class="form-control form-control-sm" />
                            <div class="invalid-feedback">
                                Please provide a Postal Code.
                            </div>
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for>Tell something about your order. (optional)</label>
                            <textarea class="form-control" name="message"></textarea>
                        </div>
                    </div>
                    @if(!Auth::check())
                    <div class="row mt-4 mb-5">
                        <div class="col-lg-12">
                            <h5>
                                <b>Account First</b> <small class="required-message">( Required )</small>
                                <br>
                                <small>We recommended that all user has an account and has been login, so that all
                                    transaction will be sent to your account. Thank you.</small>
                                <br>
                                <br>
                                <a href="/signin">
                                    <button class="btn btn-outline-dark btn-sm my-2 my-sm-0" type="button">
                                        Login
                                    </button></a>
                                or
                                <a href="/signup">
                                    <button class="btn btn-outline-dark btn-sm my-2 my-sm-0" type="button">
                                        Create an Account
                                    </button></a>
                            </h5>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
            <div class="col-lg-3 mb-5">
                <h4>Item Summary</h4>
                <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row item-summary">
                            <div class="col-lg-12">
                                <br />
                                <h6>Summary</h6>
                                <br />
                                <div class="row">
                                    <div class="col-lg-6">Subtotal</div>
                                    <div class="col-lg-6">
                                        <b>&#8369; {{ json_encode($data['subTotal']) }}.00</b>
                                    </div>
                                    <div class="col-lg-6">Shipping fee</div>
                                    <div class="col-lg-6">
                                        <b>&#8369; {{ (json_encode($data['subTotal']) >= 500) ? '0' : '100' }}.00</b>
                                    </div>
                                    <div class="col-lg-6">VAT</div>
                                    <div class="col-lg-6">
                                        <b>10%</b>
                                    </div>
                                    <br />
                                    <br />
                                    <div class="col-lg-6">
                                        <b>Total</b>
                                    </div>
                                    <div class="col-lg-6">
                                        <b>&#8369;
                                            {{ (json_encode($data['subTotal']) >= 500) ? json_encode($data['subTotal']) : json_encode($data['subTotal']) + 100 }}.00</b>
                                    </div>
                                    <br />
                                    <div class="col-lg-12 mt-4 mb-4">
                                        <a href="/cart">
                                            <button class="btn btn-outline-dark btn-sm my-2 my-sm-0" type="button">
                                                <i class="fas fa-arrow-circle-left"></i> Back
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(Auth::check())
        <div class="row mb-5">
            <div class="col-lg-6">
                <h5>
                    <b>Choose a way to pay</b> <small class="required-message"></small>
                </h5>
                <div id="dropin-container"></div>
                <br>
                <button id="submit-button" class="btn btn-outline-dark btn-sm my-2 my-sm-0">Pay now
                    <i class="fas fa-money-check"></i></button>
            </div>
            <div class="col-lg-12 mt-5">
                <h5>
                    <b>Other payment method</b> <small class="required-message"></small>
                </h5>
                <div id="dropin-container"></div>
                <br>
                <button id="MeetUP" class="btn btn-outline-dark btn-sm my-2 my-sm-0">Pay on meet up
                    <i class="far fa-handshake"></i></button>
                <button id="COD" class="btn btn-outline-dark btn-sm my-2 my-sm-0">Cash on Delivery
                    <i class="fas fa-motorcycle"></i></button>
            </div>
        </div>
        @endif
        @else
        <div class="row mb-5 mt-5">
            <div class="col-lg-12 text-center">
                <img class="empty" src="{{ asset('storage/img/bg-img/empty.png') }}" alt="">
                <br />
                <p>It seems your cart doesn't have any item.</p>
                <a href="/products">
                    <button type="submit" class="text-center btn btn-outline-dark btn-sm">
                        Shop now
                        <i class="fas fa-shopping-bag"></i>
                    </button>
                </a>
            </div>
        </div>
        @endif
    </div>
    <div id="billing1">
        <footer-component></footer-component>
    </div>
</div>

@endsection
@section('extra-js')
<script>
    braintree.dropin.create({
        authorization: 'sandbox_9q2whtnv_btsn82cvs6kmgrxb',
        container: '#dropin-container',
        paypal: {
            flow: 'vault',
            amount: '10.00',
            currency: 'USD'
        }
    }, function (err, instance) {
        (function() {
            'use strict';
                var forms = document.getElementsByClassName('needs-validation');
                var form1 = document.getElementById("submit-button");
                var toSubmit = document.querySelector("#checkoutForm");
                
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form1.addEventListener('click', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');

                            instance.requestPaymentMethod(function (err, payload) {

                                if(typeof payload != 'undefined' && form.checkValidity() !== false) {                     
                                    setTimeout(function() {
                                        swal({
                                            title: "Your payment is ready to process.",
                                            text: "Are you sure, your order and other details are correct?",
                                            icon: "info",
                                            buttons: true,
                                            dangerMode: true,
                                        })
                                        .then((willDelete) => {
                                            if (willDelete) {
                                                document.querySelector("#payment_method_nonce").value = payload.nonce;
                                                document.querySelector("#transaction_type").value = '3';
                                                toSubmit.submit();
                                            } else {
                                                
                                            }
                                        });
                                    },1250)
                                } else {

                                }
                            });
                    }, false);
                });
        })();
    });
    var meetUP = document.getElementById("MeetUP"); 
    var COD = document.getElementById("COD"); 
    var forms = document.getElementsByClassName('needs-validation');
    var toSubmit = document.querySelector("#checkoutForm");

    var validation = Array.prototype.filter.call(forms, function(form) {
            MeetUP.addEventListener('click', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    swal({
                        title: "Your payment is ready to process.",
                        text: "Are you sure, your order and other details are correct?",
                        icon: "info",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            document.querySelector("#transaction_type").value = '2';
                            toSubmit.submit();
                        } else {
                                                        
                        }
                    });
                }
                form.classList.add('was-validated');
        }, false);
    });

    var validation = Array.prototype.filter.call(forms, function(form) {
            COD.addEventListener('click', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    swal({
                        title: "Your payment is ready to process.",
                        text: "Are you sure, your order and other details are correct?",
                        icon: "info",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            document.querySelector("#transaction_type").value = '1';
                            toSubmit.submit();
                        } else {
                                                        
                        }
                    });
                }
                form.classList.add('was-validated');
        }, false);
    });
</script>
@endsection