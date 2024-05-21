<x-layout>
    <div class="container">
        <h2>Profile</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ Auth::user()->email }}">
            </div>

            <div class="form-group">
              <label for="current_password">Current Password</label>
              <input type="password" class="form-control" id="current_password" name="current_password">
            </div>

            <div class="form-group">
              <label for="password">New Password (leave blank to keep current password)</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="form-group">
              <label for="password_confirmation">Confirm New Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary my-2">Update Profile</button>
        </form>
    </div>
</x-layout>
