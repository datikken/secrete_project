<div class="article_listItem uk-padding uk-flex uk-width-1-1 uk-shadow bg-white uk-margin">
    <div class="article_listItem_user">
        <img
            src="https://res.cloudinary.com/practicaldev/image/fetch/s--WJa-rH3e--/c_fill,f_auto,fl_progressive,h_90,q_auto,w_90/https://dev-to-uploads.s3.amazonaws.com/uploads/user/profile_image/571015/8c0b97cd-666f-46ef-b81f-a17373a495b8.png"
            alt=""
            class="article_listItem_user_avatar uk-comment-avatar">
    </div>

    <div class="article_listItem_info">
        <div class="uk-article-meta article_listItem_userInfo uk-flex uk-flex-column">
            <span>{{ $article->user->name }}</span>
            <span>{{ $article->created_at->translatedFormat('F j')  }}</span>
        </div>
        <h2 class="uk-heading mt0">{{ $article->name }}</h2>
        @if(count($article->tags) > 0)
            <div class="article_listItem_tags uk-margin uk-flex uk-flex-wrap">
                @foreach($article->tags as $tag)
                    <div class="article_listItem_tag uk-label uk-margin-small-bottom">
                        <span uk-icon="hashtag"></span>
                        {{ $tag->name }}
                    </div>
                @endforeach
            </div>
        @endif
        <div class="uk-grid-small uk-child-width-auto" uk-grid>
            <div>
                <a class="uk-button uk-text-muted uk-button-text mr15" href="#">
                    <span class="mr5" uk-icon="comments"></span>
                    <span class="uk-text-capitalize">5 Comments</span>
                </a>
            </div>

            <div>
                <a class="uk-button uk-text-muted uk-button-text mr15" href="#">
                    <span class="mr5" uk-icon="more"></span>
                    <span class="uk-text-capitalize">Read more</span>
                </a>
            </div>
        </div>
    </div>
</div>
