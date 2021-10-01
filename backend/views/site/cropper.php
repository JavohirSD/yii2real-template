<div class="container">

    <div class="modal" id="modal-xl" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ko`rinish maydonini tahrirlash</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" >

                <!-- Content -->

                    <div class="row">
                        <div class="col-md-9">
                            <!-- <h3>Demo:</h3> -->
                            <div class="docs-demo">
                                <div class="img-container">
                                    <img name="image" id="image" src="/uploads/holder.png" alt="Picture">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!-- <h3>Preview:</h3> -->
                            <div class="docs-preview clearfix">
                                <div class="img-preview preview-lg"></div>
                                <div class="img-preview preview-md"></div>
                                <div class="img-preview preview-sm"></div>
                                <div class="img-preview preview-xs"></div>
                            </div>

                            <!-- <h3>Data:</h3> -->
                            <div class="docs-data">
                                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataX">X</label>
            </span>
                                    <input type="text" class="form-control" id="dataX" placeholder="x">
                                    <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
                                </div>
                                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataY">Y</label>
            </span>
                                    <input type="text" class="form-control" id="dataY" placeholder="y">
                                    <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
                                </div>
                                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataWidth">Width</label>
            </span>
                                    <input type="text" class="form-control" id="dataWidth" placeholder="width">
                                    <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
                                </div>
                                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataHeight">Height</label>
            </span>
                                    <input type="text" class="form-control" id="dataHeight" placeholder="height">
                                    <span class="input-group-append">
              <span class="input-group-text">px</span>
            </span>
                                </div>
                                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataRotate">Rotate</label>
            </span>
                                    <input type="text" class="form-control" id="dataRotate" placeholder="rotate">
                                    <span class="input-group-append">
              <span class="input-group-text">deg</span>
            </span>
                                </div>
                                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataScaleX">ScaleX</label>
            </span>
                                    <input type="text" class="form-control" id="dataScaleX" placeholder="scaleX">
                                </div>
                                <div class="input-group input-group-sm">
            <span class="input-group-prepend">
              <label class="input-group-text" for="dataScaleY">ScaleY</label>
            </span>
                                    <input type="text" class="form-control" id="dataScaleY" placeholder="scaleY">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="actions">
                        <div class="col-md-9 docs-buttons">
                            <!-- <h3>Toolbar:</h3> -->
                            <div class="btn-group">


                                <div class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;move&quot;)">
              <span class="fa fa-arrows-alt"></span>
            </span>
                                </div>
                                <div class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;crop&quot;)">
              <span class="fa fa-crop-alt"></span>
            </span>
                                </div>
                            </div>

                            <div class="btn-group">
                                <div class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(0.1)">
              <span class="fa fa-search-plus"></span>
            </span>
                                </div>
                                <div class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(-0.1)">
              <span class="fa fa-search-minus"></span>
            </span>
                                </div>
                            </div>

                            <div class="btn-group">
                                <div class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(-10, 0)">
              <span class="fa fa-arrow-left"></span>
            </span>
                                </div>
                                <div class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(10, 0)">
              <span class="fa fa-arrow-right"></span>
            </span>
                                </div>
                                <div class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, -10)">
              <span class="fa fa-arrow-up"></span>
            </span>
                                </div>
                                <div class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, 10)">
              <span class="fa fa-arrow-down"></span>
            </span>
                                </div>
                            </div>

                            <div class="btn-group">
                                <div class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">
              <span class="fa fa-undo-alt"></span>
            </span>
                                </div>
                                <div class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">
              <span class="fa fa-redo-alt"></span>
            </span>
                                </div>
                            </div>

                            <div class="btn-group">
                                <div class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleX(-1)">
              <span class="fa fa-arrows-alt-h"></span>
            </span>
                                </div>
                                <div class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleY(-1)">
              <span class="fa fa-arrows-alt-v"></span>
            </span>
                                </div>
                            </div>

                            <div class="btn-group">
                                <div class="btn btn-primary" data-method="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.crop()">
              <span class="fa fa-check"></span>
            </span>
                                </div>
                                <div class="btn btn-primary" data-method="clear" title="Clear">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.clear()">
              <span class="fa fa-times"></span>
            </span>
                                </div>
                            </div>



                            <div class="btn-group">
                                <div class="btn btn-primary" data-method="reset" title="Reset">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.reset()">
              <span class="fa fa-sync-alt"></span>
            </span>
                                </div>
                                <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
                                    <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
              <span class="fa fa-upload"></span>
            </span>
                                </label>
                                <div class="btn btn-primary" data-method="destroy" title="Destroy">
            <span class="docs-tooltip" data-toggle="tooltip" title="cropper.destroy()">
              <span class="fa fa-power-off"></span>
            </span>
                                </div>
                            </div>


                            <div class="btn btn-secondary" data-method="moveTo" data-option="0">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.moveTo(0)">
            Kordinata [0,0]
          </span>
                            </div>
                            <div class="btn btn-secondary" data-method="zoomTo" data-option="1">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoomTo(1)">
            Zoom 100%
          </span>
                            </div>
                            <div class="btn btn-secondary" data-method="rotateTo" data-option="180">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotateTo(180)">
            Aylantirish 180°
          </span>
                            </div>
                            <div class="btn btn-secondary" data-method="scale" data-option="-2" data-second-option="1">
          <span class="docs-tooltip" data-toggle="tooltip" title="cropper.scale(-1, 1)">
            Kengaytirish (-2, -1)
          </span>
                            </div>

                            <div class="btn-group btn-group-crop" style="display: none">
<!--                                <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">-->
<!--                                    <div class="fa fa-download"></div> Yuklab olish-->
<!--                                </a>-->
                                <div class="btn btn-success" data-method="getCroppedCanvas" id="get_data" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }">
          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.getCroppedCanvas({ maxWidth: 4096, maxHeight: 4096 })">
             <div class="fa fa-save"></div> Saqlash
            </span>
                                </div>
                            </div>

                        </div><!-- /.docs-buttons -->
                        <div class="col-md-3 docs-toggles">
                            <!-- <h3>Toggles:</h3> -->
                            <div class="btn-group d-flex flex-nowrap" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.7777777777777777">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 16 / 9">
              16:9
            </span>
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1.3333333333333333">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 4 / 3">
              4:3
            </span>
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="1">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 1 / 1">
              1:1
            </span>
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="0.6666666666666666">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: 2 / 3">
              2:3
            </span>
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" class="sr-only" id="aspectRatio5" name="aspectRatio" value="NaN">
                                    <span class="docs-tooltip" data-toggle="tooltip" title="aspectRatio: NaN">
              Free
            </span>
                                </label>
                            </div>


                            <div class="btn-group btn-group-crop">
                                <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">
                                    <div class="fa fa-download"></div> Yuklab olish
                                </a>

                                <div class="btn btn-success"  id="get_data2">
                                  <span class="docs-tooltip"  data-toggle="tooltip">
                                     <div class="fa fa-save">
                                     </div> Saqlash
                                    </span>
                                </div>
                            </div>




                        </div><!-- /.docs-toggles -->
                    </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>
