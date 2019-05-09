<div class="modal" id="modal-import" tabindex="1" rolde="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title"></h3>
                </div>
                
                <form method='post' action='/importcsv' enctype='multipart/form-data' >
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="modal-body">
                    <div class="row">
                        <!-- Message -->
                        @if(Session::has('message'))
                            <p >{{ Session::get('message') }}</p>
                        @endif

                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <h4>Format Csv :</h4>
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Name</td>
                                        <td>Birthday (yyyy-mm-dd)</td>
                                        <td>Gender (male or female)</td>
                                        <td>Address</td>
                                    </tr>
                                </table>
                            </div>
                            <div style="margin-bottom:20px">
                                <a href="/upload/contoh.csv" class="btn btn-default"><li class="glyphicon glyphicon-file"></li>Download Example file</a>
                            </div>
                            <div class="form-group">
                                <input type='file' name='file' class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
