@extends('layout')


@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-1 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{$group->name}}</h1>
</div>


<table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($links as $item)
            <tr>
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
