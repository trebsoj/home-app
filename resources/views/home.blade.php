@extends('main')

@section('body')

<form action="{{route('link.insert')}}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="href" placeholder="Link">
    <button class="btn btn-primary btn-block" type="submit">Add</button>
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
        @foreach ($items as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{$item->href}}</td>
                <td>@mdo</td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection