<?php

namespace App\Repositories;

use App\Models\user_workshop;
use App\Repositories\BaseRepository;

/**
 * Class user_workshopRepository
 * @package App\Repositories
 * @version July 22, 2022, 7:00 pm UTC
*/

class user_workshopRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'state',
        'user_id',
        'workshop_id'
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
        return user_workshop::class;
    }
}
