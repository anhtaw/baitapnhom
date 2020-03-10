@extends('layout.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Đỗ Quang Đức</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>

            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if (Auth::check())
    <p >
      <?php echo 'chào mừng : '.$user = Auth::user()-> name; ?>
  </p>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Ảnh</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->detail }}</td>
                <td> <img src="{{asset('img/'.$product->img)}}"  style="width: 50px; height: auto"  /> </td>
                < <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('products.show',$product ->id)}}">Show</a>
                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <form action="{{ route('logout')}}" method="POST">
        @csrf
        @method('Get')
        <button  class="pull-right btn btn-primary" style="margin-top: 3px;" type="submit" name="submit">thoát </button>
    </form>

@endsection
