<?php
$controllerClass = get_class(request()->route()->getController());

if (empty($url)) {
    $resourcePrefix = $controllerClass::$resourcePrefix;
    $url = route("{$resourcePrefix}.create");
}

if (empty($label)) {
    $model = $controllerClass::$model;
    $label = _i("Create %s", $model::verboseName());
}
?>
<p>
    <a href="{{ $url }}" class="btn btn-primary">{{ $label }}</a>
</p>