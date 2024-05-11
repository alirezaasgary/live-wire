<div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_{{$message->id}}">
        @lang('general.edit')
    </button>

    <div class="modal fade" id="modal_{{$message->id}}" tabindex="-1" aria-labelledby="modal_{{$message->id}}_Label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_{{$message->id}}_Label">@lang('general.edit_message')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form class="row g-3" wire:submit="update" style="text-align: left !important">

                        <div class="col-md-6">
                            <label for="status" class="form-label">@lang('general.status')</label>

                            <select class="form-select" id="status" wire:model="form.status">
                                @foreach (App\Enums\ContactUsStatusEnum::cases() as $item)
                                <option value="{{$item->value}}">{{$item->getLabel()}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="category" class="form-label">@lang('general.subject')</label>

                            <select class="form-select" id="category" wire:model="form.category" readonly disabled>
                                @foreach (App\Enums\ContactUsCategoryEnum::cases() as $item)
                                <option value="{{$item->value}}">{{$item->getLabel()}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="name" class="form-label">@lang('general.name')</label>
                            <input type="text" class="form-control" id="name" wire:model="form.name" readonly disabled>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">@lang('general.email')</label>
                            <input type="email" class="form-control" id="email" wire:model="form.email" readonly
                                disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">@lang('general.phone_number')</label>
                            <input type="mobile" class="form-control" id="mobile" wire:model="form.mobile" readonly
                                disabled>
                        </div>

                        <div class="col-md-12">
                            <label for="message" class="form-label">@lang('general.message')</label>
                            <textarea class="form-control" id="message" rows="5" wire:model="form.message" readonly
                                disabled>></textarea>
                        </div>

                        @if ($message->media->count())
                        <div class="col-md-12">
                            <label for="media" class="form-label">@lang('general.media')</label>
                            <ul class="list-group">
                                @foreach ($message->media as $media)
                                <li class="list-group-item text-success d-flex justify-content-between">
                                    {{$media->path}}
                                        <img src="{{$media->path}}" class="rounded" width='40' height='40'>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif


                        <div class="col-md-12" style="text-align: right !important">
                            <button type="submit" class="btn btn-primary">
                                @lang('general.edit')

                                <div wire:loading>
                                    <div class="spinner-border text-dark spinner-border-sm" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </button>
                        </div>


                    </form>

                </div>

            </div>
        </div>
    </div>

</div>