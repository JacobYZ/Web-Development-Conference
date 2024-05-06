<x-layout>
    <div class="container mt-5">
        <h1>Submit a New Paper</h1>
        <div class="row">
            <div class="col">
                @if (session('has_submission'))
                    <ul>
                        <li>Author: {{ session('author_name') }}</li>
                        <li>Email: {{ session('author_email') }}</li>
                        <li>Affiliate: {{ session('author_affiliate') }}</li>
                    </ul>
                    <p>You have already submitted:</p>
                    <ul>
                        {{-- <li>Type of Paper: {{ session('submission_type') }}</li> --}}
                        <li>Title: {{ session('submission_title') }}</li>
                        <li>Abstract: {{ session('submission_abstract') }}</li>
                    </ul><a href="{{ route('submissions.index') }}" class="btn btn-primary mt-3">Back</a>
                @elseif (session('continue_submission'))
                    <div>
                        <form method="post" action="{{ route('submissions.storeSubmission') }}">
                            @csrf
                            <!-- Non-editable author info -->
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" id="author" name="author"
                                    value="{{ session('author_name') }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ session('author_email') }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="affiliate">Affiliate</label>
                                <input type="text" class="form-control" id="affiliate" name="affiliate"
                                    value="{{ session('author_affiliate') }}" readonly>
                            </div>

                            <p>Thank you for input the author information. Do you want to continue to submit?</p>
                            <!-- Submission info inputs -->
                            {{-- <div class="form-group">
                                <label for="type">Type of Paper</label>
                                <input type="text" class="form-control" id="type" name="type" required>
                            </div> --}}

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="abstract">Abstract</label>
                                <textarea class="form-control" id="abstract" name="abstract" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button><a
                                href="{{ route('submissions.index') }}" class="btn btn-secondary mt-3 ms-3">Cancel</a>
                        </form>

                    </div>
                @else
                    <!-- Initial form to gather author info -->
                    <form method="post" action="{{ route('participant.check') }}">
                        @csrf
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="affiliate">Affiliate</label>
                            <input type="text" class="form-control" id="affiliate" name="affiliate" required>
                        </div>

                        <a href="{{ route('submissions.index') }}" class="btn btn-secondary my-3">Back</a><button
                            type="submit" class="btn btn-primary my-3 ms-3">Next</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</x-layout>
