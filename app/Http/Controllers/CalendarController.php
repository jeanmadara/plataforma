<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Session;

use Illuminate\Support\Facades\DB;
use Flash;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function get_session()
    {
        
        $user = auth()->id();

       
        $events = DB::table('sessions')->distinct()
        ->join('workshops as w', 'sessions.workshop_id', '=', 'w.id')
        ->join('user_workshop as uw', 'w.id', '=', 'uw.workshop_id')
        //->join('categories as c', 'c.id', '=', 'w.categorie_id')
        ->where('uw.user_id',$user)
        //->where('w.categorie_id', 1)
        ->select("sessions.id as id", "sessions.name as title","sessions.start as start","sessions.end as end","sessions.description_session as ds","reference","w.name_workshop as workshop_id")
        ->get()->toArray();


      /*   $evento=Session::all();
        $events=[];

        foreach ($evento as $value){
            $events[]=[
                "id" => $value->id,
                "title" => $value->name,
                "start" => $value->start,
                "end" => $value->end,
                "extendedProps" =>[
                    "ds" => $value->description_session,
                    "reference" => $value->reference,
                ]
            ];
        } */

        return response()->json($events);

        
    }

    public function validatedate($w, $w_start, $w_end)
    {
        $workshop_date = DB::table('workshops as w')
        //->join('workshops as w', 'sessions.workshop_id', '=', 'w.id')
        //->join('user_workshop as uw', 'w.id', '=', 'uw.workshop_id')
        ->select("w.id", "w.start", "w.end")
        ->where('w.id',$w)
        ->whereDate('w.start','<=',$w_start)
        ->whereDate('w.end','>=',$w_end)
        ->first();
        //dd($workshop_date);
        return $workshop_date == null ? true : false;
    }



    public function create_session(Request $request)
    {
        
        $eventos = $request->all();

        if($this-> validatedate($eventos["workshop_id"], $eventos["start"], $eventos["end"])){

            Flash::error('Las Fechas no coinciden');
            return redirect(route('calendar'));
           
        }else{
    
            //dd($eventos["start"]);
           $eventos["start"]=$eventos["start"]."".date("H:m:s", strtotime($eventos["hora_inicio"]));
           //$eventos["end"]=$eventos["end"]."".date("H:m:s", strtotime($eventos["hora_final"]));
           $eventos["end"]=$eventos["end"]."".date("H:m:s", strtotime($eventos["hora_fin"]));

            Session::create($eventos);
        }

        return redirect(route('calendar'));

    }

    public function ajaxupdate(Request $request)
    {
        $id=$request["id"];
        $date=$request["start"];
        $request["start"]=$date." ".date("H:m:s", strtotime($request["hora_inicio"]));
        //$eventos["end"]=$eventos["end"]."".date("H:m:s", strtotime($eventos["hora_final"]));
        $request["end"]=$date." ".date("H:m:s", strtotime($request["hora_fin"]));

        //Sdd($request);
        $evento = Session::findOrFail($id);
        //$evento= $request->all();
        //$evento = Evento::with('client')->findOrFail($request->id);
         //$this->necesidadRepository->findWithoutFail($id);

        if (empty($evento)) {
            Flash::error('Necesidad not found');

            return redirect(route('calendar'));
        }

        $evento->update($request->all());

        //$evento = $this->necesidadRepository->update($request->all(), $id);

        Flash::success('Necesidad updated successfully.');

        return redirect(route('calendar'));
    }


    public function index()
    {
        //
        $user_id = auth()->id();
        $workshop_id = DB::table('workshops as w')
        //->distinct()
        ->join('user_workshop as uw', 'w.id', '=', 'uw.workshop_id')
        ->where('categorie_id', 1)
        ->where('user_id', $user_id)
        ->pluck('name_workshop','w.id');

        return view('calendar.index',compact('workshop_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $eventos = $request->all();
        $eventos["start"]=$eventos["start"]."".date("H:m:s", strtotime($eventos["hora_inicio"]));
        //$eventos["end"]=$eventos["end"]."".date("H:m:s", strtotime($eventos["hora_final"]));
        $eventos["end"]=$eventos["end"]."".date("H:m:s", strtotime($eventos["hora_fin"]));

        Session::create($eventos);

        return view('calendar.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
