<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tugas;
use App\Http\Requests\Master\TugasRequest;
use Carbon\Carbon;

class TugasController extends Controller
{
    public function index(Request $request)
    {
        try {
            $size = $request->input('size', 10);
            $page = $request->input('page', 1);
            $search = $request->input('value');


            $query = Tugas::query();

            if ($search) {
                $query->where('nama_project', 'like', "%$search%")
                    ->orWhere('nama_modul', 'like', "%$search%");
            }

            $tugas = $query->paginate($size, ['*'], 'page', $page);

            return response()->json([
                'message' => 'success',
                'data' => $tugas->items(), // Get the items for the current page
                'pagination' => [
                    'total' => $tugas->total(), // Total number of items
                    'size' => $size,
                    'currentPage' => $tugas->currentPage(), // Current page number
                    'lastPage' => $tugas->lastPage(), // Last page number
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function get($id){
        try {
            $tugas = tugas::where('id', $id)->get();

            return response()->json([
                'message' => 'success',
                'data' => $tugas, // Get the items for the current page
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function create_update(TugasRequest $request)
    {
        try {
            $requestData = $request->all();

            $dateStart = Carbon::parse($requestData['date_start']);
            $dateEnd = Carbon::parse($requestData['date_end']);
            $durationDays = $dateEnd->diffInDays($dateStart) + 1;
            $time = $durationDays * 8;

            $requestData['jam_kerja'] = $time;

            if(isset($requestData['status'])) {
                if($requestData['status'] === "Accept"){
                    if (Carbon::now()->isBefore($dateEnd)) {
                        $requestData['status'] = 'Ahead of Schedule';
                    } elseif (Carbon::now()->isSameDay($dateEnd)) {
                        $requestData['status'] = 'On Time';
                    } else {
                        $requestData['status'] = 'Lagging of Schedule';
                    }
                    return response()->json([
                        'message' => $requestData,
                    ], 200);
                }else{
                    return response()->json([
                        'message' => "Else Accept",
                    ], 200);
                }
            } 

            if(isset($requestData['id'])) {
                $tugas = Tugas::findOrFail($requestData['id']);
                // return response()->json([
                //     'message' => $tugas,
                // ], 200);
                $tugas->update($requestData);
                $message = 'Updated successfully';
            } else {
                $tugas = Tugas::create($requestData);
                $message = 'Created successfully';
            }
            
            return response()->json([
                'message' => 'success',
                'data' => $requestData,
                'pesan' => $message
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $tugas = tugas::where('id', $id);
            $tugas->delete();
            return response()->json([
                'message' => 'success',
                'data' => $tugas, // Get the items for the current page
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
