<!DOCTYPE html>
<html>
<head>
    <title>Store importer</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Store importer
        </div>
        <div class="card-body">
            <form name="storeImportForm" id="store-import-form" method="post" action="{{url('/store/import')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Description</label>
                    <input type="file" id="file" name="file" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
