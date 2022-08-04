@extends('layouts.master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Order</h2>
            </div><br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('chart.create') }}">Tambah Order baru</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div class="table-data">
    <table class="table table-striped table-hover">
        <tr>
            <th class="table-dark" >No</th>
            <th class="table-dark" >ID</th>
            <th class="table-dark" >Name</th>
            <th class="table-dark" >Category</th>
            <th class="table-dark" >qty</th>
            <th class="table-dark" >date</th>
            <th class="table-dark" >price</th>
            <th class="table-dark" >status</th>
        </tr>
        @foreach ($chart as $c)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $c->id }}</td>
            <td>{{ $c->name }}</td>
            <td>{{ $c->category }}</td>
            <td>{{ $c->qty }}</td>
            <td>{{ $c->date }}</td>
            <td>{{ $c->price }}</td>
            <td>{{ $c->status }}</td>
            <td>
            <form action="{{ route('chart.destroy', $c->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('chart.edit',$c->id) }}">edit</a>
    @csrf
    @method('DELETE')

    <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">hapus</button>
</form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
  
    {!! $chart->links() !!}
      
@endsection