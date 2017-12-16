<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Cheatsheet;
use App\KnowledgePiece;
use App\Language;

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
        $orderBy           = $request->query('order_by');
        $orderDirection    = is_null($request->query('order_direction')) ? 'asc' : $request->query('order_direction');
        $filterId          = is_null($request->query('filter_id')) ? null : explode(',', $request->query('filter_id'));
        $filterDescription = is_null($request->query('filter_description')) ? null : urldecode($request->query('filter_description'));
        $filterCode        = is_null($request->query('filter_code')) ? null : urldecode($request->query('filter_code'));
        $filterLanguage    = is_null($request->query('filter_language')) ? null : $request->query('filter_language');

        $field = $this->setAndValidateFields($request->query('fields'), new KnowledgePiece, ['language']);
        if ($field) {
            return response()->json("Requested field '{$field}' does not exist.", 400);
        }

        $qb = KnowledgePiece::query();

        if (!is_null($orderBy)) {
            $qb = $qb->orderBy($orderBy, $orderDirection);
        }

        if ($filterId === '0' || $filterId) {
            $qb = $qb->whereIn('id', $filterId);
        }

        if ($filterDescription === '0' || $filterDescription) {
            $qb = $qb->where('description', 'like', '%' . $filterDescription . '%');
        }

        if ($filterCode === '0' || $filterCode) {
            $qb = $qb->where('code', 'like', '%' . $filterCode . '%');
        }

        if ($filterLanguage === '0' || $filterLanguage) {
            $qb = $qb->whereLanguageId($filterLanguage);
        }

        if ($this->fields) {
            if ($this->hasField('language')) {
                $fields = $this->removeField('language');
                $fields = $this->addField('language_id');
                $qb = $qb->with('language');
            }

            if ($perPage > 0) {
                $knowledgePieces = $qb->paginate($perPage, $this->fields);
            } else {
                $knowledgePieces = $qb->select($this->fields)->get();
            }
        } else {
            $qb = $qb->with('language');

            if ($perPage > 0) {
                $knowledgePieces = $qb->paginate($perPage);
            } else {
                $knowledgePieces = $qb->get();
            }

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
            'language'    => 'required|numeric',
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

        $languageId = $request->get('language');

        $language = Language::find($languageId);
        if (!$language) {
            return response()->json("Language with id {$languageId} not found.", 404);
        }
        $knowledgePiece->language()->associate($language);

        $knowledgePiece->saveOrFail();

        if ($request->has('cheatsheets')) {
            $cheatsheets = $request->get('cheatsheets');

            if ($cheatsheets) {
                foreach ($cheatsheets as $id => $position) {
                    $cheatsheet = Cheatsheet::find($id);
                    if (!$cheatsheet) {
                        KnowledgePiece::destroy($knowledgePiece->id);
                        return response()->json("Cheatsheet with id {$id} not found.", 404);
                    }
                }
                $knowledgePiece->cheatsheets()->attach($cheatsheets);
                $knowledgePiece['cheatsheet_ids'] = $cheatsheets;
                $knowledgePiece['pivot'] = ['position' => reset($cheatsheets)['position']];
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
        $field = $this->setAndValidateFields($request->query('fields'), new KnowledgePiece, ['language']);
        if ($field) {
            return response()->json("Requested field '{$field}' does not exist.", 400);
        }

        $qb = KnowledgePiece::query();

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

        $knowledgePiece = $qb->find($id);
        if (!$knowledgePiece) {
            return response()->json("Knowledge piece with id {$id} not found.", 404);
        }

        if (!$this->fields) {
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
            'language'    => 'numeric',
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

        if ($request->has('language')) {
            $languageId = $request->get('language');

            $language = Language::find($languageId);
            if (!$language) {
                return response()->json("Language with id {$languageId} not found.", 404);
            }
            $knowledgePiece->language()->associate($language);
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

        $perPage        = is_null($request->query('per_page')) ? $this->perPage : $request->query('per_page');
        $orderBy        = $request->query('order_by');
        $orderDirection = is_null($request->query('order_direction')) ? 'asc' : $request->query('order_direction');
        $filterId       = is_null($request->query('filter_id')) ? null : explode(',', $request->query('filter_id'));
        $filterName     = is_null($request->query('filter_name')) ? null : urldecode($request->query('filter_name'));
        $filterLanguage = is_null($request->query('filter_language')) ? null : $request->query('filter_language');

        $field = $this->setAndValidateFields($request->query('fields'), new Cheatsheet, ['language', 'position']);
        if ($field) {
            return response()->json("Requested field '{$field}' does not exist.", 400);
        }

        $qb = $knowledgePiece->cheatsheets();

        if ($cheatsheetId) {
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
            }

            $cheatsheet = $qb->find($cheatsheetId);
            if (!$cheatsheet) {
                return response()->json("Cheatsheet with id {$cheatsheetId} not found.", 404);
            }

            return response()->json($cheatsheet, 200);
        } else {
            if (!is_null($orderBy)) {
                $qb = $qb->orderBy('cheatsheets.' . $orderBy, $orderDirection);
            }

            if ($filterId === '0' || $filterId) {
                $qb = $qb->whereIn('id', $filterId);
            }

            if ($filterName === '0' || $filterName) {
                $qb = $qb->where('name', 'like', '%' . $filterName . '%');
            }

            if ($filterLanguage === '0' || $filterLanguage) {
                $qb = $qb->whereLanguageId($filterLanguage);
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

                $cheatsheets = $qb->paginate($perPage, $this->fields);
            } else {
                $qb = $qb->with('language');

                $cheatsheets = $qb->paginate($perPage);
            }

            return response()->json($cheatsheets, 200);
        }
    }
}
