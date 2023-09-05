<x-app-layout>
    <x-tailwind />
    @section('title', 'Panier')
  <div class="flex pl-32 pt-4 pb-4 underline decoration-solid bg_pink_opa shadow-lg relative">
    <h1 class="text-2xl font-semibold mb-4 kalam">Shopping Cart</h1>
  </div>
    <div class=" mx-auto px-4 bg-white">
        
        <div class="h-8"></div>
        @if ($carts->isEmpty())
        <div class="h-screen">
        <div class="h-8"></div>
        <p class="open flex justify-center w-full ">Votre panier est vide.</p>
    </div>
        @else
        
        <div class="flex flex-row flex_col_800 gap-4">
            <div class="md:w-3/4">
                <div class="bg-white rounded-lg shadow-md p-6 mb-4">
                    <table class="w-full">
                        <thead class="none_500">
                            <tr class="w-full">
                                <th class="text-left font-semibold kalam">Product</th>
                                <th class="text-left font-semibold kalam">Titre</th>
                                <th class="text-left font-semibold kalam">Prix</th>
                                <th class="text-left font-semibold kalam">Quantité</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carts as $cart)
                            <tr class="flex_col_500">
                                <td class="py-4 ">
                                    <img src="{{ asset('storage/'.$cart->image)}}" alt="{{ $cart->alt}}" class="h-28 w-28 mr-4 img_500 flex items-center">
                                </td>
                                <td class="py-4 center_500">{{$cart->title}}</td>
                                <td class="py-4 center_500">{{$cart->price}} €</td>
                                <td class="py-4 flex_row_500 center_500">
                                    <div class="flex items-center">
                                        <form method="POST" action="{{ route('carts.decrement', $cart) }}" class="">
                                            @csrf
                                            <button type="submit" class="border rounded-md py-2 px-4 mr-2">-</button>
                                        </form>
                                        <span class="text-center w-8">{{$cart->quantity_cart}}</span>
                                        <form method="POST" action="{{ route('carts.increment', $cart) }}">
                                            @csrf
                                            <button type="submit" class="border rounded-md py-2 px-4 ml-2 ">+</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="py-4 center_500">
                                    <div class="">                            
                                        <form method="POST" action="{{ route('carts.destroy', $cart) }}" >
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit"><i class="fa-regular fa-trash-can text-2xl hover text-red-600"></i></button>
                                        </form>
                                    </div> 
                                </td>
                            </tr>
                            @endforeach
                            <!-- More product rows -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Summary</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>{{$totalCart}} €</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Taxes</span>
                        <span>0.00 €</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Shipping</span>
                        <span>0.00 €</span>
                    </div>
                    <hr class="my-2">
                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">Total</span>
                        <span class="font-semibold">{{$totalCart}} €</span>
                    </div>
                    <button class="bg_black text-white py-2 px-4 rounded-lg mt-4 w-full hover kalam">Valider</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
</x-app-layout>