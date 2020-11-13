
@extends('layout.main')
@section('title', 'Create New Shares')

@section('content')
	<!-- Breadcomb area End-->
    <!-- Form Examples area start-->
    @include('layout.navmenu')
    <div class="form-example-area">
        <div class="container">
            <div class="row">

                @if(session('status'))
                <div class="alert alert-success">{{ session('status') ?? ''}}</div>
            @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') ?? ''}}</div>
                    @endif
                    @if($msg != null) 
                     
                        <div class="alert alert-success">{{ $msg ?? ''}}</div>
                     
                    @endif

            <form method="POST" action="{{ route('post_add_candidate') }}">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                        <h2>Add Candidate to {{$positions->name}}</h2>

                        </div>
                    <input type="hidden" name="position_name" value="{{$position_name}}" />
                    <input type="hidden" name="position_id" value="{{ $positions->id}}" />
                        @foreach ($shareholders as $holder )
                        <div class="form-example-int">
                            <div class="form-group">
                                
                                <div class="nk-int-st">
                                <input name="shareholder_id[]" value="{{$holder->id.':'.$holder->fullname}}" type="checkbox" class="form-control input-sm" placeholder="Enter share Name">
                                    {{ $holder->fullname}}
                                </div>
                               
                            </div>
                        </div>
                        @endforeach
                        


                        <div class="form-example-int mg-t-15">
                            <button class="btn btn-success notika-btn-success">Submit</button>
                        </div>
                    </div>
                </div>
                @csrf
                </form>
            </div>

        </div>
    </div>


@endsection()
