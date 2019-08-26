@extends('admin.layouts.admin')

@section('title', 'Global settings')

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nameInput">Site Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name" value="{{ old('name', site_name()) }}" required>

                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="urlInput">Site url</label>
                    <input type="url" class="form-control @error('url') is-invalid @enderror" id="urlInput" name="url" value="{{ old('url', config('app.url')) }}" required>

                    @error('url')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descriptionInput">Site Description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" id="descriptionInput" name="description" value="{{ old('description', setting('description')) }}" required>

                    @error('description')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="timezoneSelect">Timezone</label>
                    <select class="form-control @error('timezone') is-invalid @enderror" id="timezoneSelect" name="timezone" required>
                        @foreach($timezones as $timezone)
                            <option value="{{ $timezone }}" @if($timezone == $currentTimezone) selected @endif>{{ $timezone }}</option>
                        @endforeach
                    </select>

                    @error('timezone')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="localeSelect">Site language</label>
                    <select class="form-control @error('locale') is-invalid @enderror" id="localeSelect" name="locale" required>
                        @foreach($languages as $langCode => $langName)
                            <option value="{{ $langCode }}" @if($langCode == app()->getLocale()) selected @endif>{{ $langName }}</option>
                        @endforeach
                    </select>

                    @error('locale')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection