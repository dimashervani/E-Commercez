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
            <th class="table-dark" >Username</th>
            <th class="table-dark" >Email</th>
            <th class="table-dark" >Password</th>
            <th class="table-dark" >Acktion</th>
        </tr>
        @foreach ($user as $u)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $u->id }}</td>
            <td>{{ $u->username }}</td>
            <td>{{ $u->email }}</td>
            <td>{{ $u->password }}</td>
            <td>
            <form action="{{ route('user.destroy', $u->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <button class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">hapus</button>
</form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
  
    {!! $user->links() !!}
      
@endsection