@extends('layout.main')

@section('title', 'List Of Shares')


@section('content')

    @include('layout.navmenu')
	<!-- Breadcomb area End-->
    <!-- Normal Table area Start-->
    <div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list">
                        <div class="basic-tb-hd">
                            <h2>Share List</h2>
                        <p>There are {{ count($shares)}} shares at the moment</p>
                        </div>
                        <div class="bsc-tbl">
                            <table class="table table-sc-ex">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($shares as $item)
                                        <tr>
                                        <td>{{$item->name}}</td>
                                        <td><a href="{{ route('share_delete', ['id'=>$item->id])}}">DELETE</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection()
