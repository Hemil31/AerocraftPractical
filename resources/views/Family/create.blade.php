<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Family Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Family Members Form</h2>
        <form method="POST" action="{{ route('family.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Member Name</th>
                        <th>Relation</th>
                        <th>Relation With</th>
                        <th>Upload Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Self -->
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="members[self][name]" placeholder="Enter Your Name" required>
                        </td>
                        <td>
                            <input type="text" class="form-control" value="Self" name="members[self][relation]" readonly>
                        </td>
                        <td>
                            <select class="form-control" name="members[self][relation_with]" required>
                                <option value="Grand Father">Grand Father</option>
                                <option value="Grand Mother">Grand Mother</option>
                                <option value="Great Grand Father">Great Grand Father</option>
                                <option value="Great Grand Mother">Great Grand Mother</option>
                            </select>
                        </td>
                        <td>
                            <input type="file" class="form-control" name="members[self][photo]">
                        </td>
                    </tr>

                    <!-- Other Relations -->
                    @foreach (\App\FamilyEnum::toArray() as $value => $relation)
                        @if ($relation !== 'Self') <!-- Skip 'Self' Relation -->
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="members[{{ strtolower($relation) }}][name]" placeholder="Enter {{ $relation }} Name">
                            </td>
                            <td>
                                <input type="text" class="form-control" value="{{ $relation }}" name="members[{{ strtolower($relation) }}][relation]" readonly>
                            </td>
                            <td>
                                <select class="form-control" name="members[{{ strtolower($relation) }}][relation_with]">
                                    <option value="Grand Father">Grand Father</option>
                                    <option value="Grand Mother">Grand Mother</option>
                                    <option value="Great Grand Father">Great Grand Father</option>
                                    <option value="Great Grand Mother">Great Grand Mother</option>
                                </select>                            </td>
                            <td>
                                <input type="file" class="form-control" name="members[{{ strtolower($relation) }}][photo]">
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-success" id="addRow">+ Add Row</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
