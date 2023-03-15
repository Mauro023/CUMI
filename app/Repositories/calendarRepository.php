<?php

namespace App\Repositories;

use App\Models\calendar;
use App\Repositories\BaseRepository;

/**
 * Class calendarRepository
 * @package App\Repositories
 * @version March 15, 2023, 8:51 pm UTC
*/

class calendarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'workday',
        'entry_time',
        'departure_time',
        'floor',
        'id_employe'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return calendar::class;
    }
}
