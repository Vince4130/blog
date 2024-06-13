@extends('layouts.app')


@section('title', 'Articles')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body bg-light">
            <h4>Articles</h4>
            <?php foreach($articlesAuthors as $article) : ?>
            <div class="accordion p-2" id="accordion<?= $article->id ?>">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $article->id ?>" aria-expanded="false" aria-controls="collapse<?= $article->id ?>">
                            Title : <?= $article->title ?>
                        </button>
                    </h2>
                    <div id="collapse<?= $article->id ?>" class="accordion-collapse collapse" data-bs-parent="#accordion<?= $article->id ?>">
                        <div class="accordion-body">
                            <div class="content">
                                <strong>Content : </strong> 
                                <?= $article->content ?>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, magni unde dolorum odio vero aspernatur sint, cum, corrupti numquam voluptate id omnis incidunt illum excepturi? Quos corporis porro quo consequatur.
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem a vero eius eligendi provident odio animi adipisci vitae quo voluptates eum excepturi dolorum delectus, fugiat sequi sed? Voluptatibus, earum corporis.
                            </div>
                            <div class="author">
                                <strong>Author : </strong> 
                                <?= $article->firstname.' '.$article->lastname ?>
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