@extends('customer.layouts.master')

@section('content')
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Detail Pembayaran</h1>

            <form id="checkoutForm" action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="row g-5">
                    {{-- Form Data Pembeli --}}
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Nama Lengkap<sup>*</sup></label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-item w-100">
                                    <label class="form-label my-3">Nomor WhatsApp<sup>*</sup></label>
                                    <input type="text" name="whatsapp" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-item">
                                    <textarea name="catatan" class="form-control" cols="30" rows="5" placeholder="Catatan pesanan (Opsional)"></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Detail Pesanan dari Cart --}}
                        <div class="row">
                            <div class="table-responsive">
                                <br><br>
                                <h4 class="mb-4">Detail Pesanan</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>Menu</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($cart as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{ $item['image'] ?? 'https://via.placeholder.com/100' }}"
                                                        style="width: 100px; height: 90px; object-fit: cover;"
                                                        class="rounded-circle">
                                                </td>
                                                <td>{{ $item['name'] }}</td>
                                                <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
                                                <td>{{ $item['qty'] ?? 0 }}</td>
                                                <td>Rp{{ number_format(($item['price'] ?? 0) * ($item['qty'] ?? 0), 0, ',', '.') }}
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Keranjang kosong</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    {{-- Total & Pembayaran --}}
                    <div class="col-md-12 col-lg-6 col-xl-6">
                        <div class="bg-light rounded p-4">
                            <h3 class="display-6 mb-4">Total <span class="fw-normal">Pesanan</span></h3>
                            <div class="d-flex justify-content-between mb-4">
                                <h5>Subtotal</h5>
                                <p>Rp{{ number_format($subtotal, 0, ',', '.') }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p>Pajak (10%)</p>
                                <p>Rp{{ number_format($pajak, 0, ',', '.') }}</p>
                            </div>

                            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                <h4>Total</h4>
                                <h5>Rp{{ number_format($total, 0, ',', '.') }}</h5>
                            </div>

                            <div class="py-4 mb-4">
                                <h5>Metode Pembayaran</h5>
                                <div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="qris" name="payment"
                                            value="qris" required>
                                        <label class="form-check-label" for="qris">QRIS</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="cash" name="payment"
                                            value="tunai">
                                        <label class="form-check-label" for="cash">Tunai</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tombol Konfirmasi --}}
                        <div class="d-flex justify-content-end">
                            <button type="button" id="btnKonfirmasi"
                                class="btn border-secondary py-3 text-uppercase text-primary">
                                Konfirmasi Pesanan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('btnKonfirmasi').addEventListener('click', function() {
            Swal.fire({
                title: 'Konfirmasi Pesanan?',
                text: "Pastikan data sudah benar sebelum melanjutkan.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Pesan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('checkoutForm').submit();
                }
            });
        });

        @if (session('success'))
            Swal.fire({
                title: "Berhasil",
                text: "{{ session('success') }}",
                icon: "success"
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ session('error') }}"
            });
        @endif
    </script>
@endpush
