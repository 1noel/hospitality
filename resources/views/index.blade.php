<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
 
<header>

<div class="bg-cover bg-no-repeat bg-center h-[650px] relative" style="background-image:  url('{{asset('images/mainbg.png')}}')">
  <!-- Your content here -->
  <nav class="flex justify-between items-center px-10 py-5">
    <div>
      <img src="{{asset('images/logo.png')}}" alt="Logo" class="h-10 w-auto object-contain">
    </div>

    <ul class="flex justify-center items-center space-x-10">
      <li>
        <a href="#">Home</a>
      </li>
      <li>
        <a href="#">About</a>
      </li>
      <li>
        <a href="#">Products</a>
      </li>
      <li>
        <a href="#">Services</a>
      </li>
      <li>
        <a href="#">Pricing</a>
      </li>
      <div>
        <button class="bg-closeryellow text-white px-8 py-2 rounded-lg">Login</button>
      </div>
    </ul>
  </nav>

  <div class="mx-20 absolute bottom-24">
    <h1 class="font-Inter text-white font-bold text-2xl">Discover Extraordinary <br>
    Comfort in Hotels</h1>
  </div>
</div>


</header>






<main class="">

<!-- resever section-->
<section class="my-14">
  <div class="md:my-10 md:mx-20 m-5">
    <h1 class="font-bold md:text-4xl text-2xl">Reserve your place now <br>
    or simply order </h1>
  </div>

  <section >
<!-- images -->
<div class="flex md:px-20 p-4 flex-col md:flex-row bg-gray-100 justify-center md:space-x-10  space-y-6 md:space-y-0">
    <!-- Left large image -->
    <div class="w-full md:w-[35%] relative group">
        <div class="relative overflow-hidden rounded-xl">
            <img src="{{ asset('images/room.jpg') }}" alt="Room Image" class="w-full h-[300px] md:h-auto rounded-xl shadow-lg transition duration-300 transform group-hover:scale-105 object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-40 transition duration-300 group-hover:bg-opacity-30"></div>
            <div class="absolute bottom-4 left-4 text-white">
                <h3 class="text-xl md:text-2xl font-bold">Luxury Rooms</h3>
                <p class="text-xs md:text-sm">Experience ultimate comfort</p>
            </div>
        </div>
    </div>

    <!-- Right grid of images -->
    <div class="grid grid-cols-1 sm:grid-cols-2 w-full md:w-[65%] gap-6 md:gap-10">
        <!-- Dining Image -->
        <div class="relative group">
            <div class="relative overflow-hidden rounded-xl">
                <img src="{{ asset('images/dining.jpeg') }}" alt="Dining Image" class="w-full h-48 md:h-60 rounded-xl shadow-lg object-cover transition duration-300 transform group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-40 transition duration-300 group-hover:bg-opacity-30"></div>
                <div class="absolute bottom-4 left-4 text-white">
                    <h3 class="text-lg md:text-xl font-bold">Fine Dining</h3>
                    <p class="text-xs md:text-sm">Exquisite culinary experience</p>
                </div>
            </div>
        </div>

        <!-- Meeting Room Image -->
        <div class="relative group">
            <div class="relative overflow-hidden rounded-xl">
                <img src="{{ asset('images/meeting.jpeg') }}" alt="Meeting Room Image" class="w-full h-48 md:h-60 rounded-xl shadow-lg object-cover transition duration-300 transform group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-40 transition duration-300 group-hover:bg-opacity-30"></div>
                <div class="absolute bottom-4 left-4 text-white">
                    <h3 class="text-lg md:text-xl font-bold">Meeting Spaces</h3>
                    <p class="text-xs md:text-sm">Professional business venues</p>
                </div>
            </div>
        </div>

        <!-- Service Image -->
        <div class="relative group">
            <div class="relative overflow-hidden rounded-xl">
                <img src="{{ asset('images/service.jpeg') }}" alt="Service Image" class="w-full h-48 md:h-60 rounded-xl shadow-lg object-cover transition duration-300 transform group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-40 transition duration-300 group-hover:bg-opacity-30"></div>
                <div class="absolute bottom-4 left-4 text-white">
                    <h3 class="text-lg md:text-xl font-bold">Premium Service</h3>
                    <p class="text-xs md:text-sm">Exceptional hospitality</p>
                </div>
            </div>
        </div>

        <!-- Wedding Image -->
        <div class="relative group">
            <div class="relative overflow-hidden rounded-xl">
                <img src="{{ asset('images/weding.jpeg') }}" alt="Wedding Image" class="w-full h-48 md:h-60 rounded-xl shadow-lg object-cover transition duration-300 transform group-hover:scale-105">
                <div class="absolute inset-0 bg-black bg-opacity-40 transition duration-300 group-hover:bg-opacity-30"></div>
                <div class="absolute bottom-4 left-4 text-white">
                    <h3 class="text-lg md:text-xl font-bold">Wedding Venues</h3>
                    <p class="text-xs md:text-sm">Create lasting memories</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

