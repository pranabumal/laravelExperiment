@extends('layouts.app')

@section('content')
    <div class="container">
        @if($user)
        <div class="row">
            <div class="col-md-4">
                <h3>
                    <span  style="color: #1f648b">
                        {{ $user->name }}
                    </span>
                    <span>
                        @if(auth()->user()->isNotUser($user))
                            @if(auth()->user()->isFollowing($user))
                                <a href="{{ route('user.unfollow', $user) }}" class="btn btn-xs btn-danger">No Follow</a>
                            @else
                                <a href="{{ route('user.follow', $user) }}" class="btn btn-xs btn-success">Follow</a>
                            @endif
                        @endif
                    </span>
                </h3>
            </div>
        </div>
        @else
        <div class="row">
            @foreach($users as $user)
                <div class="col-md-3 table-bordered" style="margin-bottom: 10px;">
                    <h3>
                        <span style="color: #1f648b">{{ $user->name }}</span>
                        <span class="pull-right">
                            @if(auth()->user()->isFollowing($user))
                                <a href="{{ route('user.unfollow', $user) }}" class="btn btn-xs btn-danger">No Follow</a>
                            @else
                                <a href="{{ route('user.follow', $user) }}" class="btn btn-xs btn-success">Follow</a>
                            @endif
                        </span>
                    </h3>
                </div>
                <div class="col-md-1">

                </div>
            @endforeach
        </div>
        @endif
    </div>
@endsection