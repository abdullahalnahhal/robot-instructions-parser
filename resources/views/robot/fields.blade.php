<div class='row'>
    <div class="form-group col-12">
        <label for="exampleInputName1">{{ __('Instructions') }}</label>
        <input type="text" class="form-control" name="instructions" id="instructions" value='{{ old('instructions')??($instructions??null) }}' placeholder="{{ __('Instructions') }}" pattern='^(f|b|r|l)+$' required>
    </div>
    <div class="form-group col-12">
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            <i class="mdi mdi-account-settings"></i>
            {{ __('Parse') }}
        </button>
    </div>
</div>
