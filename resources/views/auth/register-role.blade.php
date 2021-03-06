<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"><!-- prevent zoomIn in mobile inputs,selects,etc -->
    <meta name="description" content="Your scholarship is a click away!">
    <meta name="author" content="Schol.io">
    <meta name="description" content="Αναζήτηση υποτροφιών και εκπαιδευτικών υπηρεσιών.">
    <meta name="keywords" content="Κολλέγιο, ΙΕΚ, Σχολείο, Δημοτικό, Γυμνάσιο, Λύκειο, Πανεπιστήμιο, ΚΕΚ, ΙΙΕΚ, Σχολές, Σπουδές, Εκπαιδευτικά Ιδρύματα">

    <link rel="shortcut icon" href="/panel/assets/images/favicon_1.ico">

    <title>schol.io | Διεκδίκησε την υποτροφία σου.</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/new/img/favicon.ico" type="image/x-icon" />

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/new/img/favicon-144.ico">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/new/img/favicon-72.ico">
    <link rel="apple-touch-icon-precomposed" href="/new/img/favicon-57.ico">


    <!-- font-awesome -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css">

    <link href="/panel/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />


    <link href="/new/css/main.css" rel="stylesheet" type="text/css" />
    <link href="/new/css/register-login.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    {{--<!--[if lt IE 9]>--}}
    {{--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>--}}
    {{--<![endif]-->--}}


    <!-- Angular js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.5/angular.min.js"></script>

</head>

