<div class="modal" id="modal-card" tabindex="1" rolde="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>
                {{ csrf_field() }} {{ method_field('POST') }}
{{ halo }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-7"> 
                            <img id="v_photo" src="" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                        </div>
                        <div class="col-md-5">
                            <span><b>Name :</b><p id="v_name"></p></span>
                            <span><b>Birthday :</b> <p id="v_birthdate"></p></span>
                            <span><b>Age :</b> <p id="v_age"></p></span>
                            <span><b>Gender :</b> <p id="v_gender"></p></span>
                            <span><b>Address :</b> <p id="v_address"></p></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
