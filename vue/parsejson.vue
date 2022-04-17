<template>
  <div class="pages odd-page">
    <div class="odd-center">
      <div class="title-2">
        <span><i class="fas fa-futbol navbar-icons cl-g navbar-icons"/>FUTBOL</span>
        <!-- <select v-model="bookBox" class="selectbox box-odd" @change="getOdds()">
          <option value="bet365" disabled>Bet365</option>
          <option value="2">Bet365</option>
          <option value="150">BWin</option>
          <option value="1">10Bet</option>
          <option value="3">188Bet</option>
          <option value="271057013">Skybet</option>
          <option value="271056727">Planetwin365</option>
          <option value="25">Dafabet</option>
          <option value="187">William Hill</option>
          <option value="2467">Titan Bet</option>
          <option value="114">Betsson</option>
        </select>
        <input type="date" v-model="dateOdd" class="date" @change="getOdds()"> -->
        <span class="badge bg-g">{{leagueLength}}</span>
      </div>
      <div class="odd-center-con">
        <div class="odd-con">
          <div v-for="(list, index) in filterSubOptions" :key="index">
            {{list}}
          </div>
          <!-- {{filterSubOptions}} -->
          <!-- <details class="odd-details cp" v-for="(list, index) in odds" :key="index">
            <summary class="title-3 pr-0">
              <div class="odd-left-title">
                <span class="flag-con">
                  <img :src="require('../../assets/img/'+ list[0].country_name + '.png')">
                  <span class="leag ml10">{{list[0].country_name}} {{list[0].league_name}}</span>
                </span>
              </div>
              <div class="odd-right-title">
                <span class="odd-items bt">1</span>
                <span class="odd-items bt">0</span>
                <span class="odd-items bt">2</span>
                <span class="odd-items bt">A-2.5</span>
                <span class="odd-items bt">U-2.5</span>
                <span class="odd-items bt">A-1.5</span>
                <span class="odd-items bt">U-1.5</span>
                <span class="odd-items bt">Var</span>
                <span class="odd-items bt">Yok</span>
                <span class="blli blli-last"><i class="fab fa-mizuni fa-lg"/></span>
              </div>
            </summary>
            <div v-for="sublist in list" :key="sublist.id" class="list">
              <div class="odd-left-list">
                <span class="blli code"><span class="code-frame">{{sublist.event_key}}</span></span>
                <span class="blli date">{{ sublist.event_date | moment('MM/DD') }}</span>
                <span class="blli time">{{ sublist.event_time }}</span>
                <span class="blli matches">{{ sublist.event_home_team }} - {{ sublist.event_away_team }}</span>
              </div>
              <div class="odd-right-list">
                <div v-for="sublist in limitBy(list.options, 9)" :key="sublist.option" class="blli hover" @click="addSlip(list, sublist)">
                    <span class="sublist-rate-text">{{sublist.rate}}</span>
                </div>
                <span class="blli blli-last" @click="getSubOptions(list.code, list.matches)">
                  <i class="fas fa-plus-square fa-lg cp cl-f"/>
                </span>
              </div>
            </div>
            <div v-for="(list2, index2) in list.continent" :key="index2">
              <span>{{list2.name}}</span>
            </div>
          </details> -->
        </div>
        <div class="page-end"><span>Başka veri yoktur</span></div>
        <preloader v-if="loader" class="loader-con"/>
        <notfound v-if="notfound" :message="notfound" class="not-found"/>
        <transition name="slayt">
          <div v-if="subOptions" class="suboptions" :class="{opacityClass: subOptions}">
            <header class="suboptions-header">
              <span>{{matches}}</span>
              <i class="fas fa-times-circle fa-lg cp" @click="subOptions = false"></i>
            </header>
            <div class="suboptions-con">
              <div v-for="list in filterSubOptions" :key="list.id">
                <div v-for="list2 in list.options" :key="list2.id" @click="addSlip(list, list2,)">
                  <div class="suboptions-title">{{list2.games}}</div>
                  <div class="subaoption-list-con">
                    {{list2.games}}
                    {{list2.option}}
                    {{list2.rate}}
                  </div>
                </div>
              </div>
            </div>
            <div class="suboptions-footer"></div>
          </div> 
        </transition>
      </div>
    </div>
    <slipside class="slip-side" :totalRate.sync="totalRate" :slips="slips" :slipSummary="slipSummary" :betSlip.sync="betSlip" :branchClass="branchClass"/>
  </div>
