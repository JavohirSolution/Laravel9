<x-layouts.app>
    <x-slot:title>
        Post o'zgartirish - #{{ $posts->id }}
    </x-slot:title>
    <div class="flex py-5" style="margin-left:350px;">
        <div class="col-lg-7 mb-5 mb-lg-1">


            <div class="contact-form">
                <div id="success"></div>
                <form action="{{ route('posts.update', ['post' => $posts->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="control-group mb-3">
                        <input type="text"
                            class="form-control p-4 @error('title') is-invalid
                        @enderror"
                            name="title" placeholder="Sarlavha" value="{{ $posts->title }}" />
                        @error('title')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="control-group mb-3">
                        <input type="file" name="photo" class="form-control p-4" placeholder="image" />
                        @error('photo')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="control-group mb-3 ">
                        <textarea class="form-control p-4 @error('short_content') is-invalid
                        @enderror" rows="3"
                            name="short_content" placeholder="Qisqacha ma'loumot">{{ $posts->short_content }}</textarea>
                        @error('short_content')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="control-group mb-3">
                        <textarea class="form-control p-4 @error('content') is-invalid
                        @enderror" rows="6"
                            name="content" placeholder="Ma'qola">{{ $posts->content }}</textarea>
                        @error('content')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <div style="display: flex; justify-content:space-between;">
                            <button class="btn btn-success py-3 px-5" type="submit">
                                Saqlash
                            </button>

                            <a href="{{ route('posts.show', ['post' => $posts->id]) }}"
                                class="btn btn-danger  py-3 px-5">
                                Bekor qilish
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</x-layouts.app>
