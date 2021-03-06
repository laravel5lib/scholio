
{{--Styling on panel/pages/school/dashboard/main.blade.php--}}

<div class="row" >
     @if(auth()->user()->subscription->plan->id != 1)
        <div class="col-lg-3 col-md-4 col-sm-6" >
            <a href="{{ url('/panel/school/students') }}" id="btn-students">
                <div class="panel-box box1" >
                    <img src="/panel/assets/images/dashBoard/students3.png"        alt="student image"  class="panel-image hidden"  id="img-student-color">
                    <img src="/panel/assets/images/dashBoard/students3Outline.png" alt="student image"  class="panel-image visible" id="img-student-black">


                    <span class="sc-t-gray" id="students-text">
                        <span class="panel-counter">{{ count($data['students']) }}</span>
                        <span class="panel-text">@lang('panel/schools/dashboard.students')</span>
                    </span>
                </div>
            </a>
        </div>

        <div class="col-lg-4 col-md-8 col-sm-6">
            <a href="{{ url('/panel/school/teachers') }}" id="btn-teachers">
                <div class="panel-box box2">
                    <img src="/panel/assets/images/dashBoard/teachers2.png"        alt="teacher image" class="panel-image hidden"   id="img-teacher-color">
                    <img src="/panel/assets/images/dashBoard/teachers2Outline.png" alt="teacher image" class="panel-image visible"  id="img-teacher-black">

                    <span class="sc-t-gray" id="teachers-text">
                        <span class="panel-counter">{{ count($data['teachers']) }}</span>
                        <span class="panel-text">@lang('panel/schools/dashboard.teachers')</span>
                    </span>
                </div>
            </a>
        </div>
    @endif
    <!-- ==================== -->
    {{--<div class="clearfix"></div>--}}


    <div class="col-lg-5 col-md-8 col-sm-6">
        <a href="{{ url('/panel/school/studies') }}" id="btn-studies">
            <div class="panel-box box2">
                <img src="/panel/assets/images/dashBoard/studies2.png"        alt="studies image" class="panel-image hidden"   id="img-studies-color">
                <img src="/panel/assets/images/dashBoard/studies2Outline.png" alt="studies image" class="panel-image visible"  id="img-studies-black">
                 <span class="sc-t-gray" id="studies-text">
                    <span class="panel-counter">{{ count($data['studies']) }}</span>
                    <span class="panel-text">@lang('panel/schools/dashboard.studies')</span>
                 </span>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="{{ url('/panel/school/profile/images') }}"  id="btn-photos">
            <div class="panel-box box2">
                <img src="/panel/assets/images/dashBoard/photos3.png"        alt="photos image" class="panel-image hidden"   id="img-photos-color">
                <img src="/panel/assets/images/dashBoard/photos3Outline.png" alt="photos image" class="panel-image visible"  id="img-photos-black">
                <span class="sc-t-gray" id="photos-text">
                    <span class="panel-counter">{{ count($data['images']) }}</span>
                    <span class="panel-text">@lang('panel/schools/dashboard.photos')</span>
                </span>
            </div>
        </a>
    </div>
    <!-- ==================== -->
    {{--<div class="clearfix"></div>--}}

    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="{{ url('/panel/school/scholarships/view') }}" id="btn-trophy">
            <div class="panel-box box2">
                <img src="/panel/assets/images/dashBoard/trophy.png"        alt="trophy image" class="panel-image hidden"   id="img-trophy-color">
                <img src="/panel/assets/images/dashBoard/trophyOutline.png" alt="trophy image" class="panel-image visible"  id="img-trophy-black">

                <span class="sc-t-gray" id="trophy-text">
                    <span class="panel-counter">{{ count($data['scholarships']) }}</span>
                    <span class="panel-text">@lang('panel/schools/dashboard.scholarships')</span>
                </span>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="{{ url('/panel/school/scholarships/request') }}" id="btn-admissions">
            <div class="panel-box box2">
                <img src="/panel/assets/images/dashBoard/admissions.png"        alt="admissions image" class="panel-image hidden"   id="img-admissions-color">
                <img src="/panel/assets/images/dashBoard/admissionsOutline.png" alt="admissions image" class="panel-image visible"  id="img-admissions-black">
                 <span class="sc-t-gray" id="admissions-text">
                    <span class="panel-counter">{{ count($data['admissions']) }}</span>
                    <span class="panel-text">@lang('panel/schools/dashboard.admissions')</span>
                 </span>
            </div>
        </a>
    </div>

    <!-- ==================== -->
    {{--<div class="clearfix"></div>--}}
     @if(auth()->user()->subscription->plan->id != 1)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <a href="{{ url('panel/school/reviews/view') }}" id="btn-reviews">
                <div class="panel-box box2">
                    <img src="/panel/assets/images/dashBoard/reviews.png"        alt="reviews image" class="panel-image hidden"   id="img-reviews-color">
                    <img src="/panel/assets/images/dashBoard/reviewsOutline.png" alt="reviews image" class="panel-image visible"  id="img-reviews-black">
                    <span class="sc-t-gray" id="reviews-text">
                        <span class="panel-counter">{{ $data['reviews'] }}</span>
                        <span class="panel-text">@lang('panel/schools/dashboard.reviews')</span>
                    </span>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 ">
                <div class="panel-box box2">
                    <img src="/panel/assets/images/dashBoard/views.png"        alt="views image" class="panel-image hidden"   id="img-views-color">
                    <img src="/panel/assets/images/dashBoard/viewsOutline.png" alt="views image" class="panel-image visible"  id="img-views-black">
                    <span class="sc-t-gray" id="views-text">
                        <span class="panel-counter">{{ $data['pageviews'] }}</span>
                        <span class="panel-text">@lang('panel/schools/dashboard.pageviews')</span>
                    </span>
                </div>
        </div>
    @endif


    <div class="col-lg-3 col-md-4 col-sm-6 hidden">
        <a href="{{ url('/panel/dasboard') }}" id="btnsvg">
            <div class="panel-box box2">

                <img src="/panel/assets/images/dashBoard/emptyc.png" alt="views image" class="empty hidden"  id="img-svg-color">
                <img src="/panel/assets/images/dashBoard/empty.png"  alt="views image" class="empty visible" id="img-svg-black">

                <div id="canvas" style="position: absolute; left: 35px"></div>

                 <span class="sc-t-gray" id="views-text">
                      {{--<span class='numscroller'  style="color: #aaa" data-min='1' data-max='25' data-delay='0.9' data-increment='1'></span>--}}
                    <span class="panel-counter"></span>
                    <span class="panel-text"></span>
                 </span>
            </div>
        </a>
    </div>


