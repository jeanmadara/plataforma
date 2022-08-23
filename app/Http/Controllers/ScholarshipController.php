<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateScholarshipRequest;
use App\Http\Requests\UpdateScholarshipRequest;
use App\Repositories\ScholarshipRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\Scholarship;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class ScholarshipController extends AppBaseController
{
    /** @var ScholarshipRepository $scholarshipRepository*/
    private $scholarshipRepository;

    public function __construct(ScholarshipRepository $scholarshipRepo)
    {
        $this->scholarshipRepository = $scholarshipRepo;
        $this->middleware('can:scholarships.index')->only('index');
        $this->middleware('can:scholarships.edit')->only('edit','update');
        $this->middleware('can:scholarships.create')->only('create','store');
        $this->middleware('can:scholarships.destroy')->only('destroy');
    }

    /**
     * Display a listing of the Scholarship.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function applyscholarship()
    {
        //$scholarship = Scholarship::pluck('name','id')->all();
        //$scholarship = Scholarship::select(DB::raw("CONCAT(name, '-', percentage) AS name_sch"), "id")->pluck('name_sch', 'id')->all();
        $scholarship = DB::table('scholarships')
        ->select('id', DB::raw("CONCAT(name,' || equivale: ',percentage,'%') AS name"))
        ->get()->pluck('name', 'id');
        //dd($scholarship);
        return view('scholarships.create_apply',compact('scholarship'));
    }

    public function applysave(Request $request)
    {
       
        $input = $request->all();
       
        $id = auth()->id();

        $input['scholarship_state'] = 'pendiente';
 //dd($input);
    
        $user = User::find($id);
        $user->update($input);
        Flash::success('Su Solicitud fue enviada correctamente.');
        
        return redirect(route('home'));
    }


    public function comprobante($id)
    {
        //$scholarship = $this->scholarshipRepository->find($id);

        $usuarios = User::join('scholarships as sc', 'sc.id', '=', 'scholarship_id')
        ->join('profiles as p', 'p.user_id', '=', 'users.id')
        ->join('user_workshop as uw', 'users.id', '=', 'uw.user_id')
        ->join('workshops as w', 'w.id', '=', 'uw.workshop_id')
        ->select( 'users.*', 'sc.name as name_scholarship', 'percentage', 'name_workshop', 'price','full_name','dni')
        ->get();

        $usuario = $usuarios->find($id);

        //dd($usuario);

        return view('scholarships.show_comp')->with('usuario', $usuario);
    }
    
    public function agree($scholarship_id,$user_id)
    {
              
        $id = $user_id;

        $input['scholarship_id'] = $scholarship_id;
        $input['scholarship_state'] = 'aprobada';
 //dd($input);
    
        $user = User::find($id);
        //dd($user);
        $user->update($input);
        Flash::success('Solicitud aceptada correctamente.');
        
        return redirect(route('scholarships.index'));
    }

    public function deny($user_id)
    {
              
        $id = $user_id;

        $input['scholarship_id'] = 1;
        $input['scholarship_state'] = 'negada';
 //dd($input);
    
        $user = User::find($id);
        //dd($user);
        $user->update($input);
        Flash::error('Solicitud fue negada.');
        
        return redirect(route('scholarships.index'));
    }

    public function index(Request $request)
    {
        $scholarships = $this->scholarshipRepository->all();

        $pending = User::where('scholarship_state', '=', 'pendiente')->distinct()
        ->join('scholarships as sc', 'sc.id', '=', 'scholarship_apply')
        //->join('user_workshop as uw', 'users.id', '=', 'uw.user_id')
        //->join('workshops as w', 'w.id', '=', 'uw.workshop_id')
        ->select( 'users.*', 'sc.name as name_scholarship', 'percentage')
        ->paginate(5);
        //dd($usuarios);

        $usuarios = User::where('scholarship_id', '!=', 1)->distinct()
        ->join('scholarships as sc', 'sc.id', '=', 'scholarship_id')
        ->join('user_workshop as uw', 'users.id', '=', 'uw.user_id')
        ->join('workshops as w', 'w.id', '=', 'uw.workshop_id')
        ->select( 'users.*', 'sc.name as name_scholarship', 'percentage', 'name_workshop')
        ->paginate(5);
       
      

        return view('scholarships.index',compact('usuarios','pending'))
            ->with('scholarships', $scholarships);
    }

    /**
     * Show the form for creating a new Scholarship.
     *
     * @return Response
     */
    public function create()
    {
        return view('scholarships.create');
    }

    /**
     * Store a newly created Scholarship in storage.
     *
     * @param CreateScholarshipRequest $request
     *
     * @return Response
     */
    public function store(CreateScholarshipRequest $request)
    {
        $input = $request->all();

        $scholarship = $this->scholarshipRepository->create($input);

        Flash::success('Scholarship saved successfully.');

        return redirect(route('scholarships.index'));
    }

    /**
     * Display the specified Scholarship.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $scholarship = $this->scholarshipRepository->find($id);

        if (empty($scholarship)) {
            Flash::error('Scholarship not found');

            return redirect(route('scholarships.index'));
        }

        return view('scholarships.show')->with('scholarship', $scholarship);
    }

    /**
     * Show the form for editing the specified Scholarship.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $scholarship = $this->scholarshipRepository->find($id);

        if (empty($scholarship)) {
            Flash::error('Scholarship not found');

            return redirect(route('scholarships.index'));
        }

        return view('scholarships.edit')->with('scholarship', $scholarship);
    }

    /**
     * Update the specified Scholarship in storage.
     *
     * @param int $id
     * @param UpdateScholarshipRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateScholarshipRequest $request)
    {
        $scholarship = $this->scholarshipRepository->find($id);

        if (empty($scholarship)) {
            Flash::error('Scholarship not found');

            return redirect(route('scholarships.index'));
        }

        $scholarship = $this->scholarshipRepository->update($request->all(), $id);

        Flash::success('Scholarship updated successfully.');

        return redirect(route('scholarships.index'));
    }

    /**
     * Remove the specified Scholarship from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $scholarship = $this->scholarshipRepository->find($id);

        if (empty($scholarship)) {
            Flash::error('Scholarship not found');

            return redirect(route('scholarships.index'));
        }

        $this->scholarshipRepository->delete($id);

        Flash::success('Scholarship deleted successfully.');

        return redirect(route('scholarships.index'));
    }
}
