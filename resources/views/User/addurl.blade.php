@extends("layout")
@include("navbar")

<div class="container">
                <div class="row">
                    <div class="col-8 offset-2">
                        <h1 class="text-center">Add URL</h1>
                        @if ($errors->any())
                        <div class="text-red-500">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                        <form action="/addurl" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <input name="title" class="form-control" type="text"></input>
                        </div>
                        <div class="form-group">
                            <label>URL</label>
                            <input name="originalurl" class="form-control" type="text"></input>
                        </div>
                        <button class="btn btn-primary">Add URL</button>
                        </form>
                    </div>
                </div>
            </div>