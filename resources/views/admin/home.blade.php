@extends('layouts.app')

@section('scripts')
<script>
    var buttons = document.getElementsByClassName('approve');

    for (let i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener('click', function() {
            console.log(buttons[i].closest('tr').querySelector('form').submit());
        });
    }
</script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Submissions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Short Description</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($submissions as $submission)
                            <tr>
                                <td>{{ $submission->name }}</td>
                                <td>{{ $submission->email }}</td>
                                <td title="{{ $submission->short_description }}">{{ str_limit($submission->short_description, 35) }} &#10078;</td>
                                <td>
                                    <button class="btn btn-sm btn-success approve">&#10004;</button>
                                </td>

                                <form method="GET" action="{{ route('submission.approve', ['id' => $submission->id]) }}">
                                    <input type="hidden" name="id" value="{{ $submission->id }}" />
                                </form>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $submissions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
