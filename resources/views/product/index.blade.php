@extends('product.layout')

@section('content')
<div class="jumbotron container">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('products.create') }}" role="button">Create</a>
</div>
<div class="container">
    @if ($massage = Session::get('success'))
    <div class="alert alert-primary" role="alert">
        {{$massage}}
    </div>
    @endif
</div>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach ($product as $item)    
            <tr>
                <th scope="row">{{++$i}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>
                    <a href="{{route('products.edit', $item->id)}}">Edit</a>
                    <a href="{{route('products.show', $item->id)}}">Show</a>
                    <form action="{{route('products.destroy', $item->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $product->links() !!}
</div>
@endsection