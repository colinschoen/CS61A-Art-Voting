@include('admin.core.header')

    <div class="page-header" style="margin-top: 100px;">
        <div class="row">
            <div class="col-lg-8 col-md-7 col-sm-6">
                <p class="lead">Edit Entry #{{{ $entry->id }}}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="well">
                <form action="{{ route("adminentryeditsave", $entry->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <fieldset>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label for="inputName" class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name" value="{{{ $entry->name }}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" value="{{{ $entry->email}}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTitle" class="col-lg-2 control-label">Title</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputTitle" name="inputTitle" placeholder="Title" value="{{{ $entry->title }}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputBody" class="col-lg-2 control-label">Body</label>
                            <div class="col-lg-10">
                                <textarea rows="4" class="form-control" name="inputBody" placeholder="Body" id="inputBody">{{{ $entry->body }}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputCode" class="col-lg-2 control-label">Code</label>
                            <div class="col-lg-10">
                                <textarea rows="8" class="form-control" name="inputCode" placeholder="Code" id="inputCode">{{{ $entry->code }}}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputTokens" class="col-lg-2 control-label">Tokens</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="inputTokens" name="inputTokens" placeholder="Tokens" value="{{{ $entry->tokens }}}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Category</label>
                            <div class="col-lg-10">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="inputCategory" id="radioFeather" value="0" @if ($entry->category == 0) checked="checked" @endif/>
                                        Feather Weight
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="inputCategory" id="radioHeavy" value="1" @if ($entry->category == 1) checked="checked" @endif />
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
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@include('admin.core.footer')
