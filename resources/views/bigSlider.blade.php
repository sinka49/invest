<div class="bigSlider">
  <div class="bigSlider__carousel">
    <div class="owl-carousel-header owl-theme">
      @if(count($twoSlides[0]))
        @if( $twoSlides[0]->visible == 1)
      <div class="itemCarousel">
        <div class="itemCarousel__wrapper slide3" style="background-image: url('{{$twoSlides[0]->link}}');">
          <div class="centerBlock slide3__wrapper">
            <h3>СВЕДЕНИЯ О ГОРОДЕ МАХАЧКАЛЕ</h3>
            <div class="h3BottomLine"></div>
            <div class="wrapperProgressBar">

              <?php
                $data = json_decode($twoSlides[0]->params);

              ?>

              <div class="wrapperProgressBar__item">
                <div class="wrapperProgressBar__item--currentAmount">
                  <span style="color: #f51d45" id="currentAmount1" data-max="{{$data[0]->val}}">0</span>
                </div>
                <div class="wrapperProgressBar__item--textBefore">
                  <p>
                    {{$data[0]->title}} <br><br>
                  </p>
                </div>
                <div class="wrapperProgressBar__item--progressBar ">
                  <div class="investmentSize"></div>
                  <div class="progressBarCurrentAmount">
                    <span>{{$data[0]->valText}}</span>
                  </div>
                </div>
              </div>


              <div class="wrapperProgressBar__item">
                <div class="wrapperProgressBar__item--currentAmount">
                  <span style="color: #f3ba0b" id="currentAmount2" data-max="722314">0</span>
                </div>
                <div class="wrapperProgressBar__item--textBefore">
                  <p>
                    Население города Махачкала.<br><br>
                  </p>
                </div>
                <div class="wrapperProgressBar__item--progressBar ">
                  <div class="PopulationOfTheCity"></div>
                  <div class="progressBarCurrentAmount">
                    <span>722314</span>
                  </div>
                </div>
              </div>


              <div class="wrapperProgressBar__item">
                <div class="wrapperProgressBar__item--currentAmount">
                  <span style="color: #225ae7" id="currentAmount3" data-max="5700066000">0</span>
                </div>
                <div class="wrapperProgressBar__item--textBefore">
                  <p>
                    Оборот субъектов малого и среднего предпринимательства.
                  </p>
                </div>
                <div class="wrapperProgressBar__item--progressBar ">
                  <div class="GrossProduct"></div>
                  <div class="progressBarCurrentAmount">
                    <span>57млрд. 66тыс. руб.</span>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
      @endif
      @endif
      @if(count($twoSlides[1]))
          @if( $twoSlides[1]->visible == 1)
        <div class="itemCarousel">
            <?php
            $data = json_decode($twoSlides[1]->params);

            ?>
          <div class="itemCarousel__wrapper">
            <div class="slide2">
              <div class="slide2__img" style="background-image: url({{$twoSlides[1]->link}});"></div>
              <div class="slide2__text">

                <h3>{{$data->title}}</h3>
                <h4>Глава Махачкалы - столицы Республикин Дагестан</h4>
                <p>
                  “{{$data->val}}”
                </p>
              </div>
            </div>
          </div>
        </div>
          @endif
        @endif
@foreach($slides as $slide)
    @if(strlen($slide->content))
        {!! $slide->content !!}
        @else
      <div class="itemCarousel">
        <div class="itemCarousel__wrapper" style="background-image: url({{$slide->img}});">
          <div class="itemCarousel__wrapper--text centerBlock">
            <h3>
             {{$slide->title}}
            </h3>
          </div>
        </div>
      </div>
        @endif
 @endforeach

  </div>
</div>
</div>

