<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <style>
        table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    @extends('layout.main')
    @section('content')
    <div class="alert alert-success" role="alert">
        Registration done successfully!!!
      </div>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">first name</th>
            <th scope="col">Last name</th>
            <th scope="col">email</th>
            <th scope="col">contact</th>
            <th scope="col">Gender</th>
            <th scope="col">Hobbies</th>
            <th scope="col">Adderss</th>
            <th scope="col">Country</th>
            <th scope="col">Action</th>
            
          </tr>
        </thead>
        <tbody>
            @forelse($users as $us)
          <tr>
            {{--<th scope="row">{{$loop->iteration}}</th>--}}
            <td>{{$us->id}}</td>
            <td>{{$us->first_name}}</td>
           
            <td>{{$us->last_name}}</td>
            <td>{{$us->email}}</td>
            <td>{{$us->contact}}</td>
            <td>{{$us->gender}}</td>
            <td>{{$us->hobies}}</td>
            <td>{{$us->address}}</td>
            <td>{{$us->getcountry?->name}}</td>


            <td>
              <a class="btn btn-primary" href="{{route('crud.show',['crud'=>$us->id])}}">Show</a>
                <a class="btn btn-warning" href="{{route('crud.edit',['crud'=>$us->id])}}">Edit</a>
                
                <form method="POST" action="{{route('crud.destroy',['crud'=>$us->id])}}">
                  @csrf
                  @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Delete">
                </form>
            </td>
          </tr>   
        @empty         
        <tr>
        <td colspan="10">No items found</td>
        </tr>   
          
        @endforelse   
        </tbody>
      </table>
      {!! $users->links() !!}

    @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>