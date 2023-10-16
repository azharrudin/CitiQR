<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center ">EVENT REGISTRATION</h2>
                                <h5 class="text-muted text-center mb-5">"Citi Indonesia Consumer Bank Appreciation Night - Greater Things to Come"</h5>

                                <form>

                                    <div class="form-outline mb-4">
                                        <label class="form-label h5" for="form3Example1cg">Full Name*</label>

                                        <input type="text" id="fullname" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label h5" for="form3Example1cg">Phone Number*</label>

                                        <input type="email" id="phone" class="form-control form-control-lg" />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label h5" for="form3Example1cg">Personal Email Address*</label>
                                        <input type="password" id="email" class="form-control form-control-lg" />
                                    </div>
                                    <label for="city " class="h5">City:*</label>
                                    <select id="city" name="city" class="form-control">
                                        <option value="bali">Bali</option>
                                        <option value="bandung">Bandung</option>
                                        <option value="jakarta">Jakarta</option>
                                        <option value="medan">Medan</option>
                                        <option value="semarang">Semarang</option>
                                        <option value="surabaya">Surabaya</option>

                                    </select>


                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-success btn-block btn-lg gradient-custom-4 text-white w-100 mt-4">Register</button>
                                    </div>


                                </form>
<script>
    function register(){
        $.ajax({
            url: "{{url('api/event/register')}}",
            method: "post",
            data: {
                "fullname": $("#fullname").val(),
                "phone": $("#phone").val(),
                "email": $("#email").val(),
                "city": $("#city").val(),

            },
            success: function(){

            }
        })
    }
</script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>