<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Diş Kliniği Hasta Listesi</title>
    <link rel="stylesheet" href="{{ asset('page.css') }}">
</head>

@extends('layouts.page')
@section('content')
    <div class="header-area d-flex justify-content-between align-items-center">
        <h2 class="px-3 pt-3 m-0">Randevular</h2>
        <div class="mb-3">
            <a href="{{route('appointments.create')}}" type="button" class="btn btn-primary" id="ekleBtn">Ekle</a>
        </div>
    </div>

    <div class="patient-list px-3">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Kimlik Numarası</th>
                <th>Adı Soyadı</th>
                <th>Telefon Numarası</th>
                <th>Randevu Tarihi</th>
                <th>Randevu Saati</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody id="HastaListesi">
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{$appointment['patient_tc']}}</td>
                    <td>{{$appointment['patient_name']}}&nbsp;&nbsp;{{$appointment['patient_surname']}}</td>
                    <td>{{$appointment['patient_phone_number']}}</td>
                    <td>{{$appointment['date']}}</td>
                    <td>{{$appointment['time']}}</td>
                    <td>
                        <a href="{{route('appointments.edit', $appointment['id'])}}" class="btn btn-primary btn-sm">Düzenle</a>
                        <a href="{{route('appointments.delete', $appointment['id'])}}" class="btn btn-danger btn-sm delete-btn">Sil</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn');

            deleteButtons.forEach(function (button) {
                button.addEventListener('click', function (event) {
                    event.preventDefault();

                    const confirmation = confirm('Bu randevuyu silmek istediğinize emin misiniz?');

                    if (confirmation) {
                        window.location.href = this.href;
                    }
                });
            });
        });
    </script>
@endsection
