<!DOCTYPE html>
<html>

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-slate-700 font['poppins']">
    <div class="h-full w-full flex">

        <section class="md:bg-[#FFE05E] md:h-lvh md:w-1/2 lg:3/5 hidden md:block">
            <div class="flex justify-center lg:mt-[-50px] md:mt-5">
                <img src="{{ url('./images/login.png') }}" alt="" width="600px" class="text-center">
            </div>
            <h2 class="lg:text-[38.4px] md:text-2xl text-center font-bold">Manage Perkuliahanmu Di sini</h2>
            <h2 class="lg:text-[32px] md:text-xl text-center text-[#838383]">Manage absensi, jumlah hadir<br /> dan
                sebagainya hanya di
                sini.
            </h2>
        </section>
        <section class="w-full md:w-1/2 lg:w-2/5 mt-20">
            <div class="flex justify-center">
                <img src="{{ url('images/untirta.png') }}" alt="" width="70px">
            </div>
            <h2 class="text-center font-bold text-2xl">Universitas<br />Sultan Ageng Tirtayasa</h2>
            
            <!-- Menampilkan Error Validasi -->
            @if ($errors->any())
                <div class="mx-10 mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.perform') }}" method="POST" class="p-10">
                @csrf
                <label for="email" class=" text-lg">Email</label><br>
                <input type="email" name="email" id="email" placeholder="Masukkan Email" value="{{ old('email') }}"
                    class="border-2 border-[#FFE05E] text-xl py-3 px-3 w-full rounded-lg mb-8 placeholder:italic
                            focus:outline-none focus:ring-0 focus:border-[#fed531]">


                <label for="password" class="text-lg">Password</label><br>
                <input type="password" name="password" id="password" placeholder="Masukkan Password"
                    class="border-2 border-[#FFE05E] text-xl py-3 px-3 w-full rounded-lg mb-8 placeholder:italic
                            focus:outline-none focus:ring-0 focus:border-[#fed531]">
                <button type="submit"
                    class="bg-[#FFE05E] font-semibold text-white text-xl py-3 px-3 w-full rounded-lg hover:cursor-pointer hover:bg-[#fed531]">Submit</button>
                <div class="flex w-full">
                    <input type="checkbox" name="remember" id="remember"
                        class="w-5 h-5 appearance-none border-2 border-gray-400 rounded-sm checked:bg-[#FFE05E] checked:border-[#FFE05E] transition-all duration-200 mt-3">
                    <label for="remember" class="font-semibold ps-3 mt-2 text-lg">Ingat Saya</label>
                    <a href="#" class="ml-auto mt-2 text-lg text-slate-400 hover:text-slate-700">Lupa
                        Password</a>
                </div>
            </form>
        </section>
    </div>
</body>

</html>
