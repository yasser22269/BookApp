<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Books = Book::with('children','publisher')->paginate(PAGINATION_COUNT);
        return view('Admin.Books.index', compact('Books'));
    }
    public function GetBooks(){
        $data = Book::with('children','publisher')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function($row){
                return $row->name;
            })
            ->addColumn('publisher', function($row){
                return $row->publisher->name;
            })
            ->addColumn('children', function($row){
                return $row->children->count();
            })
            ->addColumn('status', function($row){
                return $row->status;
            })
            ->addColumn('action', function($row){
                $btn = '
                    <div style="display: flex;justify-content: flex-start;">
                        <a href="'.route('Books.changeStatus',$row->id).'" class="btn mr-1 btn-primary btn-sm  round  box-shadow-2 px-1">
                                change Status
                            </a>
                         <form class="form" method="POST" action="'. route('Books.destroy',$row->id) .'">
                         '. csrf_field()  .'
                         '. method_field('DELETE')  .'
                              <button class="btn btn-danger btn-sm  round  box-shadow-2 px-1"type="submit" >
                              DELETE </button>

                          </form>
                      </div>
                ';
                return $btn;
            })
            ->rawColumns(['status','action','publisher','children','name'])
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
    public function store(StoreBookRequest $request)
    {
        $Book = Book::create($request->all());
        return response()->json($Book, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $Book = Book::findOrFail($id);
        return view('Admin.Books.show', compact('Book'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $Book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $Book = Book::findOrFail($id);
        $Book->update($request->all());
        return redirect()->route('Books.index')->with(['success' => 'تم التحديث بنجاح']);

    }

    public function changeStatus($id)
    {
        $Book = Book::findOrFail($id);

        if($Book->status == 'غير مفعل')
            $newStatus = 1;
        else
            $newStatus = 0;


        $Book->update(['status' => $newStatus]);
        return redirect()->route('Books.index')->with(['success' => 'تم التحديث بنجاح']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {        $Book = Book::find($id);
        if (!$Book)
            return redirect()->route('Books.index')->with(['error' => 'هذا العضو غير موجود ']);

        $Book->delete();
        return redirect()->route('Books.index')->with(['success' => 'تم الحذف بنجاح']);
    }
}