</section>

<!-- about us -->
 <div class="mx-auto container ">
 <section class="text-center my-10">
    <div>
      <h1 class="text-nearyellow my-2">FEEL THE SUCCESS</h1>
      <h1 class="flex justify-center items-center gap-4 font-bold text-3xl">
    ABOUT
    <span class="inline-flex items-center">
        <img src="{{asset('images/logo.png')}}" alt="Company Logo" class="h-10 w-auto object-contain">
    </span>
</h1>



<div class="flex flex-col md:flex-row justify-center items-center gap-10 px-4 md:px-8 mt-10">
    <!-- Left Section with Images -->
    <div class="md:w-[60%]">
        <div class="flex flex-col md:flex-row justify-center items-center gap-6 md:gap-10">
            <div class="relative group">
                <img 
                    src="{{asset('images/chef.jpg')}}" 
                    alt="Chef" 
                    class="w-64 h-[350px] md:w-72 md:h-[400px] rounded-full shadow-xl object-cover transition duration-300 group-hover:scale-105">
                <div class="absolute inset-0 rounded-full bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition duration-300"></div>
            </div>
            
            <div class="relative group">
                <img 
                    src="{{asset('images/buuger.jpg')}}" 
                    alt="Burger" 
                    class="w-64 h-[350px] md:w-72 md:h-[400px] rounded-full shadow-xl object-cover transition duration-300 group-hover:scale-105">
                <div class="absolute inset-0 rounded-full bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition duration-300"></div>
            </div>
        </div>
    </div>

    <!-- Right Section with Services -->
    <div class="md:w-[40%] space-y-10 mt-5 md:mt-0">
        <!-- Book Service -->
        <div class="flex items-center space-x-4 group hover:bg-gray-50 p-4 rounded-lg transition duration-300">
            <img 
                src="{{asset('images/book.png')}}" 
                alt="Book Service" 
                class="w-16 h-16 object-contain group-hover:scale-110 transition duration-300"
            >
            <div>
                <h1 class="font-bold text-start text-xl mb-1 text-gray-800">Book Service</h1>
                <span class="text-base text-gray-600">Easy Food delivery from the best restaurants.</span>
            </div>
        </div>

        <!-- Online Order -->
        <div class="flex items-center space-x-4 group hover:bg-gray-50 p-4 rounded-lg transition duration-300">
            <img 
                src="{{asset('images/online.png')}}" 
                alt="Online Order" 
                class="w-16 h-16 object-contain group-hover:scale-110 transition duration-300"
            >
            <div>
                <h1 class="font-bold text-start text-xl mb-1 text-gray-800">Online  Ordering</h1>
                <span class="text-base text-gray-600">Easy Food delivery from the best
                restaurants.</span>
            </div>
        </div>

        <!-- Reserve Table -->
        <div class="flex items-center space-x-4 group hover:bg-gray-50 p-4 rounded-lg transition duration-300">
            <img 
                src="{{asset('images/reserve.png')}}" 
                alt="Reserve Table" 
                class="w-16 h-16 object-contain group-hover:scale-110 transition duration-300"
            >
            <div>
                <h1 class="font-bold text-start text-xl mb-1 text-gray-800">Reserve a place</h1>
                <span class="text-base text-gray-600">Eating a wide variety of nutritious Healthy foods.</span>
            </div>
        </div>
    </div>
