<?php
$locale = \LaravelLocalization::getCurrentLocale();
$checked = array_column($moduleModelInstances->toArray(), 'service_id');
?>

<div class="form-group">
    @foreach($object->category->services as $service)
        <?php
        $id = "service-{$service->id}";
        ?>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" name="services[]" class="custom-control-input" id="{{ $id }}" value="{{ $service->id }}" {{ in_array($service->id, $checked) ? 'checked' : '' }}>
            <label class="custom-control-label" for="{{ $id }}">{{ $service->{"name_{$locale}"} }}</label>
        </div>
    @endforeach
</div>