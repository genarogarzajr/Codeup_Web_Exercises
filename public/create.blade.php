@extends('layouts.master')

@section('contents')
    <h1>Hello, {{$name}}!</h1>


  <form method="POST" action="{{{ action('PostsController@store') }}}">
    <p>
        <label for="title">New Todo item</label>
        <input id="title" name="title" type="text">
        <label for="body">New Todo item</label>
        <input id="body" name="body" type="text">

    </p>
    
    <p>
        <input type="submit">
    </p>
</form>
@stop