</template>
<script>
import axios from 'axios'
import Vue2Filters from 'vue2-filters'
import slipside from '@/components/slipside'
import notfound from '@/components/notfound'
import preloader from '@/components/preloader'
import oddjson from '../../json/odd.json'
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
      leagueLength: 0,
      slips: [],
      searchBox: '',
      bookBox: '2',
      countryBox: 'Hepsi',
      bookmakersBox: 'Hepsi',
      leagBox: 'Hepsi',
      betSlip: false,
      totalRate: 1,
      subOptions: false,
      id: '',
      notfound: '',
      branchClass: 'slip-no-bet',
      dateOdd: moment(new Date()).format("YYYY-MM-DD"),
      loader: false,
      slipSummary: {
        user: this.$store.state.auth.user,
        admin: this.$store.state.auth.admin,
        branch: 'Futbol',
        amount: '',
        owner: '',
        betsCount: 0,
        betref: Math.floor(Math.random() * Math.floor(99999))
      }
    }
  },
  mounted () {
    this.getOdds()
  },
  computed : {
    filterSubOptions () {
      for (const key in this.odds) {
        return this.odds.meta.sports[0]
        // return this.odds.meta.plan.price.match(40)
      }
    }
  },
  methods: {
    async getOdds () {
      this.odds = oddjson
      console.log('--------------------------------orignal')
      console.log(oddjson)
      //----------------------------parse main
      console.log('--------------------------------parse main')
      for (const key in oddjson) {
        console.log(oddjson[key])
      }
      //----------------------------parse main > meta
      console.log('--------------------------------parse main > meta')
      for (const key in oddjson.meta) {
        console.log(oddjson.meta[key])
      }
      //----------------------------parse main > meta > plan
      console.log('--------------------------------parse main > meta > plan')
      for (const key in oddjson.meta.plan) {
        console.log(oddjson.meta.plan[key])
      }
      //----------------------------parse main > meta > sports as array
      console.log('--------------------------------parse main > meta > sports as array')
      for (const key in oddjson.meta.sports[0]) {
        console.log(oddjson.meta.sports[0][key])
      }





      // this.loader = true
      // await axios.get("https://allsportsapi.com/api/football/?met=Fixtures&APIkey=35e47b53d815b4c2266328dd034a12fd07aaf9cd8fdef349d194c96b166bdd6a&from=2019-06-23&to=2019-06-23").then((result) => {
      //   let grouppedArray =_.groupBy(result.data.result, 'league_name')
      //   this.odds = grouppedArray
      //   this.loader = false
      //   this.leagueLength = Object.keys(grouppedArray).length
      //   result.data.result.forEach(element => {
      //     if (element.country_name !== null) {
      //       let str = element.country_name
      //       .replace('Algeria','Cezayir')
      //       .replace('Armenia','Ermenistan')
      //       .replace('Argentina','Arjantin')
      //       .replace('Albania','Arnavutluk')
      //       .replace('Africa','Afrika')
      //       .replace('Australia','Avusturalya')
      //       .replace('Avusturalya & Oceania','Avusturalya')
      //       .replace('Austria','Avusturya')
      //       .replace('Azerbaijan','Azerbaycan')
      //       .replace('Belarus','Beyaz Rusya')
      //       .replace('Bolivia','Bolivya')
      //       .replace('Bosnia and Herzegovina','Bosna Hersek')
      //       .replace('Brazil','Brezilya')
      //       .replace('Bulgaria','Bulgaristan')
      //       .replace('Canada','Kanada')
      //       .replace('Cameroon','Kamerun')
      //       .replace('Cape Verde','Fildişi Sahili')
      //       .replace('Colombia','Kolombiya')
      //       .replace('China','Cin')
      //       .replace('Cambodia','Kamboçya')
      //       .replace('Chile','Sili')
      //       .replace('Costa Rica','Kosta Rika')
      //       .replace('Cyprus','Kıbrıs')
      //       .replace('Croatia','Hırvatistan')
      //       .replace('Czech Republic','Cek Cumhuriyeti')
      //       .replace('Belgium','Belçika')
      //       .replace('Denmark','Danimarka')
      //       .replace('Dominican Republic','Dominik Cumhuriyeti')
      //       .replace('DR Congo','Kongo')
      //       .replace('Ecuador','Ekvator')
      //       .replace('Egypt','Mısır')
      //       .replace('England','İngiltere')
      //       .replace('Estonia','Estonya')
      //       .replace('Ethiopia','Etyopya')
      //       .replace('Europe','Avrupa')
      //       .replace('France','Fransa')
      //       .replace('Faroe Islands','Faroe Adaları')
      //       .replace('FYR of Macedonia','Makedonya')
      //       .replace('Georgia','Gürcistan')
      //       .replace('Germany','Almanya')
      //       .replace('Ghana','Gana')
      //       .replace('Greece','Yunanistan')
      //       .replace('Hungary','Macaristan')
      //       .replace('Italy','İtalya')
      //       .replace('Iceland','İzlanda')
      //       .replace('India','Hindistan')
      //       .replace('Indonesia','Endenozya')
      //       .replace('Iraq','Irak')
      //       .replace('IRAQ','Irak')
      //       .replace('Iran','İran')
      //       .replace('Ireland','İrlanda')
      //       .replace('Israel','İsrail')
      //       .replace('Ivory Coast','Fildişi Sahili')
      //       .replace('Japan','Japonya')
      //       .replace('Jordan','Urdün')
      //       .replace('Kazakhstan','Kazakistan')
      //       .replace('Kosovo','Kosova')
      //       .replace('Kongo','Kongo Cumhuriyeti')
      //       .replace('Kyrgyzstan','Kırgızistan')
      //       .replace('Latvia','Letonya')
      //       .replace('Lebanon','Lübnan')
      //       .replace('Lithuania','Litvanya')
      //       .replace('Malaysia','Malezya')
      //       .replace('Mauritania','Marutanya')
      //       .replace('Mexico','Meksika')
      //       .replace('Moldova','Moldovya')
      //       .replace('Morocco','Fas')
      //       .replace('Maldives','Maldivler')
      //       .replace('Netherlands','Hollanda')
      //       .replace('New Caledonia','Yeni Kaledonya')
      //       .replace('New Zealand','Yeni Zellanda')
      //       .replace('Northern İrlanda','Kuzey İrlanda')
      //       .replace('North & Central America','Amerika')
      //       .replace('Norway','Norveç')
      //       .replace('Nicaragua','Nikaraguay')
      //       .replace('Oman','Umman')
      //       .replace('Qatar','Katar')
      //       .replace('Poland','Polonya')
      //       .replace('Portugal','Portekiz')
      //       .replace('Republic of Ireland','Irlanda')
      //       .replace('Republic of the Congo','Kongo Cumhuriyeti')
      //       .replace('Russia','Rusya')
      //       .replace('Romania','Romanya')
      //       .replace('Réunion','Reunion')
      //       .replace('R?union','Reunion')
      //       .replace('Saudi Arabia','Sudi Arabistan')
      //       .replace('Turkey','Türkiye')
      //       .replace('Seychelles','Seyşeller')
      //       .replace('Switzerland','Isviçre')
      //       .replace('Spain','İspanya')
      //       .replace('Sweden','İsveç')
      //       .replace('South Korea','Güney Kore')
      //       .replace('South Afrika','Güney Afrika')
      //       .replace('South America','Güney Amerika')
      //       .replace('Slovakia','Slovakya')
      //       .replace('Serbia','Sırbistan')
      //       .replace('Scotland','Iskoçya')
      //       .replace('Syria','Suriye')
      //       .replace('Tanzania','Tanzanya')
      //       .replace('Tajikistan','Tacikistan')
      //       .replace('Thailand','Tayland')
      //       .replace('Tunisia','Tunus')
      //       .replace('Ukraine','Ukrayna')
      //       .replace('United Arab Emirates','Birleşik Arap Emirlikleri')
      //       .replace('Wales','Galler')
      //       .replace('World','Dünya')
      //       element.country_name = str
      //     }
      //   })
      //   console.log(result.data.result)
      // })
    },
   
    addSlip (list, sublist) {   
      this.slips.push({
        user: this.$store.state.auth.user,
        admin: this.$store.state.auth.admin,
        code: list.code,
        match: list.matches,
        date: list.date,
        time: list.time,
        games: sublist.games,
        option: sublist.option,
        rate: sublist.rate,
        betref: this.slipSummary.betref,
        state: 'Aktif'
      })
      this.slips.reverse()
      this.slipSummary.betsCount++
      this.getTotalRate()
      this.subOptions = false
      this.betSlip = true
    },
    getTotalRate () {
      this.totalRate *= this.slips[0].rate.toPrecision()
    },
    searchBoxClear () {
      this.searchBox = ''
    },
    getSubOptions (id, matches) {
      this.subOptions = true
      this.id = id
      this.matches = matches
    },
    betTime (value) {
      let diff = Date.now() - new Date(value).getTime()
      return Math.floor((diff / 1000) / 60)
    },
    transCountry (value) {
       value.forEach(element => {
          let countryname = element.league.data.country.data.name
          .replace('Argentina','Arjantin')
          .replace('Armenia','Ermenistan')
          .replace('Australia','Avusturalya')
          .replace('Austria','Avusturya')
          .replace('Belarus','Beyaz Rusya')
          .replace('Bosnia and Herzegovina','Bosna Hersek')
          .replace('Brazil','Brezilya')
          .replace('Bulgaria','Bulgaristan')
          .replace('Cambodia','Kamboçya')
          .replace('Canada','Kanada')
          .replace('Chile','Sili')
          .replace('China PR','Cin')
          .replace('Chinese Taipei','Cin')
          .replace('Colombia','Kolombia')
          .replace('Cyprus','Kıbrıs')
          .replace('Croatia','Hırvatistan')
          .replace('Czech Republic','Cek Cumhuriyeti')
          .replace("Côte d'Ivoire","Fildişi Sahili")
          .replace('Belgium','Belçika')
          .replace('Denmark','Danimarka')
          .replace('Ecuador','Ekvator')
          .replace('England','Ingiltere')
          .replace('Estonia','Estonya')
          .replace('Ethiopia','Etyopya')
          .replace('Europe','Avrupa')
          .replace('France','Fransa')
          .replace('Finland','Finlandiya')
          .replace('Georgia','Gürcistan')
          .replace('Germany','Almanya')
          .replace('Ghana','Gana')
          .replace('Greece','Yunanistan')
          .replace('Hungary','Macaristan')
          .replace('International','Dünya')
          .replace('Kazakhstan','Kazakistan')
          .replace('Korea Republic','Kore Cumhuriyeti')
          .replace('Kosovo','Kosova')
          .replace('League','Lig')
          .replace('Lithuania','Litvanya')
          .replace('Malaysia','Malezya')
          .replace('Maldives','Maldivler')
          .replace('Mexico','Meksika')
          .replace('Moldova','Moldovya')
          .replace('Morocco','Fas')
          .replace('Italy','Italya')
          .replace('Netherlands','Hollanda')
          .replace('Northern Ireland','Kuzey İrlanda')
          .replace('Poland','Polonya')
          .replace('Portugal','Portekiz')
          .replace('Republic of Ireland','Irlanda')
          .replace('Norway','Norveç')
          .replace('Romania','Romanya')
          .replace('Wales','Galler')
          .replace('Ukraine','Ukrayna')
          .replace('Taivand','Tayvand')
          .replace('Thailand','Tayland')
          .replace('Turkey','Türkiye')
          .replace('Switzerland','Isviçre')
          .replace('Spain','Ispanya')
          .replace('Sweden','Isveç')
          .replace('South Africa','Güney Afrika')
          .replace('Slovakia','Slovakya')
          .replace('Serbia','Sırbistan')
          .replace('Scotland','Iskoçya')
          .replace('Russia','Rusya')
          .replace('New Caledonia','Yeni Kaledonya')
          .replace('Japan','Japonya')
          .replace('South America','Güney Amerika')
          .replace('Canada','Kanada')
          .replace('Republic of the Congo','Kango Cumhuriyeti')
          .replace('Iceland','Izlanda')
          .replace('Indonesia','Endenozya')
          .replace('Oman','Umman')
          .replace('World','Dünya')
          .replace('USA','Amerika')
          .replace('Latvia','Letonya')
          .replace('Guinea','Gine')
          .replace('Faroe Islands','Faroe Adaları')
          .replace('USA US Open Cup','ABD Açık Kupası')
          .replace('International Friendly International','Uluslararası Hazırlık Maçları')
          .replace('International Friendly International Women','Uluslararası Hazırlık Maçları,Kadınlar')
          .replace('World Toulon Tournament','Uluslararası Genç - U23 Toulon Turnuvası')
          element.league.data.country.data.name = countryname
        })
    }
  }
}
</script>