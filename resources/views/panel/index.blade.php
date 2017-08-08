@extends('panel.layouts.main')

@section('styles')
    <style>
        .up{margin-top: 20px;}
        .dash-card{padding: 45px 10px; height: 190px; border: 1px solid #008da5; border-radius: 10px; text-align: center; box-shadow: 0 0 11px #bbb;}
        .dash-card:hover{background: #fafafa; border: 2px solid #FD6A33; box-shadow: 0 0 13px #999;}
        .cont-dash{text-align: center}
        .image{height:45px; }
        .text{color: #008da5; font-weight: 300; font-size: 130%; margin: 15px 5px!important; }
        .counter{color: #00839b; font-weight: 300; font-size: 120%; margin: 0 3px; opacity: 0.2}

        @media (max-width: 520px){
            .dash-card{padding: 25px 10px; height: 145px;}
        }

    </style>

@endsection

@section('content')

                    <div class="row up">


                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="{{ url('panel/users/student/studentCv') }}">
                                <div class="panel dash-card">
                                    <div class="cont-dash">
                                        <img src="/panel/assets/images/steps/skills2.png" alt="cv image" class="image">
                                        <div class="text">
                                            Τα βιογραφικό μου
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="{{ url('panel/users/student/mySchools') }}">
                                <div class="panel dash-card">
                                    <div class="cont-dash">
                                        <img src="/new/img/univ.png" alt="university image" class="image">
                                        <div class="text">
                                            Τα εκπαιδευτήρια μου
                                            {{--<span class="counter" style="">counter</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="{{ url('panel/users/student/mySchools') }}">
                                <div class="panel dash-card">
                                    <div class="cont-dash">
                                        <img src="/panel/assets/images/steps/step3-open.png" alt="scholarship image" class="image">
                                        <div class="text">
                                            Αιτήσεις Υποτροφιών
                                            {{--<span class="counter" style="">counter</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a href="{{ url('panel/users/student/review/show') }}">
                                <div class="panel dash-card">
                                    <div class="cont-dash">
                                        <img src="/panel/assets/images/steps/stars.png" alt="reviews image" class="image">
                                        <div class="text">
                                            Οι αξιολογήσεις μου
                                            {{--<span class="counter" style="">counter</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

@endsection
