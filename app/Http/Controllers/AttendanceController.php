<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAttendanceRequest;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Repositories\AttendanceRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\Session;
use App\Models\User;

class AttendanceController extends AppBaseController
{
    /** @var AttendanceRepository $attendanceRepository*/
    private $attendanceRepository;

    public function __construct(AttendanceRepository $attendanceRepo)
    {
        $this->attendanceRepository = $attendanceRepo;
    }

    /**
     * Display a listing of the Attendance.
     *
     * @param Request $request
     *
     * @return Response
     */

    public function addattendance($id,$workshop_id)
    {
        
        $session_id = $id;
        $workshop_id = $workshop_id;
        $user_id = auth()->id();
        $profiles = Profile::orderBy('full_name', 'DESC')
        ->join('users as us', 'us.id', '=', 'profiles.user_id')
        ->join('user_workshop as uw', 'us.id', '=', 'uw.user_id')
        //->join('categories as c', 'c.id', '=', 'w.categorie_id')
        ->where('uw.workshop_id',$workshop_id)->get();

        return view('attendances.create_us',compact('profiles'),compact('session_id'),compact('user_id'));

    } 

    public function index(Request $request)
    {
        $user = auth()->id();
        
        $workshops = DB::table('workshops as w')
        ->distinct()
        ->join('user_workshop as uw', 'w.id', '=', 'uw.workshop_id')
        ->join('users as us', 'us.id', '=', 'uw.user_id')
        ->where('uw.user_id',$user)
        ->where('w.categorie_id', 1)
        ->get();



        return view('attendances.index')
            ->with('workshops', $workshops);
    }

    /**
     * Show the form for creating a new Attendance.
     *
     * @return Response
     */
    public function create()
    {
        $user_id = auth()->id();
        $profiles = Profile::get();
        $sessions = Session::where('uw.user_id',$user_id)
        ->join('workshops as w', 'w.id', '=', 'sessions.workshop_id')
        ->join('user_workshop as uw', 'w.id', '=', 'uw.workshop_id')
        ->pluck('sessions.name','sessions.id');

        return view('attendances.create',compact('profiles'),compact('sessions'),compact('user_id'));
    }

    /**
     * Store a newly created Attendance in storage.
     *
     * @param CreateAttendanceRequest $request
     *
     * @return Response
     */
    public function store(CreateAttendanceRequest $request)
    {
        $input = $request->all();

        //$attendance = $this->attendanceRepository->create($input);
        $session_id =$request->input('session_id');
        $session = Session::find($session_id);
        //dd($session);

        //$session = Session::update($input);
        $session->users()->sync($request->get('user_id'));
        //$role->syncPermissions($request->input('permission'));
        //$role->attendances($request->input('name_user'));
        //$session->syncPermissions($request->input('user_id'));

        Flash::success('Attendance saved successfully.');

        return redirect(route('attendances.index'));
    }

    /**
     * Display the specified Attendance.
     *
     * 
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        //$attendance = $this->attendanceRepository->find($id);

        $attendance = Session::find($id);
        //$users = User::get();

        $profiles = DB::table('profiles as p')
        //->distinct()
        ->join('users as us', 'us.id', '=', 'p.user_id')
        ->join('session_user as su', 'su.user_id', '=', 'us.id')
        //->join('categories as c', 'c.id', '=', 'w.categorie_id')
        ->where('su.session_id', $id)
        //->select( 'w.*', 'name_categorie', 'state')
        ->get();
        //dd($profiles);

        //dd($session );

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        return view('attendances.show',compact('profiles'))->with('attendance', $attendance);
    }

    /**
     * Show the form for editing the specified Attendance.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        return view('attendances.edit')->with('attendance', $attendance);
    }

    /**
     * Update the specified Attendance in storage.
     *
     * @param int $id
     * @param UpdateAttendanceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAttendanceRequest $request)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        $attendance = $this->attendanceRepository->update($request->all(), $id);

        Flash::success('Attendance updated successfully.');

        return redirect(route('attendances.index'));
    }

    /**
     * Remove the specified Attendance from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $attendance = $this->attendanceRepository->find($id);

        if (empty($attendance)) {
            Flash::error('Attendance not found');

            return redirect(route('attendances.index'));
        }

        $this->attendanceRepository->delete($id);

        Flash::success('Attendance deleted successfully.');

        return redirect(route('attendances.index'));
    }
}
