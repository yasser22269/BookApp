<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChildRequest;
use App\Http\Requests\UpdateChildRequest;
use App\Models\Child;
use Yajra\DataTables\Facades\DataTables;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Children = Child::with('user')->paginate(PAGINATION_COUNT);
        return view('Admin.Children.index', compact('Children'));
    }

    public function GetChildren(){
        $data = Child::with('user')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function($row){
                return $row->name;
            })
            ->addColumn('age', function($row){
                return $row->age;
            })
            ->addColumn('parent', function($row){
                return $row->user->name;
            })
            ->addColumn('action', function($row){
                $btn = '
                     <form class="form" method="POST" action="'. route('Children.destroy',$row->id) .'">
                     '. csrf_field()  .'
                     '. method_field('DELETE')  .'
                          <button class="btn btn-danger btn-sm  round  box-shadow-2 px-1"type="submit" ><i class="la la-remove la-sm"></i> DELETE </button>

                      </form>
                ';
                return $btn;
            })
            ->rawColumns(['email','action','Children','name'])
            ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChildRequest $request)
    {
        $Child = Child::create($request->all());
        return response()->json($Child, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Child = Child::findOrFail($id);
        return view('Admin.Children.show', compact('Child'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Child $Child)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChildRequest $request, $id)
    {
        $Child = Child::findOrFail($id);
        $Child->update($request->all());
        return redirect()->route('Children.index')->with(['success' => 'تم الحذف بنجاح']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $Child = Child::find($id);
        if (!$Child)
            return redirect()->route('Children.index')->with(['error' => 'هذا العضو غير موجود ']);

        $Child->delete();
        return redirect()->route('Children.index')->with(['success' => 'تم الحذف بنجاح']);
    }
}
