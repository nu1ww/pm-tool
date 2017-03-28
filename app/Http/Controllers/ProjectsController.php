<?php

namespace App\Http\Controllers;

use App\Project;
use App\Transformes\ProjectTransformer;
use Illuminate\Http\Request;

class ProjectsController extends ApiController
{


    protected $projectTransformer;

    public function __construct(ProjectTransformer $projectTransformer)
    {
        $this->projectTransformer=$projectTransformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Project::all();

        return $this->respond(['data'=>$this->projectTransformer->transformCollection($data->toArray())]);
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

        if(!request('name') or !request('created_date')){
            return $this->setStatusCode(422)
                ->respondWithError('Para validation failed');
        }

       $data= Project::create([
           'name' => request('name'),
           'created_date' => request('created_date'),
           'description' => request('description'),
           'user' => request('user'),
           'deadline' => request('deadline')
       ]);

        return $this->setStatusCode(201)->respond([
            'message'=> 'Project Sucsessfully created'
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        if (!$project) {
            return  $this->responseNotFound('Project does not exist');
        }
        return response()->json([
            'data' => $this->projectTransformer->transform($project)
            //'data' => $this->transform($lesson->toArray())
        ], 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
