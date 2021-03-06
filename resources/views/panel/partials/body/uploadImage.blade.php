<link rel="stylesheet" href="/css/croppie.css">



<div class="btn btn-primary btn-choose bb" data-target="#upload-modal" data-toggle="modal">
    <i class="fa fa-upload" style="margin-right: 6px;"></i>
    {{ $text }}
</div>

<!-- ====== Upload Modal  ======= -->
<div id="upload-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="top: 100px;">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="panel " style="background-color: #324c5a; height:90px; border-bottom-right-radius: 0; border-bottom-left-radius: 0; padding: 10px">
                <div class="panel-heading" style=" color: #fff">
                    <button type="button" class="btn pull-right btn-close" data-dismiss="modal">
                        x
                    </button>
                    <img src="/new/img/logoNX-light.png" alt="scholio logo" class="pull-left modal-sc-logo">
                    <!-- <h3 class="pull-left panel-title">schol.io</h3> -->
                </div>

            </div>
            <div class="panel-body">


                <div class="section2-container ">
                    <div class="inner-section2">
                        @if($type == "avatar" || $type == "logo")
                            <image-crop img-width="150" img-height="150" out-sizewidth="300" out-sizeheight="300" img-data="{{ $type }}"></image-crop>
                        @else
                            <image-crop img-width="800" img-height="600" out-sizewidth="600" out-sizeheight="400" img-data="{{ $type }}"></image-crop>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

