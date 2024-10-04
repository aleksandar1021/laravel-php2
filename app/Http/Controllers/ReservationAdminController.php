<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\OurUser;
use App\Models\Reservation;
use App\Models\ReservationLine;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ReservationAdminController extends BaseController
{
    /**
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with('reservationLines', 'user')->get();
        //dd($reservations);
        return view("pages.admin.reservations", ['reservations'=>$reservations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createLine(string $id)
    {
        $tables = Table::all();
        return view("pages.admin.addLine", ['line'=>null, 'tables'=>$tables, 'id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeLine(Request $request)
    {
        if ($request->start == null || $request->end == null) {
            return back()->with('lineError', 'You have not entered any dates, both dates are required')->withInput();
        }
        if (!$request->start) {
            return back()->with('lineError', 'No start date sent')->withInput();
        }
        if (!$request->end) {
            return back()->with('lineError', 'No start end date sent')->withInput();
        }
        if (!$request->id_table) {
            return back()->with('lineError', 'An error occurred, it is not selected, please try again')->withInput();
        }

        session()->put("table", $request->id_table);

        $start = $request->start;
        $end = $request->end;

        if (strtotime($start) < time() || strtotime($end) < time()) {
            return back()->with('lineError', 'Dates cannot be in the past')->withInput();
        }

        if (strtotime($start) >= strtotime($end)) {
            return back()->with('lineError', 'The start date must be greater than the end date')->withInput();
        }

        $isReservate = ReservationLine::where('id_table', $request->id_table)
            ->where(function ($query) use ($start, $end) {
                $query->where('date_time_of', '<', $end)
                    ->where('date_time_until', '>', $start);
            })->exists();

        if ($isReservate) {
            return back()->with('lineError', 'There is a reservation for this table in the selected time range, please select another time range or another table ')->withInput();
        }

        $diffInDays = floor((strtotime($end) - strtotime($start)) / (60 * 60 * 24));
        if ($diffInDays > 10) {
            return back()->with('lineError', 'The difference between the start and end date must not be more than 10 days')->withInput();
        }

        try{
            $newLine = new ReservationLine();
            $newLine->id_reservation = $request->id_res;
            $newLine->date_time_of = $request->start;
            $newLine->date_time_until = $request->end;
            $newLine->id_table = $request->id_table;
            $newLine->save();
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json($e->getMessage(), 500);
        }


        return redirect()->route('viewReservations', ['id'=>$request->id_res]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reservationLines = ReservationLine::with('table')->where('id_reservation', $id)->get();
        //dd($reservationLines);
        return view("pages.admin.reservationLines", ['reservationLines'=>$reservationLines, 'id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editLine(string $id, string $idRes)
    {
        $tables = Table::all();
        $line = ReservationLine::find($id);
        return view("pages.admin.addLine", ['line'=>$line, 'tables'=>$tables, 'idRes'=>$idRes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateLine(Request $request, string $id)
    {
        if ($request->start == null || $request->end == null) {
            return back()->with('lineError', 'You have not entered any dates, both dates are required');
        }
        if (!$request->start) {
            return back()->with('lineError', 'No start date sent');
        }
        if (!$request->end) {
            return back()->with('lineError', 'No start end date sent');
        }
        if (!$request->id_table) {
            return back()->with('lineError', 'An error occurred, it is not selected, please try again');
        }

        $start = $request->start;
        $end = $request->end;

        if (strtotime($start) < time() || strtotime($end) < time()) {
            return back()->with('lineError', 'Dates cannot be in the past');
        }

        if (strtotime($start) >= strtotime($end)) {
            return back()->with('lineError', 'The start date must be greater than the end date');
        }

        $isReservate = ReservationLine::where('id_table', $request->id_table)
            ->where(function ($query) use ($start, $end) {
                $query->where('date_time_of', '<', $end)
                    ->where('date_time_until', '>', $start);
            })->exists();

        if ($isReservate) {
            return back()->with('lineError', 'There is a reservation for this table in the selected time range, please select another time range or another table ');
        }

        $diffInDays = floor((strtotime($end) - strtotime($start)) / (60 * 60 * 24));
        if ($diffInDays > 10) {
            return back()->with('lineError', 'The difference between the start and end date must not be more than 10 days');
        }

        try{
            $line = ReservationLine::find($id);
            $line->id_reservation = $request->id_res;
            $line->date_time_of = $request->start;
            $line->date_time_until = $request->end;
            $line->id_table = $request->id_table;
            $line->save();
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }


        return redirect()->route('viewReservations', ['id'=>$request->id_res]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyLine(string $id)
    {
        try{
            $line = ReservationLine::find($id);
            $idReservation = $line->id_reservation;

            $line->delete();

            $countLines = ReservationLine::where('id_reservation', $idReservation)->get();
            if(!count($countLines)){
                Reservation::find($idReservation)->delete();
                return response()->json("redirect", 200);
            }

        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

    public function createReservation(){
        $users = OurUser::all();
        return view("pages.admin.addReservation", ['users'=>$users, 'user'=>null]);
    }

    public function storeReservation(ReservationRequest $request)
    {
        try{
            $newReservation = new Reservation();
            $newReservation->id_user = $request->user;
            $newReservation->save();
            return redirect()->route("reservationsAdmin");
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

    public function destroyReservation(string $id)
    {
        try{
            $reservation = Reservation::find($id);
            ReservationLine::where('id_reservation',$id)->delete();
            $reservation->delete();
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }

    public function editReservation($id){
        $reservation = Reservation::with('user')->where('id', $id)->get();
        $users = OurUser::all();
        //dd($reservation[0]->user);
        return view("pages.admin.addReservation", ['users'=>$users, 'user'=>$reservation[0]]);
    }

    public function updateReservation(ReservationRequest $request, $idRes){
        try{
            $reservation = Reservation::find($idRes);
            $reservation->id_user = $request->user;
            $reservation->save();
            return redirect()->route("reservationsAdmin");
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json("An error occurred, please try again", 500);
        }
    }
}