<style>

    .middle-text{ font-size: 140%; font-weight: 300; margin-top: 0; margin-bottom: 20px;}
    .btn-role{border: 1px solid #ddd; height: 140px; padding: 0; border-radius: 6px;}
    .btn-role:hover{ background-color: #f1f4f5; border: 2px solid #888; cursor: pointer}
    .role-img,.role-img2,.role-img3,.role-img-cl,.role-img-cl2,.role-img-cl3{width: 90px; margin-top: 15px; position: absolute; top: 10px;}
    .role-img:hover,.role-img2:hover{visibility: hidden}
    .role-img2,.role-img-cl2{ width: 88px; margin-top: 3px}
    .role-img3,.role-img-cl3{ width: 80px; margin-top:0}
    .btn-text{ margin-top: 110px; font-size: 130%; font-weight: 400}
    .colored{opacity: 0.01; }
    .colored:hover, .show{opacity: 1;}
    .selected{ background-color: #d9e5e8; border: 3px solid #555;box-shadow: 0 0  10px #aaa;}

    .btn-next{margin: 30px 0 0 0;}
    .fill{ margin-top: 20px; padding-top: 30px;}
    .login{background-color: #f1f4f5;}
    .mar-left{margin-left: 10px}
    .mar-right{margin-right: 10px}



    @media screen and (min-width:768px) {
        .btn-role {
            max-width: 190px;
        }
    }

    @media screen and (max-width:340px){
        .btn-next{width: 60px; font-size: 130%}
        .mar-left{margin-left: 0}
        .mar-right{margin-right: 0}
    }



</style>



<body ng-app="registerApp" ng-controller="registerCtrl">

        <div class="outer card-box col-xxs-12 col-sm-offset-1 col-sm-10 col-md-8 col-md-offset-2">
                <div class="panel-heading">
                    <div class="text-center">
                        <a href="/">
                            {{--<img  class="register-scholio-logo"  src="/new/img/logoNX-m.webp" alt="scholio logo">--}}


                            <svg id="Logo-Defs" class="" baseProfile="tiny">
                            <defs>
                                <linearGradient id="MyGradient" x1="0%" y1="0%" x2="0%" y2="0%">
                                    <stop offset="5%"  stop-color="#0C496B"/>
                                    <stop offset="50%" stop-color="1B4C6B#" />
                                    <stop offset="95%" stop-color="1B4C6B"/>
                                </linearGradient>

                                <g id="Logo-Group">
                                    <path id="upperArc" d="
                                    M299.738,99.284C288.735,48.008,242.255,9.5,186.559,9.5c-55.802,0-102.33,38.663-113.218,90.084l26.32-13.286
                                    c14.774-31.458,48.106-53.416,86.898-53.416c38.651,0,71.898,21.79,86.755,53.063L299.738,99.284z"/>

                                    <g id="Hat">
                                        <path  d="
                                        M243.613,152.684c-20.961,9.995-46.574,21.084-57.054,21.084c-9.445,0-34.806-10.826-56.394-20.916
                                        c-0.005,0.607-0.024,1.209-0.02,1.818c0.132,19.097-2.693,31.021,5.127,38.722c12.268,12.082,37.776,22.055,51.811,22.055
                                        c14.355,0,42.283-10.597,52.089-19.604c7.625-7.004,4.288-22.076,4.459-41.173C243.637,154.004,243.618,153.346,243.613,152.684z

                                          M301.581,110.668c0,0-92.993-50.83-115.022-50.83c-25.144,0-114.974,50.459-114.974,50.459c-0.45,4.053-0.697,8.166-0.697,12.336
                                        c0,30.933,12.705,58.954,33.275,79.377l7.528-24.114c-12.634-15.237-20.185-33.967-20.185-54.819c0,0,78.419,43.401,95.054,43.401
                                        c7.107,0,32.138-11.096,56.533-22.783c-5.049-2.37-10.588-5.031-16.392-7.887c-22.643-11.139-40.62-20.942-40.151-21.895
                                        c0.469-0.953,19.205,7.305,41.848,18.445c6.769,3.33,13.104,6.534,18.671,9.424c25.683-12.402,34.521-17.13,34.521-17.13
                                        c0,21.85-8.253,39.848-21.997,55.413l8.296,22.995c21.199-20.507,34.342-48.963,34.342-80.429
                                        C302.23,118.591,302.004,114.601,301.581,110.668z"/>
                                    </g>

                                    <g id="Flags">
                                        <path id="flag1" class="Text" d="
                                        M141.948,386.5c-3.367,0,0.342-111.014-7.932-113.713c-6.465-2.109-52.562,70.304-56.385,68.85
                                        c-4.535-1.725,39.608-130.263,39.608-130.263s19.721,17.015,27.948,19.758c7.894,2.632,32.956,1.166,32.956,1.166
                                        S147.771,386.5,141.948,386.5z

                                        M231.739,386.5c3.367,0-0.342-111.014,7.932-113.713c6.465-2.109,52.562,70.304,56.385,68.85
                                        c4.535-1.725-39.608-130.263-39.608-130.263s-19.721,17.015-27.948,19.758c-7.894,2.632-32.956,1.166-32.956,1.166
                                        S225.916,386.5,231.739,386.5z"/>
                                    </g>
                                </g>
                            </defs>
                            </svg>

                            <svg id="Logo" class="svg-box" width="220px" viewBox="0 0 600 450" xml:space="preserve">
                                <use id="Draw-upperArc" class="Animate-Draw" xlink:href="#upperArc" />
                                <use id="Draw-Hat" class="Animate-Draw" xlink:href="#Hat" />
                                <use id="Draw-Flags" class="Animate-Draw" xlink:href="#Flags" />
                            </svg>
                            <div class="clearfix"></div>







                        </a>
                    </div>
                    <div class="text-center login-signUp-title">@lang('register.register')</div>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal m-t-20 " action="{{ url('/userRole/save') }}" id="form">
                        {{ csrf_field() }}

                        <div class="middle-text centered-text">@lang('register.select')</div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="btn-role centered-text" ng-mouseover="over=true"  ng-mouseleave="over=false" ng-click="active('student')" ng-class="{selected: role=='student'}">
                                    <img src="/new/img/student2-line.png" class="role-img centered-abs " alt="">
                                    <div class="colored" ng-class="{show: (over||role=='student')}">
                                        <img src="/new/img/student2.png" class="role-img-cl centered-abs " alt="">
                                        <div class="btn-text">@lang('register.student')</div>
                                    </div>
                                </div>
                            </div>

                            {{--<div class="col-sm-4">--}}
                                {{--<div class="btn-role centered-text" ng-mouseover="over2=true"  ng-mouseleave="over2=false" ng-click="active('parent')" ng-class="{selected: role=='parent'}">--}}
                                    {{--<img src="/new/img/parent-line.png" class="role-img2 centered-abs " alt="">--}}
                                    {{--<div class="colored" ng-class="{show: over2||role=='parent'}">--}}
                                        {{--<img src="/new/img/parent.png" class="role-img-cl2 centered-abs " alt="">--}}
                                        {{--<div class="btn-text">@lang('register.parent')</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                            <div class="col-sm-6">
                                <div class="btn-role centered-text" ng-mouseover="over3=true"  ng-mouseleave="over3=false" ng-click="active('teacher')" ng-class="{selected: role=='teacher'}" >
                                    <img src="/new/img/teacher-line.png" class="role-img3 centered-abs " alt="">
                                    <div class="colored" ng-class="{show: over3||role=='teacher'}" >
                                        <img src="/new/img/teacher.png" class="role-img-cl3 centered-abs " alt="">
                                        <div class="btn-text">@lang('register.teacher')</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class=" col-xs-6">
                                <button class="btn sc-dark-green sc-t-white btn-next" onclick="window.history.back(); return false;">
                                    <i class="fa fa-chevron-circle-left mar-right" aria-hidden="true"></i>
                                    <span class="hidden-xxxxs">@lang('register.back') </span>
                                </button>
                            </div>
                            <div class="col-xs-6">
                                <button class="btn sc-dark-green sc-t-white btn-next" type="button" ng-click="register()">
                                    <span class="hidden-xxxxs">@lang('register.continue')</span>
                                    <i class="fa fa-chevron-circle-right mar-left" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="fill" ng-if="noValid">
                                <div class="fill sc-t-orange">@lang('register.error')</div>
                            </div>
                        </div>

                        <input type="text" style="display: none;" ng-model="role" name="role">


                    </form>
                </div>

            <div class="login">
                <div class="col-xs-12 text-center margin-top-15 margin-bot-25 ">
                    @lang('register.account')<a href="/login" class="text-primary" style="color: black"><b class="orange-hover">@lang('register.signin')</b></a>
                </div>
            </div>

        </div>



<script>
    angular.module("registerApp",[])

        .controller("registerCtrl",function ($scope) {
            console.log($scope.role)
            $scope.noValid=false;
            $scope.over = false;
            $scope.over2 = false;
            $scope.over3 = false;
            $scope.role = null;
            $scope.active = function (role) {
                $scope.role = role;
                $scope.noValid=false;
                console.log($scope.role)
            }

            $scope.register=function(){
                if($scope.role){
                    document.getElementById('form').submit();
//                     window.location.href=/register/
                }
                else{$scope.noValid=true;
                // setTimeout(function(){ $scope.noValid=false; }, 2000);

                }
            }
        })
</script>
</body>



</html>
