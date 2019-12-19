<div class="form-group">
    <label for="message">Guest name: @asterisks @endasterisks</label>
    <input type="text" class="form-control" name="guest_name"
    placeholder="Enter name"
    value="{{ old('guest_name', $comment->guest_name ?? null) }}"/>

    @isInvalid(['field' => 'guest_name']) @endisInvalid
</div>

<div class="form-group">
    <label for="message">Guest email: @asterisks @endasterisks</label>
    <input type="text" class="form-control" name="guest_email"
    placeholder="Enter email"
    value="{{ old('guest_name', $comment->guest_email ?? null) }}" />

    @isInvalid(['field' => 'guest_email']) @endisInvalid
</div>