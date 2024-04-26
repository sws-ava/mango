<footer class="section-relative section-top-66 section-bottom-34 page-footer bg-gray-base context-dark">
    <div class="shell offset-top-50">
        <p class="small text-darker">© Sushi-Mango 2015-{{ date("Y") }}</p>
    </div>
    <script>
        function clearLocalStorage(){
            localStorage.removeItem('cartList')
            let cartBlock = document.getElementById('cartBlockSum')
            cartBlock.innerText = '0'
            let cartBlockHolder = document.querySelector('.cartBlock')
            cartBlockHolder.style.display = 'none'
            localStorage.setItem('cartList', '[]')
        }
    </script>
</footer>
