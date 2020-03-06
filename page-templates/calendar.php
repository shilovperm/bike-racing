<?php
/*
* Template Name: YearCalendar
*/

get_header(); ?>

    <div class="container">
      <h2 class="text-center">Календарь событий</h2>
      <!--  <div class="block-label">next-events</div>-->
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active show" id="2019-tab" data-toggle="tab" href="#YEAR2019" role="tab" aria-controls="2019" aria-selected="true">2019</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="2018-tab" data-toggle="tab" href="#YEAR2018" role="tab" aria-controls="2018" aria-selected="false">2018</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade active show" id="YEAR2019" role="tabpanel" aria-labelledby="2019-tab">
          <div class="card card-cascade card-month  position-relative blue-grey-text">
            <p class="mb-0 text-center"><b>Февраль</b></p>
            <div class="card card-calendar text-white bg-secondary m-1 ml-3 mr-3" style="max-width: 18rem;">
              <div class="card-header p-0 d-flex justify-content-center">Perm MTB Cup 2020</div>
              <div class="card-body p-0">
                <div class="d-flex justify-content-between p-0 pl-1 pr-2">
                  <p class="card-text m-0">08.03.2019</p>
                  <p class="card-text m-0">XCO</p>
                </div>
              </div>
            </div>
            <div class="card card-calendar text-white bg-success m-1 ml-3 mr-3" style="max-width: 18rem;">
              <div class="card-header p-0 d-flex justify-content-center">Perm MTB Cup 2020</div>
              <div class="card-body p-0">
                <div class="d-flex justify-content-between p-0 pl-1 pr-2">
                  <p class="card-text m-0">08.03.2019</p>
                  <p class="card-text m-0">XCO</p>
                </div>
              </div>
            </div>
            <div class="card card-calendar text-white bg-info m-1 ml-3 mr-3" style="max-width: 18rem;">
              <div class="card-header p-0 d-flex justify-content-center">Perm MTB Cup 2020</div>
              <div class="card-body p-0">
                <div class="d-flex justify-content-between p-0 pl-1 pr-2">
                  <p class="card-text m-0">08.03.2019</p>
                  <p class="card-text m-0">XCO</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="YEAR2018" role="tabpanel" aria-labelledby="2019-tab">
          <div class="card card-cascade card-month  position-relative blue-grey-text">
            <p class="mb-0 text-center"><b>Февраль</b></p>
            <div class="card card-calendar text-white bg-secondary m-1 ml-3 mr-3" style="max-width: 18rem;">
              <div class="card-header p-0 d-flex justify-content-center">Perm MTB Cup 2020</div>
              <div class="card-body p-0">
                <div class="d-flex justify-content-between p-0 pl-1 pr-2">
                  <p class="card-text m-0">08.03.2018</p>
                  <p class="card-text m-0">XCO</p>
                </div>
              </div>
            </div>
            <div class="card card-calendar text-white bg-success m-1 ml-3 mr-3" style="max-width: 18rem;">
              <div class="card-header p-0 d-flex justify-content-center">Perm MTB Cup 2020</div>
              <div class="card-body p-0">
                <div class="d-flex justify-content-between p-0 pl-1 pr-2">
                  <p class="card-text m-0">08.03.2018</p>
                  <p class="card-text m-0">XCO</p>
                </div>
              </div>
            </div>
            <div class="card card-calendar text-white bg-info m-1 ml-3 mr-3" style="max-width: 18rem;">
              <div class="card-header p-0 d-flex justify-content-center">Perm MTB Cup 2020</div>
              <div class="card-body p-0">
                <div class="d-flex justify-content-between p-0 pl-1 pr-2">
                  <p class="card-text m-0">08.03.2018</p>
                  <p class="card-text m-0">XCO</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


  </div>
<?php
get_footer();
