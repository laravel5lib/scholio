
<!-- ======   Modal Συνδεσης =======-->
<div id="signIn-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @include('components.modals.login')
        </div>
    </div>
</div><!-- /.modal -->

<!-- ======   Modal Επιλογής  =======-->
<div id="select-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @include('components.modals.registerselect')
        </div>
    </div>
</div><!-- /.modal -->

<!-- ======   Modal Εγγραφής  =======-->
<div id="signUp-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @include('components.modals.register')
        </div>
    </div>
</div><!-- /.modal -->

{{--<!-- ======   Modal Εγγραφής  Εκπ. Ιδρύματος=======-->--}}
<div id="signUp-school-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            @include('components.modals.registerschool')
        </div>
    </div>
</div><!-- /.modal -->

<style>
    .left-section{padding-left: 10px;}
    @media(max-width: 992px){
        .left-section{padding-left: 20px;}
    }

</style>



<footer id="" class="sc-landing-footer sc-dark-blue">

    <div class="container">
        <div class="row" >
            <div class="pull-left pad-top-50 text-incr-125 left-section" >
                <a href="#" class="sc-t-white margin-right-20 ">@lang('main.footer.contact')</a>
                <span  class="pad-top-10 pad-bot-10 clear-fix">  <a href="#" class="sc-t-white margin-right-20">@lang('main.footer.blog')</a></span>
                <span class="">  <a href="#" class="sc-t-white">@lang('main.footer.terms')</a></span>
            </div>

            <div class="pull-right pad-top-45 text-incr-175  pad-right-20">
                <a href="#" class="sc-t-white "> <i class="fa fa-envelope-o" aria-hidden="true"></i>  </a>
                <span>  <a href="#" class="sc-t-white margin-left-20"><i class="fa fa-facebook" aria-hidden="true"></i></a></span>
                <span>  <a href="#" class="sc-t-white margin-left-20"><i class="fa fa-twitter" aria-hidden="true"></i></a></span>
                <div style="width: 20px; height: 10px;"></div>
                <span>  <a href="#" class="sc-t-white"><i class="fa fa-linkedin" aria-hidden="true"></i></a></span>
                <span>  <a href="#" class="sc-t-white margin-left-20"><i class="fa fa-instagram" aria-hidden="true"></i></a></span>
                <span>  <a href="#" class="sc-t-white margin-left-20 "><i class="fa fa-youtube" aria-hidden="true"></i></a></span>
            </div>
        </div>

        <div class=" centered-text margin-bot-50">
            <p class="sc-t-white margin-top-50">@lang('main.footer.message')</p>
            {{--<img height="27px" class="margin-top-20" src="/new/img/laravel-small2.png">--}}
            {{--<img height="31px" class="margin-top-20 margin-left-20 margin-right-20" src="/new/img/angularjs-logo.png">--}}
            {{--<img height="30px" class="margin-top-20" src="/new/img/algolia_small.png">--}}


        </div>
    </div>
</footer>


<script>
function changeLang(el){
        var form = document.getElementById('langForm');
        form.action = '/lang/'+el.value;
        form.submit();
    }    
</script>
