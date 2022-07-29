<?php

namespace App\Http\Controllers;

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

class ActcheckinController extends AppBaseController
{
    /** @var user_workshopRepository $userWorkshopRepository*/
    private $userWorkshopRepository;

    public function __construct(user_workshopRepository $userWorkshopRepo)
    {
        $this->userWorkshopRepository = $userWorkshopRepo;
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
        ->select( 'w.*', 'name_categorie', 'state')->get();

     
        return view('actcheckin.index',compact('workshops_user'))
            ->with('userWorkshops', $userWorkshops);
    }

    /**
     * Show the form for creating a new user_workshop.
     *
     * @return Response
     */
    public function create()
    {
        $user_id = auth()->id();

        $users = User::pluck('name','id');
        
        $workshop_us = DB::table('user_workshop')
        ->where('user_id', '=', $user_id)
        ->pluck('workshop_id');

        $json = json_encode($workshop_us);
        $a=preg_replace('/[^0-9,.]/', '', $json);
        $exp = explode(',', $a);    

        $workshops = DB::table('workshops as w')
        ->distinct()->join('user_workshop as uw', 'w.id', '=', 'uw.workshop_id')
        ->where('categorie_id', '!=', 1)
        ->whereNotIn('workshop_id', $exp)
        ->pluck('name_workshop','w.id');

        return view('activities.create_checkin',compact('users'),compact('workshops'));
    }

    /**
     * Store a newly created user_workshop in storage.
     *
     * @param Createuser_workshopRequest $request
     *
     * @return Response
     */
    public function store(Createuser_workshopRequest $request)
    {
        $input = $request->all();

        $userWorkshop = $this->userWorkshopRepository->create($input);

        Flash::success('User Workshop saved successfully.');

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
        $userWorkshop = $this->userWorkshopRepository->find($id);

        if (empty($userWorkshop)) {
            Flash::error('User Workshop not found');

            return redirect(route('userWorkshops.index'));
        }

        return view('activities.show')->with('userWorkshop', $userWorkshop);
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
        $userWorkshop = $this->userWorkshopRepository->find($id);

        if (empty($userWorkshop)) {
            Flash::error('User Workshop not found');

            return redirect(route('userWorkshops.index'));
        }

        return view('activities.edit')->with('userWorkshop', $userWorkshop);
    }

    /**
     * Update the specified user_workshop in storage.
     *
     * @param int $id
     * @param Updateuser_workshopRequest $request
     *
     * @return Response
     */
    public function update($id, Updateuser_workshopRequest $request)
    {
        $userWorkshop = $this->userWorkshopRepository->find($id);

        if (empty($userWorkshop)) {
            Flash::error('User Workshop not found');

            return redirect(route('activities.index'));
        }

        $userWorkshop = $this->userWorkshopRepository->update($request->all(), $id);

        Flash::success('User Workshop updated successfully.');

        return redirect(route('activities.index'));
    }

    /**
     * Remove the specified user_workshop from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $userWorkshop = $this->userWorkshopRepository->find($id);

        if (empty($userWorkshop)) {
            Flash::error('User Workshop not found');

            return redirect(route('activities.index'));
        }

        $this->userWorkshopRepository->delete($id);

        Flash::success('User Workshop deleted successfully.');

        return redirect(route('activities.index'));
    }
}
