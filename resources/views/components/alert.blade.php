<div {{ $attributes->merge(['class' => 'alert alert-'.$type]) }}>
   <h2 {{ $attributes->class(['mt-4','bg-red'=>$hasError])->merge(['type'=>'button']) }}>Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh</h2>
    <h3>{{ $isSelected() }}</h3>
    <h3>{{ $message }}</h3>
    <h3>{{ $user->hi() }}</h3>
</div>
