@extends("layout")
@include("navbar")

<div class="container">
                <div class="row">
                    <div class="col-8 offset-2">
                        <h1 class="text-center">Login</h1>
                        @if ($errors->any())
                        <div class="text-red-500">
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                        <form action="/login" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" class="form-control" type="text"></input>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" class="form-control" type="password"></input>
                        </div>
                        <button class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>