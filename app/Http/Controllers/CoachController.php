<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use App\Coach;
use App\Resource;

class CoachController extends Controller
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

        $coaches = Coach::with('resource')->paginate($perPage);

        return response()->json($coaches, 200);
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
            'name'          => 'required|string|max:255|unique:coaches',
            'date_of_birth' => 'required|date',
            'email'         => 'required|email|unique:coaches',
            'resource_id'   => 'integer'
        ]);

        if ($validator->fails()) {
           return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $coach                = new Coach;
        $coach->name          = $request->get('name');
        $coach->date_of_birth = $request->get('date_of_birth');
        $coach->email         = $request->get('email');

        $resourceId = $request->get('resource_id');
        if ($resourceId) {
            $resource = Resource::find($resourceId);
            if (!$resource) {
                return response()->json('Associated resource not found.', 404);
            }

            $coach->resource()->associate($resource);
        }

        $coach->saveOrFail();

        return response()->json($coach, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coach = Coach::with('resource')->find($id);
        if (!$coach) {
            return response()->json('Coach not found.', 404);
        }

        return response()->json($coach, 200);
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
        $coach = Coach::find($id);
        if (!$coach) {
            return response()->json('Coach not found.', 404);
        }

        $validator = Validator::make($request->all(), [
            'name'          => ['string', 'max:255', Rule::unique('coaches')->ignore($id)],
            'date_of_birth' => 'date',
            'email'         => ['email', Rule::unique('coaches')->ignore($id)],
            'resource_id'   => 'integer'
        ]);

        if ($validator->fails()) {
           return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $name = $request->get('name');
        if ($name) {
            $coach->name = $name;
        }

        $dateOfBirth = $request->get('date_of_birth');
        if ($dateOfBirth) {
            $coach->date_of_birth = $dateOfBirth;
        }

        $email = $request->get('email');
        if ($email) {
            $coach->email = $email;
        }

        $resourceId = $request->get('resource_id');
        if ($resourceId) {
            $resource = Resource::find($resourceId);
            if (!$resource) {
                return response()->json('Associated resource not found.', 404);
            }

            $coach->resource()->associate($resource);
        }

        $coach->saveOrFail();

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
        if (!Coach::destroy($id)) {
            return response()->json('Coach not found.', 404);
        }

        return response()->json([], 204);
    }
}