</div>


    </div>
  </section>
 </div>

 <!-- how we works -->
 <div class="my-10 flex ">
    <div class="relative bg-cover  md:h-[500px] bg-no-repeat w-full md:w-[85%] p-8 md:p-16 " style="background-image: url('{{asset('images/howbg.png')}}')">
        <!-- Circular Image -->
        <img 
            src="{{asset('images/howimg.jpeg')}}" 
            alt="Featured Image" 
            class="absolute right-14 top-24  md:transform md:translate-x-1/2 h-48 w-48 md:h-72 md:w-72 rounded-full object-cover shadow-xl hidden md:block">

        <!-- Headers -->
        <div class="mb-12 md:mx-20">
            <h2 class="text-white fon text-lg md:text-xl font-bold tracking-wider ">FEEL THE SUCCESS</h2>
            <h1 class="text-white  text-3xl md:text-4xl font-bold mt-2">How We Work</h1>
        </div>

        <!-- Steps Container -->
        <div class="flex flex-col md:mx-20 md:flex-row justify-center items-center md:items-start space-y-10 md:space-y-0 md:space-x-10 mt-8">
            <!-- Step 1 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left max-w-xs">
                <div class="bg-yellow-300 p-1 w-20 rounded-full relative mb-6 transform transition hover:scale-110">
                    <img src="{{asset('images/car.png')}}" alt="Explore" class="rounded-full p-2 border-2 border-black">
                    <span class="bg-black text-lg text-white w-7 h-7 flex items-center justify-center rounded-full absolute -top-1">1</span>
                </div>
                <div>
                    <h1 class="text-white text-lg font-bold mb-3 font-FredokaOne">Explore products and services</h1>
                    <p class="text-white/80 text-sm leading-relaxed font-Epilogue">
                        A range of powerful tools for viewing, querying and filtering your data
                    </p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left max-w-xs">
                <div class="bg-yellow-300 p-1 w-20 rounded-full relative mb-6 transform transition hover:scale-110">
                    <img src="{{asset('images/car.png')}}" alt="Reserve" class="rounded-full p-2 border-2 border-black">
                    <span class="bg-black text-lg text-white w-7 h-7 flex items-center justify-center rounded-full absolute -top-1">2</span>
                </div>
                <div>
                    <h1 class="text-white text-lg font-bold mb-3 font-FredokaOne">Reserve place or make order</h1>
                    <p class="text-white/80 text-sm leading-relaxed font-Epilogue">
                        A range of powerful tools for viewing, querying and filtering your data
                    </p>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="flex flex-col items-center md:items-start text-center md:text-left max-w-xs">
                <div class="bg-yellow-300 p-1 w-20 rounded-full relative mb-6 transform transition hover:scale-110">
                    <img src="{{asset('images/car.png')}}" alt="Payment" class="rounded-full p-2 border-2 border-black">
                    <span class="bg-black text-lg text-white w-7 h-7 flex items-center justify-center rounded-full absolute -top-1 ">3</span>
                </div>
                <div>
                    <h1 class="text-white text-lg font-bold mb-3 font-FredokaOne">Make Payment</h1>
                    <p class="text-white/80 text-sm leading-relaxed font-Epilogue">
                        A range of powerful tools for viewing, querying and filtering your data
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- foods & Products -->

<div class="my-10  font-Oswald bg-foodbg p-14">

<div class="my-5">
  <p class="text-foodheader font-bold font-Oswald text-sm">crispy, every bite taste</p>
  <h1 class="font-bold text-4xl font-Oswald my-1">Popular Food Items</h1>
