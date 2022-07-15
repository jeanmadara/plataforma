<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Repositories\BaseRepository;

/**
 * Class ProfileRepository
 * @package App\Repositories
 * @version July 11, 2022, 4:31 pm UTC
*/

class ProfileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'full_name',
        'dni',
        'phone',
        'description',
        'user_id'
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
        return Profile::class;
    }
}