</div>

@section('scripts')
    <script src="/panel/assets/js/jquery.numscroller.js"></script>
    <script src="/panel/assets/js/raphael.min.js"></script>


    <script>
        $(function() {

            animateLine = function(canvas, hoverDivName, colorNumber, pathString) {
                $('#' + hoverDivName).hover(

                        function() {
                            var line = canvas.path(pathString).attr({
                                stroke: colorNumber
                            });
                            var length = line.getTotalLength();

                            $('path[fill*="none"]').animate({
                                'to': 1
                            }, {
                                duration: 600,
                                step: function(pos, fx) {
                                    var offset = length * fx.pos;
                                    var subpath = line.getSubpath(0, offset);
                                    canvas.clear();
                                    canvas.path(subpath).attr({
                                        'stroke-width': 2,
                                        stroke: colorNumber,
//                                        'fill':'#555'
                                    });

                                },
                            });
                        }, function() {
                            $('path[fill*="none"]').stop(true, false).fadeOut();
                        });
            };

            var canvas = Raphael('canvas',70, 70);

            var pathString =" M47.337,57.993 M50.93,2.993H13.663" +
                    "c-0.749,0-1.358,0.552-1.358,1.231s0.608,1.231,1.358,1.231H50.93c0.75,0,1.358-0.552,1.358-1.231S51.679,2.993,50.93,2.993" +
                    "L50.93,2.993z M50.93,2.993 M50.93,9.56H13.663c-0.749,0-1.358,0.552-1.358,1.231c0,0.68,0.608,1.231,1.358,1.231H50.93" +
                    "c0.75,0,1.358-0.552,1.358-1.231C52.287,10.112,51.679,9.56,50.93,9.56L50.93,9.56z M50.93,9.56 M50.93,16.127H13.663" +
                    "c-0.749,0-1.358,0.552-1.358,1.231c0,0.68,0.608,1.231,1.358,1.231H50.93c0.75,0,1.358-0.552,1.358-1.231" +
                    "C52.287,16.679,51.679,16.127,50.93,16.127L50.93,16.127z M50.93,16.127 M52.287,23.926c0-0.68-0.608-1.231-1.358-1.231H13.663" +
                    "c-0.749,0-1.358,0.552-1.358,1.231s0.608,1.231,1.358,1.231H50.93C51.679,25.157,52.287,24.606,52.287,23.926L52.287,23.926z" +
                    "M52.287,23.926 M45.841,30.493c0-0.68-0.608-1.231-1.358-1.231H13.663c-0.749,0-1.358,0.552-1.358,1.231s0.608,1.231,1.358,1.231" +
                    "h30.821C45.233,31.724,45.841,31.173,45.841,30.493L45.841,30.493z M45.841,30.493 M13.663,35.829c-0.749,0-1.358,0.552-1.358,1.231" +
                    "s0.608,1.231,1.358,1.231h18.633c0.75,0,1.358-0.552,1.358-1.231s-0.607-1.231-1.358-1.231H13.663z M13.537,35.829" +
                    "M50.93,57.993c0.75,0,1.358-0.552,1.358-1.231c0-0.68-0.608-1.231-1.358-1.231H39.272c-0.75,0-1.358,0.552-1.358,1.231c0,0.68,0.608,1.231,1.358,1.231H50.93z"

            animateLine(canvas, "btnsvg", "#555", pathString);

        });
    </script>






@endsection
