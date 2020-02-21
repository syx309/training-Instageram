@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row pl-5">
        <div class="co1-3 p-5 ">
            <img src="{{ $user->profile->profileImage() }}" 
                height ="150px" width="150px" class="img-fluid img-thumbnail rounded-circle">
        </div>
        <div class="col-9 pl-5 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex pb-2 align-items-center">
                    <div class="h4 ">{{ $user->username }}</div>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update',$user->profile)
                    <a href="/posts/create">add new post</a>
                @endcan
            </div>

            @can('update',$user->profile)
                <a href="/profile/{{$user->id}}/edit">edit profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                <div class="pr-5"><strong>{{$user->profile->followers->count()}}</strong> followers</div>
                <div class="pr-5"><strong>{{$user->following->count()}}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{$user->profile->description}}</div>
            <div class="pb-4"><a href="#">{{$user->profile->url ?? 'N/A'}}</a></div>
        </div>
    </div>


    <div class="container">
        <div class="row pt-5 justify-content-right">
            @foreach($user->posts as $post)

            <div class="col-4 pb-4">
                <a href="/posts/{{$post->id}}">
                <img src="/storage/{{ $post->image }}" class="w-100" style="max-width : 300px;">
                </a>
            </div>
            
            @endforeach

        </div>
    </div>
</div>
@endsection
