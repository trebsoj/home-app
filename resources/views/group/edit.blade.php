@extends('layout')


@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit group</h1>
</div>


<form action="{{route('group.update', $group->id)}}" method="POST" class="row g-3 needs-validation" novalidate>
    @method('PUT')
    @csrf
    <div class="col-md-5">
      <input type="text" name="name" placeholder="Name" class="form-control" id="vGroupName" value="{{$group->name}}" required>
      <div class="valid-feedback"></div>
    </div>
    <div class="col-md-1">
    <button class="btn btn-success btn-block" type="submit">Edit</button>
  </div>
</form>

@endsection
