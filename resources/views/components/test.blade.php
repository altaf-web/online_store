<div>
    @props(['type' => 'info', 'message'])
    <span class="test-title">{{ $title }}</span>
    <h2>Nothing worth having comes easy. - Theodore Roosevelt</h2>
    <h4>{{ $message }}</h4>
    <h3 {{ $attributes->merge(['type' => 'button','data-controller' => $attributes->prepends('profile-controller')]) }}>{{ $slot }}</h3>
</div>
