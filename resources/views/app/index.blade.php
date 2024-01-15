@extends('layouts.app')

{{-- @section('title', 'To-do app') --}}

@section('content')
    <div class="col-sm-12 col-md-8 offset-md-2">
        <div class="container">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="tasks-active" role="tabpanel">
                    <div class="row">
                        @if (session()->has('status'))
                            <div class="col-sm-12 col-lg-12 offset-lg-3">
                                <div class="alert @if (session('status')['success']) alert-success @else alert-danger @endif">
                                    {{ session('status')['message'] }}
                                </div>
                            </div>
                        @endif
                        @forelse ($allArticles as $article)
                            <div class="col-sm-12 col-lg-12">
                                <div class="card text-bg-light mb-3">
                                    {{-- start --}}
                                    <div class="d-flex w-100 card-header justify-content-between mb-6">
                                        {{ $article->updated_at->format('Y-m-d') }}<br />
                                        {{ $article->updated_at->format('H:i') }}
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $article->title }}</h5>
                                        @if ($article->content)
                                            <p class="card-text">{{ $article->content }}</p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-sm-12">
                                <p>Oops! It seems like we're running low on articles right now.</p>
                                <p>No worries, though! You can be the hero and add the first one.</p>
                                <p>Click the magic button below to share your wisdom with the world!</p>
                                <a href="#" class="btn btn-primary">Create an Article</a>
                                {{-- {{ route('create.article') }} --}}
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
