<?php
if (!function_exists('templates_tags_replace')) {
    /**
     * @param \App\Models\Booking|\App\Models\Property $modelInstance
     * @param $subject
     *
     * @return mixed
     * @throws Exception
     */
    function templates_tags_replace($modelInstance, $subject)
    {
        $search  = [];
        $replace = [];
        foreach (config('templates-tags') as $tag => $label) {
            list($entity, $attribute) = explode('.', $tag);
            $search[] = "[$tag]";

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