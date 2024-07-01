<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>Diş Kliniği Hasta Listesi</title>
    <link rel="stylesheet" href="{{ asset('page.css') }}">

</head>
@extends('layouts.page')
@section('content')

        <div class="header-area d-flex justify-content-between align-items-center">
            <h2 class="px-3 pt-3 m-0">Hasta Listesi</h2>
            <div class="mb-3">
                <a href="{{route('patients.create')}}" type="button" class="btn btn-primary" id="ekleBtn">Ekle</a>
            </div>
        </div>

        <div class="patient-list px-3">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Kimlik Numarası</th>
                    <th>Adı</th>
                    <th>Soyadı</th>
                    <th>Telefon Numarası</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody id="HastaListesi">
                @foreach($patients as $patient)
                    <tr>
                        <td>{{$patient->tc}}</td>
                        <td>{{$patient->name}}</td>
                        <td>{{$patient->surname}}</td>
                        <td>{{$patient->phone_number}}</td>
                        <td>
                            <a href="{{route('patients.edit',$patient->id)}}" class="btn btn-primary btn-sm">Düzenle</a>
                            <a href="{{route('patients.delete',$patient->id)}}" class="btn btn-danger btn-sm delete-btn">Sil</a>
                            <a href="{{route('patients.teethmap',$patient->id)}}" class="btn btn-info btn-sm">
                                <i class="bi bi-info-circle"></i>
                            </a>
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

                        const confirmation = confirm('Bu hastayı silmek istediğinize emin misiniz?');

                        if (confirmation) {
                            window.location.href = this.href;
                        }
                    });
                });
            });
        </script>
@endsection
