@extends('layout.main')

    <div class="login-content">
        
                      
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <form method="POST" action="{{ route('post_login') }}"> 
            <div class="nk-form">
                @if(session('status'))
                <div class="alert alert-danger">{{ session('status') ?? ''}}</div>
            @endif
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') ?? ''}}</div>
                @endif
                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        
                        <input name="username" type="text" class="form-control" placeholder="Username">
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                </div>
                <div class="fm-checkbox">
                    <label><input type="checkbox" class="i-checks"> <i></i> Keep me signed in</label>
                </div>
                <a href="#l-register" data-ma-action="nk-login-switch" data-ma-block="#l-register" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></a>
            </div>

        
            <div class="nk-navigation nk-lg-ic">
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
            </div>
            @csrf
       </form>
        </div>
 
       
    </div>
    