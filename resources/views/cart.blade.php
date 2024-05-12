@extends('layout.main')

@section('title') Cart @endsection
@section('description') Description @endsection



@section('content')

    <div class="mb200">
        <form id="orderForm" action="{{ route('order.create') }}"  method="POST" style="display: none">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="shell">
                <h2 class="text-center" style="margin-bottom: 50px;">
                    @lang('static.yourOrder')
                </h2>
                <div id="checkoutList" class="cartItems">
                    <div class="cartSum">
                        @lang('static.orderSum') <span id="cartSum"></span> грн
                    </div>
                </div>
                <div
                    onclick="showOrderDetails()"
                    class="designCart"
                >
                    @lang('static.toDesignOrder')
                </div>
            </div>
            <div id="orderDetails" v-if="showDesignOrderBlock" style="margin-top: 100px; display: none">
                <div class="shell">
                    <div class="range cartForm">
                        <div class="cell-sm-12 cell-md-4">
                            <label for="" class="text-left">
                                @lang('static.orderName')
                            </label>
                            <input
                                name="name"
                                required
                                type="text"
                                class="form-control"
                            >
                        </div>
                        <div class="cell-sm-12 cell-md-4">
                            <label for="" class="text-left">
                                @lang('static.orderPhone')
                            </label>
                            <input
                                id="phone"
                                name="phone"
                                type="text"
                                class="form-control"
                            >
                        </div>
                        <div class="cell-sm-12 cell-md-6">
                            <label for="" class="text-left">
                                @lang('static.orderAddress')
                            </label>
                            <input
                                required
                                name="address"
                                type="text"
                                class="form-control"
                            >
                        </div>
                        <div class="cell-sm-12 cell-md-2">
                            <label for="" class="text-left">
                                @lang('static.orderPersons')
                            </label>
                            <i
                                onclick="personsHandler('minus')"
                                style="width: 20px; height: 20px;"
                                class="icons fa-icon fa fa-minus"
                                aria-hidden="true">
                            </i>
                            <input
                                required
                                id="persons"
                                name="persons"
                                type="number"
                                value="1"
                                min="1"
                                class="form-control"
                            >
                            <style>
                                .stepper-arrow.up,
                                .stepper-arrow.down {
                                    display: none;
                                }

                            </style>
                            <i
                                onclick="personsHandler('plus')"
                                style="width: 20px; height: 20px;"
                                class="icons fa-icon fa fa-plus"
                                aria-hidden="true">
                            </i>
                        </div>
                        <div class="cell-sm-12 cell-md-8">
                            <label for="" class="text-left">
                                @lang('static.orderComment')
                            </label>
                            <textarea
                                name="comment"
                                id=""
                                cols="30"
                                rows="10"
                                class="form-control"
                            ></textarea>
                        </div>
                    </div>
                    <div class="range cartForm">
                        <button
                            type="submit"
                            onclick="submitForm()"
                            class="designCart designCartCheckout"
                        >
                            @lang('static.orderNow')
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div id="noItems" style="display: none">
            <div class="range" style="margin-top: 50px; margin-bottom: 50px; flex-direction: column;">
                <h2 class="text-center" style="margin: 0 auto 50px;">
                    {{ $translates['orderEpmty']}}
                </h2>
                <div>
                    <a
                        class="text-center"
                        style="font-size: 30px; margin-top: 10px; display: block;"
                        href="{{ LaravelLocalization::localizeUrl('/menu') }}"
                    >
                        {{ $translates['toMenu']}}
                    </a>
                </div>
            </div>
        </div>
        <div id="orderDone" style="display: none">
            <div class="range" style="margin-top: 50px; margin-bottom: 50px;">
                <h2 class="text-center" style="margin: 0 auto 50px;">
                    {{ $translates['orderGet']}}
                </h2>
            </div>
        </div>
    </div>
    <script>
        let cartBlock = document.querySelector('.cartBlock')
        cartBlock.style.opacity = 0;
        cartBlock.style.position = 'absolute';
        cartBlock.style.left = '-5000px';

    </script>
    <style>
        .cartForm {
            justify-content: center;
        }
        .cartForm .form-control {
            margin-bottom: 15px;
        }
        .cartForm textarea {
            resize: none;
        }
        .cartForm label {
            margin-bottom: 5px;
            text-align: left;
            width: 100%;
        }
        .cartItems {
            /*max-width: 800px;*/
            margin: 0 auto 20px;
        }
        .cartItem {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 16px;
            margin-bottom: 20px;
        }
        @media (max-width: 767px) {
            .cartItem {
                flex-direction: column;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                padding-bottom: 20px;
            }
        }
        .cartSum {
            border-top: 1px solid rgba(255, 255, 255, 0.6);
            padding-top: 20px;
            font-size: 20px;
            color: #e0ca8f;
        }
        .cartSum span {
            font-weight: 700;
        }
        @media (max-width: 767px) {
            .cartSum {
                border-top: none;
            }
        }
        .amountBlock {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        @media (max-width: 767px) {
            .amountBlock {
                margin-top: 10px;
            }
        }
        .amountBlock .amount {
            margin-left: 10px;
            margin-right: 10px;
            line-height: 1;
        }
        .amountBlock .price {
            margin-left: 20px;
            white-space: nowrap;
            width: 101px;
        }
        @media (max-width: 767px) {
            .amountBlock .price {
                font-size: 18px;
            }
        }
        .itemTitle {
            font-size: 18px;
            text-align: left;
            padding-right: 20px;
            text-transform: uppercase;
        }
        @media (max-width: 767px) {
            .itemTitle {
                text-align: center;
            }
        }
        .mb200 {
            margin-bottom: 200px;
        }
        @media (max-width: 767px) {
            .mb200 {
                margin-bottom: 100px;
            }
        }
        .trashIcon {
            margin-left: 10px;
        }
        @media (max-width: 767px) {
            .trashIcon {
                margin-left: 30px;
            }
        }
        .icons {
            width: 17px;
            height: 17px;
            cursor: pointer;
            transition: scale 0.25s ease-in-out;
        }
        .icons:hover {
            scale: 1.15;
            transition: scale 0.25s ease-in-out;
        }
        @media (max-width: 767px) {
            .icons {
                height: 25px;
                width: 25px;
            }
        }
        .designCart {
            background-color: #ffcb1f;
            width: fit-content;
            border-radius: 5px;
            color: #000;
            padding: 10px 20px;
            text-align: center;
            cursor: pointer;
            margin: 50px auto 50px;
            font-weight: 700;
            transition: scale 0.25s ease-in-out;
        }
        .designCart:hover {
            scale: 1.15;
            transition: scale 0.25s ease-in-out;
        }
        .designCartCheckout {
            margin: 0 auto 50px;
            outline: none;
            border: none;
        }
    </style>
@endsection
