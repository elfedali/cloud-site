   <div class="d-flex align-items-center _justify-content-between">
       <h1 class="me-4">
           @if ($term_type == 'kitchen')
               {{ __('label.kitchen') }}
           @elseif($term_type == 'service')
               {{ __('label.service') }}
           @else
               {{ $term_type }}
           @endif
       </h1>
       {{-- new  --}}
       <div> <a href="{{ route('admin.terms.create', ['term_type' => $term_type]) }}" class="btn btn-outline-primary">
               {{ __('label.create') }}
           </a>
       </div>
   </div>
   <!-- /.d-flex -->
