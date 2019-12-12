@form(['route' => $route, 'model' => 'article', 'id' => 'saveArticle', 'hasImage' => true])

    @includeWhen(Auth::user()->is_admin, 'partials.articles._authors_select_box')

    <!-- Title -->
    <div class="form-group">
        <label for="title">Title: @asterisks @endasterisks</label>
        <input type="text" name="title" id="title" class="form-control"
        placeholder="Article Title" value="{{ old('title', $article->title ?? null) }}">

        @isInvalid(['field' => 'title']) @endisInvalid
    </div>

    <!-- Excerpt -->
    <div class="form-group">
        <label for="excerpt">Excerpt: @asterisks @endasterisks</label>
        <textarea name="excerpt" id="excerpt" class="form-control" rows="2"
        placeholder="Article Excerpt">{{ old('excerpt', $article->excerpt ?? null) }}</textarea>

        @isInvalid(['field' => 'excerpt']) @endisInvalid
    </div>

    <!-- Body -->
    <div class="form-group">
        <label for="body">Body: @asterisks @endasterisks</label>
        <textarea name="body" id="body" class="form-control" rows="5"
        placeholder="Article Body">{{ old('body', $article->body ?? null) }}</textarea>

        @isInvalid(['field' => 'body']) @endisInvalid
    </div>

    <!-- Category -->
    <div class="form-group">
        <label for="category_id">Category: @asterisks @endasterisks</label>
        <select name="category_id" id="category_id" class="form-control">
            @if ($category = Request::route('category'))
                <option value="{{ $category->id }}" selected>
                    {{ ucfirst($category->name) }}
                </option>
            @else
                <option value="">Select a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ getSelected($category->id, Request::route('category')->id ?? old('category_id', $article->category_id ?? null)) }}
                    >
                        {{ ucfirst($category->name) }}
                    </option>
                @endforeach
            @endif
        </select>

        @isInvalid(['field' => 'category_id'])@endisInvalid
    </div>

    <!-- Tag -->
    <div class="form-group mb-3">
        <p class="mb-1">Tag:</p>
        @if ($request = Request::route('tag'))
            @checkbox(['name' => 'tag', 'model' => $tag])
            @endcheckbox
        @else
            @foreach ($tags as $tag)
                @checkbox(['name' => 'tag', 'model'=>$tag])
                    @if ($ids = old('tag_id', isset($article) ? $article->tags->pluck('id') : null))
                        @foreach ($ids as $tag_id)
                            {{ getChecked($tag->id, $tag_id) }}
                        @endforeach
                    @endif
                @endcheckbox
            @endforeach
        @endif

        @isInvalid(['field' => 'tag_id'])@endisInvalid
    </div>

    <!-- Image -->
    <div class="flex form-group mt-3">
        <div>
            <label for="image">Upload image</label>
            <input type="file" name="image" id="image"
            class="form-control-file">

            @isInvalid(['field' => 'image'])@endisInvalid
        </div>

        @if (isset($article) && $article->hasImage())
            <div class="w-1/4">
                <img src="{{ ArticleImage::getUrl($article->image) }}"
                alt="Article Image">
            </div>
        @endif
    </div>

    <!-- Approval -->
    <div class="form-group">
            <p class="mb-1">Approve publishing: @asterisks @endasterisks</p>

            @foreach ($approval_radio_inputs as $key => $value)
                @radio(['name' => $approval_radio_name, 'id' => Str::camel($value), 'value' => $value])
                    @slot('is_checked')
                        {{ getChecked($value, old('is_approved', $article->is_approved ?? null)) }}
                    @endslot
                    {{ $key }}
                @endradio
            @endforeach

        @isInvalid(['field' => 'is_approved'])@endisInvalid
    </div>

    <!-- Publish At -->
    <div class="form-group" id="hidePublishAt">
        <label for="publish_at">Publishing Date:</label>
        <input type="text" name="publish_at" id="publish_at"
        class="form-control" placeholder="yyyy-mm-dd"
        value="{{ old('publish_at') }}">

        @isInvalid(['field' => 'publish_at']) @endisInvalid
    </div>

@endform

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        clearErrorOnNewInput();

        $( "#publish_at" ).datepicker({
            firstDay: 1,
            dateFormat: "yy-mm-dd",
            minDate: 0,
            changeMonth: true,
            changeYear: true,
            beforeShowDay: function(date) {
                var year = date.getFullYear();
                var formattedDate = jQuery.datepicker.formatDate('yy-mm-dd', date);
                var holidays = getHolidays(year);

                if (isSunday(date) || isInArray(formattedDate, holidays)) {
                    return [true, "mark-holiday"];
                } else {
                    return [true];
                }
            }
        });

        var isApprovedRadioIds = @json($approval_radio_ids);
        var isApprovedRadio = @json($approval_radio_name);

        var article = @json($article = Request::route('article'));
        var publishDateExists = article && article.publish_at;
        var publishDate = publishDateExists ? article.publish_at_formatted : '';

        var isApproved = createById(isApprovedRadioIds[0]);
        var isNotApproved = createById(isApprovedRadioIds[1]);
        var hiddenElement = $('#hidePublishAt');
        var hiddenInput = $('#publish_at');
        var hiddenError = $('p.publish_at');

        clearErrorOnNewInput();

        if(isCheckedRadioValue(isApprovedRadio, isApproved.val()) && publishDateExists) {
            hiddenElement.show()
            hiddenInput.val(publishDate);
        }

        if(isCheckedRadioValue(isApprovedRadio, isNotApproved.val()) && isEmptyElement(hiddenError)) {
            hiddenElement.hide()
        }

        toggleHidden(isApprovedRadio, isApproved, hiddenInput, hiddenError, hiddenElement)

    </script>
@endsection

@section('links')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <style>
        td.mark-holiday a.ui-state-default { color: #f56565; }
    </style>
@endsection