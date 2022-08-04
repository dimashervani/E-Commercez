@extends('layouts.master')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Category</h2>
            </div><br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('category.create') }}">Tambah Category baru</a>
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
            <th class="table-dark" >Category Product</th>
            <th class="table-dark" >Aksi</th>
        </tr>
        @foreach ($category as $c)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $c->id }}</td>
            <td>{{ $c->category_product }}</td>
            <td>
            <form action="{{ route('category.destroy', $c->id) }}" method="POST">
            <a class="btn btn-primary" href="{{ route('category.edit',$c->id) }}">edit</a>
    @csrf
    @method('DELETE')

    <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">hapus</button>
</form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
  
    {!! $category->links() !!}
      
@endsection