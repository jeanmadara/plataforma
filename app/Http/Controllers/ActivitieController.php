<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkshopRequest;
use App\Http\Requests\UpdateWorkshopRequest;
use App\Repositories\WorkshopRepository;

use App\Http\Requests\Createuser_workshopRequest;
use App\Http\Requests\Updateuser_workshopRequest;
use App\Repositories\user_workshopRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Support\Facades\DB;
use App\Models\Categorie;
use App\Models\Profile;

class ActivitieController extends AppBaseController
{
    /** @var user_workshopRepository $userWorkshopRepository*/
    private $userWorkshopRepository;

    /** @var WorkshopRepository $workshopRepository*/
    private $workshopRepository;

    public function __construct(user_workshopRepository $userWorkshopRepo,WorkshopRepository $workshopRepo)
    {
        $this->userWorkshopRepository = $userWorkshopRepo;

        $this->workshopRepository = $workshopRepo;
    }

    

  

    /**
     * Display a listing of the user_workshop.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $user_id = auth()->id();
        $userWorkshops = $this->userWorkshopRepository->all();

        $workshops_user = DB::table('workshops as w')->distinct()
        ->join('user_workshop as uw', 'w.id', '=', 'uw.workshop_id')
        ->join('users as us', 'us.id', '=', 'uw.user_id')
        ->join('profiles as p', 'p.user_id', '=', 'us.id')
        ->join('categories as c', 'c.id', '=', 'w.categorie_id')
        ->where('w.categorie_id', '!=', 1)
        ->where('uw.user_id',$user_id)
        ->select( 'w.*', 'name_categorie', 'state')->get();

     
        return view('activities.index',compact('workshops_user'))
            ->with('userWorkshops', $userWorkshops);
    }

    /**
     * Show the form for creating a new user_workshop.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Categorie::pluck('name_categorie','id');
        $user = auth()->id();

        $teacher = Profile::where('user_id', $user)->get();

        return view('activities.create',compact('categories'),compact('teacher'));
    }

    /**
     * Store a newly created user_workshop in storage.
     *
     * @param Createuser_workshopRequest $request
     *
     * @return Response
     */
    public function store(CreateWorkshopRequest $request)
    {
        $input = $request->all();
        $user_id = auth()->id();

        $workshop = $this->workshopRepository->create($input);

        $workshop->users()->attach($user_id); 

        Flash::success('Workshop saved successfully.');

        return redirect(route('activities.index'));
    }

    /**
     * Display the specified user_workshop.
     *
     * @param int $id
     *
     * @return Response
     */
    
    public function show($id)
    {
        $workshop = $this->workshopRepository->find($id);

        if (empty($workshop)) {
            Flash::error('Workshop not found');

            return redirect(route('activities.index'));
        }

        return view('activities.show')->with('workshop', $workshop);
    }

    /**
     * Show the form for editing the specified user_workshop.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $workshop = $this->workshopRepository->find($id);

        $categories = Categorie::pluck('name_categorie','id');

        $user = auth()->id();

        $teacher = Profile::where('user_id', $user)->get();

        if (empty($workshop)) {
            Flash::error('Workshop not found');

            return redirect(route('activities.index'));
        }

        return view('activities.edit',compact('categories'),compact('teacher'))->with('workshop', $workshop);
    }

    /**
     * Update the specified Workshop in storage.
     *
     * @param int $id
     * @param UpdateWorkshopRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWorkshopRequest $request)
    {
        $workshop = $this->workshopRepository->find($id);

        if (empty($workshop)) {
            Flash::error('Workshop not found');

            return redirect(route('activities.index'));
        }

        $workshop = $this->workshopRepository->update($request->all(), $id);

        Flash::success('Workshop updated successfully.');

        return redirect(route('activities.index'));
    }

    /**
     * Remove the specified Workshop from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $workshop = $this->workshopRepository->find($id);

        if (empty($workshop)) {
            Flash::error('Workshop not found');

            return redirect(route('activities.index'));
        }

        $this->workshopRepository->delete($id);

        Flash::success('Workshop deleted successfully.');

        return redirect(route('activities.index'));
    }
}
