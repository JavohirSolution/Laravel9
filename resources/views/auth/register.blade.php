<x-layouts.auth>
    <x-slot:title>
        Ro'yxatdan O'tish
    </x-slot:title>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">



                                    <form action="{{ route('register.store') }}" method="POST">
                                        @csrf
                                        <div class=" mb-4">
                                            <label class="form-label">Foydalanuvchi Ismi</label>
                                            <input type="name" name="name" id="form2Example11"
                                                class="form-control" placeholder="Ismni kiriting" />
                                        </div>
                                        <div class=" mb-4">
                                            <label class="form-label">Foydalanuvchi Email</label>
                                            <input type="email" name="email" id="form2Example11"
                                                class="form-control" placeholder="Emailni kiriting" />
                                        </div>

                                        <div class=" mb-4">
                                            <label class="form-label" for="form2Example22">Parol</label>
                                            <input type="password" name="password" placeholder="Parolni kiriting"
                                                id="form2Example22" class="form-control" />
                                        </div>
                                        <div class=" mb-4">
                                            <label class="form-label" for="form2Example22">Parolni tasdiqlash</label>
                                            <input type="password" name="password_confirmation"
                                                placeholder="Parolni tasdiqlang" id="form2Example22"
                                                class="form-control" />
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3">Jo'natish</button>
                                            <a class="text-muted" href="">Parolni unutdingizmi?</a>
                                        </div>
                                    </form>
                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Ro'yxatdan o'tganmisiz</p>
                                        <a href="{{ route('login') }}" type="button"
                                            class="btn btn-outline-danger">Kirish</a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">We are more than just a company</h4>
                                    <p class="small mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                        do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.auth>
