<div>


    @if (session('updated'))
    <div class="alert alert-success">
        {{ session('updated') }}
    </div>
    @endif

    <div class="row">

        <div class="col">
            <label for="status" class="form-label">@lang('general.status')</label>
            <select class="form-select" id="status" wire:model.live="status">
                <option value="">@lang('general.all')</option>
                @foreach (App\Enums\ContactUsStatusEnum::cases() as $item)
                <option value="{{$item->value}}">{{$item->getLabel()}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="category" class="form-label">@lang('general.subject')</label>
            <select class="form-select" id="category" wire:model.live="category">
                <option value="">@lang('general.all')</option>
                @foreach (App\Enums\ContactUsCategoryEnum::cases() as $item)
                <option value="{{$item->value}}">{{$item->getLabel()}}</option>
                @endforeach
            </select>
        </div>

    </div>

    <hr>

    <div class="col-12">

        <table class="table">
            <thead class="text-center">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('general.author')</th>
                    <th scope="col">@lang('general.email')</th>
                    <th scope="col">@lang('general.message')</th>
                    <th scope="col">@lang('general.media_count')</th>
                    <th scope="col">@lang('general.subject')</th>
                    <th scope="col">@lang('general.status')</th>
                    <th scope="col">@lang('general.date')</th>
                    <th scope="col">@lang('general.action')</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($messages as $message)
                <tr wire:key="{{$message->id}}">
                    <th scope="row">{{$message->id}}</th>
                    <td>{{$message->name}}</td>
                    <td>{{$message->email}}</td>
                    <td>{{\Illuminate\Support\Str::limit($message->message,20)}}</td>
                    <td>{{$message->media_count}}</td>
                    <td>{{$message->category->getLabel()}}</td>
                    <td class="{{$message->status->getColor()}}">{{$message->status->getLabel()}}</td>
                    <td>{{$message->created_at}}</td>
                    <td>

                        <livewire:edit-message-modal :message="$message->id" wire:key="{{$message->id}}" />

                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>

        {{ $messages->links() }}

    </div>


</div>