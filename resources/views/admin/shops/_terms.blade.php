 <div class="mb-3">
     <label class="form-label">
         {{ __('label.kitchens') }}
     </label>
     <div class="checkbox-group">
         @foreach ($kitchens as $kitchen)
             <div class="form-check">
                 <input class="form-check-input" type="checkbox" name="kitchens[]" value="{{ $kitchen->id }}"
                     id="kitchen_{{ $kitchen->id }}" @if (isset($shop) && $shop->terms->contains($kitchen->id)) checked @endif>
                 <label class="form-check-label" for="kitchen_{{ $kitchen->id }}">
                     {{ $kitchen->name }}
                 </label>
             </div>
         @endforeach
     </div>
 </div>

 <div class="mb-3">
     <label class="form-label">
         {{ __('label.services') }}
     </label>
     <div class="checkbox-group">
         @foreach ($services as $service)
             <div class="form-check">
                 <input class="form-check-input" type="checkbox" name="services[]" value="{{ $service->id }}"
                     id="service_{{ $service->id }}" @if (isset($shop) && $shop->terms->contains($service->id)) checked @endif>
                 <label class="form-check-label" for="service_{{ $service->id }}">
                     {{ $service->name }}
                 </label>
             </div>
         @endforeach
     </div>
 </div>
