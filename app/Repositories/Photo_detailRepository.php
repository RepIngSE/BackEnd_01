<?php

namespace App\Repositories;

use App\Models\Photo_detail;
use App\Repositories\BaseRepository;

class Photo_detailRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'gps_location',
        'status',
        'description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Photo_detail::class;
    }
}
