<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>{{ $title ?? 'Page Title' }}</title>

  @vite(['resources/sass/app.scss','resources/js/app.js'])

</head>

<body data-bs-theme="dark">

  <div class="container-fluid">

    <div class="row">
      <div class="col">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">{{config('app.name')}}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link {{request()->is('contact-us')?'active':''}}" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{request()->is('messages')?'active':''}}" href="/messages">Messages</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="row justify-content-md-center mt-5">
      <div class="col-lg-9 col-md-9 col-sm-9">
        <div class="card">
          <div class="card-header">
            {{ $title ?? '' }}
          </div>
          <div class="card-body">
            {{ $slot }}
          </div>
        </div>
      </div>
    </div>

  </div>

</body>

</html>

<script>
  document.addEventListener('livewire:init', () => {
        Livewire.on('success_alert', (event) => {
            const successMsg = event.message || 'Operation completed successfully!';
            toastr.success(successMsg)
        });

        Livewire.on('warning_alert', (event) => {
            const warnMsg = event.message || 'You are about to perform an irreversible action. Proceed with caution.';
            toastr.warning(warnMsg)
        });

        Livewire.on('error_alert', (event) => {
            const errMsg = event.message || 'Unable to process your request. Please try again later.';
            toastr.error(errMsg)
        });

    });

</script>