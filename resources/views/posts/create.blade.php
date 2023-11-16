<x-layouts.app>
    <x-slot:title>
        Post - Yaratish
    </x-slot:title>

    <div class="flex py-5" style="margin-left:350px;">
        <div class="col-lg-7 mb-5 mb-lg-1">
            <div class="contact-form">
                <div id="success"></div>
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group mb-3">
                        <input type="text"
                            class="form-control p-4 @error('title') is-invalid
                        @enderror"
                            name="title" placeholder="Sarlavha" value="{{ old('title') }}" />
                        @error('title')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="control-group mb-3">
                        <label for="">Kategoriya</label>
                        <select name="category_id" id="category_id" class="form-select form-select-lg  "
                            aria-label="Default select example">
                            <option disabled selected>Category</option>
                            @foreach ($categories as $dd)
                                <option value="{{ $dd->id }}">{{ $dd->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="control-group mb-3">
                        <label for="">Taglar</label>
                        <select name="tags[]" multiple >
                            <option disabled selected>Taglar</option>
                            @foreach ($tags as $dd)
                                <option value="{{ $dd->id }}">{{ $dd->name }}</option>
                            @endforeach
                        </select>
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
                            name="short_content" placeholder="Qisqacha ma'loumot">{{ old('short_content') }}</textarea>
                        @error('short_content')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="control-group mb-3">
                        <textarea class="form-control p-4 @error('content') is-invalid
                        @enderror" rows="6"
                            name="content" placeholder="Ma'qola">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button class="btn btn-primary btn-block py-3 px-5" type="submit">
                            Saqlash
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</x-layouts.app>
