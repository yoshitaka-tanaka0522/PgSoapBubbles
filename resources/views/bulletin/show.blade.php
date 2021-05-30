@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('気軽にプログラム掲示板') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    showです。
                    <!--_id、account_name、title、question、、question_id、registered_date(created_at)、respondant_name、answer、answer_date、resolved、-->
                    <td>{{ $bulletin->language_type }}</td>
                    <td>{{ $bulletin->account_name }}</td>
                    <td>{{ $bulletin->title }}</td>
                    <td>{{ $bulletin->question }}</td>
                    <td>{{ $bulletin->question_id }}</td>
                    <td>{{ $bulletin->created_at }}</td>  
                    {{-- もしcontrollerでgenderをセットした場合は{{ $gender }}で取得できる。 --}}
                    <form method="GET" action="{{ route('bulletin.edit',['id' => $bulletin->id]) }}">
                        @csrf
                        <input class="btn btn-info" type="submit" value="編集する">
                    </form>
                    <form method="POST" action="{{ route('bulletin.destroy',['id' => $bulletin->id]) }}" id="delete_{{ $bulletin->id }}">
                    @csrf
                    <a href="#" class="btn btn-danger" data-id="{{ $bulletin->id }}" onclick="deletePost(this);">削除する</a>
                    </form>
                </div>


                <div class="row">
                    @foreach($comments as $comment)
                    <div class="offset-md-5 col-md-5">
                        <p class="h3">{{$comment->content}}</p>
                        <label>{{$comment->created_at}}</label>
                    </div>
                    @endforeach
                </div>
    
                @auth
                <div class="row">
                    <div class="offset-md-5 col-md-5">
                        <form method="POST" action="/{{ $bulletin->id }}/comments">
                            {{ csrf_field() }}
                            <textarea name="content" class="form-control m-2"></textarea>
                            <button type="submit" class="btn samazon-submit-button ml-2">レビューを追加</button>
                        </form>
                    </div>
                </div>
                @endauth                
            </div>
        </div>
    </div>
</div>
<script>
    function deletePost(elem) {
        'use strict';
        if(confirm('本当に削除しても良いですか？')) {
            document.getElementById('delete_'+elem.dataset.id).submit();
        }
    }
</script>
@endsection

