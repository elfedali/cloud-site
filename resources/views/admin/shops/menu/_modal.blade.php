 <!-- Button trigger modal -->
 <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#menu-{{ $menu->id }}">
     {{ __('button.add_item') }}
 </button>

 <!-- Modal -->
 <section class="modal fade" id="menu-{{ $menu->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">
                     {{ __('label.menu') }} {{ $menu->title }}
                 </h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="POST"
                     action="{{ route('admin.shops.menu.addItem', [
                         'shop' => $shop,
                         'menu' => $menu,
                     ]) }}">
                     @csrf
                     @method('PUT')
                     <div class="mb-3">
                         <label for="title" class="col-form-label">
                             {{ __('label.title') }} <span class="text-danger">*</span>
                         </label>
                         <input id="title" class="form-control" name="title" required>
                     </div>
                     {{-- price --}}
                     <div class="mb-3">
                         <label for="price" class="col-form-label">
                             {{ __('label.price') }} <span class="text-danger">*</span>
                         </label>
                         <input type="number" id="price" class="form-control" name="price" required>
                     </div>
                     {{-- description --}}
                     <div class="mb-3">
                         <label for="description" class="col-form-label">
                             {{ __('label.description') }} <span class="text-danger">*</span>
                         </label>
                         <textarea id="description" class="form-control" name="description" required></textarea>
                     </div>

                     <div class="mb-3">
                         <button type="submit" class="btn btn-primary">
                             {{ __('button.save') }}
                         </button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </section>
