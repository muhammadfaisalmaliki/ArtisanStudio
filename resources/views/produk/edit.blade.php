@extends('layouts.app')
@section('content')
<div class="content">
    <div class="left">
        <div class="section-title">Edit Produk/Layanan</div>
        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div style="background:#F6D64A;color:#122953;padding:10px 16px;border-radius:8px;margin-bottom:16px;">
                    <ul style="margin:0;padding-left:18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-input" value="{{ $produk->nama }}" required>
            </div>
            <div class="form-group">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-input" required>{{ $produk->deskripsi }}</textarea>
            </div>
            <button type="submit" class="crud-btn edit">Update</button>
            <a href="{{ route('produk.index') }}" class="crud-btn delete">Batal</a>
        </form>
    </div>
</div>
@endsection
