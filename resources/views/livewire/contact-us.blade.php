<div>
    <form class="row g-3" wire:submit="store">

        <div class="col-md-6">
            <label for="category" class="form-label" required>@lang('general.subject')</label>

            <select class="form-select" id="category" wire:model="form.category">
                <option value="null" disabled>{{ __('Please select') }}</option>

                @foreach (App\Enums\ContactUsCategoryEnum::cases() as $item)
                <option value="{{$item->value}}">{{$item->getLabel()}}</option>
                @endforeach

            </select>
            <small class="text-danger">@error('form.category') {{ $message }} @enderror</small>

        </div>

        <div class="col-md-6">
            <label for="name" class="form-label" >@lang('general.name')</label>
            <input type="text" class="form-control" id="name" wire:model="form.name" required>
            <small class="text-danger">@error('form.name') {{ $message }} @enderror</small>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">@lang('general.email')</label>
            <input type="email" class="form-control" id="email" wire:model="form.email" required>
            <small class="text-danger">@error('form.email') {{ $message }} @enderror</small>
        </div>
        <div class="col-md-6">
            <label for="mobile" class="form-label">@lang('general.phone_number')</label>
            <input type="mobile" class="form-control" id="mobile" wire:model="form.mobile">
            <small class="text-danger">@error('form.mobile') {{ $message }} @enderror</small>
        </div>

        <div class="col-md-12">
            <label for="message" class="form-label">@lang('general.message')</label>
            <textarea class="form-control" id="message" rows="5" wire:model="form.message" required></textarea>
            <small class="text-danger">@error('form.message') {{ $message }} @enderror</small>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">
                @lang('general.submit')

                <div wire:loading>
                    <div class="spinner-border text-dark spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

            </button>
        </div>

    </form>

</div>