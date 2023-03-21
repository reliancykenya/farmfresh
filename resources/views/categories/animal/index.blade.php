<x-admin-master>
    @section('content')
    @if(session('delMsg'))
    <div class="alert alert-danger">
        {{session('delMsg')}} 
    </div>
    @elseif(session('updateMsg'))
    <div class="alert alert-warning">
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
                            <th>Animal id</th>
                            <th>Animal Name</th>
                            <th>Number</th>
                            <th>note</th>

                            <th>update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Animal id</th>
                            <th>Animal Name</th>
                            <th>Number</th>
                            <th>note</th>

                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>

                    @foreach($animals as $animal)

                    <tbody>
                        <tr>
                            <td>{{$animal->id}}</td>
                            <td>{{$animal->name}}</td>
                            <td>{{$animal->number}}</td>
                            <td>{{Str::Limit($animal->note,20,'...')}}</td>
                            
                            <td>
                            
                                <button class="btn btn-success">
                                    <a href="{{route('animal.edit',$animal->id)}}">update</a>
                                </button>

                           
                            
                            </td>
                         
                            <td>
                                <form action="{{route('animal.destroy',$animal->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btb btn-danger" type="submit">delete</button>


                                </form>
                            </td>


                        </tr>
                    </tbody>

                    @endforeach

                </table>
            </div>
        </div>
    </div>


    @endsection
</x-admin-master>