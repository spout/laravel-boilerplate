<?php
$locale = \LaravelLocalization::getCurrentLocale();
$checked = array_column($moduleModelInstances->toArray(), 'modulable_id');
?>

<div class="form-group">
    @foreach($object->category->amenities as $amenity)
        <?php
        $id = "amenity-{$amenity->id}";
        ?>
        <div class="custom-control custom-checkbox custom-control-inline">
            <input type="checkbox" name="modulables[]" class="custom-control-input" id="{{ $id }}" value="{{ $amenity->id }}" {{ in_array($amenity->id, $checked) ? 'checked' : '' }}>
            <label class="custom-control-label" for="{{ $id }}">{{ $amenity->{"name_{$locale}"} }}</label>
        </div>
    @endforeach
</div>