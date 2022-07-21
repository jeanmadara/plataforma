<?php

namespace App\Repositories;

use App\Models\Workshop;
use App\Repositories\BaseRepository;

/**
 * Class WorkshopRepository
 * @package App\Repositories
 * @version July 20, 2022, 3:42 am UTC
*/

class WorkshopRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'start',
        'end',
        'price',
        'categorie_id'
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
        return Workshop::class;
    }
}
