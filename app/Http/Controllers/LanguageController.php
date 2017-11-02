<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Language;

class LanguageController extends Controller
{
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
        $fields         = is_null($request->query('fields')) ? null : explode(',', $request->query('fields'));
        $filterId       = is_null($request->query('filter_id')) ? null : explode(',', $request->query('filter_id'));
        $filterName     = is_null($request->query('filter_name')) ? null : urldecode($request->query('filter_name'));

        $qb = Language::query();

        if (!is_null($orderBy)) {
            $qb = $qb->orderBy($orderBy, $orderDirection);
        }

        if ($filterId === '0' || $filterId) {
            $qb = $qb->whereIn('id', $filterId);
        }

        if ($filterName === '0' || $filterName) {
            $qb = $qb->where('name', 'like', '%' . $filterName . '%');
        }

        if ($fields) {
            $field = $this->validateFields(new Language, $fields);
            if ($field) {
                return response()->json("Requested field '{$field}' does not exist.", 400);
            }

            $languages = $qb->paginate($perPage, $fields);
        } else {
            $languages = $qb->paginate($perPage);
        }

        return response()->json($languages, 200);
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
            'name' => 'required|string|unique:languages'
        ]);

        if ($validator->fails()) {
           return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $language = new Language;

        $language->name = $request->get('name');

        $language->saveOrFail();

        return response()->json($language, 201);
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
        $fields = is_null($request->query('fields')) ? null : explode(',', $request->query('fields'));

        $qb = Language::query();

        if ($fields) {
            $field = $this->validateFields(new Cheatsheet, $fields);
            if ($field) {
                return response()->json("Requested field '{$field}' does not exist.", 400);
            }

            $qb = $qb->select($fields);
        }

        $language = $qb->find($id);
        if (!$language) {
            return response()->json("Language with id {$id} not found.", 404);
        }

        return response()->json($language, 200);
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
        $language = Language::find($id);
        if (!$language) {
            return response()->json("Language with id {$id} not found.", 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'numeric'
        ]);

        if ($validator->fails()) {
           return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        if ($request->has('name')) {
            $cheatsheet->name = $request->get('name');
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
        if (!Language::destroy($id)) {
            return response()->json("Language with id {$id} not found.", 404);
        }

        return response()->json([], 204);
    }
}
