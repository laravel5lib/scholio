@extends('panel.layouts.main')

@section('styles')
    {{-- <link href="/panel/assets/css/form.css" rel="stylesheet" type="text/css" /> --}}
    <!-- Polymer Float Form CSS -->
    <link rel="stylesheet" href="/new/css/jquery.polymer-form.min.css" >
    <link rel="stylesheet" href="/new/css/cv.css" type="text/css"  >


<style>

    /* ======  avoid filled autocomplete input yellow background on chrome ============ */
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active{
        -webkit-box-shadow: 0 0 0 30px #F1F4F5 inset;
        -webkit-text-fill-color: #555;
    }
    /* =========================================================== */

    #content{display: none;}
    .text{font-size: 14px; font-weight: 400; color: #999;}

    .img-avatar{height:100px; margin: 5px 110px; box-shadow: 0 0 10px 2px #555; border-radius: 6px;}
    .btn-choose{ height: 40px!important; padding: 11px 0!important; clear: both; margin: 20px 50px; width: 270px;}
    .btn-primary,.btn-primary:visited,.btn-primary:focus,.btn-primary:active{background-color: #008da5!important; border: none;}
    .btn-primary:hover{background-color: #006d7d!important;}
    label{cursor: pointer; font-size: 102%!important; font-weight: 300!important; }
    .select-gender{ margin: 5px 0 0 5px;}
    .select-transparent{background: transparent; border: none; margin-top: -1px;}
    .col-gender{border-bottom: 1px solid #aaa; padding: 0 14px; height: 56px;}
    .mar-right-10{margin-right: 10px;}
    .section-text{color: #008DA5; font-weight: 400; font-size: 110%}
    .m-b-40{margin-bottom: 40px}
    .m-t-50{margin-top: 60px;}

    .clear-fix{clear: both }

    .img-container{text-align: center;}


    @media (max-width: 543px){
    .br1{display: none;}
    }
    @media (max-width: 1200px){
        .btn-choose{text-align: center; margin: 20px auto;}
    }
    @media (max-width: 767px){
        .fa-gender{margin-top: 27px}
    }
</style>

@endsection

@section('scriptsBefore')

    <script>
        $(document).ready(function(){
            $('#full').fadeIn(90).removeClass('hidden');
        });
    </script>

    <!-- Polymer Float Input Form js -->
    <script src="/new/js/jquery.polymer-form.min.js"></script>
    <script src="/panel/assets/js/cv.js"></script>



@endsection


@section('content')

 <div class="row hidden" id="full">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="row">
                    <form method="POST" action="{{ route('teachers-profile') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        {{-- CHANGE CV'S PHOTO  --}}
                       <div class="col-xs-12 img-container" >
                            <h4 class="header-title"><b>Επεξεργασία Βιογραφικού</b></h4>
                            <p class="text">
                                    Συμπληρώστε τα στοιχεία επικοινωνίας σας και του βιογραφικού σας, <br class="br1"> για να διευκολυνθούν οι αιτήσεις υποτροφιών που θα πραγματοποιείσετε.
                            </p>
                            <div class="row">
                                    <div>
                                        <img class="img-avatar" src="{{substr(auth()->user()->info->avatar, 0, 4) == 'http' ? '' : ''}}{{ auth()->user()->info->avatar }}" >
                                    </div>


                                    <div id="changePhoto" class="btn btn-primary btn-choose">
                                        <label for="cvPhoto" class="label"> <i class="fa fa-upload mar-right-10"></i>Επιλογή φωτογραφίας προφίλ</label>
                                        <input type="file" id="cvPhoto" class="form-control" name="logo" style="visibility:hidden;">
                                    </div>

                            </div>
                       </div>


                        {{-- PROFILE DATA --}}
                        <div class="col-xs-12" >
                             <div class="inner-section row">
                                <div class="section-text centered-text"> Στοιχεία Επικοινωνίας</div>

                                <div class="col-sm-6">
                                    <div class="input-container">
                                        <input  type="text" label="Όνομα*" name="firstName" class="demo-form ad-input" value="{{ auth()->user()->info->fname }}">
                                        <i class="icon-inp  fa fa-user"></i>
                                    </div>
                                </div>
                                <div class="col-sm-6 input-container clear-fix-sm" >
                                    <input type="text" label="Επώνυμο*" name="lastName" class="demo-form ad-input" value="{{ auth()->user()->info->lname }}">
                                    <i class="icon-inp fa fa-user"></i>
                                </div>

                                <div class="col-sm-6 input-container">
                                    <input type="text" label="Διεύθυνση" name="student_address" class="demo-form ad-input" value="{{ auth()->user()->info->address }}">
                                    <i class="icon-inp fa fa-street-view"></i>
                                </div>
                                {{--  ΝΑ ΒΑΛΛΟΥΜΕ CITY  --}}
                                <div class="col-sm-6 input-container">
                                    <input type="text" label="Πόλη/Περιοχή" name="student_city" class="demo-form ad-input" value="{{ auth()->user()->info->address }}">
                                    <i class="icon-inp fa fa-map-marker"></i>
                                </div>

                                <div class="col-sm-6 input-container">
                                    <input type="text" label="Ηλεκτρονικό Tαχυδρομείο/ e-mail" name="email" class="demo-form ad-input" value="{{ auth()->user()->email}}">
                                    <i class="icon-inp fa fa-envelope"></i>
                                </div>
                                <div class="col-sm-6 input-container">
                                    {{--<a href="tel:{{ $user->info->phone }}">--}}
                                    <input type="text" label="Τηλέφωνο" name="student_phone" class="demo-form ad-input" value="{{ auth()->user()->info->phone }}">
                                    {{--</a>--}}
                                    <i class="icon-inp fa fa-phone"></i>
                                </div>

                                <div class="col-sm-6 input-container">
                                    <input type="text" label="Ημερομηνία Γέννησης" name="dob"  class="demo-form ad-input" value="{{ auth()->user()->info->dob }}">
                                    <i class="icon-inp fa fa-calendar"></i>
                                </div>

                               <div class="col-sm-6 input-container col-gender">
                                    <div class="drop-title">Φύλο*</div>
                                    <div class="select-gender">
                                        <select name="gender" class="select-transparent">
                                            <option value="male"
                                            @if (auth()->user()->info->gender == 'male' )
                                                selected
                                            @endif
                                            >Ανδρας</option>
                                            <option value="female"
                                                @if (auth()->user()->info->gender == 'female' )
                                                selected
                                                @endif
                                            >Γυναίκα</option>

                                        </select>
                                    </div>
                                   <i class="icon-inp fa fa-user fa-gender"></i>
                                </div>

                               {{-- TODO IS THIS NECESSARY? --}}

                                <div class="clearfix"></div>
                            </div>



                            <div class="inner-section row m-b-40" >
                                <div class="section-text centered-text"> Βασικές Σπουδές</div>

                                    <div class="col-sm-6">
                                        <div class="input-container">
                                            <input  type="text" label="Περιγραφή Βασικών Σπουδών" name="title" class="demo-form ad-input" value="{{ auth()->user()->info->title }}">
                                            <i class="icon-inp  fa fa-graduation-cap"></i>
                                        </div>
                                    </div>
                            </div>






                            <div class="inner-section row m-b-40" >
                                <div class="section-text centered-text"> Κοινωνικά Δίκτυα</div>

                                <div class="col-sm-6">
                                    <div class="input-container">
                                        <input  type="text" label="Facebook" name="facebook" class="demo-form ad-input" value="{{ auth()->user()->info->social }}">
                                        <i class="icon-inp  fa fa-facebook"></i>
                                    </div>
                                </div>
                                <div class="col-sm-6 input-container clear-fix-sm" >
                                    <input type="text" label="Instagram" name="instagram" class="demo-form ad-input" value="{{ auth()->user()->info->social  }}">
                                    <i class="icon-inp fa fa-instagram"></i>
                                </div>

                                <div class="col-sm-6 input-container">
                                    <input type="text" label="YouTube" name="youtube" class="demo-form ad-input" value="{{  auth()->user()->info->social }}">
                                    <i class="icon-inp fa fa-youtube"></i>
                                </div>
                                <div class="col-sm-6 input-container">
                                    <input type="text" label="LinkedIn" name="linkedin" class="demo-form ad-input" value="{{auth()->user()->info->social   }}">
                                    <i class="icon-inp fa fa-linkedin"></i>
                                </div>
                                <div class="col-sm-6 input-container">
                                    <input type="text" label="twitter" name="twitter" class="demo-form ad-input" value="{{auth()->user()->info->social   }}">
                                    <i class="icon-inp fa fa-linkedin"></i>
                                </div>

                                <div class="col-sm-6 input-container">
                                    <input type="text" label="Google+" name="google" class="demo-form ad-input" value="{{auth()->user()->info->social   }}">
                                    <i class="icon-inp fa fa-google"></i>
                                </div>

                            </div>

                            </div>


                        </div>


                        {{-- SAVE FORM --}}

                        <div class="col-xs-12 text-center m-t-50 m-b-40 centered-text">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-save mar-right-10"></i>Αποθήκευση Στοιχείων
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
