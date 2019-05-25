{{-- @extends('navbar')

@section('content')
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col l12 m12 s12">
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><b>COMPANY PROFILE</b></div>
                        <div class="collapsible-body">
                            <p>
                                Pro Prints Enterprise is generally a printer and printer consumables provider and reseller. We deliver a strategic solutions that will facilitate our client’s optimal balance between cost, quality, and productivity.  The company concentrates on selling Brand New Alternative Toners which are compatible with the various models of Brother, HP, Samsung and Canon LaserJet Printers. It also offers Free Use of LaserJet printers for those clients who want to save on budget for their printer expenditures. Further, the company provides free repair and maintenance for clients owned and out of warranty LaserJet printers.  We have develop and implement a system that listens and adopt the customer’s need. With our experience in management, we are providing superior quality, the most competitive price and the best after sales service in the market now a days.  At Pro Prints Enterprise we innovate products thru consumer satisfaction, market demands and environmental concerns. We always driven our desire to give a good quality and affordable product to our valued clients and consumers.  Pro Prints Enterprise was founded by a group of young and visionary professionals with strong belief that the continuous innovation is the keystone toward better living. The backbone of the company is a well knowledgeable in LaserJet Printers, Digital Marketing Expert and Sales and Marketing Enthusiast who participate their profession for more than 7 years. We aim to be one of the most trusted leading supplier and remanufacturer in our industry.
                            </p>
                        </div>                        
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col l6 m6 s12">
                <ul class="collapsible">
                    <li>
                      <div class="collapsible-header"><b>MISSION</b></div>
                      <div class="collapsible-body">
                        <p>
                            Provide customers with high quality products and expertise to express their ideas and promote brand new alternative toner Cartridges.
                        </p>
                      </div>
                    </li>
                </ul>
            </div>
            <div class="col l6 m6 s12">
                <ul class="collapsible">
                    <li>
                      <div class="collapsible-header"><b>VISION</b></div>
                      <div class="collapsible-body">
                          <p>
                              Our vision is to become the country's largest provider of quality remanufactured and brand new compatible toner cartridges.
                          </p>
                      </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col l12 m12 s12">
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header"><b>Facilities and Safety on Work Place</b></div>
                        <div class="collapsible-body">
                            <p>
                                1. Take care in using facilities and equipment. It is in good form to handle them with care and use them solely on their purpose.
                            </p>
                            <p>
                                2. Only use equipments that you already know how to use. Do not handle it until such time the teacher gives instructions on how to operate the said equipment. You could break the equipment or cause harm to yourself or others.
                            </p>
                            <p>
                                3. Be Alert and Aware.
                            </p>
                            <p>
                                4. In performing exercises and movement in general, practice good form first.  Doing exercises in improper form deficit it's benefits.    
                            </p>
                            <p>
                                5. Bring back all equipment in place after use. This is to prevent having them misplaced, stolen or become unnecessary clutters in the repair area than can cause accidents.
                            </p>
                            <p>
                                6. Do not monopolize the equipments. Allow everyone a fair use of the facilities.  Presence of mind could help avoid accidents.
                            </p>
                            <p>
                                7. Return the equipment properly or leave the venue clean. Do not leave or pass on equipments that is in complete disarray or dirty.
                            </p>
                            <p>
                                8. Check Yourself - practice proper hygiene and care. Take a bath or a deodorant if needed. Do not force yourself to engage in work if you are feeling sick.
                            </p>
                            <p>
                                9. Do not loiter around the repair area or hang on the equipment doing nothing.
                            </p>
                            <p>
                                10. Be nice, as a general rule!
                            </p>
                        </div>                        
                    </li>
                </ul>
            </div>
        </div>
        <br><br>
    </div>
@endsection --}}

@extends('template')

@section('content')
<div id="about">
    <about-component auth="{{ Auth::check() ? Auth::user()->username : 'none' }}"></about-component>
</div>
@endsection