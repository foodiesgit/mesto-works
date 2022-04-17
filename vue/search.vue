<template>
  <div class="pages odd-page">
    <div class="odd-center">
      <div class="title-2">
        <span><i class="fas fa-futbol navbar-icons cl-g navbar-icons"/>FUTBOL</span>
        <div class="box-odd-con">
          <select v-model="bookBox" class="box-odd" @change="getOdds()">
            <option value="bet365" disabled>Bet365</option>
            <option value="2">Bet365</option>
            <option value="150">BWin</option>
            <option value="1">10Bet</option>
            <option value="15">Betfair</option>
            <option value="3">188Bet</option>
            <option value="271057013">Skybet</option>
            <option value="271056727">Planetwin365</option>
            <option value="25">Dafabet</option>
            <option value="187">William Hill</option>
            <option value="2467">Titan Bet</option>
          </select>
          <input type="text" v-model="searchBox" @keyup="searchFilter()" class="searchbox-live odds-searchbox" placeholder="ara...">
          <i class="fas fa-globe fa-lg ml10 cp cl-g" @click="getOdds()"/>
        </div>
          <span class="badge bg-g">{{oddsLength}}</span>
      </div>
      <div class="odd-center-con">
        <div class="odd-con">
          <details open  class="odd-details cp" v-for="(list, index) in odds" :key="index">
            <summary class="title-3 po-r">
              <div class="odd-left-title">
                <span class="flag-con">
                  <img :src="require('~/assets/img/'+ list[0].league.data.country.data.name + '.png')">
                  <span class="leag ml10">{{list[0].league.data.country.data.name}} {{list[0].league.data.name}}</span>
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
              <div class="odd-left-list">
                <span class="blli code"><i class="fas fa-chart-line cl-f fa-lg"/></span>
                <span class="blli date">{{sublist.time.starting_at.date | moment('MM-DD')}}</span>
                <span class="blli time">{{$moment.utc(sublist.time.starting_at.date_time,'YYYY-MM-DD HH:mm').tz('Europe/Istanbul').format('HH:mm')}}</span>
                <span class="blli matches">{{ sublist.localTeam.data.name }} - {{ sublist.visitorTeam.data.name }}</span>
              </div>
              <div class="odd-right-list" v-for="(oddlist, index) in sublist.odds.data" :key="index"> 
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
              </div>
            </div>
          </details>
          <div class="page-end"><span>Başka veri yoktur</span></div>
          <transition name="slayt">
            <div v-if="subOptions" class="suboptions" :class="{opacityClass: subOptions}">
              <header class="suboptions-header">
                <div>
                  <span>{{subOdds.localTeam.data.name}}</span>
                  <span>-</span>
                  <span>{{subOdds.visitorTeam.data.name}}</span>
                  <span class="badge bg-g ml20">{{subOdds.odds.data.length}}</span>
                </div>
                <i class="fas fa-times-circle fa-lg cp" @click="closeSubOption()"></i>
              </header>
              <div class="scors-statistics-con">
                <details class="suboptions-scroll" v-for="(oddsname, index) in subOdds.odds.data" :key="index">
                  <summary class="title-3 mt2">{{oddsname.name}} {{oddsname.id}}</summary>
                    <div class="subodds-list" :class="{suboddsMultiList: oddsname.id === 137918022 || oddsname.id === 976334 || oddsname.id === 976241 || oddsname.id === 38 || oddsname.id === 976389 || oddsname.id === 47 || oddsname.id === 976298 || oddsname.id === 137918031 || oddsname.id === 137918030 || oddsname.id === 975916 || oddsname.id === 136830669 || oddsname.id === 975909 || oddsname.id === 137918016 || oddsname.id === 137918037 || oddsname.id === 136830688 || oddsname.id === 976270 || oddsname.id === 976286 || oddsname.id === 137918023 || oddsname.id === 975903 || oddsname.id === 1265634158}">
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
          </transition>
        </div>
        <preloader v-if="loader" class="loader-con"/>
        <notfound v-if="notfound" :message="notfound" class="not-found"/>
      </div>
    </div>
    <aside class="right-side">
      <slipside class="slip-side" :totalRate.sync="totalRate" :slips="slips" :slipSummary="slipSummary" :betSlip.sync="betSlip" :branchClass="branchClass"/>
      <div class="favorite-leags">
        <div to="" class="fl-links" @click="getAsFavorite(600)">
          <div class="fl-title">
            <img src="~/assets/img/sl.png" class="fl-flags" >
            <span class="font-1">TÜRKİYE</span>
          </div>
            <div class="fl-text font-3">Süper Lig</div>
        </div>
        <div to="" class="fl-links" @click="getAsFavorite(8)">
          <div class="fl-title">
            <img src="~/assets/img/bl.png" class="fl-flags" >
            <span class="font-1">İNGİLTERE</span>
          </div>
            <div class="fl-text font-3">Primier Lig</div>
        </div>
        <div to="" class="fl-links"  @click="getAsFavorite(82)">
          <div class="fl-title">
            <img src="~/assets/img/bundes.png" class="fl-flags" >
            <span class="font-1">ALMANYA</span>
          </div>
            <div class="fl-text font-3">Bundesliga</div>
        </div>
        <div to="" class="fl-links" @click="getAsFavorite(564)">
          <div class="fl-title">
            <img src="~/assets/img/laliga.png" class="fl-flags" >
            <span class="font-1">İSPANYA</span>
          </div>
            <div class="fl-text font-3">LaLiga</div>
        </div>
        <div to="" class="fl-links" @click="getAsFavorite(384)">
          <div class="fl-title">
            <img src="~/assets/img/seriea.png" class="fl-flags" >
            <span class="font-1">iTALYA</span>
          </div>
            <div class="fl-text font-3">Seria A</div>
        </div>
        <div to="" class="fl-links" @click="getAsFavorite(301)">
          <div class="fl-title">
            <img src="~/assets/img/fl.png" class="fl-flags" >
            <span class="font-1">FRANSA</span>
          </div>
            <div class="fl-text font-3">Ligue 1</div>
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
      odds: {},
      subOdds: {},
      search: {},
      oddsLength: 0,
      slips: [],
      searchBox: '',
      bookBox: '2',
      betSlip: false,
      totalRate: 1,
      subOptions: false,
      notfound: '',
      branchClass: 'slip-no-bet',
      dateOdd: moment(new Date()).format("YYYY-MM-DD"),
      loader: false,
      subSlip: false,
      slipSummary: {
        user: this.$store.state.auth.user,
        admin: this.$store.state.auth.admin,
        branch: 'Futbol',
        amount: '',
        owner: '',
        betsCount: 0,
        betref: Math.floor(Math.random() * Math.floor(99999))
      },
      markets:{}
    }
  },
  mounted () {
    this.getOdds()
  },
  methods: {
    async getOdds () {
      let today = moment().format('YYYY-MM-DD')
      this.loader = true
      await axios.get(`https://soccer.sportmonks.com/api/v2.0/fixtures/date/${today}?api_token=yN1spj0QgdpIsAISrpEUsiTA5lpjlicJtfHzigkM0pg0OtYslOIxIiykHzvt&include=league.country,localTeam,visitorTeam,odds&bookmakers=${this.bookBox}&markets=1&prevent_pagination=1`).then((result) => {
        let oddsArray = []
         result.data.data.forEach(element => {
           if (element.time.status === 'NS' && element.odds.data.length > 0) {
             oddsArray.push(element)
          }
        })
        this.odds = _.groupBy(oddsArray, 'league.data.name')
        this.oddsLength =  oddsArray.length
        this.loader = false
        this.transCountry(result.data.data)
        this.search = result.data.data
      })
    },
    setSlip () {
      this.subSlip = true
    },
    addSlip (rate, option, sublist, oddsname) {
      let games = ''
      if (this.subSlip) {
        games = oddsname
      } else {
        games = sublist.odds.data[0].name
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
    async getSubOptions (id) {
      await axios.get(`https://soccer.sportmonks.com/api/v2.0/fixtures/${id}?api_token=yN1spj0QgdpIsAISrpEUsiTA5lpjlicJtfHzigkM0pg0OtYslOIxIiykHzvt&include=league.country,localTeam,visitorTeam,odds&bookmakers=${this.bookBox}`).then((result) => {
      this.subOptions = true
      this.subOdds = result.data.data
        // this.subOdds.odds.data.forEach(element => {
        //   let oddoptions = element.name
        //   .replace('3Way Result','3 lü Maç Sonucu')
        //   .replace('Goal Line','Gol Sınırı')
        //   .replace('Over/Under','Üst / Alt')
        //   .replace('Odd/Even','Tek / Çift')
        //   .replace('Home','Evsahibi')
        //   .replace('Away','Deplasman')
        //   .replace('First Half','1.Devre')
        //   .replace('1st Half','1.Devre')
        //   .replace('2nd Half','2.Devre')
        //   .replace('Asian','Asya')
        //   .replace('Exact','Kesin')
        //   .replace('Number','Sayısı')
        //   .replace('Goals','Goller')
        //   .replace('Winner','Kazananı')
        //   .replace('Double Chance','Çifte Şans')
        //   .replace('Double','Çifte Şans')
        //   .replace('Result','Maç Sonucu')
        //   .replace('Correct Score','Kesin Skor')
        //   .replace('HT/FT','1.Devre / Maç Sonucu')
        //   .replace('Handicap','Handikap')
        //   .replace('Draw No Bet','Beraberlikte İade')
        //   .replace('Both Teams To Score','Her iki Takımda Gol Atar')
        //   .replace('Team Highest Scoring Half','Hangi Devrede Daha Çok Gol Atar')
        //   .replace('Team To Score First','İlk Golü Hangi Takım Atar')
        //   .replace('Highest Scoring Half','Hangi Devrede Daha Çok Gol Olur')
          
        //   element.name = oddoptions
        // })
        // this.subOdds.odds.data.forEach(element => {
        //   element.bookmaker.data[0].odds.data.forEach(item => {
        //     let oddoptions = item.label
        //     .replace('No Goals','Gol Olmaz')
        //     .replace('Yes / Yes','Evet / Evet')
        //     .replace('No / No','Hayır / Hayır')
        //     .replace('Yes / No','Evet / Hayır')
        //     .replace('No / Yes','Hayır / Evet')
        //     .replace('Yes','Evet')
        //     .replace('No','Hayır')
        //     .replace('Tie','Eşit')
        //     .replace('Over','Üst')
        //     .replace('Under','Alt')
        //     .replace('Goals','Gol')
        //     .replace('Goal','Gol')
        //     .replace('Only','Sadece')
        //     .replace('Both Teams','Her İki Takım')
        //     .replace('Odd','Tek')
        //     .replace('Even','Çift')
        //     .replace('Draw','Beraberlik')
        //     .replace('Draw:Draw','Beraberlik:Beraberlik')
        //     .replace('Draw/Draw','Beraberlik/Beraberlik')
        //     .replace('Home','Evsahibi')
        //     .replace('Away','Deplasman')
        //     .replace('No Goal','Gol Olmaz')
        //     .replace('1st Half','İlk Devre')
        //     .replace('2nd Half','İkinci Devre')
        //     item.label = oddoptions
        //   }) 
        // })
      })
    },
    betTime (value) {
      let diff = Date.now() - new Date(value).getTime()
      return Math.floor((diff / 1000) / 60)
    },
    closeSubOption() {
      this.subOptions = false
      this.subSlip = false
    },
    transCountry (value) {
       value.forEach(element => {
          let countryname = element.league.data.country.data.name
            .replace('Algeria','Cezayir')
            .replace('Armenia','Ermenistan')
            .replace('Argentina','Arjantin')
            .replace('Albania','Arnavutluk')
            .replace('Africa','Afrika')
            .replace('Australia','Avusturalya')
            .replace('Avusturalya & Oceania','Avusturalya')
            .replace('Austria','Avusturya')
            .replace('Azerbaijan','Azerbaycan')
            .replace('Belarus','Beyaz Rusya')
            .replace('Bolivia','Bolivya')
            .replace('Bosnia and Herzegovina','Bosna Hersek')
            .replace('Brazil','Brezilya')
            .replace('Bulgaria','Bulgaristan')
            .replace('Canada','Kanada')
            .replace('Cameroon','Kamerun')
            .replace('Cape Verde','Fildişi Sahili')
            .replace("Côte d'Ivoire",'Fildişi Sahili')
            .replace('Colombia','Kolombiya')
            .replace('China','Cin')
            .replace('Cambodia','Kamboçya')
            .replace('Chile','Sili')
            .replace('Costa Rica','Kosta Rika')
            .replace('Cyprus','Kıbrıs')
            .replace('Croatia','Hırvatistan')
            .replace('Czech Republic','Cek Cumhuriyeti')
            .replace('Belgium','Belçika')
            .replace('Denmark','Danimarka')
            .replace('Dominican Republic','Dominik Cumhuriyeti')
            .replace('DR Congo','Kongo')
            .replace('Ecuador','Ekvator')
            .replace('Egypt','Mısır')
            .replace('England','Ingiltere')
            .replace('Estonia','Estonya')
            .replace('Ethiopia','Etyopya')
            .replace('Europe','Avrupa')
            .replace('France','Fransa')
            .replace('Faroe Islands','Faroe Adaları')
            .replace('FYR of Macedonia','Makedonya')
            .replace('Georgia','Gürcistan')
            .replace('Germany','Almanya')
            .replace('Ghana','Gana')
            .replace('Greece','Yunanistan')
            .replace('Hungary','Macaristan')
            .replace('Italy','Italya')
            .replace('Iceland','Izlanda')
            .replace('India','Hindistan')
            .replace('Indonesia','Endenozya')
            .replace('International','Uluslararası')
            .replace('Iraq','Irak')
            .replace('Iran','Iran')
            .replace('Ireland','Irlanda')
            .replace('Israel','Israil')
            .replace('Ivory Coast','Fildişi Sahili')
            .replace('Japan','Japonya')
            .replace('Jordan','Urdün')
            .replace('Kazakhstan','Kazakistan')
            .replace('Kosovo','Kosova')
            .replace('Kongo','Kongo Cumhuriyeti')
            .replace('Korea Republic','Kore Cumhuriyeti')
            .replace('Kyrgyzstan','Kırgızistan')
            .replace('Latvia','Letonya')
            .replace('Lebanon','Lübnan')
            .replace('Lithuania','Litvanya')
            .replace('Malaysia','Malezya')
            .replace('Mauritania','Marutanya')
            .replace('Mexico','Meksika')
            .replace('Moldova','Moldovya')
            .replace('Morocco','Fas')
            .replace('Maldives','Maldivler')
            .replace('Netherlands','Hollanda')
            .replace('New Caledonia','Yeni Kaledonya')
            .replace('New Zealand','Yeni Zellanda')
            .replace('Northern İrlanda','Kuzey Irlanda')
            .replace('North & Central America','Amerika')
            .replace('Norway','Norveç')
            .replace('Nicaragua','Nikaraguay')
            .replace('Oman','Umman')
            .replace('Qatar','Katar')
            .replace('Poland','Polonya')
            .replace('Portugal','Portekiz')
            .replace('Republic of Irlanda','Irlanda')
            .replace('Republic of the Congo','Kongo Cumhuriyeti')
            .replace('Russia','Rusya')
            .replace('Romania','Romanya')
            .replace('Réunion','Reunion')
            .replace('Saudi Arabia','Sudi Arabistan')
            .replace('Turkey','Türkiye')
            .replace('Seychelles','Seyşeller')
            .replace('Switzerland','Isviçre')
            .replace('Spain','Ispanya')
            .replace('Sweden','Isveç')
            .replace('South Korea','Güney Kore')
            .replace('South Afrika','Güney Afrika')
            .replace('South America','Güney Amerika')
            .replace('N/C America','Amerika')
            .replace('Slovakia','Slovakya')
            .replace('Serbia','Sırbistan')
            .replace('Scotland','Iskoçya')
            .replace('Syria','Suriye')
            .replace('Tanzania','Tanzanya')
            .replace('Tajikistan','Tacikistan')
            .replace('Thailand','Tayland')
            .replace('Tunisia','Tunus')
            .replace('Ukraine','Ukrayna')
            .replace('United Arab Emirates','Birleşik Arap Emirlikleri')
            .replace('Wales','Galler')
            .replace('World','Dünya')
          element.league.data.country.data.name = countryname
        })
    },
    async getAsFavorite (id) {
      let test = []
      for (const key in this.odds) {
       this.odds[key].forEach(element => {
         if (element.league_id === id) {
           test.push(element)
         }
       })
      }
      this.odds = _.groupBy(test, 'league.data.name')
    },
    searchFilter () {
      let searchArray = []
      this.search.forEach(element => {
        if (element.localTeam.data.name.toLowerCase().indexOf(this.searchBox.toLowerCase()) > -1 && element.time.status === 'NS' && element.odds.data.length > 0) {
          searchArray.push(element)
        }
      })
      this.odds = _.groupBy(searchArray, 'league.data.name')
      this.oddsLength =  searchArray.length
    }
  }
}
</script>