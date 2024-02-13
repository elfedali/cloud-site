 @if (session('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>
             {{ __('label.success') }}
         </strong> {{ session('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
 @endif

 @if (session('error'))
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>
             {{ __('label.error') }}
         </strong> {{ session('error') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
 @endif
 @if (session('warning'))
     <div class="alert alert-warning alert-dismissible fade show" role="alert">
         <strong>
             {{ __('label.warning') }}
         </strong> {{ session('warning') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
 @endif
 @if (session('info'))
     <div class="alert alert-info alert-dismissible fade show" role="alert">
         <strong>
             {{ __('label.info') }}
         </strong> {{ session('info') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
 @endif

 @if ($errors->any())
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>{{ __('label.error') }}</strong> {{ __('label.error-message') }}
         <ol class="mb-0">
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ol>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
 @endif
