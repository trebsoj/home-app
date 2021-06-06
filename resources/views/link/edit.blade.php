@extends('layout')


@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit link</h1>
</div>


<form action="{{route('link.update', $link->id)}}" method="POST" class="row g-3 needs-validation" novalidate>
    @method('PUT')
    @csrf
    <div class="col-md-6">
        <label>Name</label>
        <input type="text" name="name" placeholder="Name" class="form-control" id="vLinkName" value="{{$link->name}}" required>
        <div class="valid-feedback"></div>
    </div>
    <div class="col-md-6">
        <label >Link</label>
      <input type="text" name="href" placeholder="Link" class="form-control" id="vLinkHref"value="{{$link->href}}" required>
      <div class="valid-feedback"></div>
    </div>
    <div class="col-6"style="text-align:end">
        <button type="submit" class="btn btn-labeled btn-success px-4">
          <span class="btn-label"><i class="fa fa-save"></i></span>
        </button>
    </div>
    <div class="col-6" >
        <a href="{{ URL::previous() }}" class="btn btn-danger btn-block px-4">
            <span class="btn-label"><i class="fa fa-times"></i></span>
        </a>
    </div>
</form>

@endsection
