@extends('layout')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">Group</th>
        <th scope="col">Name</th>
        <th scope="col" style="text-align:end">Actions</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($items as $item)
            <tr>
                <td><a href="{{route('group.show', $item->group)}}" class="link-secondary"> {{$item->group->name}}</a></td>
                @if(str_contains($item->href, 'http'))
                    <td><a href="{{$item->href}}" class="link-success" target="_blank">{{$item->name}}</a></td>
                @else
                    <td><a href="\\{{$item->href}}" class="link-success" target="_blank">{{$item->name}}</a></td>
                @endif
                <td style="text-align:end">
                    <i class="fas @if($item->public) fa-globe @else fa-lock @endif"></i>
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
