@extends('layouts.master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Produk</h2>
            </div><br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('product.create') }}">Tambah Produk baru</a>
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
            <th class="table-dark" >Stock</th>
            <th class="table-dark" >Price</th>
            <th class="table-dark" >Category</th>
        </tr>
        @foreach ($product as $p)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $p->id }}</td>
            <td>{{ $p->name }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->price }}</td>
            <td>{{ $p->category }}</td>
            <td>
            <form action="{{ route('product.destroy', $c->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('product.edit',$c->id) }}">edit</a>
    @csrf
    @method('DELETE')

    <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">hapus</button>
</form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
  
    {!! $product->links() !!}
      
@endsection