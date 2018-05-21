<?php
use Embed\Embed;

$embed = Embed::create($moduleModelInstance->url);
?>

<div class="embed-responsive embed-responsive-{{ $moduleModelInstance->aspect_ratio }}">
    {!! $embed->code !!}
</div>