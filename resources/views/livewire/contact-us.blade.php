<div>

    {{-- @if (session('saved'))
    <div class="alert alert-success">
        {{ session('saved') }}
    </div>
    @endif --}}

    <form class="row g-3" wire:submit="store">

        <div class="col-md-6">
            <label for="category" class="form-label" required>Subject</label>

            <select class="form-select" id="category" wire:model="form.category">
                <option value="null" disabled>{{ __('Please select') }}</option>

                @foreach (App\Enums\ContactUsCategoryEnum::cases() as $item)
                <option value="{{$item->value}}">{{$item->getLabel()}}</option>
                @endforeach

            </select>
            <small class="text-danger">@error('form.category') {{ $message }} @enderror</small>

        </div>

        <div class="col-md-6">
            <label for="name" class="form-label" required>Name</label>
            <input type="text" class="form-control" id="name" wire:model="form.name">
            <small class="text-danger">@error('form.name') {{ $message }} @enderror</small>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label" required>Email</label>
            <input type="email" class="form-control" id="email" wire:model="form.email">
            <small class="text-danger">@error('form.email') {{ $message }} @enderror</small>
        </div>
        <div class="col-md-6">
            <label for="mobile" class="form-label">Phone Number</label>
            <input type="mobile" class="form-control" id="mobile" wire:model="form.mobile">
            <small class="text-danger">@error('form.mobile') {{ $message }} @enderror</small>
        </div>

        <div class="col-md-12">
            <label for="message" class="form-label" required>Message</label>
            <textarea class="form-control" id="message" rows="5" wire:model="form.message"></textarea>
            <small class="text-danger">@error('form.message') {{ $message }} @enderror</small>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">
                Submit

                <div wire:loading>
                    <div class="spinner-border text-dark spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>

            </button>
        </div>

    </form>

</div>
