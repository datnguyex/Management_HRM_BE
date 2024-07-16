<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamController extends Controller
{
    //get Teams
    public function index()
    {

        $teams = Team::all();

        return response()->json([
            'teams' => $teams,
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            //create team
            $team = Team::create([
                'name' => $request->name,
                'managerID' => $request->managerID,
                'roomID' => $request->roomID,
                'brandID' => $request->brandID,
                'description' => $request->description,
            ]);

            return response()->json([
                'message' => "Team successfully created",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "something really wrong",
            ], 500);
        }
    }

    /**Show team */
    public function update(Request $request, $id)
    {
        try {
            //Find team update
            $team = Team::find($id);

            //check team
            if (!$team) {
                return response()->json([
                    'message' => "Not found user",
                ], 404);
            }

            //update user
            $team->name = $request->name |  $team->name;
            $team->managerID = $request->managerID |  $team->managerID;
            $team->roomID = $request->roomID |  $team->roomID;
            $team->brandID = $request->brandID |  $team->brandID;
            $team->description = $request->description |  $team->description;

            //save user
            $team->save();

            //message
            return response()->json([
                "message" => "Update successfully ",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => "Something went really wrong",
            ], 500);
        }
    }

    //destroy users
    public function destroy($id)
    {
        try {
            $team = Team::find($id);

            //check team
            if (!$team) {
                return response()->json([
                    "message" => "User not found",
                ], 404);
            }
            $team->delete();
            return response()->json([
                "message" => "Destroy successfully",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Something Wrong"
            ], 500);
        }
    }

    public function show($id)
    {
        $team = Team::find($id);
        if (!$team) {
            return response()->json([
                "message" => "User not found",
            ], 404);
        }
        return response()->json([
            "team" => $team,
        ], 200);
    }
}
