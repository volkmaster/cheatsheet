<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;

use App\Cheatsheet;
use App\KnowledgePiece;
use App\Language;

class CheatsheetController extends Controller
{
    public function __construct()
    {
        // user has to be logged for all functionalities except specific ones
        //$this->middleware('auth')->except(['index', 'show', 'knowledgePieces']);
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage        = is_null($request->query('per_page')) ? $this->perPage : $request->query('per_page');
        $orderBy        = $request->query('order_by');
        $orderDirection = is_null($request->query('order_direction')) ? 'asc' : $request->query('order_direction');
        //$filterId       = is_null($request->query('filter_id')) ? null : explode(',', $request->query('filter_id'));
        //$filterName     = is_null($request->query('filter_name')) ? null : urldecode($request->query('filter_name'));
        //$filterLanguage = is_null($request->query('filter_language')) ? null : $request->query('filter_language');
        $filterName     = is_null($request->query('filter_query')) ? null : $request->query('filter_query');
        $userId         = is_null($request->query('user_id')) ? null : $request->query('user_id');

        $field = $this->setAndValidateFields($request->query('fields'), new Cheatsheet, ['language']);
        if ($field) {
            return response()->json("Requested field '{$field}' does not exist.", 400);
        }

        $qb = Cheatsheet::query();

        if (!is_null($orderBy)) {
            $qb = $qb->orderBy($orderBy, $orderDirection);
        }

        /*
        if ($filterId === '0' || $filterId) {
            $qb = $qb->whereIn('id', $filterId);
        }
        */
        if ($filterName === '0' || $filterName) {
            $qb = $qb->where('name', 'like', '%' . $filterName . '%');
        }
        /*
        if ($filterLanguage === '0' || $filterLanguage) {
            $qb = $qb->whereLanguageId($filterLanguage);
        }
        */

        if ($userId === '0' || $userId) {
            $qb = $qb->where('user_id', '=', $userId);
        }

        if ($this->fields) {
            if ($this->hasField('language')) {
                $fields = $this->removeField('language');
                $fields = $this->addField('language_id');
                $qb = $qb->with('language');
            }

            if ($perPage > 0) {
                $cheatsheets = $qb->paginate($perPage, $this->fields);
            } else {
                $cheatsheets = $qb->select($this->fields)->get();
            }
        } else {
            $qb = $qb->with('language');

            if ($perPage > 0) {
                $cheatsheets = $qb->paginate($perPage);
            } else {
                $cheatsheets = $qb->get();
            }

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
            'language'         => 'required|numeric',
            'knowledge_pieces' => 'array'
        ]);

        if ($validator->fails()) {
           return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $cheatsheet = new Cheatsheet;

        $cheatsheet->name = $request->get('name');
        
        $cheatsheet->user_id = auth()->user()->id;
        
        $languageId = $request->get('language');

        $language = Language::find($languageId);
        if (!$language) {
            return response()->json("Language with id {$languageId} not found.", 404);
        }
        $cheatsheet->language()->associate($language);

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
                $cheatsheet['pivot'] = ['position' => reset($knowledgePieces)['position']];
            }
        }

        return response()->json($cheatsheet, 201);
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
        $field = $this->setAndValidateFields($request->query('fields'), new Cheatsheet, ['language']);
        if ($field) {
            return response()->json("Requested field '{$field}' does not exist.", 400);
        }

        $qb = Cheatsheet::query();

        if ($this->fields) {
            if ($this->hasField('language')) {
                $fields = $this->removeField('language');
                $fields = $this->addField('language_id');
                $qb = $qb->with('language');
            }

            $qb = $qb->select($this->fields);
        } else {
            $qb = $qb->with('language');
        }

        $cheatsheet = $qb->find($id);
        if (!$cheatsheet) {
            return response()->json("Cheatsheet with id {$id} not found.", 404);
        }

        if (!$this->fields) {
            $cheatsheet['knowledge_piece_ids'] = $cheatsheet->knowledgePieces()->pluck('id');
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
     * @param  int                       $id
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
            'language'         => 'numeric',
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

        if ($request->has('language')) {
            $languageId = $request->get('language');

            $language = Language::find($languageId);
            if (!$language) {
                return response()->json("Language with id {$languageId} not found.", 404);
            }
            $cheatsheet->language()->associate($language);
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

    /**
     * Display the specified associated resource or a listing of associated resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int                       $cheatsheetId
     * @param  int|null                  $knowledgePieceId
     * @return \Illuminate\Http\Response
     */
    public function knowledgePieces(Request $request, $cheatsheetId, $knowledgePieceId = null) {
        $cheatsheet = Cheatsheet::find($cheatsheetId);
        if (!$cheatsheet) {
            return response()->json("Cheatsheet with id {$cheatsheetId} not found.", 404);
        }

        $perPage           = is_null($request->query('per_page')) ? $this->perPage : $request->query('per_page');
        $orderBy           = $request->query('order_by');
        $orderDirection    = is_null($request->query('order_direction')) ? 'asc' : $request->query('order_direction');
        $filterQuery       = is_null($request->query('filter_query')) ? null : $request->query('filter_query');

        $field = $this->setAndValidateFields($request->query('fields'), new KnowledgePiece, ['language', 'position']);
        if ($field) {
            return response()->json("Requested field '{$field}' does not exist.", 400);
        }

        $qb = $cheatsheet->knowledgePieces();

        if ($knowledgePieceId) {
            if ($this->fields) {
                if ($this->hasField('language')) {
                    $fields = $this->removeField('language');
                    $fields = $this->addField('language_id');
                    $qb = $qb->with('language');
                }

                if ($this->hasField('position')) {
                    $fields = $this->removeField('position');
                    $qb = $qb->withPivot('position');
                }

                $qb = $qb->select($this->fields);
            } else {
                $qb = $qb->with('language');
                $qb = $qb->withPivot('position');
            }

            $knowledgePiece = $qb->find($knowledgePieceId);
            if (!$knowledgePiece) {
                return response()->json("Knowledge piece with id {$knowledgePieceId} not found.", 404);
            }

            return response()->json($knowledgePiece, 200);
        } else {
            if (!is_null($orderBy)) {
                $qb = $qb->orderBy('knowledge_pieces.' . $orderBy, $orderDirection);
            }

            if ($filterQuery) {
                $filterWords = explode(" ", $filterQuery);
                foreach ($filterWords as $filterWord) {
                    $qb = $qb->where(function ($query) use ($filterWord){
                        $query->where('description', 'LIKE', '%'.$filterWord.'%')
                              ->orWhere('code', 'LIKE', '%'.$filterWord.'%');
                        }
                    );
                }
            }

            if ($this->fields) {
                if ($this->hasField('language')) {
                    $fields = $this->removeField('language');
                    $fields = $this->addField('language_id');
                    $qb = $qb->with('language');
                }

                if ($this->hasField('position')) {
                    $fields = $this->removeField('position');
                    $qb = $qb->withPivot('position');
                }

                $knowledgePieces = $qb->paginate($perPage, $this->fields);
            } else {
                $qb = $qb->with('language');
                $qb = $qb->withPivot('position');

                $knowledgePieces = $qb->paginate($perPage);
            }

            return response()->json($knowledgePieces, 200);
        }
    }
}
