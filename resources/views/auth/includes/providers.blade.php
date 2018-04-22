<?php
$providers = [
    'facebook' => "Facebook",
    'linkedin' => "LinkedIn",
];
?>
<ul class="list-unstyled mt-3">
    @foreach($providers as $provider => $title)
        <li class="mb-1">
            <a href="{{ route('socialite.login', compact('provider')) }}" class="btn btn-block btn-social btn-{{ $provider }}"><i class="fa fa-{{ $provider }}"></i> {{ _i("%s with %s", [$verb, $title]) }}</a>
        </li>
    @endforeach
</ul>