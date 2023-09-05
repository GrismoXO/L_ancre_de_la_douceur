<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/44f406f7d6.js" crossorigin="anonymous"></script>


    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/style.css', 'resources/js/script.js'])
    <title>L'ancre de la douceur</title>
</head>
<body>
    <header class=" h-screen" >
        @include('layouts.navigation')
        <div class=""><img src="{{ asset('storage/hero/hero_home.jpg')}}" alt="hero" srcset="" class="w-screen bg-img z-0 absolute top-28"></div>
        

        <div class="flex flex-col justify-center items-center relative z-10 h-header top-28" >
            <div class="w-full flex justify-center">
                <h1 class="font-black text-5xl kalam w-3/5 text-center h1_800 h1 ">{{ __('Éveillez Votre Beauté Intérieure avec L\'ancre de la Douceur') }}</h1>
            </div>
            <div class="h-8"></div>
            <div class="flex flex-col justify-center">
                <div><p class="kalam text-2xl ">Venez visiter notre boutique</p></div>
                <div class=" w-full flex justify-center"><a href="{{ route('articles.index')}}" class=" flex justify-center border-solid rounded-lg p-2 mt-4 bg_pink w-32 text-white kalam text-xl hover">En savoir +</a></div>
            </div>
            <div style="height:3rem"></div>
            <div class="w-full flex justify-center">
                <div class="flex  w-3/5 bg-white/50 rounded-lg flex_col_800 w_100">
                    <div class=" flex flex-col justify-center items-center w-1/3 w_100">
                        <h4 class="kalam text-2xl">Contact</h4>
                        <p class="open text-base">Facebook</p>
                        <p class="open text-base">Tik Tok</p>
                        <p class="open text-base">Instagram</p>
                    </div>
                    <div class=" flex flex-col justify-center items-center w-1/3 w_100 mt_800">
                        <h4 class="kalam text-2xl">Horaires</h4>
                        <p class="open text-base">De 8h à 19h</p>
                        <p class="open text-base">Du Lundi au Samedi</p>
                    </div>
                    <div class=" flex flex-col justify-center items-center w-1/3 w_100 mt_800">
                        <h4 class="kalam text-2xl">Localisation</h4>
                        <p class="open text-base">14 Rue de la croix piquet</p>
                        <p class="open text-base">63440 POUZOL</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="bg-white z-40">
            <div class="h-16"></div>
            <div><h2 class="flex justify-center text-3xl kalam">Nos services</h2></div>
            <div class="h-12"></div>
            <div class="map blur_price z-20"></div>
            <div class="flex justify-center around">
                <div>
                    <img src="{{ asset('storage/icons/manucure.png')}}" alt="logo manucure" class="h-20 w-20 mb-4">
                    <span class="kalam">Manucure</span>
                </div>
                <div class="mx-48 m_0_800">
                    <img src="{{ asset('storage/icons/epilation.png')}}" alt="logo épilation" class="h-20 w-20 mb-4">
                    <span class="kalam">Épilation</span>
                </div>
                <div>
                    <img src="{{ asset('storage/icons/maquillage.png')}}" alt=" logo maquillage" class="h-20 w-20 mb-4">
                    <span class="kalam">Maquillage</span>   
                </div>
            </div>
            <div class="flex mt-12 justify-center"><p class="open text-xl flex items-center text_black">Pour connaitre les tarifs appliqués chez nous</p></div>
            <div class="flex mt-8 justify-center"><button class="text-xl kalam border border-solid bg_pink px-4 py-2 rounded-lg text-white hover prices">Cliquez ici</button></div>           
            <div class="h-16"></div>
        </div>
        <div class="bg_pink_opa flex flex_col_800 z-40">
            <div class="p-8 flex justify-center w_50 w_100 center">
                <img src="{{asset('storage/profiles/beautician_profile.jpg')}}" alt="photo de la propriètaire" class="w-96 w_100">
            </div>
            <div class="pt-8 w-1/2 w_100 center flex_col_800">
                <h2 class="text-3xl mb-8 mt-8 kalam w_100 center">Clin d'oeil</h2>
                <p class="open w_100 center pb-8 p_800">Chez L'ancre de la Douceur, nous croyons en la puissance de la beauté pour élever votre confiance et illuminer votre essence unique. Notre équipe passionnée d'esthéticiennes expérimentées est dédiée à vous offrir une expérience de soin exceptionnelle qui va au-delà de la surface. Nous sommes bien plus qu'un simple institut de beauté, nous sommes votre partenaire pour une peau éclatante, une relaxation profonde et une estime de soi renouvelée.</p>
            </div>
        </div>
        <div class="bg-white z-40 none_500">
            <div class="h-8"></div>
            <h2 class="flex justify-center text-3xl kalam">Gallerie</h2>
            <div class="h-8"></div>
        </div>  
        <div class="flex items-center justify-center w-full h-full py-24 sm:py-8 px-4 bg-white z-40 none_500">
            <div class="w-full relative flex items-center justify-center">
                <button aria-label="slide backward" class="absolute z-30 left-0 ml-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 cursor-pointer" id="prev">
                    <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 1L1 7L7 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="w-full h-full mx-auto overflow-x-hidden overflow-y-hidden">
                    <div id="slider" class="h-full flex  gap-2 items-center justify-start transition ease-out duration-700">
                        @foreach ($images as $image)
                        <div class="flex relative sm:w-auto ml-20 ">
                            <img src="{{ asset('storage/'.$image->image)}}" alt="{{$image->alt}}" class="object-contain object-center  h-80" />
                        </div> 
                        @endforeach
                    </div>
                </div>
                <button aria-label="slide forward" class="absolute z-30 right-0 mr-10 focus:outline-none focus:bg-gray-400 focus:ring-2 focus:ring-offset-2 focus:ring-gray-400" id="next">
                    <svg class="dark:text-gray-900" width="8" height="14" viewBox="0 0 8 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L7 7L1 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex justify-end fixed z-50 bottom-5 right-5 none_800"><a href="" class="pr-4 btn_top hover hidden"><i class="fa-solid fa-circle-arrow-up text-5xl z-50 text_pink  hover_pink"></i></a></div>
    </main>  
    <x-footer/> 
</body>
</html>


