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
    }
</style>
@endsection
@section('extra-js-link')
@endsection
@section('content')
<div id="billing">
    <navbar-component
        username="{{ Auth::check() ? (( Auth::user()->provider_name != null) ? Auth::user()->name : Auth::user()->username) : 'none' }}"
        count="{{ json_encode($data['count']) }}">
    </navbar-component>
    <div class="container cart">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <h4>Billing Info</h4>
                <hr />
                <form if="payment-form">
                    <div class="row mt-4 mb-5">
                        <div class="col-lg-12">
                            <h5>
                                <b>Personal Information</b>
                            </h5>
                        </div>
                        <br />
                        <br />
                        <div class="col-lg-6 mb-2">
                            <label for>First Name</label>
                            <input name="firstname" type="text" class="form-control form-control-sm" />

                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>Last Name</label>
                            <input name="lastname" type="text" class="form-control form-control-sm" />
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>Email</label>
                            <input name="email" type="email" class="form-control form-control-sm" />
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>Phone Number</label>
                            <input name="phone" type="text" class="form-control form-control-sm" />
                        </div>
                        <br />
                        <div class="col-lg-12 mt-4 mb-4">
                            <h5>
                                <b>Shipping Address Information</b>
                            </h5>
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>Address</label>
                            <input name="address" type="text" class="form-control form-control-sm" />
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>City</label>
                            <input name="city" type="text" class="form-control form-control-sm" />
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>State / Province</label>
                            <input name="state" type="text" class="form-control form-control-sm" />
                        </div>
                        <div class="col-lg-6 mb-2">
                            <label for>Postal Code</label>
                            <input name="postal" type="text" class="form-control form-control-sm" />
                            <input name="payment_method_nonce" type="hidden" id="nonce"
                                class="form-control form-control-sm" />
                        </div>
                        <div class="col-lg-12 mb-2">
                            <label for>Tell something about your order. (optional)</label>
                            <textarea class="form-control" name="message"></textarea>
                        </div>
                    </div>
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
                                            <button :class="'btn btn-outline-dark btn-sm my-2 my-sm-0'" type="button">
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
        <div class="row mb-5">
            <div class="col-lg-6">
                <div id="dropin-container"></div>
                <button id="submit-button" class="btn btn-outline-dark btn-sm my-2 my-sm-0 mt-5">Pay Now
                    <i class="fas fa-money-check"></i></button>
            </div>
        </div>
    </div>
    <footer-component></footer-component>
</div>
@endsection
@section('extra-js')
<!-- Load PayPal's checkout.js Library. -->
<script src="https://www.paypalobjects.com/api/checkout.js" data-version-4 log-level="warn"></script>

<!-- Load the client component. -->
<script src="https://js.braintreegateway.com/web/3.47.0/js/client.min.js"></script>

<!-- Load the PayPal Checkout component. -->
<script src="https://js.braintreegateway.com/web/3.47.0/js/paypal-checkout.min.js"></script>

<script src="https://js.braintreegateway.com/web/dropin/1.18.0/js/dropin.min.js"></script>
<script>
    var button = document.querySelector('#submit-button');
    
    braintree.dropin.create({
        authorization: 'sandbox_9q2whtnv_btsn82cvs6kmgrxb',
        container: '#dropin-container',
        paypal: {
            flow: 'vault',
            amount: '10.00',
            currency: 'USD'
        }
    }, function (err, instance) {
        button.addEventListener('click', function () {
            alert('click')
            instance.requestPaymentMethod(function (err, payload) {
            // Submit payload.nonce to your server
            console.log(payload)
            });
        })
    });
</script>
@endsection