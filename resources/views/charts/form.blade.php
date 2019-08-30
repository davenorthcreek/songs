
<div class="form-group {{ $errors->has('song_id') ? 'has-error' : '' }}">
    <label for="song_id" class="col-md-2 control-label">Song</label>
    <div class="col-md-10">
        <select class="form-control" id="song_id" name="song_id" required="true">
        	    <option value="" style="display: none;" {{ old('song_id', optional($chart)->song_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select song</option>
        	@foreach ($songs as $key => $song)
			    <option value="{{ $key }}" {{ old('song_id', optional($chart)->song_id) == $key ? 'selected' : '' }}>
			    	{{ $song }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('song_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
    <label for="type" class="col-md-2 control-label">Type</label>
    <div class="col-md-10">
        <input class="form-control" name="type" type="text" id="type" value="{{ old('type', optional($chart)->type) }}" minlength="1" maxlength="191" required="true" placeholder="Enter type here...">
        {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('platform') ? 'has-error' : '' }}">
    <label for="platform" class="col-md-2 control-label">Platform</label>
    <div class="col-md-10">
        <input class="form-control" name="platform" type="text" id="platform" value="{{ old('platform', optional($chart)->platform) }}" minlength="1" maxlength="191" required="true" placeholder="Enter platform here...">
        {!! $errors->first('platform', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
    <label for="link" class="col-md-2 control-label">Link</label>
    <div class="col-md-10">
        <input class="form-control" name="link" type="text" id="link" value="{{ old('link', optional($chart)->link) }}" minlength="1" maxlength="191" required="true" placeholder="Enter link here...">
        {!! $errors->first('link', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('key') ? 'has-error' : '' }}">
    <label for="key" class="col-md-2 control-label">Key</label>
    <div class="col-md-10">
        <input class="form-control" name="key" type="text" id="key" value="{{ old('key', optional($chart)->key) }}" minlength="1" maxlength="191" required="true" placeholder="Enter key here...">
        {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
    </div>
</div>

