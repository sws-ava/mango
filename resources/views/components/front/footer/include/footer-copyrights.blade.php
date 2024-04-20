<div class="cell-xs-12 offset-top-42">
    <hr class="hr-gray hr-fullwidth">
</div>
<section style="margin-bottom: 30px;" class="copyright offset-top-30 offset-md-top-42">
    <div class="shell">
        <p onclick="clearLocalStorage()" class="pull-sm-center">© Sushi-Mango 2019 - {{ date("Y") }}</p>
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
</section>
