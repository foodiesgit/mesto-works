<template>
  <div class="pages odd-page">
    <div class="odd-center">
      <div class="title-2">
        <div class="filter-con">
          <span class="odds-title"><i class="fas fa-table-tennis navbar-icons cl-lg"/>TENİS</span>
          <select v-model="timeBox" class="selectbox1" @change="getOdds()">
            <option value="Bugün" disabled>Bugün</option>
            <option :value="$moment().format('YYYY-MM-DD')">Bugün</option>
            <option :value="$moment().add(1, 'days').format('YYYY-MM-DD')">Yarın</option>
            <option :value="$moment().add(2, 'days').format('YYYY-MM-DD')">Ertesi Gün</option>
            <option value="Hepsi">Hepsi</option>
          </select>
          <input type="search" v-model="searchBox" class="searchbox-live odds-searchbox" placeholder="ara...">
          <i class="fas fa-globe fa-lg ml10 cp cl-lg" @click="getOdds()"/>
        </div>
        <span class="badge bg-g">{{leaguesLength}}</span>
      </div>
      <div class="odd-center-con">
        <div class="odd-con">
          <details open  class="odd-details cp" v-for="(list, index) in leagues" :key="index">
            <summary class="title-3 po-r">
              <div class="odd-left-title">
                <span class="flag-con">
                  <!-- <img :src="require('~/assets/img/'+ list[0].league.data.country.data.name + '.png')"> -->
                  <span class="leag ml10">{{list[0].league.name}}</span>
                </span>
              </div>
              <div class="odd-right-title">
                <span class="ottli-title">1</span>
                <span class="ottli-title">0</span>
                <span class="ottli-title">2</span>
                <span class="ottli-title ottli-last cl-y">{{list.length}}</span>
              </div>
            </summary>
            <div class="list" v-for="(sublist, index) in list" :key="index">
              <div class="odd-left-list" @click="getOdds(sublist.id)">
                <span class="blli code"><i class="fas fa-chart-line cl-lg fa-lg"/></span>
                <span class="blli date">{{$moment.unix(sublist.time,'MM-DD').format('MM:DD')}}</span>
                <span class="blli date">{{$moment.unix(sublist.time,'H:m').format('H:m')}}</span>
                <span class="blli matches">{{ sublist.home.name }} - {{ sublist.away.name }}</span>
              </div>
              <!-- <div class="odd-right-list" v-for="(oddlist, index) in sublist.odds.data" :key="index"> 
                <span class="ottli" @click="addSlip(oddlist.bookmaker.data[0].odds.data[0].value, oddlist.bookmaker.data[0].odds.data[0].label, sublist)">
                  <span class="rate-text" v-if="oddlist.bookmaker.data[0].odds.data[0]">{{oddlist.bookmaker.data[0].odds.data[0].value}}</span>
                </span>
                <span class="ottli" @click="addSlip(oddlist.bookmaker.data[0].odds.data[1].value, oddlist.bookmaker.data[0].odds.data[1].label, sublist)">
                  <span class="rate-text" v-if="oddlist.bookmaker.data[0].odds.data[1]">{{oddlist.bookmaker.data[0].odds.data[1].value}}</span>
                </span>
                <span class="ottli" @click="addSlip(oddlist.bookmaker.data[0].odds.data[2].value, oddlist.bookmaker.data[0].odds.data[2].label, sublist)">
                  <span class="rate-text" v-if="oddlist.bookmaker.data[0].odds.data[2]">{{oddlist.bookmaker.data[0].odds.data[2].value}}</span>
                </span>
                <span class="ottli ottli-last" @click="getSubOptions(sublist.id)"><i class="fas fa-plus-square fa-lg cp cl-f"/></span>
              </div> -->
            </div>
          </details>
          <!-- <transition name="slayt">
            <div v-if="subOptions" v-draggable class="suboptions" :class="{opacityClass: subOptions}">
              <header class="suboptions-header">
                <div>
                  <span>{{subOdds.localTeam.data.name}}</span>
                  <span>-</span>
                  <span>{{subOdds.visitorTeam.data.name}}</span>
                  <span class="badge bg-g ml20">{{subOdds.odds.data.length}}</span>
                </div>
                <i class="fas fa-times-circle fa-lg cp" @click="closeSubOption()"></i>
              </header>
              <div class="suboptions-con">
                <details class="suboptions-scroll" v-for="(oddsname, index) in orderBy(subOdds.odds.data, 'name')" :key="index">
                  <summary class="title-3 mt2">{{oddsname.name}}</summary>
                    <div class="subodds-list" :class="{suboddsMultiList: oddsname.id === 137918022 || oddsname.id === 976334 || oddsname.id === 976241 || oddsname.id === 38 || oddsname.id === 976389 || oddsname.id === 47 || oddsname.id === 976298 || oddsname.id === 137918031 || oddsname.id === 137918030 || oddsname.id === 975916 || oddsname.id === 136830669 || oddsname.id === 975909 || oddsname.id === 137918016 || oddsname.id === 137918037 || oddsname.id === 136830688 || oddsname.id === 976270 || oddsname.id === 976286 || oddsname.id === 137918023 || oddsname.id === 975903 || oddsname.id === 1265634158  || oddsname.id === 1256989858 || oddsname.id === 136830705 || oddsname.id === 75 || oddsname.id === 1257116775 || oddsname.id === 1257116774 || oddsname.id === 976209 || oddsname.id === 976204 || oddsname.id === 12 || oddsname.id === 83 || oddsname.id === 1256989860 || oddsname.id === 1256989866 || oddsname.id === 1256989865 || oddsname.id === 1265634160 || oddsname.id === 1265634161 || oddsname.id === 1265634162 || oddsname.id === 975905 || oddsname.id === 136830703 || oddsname.id === 976316 || oddsname.id === 69}">
                      <div class="subodds-wrapper" v-for="(oddsvalue, index) in oddsname.bookmaker.data[0].odds.data" :key="index" @click="setSlip(), addSlip(oddsvalue.value, oddsvalue.label, subOdds, oddsname.name)">
                        <div>
                          <span class="oddsrate mr5">{{oddsvalue.label}}</span>
                          <span class="oddsrate cl-r">{{oddsvalue.total}}</span>
                        </div>
                        <span class="oddsrate">{{oddsvalue.value}}</span>
                      </div>
                    </div>
                </details>
              </div>
              <footer class="suboptions-footer"></footer>
            </div> 
          </transition> -->
          <div class="page-end page-number">
            <div v-for="(page, index) in pageCount" :key="index">
              <div @click="getNextPage(index + 1)" class="badge bg-g mr20">
                <span class="page-links" :class="{activeClass: pageNext === index + 1}" @click="selected = index">{{index + 1}}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <aside class="right-side">
      <slipside class="slip-side" :totalRate.sync="totalRate" :slips="slips" :slipSummary="slipSummary" :betSlip.sync="betSlip" :branchClass="branchClass"/>
      <div class="favorite-leags">
        <div to="" class="fl-links" @click="getAsFavorite(600)">
          <div class="fl-title">
            <img src="~/assets/img/trb.png" class="fl-flags" >
            <span class="font-1">TÜRKİYE</span>
          </div>
            <div class="fl-text font-3">Basketbol Ligi</div>
        </div>
        <div to="" class="fl-links" @click="getAsFavorite(8)">
          <div class="fl-title">
            <img src="~/assets/img/enb.jpg" class="fl-flags" >
            <span class="font-1">İNGİLTERE</span>
          </div>
            <div class="fl-text font-3">Basketbol Ligi</div>
        </div>
        <div to="" class="fl-links"  @click="getAsFavorite(82)">
          <div class="fl-title">
            <img src="~/assets/img/grb.jpg" class="fl-flags" >
            <span class="font-1">ALMANYA</span>
          </div>
            <div class="fl-text font-3">Basketbol Ligi</div>
        </div>
        <div to="" class="fl-links" @click="getAsFavorite(564)">
          <div class="fl-title">
            <img src="~/assets/img/spb.jpg" class="fl-flags" >
            <span class="font-1">İSPANYA</span>
          </div>
            <div class="fl-text font-3">Basketbol Ligi</div>
        </div>
        <div to="" class="fl-links" @click="getAsFavorite(384)">
          <div class="fl-title">
            <img src="~/assets/img/itb.jpg" class="fl-flags" >
            <span class="font-1">iTALYA</span>
          </div>
            <div class="fl-text font-3">Basketbol Ligi</div>
        </div>
        <div to="" class="fl-links" @click="getAsFavorite(301)">
          <div class="fl-title">
            <img src="~/assets/img/frb.jpg" class="fl-flags" >
            <span class="font-1">FRANSA</span>
          </div>
            <div class="fl-text font-3">Basketbol Ligi</div>
        </div>
      </div>
    </aside>
  </div>
