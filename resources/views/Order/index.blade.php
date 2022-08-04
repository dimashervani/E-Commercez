@extends('layouts.master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Order</h2>
            </div><br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('order.create') }}">Tambah Order baru</a>
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
        @foreach ($order as $o)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->category }}</td>
            <td>{{ $p->qty }}</td>
            <td>{{ $p->date }}</td>
            <td>{{ $p->price }}</td>
            <td>{{ $p->status }}</td>
            <td>
            <form action="{{ route('order.destroy', $o->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('order.edit',$o->id) }}">edit</a>
    @csrf
    @method('DELETE')

    <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">hapus</button>
</form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
  
    {!! $order->links() !!}
      
@endsection