@include('admin.core.header')

    <div class="page-header" style="margin-top: 100px;">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <p class="lead">Contest Entries</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="well">
                    <form class="form-horizontal">
                        <fieldset>
                            <legend>Add Entry <span style="float: right;"><a id="btnToggleAddEntry" href="#"><i class="fa fa-plus fa-fw"></i></a></span></legend>
                            <div id="addEntryDivBody" style="display: none;">
                                <div class="form-group">
                                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="inputEmail" placeholder="Email" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Category</label>
                                    <div class="col-lg-10">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
                                                Feather Weight
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                Heavy Weight
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Image Upload</label>
                                    <div class="col-lg-10">
                                        <input type="file" id="inputImage" placeholder="Image" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
       </form>

@section('adminJS')
    $('#btnToggleAddEntry').on('click', function() {
        $('#addEntryDivBody').slideToggle();
    });
@endsection
@include('admin.core.footer')
