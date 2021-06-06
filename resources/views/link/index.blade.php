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
                <td><a href="//{{$item->href}}" target="_blank" class="link-success"> {{$item->name}}</a></td>
                <td style="text-align:end">
                  <a href="{{route('link.edit', $item)}}" class="btn btn-warning btn-sm">Edit</a>
                  <form action="{{route('link.destroy', $item)}}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit"
                        onclick="return confirm('Are you sure you want to delete this link?')">Delete</button>
                  </form>
                <td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection
