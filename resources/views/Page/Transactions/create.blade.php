@extends('template')

@section('title', 'Pembelian')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="#" method="POST" onsubmit="cleanPrice()">
                    @csrf
                    <div class="row">
                        <!-- Kolom Kiri: Produk -->
                        <div class="col-lg-6 col-md-12">
                            <h2>Produk yang dipilih</h2>
                            <table style="width: 100%;">
                                <tbody>
                                    <input type="hidden" name="shop[]" value="1;Teh Botol;5000;2;10000">
                                    <tr>
                                        <td>
                                            Teh Botol<br>
                                            <small>Rp 5.000 x 2</small>
                                        </td>
                                        <td class="text-end">
                                            <b>Rp 10.000</b>
                                        </td>
                                    </tr>

                                    <input type="hidden" name="shop[]" value="2;Indomie Goreng;3500;3;10500">
                                    <tr>
                                        <td>
                                            Indomie Goreng<br>
                                            <small>Rp 3.500 x 3</small>
                                        </td>
                                        <td class="text-end">
                                            <b>Rp 10.500</b>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="padding-top: 20px; font-size: 20px;"><b>Total</b></td>
                                        <td class="text-end" style="padding-top: 20px; font-size: 20px;"><b>Rp 20.500</b></td>
                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="total_price" id="total" value="20500">
                        </div>

                        <!-- Kolom Kanan: Member & Pembayaran -->
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group mb-3">
                                <label for="member" class="form-label">Member Status</label>
                                <small class="text-danger">Dapat juga membuat member</small>
                                <select name="member" id="member" class="form-select" onchange="memberDetect()">
                                    <option value="Bukan Member">Bukan Member</option>
                                    <option value="Member">Member</option>
                                </select>
                            </div>

                            <div id="member-wrap" class="d-none mb-3">
                                <div class="form-group">
                                    <label for="no_hp" class="form-label">No Telepon <small class="text-danger">(daftar/gunakan member)</small></label>
                                    <input type="number" name="no_hp" id="no_hp" class="form-control" maxlength="13" onkeypress="if(this.value.length==13) return false;">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="total_pay" class="form-label">Total Bayar</label>
                                <input type="text" name="total_payment" id="total_pay" class="form-control" oninput="formatPrice(this);checkTotalPay();" required>
                                <small id="error-message" class="text-danger d-none">Jumlah bayar kurang.</small>
                            </div>

                            <div class="text-end">
                                <button class="btn btn-primary" id="submit-button" type="submit" disabled>Pesan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function checkTotalPay() {
            const total = 20500;
            const totalPay = document.getElementById('total_pay').value;
            const errorMessage = document.getElementById('error-message');
            const submitBtn = document.getElementById('submit-button');
            const pay = convertToNumber(totalPay);

            if (pay < total) {
                errorMessage.classList.remove('d-none');
                submitBtn.disabled = true;
            } else {
                errorMessage.classList.add('d-none');
                submitBtn.disabled = false;
            }
        }

        function convertToNumber(str) {
            return parseInt(str.replace(/[^\d]/g, '')) || 0;
        }

        function formatPrice(input) {
            let angka = input.value.replace(/[^\d]/g, '');
            if (!angka) {
                input.value = '';
                return;
            }
            let formatted = new Intl.NumberFormat('id-ID').format(angka);
            input.value = 'Rp ' + formatted;
        }

        function cleanPrice() {
            let input = document.getElementById('total_pay');
            input.value = input.value.replace(/[^\d]/g, '');
        }

        function memberDetect() {
            const memberStatus = document.getElementById('member').value;
            const wrap = document.getElementById('member-wrap');
            if (memberStatus === 'Member') {
                wrap.classList.remove('d-none');
            } else {
                wrap.classList.add('d-none');
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('total_pay');
            if (input && input.value) {
                formatPrice(input);
            }
        });
    </script>
@endsection
