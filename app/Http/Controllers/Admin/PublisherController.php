<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;
use App\Models\Publisher;
use Yajra\DataTables\Facades\DataTables;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Publishers = Publisher::with('books')->paginate(PAGINATION_COUNT);
        // translatedIn(app() -> getLocale())->
        // return Request::has('brands');
        return view('Admin.publishers.index', compact('Publishers'));
    }
    public function GetPublishers(){
        $data = Publisher::with('books')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function($row){
                return $row->name;
            })
            ->addColumn('books', function($row){
                return $row->books->count();
            })
            ->addColumn('action', function($row){
                $btn = '
                     <form class="form" method="POST" action="'. route('Publishers.destroy',$row->id) .'">
                     '. csrf_field()  .'
                     '. method_field('DELETE')  .'
                          <button class="btn btn-danger btn-sm  round  box-shadow-2 px-1"type="submit" ><i class="la la-remove la-sm"></i> DELETE </button>

                      </form>
                ';
                return $btn;
            })
            ->rawColumns(['action','books','name'])
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
    public function store(StorePublisherRequest $request)
    {
        $Publisher = Publisher::create($request->all());
        return response()->json($Publisher, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Publisher = Publisher::findOrFail($id);
        return view('Admin.publishers.show', compact('Publisher'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublisherRequest $request, $id)
    {
        $publisher = Publisher::findOrFail($id);
        $publisher->update($request->all());
        return redirect()->route('Publishers.index')->with(['success' => 'تم الحذف بنجاح']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {        $publisher = Publisher::find($id);
        if (!$publisher)
            return redirect()->route('Publishers.index')->with(['error' => 'هذا العضو غير موجود ']);

        $publisher->delete();
        return redirect()->route('Publishers.index')->with(['success' => 'تم الحذف بنجاح']);
    }
}
