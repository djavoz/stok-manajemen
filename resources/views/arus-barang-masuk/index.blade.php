<x-app-layout>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <x-app.navbar />
        <div class="container-fluid py-4 px-5">
            <div class="row">
                <div class="col-12">
                    <div class="card border shadow-xs mb-4">
                        <div class="card-header border-bottom pb-0 d-flex justify-content-between">
                            <div>
                                <h6 class="font-weight-semibold text-lg mb-0">Arus Barang Masuk</h6>
                                <p class="text-sm">Daftar semua barang yang masuk</p>
                            </div>
                            <div>
                                <a href="{{ route('barang-masuk.create') }}" class="btn btn-primary">Tambah Barang Masuk</a>
                            </div>
                        </div>
                        <div class="card-body px-0 py-0">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Stok</th>
                                            <th>Kategori</th>
                                            <th>Jumlah Masuk</th>
                                            <th>Tanggal</th>
                                            <th>Dibuat Oleh</th>
                                            <th>Aksi</th> <!-- Kolom Aksi -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($laporanMasuk as $index => $laporan)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $laporan->stok->stok }}</td>
                                                <td>{{ $laporan->stok->kategori->kategori }}</td>
                                                <td>{{ $laporan->jumlah_masuk }}</td>
                                                <td>{{ $laporan->created_at->format('d/m/Y') }}</td>
                                                <td>{{ $laporan->users->name }}</td>
                                                <td>
                                                    <a href="{{ route('barang-masuk.edit', $laporan->laporan_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('barang-masuk.destroy', $laporan->laporan_id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
