@include('admin.core.header')

    <div class="page-header" style="margin-top: 100px;">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <p class="lead">Contest Entries</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="well">
                <form action="{{ route("adminresultnew") }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <fieldset>
                        <legend>Add Entry <span style="float: right;"><a id="btnToggleAddEntry" href="#"><i class="fa fa-plus fa-fw"></i></a></span></legend>
                        <div id="addEntryDivBody" style="display: none;">
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputTitle" class="col-lg-2 control-label">Title</label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Title" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputBody" class="col-lg-2 control-label">Body</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" name="inputBody" placeholder="Body" id="inputBody"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Category</label>
                                <div class="col-lg-10">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="inputCategory" id="radioFeather" value="0" checked="checked"/>
                                            Feather Weight
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="inputCategory" id="radioHeavy" value="1" />
                                            Heavy Weight
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Image Upload</label>
                                <div class="col-lg-10">
                                    <input type="file" id="inputImage" name="inputImage" placeholder="Image" />
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
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($entries as $entry)
                <tr><td>{{{ $entry->id }}}</td>
                    <td>{{{ $entry->email }}}</td>
                    <td>{{{ $entry->title }}}</td>
                    <td>{{{ $entry->body }}}</td>
                    <td>@if ($entry->category == 0) Feather Weight @else Heavy Weight @endif</td>
                    <td><a href="/artwork/{{{ $entry->image }}}" target="_blank">{{{ route("index") }}}/artwork/{{{ $entry->image }}}</a></td>
                    <td>{{{ $entry->created_at }}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@section('adminJS')
    $('#btnToggleAddEntry').on('click', function() {
        $('#addEntryDivBody').slideToggle();
    });
@endsection
@include('admin.core.footer')
