<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="assets/extensions/jquery/jquery.min.js"></script>

    <!-- Scripts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card mt-sm-2 mt-md-2 mb-sm-2 mb-md-1 margin-phones" style="border-radius: 15px;">
                            <div class="card-body p-lg-5  p-md-2  p-sm-1 p-md-1">
                                <h2 class="text-uppercase text-center" style="color: #000080;font-weight: 800;">EVENT REGISTRATION</h2>
                                <h5 class="text-muted text-center mb-5" style="font-weight: 400;">"Citi Indonesia Consumer Bank Appreciation Night - Greater Things to Come"</h5>

                                <form>

                                    <div class="form-outline mb-4">
                                        <label class="form-label h5" style="color: #000080;" for="form3Example1cg">Full Name*</label>
                                        <input type="text" id="fullname" class="form-control form-control-lg" placeholder="E.g. Putra Cahaya Pratama"/>
                                        <span class="text-danger h6" id="err_fullname"></span>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label h5"  style="color: #000080;" for="form3Example1cg">Phone Number*</label>
                                        <input id="phone" class="form-control form-control-lg" placeholder="E.g. 6281296651667" type="number"/>
                                        <span class="text-danger h6" id="err_phone"></span>

                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label h5" style="color: #000080;" for="form3Example1cg">Personal Email Address*</label>
                                        <input id="email" class="form-control form-control-lg" placeholder="E.g. putra.cp@email.com" type="email" />
                                        <span class="text-danger h6" id="err_email"></span>
                                    </div>
                                    <label for="city " class="h5" style="color: #000080;">City:*</label>
                                    <select id="city" name="city" class="form-control form-control-lg text-muted">
                                        <option value="bali">Bali</option>
                                        <option value="bandung">Bandung</option>
                                        <option value="jakarta">Jakarta</option>
                                        <option value="medan">Medan</option>
                                        <option value="semarang">Semarang</option>
                                        <option value="surabaya">Surabaya</option>

                                    </select>


                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-success btn-block btn-lg gradient-custom-4 text-white w-50 mt-4" onclick="register()" style="background: #000080;">Register</button>
                                    </div>


                                </form>
                                <script>
                                    function register() {
                                        
                                        $.ajax({
                                            url: "{{url('api/event/register')}}",
                                            method: "post",
                                            beforeSend: function(){
                                                Swal.fire({
                                                    title: 'Please Wait...',
                                                    allowOutsideClick: false,
                                                    didOpen: () => {
                                                        Swal.showLoading()
                                                    }
                                                })
                                            },
                                            data: {
                                                "fullname": $("#fullname").val(),
                                                "phone": $("#phone").val(),
                                                "email": $("#email").val(),
                                                "city": $("#city").val(),
                                            },
                                            success: function() {
                                                window.location.href = "/success"
                                            },
                                            error: function(xhr){
                                                Swal.close();
                                                var f = JSON.parse(xhr.responseText)
                                                $("#err_email").html(f["errors"]["email"])
                                                $("#err_fullname").html(f["errors"]["fullname"] || "")
                                                $("#err_phone").html(f["errors"]["phone"] || "")

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