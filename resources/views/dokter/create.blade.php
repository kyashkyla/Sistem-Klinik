@extends('layout')

@section('content')
<h3>Tambah Dokter</h3>

<form method="POST" action="{{ route('dokter.store') }}">
    @csrf

    <div class="mb-3">
        <label>Nama</label>
        <input name="Nama" class="form-control">
    </div>

    <div class="mb-3">
        <label>No Telepon</label>
        <input name="No_Telepon" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="Email" class="form-control">
    </div>

    <div class="mb-3">
        <label>Password</label>
        <input type="password" name="Password" class="form-control">
    </div>

    <div class="mb-3">
        <label>Spesialis</label>
        <input name="Spesialis" class="form-control">
    </div>

    <div class="