{{--Styling on panel/layouts//main.blade.php--}}

    @if(auth()->user()->subscription->plan->id != 1)
        <a href="/panel/school/students"  class="top-img tool {{ request()->path() == 'panel/school/students' ? 'img-active' : ''}}" id="studentsBtn">
            {{--<img src="/new/img/student2.png" alt="student image" class="top-image">--}}
            <img src="/panel/assets/images/dashBoard/students3.png" alt="students image" class="top-image">


            <span class="tooltiptext4">@lang('panel/schools/topbar.students')</span>
        </a>

        <a href="/panel/school/teachers"  class="top-img tool {{ request()->path() == 'panel/school/teachers' ? 'img-active' : ''}}" id="teachersBtn">
        {{--<img src="/new/img/teacher.png" alt="teacher image" class="top-image">--}}
            <img src="/panel/assets/images/dashBoard/teachers2.png" alt="teachers image" class="top-image">
            <span class="tooltiptext4">@lang('panel/schools/topbar.teachers')</span>
        </a>
    @endif

     <a href="/panel/school/studies"  class="top-img tool {{ request()->path() == 'panel/school/studies' ? 'img-active' : ''}}" id="studiesBtn">
         {{--<img src="/panel/assets/images/steps/step3-skills2.png" alt="skills image" class="top-image">--}}
         <img src="/panel/assets/images/dashBoard/studies2.png" alt="studies image" class="top-image">
         <span class="tooltiptext4">@lang('panel/schools/topbar.studies')</span>
     </a>

     <a href="/panel/school/profile/images"  class="top-img tool {{ request()->path() == 'panel/school/profile/images' ? 'img-active' : ''}}" id="photosBtn">
         {{--<img src="/panel/assets/images/steps/photo.png" alt="photos image" class="top-image">--}}
         <img src="/panel/assets/images/dashBoard/photos3.png" alt="photos image" class="top-image">
         <span class="tooltiptext4">@lang('panel/schools/topbar.photos')</span>
     </a>

     <a href="/panel/school/scholarships/view"  class="top-img tool {{ request()->path() == 'panel/school/scholarships/view' ? 'img-active' : ''}}" id="scholarshipsBtn">
         {{--<img src="/new/img/trophyB.png" alt="trophy image" class="top-image">--}}
         <img src="/panel/assets/images/dashBoard/trophy.png" alt="trophy image" class="top-image">
         <span class="tooltiptext4">@lang('panel/schools/topbar.scholarships')</span>
     </a>

     <a href="/panel/school/scholarships/request"  class="top-img tool {{ request()->path() == 'panel/school/scholarships/request' ? 'img-active' : ''}}" id="admissionsBtn">
         {{--<img src="/panel/assets/images/steps/terms.png" alt="view image" class="top-image">--}}
         <img src="/panel/assets/images/dashBoard/admissions.png" alt="admissions image" class="top-image">
         <span class="tooltiptext4">@lang('panel/schools/topbar.admissions')</span>
     </a>

     @if(auth()->user()->subscription->plan->id != 1)
        <a href="/panel/school/reviews/view"  class="top-img tool  {{ request()->path() == 'panel/school/reviews/view' ? 'img-active' : ''}}" id="reviewsBtn">
            {{--<img src="/panel/assets/images/steps/stars.png" alt="photos image" class="top-image">--}}
            <img src="/panel/assets/images/dashBoard/reviews.png" alt="reviews image" class="top-image">

            <span class="tooltiptext4">@lang('panel/schools/topbar.reviews')</span>
        </a>
    @endif
