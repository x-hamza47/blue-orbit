<?php

namespace App\Services;

use App\Models\Service;

class SectionResolver
{
    public function resolve($section, $service)
    {
        return match ($section->type) {

            'relatedservices' => $this->relatedServices($service),

            'services' => $this->services(),

            default => $section->data,
        };
    }

    private function relatedServices($service)
    {
        if ($service->parent_id === null) {
            return $service->children()->active()->get();
        }

        return $service->parent
            ->children()
            ->where('id', '!=', $service->id)
            ->active()
            ->get();
    }

    private function services()
    {
        return Service::active()->get();
    }
}
