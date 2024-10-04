<div>
    @if($label)
        <label for="{{$id?$id:"id"}}">{{$label}}</label>
    @endif
    <select class="ddlInput {{$class}}" id="{{$id?$id:"id"}}" class="form-select" aria-label="Default select example" name="{{$attrName}}">
        <option value="-1" hidden>{{$hidden}}</option>
        @if($noneSelected)
            <option value="0">{{$noneSelected}}</option>
        @endif
        @foreach($options as $op)
            <option value="{{ $op->$attrValue }}" @selected($selected == $op->$attrValue)> {{ $op->$attrText }} </option>
        @endforeach
    </select>
    @if($error)
        <div class="errorMessage">
            {{$error}}
        </div>
    @endif
</div>
