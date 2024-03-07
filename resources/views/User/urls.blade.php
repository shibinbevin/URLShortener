@extends('layout')

@include('navbar')

<div class="container">
    <div class="row">
        <div class="col">
           <h1>URLS</h1>
           @foreach($urls as $url) 
           <div class="card mb-4">
           <div class="card-body"> 
                <h4 class='card-title'>
                {{$url->title}}
                </h4>
                <h4 class='card-title'>
                    <a href="http://localhost:8000/{{$url->shortenedurl}}">http://localhost:8000/{{$url->shortenedurl}}</a>
                </h4>
                <h5 class='card-title'>
                    {{$url->originalurl}}
                </h5> 
                <a class="btn btn-success float-left mr-2" href="/editurl/{{$url->id}}">Edit</a>
                <form method="POST" action="/delete/{{$url->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger float-left" type="submit">Delete</button>
                </form>
                </div>
            </div>
            @endforeach   
        </div>
    </div>
</div>