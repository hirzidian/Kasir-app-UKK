@extends('template')

@section('title', 'product')

@section('content')
<div class="row" id="product-list">
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light">
                <img src="{{ asset('path/to/image.jpg') }}" class="w-50">
            </div>
            <div class="card-body">
                <h5 class="mb-3 card-title" id="name_1">Product 1</h5>
                <p>Stok 10</p>
                <h6 class="mb-3">Rp. 100,000</h6>
                <p id="price_1" hidden="">100000</p>
                <center>
                    <table>
                        <tbody>
                            <tr>
                                <td style="padding: 0px 10px; cursor: pointer;" class="minus" data-id="1">
                                    <b>-</b>
                                </td>
                                <td style="padding: 0px 10px;" class="num" id="quantity_1">0</td>
                                <td style="padding: 0px 10px; cursor: pointer;" class="plus" data-id="1">
                                    <b>+</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </center>
                <br>
                <p>Sub Total <b><span id="total_1">Rp. 0</span></b></p>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light">
                <img src="{{ asset('path/to/image.jpg') }}" class="w-50">
            </div>
            <div class="card-body">
                <h5 class="mb-3 card-title" id="name_2">Product 2</h5>
                <p>Stok 20</p>
                <h6 class="mb-3">Rp. 150,000</h6>
                <p id="price_2" hidden="">150000</p>
                <center>
                    <table>
                        <tbody>
                            <tr>
                                <td style="padding: 0px 10px; cursor: pointer;" class="minus" data-id="2">
                                    <b>-</b>
                                </td>
                                <td style="padding: 0px 10px;" class="num" id="quantity_2">0</td>
                                <td style="padding: 0px 10px; cursor: pointer;" class="plus" data-id="2">
                                    <b>+</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </center>
                <br>
                <p>Sub Total <b><span id="total_2">Rp. 0</span></b></p>
            </div>
        </div>
    </div>

    <!-- You can add more product cards here with similar structure -->

    <form action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <div class="row fixed-bottom d-flex justify-content-end align-content-center"
            style="margin-left: 18%; width: 83%; height: 70px; border-top: 3px solid #EEE4B1; background-color: white;">
            <div class="text-center col" style="margin-right: 50px;">
                <div id="shop"></div>
                <button type="submit" class="btn btn-primary" id="next-button" disabled>Selanjutnya</button>
            </div>
        </div>
    </form>
</div>

<script>
    function checkNextButtonStatus() {
        let anyOrder = false;
        document.querySelectorAll('.num').forEach(function(quantityElem) {
            const quantity = parseInt(quantityElem.innerText);
            if (quantity > 0) {
                anyOrder = true;
            }
        });
        const nextButton = document.getElementById('next-button');
        nextButton.disabled = !anyOrder;
    }

    function updateQuantity(productId, maxStock) {
        let quantity = parseInt(document.getElementById('quantity_' + productId).innerText);
        const price = parseInt(document.getElementById('price_' + productId).innerText);
        const name = document.getElementById('name_' + productId).innerText;

        if (quantity > maxStock) {
            alert('Jumlah melebihi stok.');
            quantity = maxStock;
            document.getElementById('quantity_' + productId).innerText = quantity;
        }

        const subtotal = quantity * price;
        document.getElementById('total_' + productId).innerText = "Rp. " + subtotal.toLocaleString();

        const existingInput = document.getElementById(`shop_${productId}`);
        if (existingInput) {
            if (quantity > 0) {
                existingInput.value = `${productId};${name};${price};${quantity};${subtotal}`;
            } else {
                existingInput.remove(); // hapus input jika quantity 0
            }
        } else {
            if (quantity > 0) {
                addShopInput(productId, name, price, quantity, subtotal);
            }
        }

        checkNextButtonStatus();
    }

    function addShopInput(productId, name, price, quantity, subtotal) {
        const shop = document.getElementById('shop');
        const input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'shop[]');
        input.setAttribute('id', `shop_${productId}`);
        input.setAttribute('value', `${productId};${name};${price};${quantity};${subtotal}`);
        shop.appendChild(input);
    }

    document.querySelectorAll('.plus').forEach(function(button) {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const quantityElem = document.getElementById('quantity_' + productId);
            let quantity = parseInt(quantityElem.innerText);
            quantity++;
            quantityElem.innerText = quantity;

            const maxStock = parseInt(document.getElementById('quantity_' + productId).closest('.card-body').querySelector('p').innerText.replace('Stok ', ''));
            updateQuantity(productId, maxStock);
        });
    });

    document.querySelectorAll('.minus').forEach(function(button) {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            const quantityElem = document.getElementById('quantity_' + productId);
            let quantity = Math.max(0, parseInt(quantityElem.innerText) - 1);
            quantityElem.innerText = quantity;

            const maxStock = parseInt(document.getElementById('quantity_' + productId).closest('.card-body').querySelector('p').innerText.replace('Stok ', ''));
            updateQuantity(productId, maxStock);
        });
    });

    // Initial check on page load
    checkNextButtonStatus();
</script>

@endsection
