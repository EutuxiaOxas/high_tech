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
                <div class="col-6">
                    TOTAL:
                </div>
                <div class="col-6 text-right" id="amount_modal_shopping_car">
                    15.67 $USD
                </div>
            </div>
          </div>

          <div class="modal-footer px-1 pb-1 pt-0">
            <button type="button" class="btn btn-primary btn-sm col-12" id="finalizarCompraButton">Finalizar compra</button>
          </div>
        </div>
      </div>
  </div>

  <script>
      document.addEventListener("DOMContentLoaded", function() {
        const open_modal_shopping_car = document.getElementById('open_modal_shopping_car')
        open_modal_shopping_car.addEventListener('click', event => {

            // obtengo los productos del local storage
            let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');

            if( productsInShoppingCar !== null ){
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
                    amount+= element.price * element.quantity;


                    select = document.createElement('select');

                    for (let i = 0; i <= element.avalaible; i++) {
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

                    container_products_modal_shopping_car.appendChild(cardProduct);
                });


                // agrego el total
                document.getElementById('amount_modal_shopping_car').textContent = `${amount} $USD`

            }


            // Eliminar un producto del carrit de compras
            const delete_product = document.querySelectorAll('.delete_product')
            delete_product.forEach(element => {

                element.addEventListener('click', event => {

                    const product_div = element.parentElement.parentElement.parentElement.parentElement;
                    product_div.style.display = 'none';

                    let product_id = product_div.querySelector('.product_id').textContent

                    // Lo elimino del localstorage
                    deleteProductByLocalStorage( product_id );

                    updateBadgeProducts();

                })

            });
        })

        updateBadgeProducts();

        const finalizarCompraButton = document.getElementById('finalizarCompraButton')
        finalizarCompraButton.addEventListener('click', event => {
            let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');
            let products = JSON.parse(productsInShoppingCar);

            products.forEach(element => {
                element.image = '';                
            });
            let data = JSON.stringify(products);

            // creo la variable de sesion para guardar los datos del carrito de compras en backend
            axios({
                        method  : 'GET',
                        url     : '/sesion-shopping-car/'+data,
                        headers : {
                            'content-type': 'application/json'
                            }
                    }).then((res)=>{}).catch((err) => {console.log(err)});

            // creo la variable de sesion para guardar los datos del carrito de compras en backend
            axios({
                        method  : 'GET',
                        url     : '/islogin/',
                        headers : {
                            'content-type': 'application/json'
                            }
                    })
                    .then((res)=>{
                        // Usuario logeado
                        if(res.data == true){
                            // En caso de estarlo, lo direcciono a la ruta q crea la orden, y luego direcciono a la vista del formulario de pago
                            window.location.href = "/create-order";
                        }else{
                            // Usuario no logeado
                            window.location.href = "/login-order";
                            // al iniciar sesion, verifico si el usuario tiene productos en el carrito, en caso de si, creo la orden y lo envio a la vista del formulario de pago.
                        }
                    })
                    .catch((err) => {console.log(err)});

        });

      })

    //   Funcion para eliminar un producto desde el modal de carrito de compras
    function deleteProductByLocalStorage( product_id ){
        // obtengo los productos del local storage
        let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');

        if( productsInShoppingCar !== null ){
            let products = JSON.parse(productsInShoppingCar);

            let productInShppingCar = false;
            let keyArray = 0;

            products.forEach(element => {
                if( element.id == product_id ){
                    productInShppingCar = true;
                }

                if (!productInShppingCar){
                    keyArray++;
                }
            });

            if ( productInShppingCar ){
                // Se elimina el producto del carrito de compras
                products.splice(keyArray, 1);
            }

            localStorage.setItem('productsInShoppingCar',JSON.stringify(products));

        }

    }

    // Fuyncion para actualizar el badge de carrito de compras
    function updateBadgeProducts(){

        let productsInShoppingCar = localStorage.getItem('productsInShoppingCar');

        const badge_products = document.getElementById('badge_products')

        if( productsInShoppingCar !== null ){
            let products = JSON.parse(productsInShoppingCar);

            if( products.length > 0){

                badge_products.style.display = 'block';

                let total_products = 0;
                products.forEach(product => {

                    total_products += parseInt(product.quantity);

                })


                badge_products.textContent = total_products;

            }else{
                badge_products.style.display = 'none';
            }
        }

    }

    


    // Al dar click en el boton de 'Finalizar Compra'
    // Creo en sesion, via api, una variable que guardara los datos del carrito de compras
    // consulto, via api, si el usuario esta logeado
    // En caso de estarlo, lo direcciono a la ruta q crea la orden, y luego direcciono a la vista del formulario de pago
    // Si no esta logeado, lo direcciono a la vista donde le informo que 'debe iniciar sesion para concretar la compra'
    // al iniciar sesion, verifico si el usuario tiene productos en el carrito, en caso de si, creo la orden y lo envio a la vista del formulario de pago.

  </script>
