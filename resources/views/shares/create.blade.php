
@extends('layout.main')
@section('title', 'Create New Shares')

@section('content')
	<!-- Breadcomb area End-->
    <!-- Form Examples area start-->
    @include('layout.navmenu')
    <div class="form-example-area">
        <div class="container">
            <div class="row">

                <?php
                    if(!empty('msg')) {
                        ?>

                    <div class="alert alert-success">{{ $msg ?? ''}}</div>
                        <?php
                    }
                ?>

            <form method="POST" action="{{ route('new_share') }}">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Add New Shares</h2>

                        </div>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Name </label>
                                <div class="nk-int-st">
                                    <input name="share_name" type="text" class="form-control input-sm" placeholder="Enter share Name">
                                </div>
                                @error('share_name')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


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
