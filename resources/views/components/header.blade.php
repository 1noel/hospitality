<header>
    <div class="bg-cover bg-no-repeat bg-center h-[650px] relative" style="background-image: url('{{asset('images/mainbg.png')}}')">
        <nav class="flex justify-between items-center px-10 py-5">
            <div>
                <img src="{{asset('images/logo.png')}}" alt="Logo" class="h-10 w-auto object-contain">
            </div>

            <ul class="flex justify-center items-center space-x-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Pricing</a></li>
                <div class="flex space-x-4">
                    <a href="/login" class="bg-closeryellow text-white px-8 py-2 rounded-lg hover:bg-opacity-90">Login</a>
                    <a href="/register" class="bg-white text-closeryellow border border-closeryellow px-8 py-2 rounded-lg hover:bg-closeryellow hover:text-white">Signup</a>
                </div>
            </ul>
        </nav>

        {{ $slot }}
    </div>
</header>
