<?php
if (!function_exists('templates_tags_replace')) {
    /**
     * @param \App\Models\Booking|\App\Models\Property $modelInstance
     * @param $subject
     * @param $html
     *
     * @return mixed
     * @throws Exception
     */
    function templates_tags_replace($modelInstance, $subject, $html = false)
    {
        $search  = [];
        $replace = [];
        foreach (config('templates-tags') as $tag => $label) {
            list($entity, $attribute) = explode('.', $tag);
            $search[] = "[$tag]";

            if ($attribute === 'custom_fields') {
                $attribute = $html === true ? 'custom_fields_html' : 'custom_fields_text';
            }

            if ($modelInstance instanceof \App\Models\Booking) {
                switch ($entity) {
                    case 'booking':
                        if (in_array($attribute, ['arrival_date', 'departure_date'])) {
                            $replace[] = $modelInstance->{$attribute}->format('d/m/Y');
                        } else {
                            $replace[] = $modelInstance->{$attribute};
                        }
                        break;

                    case 'property':
                        $replace[] = $modelInstance->property[$attribute];
                        break;
                }
            } elseif ($modelInstance instanceof \App\Models\Property) {
                $replace[] = $modelInstance->{$attribute};
            } else {
                throw new Exception("Model instance must be Booking or Property");
            }
        }

        return str_replace($search, $replace, $subject);
    }
}

if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        $keys = explode('.', $key);
        $key = array_shift($keys);
        $valueKey = implode('.', $keys);

        $cacheKey = "setting-$key";
        $cacheMinutes = 0;
        $setting = Cache::remember($cacheKey, $cacheMinutes, function () use ($key) {
            return \App\Models\Setting::find($key);
        });

        if (empty($valueKey)) {
            return $setting->value_as_array;
        }
        return array_get($setting->value_as_array, $valueKey, $default);
    }
}