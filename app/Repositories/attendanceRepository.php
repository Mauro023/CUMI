<?php

namespace App\Repositories;

use App\Models\attendance;
use App\Repositories\BaseRepository;

/**
 * Class attendanceRepository
 * @package App\Repositories
 * @version March 16, 2023, 11:56 am -05
*/

class attendanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'workday',
        'entry_time',
        'departure_time',
        'minutes',
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
        return attendance::class;
    }
}
