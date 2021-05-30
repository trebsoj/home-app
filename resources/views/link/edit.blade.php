@extends('layout') 


@section('content')

<h1>Edit</h1>


<form action="{{route('link.update', $link->id)}}" method="POST" class="row g-3 needs-validation" novalidate>
    @method('PUT')
    @csrf
    <div class="col-md-5">
      <input type="text" name="name" placeholder="Name" class="form-control" id="vLinkName" value="{{$link->name}}" required>
      <div class="valid-feedback"></div>
    </div>
    <div class="col-md-5">
      <input type="text" name="href" placeholder="Link" class="form-control" id="vLinkHref"value="{{$link->href}}" required>
      <div class="valid-feedback"></div>
    </div>
    <div class="col-md-1">
    <button class="btn btn-success btn-block" type="submit">Edit</button>
  </div>
</form>

@endsection