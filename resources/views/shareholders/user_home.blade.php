@extends('layout.main')

@section('content')
    <!-- End Header Top Area -->
    <!-- Mobile Menu start -->
    
    <!-- Mobile Menu end -->
    <!-- Main Menu area start-->
    @include('layout.user_navmenu')
    <!-- Main Menu area End-->
    <!-- Start Status area -->
    <div class="notika-status-area">
       
    </div>
    <!-- End Status area-->
    <!-- Start Sale Statistic area-->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                    <div class="sale-statistic-inner notika-shadow mg-tb-30">
                        <div class="curved-inner-pro">
                            @if(session('status'))
                            <div class="alert alert-success">{{ session('status') ?? ''}}</div>
                        @endif
                                @if(session('error'))
                                    <div class="alert alert-danger">{{ session('error') ?? ''}}</div>
                                @endif
                                
                            <div class="curved-ctn">
                                <h2>Voting Credentials</h2>
                            <h1>I can vote {{$user->numberOfShares}} number of time per items </h1>
                            </div>
                        </div>
                        <div>
                            @if($canVote == false) 
                                {{ 'You are not authorized to vote at the moment'}}
                            @endif

                            <form method="POST" action="{{ route('cast_vote') }}">
                            <input type="hidden" name="current_user_id" value="{{$user->id}}" />
                            <input type="hidden" name="number_of_shares_rem" value="{{$user->numberOfShares}}" />
                                <table class="table table-bordered">
                                    <tr>
                                        <th>POST</th><th>Candidate</th>
                                        <th>Action</th>
                                    </tr>
                                    <tbody>
                            @foreach ($positions as $position)
                                <tr>
                                    <td>
                                        <h3>{{$position->position_name}}</h3>
                                    </td>
                                    <td>
                                        <h3>{{$position->shareholder_name}}</h3>
                                    </td>
                                    <td>
                                    <input type="checkbox" name="selected_vote[]" value="{{$position->positions_id.':'.$position->shareholder_id}}" />

                                    </td>
                                </tr>
                             

                            @endforeach
                                    </tbody>
                        </table>
                        <input type="submit" value="Cast Vote" class="btn btn-primary" />
                        @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                    <div class="statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0">
                        <div class="past-day-statis">
                            <h2>Profile</h2>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Fullname</td><td>{{$user->fullname}}</td>
                                </tr>
                                <tr>
                                    <td>Email Address</td><td>{{$user->fullname}}</td>
                                </tr>
                                <tr>
                                    <td>My Share</td><td>{{$user->sharename}}</td>
                                </tr>
                                <tr>
                                    <td>My Share Unit</td><td>{{$user->numberOfShares}}</td>
                                </tr>
                            </table>
                        </div>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
    


@endsection()

