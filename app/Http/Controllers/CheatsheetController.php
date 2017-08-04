<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Cheatsheet;
use App\KnowledgePiece;

class CheatsheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $param   = $request->query('per_page');
        $perPage = empty($param) ? 15 : $param;

        $cheatsheets = Cheatsheet::with('knowledgePieces')->paginate($perPage);

        return response()->json($cheatsheets, 200);
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
        $validator = Validator::make($request->all(), [
            'name'             => 'required|string|unique:cheatsheets',
            'knowledge_pieces' => 'array'
        ]);

        if ($validator->fails()) {
           return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $cheatsheet = new Cheatsheet;

        $cheatsheet->name = $request->get('name');

        $cheatsheet->saveOrFail();

        if ($request->has('knowledge_pieces')) {
            $knowledgePieces = $request->get('knowledge_pieces');

            if ($knowledgePieces) {
                foreach ($knowledgePieces as $id) {
                    $knowledgePiece = KnowledgePiece::find($id);
                    if (!$knowledgePiece) {
                        Cheatsheet::destroy($cheatsheet->id);
                        return response()->json("Knowledge piece with id {$id} not found.", 404);
                    }
                }
                $cheatsheet->knowledgePieces()->attach($knowledgePieces);
                $cheatsheet = Cheatsheet::with('knowledgePieces')->find($cheatsheet->id);
            }
        }

        return response()->json($cheatsheet, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cheatsheet = Cheatsheet::with('knowledgePieces')->find($id);
        if (!$cheatsheet) {
            return response()->json("Cheatsheet with id {$id} not found.", 404);
        }

        return response()->json($cheatsheet, 200);
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
        $cheatsheet = Cheatsheet::find($id);
        if (!$cheatsheet) {
            return response()->json("Cheatsheet with id {$id} not found.", 404);
        }

        $validator = Validator::make($request->all(), [
            'name'             => ['string', Rule::unique('cheatsheets')->ignore($id)],
            'knowledge_pieces' => 'array'
        ]);

        if ($validator->fails()) {
           return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->has('name')) {
            $cheatsheet->name = $request->get('name');
        }

        if ($request->has('knowledge_pieces')) {
            $knowledgePieces = $request->get('knowledge_pieces');

            foreach ($knowledgePieces as $id) {
                $knowledgePiece = KnowledgePiece::find($id);
                if (!$knowledgePiece) {
                    return response()->json("Knowledge piece with id {$id} not found.", 404);
                }
            }
            $cheatsheet->knowledgePieces()->sync($knowledgePieces);
        }

        $cheatsheet->saveOrFail();

        return response()->json([], 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Cheatsheet::destroy($id)) {
            return response()->json("Cheatsheet with id {$id} not found.", 404);
        }

        return response()->json([], 204);
    }
}
