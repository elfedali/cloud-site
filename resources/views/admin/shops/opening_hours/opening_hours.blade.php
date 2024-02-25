@extends('admin.layouts.app')

@section('content')
    @include('admin.shops._nav')
    <h1>
        Edit shop <u>{{ $shop->title }}</u> opening_hours
    </h1>

    @php
        /**
         * @var Spatie\OpeningHours\OpeningHours $openingHours
         */
        $openingHours = $shop->getOpeningHours();

        //dump($openingHours);

        // $openingHoursForWeek = $openingHours?->forWeek('monday');
        // $mondayOpeningHours = $openingHoursForWeek['monday'];
        // dump($mondayOpeningHours->openingHours);

    @endphp


    <form method="POST" action="{{ route('admin.shops.opening_hours.update', $shop) }}">
        @csrf
        @method('PUT')

        @php
            $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
        @endphp
        {{-- opening hours --}}
        <table class="table">
            <thead>
                <tr>
                    <th width="200">
                        {{ __('label.is_open') }}
                    </th>
                    <th>
                        {{ __('label.day') }}
                    </th>

                    <th>
                        {{ __('label.time_from') }}
                    </th>
                    <th>
                        {{ __('label.time_to') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($days as $day)
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="days[{{ $day }}][is_open]"
                                    value="true" id="{{ $day . '_is_open' }}"
                                    {{ old('days.' . $day . '.is_open', isset($openingHours[$day]['is_open']) && $openingHours[$day]['is_open']) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ $day . '_is_open' }}">
                                    {{ __('label.open') }}
                                </label>
                            </div>
                        </td>
                        <td>
                            {{ __('label.days.' . $day) }}
                        </td>
                        <td>
                            <input type="time" name="days[{{ $day }}][open_time]"
                                value="{{ old('days.' . $day . '.open_time', $openingHours[$day]['open_time'] ?? '09:00') }}"
                                class="form-control">
                        </td>
                        <td>
                            <input type="time" name="days[{{ $day }}][close_time]"
                                value="{{ old('days.' . $day . '.close_time', $openingHours[$day]['close_time'] ?? '21:00') }}"
                                class="form-control">
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">
            {{ __('label.save') }}
        </button>
    </form>
@endsection
