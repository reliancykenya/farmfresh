<x-admin-master>
    @section('content')

    @if(session('delMsg'))

    <div class="alert alert-danger">
        {{session('delMsg')}}
    </div>
    @elseif(session('updateMsg'))
    <div class="alert alert-danger">
        {{session('updateMsg')}}
    </div>

    @endif


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Blod id</th>
                            <th>Blog Name</th>
                            <th>Blog Creator</th>
                            <th>Blog Desc</th>

                            <th>Update</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Blod id</th>
                            <th>Blog Name</th>
                            <th>Blog Creator</th>
                            <th>Blog Desc</th>

                            <th>Update</th>
                            <th>Delete</th>

                        </tr>
                    </tfoot>

                    @foreach($blogs as $blog)

                    <tbody>
                        <tr>
                            <td>{{$blog->id}}</td>
                            <td>{{$blog->name}}</td>
                            <td>{{$blog->user->name}}</td>
                            <td>{{$blog->description}}</td>
                            <td>
                                
                                <button class="btn btn-success">


                                    <a href="{{route('blog.edit',$blog)}}">Update</a>



                                </button>
                               

                            </td>
                            <td>
                            @can('delete',$blog)
                                <form action="{{route('blog.destroy',$blog)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">
                                        Delete
                                    </button>


                                </form>
                                @endcan
                            </td>

                        </tr>
                    </tbody>

                    @endforeach

                </table>
            </div>
        </div>
    </div>
    {{$blogs->links()}}


    @endsection
</x-admin-master>