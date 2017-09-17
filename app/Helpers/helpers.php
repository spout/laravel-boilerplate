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
            $replaceTmp = null;

            if ($modelInstance instanceof \App\Models\Booking) {
                switch ($entity) {
                    case 'booking':
                        $replaceTmp = $modelInstance->{$attribute};
                        break;

                    case 'property':
                        $replaceTmp = $modelInstance->property[$attribute];
                        break;
                }
            } elseif ($modelInstance instanceof \App\Models\Property) {
                $replaceTmp = $modelInstance->{$attribute};
            } else {
                throw new Exception("Model instance must be Booking or Property");
            }

            if ($replaceTmp instanceof Carbon\Carbon) {
                $replaceTmp = $replaceTmp->format('d/m/Y');
            }

            if (!is_null($replaceTmp)) {
                $replace[] = $replaceTmp;
            }
        }

        return str_replace($search, $replace, $subject);
    }
}