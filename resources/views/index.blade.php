<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Educational Information Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container mt-5">
        <h2>Educational Information Management</h2>

        <div class="card-header">{{ __('All Information') }}
            <a style="float: right;" href="{{ route('educational_info.create') }}" class="btn btn-success btn-sm">Add
                Information</a>
        </div>
        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif

        <table class="table table-bordered" id="infoTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($educationalInfo as $info)
                    <tr>
                        <td>{{ $info->id }}</td>
                        <td>{{ $info->title }}</td>
                        <td>{{ $info->description }}</td>
                        <td>
                                <a href="{{ route('educational_info.edit', $info->id) }}"
                                    class="btn btn-info btn-sm">Edit</a>

                                <form action="{{ route('educational_info.destroy', $info->id) }}"method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this info?');">Delete</button>
                                </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