</div>
<div class="grid grid-cols-2 md:grid-cols-4 gap-8">


    <!-- Chicken -->
    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group">
        <div class="flex justify-center items-center h-48 relative overflow-hidden">
            <img 
                src="{{asset('images/food.png')}}" 
                alt="Chicken"
                class="w-40 h-40 object-contain transform transition-transform duration-300 group-hover:scale-110"
            >
            <div class="absolute inset-0 bg-yellow-500/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        <div class="text-center my-5 space-y-3">
            <h1 class="font-bold text-xl group-hover:text-closeryellow transition-colors duration-300">Chicken</h1>
            <hr class="w-[40px] h-0.5 mx-auto bg-closeryellow rounded-full">
            <p class="text-closeryellow text-sm font-bold">8 Products</p>
        </div>
    </div>

    <!-- Burger -->
    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group">
        <div class="flex justify-center items-center h-48 relative overflow-hidden">
            <img 
                src="{{asset('images/bugger.png')}}" 
                alt="Burger"
                class="w-40 h-40 object-contain transform transition-transform duration-300 group-hover:scale-110"
            >
            <div class="absolute inset-0 bg-yellow-500/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        <div class="text-center my-5 space-y-3">
            <h1 class="font-bold text-xl group-hover:text-closeryellow transition-colors duration-300">Pro Burger</h1>
            <hr class="w-[40px] h-0.5 mx-auto bg-closeryellow rounded-full">
            <p class="text-closeryellow text-sm font-bold">3 Products</p>
        </div>
    </div>

    <!-- Pasta -->
    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group">
        <div class="flex justify-center items-center h-48 relative overflow-hidden">
            <img 
                src="{{asset('images/chess.png')}}" 
                alt="Pasta"
                class="w-40 h-40 object-contain transform transition-transform duration-300 group-hover:scale-110"
            >
            <div class="absolute inset-0 bg-yellow-500/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        <div class="text-center my-5 space-y-3">
            <h1 class="font-bold text-xl group-hover:text-closeryellow transition-colors duration-300">Pro Pasta</h1>
            <hr class="w-[40px] h-0.5 mx-auto bg-closeryellow rounded-full">
            <p class="text-closeryellow text-sm font-bold">3 Products</p>
        </div>
    </div>

    <!-- Pizza -->
    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 group">
        <div class="flex justify-center items-center h-48 relative overflow-hidden">
            <img 
                src="{{asset('images/pizza.png')}}" 
                alt="Pizza"
                class="w-40 h-40 object-contain transform transition-transform duration-300 group-hover:scale-110"
            >
            <div class="absolute inset-0 bg-yellow-500/10 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>

        <div class="text-center my-5 space-y-3">
            <h1 class="font-bold text-xl group-hover:text-closeryellow transition-colors duration-300">Pro Pizza</h1>
            <hr class="w-[40px] h-0.5 mx-auto bg-closeryellow rounded-full">
            <p class="text-closeryellow text-sm font-bold">8 Products</p>
        </div>
    </div>
</div>

</div>

</main>


<!-- footer -->

<footer class="bg-footerbg p-5 font-Inter">
  <div class="container mx-auto flex flex-col md:flex-row justify-between items-center my-20">
    <div class="md:w-[40%]">
      <p class="text-white text-2xl font-medium">Newsletter & Special Promo</p>

      <form action="" class="mt-5">
        <div class="flex ">
            <input  class="rounded-l-lg px-5 focus:outline-none italic" type="text" name="" placeholder="Enter your email here" required>
            <button type="submit" class="bg-closeryellow text-white px-5 py-3 rounded-r-lg">Subscribe</button>
        </div>
      </form>

    </div>

    <div class="md:w-[20%]">
      <ul class="space-y-3">
        <li>
            <a href="#" class="text-white text-base font-nomarl" >About us</a>
        </li>
        <li>
            <a href="#" class="text-white text-base font-nomarl" >Contact</a>
        </li>
        <li>
            <a href="#" class="text-white text-base font-nomarl" >Location</a>
        </li>
      </ul>
    </div>

    <div class="md:w-[20%]">
    <ul class="space-y-3">
        <li>
            <a href="#" class="text-white text-base font-nomarl" >FAQ</a>
        </li>
        <li>
            <a href="#" class="text-white text-base font-nomarl" >Term of Use</a>
        </li>
        <li>
            <a href="#" class="text-white text-base font-nomarl" >Privacy Police</a>
        </li>
      </ul>
    </div>

    <div class="md:w-[20%]">
    <ul class="space-y-3">
        <li>
            <a href="#" class="text-white text-base font-nomarl" >Services & Facilities</a>
        </li>
        <li>
            <a href="#" class="text-white text-base font-nomarl" >Careers</a>
        </li>
        <li>
            <a href="#" class="text-white text-base font-nomarl" >How to book</a>
        </li>
      </ul>
    </div>
  </div>


    <div class="mt-5">
      <hr class="mx-auto h-0.5 w-[30%] bg-gray-700">
      <p class="text-center text-white text-base my-2">&copy Copyright Booking Hotels. All right reserved.</p>
    </div>

</footer>


</body>
</html>