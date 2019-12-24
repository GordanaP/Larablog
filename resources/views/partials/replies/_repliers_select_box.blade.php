<div class="form-group">
    <label for="commenter_id">Commenter: @asterisks @endasterisks</label>
    <select name="commenter_id" id="commenter_id" class="form-control">
        <option value="">Select the replier</option>
        @foreach (\App\User::repliers($comment) as $replier)
            <option value="{{ $replier->id }}"
                {{ getSelected($replier->id, old('commenter_id')) }}
            >
                {{ $replier->email }}
            </option>
        @endforeach
    </select>

    @isInvalid(['field' => 'commenter_id']) @endisInvalid
</div>