@extends('layout')

@section('content')


<form action="{{route('link.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
    @csrf
    <div class="col-md-5">
      <input type="text" name="name" placeholder="Name" class="form-control" id="vLinkName" required>
      <div class="valid-feedback"></div>
    </div>
    <div class="col-md-5">
      <input type="text" name="href" placeholder="Link" class="form-control" id="vLinkHref" required>
      <div class="valid-feedback"></div>
    </div>
    <div class="col-md-1">
    <button class="btn btn-success btn-block" type="submit">Add</button>
  </div>
</form>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Link</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->href}}</td>
                <td>
                  <a href="{{route('link.edit', $item)}}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{route('link.destroy', $item)}}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                  </form>
                <td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection