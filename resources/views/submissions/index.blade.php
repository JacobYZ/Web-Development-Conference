<x-layout>
    <div class="container">
        <h1>Submission List</h1>
        <a href="{{ route('submissions.create') }}" type="button" class="btn btn-sm btn-secondary">
            Submit a new paper
        </a>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <td></td>
                    <td>Author</td>
                    {{-- <td>Type</td> --}}
                    <td>Title</td>
                    <td>Abstract</td>
                    {{-- <td>Location</td>
                    <td>Scores</td> --}}
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($submissions as $submission)
                    <tr>
                        <td>{{ $submission->id }}</td>
                        <td>{{ $submission->author->first_name }} {{ $submission->author->last_name }}</td>
                        {{-- <td>{{ $submission->type->description }}</td> --}}
                        <td><a href="{{ route('submissions.show', $submission->id) }}"> {{ $submission->title }}</a></td>
                        <td>{{ $submission->abstract }}</td>
                        {{-- <td>{{ $submission->type->location }}</td>
                        <td>{{ $submission->review->average('result') }}</td> --}}
                        <td>
                            <button type="button" id="{{ $submission->id }}" class="btn btn-sm btn-primary"
                                onclick="loadData(this.id)">Reviewer</button>
                        </td>
                        <td>
                            <a href="{{ route('submissions.edit', $submission->id) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('submissions.destroy', $submission->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div id="txtHint"></div>
    </div>
</x-layout>
