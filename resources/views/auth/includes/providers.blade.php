<?php
$titlePattern = $action === 'register' ? _i("Register with %s") : _i("Login with %s");
?>
<ul class="list-unstyled">
    @foreach(config('services.providers', []) as $provider => $title)
        <li class="mb-1">
            <a href="{{ route('socialite.login', compact('provider')) }}" class="btn btn-block btn-social btn-{{ $provider }}"><i class="fa fa-{{ $provider }}"></i> {{ sprintf($titlePattern, $title) }}</a>
        </li>
    @endforeach
</ul>