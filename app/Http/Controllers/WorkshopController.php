<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWorkshopRequest;
use App\Http\Requests\UpdateWorkshopRequest;
use App\Repositories\WorkshopRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Categorie;
use App\Models\Workshop;
use App\Models\Profile;

class WorkshopController extends AppBaseController
{
    /** @var WorkshopRepository $workshopRepository*/
    private $workshopRepository;

    public function __construct(WorkshopRepository $workshopRepo)
    {
        $this->workshopRepository = $workshopRepo;
        $this->middleware('can:workshops.index')->only('index');
        $this->middleware('can:workshops.edit')->only('edit','update');
        $this->middleware('can:workshops.create')->only('create','store');
        $this->middleware('can:workshops.destroy')->only('destroy');
    }

    /**
     * Display a listing of the Workshop.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function lista(Request $request)
    {
        
        /*$nece = Necesidad::
        join('investigacion_necesidad  as in', 'in.necesidad_id', '=', 'necesidads.id')
        ->where('investigacion_id',$id)
        ->pluck('nombre','nombre');categories*/
        $categorie = Categorie::pluck('name_categorie','id');
        

        $name_categorie  = $request->get('name_categorie');
        $teacher = $request->get('teacher');
        $biblio   = $request->get('name_workshop');

            $workshops_user = Workshop::orderBy('name_workshop', 'DESC')
            ->necesidad($name_categorie)
            ->fcv($teacher)
            ->bibliografia($teacher)
            ->paginate(8);    


        

        return view('user_workshops.lista',compact('categorie'))
        ->with('workshops_user', $workshops_user);
    } 
    public function index(Request $request)
    {
        $workshops = $this->workshopRepository->all();

        $user = auth()->id();

        $workshops_user = Workshop::
        join('user_workshop as uw', 'workshops.id', '=', 'uw.workshop_id')
        ->join('users as u', 'u.id', '=', 'uw.user_id')
        ->join('profiles as p', 'p.user_id', '=', 'u.id')
        ->where('uw.user_id',$user)
        ->where('workshops.categorie_id', 1)
        ->get();

        return view('workshops.index')
            ->with('workshops_user', $workshops_user);
    }

    /**
     * Show the form for creating a new Workshop.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Categorie::pluck('name_categorie','id');
        $user = auth()->id();

        $teacher = Profile::where('user_id', $user)->get();

        return view('workshops.create',compact('categories'),compact('teacher'));
    }

    /**
     * Store a newly created Workshop in storage.
     *
     * @param CreateWorkshopRequest $request
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

        return redirect(route('workshops.index'));
    }

    /**
     * Display the specified Workshop.
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

            return redirect(route('workshops.index'));
        }

        return view('workshops.show')->with('workshop', $workshop);
    }

    /**
     * Show the form for editing the specified Workshop.
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

            return redirect(route('workshops.index'));
        }

        return view('workshops.edit',compact('categories'),compact('teacher'))->with('workshop', $workshop);
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

            return redirect(route('workshops.index'));
        }

        $workshop = $this->workshopRepository->update($request->all(), $id);

        Flash::success('Workshop updated successfully.');

        return redirect(route('workshops.index'));
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

            return redirect(route('workshops.index'));
        }

        $this->workshopRepository->delete($id);

        Flash::success('Workshop deleted successfully.');

        return redirect(route('workshops.index'));
    }
}