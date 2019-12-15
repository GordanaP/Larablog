<div class="mt-2 mb-3">
    <p class="text-xs">
        Status:
        <span class="font-semibold tracking-wide" style="color: {{ ArticleStatus::color() }}">
            {{ ArticleStatus::name() }}
        </span>
    </p>

    @if ($article->publish_at)
        <p class="text-xs">
            Publishing Date:
            <span class="font-semibold">
                {{ $article->publish_at_from_DB }}
            </span>
        </p>
    @endif
</div>