
<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
    <label for="title" class="col-md-2 control-label">Title</label>
    <div class="col-md-10">
        <input class="form-control" name="title" type="text" id="title" value="{{ old('title', optional($songs)->title) }}" minlength="1" maxlength="191" required="true" placeholder="Enter title here...">
        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('songwriter') ? 'has-error' : '' }}">
    <label for="songwriter" class="col-md-2 control-label">Songwriter</label>
    <div class="col-md-10">
        <input class="form-control" name="songwriter" type="text" id="songwriter" value="{{ old('songwriter', optional($songs)->songwriter) }}" maxlength="191" placeholder="Enter songwriter here...">
        {!! $errors->first('songwriter', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hymnal_page') ? 'has-error' : '' }}">
    <label for="hymnal_page" class="col-md-2 control-label">Hymnal Page</label>
    <div class="col-md-10">
        <input class="form-control" name="hymnal_page" type="number" id="hymnal_page" value="{{ old('hymnal_page', optional($songs)->hymnal_page) }}" min="-2147483648" max="2147483647" placeholder="Enter hymnal page here...">
        {!! $errors->first('hymnal_page', '<p class="help-block">:message</p>') !!}
    </div>
</div>

