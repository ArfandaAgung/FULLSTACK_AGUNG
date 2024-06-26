@extends('Template.Main')

@section('container')
    <h1 class="text-center mb-4">Form Create</h1>


    <link rel="stylesheet" href="{{ '/' }}css/create.css">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <main class="form-signin w-100 m-auto">

                    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <img class="img-preview img-fluid mb-3 col-sm-3">
                            <input
                                class="form-control @error('image')
                                is-invalid
                            @enderror"
                                type="file" id="image" name="image" onchange="previewImage()">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input type="text"
                                class="form-control @error('judulFoto')
                                is-invalid
                            @enderror"
                                id="judulFoto" name="judulFoto" placeholder="judulFoto" value="{{ old('judulFoto') }}"
                                required>
                            <label for="judulFoto">Judul Foto</label>
                            @error('judulFoto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-floating">
                            <input type="text"
                                class="form-control @error('deskripsiFoto')
                                is-invalid
                            @enderror"
                                id="deskripsiFoto" name="deskripsiFoto" placeholder="deskripsiFoto"
                                value="{{ old('deskripsiFoto') }}" required>
                            <label for="deskripsiFoto">Deskripsi Foto</label>
                            @error('deskripsiFoto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input type="date"
                                class="form-control @error('tglUnggah')
                                is-invalid
                                @enderror"
                                id="tglUnggah" name="tglUnggah" placeholder="tglUnggah"
                                value="{{ old('tglUnggah') }}" required>
                                <label for="tglUnggah"></label>
                                @error('tglUnggah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <button class="btn btn-brown w-100 py-2 fw-semibold mt-3" type="submit">Create</button>

                    </form>
                </main>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
                </script>
            </div>
        </div>
    </div>

    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(ofREvent) {
                imgPreview.src = ofREvent.target.result;
            }
        }
    </script>
@endsection