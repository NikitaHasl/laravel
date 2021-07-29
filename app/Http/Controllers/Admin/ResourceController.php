<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsUpdate;
use App\Http\Requests\ResourceStore;
use App\Models\Resource;
use Exception;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::all();
        return view('admin.resource.index', [
            'resourceList' => $resources
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.resource.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceStore $request)
    {
        try {
            $res = Resource::create($request->validated());
            if ($res) {
                return redirect()->route('admin.resource.index')->with('success', trans('message.admin.resource.created.success'));
            }
        } catch (Exception $e) {
            return back()->with('error', trans('message.admin.resource.created.fail'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
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
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdate $request)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Resource $res
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Resource $resource)
    {
        if ($request->ajax()) {
            try {
                $resource->delete();
            } catch (Exception $e) {
                report($e);
            }
        }
    }
}
