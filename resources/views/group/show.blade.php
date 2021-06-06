@extends('layout')


@section('content')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$group->name}}</h1>
    <div class="">
        <a href="{{route('group.edit',$group)}}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{route('group.destroy', $group)}}" method="POST" class="d-inline">
          @method('DELETE')
          @csrf
          <button class="btn btn-danger btn-sm" type="submit">Delete</button>
        </form>
    </div>
</div>


<form action="{{route('link.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
    @csrf
    <input type="hidden" name="id_group" value="{{$group->id}}">
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
        @foreach ($links as $item)
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
