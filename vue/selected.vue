<template>
  <div class="scors-page">
    <div class="scors-top color-black-2 font-2">
      <div>
        <i class="fas fa-certificate navbar-icons cl-g" />
        <span>SKORLAR</span>
      </div>
    </div>
    <header class="scors-filter">
      <div class="scors-filter-items" :class="{filterActiveClass: selected==1}" @click="selected = 1">HEPSİ</div>
      <div class="scors-filter-items" :class="{filterActiveClass: selected==2}" @click="selected = 2">CANLI</div>
      <div class="scors-filter-items" :class="{filterActiveClass: selected==3}" @click="selected = 3">BİTMİŞ</div>
      <div class="scors-filter-items" :class="{filterActiveClass: selected==4}" @click="selected = 4">BAŞLAMAMIŞ</div>
      <div class="scors-filter-items" :class="{filterActiveClass: selected==5}" @click="selected = 5">TARİH</div>
    </header>
    <div class="scors-center">
      <aside class="scors-left">
        <details open class="odd-details" >
          <summary class="summary-title color-black-3 font-3">
            <div class="odd-left-title">
              <span class="bflag">
                <img src="../../assets/img/turkey.png" class="flags" >
              </span>
              <span class="leag">Turkey Superleag</span>
            </div>
          </summary>
          <div>
            <ul class="scors-list">
              <li class="scors-time sli">21:30</li>
              <li class="scors-home sli">Milan</li>
              <li class="scors-result sli"><b>0 - 0</b></li>
              <li class="scors-away sli">Barca</li>
              <li class="scors-live-time sli" v-if="live">88</li>
              <li class="scors-live-time sli" v-else><b>MS</b></li>
            </ul>
            <ul class="scors-list">
              <li class="scors-time sli">21:30</li>
              <li class="scors-home sli">Roma</li>
              <li class="scors-result sli"><b>0 - 0</b></li>
              <li class="scors-away sli">Arsenal</li>
              <li class="scors-live-time sli" v-if="live">88</li>
              <li class="scors-live-time sli" v-else><b>MS</b></li>
            </ul>
          </div>
        </details>
        <details open class="odd-details" >
          <summary class="summary-title color-black-3 font-3">
            <div class="odd-left-title">
              <span class="bflag">
                <img src="../../assets/img/spain.png" class="flags" >
              </span>
              <span class="leag">Spain LaLiga</span>
            </div>
          </summary>
          <div>
            <ul class="scors-list">
              <li class="scors-time sli">21:30</li>
              <li class="scors-home sli">Milan</li>
              <li class="scors-result sli"><b>0 - 0</b></li>
              <li class="scors-away sli">Barca</li>
              <li class="scors-live-time sli" v-if="live">88</li>
              <li class="scors-live-time sli" v-else><b>MS</b></li>
            </ul>
            <ul class="scors-list">
              <li class="scors-time sli">21:30</li>
              <li class="scors-home sli">Roma</li>
              <li class="scors-result sli"><b>0 - 0</b></li>
              <li class="scors-away sli">Arsenal</li>
              <li class="scors-live-time sli" v-if="live">88</li>
              <li class="scors-live-time sli" v-else><b>MS</b></li>
            </ul>
          </div>
        </details>
        <details open class="odd-details" >
          <summary class="summary-title color-black-3 font-3">
            <div class="odd-left-title">
              <span class="bflag">
                <img src="../../assets/img/turkey.png" class="flags" >
              </span>
              <span class="leag">Italya Seri A</span>
            </div>
          </summary>
          <div>
            <ul class="scors-list">
              <li class="scors-time sli">21:30</li>
              <li class="scors-home sli">Milan</li>
              <li class="scors-result sli"><b>0 - 0</b></li>
              <li class="scors-away sli">Barca</li>
              <li class="scors-live-time sli" v-if="live">88</li>
              <li class="scors-live-time sli" v-else><b>MS</b></li>
            </ul>
            <ul class="scors-list">
              <li class="scors-time sli">21:30</li>
              <li class="scors-home sli">Roma</li>
              <li class="scors-result sli"><b>0 - 0</b></li>
              <li class="scors-away sli">Arsenal</li>
              <li class="scors-live-time sli" v-if="live">88</li>
              <li class="scors-live-time sli" v-else><b>MS</b></li>
            </ul>
          </div>
        </details>
        <details open class="odd-details">
          <summary class="summary-title color-black-3 font-3">
            <div class="odd-left-title">
              <span class="bflag">
                <img src="../../assets/img/spain.png" class="flags" >
              </span>
              <span class="leag">Premier Ligi</span>
            </div>
          </summary>
          <div>
            <ul class="scors-list">
              <li class="scors-time sli">21:30</li>
              <li class="scors-home sli">Milan</li>
              <li class="scors-result sli"><b>0 - 0</b></li>
              <li class="scors-away sli">Barca</li>
              <li class="scors-live-time sli" v-if="live">88</li>
              <li class="scors-live-time sli" v-else><b>MS</b></li>
            </ul>
            <ul class="scors-list">
              <li class="scors-time sli">21:30</li>
              <li class="scors-home sli">Roma</li>
              <li class="scors-result sli"><b>0 - 0</b></li>
              <li class="scors-away sli">Arsenal</li>
              <li class="scors-live-time sli" v-if="live">88</li>
              <li class="scors-live-time sli" v-else><b>MS</b></li>
            </ul>
          </div>
        </details>
        <div class="page-end"><i class="fas fa-anchor fa-lg"></i></div>
      </aside>
      <aside class="scors-right">
        <details class="odd-details">
          <summary class="summary-title color-black-3 font-3">
            <div class="odd-left-title">
              <span class="bflag">
                <img src="../../assets/img/turkey.png" class="flags" >
              </span>
              <span class="leag">Turkey Superleag</span>
            </div>
          </summary>
          <div>
            <header class="standing-list">
              <span class="stand-team-title st">KULÜPLER</span>
              <span class="stand-o st">O</span>
              <span class="stand-g st">G</span>
              <span class="stand-b st">B</span>
              <span class="stand-m st">M</span>
              <span class="stand-b st mobile-class">A</span>
              <span class="stand-b st mobile-class">Y</span>
              <span class="stand-av st">AV</span>
              <span class="stand-p st">P</span>
            </header>
            <ul class="standing-list">
              <li class="stand-no stl"><span class="st-no">1</span></li>
              <li class="stand-team stl">Galatasaray</li>
              <li class="stand-o stl">3</li>
              <li class="stand-g stl">2</li>
              <li class="stand-b stl">0</li>
              <li class="stand-b stl">0</li>
              <li class="stand-b stl">0</li>
              <li class="stand-m stl mobile-class">0</li>
              <li class="stand-av stl mobile-class">6</li>
              <li class="stand-p stl"><span class="pt-no">12</span></li>
            </ul>
            <ul class="standing-list">
              <li class="stand-no stl"><span class="st-no">2</span></li>
              <li class="stand-team stl">Besiktas</li>
              <li class="stand-o stl">3</li>
              <li class="stand-g stl">2</li>
              <li class="stand-g stl">2</li>
              <li class="stand-g stl">2</li>
              <li class="stand-b stl">0</li>
              <li class="stand-m stl mobile-class">0</li>
              <li class="stand-av stl mobile-class">6</li>
              <li class="stand-p stl"><span class="pt-no">9</span></li>
            </ul>
            <ul class="standing-list">
              <li class="stand-no stl"><span class="st-no">3</span></li>
              <li class="stand-team stl">Trabzon Spor</li>
              <li class="stand-o stl">3</li>
              <li class="stand-g stl">2</li>
              <li class="stand-g stl">2</li>
              <li class="stand-g stl">2</li>
              <li class="stand-b stl">0</li>
              <li class="stand-m stl mobile-class">0</li>
              <li class="stand-av stl mobile-class">6</li>
              <li class="stand-p stl"><span class="pt-no">8</span></li>
            </ul>
            <ul class="standing-list">
              <li class="stand-no stl"><span class="st-no">18</span></li>
              <li class="stand-team stl">Besiktas</li>
              <li class="stand-o stl">3</li>
              <li class="stand-g stl">2</li>
              <li class="stand-g stl">2</li>
              <li class="stand-g stl">2</li>
              <li class="stand-b stl">0</li>
              <li class="stand-m stl mobile-class">0</li>
              <li class="stand-av stl mobile-class">6</li>
              <li class="stand-p stl"><span class="pt-no">7</span></li>
            </ul>
            <ul class="standing-list">
              <li class="stand-no stl"><span class="st-no">19</span></li>
              <li class="stand-team stl">Besiktas</li>
              <li class="stand-o stl">3</li>
              <li class="stand-g stl">2</li>
              <li class="stand-g stl">2</li>
              <li class="stand-g stl">2</li>
              <li class="stand-b stl">0</li>
              <li class="stand-m stl mobile-class">0</li>
              <li class="stand-av stl mobile-class">6</li>
              <li class="stand-p stl"><span class="pt-no">7</span></li>
            </ul>
            <ul class="standing-list">
              <li class="stand-no stl"><span class="st-no">20</span></li>
              <li class="stand-team stl">Besiktas</li>
              <li class="stand-o stl">3</li>
              <li class="stand-g stl">2</li>
              <li class="stand-g stl">2</li>
              <li class="stand-g stl">2</li>
              <li class="stand-b stl">0</li>
              <li class="stand-m stl mobile-class">0</li>
              <li class="stand-av stl mobile-class">6</li>
              <li class="stand-p stl"><span class="pt-no">6</span></li>
            </ul>
          </div>
        </details>
        <div class="page-end"><i class="fas fa-anchor fa-lg"></i></div>
      </aside>
    </div>
  </div>
</template>
<script>
export default {
  name: 'Scors',
  data () {
    return {
      live: false,
      selected: false
    }
  }
}
</script>
