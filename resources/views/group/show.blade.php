@extends('layout')


@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$group->name}}</h1>
    <div class="">
        <a  href="{{route('group.edit',$group)}}" class="btn btn-warning btn-sm px-3">
            <span class="btn-label"><i class="fa fa-pencil"></i></span>
        </a>
        <form action="{{route('group.destroy', $group)}}" method="POST" class="d-inline">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-labeled btn-danger btn-sm px-3" onclick="return confirm('Are you sure you want to delete this group?')">
              <span class="btn-label"><i class="fa fa-trash"></i></span>
          </button>
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
    <div class="col-md-2" style="text-align:center">
      <button type="submit" class="btn btn-labeled btn-success px-3">
        <span class="btn-label"><i class="fa fa-plus"></i></span>
      </button>
    </div>
</form>


<table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col" style="text-align:end">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($links as $item)
            <tr>
                <td><a href="//{{$item->href}}" class="link-success" target="_blank"> {{$item->name}}</a></td>
                <td style="text-align:end">
                  <a href="{{route('link.edit', $item)}}" class="btn btn-warning btn-sm px-3">
                      <span class="btn-label"><i class="fa fa-pencil"></i></span>
                  </a>
                  <form action="{{route('link.destroy', $item)}}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-sm btn-labeled btn-danger px-3" onclick="return confirm('Are you sure you want to delete this link?')">
                      <span class="btn-label"><i class="fa fa-trash"></i></span>
                    </button>
                  </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>




@endsection
