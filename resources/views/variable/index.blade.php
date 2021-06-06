@extends('layout')


@section('content')


<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
    <h1 class="h2">Variables</h1>
</div>

<form action="{{route('variable.store')}}" method="POST" class="row g-3 needs-validation" novalidate>
    @csrf
    <div class="col-md-5">
      <input type="text" name="key" placeholder="Key" class="form-control" required>
      <div class="valid-feedback"></div>
    </div>
    <div class="col-md-5">
      <input type="text" name="value" placeholder="Value" class="form-control" required>
      <div class="valid-feedback"></div>
    </div>
    <div class="col-md-2" style="text-align:center">
        <button type="submit" class="btn btn-labeled btn-success px-3">
            <span class="btn-label"><i class="fa fa-plus"></i></span>
        </button>
  </div>
</form>

<table class="table">
    <thead>
      <tr>
        <th scope="col">Key</th>
        <th scope="col">Value</th>
        <th scope="col" style="text-align:end">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($variables as $item)
            <tr>
                <td>{{$item->key}}</td>
                <td>{{$item->value}}</td>
                <td style="text-align:end">
                    <a href="{{route('variable.edit', $item)}}" class="btn btn-warning btn-sm px-3">
                        <span class="btn-label"><i class="fa fa-pencil"></i></span>
                    </a>
                  <form action="{{route('variable.destroy', $item)}}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-labeled btn-danger px-3" onclick="return confirm('Are you sure you want to delete this variable?')">
                      <span class="btn-label"><i class="fa fa-trash"></i></span>
                    </button>
                  </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>

@endsection
