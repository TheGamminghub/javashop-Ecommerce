@extends('front.layouts.master')

@section('content')

<div class="row">

    <div class="col-md-12" id="register">

        <div class="card col-md-8">
            <div class="card-body">
                <h2 class="card-title">Update User Details</h2>
                <hr>
                @if( $errors->any() )

                    <div class="alert alert-danger">
                    
                        <ul>
                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>



                @endif
                <form action="/user/register" method="post">

                @csrf
                    <div class="form-group">
                    {{ Form::label('name',' Name') }}
                    {{ Form::text('name',$user->name,['class'=>'form-control border-input','placeholder'=>'Enter Name']) }}
                        <label for="name">Name:</label>
                        <input type="text" name="name" placeholder="Name" id="name" class="form-control">
                    </div>


                    <div class="form-group">
                    {{ Form::label('name',' Name') }}
                    {{ Form::text('name',$user->address,['class'=>'form-control border-input','placeholder'=>'Enter Name']) }}
                        <label for="address">Address:</label>
                        <textarea name="address" placeholder="Address" id="address" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-outline-info col-md-2"> Update Details</button>
                    </div>

                </form>

            </div>
        </div>

    </div>

</div>

@endsection