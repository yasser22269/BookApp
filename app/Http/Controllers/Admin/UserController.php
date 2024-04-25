<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::with('children')->paginate(PAGINATION_COUNT);
        return view('Admin.users.index', compact('Users'));
    }

    public function GetUsers(){
        $data = User::with('children')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('name', function($row){
                return $row->name;
            })
            ->addColumn('email', function($row){
                return $row->email;
            })
            ->addColumn('Children', function($row){
                return $row->Children->count();
            })
            ->addColumn('action', function($row){
                $btn = '
                    <div style="display: flex;justify-content: flex-start;">
                       <a href="'.route('Users.show',$row->id).'" class="btn mr-1 btn-primary btn-sm  round  box-shadow-2 px-1">
                                show
                            </a>
                     <form class="form" method="POST" action="'. route('Users.destroy',$row->id) .'">
                     '. csrf_field()  .'
                     '. method_field('DELETE')  .'
                          <button class="btn btn-danger btn-sm  round  box-shadow-2 px-1"type="submit" >
                            DELETE
                          </button>

                      </form>
                    </div>
                ';
                return $btn;
            })
            ->rawColumns(['email','action','Children','name'])
            ->make(true);
    }


    public function show($id)
    {
        $user = User::with('children')->findOrFail($id);
        return view('Admin.users.show', compact('user'));

    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    // Example method to get children of a user
    public function getChildren($userId)
    {
        $user = User::findOrFail($userId);
        $children = $user->children;
        return response()->json($children);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return new UserResource($user);
    }
    public function destroy($id)
    {
        $Brand = User::find($id);
        if (!$Brand)
            return redirect()->route('Users.index')->with(['error' => 'هذا العضو غير موجود ']);

        $Brand->delete();
        return redirect()->route('Users.index')->with(['success' => 'تم الحذف بنجاح']);
    }
}
