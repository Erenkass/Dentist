<!-- resources/views/patient/teeth.blade.php -->

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('page.css') }}">
    <title>Diş İşlemleri Listesi</title>
</head>

<body>
<!-- resources/views/patient/teeth.blade.php -->

@extends('layouts.page')

@section('content')

    <div class="header-area d-flex justify-content-between align-items-center">
        <h2 class="px-3 pt-3 m-0">Diş İşlemleri Listesi</h2>
    </div>
    <div class="teeth-form px-3 pt-3">
        <form action="{{ route('patients.teeth.store', ['patient' => $patient, 'toothId' => $toothId]) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="process_id" class="form-label">İşlem:</label>
                <select name="process_id" id="process_id" class="form-select">
                    @foreach($processes as $process)
                        <option value="{{ $process->id }}">{{ $process->process_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">İşlemi Kaydet</button>
        </form>
    </div>

    <div class="teeth-list px-3">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Diş</th>
                <th>İşlem</th>
                <th>Tarih</th>
                <th>Saat</th>
                <th></th>
            </tr>
            </thead>
            <tbody id="TeethListesi">
            @foreach($processDetails as $detail)
                <tr>
                    <td>{{ $detail->tooth->id }}</td>
                    <td>{{ $detail->process->process_name }}</td>
                    <td>{{date('d-m-Y', strtotime($detail->created_at))}}</td>
                    <td>{{date('H:i', strtotime($detail->created_at))}}</td>
                    <td><a href="{{ route('patients.teeth.delete', $detail->id) }}" class="btn btn-danger">Sil</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

</body>

</html>
