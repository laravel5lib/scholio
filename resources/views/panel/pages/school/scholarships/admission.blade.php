@extends('panel.layouts.main')

@section('styles')
    <style>

        .hero{height: 140px; background-color: #008da5; margin: 0 0 90px 0; border-radius: 8px; position: relative; width: 100%}
        .img-avatar{width: 70px; position: absolute; bottom: -30px; border-radius: 5px;
            left: 20px;  box-shadow: 0 0 10px #fff; }

        .text-name,.text-mail{ color: #fff; font-size: 180%; font-weight: 300; position: absolute;  left: 110px; }
        .text-name{ bottom: 6px;}
        .text-mail{ bottom: -37px; color: #008da5;}

        .section-container{ margin-top: 40px; }

        .inner-section,.inner-section2{  padding: 5px 5px 25px 5px ; border: 1px solid #aaa; border-radius: 8px;
            /*background-color: #F1F4F5;*/
            background-color: #f8f8f8;

        }

        /*.section-text{color: #888; font-size: 110%; font-weight: 300; margin:-25px 0 30px 10px;*/
            /*border: 1px solid #aaa; border-radius: 6px; padding: 7px; min-width: 190px; width: 480px; background-color: #fafafa;*/
            /*box-shadow: 0 0 9px #aaa}*/


        .inner-section2{ min-width: 100%; min-height: 92%; margin: 0;}
        .section2-container{ padding: 0; min-height: 190px;}

        .section-text,.section-text2{color: #888; font-size: 110%; font-weight: 300; margin:-25px 0 30px 10px;
            border: 1px solid #aaa; border-radius: 6px; padding: 7px; min-width: 190px; max-width: 270px; background-color: #fafafa;
            box-shadow: 0 0 9px #aaa}

        .section-text2{margin-bottom: -5px;}

        .info, .info2 { color: #008DA5; font-weight: 400; margin: 8px 0}
        .info2 {  margin: 8px 15px;}
        .value{color: #667;  font-weight: 300;
        }
        .value:before{
            content:"\a";
            white-space: pre;
        }

        .flex-row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display:         flex;
            flex-wrap: wrap;
        }
        /*.row > [class*='col-'] {*/
        /*display: flex;*/
        /*flex-direction: column;*/
        /*}*/

        .btn-save{background: #008da5; color: #fff; margin-bottom: 40px; margin-top: 30px;}
        .btn-container{ margin-left: auto; margin-right: auto; text-align: center;}

        .notes{ margin-top: 2px; width: 100%; height: 90px; color: #c9c9c9; font-weight: 300; padding: 10px;
            background-color: #f6f9fa; border-radius: 8px; border: 1px solid #aaa; resize: none;}


          textarea::placeholder  {color: #aaa }



        /*  ======================================= */

        @media (min-width:992px) and (max-width: 1200px) {

        }

        @media (min-width: 768px) and (max-width: 991px) {
            .inner-section2{ }
        }

        @media  (max-width: 767px) {
            .info{margin-top: 15px;}
            .value:before{
                content:"\a";
                white-space: pre;
            }
            .flex-row { display: inline}
            .section2-container{padding: 0; }


        }
        @media  (max-width: 600px) {
            .section2-container{ padding: 0;}
        }

        @media  (max-width:480px) {
            .main{padding-left: 15px; padding-right: 15px; }
            .inner-section2{  }

        }

        @media  (max-width: 390px) {

        }


    </style>

    <link href="{{asset('new/css/Bootstrap-xxs-xxxs.css')}}" rel="stylesheet">
@endsection

@section('scriptsBefore')
@endsection

@section('content')

<div class="hero">
    <div>
        <img src="{{ $admission->user->info->avatar }}" class="img-avatar">
    </div>
    <div class="text-name">{{$admission->user->name}}</div>
    <div class="text-mail">{{$admission->user->email}}</div>
</div>

<div style="clear: both"></div>

@foreach($categories as $category)
    @if($category->id < 8)
        <div class="section-container" style="padding: 10px" >
            <div class="row inner-section">
                <div class="section-text text-center"> {{ trans('settings.admissions.' . $category->name) }} </div>
                @foreach($admission->fields as $field)
                    @if ($field->category_id==$category->id)
                            <div class="col-xxxs-12 col-xs-6 col-sm-6 info">
                                <i class="icon-inp {{ $field->icon}}"></i>
                                {{ trans('settings.admissions.' . $field->slug)  }}
                                <span class="value"> {{ $field->pivot->data }}</span>
                            </div>
                    @endif
                @endforeach

            </div>
        </div>
    @endif
@endforeach

    <!-- ============= -->

    <div class="row flex-row" style="margin-top: 40px;">
            @foreach($admission->fields as $field)
                @if ($field->category_id==8)
                <div class="section2-container col-sm-6" style="padding: 20px 10px;">
                    <div class="inner-section2 ">
                        <div class="section-text2 "> <i class="icon-title  {{ $field->icon}}" style="margin-right: 10px;"></i>{{ trans('settings.admissions.' .$field->slug) }}</div>
                        <div class="info2">
                            <span class="value"> {{ $field->pivot->data }}</span>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
    </div>

    @if($admission->scholarship->criteria_id == 1)

    <div class="row flex-row" style="margin-top: 40px;">

            <div class="section2-container col-sm-12" style="padding: 20px 10px;">
                <div class="inner-section2 ">
                    <div class="section-text2 "> <i class="fa fa-facebook icon-title" style="margin-right: 10px;"></i> {{ trans('admission.school.socialLinks') }}</div>
                    <div class="info2">
                        @foreach($admission->user->socialLinks as $link)
                            <div>
                                <a href="{{ $link->link }}"><i class="fa fa-{{$link->name}} social-icons"></i> </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
    </div>

    @endif


    <form action="/admission/{{ $admission->id }}/notes/save" method="POST" class="col-sm-12 row" style="z-index: 09!important;">
        {{ csrf_field() }}
        <div class="section-text2 " style="margin: 20px 0 0 0; "> <i class="icon-title  fa fa-pencil" style="margin-right: 10px;"></i>{{ trans('admission.school.notes') }}</div>

        <textarea name="notes" class="notes" placeholder="{{ trans('admission.school.notesText') }}">{{ $admission->notes }}</textarea>


        @if($admission->scholarship->criteria->id == 1)
            <div class="section-text2 " style="margin: 20px 0 0 0; "> <i class="icon-title  fa fa-star" style=""></i><i class="icon-title  fa fa-star-half-o" style="margin-right: 10px;"></i>{{ trans('admission.school.evaluation') }} </div>
            <textarea name="review" class="notes" placeholder="{{ trans('admission.school.evaluationText') }}">{{ $admission->review }}</textarea>
        @endif

        <div class="btn-container">
            <button type="submit" class="btn btn-save" > <i class="fa fa-save" style="margin-right: 10px"></i>{{ trans('admission.school.save') }}</button>
        </div>
    </form>





@endsection
