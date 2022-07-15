<?php

namespace App\Repositories;

use App\Models\Scholarship;
use App\Repositories\BaseRepository;

/**
 * Class ScholarshipRepository
 * @package App\Repositories
 * @version July 11, 2022, 12:08 am UTC
*/

class ScholarshipRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return Scholarship::class;
    }
}
