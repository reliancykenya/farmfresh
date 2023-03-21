<x-admin-master>
    @section('content')
    <h1>show crops</h1>
    @if(session('delMsg'))
    <div class="alert alert-danger">
        {{session('delMsg')}}
    </div>
    @elseif(session('updateMsg'))
    <div class="alert alert-success">
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
                            <th>Crop id</th>
                            <th>Name</th>
                            <th>Farmer's name</th>
                            <th>Duration</th>
                            <th>Acerage</th>
                            <th>Farmers note</th>
                            <th>update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Crop id</th>
                            <th>Name</th>
                            <th>Farmer's name</th>
                            <th>Duration</th>
                            <th>Acerage</th>
                            <th>Farmers note</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    @foreach($crops as $crop)
                    <tbody>
                        <tr>
                            <td>{{$crop->id}}</td>
                            <td>{{$crop->name}}</td>
                            <td>{{$crop->user->name}}</td>
                            <td>{{$crop->duration}}</td>
                            <td>{{$crop->acerage}}</td>
                            <td>{{Str::Limit($crop->note,20,'...')}}</td>
                            <td>
                               
                                <button class="btn btn-success" type="submit">
                                    <a href="{{route('crop.edit',$crop->id)}}">Update</a>
                                </button>
                             
                            </td>
                            <td>
                                <form action="{{route('crop.destroy',$crop->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-success" type="submit">Delete</button>
                                </form>

                            </td>

                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <div>
        {{$crops->links()}}
    </div>
    @endsection

</x-admin-master>