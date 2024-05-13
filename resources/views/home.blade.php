<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (auth()->user()->role_id == 1)
                            {{ __('You are logged in! You have admin access.') }}
                        @else
                            {{ __("You are logged in! You don't have admin access.") }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
