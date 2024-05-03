<x-layout>
    <div class="container mt-5">
        <h1>Paper Details</h1>
    </div>
    <div class="container mt-5">
        <div class="mb-3">
            <label for="name" class="form-label">Author</label>
            <p id="name">{{ $submission->author->first_name }} {{ $submission->author->last_name }}</p>
        </div>
        {{-- <div class="mb-3">
      <label for="type" class="form-label">Type of paper</label>
      <p id="type">
        @switch($submission->type)
          @case(1)
            Paper
            @break
          @case(2)
            Working Group
            @break
          @case(3)
            Poster
            @break
          @case(4)
            Doctorial Consortium
            @break
          @case(5)
            Tips, Techniques and Courseware
            @break
          @default
            Unknown
        @endswitch
      </p>
    </div> --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <p id="title">{{ $submission->title }}</p>
        </div>
        <div class="mb-3">
            <label for="abstract" class="form-label">Abstract</label>
            <p id="abstract">{{ $submission->abstract }}</p>
        </div>
        <a href="{{ route('submissions.index') }}" class="btn btn-sm btn-secondary">Back</a>
    </div>
</x-layout>
