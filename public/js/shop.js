



initCart()

function initCart(){
    let cartList = JSON.parse(localStorage.getItem('cartList'))
    updateListAndTotal(cartList)
    if(cartList && cartList.length > 0){
        document.querySelector('.cartBlock').style.display = 'flex';
    }
}

function updateListAndTotal(cartList){
    let totalBlock = document.getElementById('cartBlockSum')
    if(cartList){
        if(cartList.length > 0){
            let cartTotal = 0
            cartList.map(el => {
                cartTotal += Number(el.count) * Number(el.price)
            })
            document.querySelector('.cartBlock').style.display = 'flex';
            totalBlock.innerText = cartTotal
        }else{
            localStorage.setItem('cartList', '[]')
            totalBlock.innerText = 0
            // document.querySelector('.cartBlock').style.display = 'none';
        }
    }else{
        localStorage.setItem('cartList', '[]')
        totalBlock.innerText = 0
        // document.querySelector('.cartBlock').style.display = 'none';
    }
}

function addToCart(id, price, title){
    let list = localStorage.getItem('cartList')
    if(list){
        let arr = JSON.parse(list)
        if(arr.length > 0){
            let isId = arr.find(el => el.id === id)
            if(isId){
                arr.map((ele) => {
                    if(ele.id === id){
                        ele.count += 1
                        ele.total = ele.count * ele.price
                    }
                })
            }else{
                arr.push({
                    id: id,
                    count: 1,
                    price: price,
                    title: title,
                    total: price
                })
            }
        }else{
            arr.push({
                id: id,
                count: 1,
                price: price,
                title: title,
                total: price
            })
        }
        localStorage.setItem('cartList', JSON.stringify(arr))
        updateListAndTotal(arr)
    }
}






// cart page

// let orderDone = document.getElementById('orderDone')

function showOrderDetails(){
    let block = document.getElementById('orderDetails')
    if(block){
        if(block.style.display === 'block'){
            block.style.display = 'none';
        }else{
            block.style.display = 'block';
        }
    }
}



initCheckout()
function initCheckout(){
    let cartList = localStorage.getItem('cartList')
    cartList = JSON.parse(cartList)
    if(cartList){
        let noItems = document.getElementById('noItems')
        let orderForm = document.getElementById('orderForm')
        if(cartList.length > 0){
            returnCheckoutRows()
            if(noItems){
                noItems.style.display = 'none'
            }
            if(orderForm){
                orderForm.style.display = 'block'
            }
        }else{
            if(noItems){
                noItems.style.display = 'block'
            }
            if(orderForm){
                orderForm.style.display = 'none'
            }
        }
    }
}

function returnCheckoutRows(){
    let cartList = localStorage.getItem('cartList')
    let checkoutList = document.getElementById('checkoutList')
    let cartSumBlock = document.getElementById('cartSum')
    let cartSum = Number(0)

    if(cartList && checkoutList){
        cartList = JSON.parse(cartList)
        let arr = []
        if(cartList.length > 0){
            cartList.map((el) => {
                let row = returnCheckoutRow(el)
                checkoutList.insertAdjacentHTML('afterbegin', row)
                arr.push(row)
                cartSum += el.count * el.price
            })
        }
        cartSumBlock.innerText = cartSum

    }
}

function returnCheckoutRow(el){
    return `<div class="cartItem">
            <span class="itemTitle" style="">
                ${el.title}
            </span>
            <input name="form[${el.id}][id]" value="${el.id}" type="hidden">
            <input name="form[${el.id}][count]" value="${el.count}" type="hidden">
            <input name="form[${el.id}][price]" value="${el.price}" type="hidden">
            <div class="amountBlock">
                <svg onclick="decrementItem(${el.id})" style="fill:#fff; cursor:pointer; width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z"/></svg>
                <span class="amount">
                    ${el.count}
                </span>
                <svg onclick="incrementItem(${el.id})" style="fill:#fff; cursor:pointer; width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg>

                <span class="price">
                    ${el.price * el.count}
                    грн
                </span>
                <svg onclick="removeItem(${el.id})" style=" fill:#fff; cursor:pointer; width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>

            </div>
        </div>`
}


function removeItem(id){
    let cartList = getLocalStorageList()
    let arr = []
    if(cartList.length){
        arr = cartList.filter((el) => el.id != id)
    }
    $('.cartItem').remove();
    localStorage.setItem('cartList', JSON.stringify(arr))
    initCheckout()
}



function decrementItem(id){
    let cartList = getLocalStorageList()
    if(cartList.length){
        $('.cartItem').remove();
        cartList.map(el => {
            if(el.id === id){
                if(el.count > 1){
                    el.count -=1
                }
            }
        })
        localStorage.setItem('cartList', JSON.stringify(cartList))
        initCheckout()
    }

}
function incrementItem(id){
    let cartList = getLocalStorageList()
    if(cartList.length){
        $('.cartItem').remove();
        cartList.map(el => {
            if(el.id === id){
                el.count +=1
            }
        })
        localStorage.setItem('cartList', JSON.stringify(cartList))
        initCheckout()
    }
}

function getLocalStorageList(){
    let cartList = localStorage.getItem('cartList')
    if(cartList){
        cartList = JSON.parse(cartList)
        return cartList
    }
    else{
        return  []
    }
}


function submitForm(){
    $("#orderForm").submit(function () {
        let cartList = localStorage.setItem('cartList', '[]')
    });
}

function personsHandler(flag){
    let input = document.getElementById('persons')
    let inputValue = Number(input.value)
    if(flag === 'minus'){
        if(inputValue > 1){
            inputValue -= 1
        }
    }else if(flag === 'plus'){
        inputValue += 1
    }
    input.value = inputValue
}

