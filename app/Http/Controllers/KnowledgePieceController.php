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
        $perPage           = is_null($request->query('per_page')) ? $this->perPage : $request->query('per_page');
        $fields            = is_null($request->query('fields')) ? null : explode(',', $request->query('fields'));
        $filterId          = is_null($request->query('filter_id')) ? null : explode(',', $request->query('filter_id'));
        $filterDescription = is_null($request->query('filter_description')) ? null : urldecode($request->query('filter_description'));
        $filterCode        = is_null($request->query('filter_code')) ? null : urldecode($request->query('filter_code'));

        $qb = KnowledgePiece::query();

        if ($filterId === '0' || $filterId) {
            $qb = $qb->whereIn('id', $filterId);
        }

        if ($filterDescription === '0' || $filterDescription) {
            $qb = $qb->where('description', 'like', '%' . $filterDescription . '%');
        }

        if ($filterCode === '0' || $filterCode) {
            $qb = $qb->where('code', 'like', '%' . $filterCode . '%');
        }

        if ($fields) {
            $field = $this->validateFields(new KnowledgePiece, $fields);
            if ($field) {
                return response()->json("Requested field '{$field}' does not exist.", 400);
            }

            $knowledgePieces = $qb->paginate($perPage, $fields);
        } else {
            $knowledgePieces = $qb->paginate($perPage);

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
                $knowledgePiece['cheatsheet_ids'] = $cheatsheets;
            }
        }

        return response()->json($knowledgePiece, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $fields = empty($request->query('fields')) ? null : explode(',', $request->query('fields'));

        $qb = KnowledgePiece::query();

        if ($fields) {
            $field = $this->validateFields(new KnowledgePiece, $fields);
            if ($field) {
                return response()->json("Requested field '{$field}' does not exist.", 400);
            }

            $knowledgePiece = $qb->select($fields);
        } else {

        }

        $knowledgePiece = $qb->find($id);

        if (!$knowledgePiece) {
            return response()->json("Knowledge piece with id {$id} not found.", 404);
        }

        $knowledgePiece['cheatsheet_ids'] = $knowledgePiece->cheatsheets()->pluck('id');

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
     * @param  int                       $id
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
     * Display the specified associated resource or a listing of associated resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $knowledgePieceId
     * @param  int|null                  $cheatsheetId
     * @return \Illuminate\Http\Response
     */
    public function cheatsheets(Request $request, $knowledgePieceId, $cheatsheetId = null) {
        $knowledgePiece = KnowledgePiece::find($knowledgePieceId);
        if (!$knowledgePiece) {
            return response()->json("Knowledge piece with id {$knowledgePieceId} not found.", 404);
        }

        $perPage    = is_null($request->query('per_page')) ? $this->perPage : $request->query('per_page');
        $fields     = is_null($request->query('fields')) ? null : explode(',', $request->query('fields'));
        $filterId   = is_null($request->query('filter_id')) ? null : explode(',', $request->query('filter_id'));
        $filterName = is_null($request->query('filter_name')) ? null : urldecode($request->query('filter_name'));

        if ($fields) {
            $field = $this->validateFields(new Cheatsheet, $fields);
            if ($field) {
                return response()->json("Requested field '{$field}' does not exist.", 400);
            }
        }

        if ($cheatsheetId) {
            $qb = Cheatsheet::query();

            if ($fields) {
                $qb = $qb->select($fields);
            }

            $cheatsheet = $qb->find($cheatsheetId);

            if (!$cheatsheet) {
                return response()->json("Cheatsheet with id {$cheatsheetId} not found.", 404);
            }

            return response()->json($cheatsheet, 200);
        } else {
            $qb = $knowledgePiece->cheatsheets();

            if ($filterId === '0' || $filterId) {
                $qb = $qb->whereIn('id', $filterId);
            }

            if ($filterName === '0' || $filterName) {
                $qb = $qb->where('name', 'like', '%' . $filterName . '%');
            }

            if ($fields) {
                $cheatsheets = $qb->paginate($perPage, $fields);
            } else {
                $cheatsheets = $qb->paginate($perPage);
            }

            return response()->json($cheatsheets, 200);
        }
    }
}
