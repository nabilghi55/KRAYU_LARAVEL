@extends('front.layouts.app')
@include('front.partials.navbar')
@section('content')
    <section class="h-3/4 lg:h-screen object-cover"
        style="background-image: url('{{ asset('img/banner.png') }}'); background-repeat: no-repeat; background-size: cover;">
        <div class="text-center h-full flex items-center justify-center mx-auto">
            <div class="text-white">
                <h1 class="text-6xl lg:text-8xl text-[#F3F0EB]">KRAYU</h1>
                <p class="text-2xl lg:text-5xl font-light tracking-wider">Mari mengukir <strong>cerita</strong> kita bersama
                    <span>Krayu</span>, </br> banyak
                    <strong>cerita</strong> yang bisa anda <strong>temukan</strong> </br> bersama <strong>kami</strong>.
                </p>
                <div class="mt-4">
                    <a href="#about"
                        class="bg-[#A6A6A8] opacity-80 px-4 py-3 text-xl lg:text-xl rounded-full text-white">Tentang
                        <strong>Krayu</strong></a>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="pt-5 w-3/4 mx-auto tracking-wide lg:text-2xl">
        <div class="text-center mx-auto">
            <div class="text-black">
                <h1 class="font-bold">Tentang Krayu</h1>
                <img src="{{ asset('img/image_about.png') }}" class="mt-4 w-11/12 mx-auto" alt="About">
                <h1 class="mt-5 font-bold">Apa itu Krebet?</h1>
                <p class="mt-4 text-justify">Krebet merupakan sentra industri batik kayu yang mempunyai potensi
                    kepariwisataan baik dari sisi budaya
                    maupun alamnya. Krebet terletak di Kabupaten Bantul, Daerah Istimewa Yogyakarta. Pemerintah Kabupaten
                    Bantul melalui Dinas Kebudayaan dan Pariwisata menetapkan Krebet sebagai Desa Wisata. Dinas
                    Perindustrian Perdagangan dan Koperasi bersama Kementrian Perindustrian Republik Indonesia telah
                    memfasilitasi Pengembangan Klaster Batik Kayu Krebet. Fasilitasi pelatihan dan alat, serta pameran telah
                    diberikan demi berkembangnya batik kayu di Krebet. Sentra Industri Kecil Menengah Krebet telah berdiri
                    Koperasi Sidokaton yang beranggotakan kurang lebih 57 Anggota.
                </p>
            </div>
        </div>
        <div class="mt-5 text-center mx-auto">
            <div class="text-black">
                <h1 class="font-bold">Sejarah Krebet</h1>
                <p class="mt-4 text-justify">Warga Dusun Krebet memiliki keadaan geografisnya yang berupa perbukitan
                    berkapur memenuhi kebutuhan hidup dari sektor pertanian. Pada sekitar tahun 1970-an demi mengais rezeki,
                    masyarakat krebet melakukan pekerjaan lainnya, salah satu pekerjaan yang ditekuni membuat kerajinan
                    berbahan baku kayu seperti irus, siwur, beruk dan pisau, meski saat itu hanya untuk memenuhi kebutuhan
                    warga Dusun Krebet. Hasil kerajinan kayu yang ada,  kemudian dipasarkan di desa-desa sekitar demi
                    menambah penghasilan disela-sela bertani. Bentuk kerajinan kayu dan proses pembuatan yang sederhana
                    membuat kerajinan kayu tersebut belum mempunyai daya jual tinggi dan membatasi proses penjualan.
                    Meskipun sederhana, kerajinan tersebut merupakan kerajinan pertama yang ada di Dusun Krebet. </p>
                <img src="{{ asset('img/image_history_1.png') }}" class="mt-4 w-11/12 mx-auto" alt="History 1">
                <p class="mt-4 text-justify">Kisah Bapak Gunjiar (65) merupakan awal dari perkembangan kerajinan kayu yang
                    signifikan. Sekitar tahun 1972, ia mulai mengembangkan bentuk-bentuk yang lebih rumit, seperti patung
                    Semar. Karya inovatif Gunjiar menarik perhatian banyak pengunjung saat pameran, meskipun ia belajar ukir
                    secara otodidak. Suatu ketika, ada seorang pelanggan yang memesan topeng, yang membuat Gunjiar merasa
                    tertantang. Ia kemudian memutuskan untuk magang di tempat Pak Warno Waskito, seorang pengrajin topeng
                    terkenal di Yogyakarta, dan berhasil menyelesaikan pesanan tersebut dengan baik.
                </p>
                <img src="{{ asset('img/image_history_2.png') }}" class="mt-4 w-11/12 mx-auto" alt="History 2">
                <p class="mt-4 text-justify">Pengrajin lainnya dari Dusun Krebet adalah Bapak Kemiskidi, yang juga pemilik
                    Sanggar Peni. Ia belajar
                    membuat topeng kayu dari Bapak Warno Waskito dan kemudian mengembangkan serta memasarkan kerajinannya
                    sendiri. Hasil penjualan karyanya membantunya untuk melanjutkan pendidikan ke tingkat SMA. Kemiskidi
                    berhasil mempertahankan dan mengembangkan Sanggar Peni, yang kini mempekerjakan sekitar 50 pengrajin.
                </p>
                <p class="text-justify">Di sisi lain, Bapak Anton Wahono, pengrajin asal Dusun Krebet dan pemilik Sanggar
                    Punokawan, awalnya
                    merupakan pengrajin wayang kulit. Berbekal keterampilan menyungging, ia membuka usaha produksi wayang
                    kulit. Namun, pada tahun 1988, kebijakan pemerintah yang membatasi ekspor kulit mentah membuat bahan
                    baku menjadi sulit dan mahal, sehingga harga kerajinan wayangnya terpengaruh. Akhirnya, Anton beralih
                    memproduksi wayang klithik dari kayu. Keberhasilannya dalam usaha ini membawanya meraih gelar sarjana
                    Sosiologi dari Universitas Widya Mataram Yogyakarta. Antara tahun 1980-1985, kerajinan kayu belum
                    menjadi mata pencaharian utama di Krebet, dengan sedikitnya sanggar. Namun, seiring berjalannya waktu,
                    permintaan terhadap kerajinan kayu meningkat, dan beberapa warga mulai bekerja sebagai buruh di Sanggar
                    Peni dan Sanggar Punokawan.</p>
            </div>
        </div>
    </section>
    @include('front.partials.footer')
