
    @if(count($media))
            <div class="media__left" style="background-image: url({{$media[0]->img}});">

            </div>
            <div class="media__right">
                <div class="wrapperButSwiper">
                    <div class="swiper-button-next"><i class="fa fa-angle-down" aria-hidden="true"></i></div>
                    <div class="swiper-button-prev"><i class="fa fa-angle-up" aria-hidden="true"></i></div>
                </div>
                <div class="blurBlock"></div>
                <!-- Swiper -->
                <div class="swiper-container gallery-thumbs">

                    <div class="swiper-wrapper">

                        @foreach($media as $item)
                            <div class="swiper-slide">
                                <div class="swiper-slide-item" style="background-image: url({{$item->img}});">
                                    <div class="slidePhotoIcon"></div>
                                </div>
                            </div>

                        @endforeach


                    </div>
                    <!-- Add Pagination -->
                    <!-- 	<div class="swiper-pagination"></div> -->


                </div>

            </div>

@endif