<div class="container">
    <div class="row mb-3 justify-content-center">
        <div class="col-md-8 text-center">
            <h2>Info Kegiatan</h2>
            <p class="lead">Berikut adalah bebrapa info ataupun berita tentang yayasan kami.</p>
        </div>
    </div>
</div>

<div class="container-fluid">

    <!-- <div class="row"> -->

    <div class="col-md-12 block-11">
        <div class="nonloop-block-11 owl-carousel">
            @foreach ($news as $item)
                <div class="card fundraise-item">
                    <a href="#">
                        <img height="300" width="300" class="card-img-top" src="{{ asset('storage/' . $item->image) }}" alt="Image placeholder">
                    </a>
                    <div class="card-body">
                        <h3 class="card-title"><a href="#">{{ $item->title }}</a></h3>
                        <p class="card-text">{{ $item->content }}</p>
                    </div>
                </div>
            @endforeach



            {{-- <div class="card fundraise-item">
                <a href="#"><img class="card-img-top" src="/assets/images/img_3.jpg" alt="Image placeholder"></a>
                <div class="card-body">
                    <h3 class="card-title"><a href="#">Santri sedang melakukan pengajian rutin</a></h3>
                    <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing.
                        content.</p>
                </div>
            </div>

            <div class="card fundraise-item">
                <a href="#"><img class="card-img-top" src="/assets/images/img_4.jpg" alt="Image placeholder"></a>
                <div class="card-body">
                    <h3 class="card-title"><a href="#">Santri melakukan pengajian rutin</a></h3>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>


            <div class="card fundraise-item">
                <a href="#"><img class="card-img-top" src="/assets/images/img_6.jpg" alt="Image placeholder"></a>
                <div class="card-body">
                    <h3 class="card-title"><a href="#">pembangunan asrama pondok pesantren </a></h3>
                    <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa..</p>
                </div>
            </div>

            <div class="card fundraise-item">
                <a href="#"><img class="card-img-top" src="/assets/images/img_5.png" alt="Image placeholder"></a>
                <div class="card-body">
                    <h3 class="card-title"><a href="#">Milad Pondok Pesantren</a></h3>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        content.</p>
                </div>
            </div> --}}

        </div>
    </div>
    <!-- </div> -->
</div>
