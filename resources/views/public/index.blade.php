@extends('layout')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">Group</th>
        <th scope="col">Name</th>
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
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection
