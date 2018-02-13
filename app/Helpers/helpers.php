<?php
if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        $keys = explode('.', $key);
        $key = array_shift($keys);
        $valueKey = implode('.', $keys);

        $cacheKey = "setting-$key-$valueKey";
        $cacheMinutes = 60;
        $setting = Cache::remember($cacheKey, $cacheMinutes, function () use ($key) {
            return \App\Models\Setting::find($key);
        });

        if (empty($valueKey)) {
            return $setting->value_to_array ?? $default;
        }
        return array_get($setting->value_to_array, $valueKey, $default);
    }
}

if (!function_exists('human_filesize')) {
    function human_filesize($size, $precision = 2)
    {
        $units = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $step = 1024;
        $i = 0;
        while (($size / $step) > 0.9) {
            $size = $size / $step;
            $i++;
        }
        return round($size, $precision) . ' ' . $units[$i];
    }
}

if (!function_exists('route_resource_names')) {
    /**
     * @param $pattern
     * @return array
     * @throws Exception
     */
    function route_resource_names($pattern)
    {
        if (strpos($pattern, '{name}') === false) {
            throw new \Exception("Missing {name} in pattern.");
        }
        $resources = ['store', 'index', 'create', 'destroy', 'update', 'show', 'edit'];
        $names = [];
        foreach ($resources as $resource) {
            $names[$resource] = str_replace('{name}', $resource, $pattern);
        }
        return $names;
    }
}
