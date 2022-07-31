<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Repositories\SessionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\Models\User;
use App\Models\Workshop;
use Illuminate\Support\Facades\DB;

class SessionController extends AppBaseController
{
    /** @var SessionRepository $sessionRepository*/
    private $sessionRepository;

    public function __construct(SessionRepository $sessionRepo)
    {
        $this->sessionRepository = $sessionRepo;
    }

    /**
     * Display a listing of the Session.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function addsession($id)
    {
        
        $workshop_id = $id;

        return view('sessions.create_us',compact('workshop_id'));
    } 
    public function sessionlist($id)
    {
        $workshop_id = $id;
        $sessions = DB::table('sessions')
        ->where('workshop_id', $workshop_id)
        ->get();

        return view('sessions.index_view')->with('sessions', $sessions);
    }
    public function index(Request $request)
    {
        $user = auth()->id();

        /*$workshops = Workshop::
        join('user_workshop as uw', 'workshops.id', '=', 'uw.workshop_id')
        ->join('users as u', 'u.id', '=', 'uw.user_id')
        ->join('profiles as p', 'p.user_id', '=', 'u.id')
        ->where('uw.user_id',$user)
        ->where('workshops.categorie_id', 1)
        ->get();*/

        $workshops = DB::table('workshops as w')
        ->distinct()
        ->join('user_workshop as uw', 'w.id', '=', 'uw.workshop_id')
        ->join('users as us', 'us.id', '=', 'uw.user_id')
        ->where('uw.user_id',$user)
        ->where('w.categorie_id', 1)
        ->get();

        return view('sessions.index')
            ->with('workshops', $workshops);
    }

    /**
     * Show the form for creating a new Session.
     *
     * @return Response
     */
    public function create()
    {
    
        $user_id = auth()->id();
        $workshop_id = DB::table('workshops as w')
        //->distinct()
        ->join('user_workshop as uw', 'w.id', '=', 'uw.workshop_id')
        ->where('categorie_id', 1)
        ->where('user_id', $user_id)
        ->pluck('name_workshop','w.id');

        return view('sessions.create',compact('workshop_id'));
    }

    /**
     * Store a newly created Session in storage.
     *
     * @param CreateSessionRequest $request
     *
     * @return Response
     */
    public function store(CreateSessionRequest $request)
    {
        $input = $request->all();

        $session = $this->sessionRepository->create($input);

        Flash::success('Session saved successfully.');

        return redirect(route('sessions.index'));
    }

    /**
     * Display the specified Session.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $session = $this->sessionRepository->find($id);

        if (empty($session)) {
            Flash::error('Session not found');

            return redirect(route('sessions.index'));
        }

        return view('sessions.show')->with('session', $session);
    }

    /**
     * Show the form for editing the specified Session.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $session = $this->sessionRepository->find($id);

        if (empty($session)) {
            Flash::error('Session not found');

            return redirect(route('sessions.index'));
        }

        return view('sessions.edit')->with('session', $session);
    }

    /**
     * Update the specified Session in storage.
     *
     * @param int $id
     * @param UpdateSessionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSessionRequest $request)
    {
        $session = $this->sessionRepository->find($id);

        if (empty($session)) {
            Flash::error('Session not found');

            return redirect(route('sessions.index'));
        }

        $session = $this->sessionRepository->update($request->all(), $id);

        Flash::success('Session updated successfully.');

        return redirect(route('sessions.index'));
    }

    /**
     * Remove the specified Session from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $session = $this->sessionRepository->find($id);

        if (empty($session)) {
            Flash::error('Session not found');

            return redirect(route('sessions.index'));
        }

        $this->sessionRepository->delete($id);

        Flash::success('Session deleted successfully.');

        return redirect(route('sessions.index'));
    }
}
