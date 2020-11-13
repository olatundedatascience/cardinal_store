@extends('layout.main')

@section('title', 'Shareholder list')


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
                        <p>There are {{ count($shareholders)}} shareholders at the moment</p>
                        </div>
                        <div class="bsc-tbl">
                            <table class="table table-sc-ex">
                                <thead>
                                    <tr>

                                        <th>Fullname</th>
                                        <th>EmailAddress</th>
                                        <th>Shares</th>
                                        <th>Unit</th>
                                        <th>username</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($shareholders as $item)
                                        <tr>
                                        <td>{{$item->fullname}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->numberOfShares}}</td>
                                        <td>{{$item->sharename}}</td>
                                        <td><a href="{{ route('shareholder_delete', ['id'=>$item->id])}}">DELETE</a></td>
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
