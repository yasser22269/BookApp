@extends('layouts.admin')
@section('title','Books index')
@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="breadcrumb-wrapper col-12">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Admin') }}">Admin</a>
            </li>
            {{--  <li class="breadcrumb-item"><a href="#">Tables</a>
            </li>  --}}
            <li class="breadcrumb-item active">Books index
            </li>
          </ol>
        </div>
      </div>
    </div>
    {{--  <div class="content-header-right col-md-6 col-12">
      <div class="btn-group float-md-right" >
        <a href="{{ route('Book.create') }}">
            <button class="btn btn-info round  box-shadow-2 px-2"type="button" > Add Book</button>
        </a>

      </div>
    </div>  --}}
  </div>

<div class="row" id="header-styling">
    <div class="col-12">
      <div class="card">

        <div class="card-content collapse show">
            <table class="table yajra-datatable mt-2" id="Books">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>publisher</th>
                    <th>children</th>
                    <th>Status</th>
                    <th>action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
{{--          <div class="table-responsive">--}}
{{--            <table class="table">--}}
{{--              <thead class="bg-success white">--}}
{{--                <tr>--}}
{{--                  <th> id</th>--}}
{{--                  <th>Name</th>--}}
{{--                  <th>publisher</th>--}}
{{--                   <th>children</th>--}}
{{--                    <th>Status</th>--}}
{{--                    <th>Edit</th>--}}
{{--                    <th>Delete</th>--}}
{{--                </tr>--}}
{{--              </thead>--}}
{{--              <tbody>--}}
{{--                  @foreach ($Books as $index => $Book)--}}
{{--                <tr>--}}
{{--                  <td>{{ ($index++)+1 }}</td>--}}
{{--                  <td>{{ $Book->name  }}</td>--}}
{{--                    <td>{{ $Book->publisher->name  }}</td>--}}
{{--                    <td>{{ $Book->children->count()  }}</td>--}}
{{--                    <td>{{ $Book->status  }}</td>--}}
{{--                    <td>--}}
{{--                        <a href="{{route('Books.changeStatus',$Book->id)}}" class="btn btn-primary btn-sm  round  box-shadow-2 px-1">--}}
{{--                            change Status--}}
{{--                        </a>--}}
{{--                    </td>--}}
{{--                  <td>--}}

{{--                      <form class="form" method="POST" action="{{ route('Books.destroy',$Book->id) }}">--}}
{{--                      @csrf--}}
{{--                      @method('DELETE')--}}
{{--                          <button class="btn btn-danger btn-sm  round  box-shadow-2 px-1"type="submit" ><i class="la la-remove la-sm"></i> DELETE </button>--}}
{{--                      </form>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                @endforeach--}}
{{--              </tbody>--}}
{{--            </table>--}}
{{--          </div>--}}
        </div>

      </div>
    </div>
  </div>
@endsection
@section('js')
    <script>
        $(document).ready( function () {

            var table = $('#Books').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ordering : true,
                ajax: "{{ route("Books.GetBooks") }}",
                columns: [
                    // {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'publisher', name: 'publisher'},
                    {data: 'children', name: 'children'},
                    {data: 'status', name: 'status'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    }
                ],
                dom: 'Bfrtip'
            });

        });
    </script>
@endsection
