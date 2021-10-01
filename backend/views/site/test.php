<div class="container">
    <h1>Cropper in a Bootstrap modal</h1>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-target="#modal" data-toggle="modal">
        Launch the demo
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Cropper</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <img id="image" style="width: 800px;" src="/uploads/holder.png" alt="Picture">
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>



