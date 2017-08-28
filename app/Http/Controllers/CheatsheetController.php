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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage    = empty($request->query('per_page')) ? $this->perPage : $request->query('per_page');
        $fields     = empty($request->query('fields')) ? null : explode(',', $request->query('fields'));
        $filterId   = empty($request->query('filter_id')) ? null : explode(',', $request->query('filter_id'));
        $filterName = empty($request->query('filter_name')) ? null : urldecode($request->query('filter_name'));

        $qb = Cheatsheet::query();

        if ($filterId) {
            $qb = $qb->whereIn('id', $filterId);
        }

        if ($filterName) {
            $qb = $qb->where('name', 'like', '%' . $filterName . '%');
        }

        if ($fields) {
            $field = $this->validateFields(new Cheatsheet, $fields);
            if ($field) {
                return response()->json("Requested field '{$field}' does not exist.", 400);
            }

            $cheatsheets = $qb->paginate($perPage, $fields);
        } else {
            $cheatsheets = $qb->paginate($perPage);

            foreach ($cheatsheets as $cheatsheet) {
                $cheatsheet['knowledge_piece_ids'] = $cheatsheet->knowledgePieces()->pluck('id');
            }
        }

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
                $cheatsheet['knowledge_piece_ids'] = $knowledgePieces;
            }
        }

        return response()->json($cheatsheet, 201);
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

        $qb = Cheatsheet::query();

        if ($fields) {
            $field = $this->validateFields(new Cheatsheet, $fields);
            if ($field) {
                return response()->json("Requested field '{$field}' does not exist.", 400);
            }

            $cheatsheet = $qb->select($fields);
        } else {

        }

        $cheatsheet = $qb->find($id);

        if (!$cheatsheet) {
            return response()->json("Cheatsheet with id {$id} not found.", 404);
        }

        $cheatsheet['knowledge_piece_ids'] = $cheatsheet->knowledgePieces()->pluck('id');

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

    public function knowledgePieces(Request $request, $cheatsheetId, $knowledgePieceId = null) {
        $cheatsheet = Cheatsheet::find($cheatsheetId);
        if (!$cheatsheet) {
            return response()->json("Cheatsheet with id {$cheatsheetId} not found.", 404);
        }

        $perPage           = empty($request->query('per_page')) ? $this->perPage : $request->query('per_page');
        $fields            = empty($request->query('fields')) ? null : explode(',', $request->query('fields'));
        $filterId          = empty($request->query('filter_id')) ? null : explode(',', $request->query('filter_id'));
        $filterDescription = empty($request->query('filter_description')) ? null : urldecode($request->query('filter_description'));
        $filterCode        = empty($request->query('filter_code')) ? null : urldecode($request->query('filter_code'));

        if ($fields) {
            $field = $this->validateFields(new KnowledgePiece, $fields);
            if ($field) {
                return response()->json("Requested field '{$field}' does not exist.", 400);
            }
        }

        if ($knowledgePieceId) {
            if ($fields) {
                $knowledgePiece = KnowledgePiece::select($fields)->find($knowledgePieceId);
            } else {
                $knowledgePiece = KnowledgePiece::find($knowledgePieceId);
            }

            if (!$knowledgePiece) {
                return response()->json("Knowledge piece with id {$knowledgePieceId} not found.", 404);
            }

            return response()->json($knowledgePiece, 200);
        } else {
            $qb = $cheatsheet->knowledgePieces();

            if ($filterId) {
                $qb = $qb->whereIn('id', $filterId);
            }

            if ($filterDescription) {
                $qb = $qb->where('description', 'like', '%' . $filterDescription . '%');
            }

            if ($filterCode) {
                $qb = $qb->where('code', 'like', '%' . $filterCode . '%');
            }

            if ($fields) {
                $knowledgePieces = $qb->paginate($perPage, $fields);
            } else {
                $knowledgePieces = $qb->paginate($perPage);
            }

            return response()->json($knowledgePieces, 200);
        }
    }
}
