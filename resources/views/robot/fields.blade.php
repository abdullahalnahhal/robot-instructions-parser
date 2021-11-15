<div class="form-group">
    <label for="exampleInputName1">{{ __('Instructions') }}</label>
    <input type="text" class="form-control" name="instructions" id="instructions" placeholder="{{ __('Instructions') }}" pattern='^(f|b|r|l)+$' required>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">
    <i class="mdi mdi-account-settings"></i>
    {{ __('Parse') }}
</button>
