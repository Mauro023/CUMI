@extends('layouts.app')

@section('content')
<div>
    <section class="content-header">
        <div class="container-fluid d-flex align-items-center justify-content-center" style="height: 70vh;">
            <div class="banner_img d-flex align-items-center justify-content-center">
                <img src="{{ asset('images/LOGO_cumi_Mesa-de-trabajo-1.png') }}" alt="CUMI" style="max-width: 60%">
            </div>
        </div>
    </section>
    <div class="burbujas">
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
        <div class="burbuja"></div>
    </div>
</div>

<style>
    .banner_img{
        animation: movimiento 2.5s linear infinite;
    }

    @keyframes movimiento{
        0%{
            transform: translateY(0);
        }
        50%{
            transform: translateY(30px);
        }
        100%{
            transform: translateY(0);
        }
    }

    /*  BURBUJAS*/
    .burbuja{
        border-radius: 50%;
        background: #15B6EB;
        opacity: .3;

        position: absolute;
        bottom: -100px;

        animation: burbujas 3s linear infinite;
    }

    .burbuja:nth-child(1){
        width: 80px;
        height: 80px;

        animation-duration: 3s;
        animation-delay: 3s;
    }

    .burbuja:nth-child(2){
        width: 100px;
        height: 100px;
        left: 35%;
        animation-duration: 3s;
        animation-delay: 5s;
    }

    .burbuja:nth-child(3){
        width: 20px;
        height: 20px;
        left: 15%;
        animation-duration: 1.5s;
        animation-delay: 7s;
    }

    .burbuja:nth-child(4){
        width: 50px;
        height: 50px;
        left: 90%;
        animation-duration: 6s;
        animation-delay: 3s;
    }

    .burbuja:nth-child(5){
        width: 70px;
        height: 70px;
        left: 65%;
        animation-duration: 3s;
        animation-delay: 1s;
    }

    .burbuja:nth-child(6){
        width: 60px;
        height: 60px;
        left: 52%;
        animation-duration: 4s;
        animation-delay: 7s;
    }

    .burbuja:nth-child(7){
        width: 20px;
        height: 20px;
        left: 50%;
        animation-duration: 4s;
        animation-delay: 5s;
    }

    .burbuja:nth-child(8){
        width: 100px;
        height: 100px;
        left: 70%;
        animation-duration: 5s;
        animation-delay: 5s;
    }

    .burbuja:nth-child(9){
        width: 65px;
        height: 65px;
        left: 81%;
        animation-duration: 3s;
        animation-delay: 2s;
    }

    .burbuja:nth-child(10){
        width: 40px;
        height: 40px;
        left: 35%;
        animation-duration: 3s;
        animation-delay: 4s;
    }

    @keyframes burbujas{
        0%{
            bottom: 0;
            opacity: 0;
        }
        30%{
            transform: translateX(30px);
        }
        50%{
            opacity: .4;
        }
        100%{
            bottom: 100vh;
            opacity: 0;
        }
    }
</style>
@endsection