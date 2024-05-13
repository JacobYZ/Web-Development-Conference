<x-layout>
    <div class="container mt-5">
        <h1>Update Paper Details</h1>
    </div>
    <div class="container mt-5">
        <form method="post" action="{{ route('submissions.update', $submission) }}">
            @csrf
            @method('PUT')
            {{-- <div class="mb-3">
                <label for="name" class="form-label">Author</label>
                <input type="text" class="form-control" id="name" value="{{ $submission->user->name }}" disabled>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type of paper</label>
                <select class="form-select" id="type" name="type" required>
                    <option>Select the paper type</option>
                    <option value="1">Paper</option>
                    <option value="2">Working Group</option>
                    <option value="3">Poster</option>
                    <option value="4">Doctorial Consortium</option>
                    <option value="5">Tips, Techniques and Courseware</option>
                </select>
            </div> --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $submission->title }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="abstract" class="form-label">Abstract</label>
                <textarea class="form-control" id="abstract" name="abstract" required>{{ $submission->abstract }}</textarea>
            </div>
            <a href="{{ route('submissions.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-sm btn-primary">Update</button>
        </form>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#type").val("{{ $submission->type }}");
        });
    </script>
</x-layout>
