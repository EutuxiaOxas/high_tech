<div class="modal fade" id="modal_shopping_car" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 525px;">
        <div class="modal-content">
            <div class="modal-header px-1 pt-1 pb-1">
                <div class="col-11 px-0">
                    <h5 class="modal-title text-base font-bold">Carrito de compras</h5>
                    <span class="text-sm font-light">Agrega todos los productos que desees</span>
                </div>
                <button type="button" class="close col-1" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-1 py-1">
                <h6 class="font-semibold text-base">Listado de productos</h6>
                <div class="" id="container_products_modal_shopping_car">
                    
                </div>
                <div class="text-center" id="carEmptyMessage">
                    <img class="mx-auto" width="70%" src="{{asset('svg/empty-car.svg')}}" alt="Logo High Tech carro vacio" loading="lazy">
                    <div class="my-3">Aún no tienes productos en el carrito de compras.</div>
                </div>

                <div class="hidden" id="example">
                    <div class="col">
                        <div class="row px-0 mb-1">
                            <div class="col-3 align-self-center">
                                <img src="" class="imgProduct" width="auto" height="60px">
                            </div>
                            <div class="col-9 px-0">
                                <div class="row px-0 align-items-center">
                                    <div class="col-11 pr-0">
                                        <div class="titleProduct text-sm"></div>
                                    </div>
                                    <button class="col-1 btn px-0 py-0 delete_product">
                                        x
                                    </button>
                                </div>
                                <div class="row align-items-end">
                                    <div class="col-6">
                                        <div class="text-lg">
                                            <span class="font-semibold priceProduct"></span>
                                            <span class="font-light">$USD</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <span class="text-sm text-muted">Cantidad</span>
                                        <div class="selectQuantity"></div>
                                    </div>
                                </div>
                            </div>
                            <span hidden class="product_id"></span>
                        </div>
                    </div>
                </div>
                {{-- TOTAL --}}
                <div class="row text-lg font-semibold mt-4">
                    <div class="col-6" id="title_amount_modal_shopping_car">
                        
                    </div>
                    <div class="col-6 text-right" id="amount_modal_shopping_car">
                    </div>
                </div>
            </div>

            <div class="modal-footer px-1 pb-1 pt-0" id="containerButtonFinalizar">
                <button type="button" class="btn btn-primary btn-sm col-12" id="finalizarCompraButton">Finalizar compra</button>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.querySelectorAll('.open_modal_shopping_car').forEach(item => {
            item.addEventListener('click', event => {

                let containerButtonFinalizar = document.getElementById('containerButtonFinalizar')
                containerButtonFinalizar.style.display = 'none';

                // obtengo los productos del local storage
                let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');

                if (productsInShoppingCar !== null) {
                    let products = JSON.parse(productsInShoppingCar);

                    // total a pagar
                    let amount = 0;

                    const container_products_modal_shopping_car = document.getElementById('container_products_modal_shopping_car');
                    container_products_modal_shopping_car.innerHTML = '';
                    const example = document.getElementById('example')

                    products.forEach(element => {
                        let cardProduct = example.firstElementChild.cloneNode(true);

                        cardProduct.querySelector('.product_id').textContent = element.id

                        let imgProduct = cardProduct.querySelector('.imgProduct')
                        let titleProduct = cardProduct.querySelector('.titleProduct')
                        let priceProduct = cardProduct.querySelector('.priceProduct')
                        let selectQuantity = cardProduct.querySelector('.selectQuantity')

                        imgProduct.src = element.image
                        titleProduct.textContent = element.title
                        priceProduct.textContent = element.price
                        amount += element.price * element.quantity;


                        select = document.createElement('select');

                        for (let i = 1; i <= (element.avalaible - 1) ; i++) {
                            let option = document.createElement("option");
                            option.text = i;
                            option.value = i;
                            select.add(option);
                        }
                        selectQuantity.appendChild(select)
                        select.value = element.quantity
                        select.style.opacity = 1;
                        select.style.width = '100px';
                        select.style.border = 'solid 1px #eee';
                        select.style.fontSize = '0.85rem';
                        select.style.fontWeight = '500';
                        select.style.borderRadius = '2px';
                        select.style.padding = '4px 15px';
                        select.classList.add('select_modal');

                        // agrego el evento al cambiar la cantidad mediante el select
                        select.addEventListener('change', function(e) {
                            updateProductInShoppingCar(element.id, e.target.value);
                        })

                        container_products_modal_shopping_car.appendChild(cardProduct);
                    });


                    // agrego el total
                    document.getElementById('amount_modal_shopping_car').textContent = `${amount} $USD`

                }
                updateBadgeProducts();
                updateTotalAmount();


                // Eliminar un producto del carrit de compras
                const delete_product = document.querySelectorAll('.delete_product')
                delete_product.forEach(element => {

                    element.addEventListener('click', event => {

                        const product_div = element.parentElement.parentElement.parentElement.parentElement;
                        product_div.style.display = 'none';

                        let product_id = product_div.querySelector('.product_id').textContent

                        // Lo elimino del localstorage
                        deleteProductByLocalStorage(product_id);

                        updateBadgeProducts();
                        updateTotalAmount();

                    })

                });
            })
        })

        updateBadgeProducts();
        updateTotalAmount();

        const finalizarCompraButton = document.getElementById('finalizarCompraButton')
        finalizarCompraButton.addEventListener('click', event => {
            let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');
            let products = JSON.parse(productsInShoppingCar);

            products.forEach(element => {
                element.image = '';
                element.title = '';
            });
            let data = JSON.stringify(products);

            // creo la variable de sesion para guardar los datos del carrito de compras en backend
            axios({
                method: 'GET',
                url: '/sesion-shopping-car/' + data,
                headers: {
                    'content-type': 'application/json'
                }
            }).then((res) => {}).catch((err) => {
                console.log(err)
            });

            // creo la variable de sesion para guardar los datos del carrito de compras en backend
            axios({
                    method: 'GET',
                    url: '/islogin/',
                    headers: {
                        'content-type': 'application/json'
                    }
                })
                .then((res) => {
                    // Usuario logeado
                    if (res.data == true) {
                        // elimino lo q hay en localStorage
                        localStorage.removeItem('productsInShoppingCar');
                        // En caso de estarlo, lo direcciono a la ruta q crea la orden, y luego direcciono a la vista del formulario de pago
                        window.location.href = "/create-order";
                    } else {
                        // Usuario no logeado
                        window.location.href = "/login-order";
                        // al iniciar sesion, verifico si el usuario tiene productos en el carrito, en caso de si, creo la orden y lo envio a la vista del formulario de pago.
                    }
                })
                .catch((err) => {
                    console.log(err)
                });

        });

    })

    //   Funcion que actualiza en local storage un producto
    function updateProductInShoppingCar(product_id, quantity) {
        // obtengo los productos del local storage
        let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');

        if (productsInShoppingCar !== null) {
            let products = JSON.parse(productsInShoppingCar);

            products.forEach(element => {
                if (element.id == product_id) {
                    element.quantity = quantity;
                }

            });

            localStorage.setItem('productsInShoppingCar', JSON.stringify(products));
            updateBadgeProducts();
            updateTotalAmount();

        }

    }

    //   Funcion para eliminar un producto desde el modal de carrito de compras
    function deleteProductByLocalStorage(product_id) {
        // obtengo los productos del local storage
        let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');

        if (productsInShoppingCar !== null) {
            let products = JSON.parse(productsInShoppingCar);

            let productInShppingCar = false;
            let keyArray = 0;

            products.forEach(element => {
                if (element.id == product_id) {
                    productInShppingCar = true;
                }

                if (!productInShppingCar) {
                    keyArray++;
                }
            });

            if (productInShppingCar) {
                // Se elimina el producto del carrito de compras
                products.splice(keyArray, 1);
            }

            localStorage.setItem('productsInShoppingCar', JSON.stringify(products));

        }

    }

    // Fuyncion para actualizar el badge de carrito de compras
    function updateBadgeProducts() {
        
        let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');
        
        let carEmptyMessage = document.getElementById('carEmptyMessage')
        let containerButtonFinalizar = document.getElementById('containerButtonFinalizar')     
        const badge_products = document.querySelectorAll('.badge_products')

        if (productsInShoppingCar !== null) {
            let products = JSON.parse(productsInShoppingCar);

            if (products.length > 0) {

                badge_products.forEach(element => {
                    element.style.display = 'block';
                });
                carEmptyMessage.style.display = 'none';
                containerButtonFinalizar.style.display = 'block';

            } else {
                badge_products.forEach(element => {
                    element.style.display = 'none';
                });
                carEmptyMessage.style.display = 'block';
                containerButtonFinalizar.style.display = 'none';
            }
        }

    }

    // Fuyncion para actualizar el badge de carrito de compras
    function updateTotalAmount() {
        
        let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');
        let title_amount_modal_shopping_car = document.getElementById('title_amount_modal_shopping_car');
        let amount_modal_shopping_car = document.getElementById('amount_modal_shopping_car');

        if (productsInShoppingCar !== null) {
            let products = JSON.parse(productsInShoppingCar);

            if (products.length > 0) {

                let total_amount = 0;
                products.forEach(product => {

                    total_amount += parseInt(product.quantity)*parseFloat(product.price);

                })

                amount_modal_shopping_car.innerHTML = parseFloat(Math.round(total_amount * 100) / 100).toFixed(2) + ' $USD';
                title_amount_modal_shopping_car.innerHTML = 'TOTAL:';

            } else {
                amount_modal_shopping_car.innerHTML = '';
                title_amount_modal_shopping_car.innerHTML = '';
            }
        }

    }



</script>