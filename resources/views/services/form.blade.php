
<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
    <label for="date" class="col-md-2 control-label">Date</label>
    <div class="col-md-10">
        <input class="form-control" name="date" type="text" id="date" value="{{ old('date', optional($service)->date) }}" required="true" placeholder="Enter date here...">
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('prelude') ? 'has-error' : '' }}">
    <label for="prelude" class="col-md-2 control-label">Prelude</label>
    <div class="col-md-10">
        <input class="form-control" name="prelude" type="number" id="prelude" value="{{ old('prelude', optional($service)->prelude) }}" min="-2147483648" max="2147483647" placeholder="Enter prelude here...">
        {!! $errors->first('prelude', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('offertory') ? 'has-error' : '' }}">
    <label for="offertory" class="col-md-2 control-label">Offertory</label>
    <div class="col-md-10">
        <input class="form-control" name="offertory" type="number" id="offertory" value="{{ old('offertory', optional($service)->offertory) }}" min="-2147483648" max="2147483647" placeholder="Enter offertory here...">
        {!! $errors->first('offertory', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('special') ? 'has-error' : '' }}">
    <label for="special" class="col-md-2 control-label">Special</label>
    <div class="col-md-10">
        <input class="form-control" name="special" type="number" id="special" value="{{ old('special', optional($service)->special) }}" min="-2147483648" max="2147483647" placeholder="Enter special here...">
        {!! $errors->first('special', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('leader') ? 'has-error' : '' }}">
    <label for="leader" class="col-md-2 control-label">Leader</label>
    <div class="col-md-10">
        <input class="form-control" name="leader" type="number" id="leader" value="{{ old('leader', optional($service)->leader) }}" min="-2147483648" max="2147483647" required="true" placeholder="Enter leader here...">
        {!! $errors->first('leader', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('speaker') ? 'has-error' : '' }}">
    <label for="speaker" class="col-md-2 control-label">Speaker</label>
    <div class="col-md-10">
        <input class="form-control" name="speaker" type="text" id="speaker" value="{{ old('speaker', optional($service)->speaker) }}" maxlength="191" placeholder="Enter speaker here...">
        {!! $errors->first('speaker', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('theme') ? 'has-error' : '' }}">
    <label for="theme" class="col-md-2 control-label">Theme</label>
    <div class="col-md-10">
        <input class="form-control" name="theme" type="text" id="theme" value="{{ old('theme', optional($service)->theme) }}" maxlength="191" placeholder="Enter theme here...">
        {!! $errors->first('theme', '<p class="help-block">:message</p>') !!}
    </div>
</div>

