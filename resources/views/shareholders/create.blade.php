
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

            <form method="POST" action="{{ route('shareholder_create_post') }}">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap">
                        <div class="cmp-tb-hd">
                            <h2>Add New ShareHolder</h2>

                        </div>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Full Name </label>
                                <div class="nk-int-st">
                                    <input name="fullname" type="text" class="form-control input-sm" placeholder="Enter share Name">
                                </div>
                                @error('fullname')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Email Address </label>
                                <div class="nk-int-st">
                                    <input name="email" type="text" class="form-control input-sm" placeholder="Enter share Name">
                                </div>
                                @error('email')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>username </label>
                                <div class="nk-int-st">
                                    <input name="username" type="text" class="form-control input-sm" placeholder="Enter share Name">
                                </div>
                                @error('username')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Password`</label>
                                <div class="nk-int-st">
                                    <input name="password" type="password" class="form-control input-sm" placeholder="Enter share Name">
                                </div>
                                @error('password')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-example-int">
                            <div class="form-group">
                                <label>Select Shares</label>
                                <div class="nk-int-st">
                                    <select id="share_name" name="share_name" class="form-control">
                                        <option selected>Please select a value</option>
                                        @foreach ($shares as $item)
                                    <option value="{{ $item }}">{{$item}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('share_name')
                                    <span style="color:red">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <script>
                            window.onload = function() {
                                let share_name = document.getElementById("share_name")

                                share_name.onchange = function(e) {
                                    let value = e.currentTarget.value

                                    if(value != '') {
                                        document.getElementById("share_unit").style.display = "block";
                                    }
                                }
                            }
                        </script>
                        <div id="share_unit" class="form-example-int" style="display: none">
                            <div class="form-group">
                                <label>Share Unit</label>
                                <div class="nk-int-st">
                                    <input name="share_unit" type="text" class="form-control input-sm" placeholder="Enter share Name">
                                </div>
                                @error('share_unit')
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
