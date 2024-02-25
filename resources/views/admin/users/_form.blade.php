<div class="card mb-4">
    <div class="card-body">
        <!-- Name -->
        <div class="mb-3">
            <label for="name">
                {{ __('label.fullName') }}
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                required value="{{ old('name', $user->name ?? '') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            {{-- fullName_help --}}
            <div id="fullNameHelp" class="form-text">
                {{ __('label.fullName_help') }}
            </div>
        </div>

        <!-- Username -->
        <div class="mb-3">
            <label for="username">
                {{ __('label.username') }}
                <span class="text-danger">*</span>
            </label>
            <input type="text" name="username" id="username"
                class="form-control @error('username') is-invalid @enderror" required
                value="{{ old('username', $user->username ?? '') }}">
            @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            {{-- username_help --}}
            <div id="usernameHelp" class="form-text">
                {{ __('label.username_help') }}
            </div>

        </div>

        <div class="row">
            <!-- Email -->
            <div class="col-md mb-3">
                <label for="email">
                    {{ __('label.email') }}
                    <span class="text-danger">*</span>
                </label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" required
                    value="{{ old('email', $user->email ?? '') }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Phone -->
            <div class="col-md  mb-3">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone"
                    class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone', $user->phone ?? '') }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

        </div>
        <!-- /.row -->
        <div class="row">
            <!-- Password -->
            <div class="col-md mb-3">
                <label for="password">
                    {{ __('label.password') }}
                    <span class="text-danger">*</span>
                </label>
                <input type="password" name="password" id="password"
                    class="form-control @error('password') is-invalid @enderror" {{ isset($user) ? '' : 'required' }}>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Password Confirmation -->
            <div class="col-md mb-3">
                <label for="password_confirmation">
                    {{ __('label.password_confirmation') }}
                    <span class="text-danger">*</span>
                </label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="form-control @error('password_confirmation') is-invalid @enderror"
                    {{ isset($user) ? '' : 'required' }}>
                @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <!-- /.row -->

        <!-- Role -->
        <div class="mb-3">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                <option value="{{ \App\Models\User::ROLE_USER }}"
                    {{ old('role', $user->role ?? '') == \App\Models\User::ROLE_USER ? 'selected' : '' }}>
                    {{ __('label.role_user') }}
                </option>
                <option value="{{ \App\Models\User::ROLE_ADMIN }}"
                    {{ old('role', $user->role ?? '') == \App\Models\User::ROLE_ADMIN ? 'selected' : '' }}>
                    {{ __('label.role_admin') }}
                </option>
                <option value="{{ \App\Models\User::ROLE_COMMERCIAL }}"
                    {{ old('role', $user->role ?? '') == \App\Models\User::ROLE_COMMERCIAL ? 'selected' : '' }}>
                    {{ __('label.role_commercial') }}
                </option>

                <option value="{{ \App\Models\User::ROLE_SUPER_ADMIN }}"
                    {{ old('role', $user->role ?? '') == \App\Models\User::ROLE_SUPER_ADMIN ? 'selected' : '' }}>
                    {{ __('label.role_super_admin') }}
                </option>

            </select>
            @error('role')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>


        <h2><u>
                {{ __('label.address') }}
            </u>
        </h2>

        <!-- Address -->
        <div class="mb-3">
            <label for="address">
                {{ __('label.address') }}
            </label>
            <input type="text" name="address" id="address"
                class="form-control @error('address') is-invalid @enderror"
                value="{{ old('address', $user->address ?? '') }}">
            @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- City -->
        <div class="mb-3">
            <label for="city">
                {{ __('label.city') }}
            </label>
            <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror"
                value="{{ old('city', $user->city ?? '') }}">
            @error('city')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Zip -->
        <div class="mb-3">
            <label for="zip">
                {{ __('label.zip') }}
            </label>
            <input type="text" name="zip" id="zip" class="form-control @error('zip') is-invalid @enderror"
                value="{{ old('zip', $user->zip ?? '') }}">
            @error('zip')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Country -->
        <div class="mb-3">
            <label for="country">
                {{ __('label.country') }}
            </label>
            <input type="text" name="country" id="country"
                class="form-control @error('country') is-invalid @enderror"
                value="{{ old('country', $user->country ?? '') }}">
            @error('country')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
