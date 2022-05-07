<div>
    <button
        type="{{$type}}"
        {{$attributes->merge(['class'=>$class])}}
        {{ !empty($isModal) ? $attributes->merge(['data-dismiss'=>$isModal]) : '' }}
        id="{{$id}}"
    >
        {{ $slot }}
    </button>
</div>