</template>
<script>
import axios from 'axios'
import Vue2Filters from 'vue2-filters'
import slipside from '@/components/slipside'
import notfound from '@/components/notfound'
import preloader from '@/components/preloader'
import moment from 'moment'
export default {
  mixins: [Vue2Filters.mixin],
  name: 'Odd',
  components: {
    slipside,
    notfound,
    preloader
  },
  data () {
    return {
      leagues: {},
      subOdds: {},
      leaguesLength: 0,
      slips: [],
      searchBox: '',
      sportBox: 1,
      bookBox: '2',
      timeBox: moment().format("YYYY-MM-DD"),
      betSlip: false,
      totalRate: 1,
      subOptions: false,
      notfound: '',
      branchClass: 'anten',
      dateOdd: moment().format("YYYY-MM-DD"),
      loader: false,
      subSlip: false,
      pageCount: 0,
      selected: false,
      pageNext: false,
      slipSummary: {
        user: this.$store.state.auth.user,
        admin: this.$store.state.auth.admin,
        branch: 'Tenis',
        amount: '',
        owner: '',
        betsCount: 0,
        betref: Math.floor(Math.random() * Math.floor(99999))
      }
    }
  },
  mounted () {
    this.getLeagues()
  },
  methods: {
    async getLeagues (pagenumber = 1) {
      this.loader = true
      await axios.get('/api/home/tennis').then((result) => {
        console.log(result.data)
        var test = []
        result.data.forEach(element => {
          element.results.forEach(element2 => {
            test.push(element2)
          })
        })
        this.leagues = _.groupBy(test, 'league.name')
        this.leaguesLength = test.length
      })
        // this.loader = false

        // this.pageCount = Math.ceil(result.data.pager.total / result.data.pager.per_page)
        // this.leaguesLength = pagenumber  +' / '+ result.data.results.length
        // this.loader = false
        // window.scrollTo(500, 0)
        // this.selected = 2
        // this.pageNext = pagenumber
        
      //  var test = []
      //   result.data.forEach(element => {
      //     element.results.forEach(element2 => {
      //       test.push(element2)
      //     })
      //   })
      //   setTimeout(() => {
      //     console.log(test)
      //   }, 10)
      // })
    },
    async getOdds (id) {
      await axios.post('/api/home/tennis/odds',{oddid: id}).then((result) => {
        this.odds = result.data.results
        console.log(this.odds)
      })
    },
    async getNextPage(pageindex) {
      this.getLeagues(pageindex)
    },
    setSlip () {
      this.subSlip = true
    },
    addSlip (rate, option, sublist, oddsname) {
      let games = ''
      if (this.subSlip) {
        games = oddsname
      } else {
        games = 'Maç Sonu'
      }
      this.slips.push({
        user: this.$store.state.auth.user,
        admin: this.$store.state.auth.admin,
        code: sublist.localTeam.data.id,
        match: sublist.localTeam.data.name +' - '+ sublist.visitorTeam.data.name,
        games: games,
        option: option,
        rate: rate,
        betref: this.slipSummary.betref,
        state: 'Aktif'
      })
      this.slips.reverse()
      this.slipSummary.betsCount++
      this.getTotalRate()
      this.betSlip = true
    },
    getTotalRate () {
      this.totalRate *= this.slips[0].rate
      this.totalRate =  this.totalRate.toFixed(2)
    },
    // async getSubOptions (id) {
    //   await axios.get(`https://soccer.sportmonks.com/api/v2.0/fixtures/${id}?api_token=yN1spj0QgdpIsAISrpEUsiTA5lpjlicJtfHzigkM0pg0OtYslOIxIiykHzvt&include=league.country,localTeam,visitorTeam,odds&bookmakers=${this.bookBox}`).then((result) => {
    //   this.subOptions = true
    //   this.subOdds = result.data.data
    //    result.data.data.odds.data.forEach(element => {
    //     this.markets.forEach(element2 => {
    //       if (element.id === element2.id) {
    //         element.name = element2.name
    //       }
    //     })
    //   })
    //     this.subOdds.odds.data.forEach(element => {
    //       element.bookmaker.data[0].odds.data.forEach(item => {
    //         let oddoptions = item.label
    //         .replace('Home','Evsahibi')
    //         .replace('Away','Deplasman')
    //         .replace('Draw : Draw','Beraberlik : Beraberlik')
    //         .replace('Draw/Draw','Beraberlik/Beraberlik')
    //         .replace('Draw','Beraberlik')
    //         .replace('Over','Üst')
    //         .replace('Under','Alt')
    //         .replace('1st Half','1.Devre')
    //         .replace('2nd Half','2.Devre')
    //         .replace('Tie','Eşit')
    //         .replace('Goals','Gol')
    //         .replace('No Goals','Gol Olmaz')
    //         .replace('No Goal','Gol Olmaz')
    //         .replace('No goal','Gol Olmaz')
    //         .replace('Yes','Evet')
    //         .replace('No','Hayır')
    //         .replace('Only','Yanlız')
    //         .replace('Both Teams','Her İki Takım')
    //         .replace('Odd','Tek')
    //         .replace('Even','Çift')
    //         .replace('more','Fazla')
    //         item.label = oddoptions
    //       }) 
    //     })
    //   })
    // },
    betTime (value) {
      let diff = Date.now() - new Date(value).getTime()
      return Math.floor((diff / 1000) / 60)
    },
    closeSubOption() {
      this.subOptions = false
      this.subSlip = false
    },
    // transCountry (value) {
    //    value.forEach(element => {
    //       let countryname = element.league.data.country.data.name
    //         .replace('Algeria','Cezayir')
    //         .replace('Armenia','Ermenistan')
    //         .replace('Argentina','Arjantin')
    //         .replace('Albania','Arnavutluk')
    //         .replace('Africa','Afrika')
    //         .replace('Australia','Avusturalya')
    //         .replace('Avusturalya & Oceania','Avusturalya')
    //         .replace('Austria','Avusturya')
    //         .replace('Azerbaijan','Azerbaycan')
    //         .replace('Belarus','Beyaz Rusya')
    //         .replace('Bolivia','Bolivya')
    //         .replace('Bosnia and Herzegovina','Bosna Hersek')
    //         .replace('Brazil','Brezilya')
    //         .replace('Bulgaria','Bulgaristan')
    //         .replace('Canada','Kanada')
    //         .replace('Cameroon','Kamerun')
    //         .replace('Cape Verde','Fildişi Sahili')
    //         .replace("Côte d'Ivoire",'Fildişi Sahili')
    //         .replace('Colombia','Kolombiya')
    //         .replace('China','Cin')
    //         .replace('Cambodia','Kamboçya')
    //         .replace('Chile','Sili')
    //         .replace('Costa Rica','Kosta Rika')
    //         .replace('Cyprus','Kıbrıs')
    //         .replace('Croatia','Hırvatistan')
    //         .replace('Czech Republic','Cek Cumhuriyeti')
    //         .replace('Belgium','Belçika')
    //         .replace('Denmark','Danimarka')
    //         .replace('Dominican Republic','Dominik Cumhuriyeti')
    //         .replace('DR Congo','Kongo')
    //         .replace('Ecuador','Ekvator')
    //         .replace('Egypt','Mısır')
    //         .replace('England','Ingiltere')
    //         .replace('Estonia','Estonya')
    //         .replace('Ethiopia','Etyopya')
    //         .replace('Europe','Avrupa')
    //         .replace('France','Fransa')
    //         .replace('Faroe Islands','Faroe Adaları')
    //         .replace('FYR of Macedonia','Makedonya')
    //         .replace('Georgia','Gürcistan')
    //         .replace('Germany','Almanya')
    //         .replace('Ghana','Gana')
    //         .replace('Greece','Yunanistan')
    //         .replace('Hungary','Macaristan')
    //         .replace('Italy','Italya')
    //         .replace('Iceland','Izlanda')
    //         .replace('India','Hindistan')
    //         .replace('Indonesia','Endenozya')
    //         .replace('International','Uluslararası')
    //         .replace('Iraq','Irak')
    //         .replace('Iran','Iran')
    //         .replace('Ireland','Irlanda')
    //         .replace('Israel','Israil')
    //         .replace('Ivory Coast','Fildişi Sahili')
    //         .replace('Japan','Japonya')
    //         .replace('Jordan','Urdün')
    //         .replace('Kazakhstan','Kazakistan')
    //         .replace('Kosovo','Kosova')
    //         .replace('Kongo','Kongo Cumhuriyeti')
    //         .replace('Korea Republic','Kore Cumhuriyeti')
    //         .replace('Kyrgyzstan','Kırgızistan')
    //         .replace('Latvia','Letonya')
    //         .replace('Lebanon','Lübnan')
    //         .replace('Lithuania','Litvanya')
    //         .replace('Malaysia','Malezya')
    //         .replace('Mauritania','Marutanya')
    //         .replace('Mexico','Meksika')
    //         .replace('Moldova','Moldovya')
    //         .replace('Morocco','Fas')
    //         .replace('Maldives','Maldivler')
    //         .replace('Netherlands','Hollanda')
    //         .replace('New Caledonia','Yeni Kaledonya')
    //         .replace('New Zealand','Yeni Zellanda')
    //         .replace('Northern İrlanda','Kuzey Irlanda')
    //         .replace('North & Central America','Amerika')
    //         .replace('Norway','Norveç')
    //         .replace('Nicaragua','Nikaraguay')
    //         .replace('Oman','Umman')
    //         .replace('Qatar','Katar')
    //         .replace('Poland','Polonya')
    //         .replace('Portugal','Portekiz')
    //         .replace('Republic of Irlanda','Irlanda')
    //         .replace('Republic of the Congo','Kongo Cumhuriyeti')
    //         .replace('Russia','Rusya')
    //         .replace('Romania','Romanya')
    //         .replace('Réunion','Reunion')
    //         .replace('Saudi Arabia','Sudi Arabistan')
    //         .replace('Turkey','Türkiye')
    //         .replace('Seychelles','Seyşeller')
    //         .replace('Switzerland','Isviçre')
    //         .replace('Spain','Ispanya')
    //         .replace('Sweden','Isveç')
    //         .replace('South Korea','Güney Kore')
    //         .replace('South Afrika','Güney Afrika')
    //         .replace('South America','Güney Amerika')
    //         .replace('N/C America','Amerika')
    //         .replace('Slovakia','Slovakya')
    //         .replace('Serbia','Sırbistan')
    //         .replace('Scotland','Iskoçya')
    //         .replace('Syria','Suriye')
    //         .replace('Tanzania','Tanzanya')
    //         .replace('Tajikistan','Tacikistan')
    //         .replace('Thailand','Tayland')
    //         .replace('Tunisia','Tunus')
    //         .replace('Ukraine','Ukrayna')
    //         .replace('United Arab Emirates','Birleşik Arap Emirlikleri')
    //         .replace('Wales','Galler')
    //         .replace('World','Dünya')
    //       element.league.data.country.data.name = countryname
    //     })
    // },
    // async getAsFavorite (id) {
    //   let test = []
    //   for (const key in this.odds) {
    //    this.odds[key].forEach(element => {
    //      if (element.league_id === id) {
    //        test.push(element)
    //      }
    //    })
    //   }
    //   this.odds = _.groupBy(test, 'league.data.name')
    // }
  }
}
</script>