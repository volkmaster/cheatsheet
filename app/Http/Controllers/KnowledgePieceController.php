<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Cheatsheet;
use App\KnowledgePiece;

class KnowledgePieceController extends Controller
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

        $knowledgePieces = KnowledgePiece::with('cheatsheets')->paginate($perPage);

        return response()->json($knowledgePieces, 200);
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
            'description' => 'string',
            'code'        => 'required|string',
            'cheatsheets' => 'array'
        ]);

        if ($validator->fails()) {
           return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $knowledgePiece = new KnowledgePiece;

        if ($request->has('description')) {
            $knowledgePiece->description = $request->get('description');;
        }

        $knowledgePiece->code = $request->get('code');

        $knowledgePiece->saveOrFail();

        if ($request->has('cheatsheets')) {
            $cheatsheets = $request->get('cheatsheets');

            if ($cheatsheets) {
                foreach ($cheatsheets as $id) {
                    $cheatsheet = Cheatsheet::find($id);
                    if (!$cheatsheet) {
                        KnowledgePiece::destroy($knowledgePiece->id);
                        return response()->json("Cheatsheet with id {$id} not found.", 404);
                    }
                }
                $knowledgePiece->cheatsheets()->attach($cheatsheets);
                $knowledgePiece = KnowledgePiece::with('cheatsheets')->find($knowledgePiece->id);
            }
        }

        return response()->json($knowledgePiece, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $knowledgePiece = KnowledgePiece::with('cheatsheets')->find($id);
        if (!$knowledgePiece) {
            return response()->json("Knowledge piece with id {$id} not found.", 404);
        }

        return response()->json($knowledgePiece, 200);
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
        $knowledgePiece = KnowledgePiece::find($id);
        if (!$knowledgePiece) {
            return response()->json("Knowledge piece with id {$id} not found.", 404);
        }

        $validator = Validator::make($request->all(), [
            'description' => 'string',
            'code'        => 'string',
            'cheatsheets' => 'array'
        ]);

        if ($validator->fails()) {
           return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->has('description')) {
            $knowledgePiece->description = $request->get('description');
        }

        if ($request->has('code')) {
            $knowledgePiece->code = $request->get('code');
        }

        if ($request->has('cheatsheets')) {
            $cheatsheets = $request->get('cheatsheets');

            foreach ($cheatsheets as $id) {
                $cheatsheet = Cheatsheet::find($id);
                if (!$cheatsheet) {
                    return response()->json("Cheatsheet with id {$id} not found.", 404);
                }
            }
            $knowledgePiece->cheatsheets()->sync($cheatsheets);
        }

        $knowledgePiece->saveOrFail();

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
        if (!KnowledgePiece::destroy($id)) {
            return response()->json("Knowledge piece with id {$id} not found.", 404);
        }

        return response()->json([], 204);
    }
}
