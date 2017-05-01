<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>schol.io | Διεκδίκησε την υποτροφία σου.</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/new/img/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/new/img/favicon-144.ico">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/new/img/favicon-72.ico">
    <link rel="apple-touch-icon-precomposed" href="/new/img/favicon-57.ico">


    <!--====== CSS  Styles =======-->
    @include('public.styles')

    <!-- Profile  CSS -->
    <link rel="stylesheet" href="/new/css/scholarship-profile.css" >


    <!-- Results CSS -->
    {{--<link href="{{asset('new/css/results.css')}}" rel="stylesheet">--}}


     <!-- jQuery js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <!-- Bootstrap js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Angular js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js"></script>


    <!-- javascript Results -->
    <script src="{{asset('/new/js/results.js')}}"></script>


    <script>
        // window.SelectedLocation = "{{ session()->pull('location') }}"
        window.Search = "{{ session('search') }}"
    </script>


    <style>

        .upper-box{background-color: #008DA5; height: 320px; border-radius: 4px; border-bottom-left-radius: 0; border-bottom-right-radius: 0}
        .title-to{ font-size: 140%; color: #fafafa; font-weight: 300; padding: 200px 0 0 70px;}
        .avatar-container{ margin-top: 30px; margin-left: -5px; }
        .avatar{ box-shadow: 0 0 15px #222; }
        .name{margin-left: 150px; margin-top: -80px; color: #fff; font-size: 120%; font-weight: 400;}
        .email{margin-left: 220px; margin-top: 10px; color: #888; font-size: 105%; font-weight: 300;}

        .main{ background: #fff; z-index: -2; margin: -30px 0 40px 0; padding: 40px  }


        .inner-section{ margin: 80px 0 0 0; padding: 5px 5px 25px 5px ; border: 1px solid #aaa; border-radius: 8px; background-color: #F1F4F5;
        }
        .section-text{color: #888; font-size: 110%; font-weight: 300; margin:-25px 0 30px 10px;
            border: 1px solid #aaa; border-radius: 6px; padding: 7px; min-width: 190px; max-width: 250px; background-color: #fafafa;
            box-shadow: 0 0 9px #aaa}


        .info{ color: #008DA5; font-weight: 400; margin: 5px 0}
        .value{color: #667;  font-weight: 300;}
        /*  ======================================= */

        @media (min-width:992px) and (max-width: 1200px) {

        }

        @media (min-width: 768px) and (max-width: 991px) {

        }

        @media  (max-width: 767px) {


        }
        @media  (max-width: 600px) {

        }


        @media  (max-width:480px) {

        }

        @media  (max-width: 390px) {

        }


    </style>


</head>



<body data-spy="scroll" data-target=".navbar" data-offset="50" id="home"  ng-app="studentApp"  ng-controller="studentCtrl" data-ng-init="init()"  ng-cloak>
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
                            <li>
                                <a href="">
                                    <button type="button" class="sc-button-landing sc-button sc-green sc-t-white" data-toggle="modal" data-target="#select-modal">Εγγραφή</button>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <button type="button" class="sc-button-landing sc-button sc-dark-blue sc-t-white" data-toggle="modal" data-target="#signIn-modal">Σύνδεση</button>
                                </a>
                            </li>
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

<div class="container">

    <div>
        <div class="upper-box" >
            <div class="title-to">
                <div class="avatar-container"> <img src="{{ $user->info->avatar }}" class="avatar" alt="">
                </div>
                <div class="name">{{ $user->name }}</div>
            </div>
        </div>

        <div class="email">{{ $user->email }}</div>

        <div class=" col-xs-12 row main">
            <div class="row inner-section">
                <div class="section-text centered-text"> Στοιχεία Υποψηφίου</div>

                <div class="col-sm-6 col-lg-4 info">
                    <i class="icon-inp fa fa-street-view"></i>
                    Διεύθυνση:
                    <span class="value"> {{ $user->info->address }}</span>
                </div>
                <div class="col-sm-6 col-lg-4 info">
                    <i class="icon-inp fa fa-phone"></i>
                    Τηλέφωνο:
                    <span class="value"> {{ $user->info->phone }}</span>
                </div>
                <div class="col-sm-6 col-lg-4 info">
                    <i class="icon-inp fa fa-id-card-o"></i>
                    Αριθμός Δελτίου Ταυτότητας:
                    <span class="value"> {{ $user->cv->id_number }}</span>
                </div>
                <div class="col-sm-6 col-lg-4 info">
                    <i class="icon-inp fa fa-envelope-o"></i>
                    Ταχυδρομικός Κώδικας:
                    <span class="value"> {{ $user->cv->post_code }}</span>
                </div>
                <div class="col-sm-6 col-lg-4 info">
                    <i class="icon-inp fa fa-flag"></i>
                    Εθνικότητα:
                    <span class="value"> {{ $user->cv->nationality  }}</span>
                </div>
                <div class="col-sm-6 col-lg-4 info">
                    <i class="icon-inp fa fa-globe"></i>
                    Θρήσκευμα:
                    <span class="value"> {{ $user->cv->religion  }}</span>
                </div>
                <div class="col-sm-6 col-lg-4 info">
                    <i class="icon-inp fa fa-users"></i>
                    Μέλος Πολύτεκνης Οικογένειας:
                    <span class="value"> {{ $user->cv->polyteknos  }}</span>
                </div>
            </div>

            {{-- ΕΔΩ ΤΑ ΥΠΟΛΟΙΠΑ (ΤΑ ΕΜΦΑΝΙΖΩ ΜΟΝΟ ΑΝ ΔΕΝ ΕΙΝΑΙ NULL)--}}



            {{$admission->father_name!=null ? 'father_name:' . $admission->father_name : ''}}<br>
            {{$admission->father_email!=null ? 'father_email:' . $admission->father_email : ''}}<br>
            {{$admission->father_phone!=null ? 'father_phone:' . $admission->father_phone : ''}}<br>
            {{$admission->father_city!=null ? 'father_city:' . $admission->father_city : ''}}<br>
            {{$admission->father_post_code!=null ? 'father_post_code:' . $admission->father_post_code : ''}}<br>
            {{$admission->father_job!=null ? 'father_job:' . $admission->father_job : ''}}<br>
            {{$admission->father_company!=null ? 'father_company:' . $admission->father_company : ''}}<br>
            {{$admission->father_vat!=null ? 'father_vat:' . $admission->father_vat : ''}}<br>
            {{$admission->father_income!=null ? 'father_income:' . $admission->father_income : ''}}<br>
            {{$admission->father_id_number!=null ? 'father_id_number:' . $admission->father_id_number : ''}}<br>
            {{$admission->mother_name!=null ? 'mother_name:' . $admission->mother_name : ''}}<br>
            {{$admission->mother_email!=null ? 'mother_email:' . $admission->mother_email : ''}}<br>
            {{$admission->mother_phone!=null ? 'mother_phone:' . $admission->mother_phone : ''}}<br>
            {{$admission->mother_city!=null ? 'mother_city:' . $admission->mother_city : ''}}<br>
            {{$admission->mother_post_code!=null ? 'mother_post_code:' . $admission->mother_post_code : ''}}<br>
            {{$admission->mother_job!=null ? 'mother_job:' . $admission->mother_job : ''}}<br>
            {{$admission->mother_company!=null ? 'mother_company:' . $admission->mother_company : ''}}<br>
            {{$admission->mother_vat!=null ? 'mother_vat:' . $admission->mother_vat : ''}}<br>
            {{$admission->mother_income!=null ? 'mother_income:' . $admission->mother_income : ''}}<br>
            {{$admission->mother_id_number!=null ? 'mother_id_number:' . $admission->mother_id_number : ''}}<br>
            {{$admission->guardian_name!=null ? 'guardian_name:' . $admission->guardian_name : ''}}<br>
            {{$admission->guardian_email!=null ? 'guardian_email:' . $admission->guardian_email : ''}}<br>
            {{$admission->guardian_phone!=null ? 'guardian_phone:' . $admission->guardian_phone : ''}}<br>
            {{$admission->guardian_city!=null ? 'guardian_city:' . $admission->guardian_city : ''}}<br>
            {{$admission->guardian_post_code!=null ? 'guardian_post_code:' . $admission->guardian_post_code : ''}}<br>
            {{$admission->guardian_job!=null ? 'guardian_job:' . $admission->guardian_job : ''}}<br>
            {{$admission->guardian_company!=null ? 'guardian_company:' . $admission->guardian_company : ''}}<br>
            {{$admission->guardian_vat!=null ? 'guardian_vat:' . $admission->guardian_vat : ''}}<br>
            {{$admission->guardian_income!=null ? 'guardian_income:' . $admission->guardian_income : ''}}<br>
            {{$admission->guardian_id_number!=null ? 'guardian_id_number:' . $admission->guardian_id_number : ''}}<br>
            {{$admission->id_number!=null ? 'id_number:' . $admission->id_number : ''}}<br>
            {{$admission->post_code!=null ? 'post_code:' . $admission->post_code : ''}}<br>
            {{$admission->religion!=null ? 'religion:' . $admission->religion : ''}}<br>
            {{$admission->nationality!=null ? 'nationality:' . $admission->nationality : ''}}<br>
            {{$admission->place_of_birth!=null ? 'place_of_birth:' . $admission->place_of_birth : ''}}<br>
            {{$admission->student_relatives!=null ? 'student_relatives:' . $admission->student_relatives : ''}}<br>
            {{$admission->school_grades!=null ? 'school_grades:' . $admission->school_grades : ''}}<br>
            {{$admission->previous_school!=null ? 'previous_school:' . $admission->previous_school : ''}}<br>
            {{$admission->polyteknos!=null ? 'polyteknos:' . $admission->polyteknos : ''}}<br>
            {{$admission->skills!=null ? 'skills:' . $admission->skills : ''}}<br>
            {{$admission->languages!=null ? 'languages:' . $admission->languages : ''}}<br>
            {{$admission->certifications!=null ? 'certifications:' . $admission->certifications : ''}}<br>
            {{$admission->awards!=null ? 'awards:' . $admission->awards : ''}}<br>
            {{$admission->other_interests!=null ? 'other_interests:' . $admission->other_interests : ''}}<br>
            {{$admission->aboutMe!=null ? 'aboutMe:' . $admission->aboutMe : ''}}<br>
            {{$admission->notes!=null ? 'notes:' . $admission->notes : ''}}<br>

        </div>

    </div>
</div>







<!-- Footer -->
@include('public.footer')

</body>


<script>
    angular.module("studentApp",[])
            .controller("studentCtrl",function ($scope,$http) {


            })
</script>



</html>
