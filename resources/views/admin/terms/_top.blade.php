   <div class="d-flex align-items-center _justify-content-between">
       <h1 class="me-4">
           {{ ucfirst($term_type) }}s
       </h1>
       {{-- new  --}}
       <div> <a href="{{ url('/admin/terms/create') }}" class="btn btn-outline-primary">
               {{ __('label.create') }}
           </a></div>
   </div>
   <!-- /.d-flex -->
