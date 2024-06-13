@extends('layouts.app')


@section('title', 'Articles')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body bg-light">
            <h4>Articles</h4>
            <?php foreach($articles as $article) : ?>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Title : <?= $article->title ?>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="content">
                                <strong>Content : </strong> 
                                <?= $article->content ?>
                            </div>
                            <div class="author">
                                <strong>Author : </strong> 
                                <?= $article->author_id ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
            <div class="mb-3 list__submit">
                <a class="navbar-brand" href="{{ route('home') }}"><i class="fas fa-home fa-xl"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection