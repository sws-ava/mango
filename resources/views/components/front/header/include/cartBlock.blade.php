
<a
    href="{{ LaravelLocalization::localizeUrl('/cart') }}"
    href="/cart"
    class="cartBlock"
    style="display: none"
>
{{--    <i--}}
{{--        style="width: 20px; height: 20px;"--}}
{{--        class="fa-icon fa fa-cart-plus"--}}
{{--        aria-hidden="true">--}}
{{--    </i>--}}
    <svg style="width: 20px; height: 20px; margin-right: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96zM252 160c0 11 9 20 20 20h44v44c0 11 9 20 20 20s20-9 20-20V180h44c11 0 20-9 20-20s-9-20-20-20H356V96c0-11-9-20-20-20s-20 9-20 20v44H272c-11 0-20 9-20 20z"/></svg>

    <div class="nums">
        <div><span id="cartBlockSum">123</span> грн</div>
    </div>
</a>


<style>
    .cartBlock {
        background-color: #ffcb1f;
        width: 145px;
        border-radius: 5px;
        color: #000;
        padding: 10px;
        position: fixed;
        right: 20px;
        top: 102px;
        z-index: 10;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }
    .cartBlock .nums {
        margin-left: 10px;
    }
    .cartBlock .nums span {
        font-weight: 700;
    }
    @media (max-width: 700px) {
        .cartBlock {
            left: 50%;
            transform: translateX(-50%);
            bottom: 20px;
            top: auto;
        }
    }

</style>
