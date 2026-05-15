<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Sepatu</title>
    
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- JavaScript -->
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">CIBADUYUT SHOES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

                <div class="d-flex align-items-center gap-2">

                    <button class="btn btn-outline-warning btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#wishlistModal"
                        onclick="tampilkanwishlist()">
                        ⭐ Wishlist (<span id="wishlistCount">0</span>)
                    </button>

                    <button id="btn-theme" class="btn btn-outline-light btn-sm">
                        Mode Gelap
                    </button>

                    <!-- logika Pengecekan login  -->
                    @if(session()->has('user'))
                        <span class="text-white me-3">
                            {{ session('user')}}
                        </span>

                        <a href="{{ route('logout')}}" class="btn btn-danger btn-sm">
                            Logout
                        </a>                            
                    @else 
                        <a href="{{ route('login')}}" class="btn btn-warning btn-sm">
                            Login
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <div class="hero text-center text-white d-flex align-items-center">
        <div class="container">
            <h1>Sistem Manajemen Sepatu</h1>
            <p>Kelola Data Sepatu dengan Mudah</p>
        </div>
    </div>

    <!-- Dashboard -->
    <div class="container py-5">

        <!-- Statistik -->
        <div class="row g-4 mb-5">

            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center p-4 h-100">
                    <div class="card-body">
                        <h5 class="text-muted">Total Produk</h5>
                        <h1 class="fw-bold">12</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center p-4 h-100">
                    <div class="card-body">
                        <h5 class="text-muted">Stok Tersedia</h5>
                        <h1 class="fw-bold">85</h1>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center p-4 h-100">
                    <div class="card-body">
                        <h5 class="text-muted">Kategori</h5>
                        <h1 class="fw-bold">3</h1>
                    </div>
                </div>
            </div>

        </div>

        <!-- Header Daftar Produk -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <div>
                <h2 class="fw-bold mb-0">Daftar Sepatu</h2>
                <small class="text-muted">
                    Kelola produk sepatu dengan mudah
                </small>
            </div>

            <div class="d-flex gap-2">

                <a href="{{ route('products.index') }}"
                class="btn btn-outline-dark">
                    Lihat Semua
                </a>

                <button class="btn btn-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#tambahProdukModal">
                    + Tambah Sepatu
                </button>

            </div>

        </div>

        <!-- Card Produk -->
        <div class="row g-4" id="container-barang">
            @foreach ($product as $item)
            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                <!-- Gambar Produk -->
                <img 
                    src="{{ asset('assets/' . $item->product_image) }}"
                    class="card-img-top product-image"
                    alt="{{ $item->product_name }}"
                >                

                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="fw-bold mb-1">
                                    {{ $item->product_name }}
                                </h5>

                                <span class="badge bg-secondary">
                                    {{ $item->category->category_name }}
                                </span>
                            </div>
                        </div>

                        <h4 class="text-primary fw-bold mb-3">
                            Rp {{ number_format($item->product_price, 0, ',', '.') }}
                        </h4>

                        <p class="text-muted mb-4">
                            Stok tersedia:
                            <strong>{{ $item->product_stock }}</strong>
                        </p>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary w-100">
                                Beli
                            </button>

                            <button class="btn btn-outline-danger w-100">
                                Wishlist
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- modal wishlist -->
     <div class="modal fade" id="wishlistModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Daftar Wishlist Saya</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <ul class="list-group" id="daftar-wishlist">

                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-danger" onclick="hapusWishlist()">Kosongkan</button>
                </div>
            </div>
        </div>
     </div>

    <!-- Modal Tambah Produk -->
    <div class="modal fade" id="tambahProdukModal" tabindex="-1" aria-labelledby="tambahProdukModalLabel" aria-hidden="true">       
        <div class="modal-dialog modal-dialog-centered">           
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahProdukModalLabel">
                        Tambah Sepatu Baru
                    </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Form -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Body -->
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">
                                Nama Produk
                            </label>

                            <input 
                                type="text"
                                class="form-control"
                                id="product_name"
                                name="product_name"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">
                                Kategori
                            </label>

                            <select 
                                class="form-select"
                                name="category_id"
                                id="category_id"
                                required
                            >
                                <option value="">Pilih Kategori</option>

                                @foreach ($category as $cat)
                                    <option value="{{ $cat->category_id }}">
                                        {{ $cat->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="product_price" class="form-label">
                                Harga
                            </label>

                            <input 
                                type="number"
                                class="form-control"
                                id="product_price"
                                name="product_price"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="product_stock" class="form-label">
                                Stok
                            </label>

                            <input 
                                type="number"
                                class="form-control"
                                id="product_stock"
                                name="product_stock"
                                required
                            >
                        </div>

                        <!-- INPUT GAMBAR -->
                        <div class="mb-3">
                            <label for="product_image" class="form-label">
                                Gambar Produk
                            </label>

                            <input 
                                type="file"
                                class="form-control"
                                id="product_image"
                                name="product_image"
                                accept="image/*"
                            >
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button 
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Tutup
                        </button>

                        <button type="submit" class="btn btn-primary">
                            Simpan Produk
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="bg-dark text-white text-center p-3">@ 2026 Sistem Manajemen Sepatu. All rights reserved.</footer>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>