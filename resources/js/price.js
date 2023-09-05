let prices = document.querySelector('.prices');
let map = document.querySelector('.map');
let blur_price = document.querySelector('.blur_price');

prices.addEventListener('click', () => {
    map.innerHTML = `
    <div class='fixed h-screen flex justify-center items-center z-20 w-full bg-white/50 top-0 left-0 blur-sm' id='price'>
        <div class='w-3/5 h-1/2 border border-solid rounded-lg shadow-lg bg-white flex items-center flex-col pt-12'>
            <div class='flex justify-end py-4 pr-12 w-full'><button class='kalam hover'>X</button></div>
            <div class='flex flex-col justify-center w-full'>
                <div class='flex w-full'>
                    <div class='flex justify-center w-1/3 kalam text-xl'>Services</div>
                    <div class='flex justify-center w-1/3 kalam text-xl'>Temps</div>
                    <div class='flex justify-center w-1/3 kalam text-xl'>Prix</div>
                </div>
                <div class='h-4'></div>
                <div class='flex w-full'>
                    <div class='flex justify-center w-1/3 open'>Remplissage</div>
                    <div class='flex justify-center w-1/3 open'>1 h</div>
                    <div class='flex justify-center w-1/3 open'>30 €</div>
                </div>
                <div class='flex w-full'>
                    <div class='flex justify-center w-1/3 open'>Épilation du maillot</div>
                    <div class='flex justify-center w-1/3 open'>30 min</div>
                    <div class='flex justify-center w-1/3 open'>40 €</div>
                </div>
                <div class='flex w-full'>
                    <div class='flex justify-center w-1/3 open'>Massage du complet</div>
                    <div class='flex justify-center w-1/3 open'>2 h</div>
                    <div class='flex justify-center w-1/3 open'>80 €</div>
                </div>
                
            </div>
        </div>
    </div>`
    blur_price.style.backgroundColor= "white";

    let price = document.querySelector('#price');

    map.addEventListener('click', (e) => {
        if (e.target.tagName === 'BUTTON') {
            price.style.display = "none";
            blur_price.style.filter = "none";
        }
    });
})
