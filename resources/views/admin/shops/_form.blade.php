<div class="row">
    <div class="col-lg-8">
        <div class="mb-3">
            <label for="title" class="form-label">
                {{ __('label.title') }}
                <span class="text-danger">*</span>
            </label>
            <input type="text" class="form-control" id="title" name="title"
                value="{{ $shop->title ?? old('title') }}">
        </div>
        <!-- /.mb-3 -->
        {{-- description --}}
        <div class="mb-3">
            <label for="description" class="form-label">
                {{ __('label.description') }}
                <span class="text-danger">*</span>
            </label>
            <textarea class="form-control" id="description" name="description" rows="15">{{ $shop->description ?? old('description') }}</textarea>
        </div>
        {{-- excerpt --}}
        <div class="mb-3">
            <label for="excerpt" class="form-label">
                {{ __('label.excerpt') }}
                <span class="text-danger">*</span>
            </label>
            <textarea class="form-control" id="excerpt" name="excerpt" rows="3">{{ $shop->excerpt ?? old('excerpt') }}</textarea>
        </div>
        {{-- status select --}}
        <div class="mb-3">
            <label for="status" class="form-label">
                {{ __('label.status') }}
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" id="status" name="status">
                <option value="draft" @if ($shop->status ?? old('status') == 'draft') selected @endif>
                    {{ __('label.draft') }}
                </option>
                <option value="published" @if ($shop->status ?? old('status') == 'published') selected @endif>
                    {{ __('label.published') }}
                </option>
            </select>
        </div>
        <!-- /.mb-3 -->
        {{-- comment_status --}}
        <div class="mb-3">
            <label for="comment_status" class="form-label">
                {{ __('label.comment_status') }}
                <span class="text-danger">*</span>
            </label>
            <select class="form-select" id="comment_status" name="comment_status">
                <option value="open" @if ($shop->comment_status ?? old('comment_status') == 'open') selected @endif>
                    {{ __('label.open') }}
                </option>
                <option value="closed" @if ($shop->comment_status ?? old('comment_status') == 'closed') selected @endif>
                    {{ __('label.closed') }}
                </option>
            </select>
        </div>
        {{-- ping_status --}}
        <div class="mb-3">
            <label for="ping_status" class="form-label">
                {{ __('label.ping_status') }}
            </label>
            <select class="form-select" id="ping_status" name="ping_status">
                <option value="open" @if ($shop->ping_status ?? old('ping_status') == 'open') selected @endif>
                    {{ __('label.open') }}
                </option>
                <option value="closed" @if ($shop->ping_status ?? old('ping_status') == 'closed') selected @endif>
                    {{ __('label.closed') }}
                </option>
            </select>
        </div>

        {{-- phone --}}
        <div class="mb-3">
            <label for="phone" class="form-label">
                {{ __('label.phone') }}
            </label>
            <input type="text" class="form-control" id="phone" name="phone"
                value="{{ $shop->phone ?? old('phone') }}">
        </div>
        <!-- /.mb-3 -->
        {{-- mobile --}}
        <div class="mb-3">
            <label for="mobile" class="form-label">
                {{ __('label.mobile') }}
            </label>
            <input type="text" class="form-control" id="mobile" name="mobile"
                value="{{ $shop->mobile ?? old('mobile') }}">
        </div>
        {{-- email --}}
        <div class="mb-3">
            <label for="email" class="form-label">
                {{ __('label.email') }}
            </label>
            <input type="email" class="form-control" id="email" name="email"
                value="{{ $shop->email ?? old('email') }}">
        </div>
        <!-- /.mb-3 -->
        {{-- address --}}
        <div class="mb-3">
            <label for="address" class="form-label">
                {{ __('label.address') }}
            </label>
            <input type="text" class="form-control" id="address" name="address"
                value="{{ $shop->address ?? old('address') }}">
        </div>
        <!-- /.mb-3 -->
        {{-- city --}}
        <div class="mb-3">
            <label for="city" class="form-label">
                {{ __('label.city') }}
            </label>
            <input type="text" class="form-control" id="city" name="city"
                value="{{ $shop->city ?? old('city') }}">
        </div>
        <!-- /.mb-3 -->
        {{-- zip --}}
        <div class="mb-3">
            <label for="zipcode" class="form-label">
                {{ __('label.zipcode') }}
            </label>
            <input type="text" class="form-control" id="zipcode" name="zipcode"
                value="{{ $shop->zipcode ?? old('zipcode') }}">
        </div>

        {{-- Country --}}
        <div class="mb-3">
            <label for="country" class="form-label">
                {{ __('label.country') }}
            </label>
            <input type="text" class="form-control" id="country" name="country" placeholder=""
                value="{{ $shop->country ?? old('country') }}">
            {{-- help --}}
            <div id="countryHelp" class="form-text">
                {{ __('label.country_help') }}
            </div>
        </div>

    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="owner_id" class="form-label">
                {{ __('label.owner') }}
            </label>
            <select class="form-select" id="owner_id" name="owner_id">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if ($user->id == ($shop->owner_id ?? old('owner_id'))) selected @endif>
                        {{ $user->id }} | {{ $user->name }} | {{ $user->email }}
                    </option>
                @endforeach
            </select>
        </div>
        <!-- /.mb-3 -->
        @include('admin.shops._terms')
        <hr>

        {{-- website --}}
        <div class="mb-3">
            <label for="website" class="form-label">
                {{ __('label.website') }}
            </label>
            <input type="text" class="form-control" id="website" name="website"
                value="{{ $shop->website ?? old('website') }}">
        </div>
        <!-- /.mb-3 -->
        {{-- tiktok --}}
        <div class="mb-3">
            <label for="tiktok" class="form-label">
                {{ __('label.tiktok') }}
            </label>
            <input type="text" class="form-control" id="tiktok" name="tiktok"
                value="{{ $shop->tiktok ?? old('tiktok') }}">
        </div>
        <!-- /.mb-3 -->
        {{-- instagram --}}
        <div class="mb-3">
            <label for="instagram" class="form-label">
                {{ __('label.instagram') }}
            </label>
            <input type="text" class="form-control" id="instagram" name="instagram"
                value="{{ $shop->instagram ?? old('instagram') }}">
        </div>
        <!-- /.mb-3 -->
        {{-- facebook --}}
        <div class="mb-3">
            <label for="facebook" class="form-label">
                {{ __('label.facebook') }}
            </label>
            <input type="text" class="form-control" id="facebook" name="facebook"
                value="{{ $shop->facebook ?? old('facebook') }}">
        </div>
        <!-- /.mb-3 -->
        {{-- youtube --}}
        <div class="mb-3">
            <label for="youtube" class="form-label">
                {{ __('label.youtube') }}
            </label>
            <input type="text" class="form-control" id="youtube" name="youtube"
                value="{{ $shop->youtube ?? old('youtube') }}">
        </div>

    </div>
    <!-- /.col-lg-4 -->
</div>
<!-- /.row -->

<div class="mb-3">
    <button type="submit" class="btn btn-primary">
        {{ isset($shop) ? __('label.update') : __('label.create') }}
    </button>
</div>
