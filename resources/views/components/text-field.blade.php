<div>
    @if($label)
        <label for="{{$id?$id:"id"}}">{{$label}}</label>
    @endif
    <input class="fieldClass {{$class}}" type="{{$type}}" placeholder="{{$placeholder}}" value="{{$inputValue}}" id="{{$id?$id:"id"}}" name="{{$nameAttr?$nameAttr:'name1'}}">
    @if($hint)
        <p>{{$hint}}</p>
    @endif
    @if($error)
        <div class="errorMessage">
            {{$error}}
        </div>
    @endif
</div>
