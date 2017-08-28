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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = empty($request->query('per_page')) ? 15 : $request->query('per_page');
        $fields  = empty($request->query('fields')) ? null : explode(',', $request->query('fields'));

        if ($fields) {
            $field = $this->validateFields($fields);
            if ($field) {
                return response()->json("Requested field '{$field}' does not exist.", 400);
            }

            if (in_array('cheatsheets', $fields)) {
                unset($fields[array_search('cheatsheets', $fields)]);
                $knowledgePieces = KnowledgePiece::with('cheatsheets')->paginate($perPage, $fields);
            } else {
                $knowledgePieces = KnowledgePiece::paginate($perPage, $fields);
            }
        } else {
            $knowledgePieces = KnowledgePiece::paginate($perPage);
            foreach ($knowledgePieces as $knowledgePiece) {
                $knowledgePiece['cheatsheet_ids'] = $knowledgePiece->cheatsheets()->pluck('id');
            }
        }

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
                $knowledgePiece['cheatsheets'] = $cheatsheets;
            }
        }

        return response()->json($knowledgePiece, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $fields = empty($request->query('fields')) ? null : explode(',', $request->query('fields'));

        if ($fields) {
            $field = $this->validateFields($fields);
            if ($field) {
                return response()->json("Requested field '{$field}' does not exist.", 400);
            }

            if (in_array('cheatsheets', $fields)) {
                unset($fields[array_search('cheatsheets', $fields)]);
                $knowledgePiece = KnowledgePiece::select($fields)->with('cheatsheets')->find($id);
            } else {
                $knowledgePiece = KnowledgePiece::select($fields)->find($id);
            }

            if (!$knowledgePiece) {
                return response()->json("Knowledge piece with id {$id} not found.", 404);
            }
        } else {
            $knowledgePiece = KnowledgePiece::find($id);
            if (!$knowledgePiece) {
                return response()->json("Knowledge piece with id {$id} not found.", 404);
            }
            $knowledgePiece['cheatsheet_ids'] = $knowledgePiece->cheatsheets()->pluck('id');
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

    /**
     * Verify that requested fields actually exist on the model.
     *
     * @param  array $fields
     * @return string|void
    **/
    private function validateFields($fields)
    {
        $columns = array_merge((new KnowledgePiece)->getFillable(), ['id', 'created_at', 'updated_at', 'cheatsheets']);
        foreach ($fields as $field) {
            if (!in_array($field, $columns)) {
                return $field;
            }
        }
    }
}
