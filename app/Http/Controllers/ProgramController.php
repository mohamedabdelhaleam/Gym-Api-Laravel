<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api");
    }
    public function getAllPrograms()
    {
        $programs = Program::all();
        if (!$programs) {
            return response()->json([
                'status' => "fail",
                'message' => "Not Found",
            ], 404);
        }
        return response()->json([
            'status' => "success",
            'data' => $programs
        ], 200);
    }
    public function getProgram($programId)
    {
        $program = Program::find($programId);
        if (!$program) {
            return response()->json([
                'status' => "fail",
                'message' => "Not Found",
            ], 404);
        }
        return response()->json([
            'status' => "success",
            'data' => $program
        ], 200);
    }
    public function create()
    {
        $program = Program::create([]);
        if (!$program) {
            return response()->json([
                'status' => "fail",
                'message' => "Not Found",
            ], 404);
        }
        return response()->json([
            'status' => "success",
            'data' => $program
        ], 201);
    }
    public function delete($programId)
    {
        $program = Program::find($programId);
        if (!$program) {
            return response()->json([
                'status' => "fail",
                'message' => "Can not Delete Program",
            ], 404);
        }
        $program->delete();
        return response()->json([
            'status' => "success",
            'message' => "Program Deleted Successfully"
        ], 200);
    }
    public function update(Request $request, $programId)
    {
        $program = Program::find($programId);
        if (!$program) {
            return response()->json([
                'status' => "fail",
                'message' => "Can not Update Program",
            ], 404);
        }
        $program->update($request->all());
        return response()->json([
            'status' => "success",
            'message' => "Program Updated Successfully"
        ], 200);
    }
    public function getUserInProgram($programId)
    {
        $program = Program::with(['Users' => function ($q) {
            $q->select('name');
        }])->find($programId);
        if (!$program) {
            return response()->json([
                'status' => "fail",
                'message' => "Not Found",
            ], 404);
        }
        return response()->json([
            'status' => "success",
            'data' => $program
        ], 200);
    }
}
