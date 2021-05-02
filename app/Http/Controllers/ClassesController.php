<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    protected $classObj;
    public function __construct(Classes $classObj)
    {
        $this->classObj = $classObj;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $classObj = $this->classObj->all();
        return $classObj;
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
        $classObj   = new classes();
        $classStore = $classObj->create([
            'name'      =>$request->name,
            'description'      =>$request->description
        ]);
        if($classStore)
        {
            return 1;
        }else
        {
            return 0;
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    // edit function
    public function edit(Request $request) {
        $id = $request->id;
        return $this->classObj->find($id);
        return $classObj;
        // return view('inventory_Site.edit', compact('classObj', 'parent'));
    }
    // update function
    public function update(Request $request) {
        $id = $request->id;
        $classObj = $this->classObj->findOrFail($id);
        $this->validate($request, [
            'name'      => 'required|string|max:191'
        ]);

        // $employee_id = ($request->get('selected_employee')?$request->get('selected_employee')['id']:null);
        $data=[
            'name'              => $request->name,
            'description'       => $request->description,
          ];
        $classObj->update($data);
        return ['message' => 'Update Successfully'];

        // $id = $request->id;
        // $classObj = $this->classObj->find($id);

        // $request->validate([
        //     'name' => 'required|max:50|string,name,' . $id,

        // ]);

        // $temp_data = $this->classObj->find($id);

        // // DB::beginTransaction();
        // // try
        // // {
        // $data = [
        //     'name' => $request->name,
        //     'description' => $request->description,
        // ];
        // return $classObj->update($data);
        // // if ($x) {
        // //  return ["Md" => $this->classObj->get()];
        // // }
        // // zLog('inventory_sites','update',null,$temp_data,$classObj->id);
        // // DB::commit();
        // // }
        // // catch(Exception $e)
        // // {
        // //     DB::rollback();
        // // }
        // // return redirect()->route('admin.classObj.index')->with('message',__('menu.classObj').' '.__('message.CSuccess'));
        // // return Redirect()->route('classObj.index')->with('message',__('menu.classObj').' '.__('message.USuccess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        //
    }
}
