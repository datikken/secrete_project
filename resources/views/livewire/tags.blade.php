<div class="uk-card uk-card-default uk-width-1-1" data-sticky-block>
    <h3 class="uk-card-title mb20">Popular tags</h3>

    @foreach($tags as $tag)
        <div class="uk-label uk-margin-small-bottom">
            <span uk-icon="hashtag"></span>
            <span>{{ $tag->name }}</span>
        </div>
    @endforeach
</div>
