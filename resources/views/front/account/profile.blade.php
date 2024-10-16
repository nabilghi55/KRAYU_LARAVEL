@extends('front.layouts.app')
@include('front.partials.navbar')
@section('content')
    <section class="bg-white">
        <div class="w-11/12 mx-auto">
            <div class="row">
                <div class="col-md-12">
                    @include('front.account.common.message')
                </div>
                <div class="col-md-4 col-lg-3">
                    @include('front.account.common.sidebar')
                </div>
                <div class="col-md-8 col-lg-9">
                    <div class="card bg-white text-[#3A3845] shadow mt-10 md:mt-0">
                        <div class="card-header bg-gray-100 p-3">
                            <h2 class="text-xl font-semibold">Informasi Pengguna</h2>
                        </div>
                        <form action="" name="profilForm" id="profilForm">
                            <div class="card-body p-6">
                                <div class="space-y-4">
                                    <div>
                                        <label for="name" class="block text-sm font-medium">Nama</label>
                                        <input value="{{ $user->name }}" type="text" name="name" id="name"
                                            placeholder="Nama"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 text-sm"></p>
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-medium">Email</label>
                                        <input value="{{ $user->email }}" type="text" name="email" id="email"
                                            placeholder="Email"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 text-sm"></p>
                                    </div>
                                    <div>
                                        <label for="phone" class="block text-sm font-medium">Nomor
                                            Telepon</label>
                                        <input value="{{ $user->phone }}" type="text" name="phone" id="phone"
                                            placeholder="Nomor Telepon"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 text-sm"></p>
                                    </div>

                                    <div class="flex">
                                        <button class="bg-[#9FB39A] text-white py-2 px-4">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card bg-white text-[#3A3845] shadow mt-5 mb-20">
                        <div class="card-header bg-gray-100 p-3">
                            <h2 class="text-xl font-semibold">Alamat</h2>
                        </div>
                        <form action="" name="addressForm" id="addressForm">
                            <div class="card-body p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="mb-3">
                                        <label for="first_name" class="block text-sm font-medium">Nama
                                            Depan</label>
                                        <input value="{{ !empty($address) ? $address->first_name : '' }}" type="text"
                                            name="first_name" id="first_name" placeholder="Nama Depan"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 text-sm"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="last_name" class="block text-sm font-medium">Nama
                                            Belakang</label>
                                        <input value="{{ !empty($address) ? $address->last_name : '' }}" type="text"
                                            name="last_name" id="last_name" placeholder="Nama Belakang"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 text-sm"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="block text-sm font-medium">Email</label>
                                        <input value="{{ !empty($address) ? $address->email : '' }}" type="text"
                                            name="email" id="email" placeholder="Email"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 text-sm"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="mobile" class="block text-sm font-medium">Nomor
                                            Telepon</label>
                                        <input value="{{ !empty($address) ? $address->mobile : '' }}" type="text"
                                            name="mobile" id="mobile" placeholder="Nomor Telepon"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 text-sm"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="country_id" class="block text-sm font-medium">Negara</label>
                                        <select name="country_id" id="country_id"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                            <option value="">Pilih Negara</option>
                                            @if ($countries->isNotEmpty())
                                                @foreach ($countries as $country)
                                                    <option
                                                        {{ !empty($address) && $address->country_id == $country->id ? 'selected' : '' }}
                                                        value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <p class="text-red-500 text-sm"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="block text-sm font-medium">Alamat
                                            Lengkap</label>
                                        <textarea name="address" id="address" cols="30" rows="3"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">{{ !empty($address) ? $address->address : '' }}</textarea>
                                        <p class="text-red-500 text-sm"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="apartment" class="block text-sm font-medium">Apartemen</label>
                                        <input value="{{ !empty($address) ? $address->apartment : '' }}" type="text"
                                            name="apartment" id="apartment" placeholder="Apartemen"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 text-sm"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="city" class="block text-sm font-medium">Kota /
                                            Kabupaten</label>
                                        <input value="{{ !empty($address) ? $address->city : '' }}" type="text"
                                            name="city" id="city" placeholder="Kota / Kabupaten"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 text-sm"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="state" class="block text-sm font-medium">Provinsi</label>
                                        <input value="{{ !empty($address) ? $address->state : '' }}" type="text"
                                            name="state" id="state" placeholder="Provinsi"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 text-sm"></p>
                                    </div>
                                    <div class="mb-3">
                                        <label for="zip" class="block text-sm font-medium">Kode
                                            Pos</label>
                                        <input value="{{ !empty($address) ? $address->zip : '' }}" type="text"
                                            name="zip" id="zip" placeholder="Kode Pos"
                                            class="mt-1 block w-full border border-gray-300 shadow-sm p-2">
                                        <p class="text-red-500 text-sm"></p>
                                    </div>

                                    <div class="flex">
                                        <button class="bg-[#9FB39A] text-white py-2 px-4">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('front.partials.footer')
@endsection

@section('customJs')
    <script>
        $("#profilForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route('account.updateProfile') }}',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {

                        $("#profilForm #name")
                            .removeClass('is-invalid')
                            .siblings('p')
                            .html('')
                            .removeClass('invalid-feedback');

                        $("#profilForm #email")
                            .removeClass('is-invalid')
                            .siblings('p')
                            .html('')
                            .removeClass('invalid-feedback');

                        $("#profilForm #phone")
                            .removeClass('is-invalid')
                            .siblings('p')
                            .html('')
                            .removeClass('invalid-feedback');

                        window.location.href = '{{ route('account.profile') }}'

                    } else {
                        var errors = response.errors;
                        if (errors.name) {
                            $("#profilForm #name")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.name)
                                .addClass('invalid-feedback');
                        } else {
                            $("#profilForm #name")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }

                        if (errors.email) {
                            $("#profilForm #email")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.email)
                                .addClass('invalid-feedback');
                        } else {
                            $("#profilForm #email")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }

                        if (errors.phone) {
                            $("#profilForm #phone")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.phone)
                                .addClass('invalid-feedback');
                        } else {
                            $("#profilForm #phone")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }
                    }
                }
            });
        });

        $("#addressForm").submit(function(event) {
            event.preventDefault();
            $.ajax({
                url: '{{ route('account.updateAddress') }}',
                type: 'post',
                data: $(this).serializeArray(),
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {

                        $("#name")
                            .removeClass('is-invalid')
                            .siblings('p')
                            .html('')
                            .removeClass('invalid-feedback');

                        $("#email")
                            .removeClass('is-invalid')
                            .siblings('p')
                            .html('')
                            .removeClass('invalid-feedback');

                        $("#phone")
                            .removeClass('is-invalid')
                            .siblings('p')
                            .html('')
                            .removeClass('invalid-feedback');

                        window.location.href = '{{ route('account.profile') }}'

                    } else {
                        var errors = response.errors;
                        if (errors.first_name) {
                            $("#first_name")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.first_name)
                                .addClass('invalid-feedback');
                        } else {
                            $("#first_name")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }

                        if (errors.last_name) {
                            $("#last_name")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.last_name)
                                .addClass('invalid-feedback');
                        } else {
                            $("#last_name")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }

                        if (errors.email) {
                            $("#addressForm #email")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.email)
                                .addClass('invalid-feedback');
                        } else {
                            $("#addressForm #email")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }

                        if (errors.mobile) {
                            $("#mobile")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.mobile)
                                .addClass('invalid-feedback');
                        } else {
                            $("#mobile")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }

                        if (errors.country_id) {
                            $("#country_id")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.country_id)
                                .addClass('invalid-feedback');
                        } else {
                            $("#country_id")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }

                        if (errors.address) {
                            $("#address")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.address)
                                .addClass('invalid-feedback');
                        } else {
                            $("#address")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }

                        if (errors.apartment) {
                            $("#apartment")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.apartment)
                                .addClass('invalid-feedback');
                        } else {
                            $("#apartment")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }

                        if (errors.city) {
                            $("#city")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.city)
                                .addClass('invalid-feedback');
                        } else {
                            $("#city")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }

                        if (errors.state) {
                            $("#state")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.state)
                                .addClass('invalid-feedback');
                        } else {
                            $("#state")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }

                        if (errors.zip) {
                            $("#zip")
                                .addClass('is-invalid')
                                .siblings('p')
                                .html(errors.zip)
                                .addClass('invalid-feedback');
                        } else {
                            $("#zip")
                                .removeClass('is-invalid')
                                .siblings('p')
                                .html('')
                                .removeClass('invalid-feedback');
                        }


                    }
                }
            });
        });
    </script>
@endsection
