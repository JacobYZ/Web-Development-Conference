<x-layout>
    <div class="container mt-5">
        <h1>Submit a New Paper</h1>
    </div>

    <div class="container mt-5">
        <div class="row">
            @if (session('error'))
                @php
                    $participant = App\Models\Participant::with('submissions')->find(session('author_id'));
                @endphp
                <div class="col">
                    <!-- The rest of your form goes here -->
                </div>
            @elseif(session('new_author'))
                @php
                    $participant = App\Models\Participant::find(session('new_author'));
                @endphp
                <div class="col">
                    <!-- The rest of your form goes here -->
                </div>
            @else
                <div class="col">
                    <form method="post" action="{{ route('submissions.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="form-group">
                            <label for="abstract">Abstract</label>
                            <textarea class="form-control" id="abstract" name="abstract" rows="3" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <script type="text/javascript">
        $('#paper_info').hide();

        $('#show_paper').on('click', function() {
            $(this).hide();
            $("#info").hide();
            $('#paper_info').show();
        });
    </script>
</x-layout>