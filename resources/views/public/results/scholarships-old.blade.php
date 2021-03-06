<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="fb:pages" content="934370089973049" />

    <title>schol.io | Διεκδίκησε τώρα την υποτροφία που σου ταιριάζει.</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon-144.ico">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon-72.ico">
    <link rel="apple-touch-icon-precomposed" href="img/favicon-57.ico">


    <!--====== CSS  Styles =======-->
    @include('public.styles')

    <!-- Bootstrap Select -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

    <link href="{{asset('new/css/Bootstrap-xxs-xxxs.css')}}" rel="stylesheet">

    <!-- Ribbon CSS -->
     <link href="{{asset('new/css/ribbon.css')}}" rel="stylesheet">

    <!-- Hexagon CSS -->
    <link href="/new/css/Hexagon.css" rel="stylesheet">

    <!-- Input Range CSS -->
    <link href="{{asset('new/css/input-range.css')}}" rel="stylesheet">

    <!-- Results CSS -->
    <link href="{{asset('new/css/results.css')}}" rel="stylesheet">
    <link href="{{asset('new/css/scholarships.css')}}" rel="stylesheet">


    <!-- Algolia InstantSearch CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">


    <!-- Algolia CSS -->
    <link rel="stylesheet" href="/new/css/algolia.css"></link>


    <!-- Input Range CSS -->
{{--    <link href="{{asset('new/css/input-range.css')}}" rel="stylesheet">--}}

    <!-- Angular Material  CSS -->
    {{-- <link href="{{asset('new/css/angular-material.css')}}" rel="stylesheet">--}}

    <!-- jQuery js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- Bootstrap js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap Select js  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.4/js/bootstrap-select.min.js"></script>

    <!-- GoogleMap API -->
    {{--<script src="https://maps.googleapis.com/maps/api/js?libraries=geometry,places&language=el&region=GR&key=AIzaSyC18JCENxILnmXA1VGlsjJwBXQi3XZMWVA"></script>--}}
    {{--<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>--}}

    <!-- Angular js-->
    <!--  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.20/angular.min.js"></script>-->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.9/angular-animate.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.angular.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.angular.min.js"></script>--}}


    {{--Angular Library required By Angular Material UI--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.9/angular-aria.min.js"></script>--}}


    <!-- No error Filter:noArray angular 1.3.20 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/2.5.0/ui-bootstrap-tpls.min.js"></script>

    <!-- Angular Material UI-->
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.1.3/angular-material.min.js"></script>--}}

    <!-- Rating js-->
    {{--<script src="{{asset('/new/js/jquery.raty-fa.js')}}"></script>--}}

    <!-- javascript Results -->
    {{--<script src="{{asset('/new/js/')}}"></script>--}}
    <!--  -->

    <!--  Angular Results App -->
{{--    <script src="{{asset('/new/js/')}}"></script>--}}

    {{--<script src="{{asset('/new/js/ng-map.min.js')}}"></script>--}}

        <!--  Algolia & Algolia Autocomplete -->
    {{--<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>--}}


    <!-- Algolia InstantSearch.JS -->
    <script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>


    <script>
    window.SelectedLocation = "{{ session()->pull('location') }}"
    </script>

    <style>
    .active-school a{
        color: #000;
    }

    .active-item{
        background-color: red;
    }
    .active-pagination{
        border: 1px solid #888;
        background-color: #ddd;
    }
    .count-school{
        color: yellow;
    }
    </style>

</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50" id="home"  ng-app="scholarshipsResultsApp"  ng-controller="scholarshipsResultsCtrl" data-ng-init="init()"  ng-cloak>
    <!-- Scholio Header -->
    <header class="navbar navbar-fixed-top navbar-scroll sc-landing-header" id="header" >
        <div class="container">

            <div class="row">
                <div class="col-md-1 visible-lg visible-md nav-web">
                    <!-- Scholio Branding -->
                    <a class="sc-landing-brand" href="{{ url('/') }}">
                        <div class="sc-landing-logo-sticky" style=" padding-top: 15px">
                            <img src="{{asset('new/img/logo.png')}}" alt="scholio logo">
                        </div>
                    </a>
                </div>

                <div class="col-xs-6  visible-sm visible-xs">
                    <div class="nav-mobile">
                        <a class="" href="{{ url('/') }}">
                            <div class="navbar-brand  sc-landing-logo-sticky">
                                <img src="{{asset('new/img/logo-m.png')}}"alt="scholio logo">
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Scholio sMenu -->

                <!-- Large Menu -->
                <div class="col-md-11 visible-md visible-lg">
                    <div class="">
                        <ul class="nav navbar-nav navbar-right sc-landing-menu">
                            {{--<li class="sc-landing-menu-item"><a href="">ΥΠΟΤΡΟΦΙΕΣ</a></li>--}}
                            @if(auth()->check())
                                <li><a href="{{ url('/dashboard') }}"><button type="button" class="sc-button-landing sc-button sc-green sc-t-white">Διαχείριση</button></a></li>
                                <li><a href="{{ url('/out') }}"><button type="button" class="sc-button-landing sc-button sc-dark-blue sc-t-white ">Αποσύνδεση</button></a></li>
                            @else
                                <li><a href="{{ url('/register') }}"><button type="button" class="sc-button-landing sc-button sc-green sc-t-white">Εγγραφή</button></a></li>
                                <li><a href="{{ url('/login') }}"><button type="button" class="sc-button-landing sc-button sc-dark-blue sc-t-white ">Σύνδεση</button></a></li>
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div class="col-xs-6 visible-sm visible-xs ">
                    <div class="">
                        <div class="sc-landing-menu-mobile-sandwitch nav navbar-nav navbar-right pull-right">
                            <div class="sc-landing-menu-sandwitch-button-sticky sc-landing-menu-sandwitch">
                                <img src="{{asset('new/img/collapse-dark.png')}}" alt="scholio logo">
                            </div>
                        </div>
                    </div>

                    {{--data-toggle="collapse" aria-controls="collapseMenu" --}}
                    <div class="">
                        <div class="navbar-right pull-right margin-right-30 filter-icon"  id="filter-btn">
                            <a class="" role="button"
                               href="" aria-expanded="false">
                                <i class="fa fa-filter margin-right-30 margin-top-30 text-incr-175 sc-t-dark-grey" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="visible-xs visible-sm">
                        <div class="sc-landing-menu-mobile-holder sc-dark-blue">
                            <div class="pull-right">
                                <div class="sc-landing-menu-mobile-close sc-t-white">x</div>
                            </div>
                            <br><br>
                            <div class="sign-links">
                                @if(auth()->check())
                                    <div class=""><br></div>
                                    <a href="{{ url('/dashboard') }}"><button type="button" class="sc-button sc-orange sc-t-white pull-right">Διαχείριση</button></a>
                                    <div><br><br><br></div>
                                    <a href="{{ url('/out') }}"><button type="button" class="sc-button sc-green sc-t-white pull-right">Αποσύνδεση</button></a>
                                @else
                                    <div class=""><br></div>
                                    <a href="{{ url('/register') }}"><button type="button" class="sc-button sc-orange sc-t-white pull-right">Εγγραφή</button></a>
                                    <div class=""><br><br><br></div>
                                    <a href="{{ url('/login') }}"><button type="button" class="sc-button  sc-green sc-t-white pull-right">Σύνδεση</button></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>  <!-- row -->
        </div> <!-- container-->
    </header>

    <!-- Scholio Main Section. -->
    <main id="main"  class="main"  ng-cloak>
        <div class="container">
            <div class="row up">

            </div>

            <div class="row">
                <!--============ collapseMenu =============-->
                <div id="mobFilt" class="  hidden-md hidden-lg col-xs-8 mob-filter left--300"
                     style="padding: 0 ; width: 254px; box-shadow: 2px 0px 40px 6px #4e4e4e;  margin-top: -79px;">

                    <div class="" style="">
                        <div class="box left-box1" style="z-index: 195;">
                            <p class="text-incr-115 centered-text box1-title"> Πεδία Αναζήτησης
                                <a class="" role="button" id="close-btn"
                                   aria-expanded="false" aria-controls="">
                                    <i class="fa fa-times text-incr-115 sc-t-grey pad-left-35" aria-hidden="true"></i>
                                </a>
                            </p>

                            <div class="centered-text" style="max-width: 338px;" ng-cloak>
                                <select title="Εκπαιδευτικός Φορέας" class="selectpicker" data-width="91%" ng-model="categoryFilter" ng-change="">
                                    <option id="drop1" data-icon="glyphicon glyphicon-education" data-subtext="" value="null"
                                            data-content=" <i class='glyphicon glyphicon-education margin-right-5 kf-gray'></i> <span class='kf-gray text-incr-85'> &nbsp;  Εκπαιδευτικός Φορέας</span>">....</option>

                                    <option data-icon="fa fa-university" data-subtext="" class="kf-option" value="1">&nbsp; Κολλέγια</option>
                                    <option data-icon="fa fa-cogs" data-subtext="" class="kf-option" value="2">&nbsp; IEK </option>
                                    <option data-icon="fa fa-pencil" data-subtext="" class="kf-option" value="3">&nbsp;  Φροντιστήρια </option>
                                    <option data-icon="fa fa-flag" data-subtext="" class="kf-option" value="4">&nbsp;  Ξένες Γλώσσες </option>
                                    <option data-icon="fa fa-book" data-subtext="" class="kf-option" value="6">&nbsp;  Ιδιωτικά Σχολεία</option>
                                </select>
                            </div>

                            <div class="input-group centered-text pad-top-20" ng-cloak>
                                <span class="input-group-addon text-incr-115 kf-gray" id="basic-addon1"><i class="fa fa-map-marker margin-right-5"></i></span>
                                <input type="text" ng-model="locationSelected" placeholder="Στην Περιοχή:" id="input1" class="kf-option"
                                        uib-typeahead="address for address in getLocation($viewValue)" typeahead-loading="loadingLocations"
                                        typeahead-no-results="noResults" autocomplete="off">
                            </div>

                            <div class="input-group centered-text pad-top-20 kf-gray" style="width: 89%; margin-top: 15px;" ng-if="!showAll">
                                <input type="range" ng-model="maxDistance" min=0 max=30 step=2 class="margin-bot-10" ng-change="">
                                <span>Απόσταση μέχρι: &nbsp;&nbs@{{ maxDistance }} km </span>
                            </div>




                        </div>


                    </div>

                </div><!-- collapseMenu -->

                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs hidden-xxs" >
                    <div class="left-box1">

                        <div class="centered-text margin-top-30" style="max-width: 338px;" ng-cloak>
                            <select title="Εκπαιδευτικός Φορέας" class="selectpicker" data-width="91%">
                                <option id="" data-icon="glyphicon glyphicon-education" data-subtext="" value="null"
                                        data-content=" <i class='glyphicon glyphicon-education margin-right-5 kf-gray'></i> <span class='kf-gray text-incr-85'> &nbsp;  Εκπαιδευτικός Φορέας</span>">....</option>

                                <option data-icon="fa fa-university" data-subtext="" class="kf-option" value="1">&nbsp; Κολλέγια</option>
                                <option data-icon="fa fa-cogs" data-subtext="" class="kf-option" value="2">&nbsp; IEK </option>
                                <option data-icon="fa fa-pencil" data-subtext="" class="kf-option" value="3">&nbsp;  Φροντιστήρια </option>
                                <option data-icon="fa fa-flag" data-subtext="" class="kf-option" value="4">&nbsp;  Ξένες Γλώσσες </option>
                                <option data-icon="fa fa-book" data-subtext="" class="kf-option" value="6">&nbsp;  Ιδιωτικά Σχολεία</option>
                            </select>

                            <div class="input-container">
                                <input class="input-box" type="text"  id="" placeholder="Αναζήτησε πχ Αγγλικά, ή Λύκειο"/>
                            </div>
                        </div>

                        <div class="location-container font-weight-300">
                            <div class="input-group centered-text pad-top-20" ng-cloak>
                                <span class="input-group-addon text-incr-115 kf-gray " id="basic-addon1"><i class="fa fa-map-marker margin-right-5"></i></span>
                                <input type="text" ng-model="locationSelected" placeholder="Στην Περιοχή:" id="input1" class="kf-option"
                                       uib-typeahead="address for address in getLocation($viewValue)" typeahead-loading="loadingLocations"
                                       typeahead-no-results="noResults" autocomplete="off">
                            </div>

                            <div class="input-group centered-text pad-top-20 kf-gray" style="width: 89%; margin-top: 15px;" ng-if="!showAll">
                                <input type="range" ng-model="maxDistance" min=0 max=30 step=2 class="margin-bot-10" ng-change="showMap()">
                                <span>Απόσταση μέχρι: &nbsp;&nbsp;@{{ maxDistance }} km </span>
                            </div>

                        </div>
                    </div>

                    <div class="left-box4 font-weight-300 sc-t-grey centered-text margin-top-30">
                        Βρέθηκαν 3 αποτελέσματα
                    </div>
                </div>  <!-- //col-lg-3-->



                <!-- ========== SCHOLARSHIPS  CONTAINER ============= -->
                <div class="col-lg-9 col-md-9 col-sm-12 scholarship-container " id="">

                    <!-- ===== SCHOLARSHIP1 ===== -->
                    <div class=" col-xs-12 pad-0-mar-0 inner-container">
                        <div  class="ribbon top5"><span style="font-size: 95%">top 10</span></div>
                        {{--<div  class="ribbon top20"><span style="font-size: smaller">top 20</span></div>--}}

                    <!-- ========== Scholarship Header ============= -->
                    <div class="col-xs-12 scholar-header">
                        <div class="circle margin-top-8 pull-left">
                            <div class=" trophy-container centered-abs">
                                <img class="trophy-img centered" src="/new/img/trophy4.png" alt="">
                            </div>
                        </div>
                        <div class="header-text margin-top-20 pull-left margin-left-10"> <span class="title-from">Υποτροφία από:</span>
                            <br class="break"> <span class="title-name">American College of Thessaloniki </span></div>
                        <div class="xxs-title-name">American College of Thessaloniki </div>
                        <div class="header-line"></div>
                    </div>

                    <div class="col-xs-12 pad-0-mar-0 section-container">
                        <!-- ========== Scholarship Section1 Αντικειμενο Σπουδών ============= -->
                        <div class="col-lg-4 col-md-6 col-sm-4 section1 ">
                            <div class="hex-container centered">
                                <div class="hexagon3 hex">
                                    <span></span>
                                    <img class="centered-abs hex-img" src="/panel/assets/images/steps/Οικονομία & Διοίκηση.png" alt="">
                                </div>
                            </div>
                            <div class="centered-text">
                                <div class="text-title">Αντικείμενο Σπουδών</div>
                                <div class="text-content">BSc in Business Administration, Concentration in Entrepreneurial Management</div>
                                <div class="text-title">Επίπεδο Σπουδών</div>
                                <div class="text-content">Προπτυχιακές Σπουδές-Bachelor</div>
                            </div>
                        </div>

                        <!-- ========== Scholarship Section2 Κριτήρια ============= -->
                        <div class="col-lg-4 col-md-6 col-sm-4 section2">
                            <div class="hex-container centered">
                                <div class="hexagon3 hex">
                                    <span></span>
                                    <img class="centered-abs hex-img" src="/panel/assets/images/steps/step3-help.png" alt="">
                                </div>
                            </div>
                            <div class="centered-text">
                                <div class="text-title">Υποτροφία με Κοινωνικά Κριτήρια</div>
                                <div class="text-content">Interdum et malesuada fames ac ante ipsum primis in faucibus.
                                    Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.

                                </div>
                            </div>
                        </div>

                        <!-- ========== Scholarship Section3 Financial Plan ============= -->
                        <div class="col-lg-4 col-sm-4 col-md-12 section3 ">
                            <div class="hex-container centered">
                                <div class="hexagon3 hex" style="">
                                    <span></span>
                                    <img class="centered-abs hex-img" src="/panel/assets/images/steps/step1-hand2.png" alt="">
                                </div>
                            </div>
                            <div class="centered-text">
                                <div class="text-title">Ποσό Επιδότησης 800 €</div>
                                <div class="text-content">Ιn faucibus interdum et malesuada fames ac ante ipsum primis.
                                    Torquent per conubia nostra.

                                </div>
                            </div>
                        </div>

                        {{--<div class="col-md-12 hidden-xs hidden-lg hidden-sm visible-md section4" ></div>--}}
                    </div>

                    <!-- ========== Scholarship Footer============= -->
                    <div class="col-xs-12 scholar-footer ">
                        <div class="col-xs-9 col-sm-10  sc-t-grey font-weight-300 pad-0-mar-0">
                            <div class=" xxs-9 col-xs-6 col-sm-5 col-md-6 pad-0-mar-0 xxs-footer" >
                                <span class=" xxs-8 col-xs-8 col-sm-7 pad-0-mar-0">
                                    <div class="">  <i class="fa fa-pencil margin-right-10"></i>Αιτήθηκαν:</div>
                                    <div class="margin-top-5">  <i class="fa fa-thumbs-o-up margin-right-10"></i>Ενδιαφέρθηκαν:</div>
                                </span>
                                <span class="xxs-2 col-xs-2 col-sm-3 text-right">
                                    <div class="">34</div>
                                    <div class="margin-top-5">123</div>
                                </span>
                            </div>
                            <div class="col-xs-6 col-sm-5 pad-0-mar-0 xs-hidden">
                                <span class="col-xs-7 col-sm-7 pad-0-mar-0">
                                    <div class="margin-top-5">  <i class="fa fa-pencil-square-o margin-right-10"></i>Με εξετάσεις:</div>
                                    <div class="">  <i class="fa fa-flag-o margin-right-10"></i>Λήγει:</div>
                                </span>
                                <span class="col-xs-5 col-sm-5 pad-0-mar-0 text-right">
                                    <div class="margin-top-5" > NAI</div>
                                    <div class="">10 Μαϊ 2017</div>
                                </span>
                            </div>
                        </div>


                        <div class=" xxs-3 col-xs-3  col-sm-2 pad-0-mar-0">
                            {{--@if(auth()->check())--}}
                                    {{--<a href=""><button id="b@{{scholarship.id}}" type="button" ng-click="interested(scholarship.id, $index)" class="sc-button-landing sc-button sc-dark-green sc-t-white btn-like" >--}}
                                            {{--<i id="i@{{scholarship.id}}" class="fa fa-thumbs-o-up margin-right-10 margin-left-5" aria-hidden="true"></i>--}}
                                            {{--<span id="t@{{scholarship.id}}" ng-init="test(scholarship)">Ενδιαφέρομαι</span>--}}
                                        {{--</button>--}}
                                    {{--</a>--}}
                            {{--@endif--}}


                            <a href="/scholarship/1" >
                                <button type="button" class="sc-button-landing sc-button sc-green sc-t-white pull-right btn-provoli">
                                    <i class="fa fa-file-text-o margin-right-10" aria-hidden="true"></i> Προβολή
                                </button>
                            </a>
                        </div>
                    </div>

                </div> <!-- //col-lg-9-->


                    <!-- ===== SCHOLARSHIP2 ===== -->
                    <div class=" col-xs-12 pad-0-mar-0 inner-container">



                        <div  class="ribbon top20"><span style="font-size: 95%">Πλήρης</span></div>
                    {{--<div  class="ribbon top20"><span style="font-size: smaller">top 20</span></div>--}}


                    <!-- ========== Scholarship Header ============= -->
                        <div class="col-xs-12 scholar-header">
                            <div class="circle margin-top-8 pull-left">
                                <div class=" trophy-container centered-abs">
                                    <img class="trophy-img centered" src="/new/img/trophy4.png" alt="">
                                </div>
                            </div>
                            <div class="header-text margin-top-20 pull-left margin-left-10"> <span class="title-from">Υποτροφία από:</span>
                                <br class="break"> <span class="title-name">Μητροπολιτικό Κολλέγιο Θεσσαλονίκης</span></div>
                            <div class="xxs-title-name">Μητροπολιτικό Κολλέγιο Θεσσαλονίκης</div>
                            <div class="header-line"></div>
                        </div>

                        <div class="col-xs-12 pad-0-mar-0 section-container">
                            <!-- ========== Scholarship Section1 Αντικειμενο Σπουδών ============= -->
                            <div class="col-lg-4 col-md-6 col-sm-4 section1 ">
                                <div class="hex-container centered">
                                    <div class="hexagon3 hex">
                                        <span></span>
                                        <img class="centered-abs hex-img" src="/panel/assets/images/steps/Ναυτιλιακά - Nautical Education.png" alt="">
                                    </div>
                                </div>
                                <div class="centered-text">
                                    <div class="text-title">Αντικείμενο Σπουδών</div>
                                    <div class="text-content">MSc Maritime Business (Ναυτιλιακές Σπουδές)</div>
                                    <div class="text-title">Επίπεδο Σπουδών</div>
                                    <div class="text-content">Μεταπτυχιακές Σπουδές-Master</div>
                                </div>
                            </div>

                            <!-- ========== Scholarship Section2 Κριτήρια ============= -->
                            <div class="col-lg-4 col-md-6 col-sm-4 section2">
                                <div class="hex-container centered">
                                    <div class="hexagon3 hex">
                                        <span></span>
                                        <img class="centered-abs hex-img" src="/panel/assets/images/steps/step3-skills1.png" alt="">
                                    </div>
                                </div>
                                <div class="centered-text">
                                    <div class="text-title">Υποτροφία Ταλέντου-Δεξιοτήτων</div>
                                    <div class="text-content">Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                                        Interdum et malesuada fames ac ante ipsum primis in faucibus
                                    </div>
                                </div>
                            </div>

                            <!-- ========== Scholarship Section3 Financial Plan ============= -->
                            <div class="col-lg-4 col-sm-4 col-md-12 section3 ">
                                <div class="hex-container centered">
                                    <div class="hexagon3 hex" style="">
                                        <span></span>
                                        <img class="centered-abs hex-img" src="/panel/assets/images/steps/step1-reduce2.png" alt="">
                                    </div>
                                </div>
                                <div class="centered-text">
                                    <div class="text-title">Μείωση Διδάκτρων 100%</div>
                                    <div class="text-content">Ιn faucibus interdum et malesuada fames ac ante ipsum primis.
                                        Torquent per conubia nostra.

                                    </div>
                                </div>
                            </div>

                            {{--<div class="col-md-12 hidden-xs hidden-lg hidden-sm visible-md section4" ></div>--}}
                        </div>

                        <!-- ========== Scholarship Footer============= -->
                        <div class="col-xs-12 scholar-footer ">
                            <div class="col-xs-9 col-sm-10  sc-t-grey font-weight-300 pad-0-mar-0">
                                <div class=" xxs-9 col-xs-6 col-sm-5 col-md-6 pad-0-mar-0 xxs-footer" >
                                <span class=" xxs-8 col-xs-8 col-sm-7 pad-0-mar-0">
                                    <div class="">  <i class="fa fa-pencil margin-right-10"></i>Αιτήθηκαν:</div>
                                    <div class="margin-top-5">  <i class="fa fa-thumbs-o-up margin-right-10"></i>Ενδιαφέρθηκαν:</div>
                                </span>
                                    <span class="xxs-2 col-xs-2 col-sm-3 text-right">
                                    <div class="">9</div>
                                    <div class="margin-top-5">21</div>
                                </span>
                                </div>
                                <div class="col-xs-6 col-sm-5 pad-0-mar-0 xs-hidden">
                                <span class="col-xs-7 col-sm-7 pad-0-mar-0">
                                    <div class="margin-top-5">  <i class="fa fa-pencil-square-o margin-right-10"></i>Με εξετάσεις:</div>
                                    <div class="">  <i class="fa fa-flag-o margin-right-10"></i>Λήγει:</div>
                                </span>
                                    <span class="col-xs-5 col-sm-5 pad-0-mar-0 text-right">
                                    <div class="margin-top-5" >ΟΧΙ</div>
                                    <div class="">20 Ιουν 2017</div>
                                </span>
                                </div>

                            </div>


                            <div class=" xxs-3 col-xs-3  col-sm-2 pad-0-mar-0">
                                {{--@if(auth()->check())--}}
                                {{--<a href=""><button id="b@{{scholarship.id}}" type="button" ng-click="interested(scholarship.id, $index)" class="sc-button-landing sc-button sc-dark-green sc-t-white btn-like" >--}}
                                {{--<i id="i@{{scholarship.id}}" class="fa fa-thumbs-o-up margin-right-10 margin-left-5" aria-hidden="true"></i>--}}
                                {{--<span id="t@{{scholarship.id}}" ng-init="test(scholarship)">Ενδιαφέρομαι</span>--}}
                                {{--</button>--}}
                                {{--</a>--}}
                                {{--@endif--}}


                                <a href="/scholarship/1" >
                                    <button type="button" class="sc-button-landing sc-button sc-green sc-t-white pull-right btn-provoli">
                                        <i class="fa fa-file-text-o margin-right-10" aria-hidden="true"></i> Προβολή
                                    </button>
                                </a>
                            </div>

                        </div>

                    </div> <!-- //col-lg-9-->



                </div>

            </div> <!-- //row-->
        </div> <!-- //container-->
    </main>

    <!-- Footer -->
    @include('public.footer')

</body>

<script>


angular.module("scholarshipsResultsApp",[])
        .controller("scholarshipsResultsCtrl",function ($scope,$http) {

//            $scope.results = $http.get("api/...." + id)
//                    .success(function (data) {
//                        $scope.results = data
//                    })

            console.log('start');



        })



</script>

</html>
