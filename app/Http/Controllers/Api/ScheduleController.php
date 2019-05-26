<?php

namespace App\Http\Controllers\Api;

use DateTime;
use date;
use \App\Schedule;
use App\Api\ApiMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScheduleController extends Controller
{

    private $schedule;

    public function __construct(Schedule $schedule){
        $this->schedule = $schedule;
    }


    public function index(){
        return response()->json($this->schedule->paginate(5));
    }

    public function show(Schedule $id){
        return response()->json(ApiMessage::data($id, 201));
    }

    public function store(Request $request){
        try {
            $schedule_data = $request->all();

            $date_start = new DateTime($schedule_data['date_start']);
            $date_end = new DateTime($schedule_data['date_end']);

            $wk_date_start = date("w", strtotime($schedule_data['date_start']));
            $wk_date_end = date("w", strtotime($schedule_data['date_end']));

            if(($wk_date_start == 0 || $wk_date_start == 6) || ($wk_date_end == 0 || $wk_date_end == 6)){
                return response()->json(ApiMessage::message('Não pode ser agendado em um final de semana.', 201));
            }

            $diff = $date_start->diff($date_end);

            if($diff->invert === 1){
                $aux = $date_start;
                $date_start = $date_end;
                $date_end = $aux;
            }

            $scheduled_owner = $this->schedule
                                    ->where('owner', '=', $schedule_data['owner'])
                                    ->whereBetween('date_start', [$schedule_data['date_start'], $schedule_data['date_end']])
                                    ->orWhereBetween('date_end', [$schedule_data['date_start'], $schedule_data['date_end']])
                                    ->get();

            if(!count($scheduled_owner)){
                $schedule_data = $request->all();
                $this->schedule->create($schedule_data);
                return response()->json(ApiMessage::message('Tarefa agendada', 201));
            }
            return response()->json(ApiMessage::message('Conflito de datas, já existe uma tarefa agendada no intervalor de '.$date_start->format('d-m-Y').' à '.$date_end->format('d-m-Y').'.', 201));

        } catch (\Exception $e){
            return response()->json(ApiMessage::message("Não foi possível criar o registro.", 1010));
        }
    }

    public function update(Request $request, $id){
        try {
            $schedule_data = $request->all();
            $schedule = $this->schedule->find($id);
            $schedule->update($schedule_data);
            return response()->json(['msg' => 'Scheduled'], 201);
        } catch (\Exception $e){
            return response()->json(ApiMessage::message("Não foi possível salvar os dados.", 1011));
        }
    }

    public function delete(Schedule $id){
        try {
            $id->delete();
            return response()->json(['msg' => $id->title. ' removed.'], 200);
        } catch (\Throwable $th) {
            return response()->json(ApiMessage::message("Não foi possível apagar o registro.", 1012));
        }
    }
}
