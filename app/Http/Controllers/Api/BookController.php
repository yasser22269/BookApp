<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\Child;
use App\Models\ChildBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Books = Book::with('children','publisher')->get();
        if(!$Books)
            return  errorResponse('Not Found');

        return jsonResponse(['data'=>$Books],200);

    }

    public function show($id)
    {
        $Book = Book::find($id);
        if(!$Book)
            return  errorResponse('Not Found');

        return jsonResponse(['data'=>$Book],200);

    }

    public function MyBooks()
    {
        $Books = auth()->user()->books()->where(function ($q){
            $q->where('books.status',1);
        })->get();
        if(!$Books)
            return  errorResponse('Not Found');

        return jsonResponse(['data'=>$Books],200);

    }

    public function UploadBook(Request $request)
    {
        try {
            DB::beginTransaction();
            $publisher_id = auth()->user()->id;
            $request->file->store('/', 'FileBook');
            $filename = $request->file->hashName();
            $Book = Book::create([
                "name"=>$request->name,
                "publisher_id"=> $publisher_id,
                "file"=>$filename,
                "status"=> 0,
            ]);

            DB::commit();
            return jsonResponse(['data'=>$Book ],201);

        } catch (\Exception $ex) {
            DB::rollback();
            return errorResponse($ex);

        }
    }

    public function AddBook(Request $request)
    {
        try {
            DB::beginTransaction();
            $ChildBook = ChildBook::UpdateOrcreate([
                'book_id' => $request->id , 'status' => 1,
                'child_id' => auth()->user()->id
            ]);
            DB::commit();
            return jsonResponse([$ChildBook],200);

        } catch (\Exception $ex) {
            DB::rollback();
            return errorResponse($ex);

        }
    }

    public function ShowBooksForUser($id)
    {
            $Child =Child::find($id);
            if($Child && $Child->books)
                return jsonResponse([$Child->books],200);
            else
                return errorResponse();


    }



}
