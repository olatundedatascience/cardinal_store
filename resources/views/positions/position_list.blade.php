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
                        <p>There are {{ count($positions)}} shares at the moment</p>
                        </div>
                        <div class="bsc-tbl">
                            <table class="table table-sc-ex">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($positions as $item)
                                        <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>@if ($item->status == 1)
                                            {{'open'}}
                                           @else
                                            {{'close'}}
                                            @endif
                                        </td>
                                        <td><a href="{{ route('share_delete', ['id'=>$item->id])}}">View Candidates</a></td>
                                        <td><a href="{{ route('open_position', ['id'=>$item->id])}}">Open</a></td>
                                        <td><a href="{{ route('close_position', ['id'=>$item->id])}}">Close</a></td>
                                        <td><a href="{{ route('select_voters', ['id'=>$item->id])}}">Select Eligible Voter</a></td>
                                        @if ($item->status == 1)
                                            <td>
                                                <a href="{{ route('add_candidate', ['id'=>$item->id])}}">Add Candiate</a>
                                            </td>
                                        @else
                                            {{ 'This position has been close by admin'}}
                                        @endif
                                        
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
