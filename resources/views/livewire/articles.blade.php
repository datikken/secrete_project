<h2 class="uk-heading uk-margin">
    Articles
</h2>

@foreach($articles as $article)
   @include('components.article.article_listItem', ['article' => $article])
@endforeach
