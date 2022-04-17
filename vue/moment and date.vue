<template>
  <div class="scors-page">
    <div class="scors-top color-black-2">
      <div class="mr20">
        <i class="fas fa-certificate navbar-icons cl-g" />
        <span>SKORLAR</span>
        <span class="badge bg-g">{{scors.length}}</span>
      </div>
      <div class="odd-filter-items">
        <input v-model="dateStart" type="date" @change="getScorsDate()" class="selectbox box-odd">
      </div>
      <div class="odd-filter-items ofis">
        <i class ="far fa-calendar-alt fa-lg citems-calendar" @click="getScors()"/>
      </div>
    </div>
    <div class="scors-con">
        <details open class="odd-details" v-for="(list, index) in scors" :key="index">
          <summary class="summary-title color-black-3">
            <div class="scors-title">
              <span class="flag-con">
                <!-- <img :src="require('../../assets/img/'+ list.country_name + '.png')"> -->
                <span class="leag">{{list.league.data.name}}</span>
              </span>
            </div>
          </summary>
          <div class="scors-list-con">
            <div class="scors-list">
               <span class="scors-items">{{list.time.starting_at.time}}</span>
               <span class="scors-items">{{list.localTeam.data.name}}</span>
              <!--<span class="scors-items">{{sublist.event_halftime_result}}</span>
              <span class="scors-items">{{sublist.event_home_team}}</span>
              <span class="scors-items">{{sublist.event_away_team}}</span>
              <span class="scors-items">{{sublist.event_final_result}}</span> -->
              <!-- <span class="scors-items">{{list.scores.ht_score}}</span>
              <span class="scors-items">{{list.localTeam.data.name}}</span>
              <span class="scors-items">{{list.scores.localteam_score}}</span>
              <span class="scors-items">{{list.scores.visitorteam_score}}</span>
              <span class="scors-items">{{list.visitorTeam.data.name}}</span>
              <span class="scors-items">{{list.scores.ft_score}}</span>
              <span class="scors-items">{{list.time.minute}}</span>
              <span class="scors-items">{{list.time.status}}</span> -->
            </div>
            
          </div>
        </details>
        <div class="page-end"><span class="">Başka veri yoktur</span></div>
    </div>
    <preloader v-if="loader"/>
  </div>
</template>
<script>
import axios from 'axios'
import Vue2Filters from 'vue2-filters'
import VueFilter from 'vue-filter'
import preloader from '@/components/preloader.vue'
import moment from 'moment'
export default {
  mixins: [Vue2Filters.mixin],
  name: 'Scors',
  components: {
    preloader
  },
  data () {
    return {
      scors: {},
      searchBox: '',
      dateStart: '',
      loader: false
    }
  },
  mounted () {
    this.getScors()
  },
  // filters: {
  //   getTr (date) {
  //     return moment(date).format('MMMM Do YYYY, h:mm:ss a');
  //   }
  // },
  methods: {
    searchBoxClear () {
      this.searchBox = ''
    },
    // getDate(date) {
    //     theDate = new Date( Date.parse(date))
    //     return theDate   
    // },
    async getScors() {
      // var locale = window.navigator.userLanguage || window.navigator.language
      // console.log(locale)
      // console.log(moment(new Date).fromNow())
      // var a = moment.tz("2013-11-18 11:55", "Asia/Taipei")
      // var b = moment.tz("2013-11-18 11:55", "America/Toronto")
      // console.log(a.format())
      // console.log(b.format())
      // console.log(moment("2019-06-11 12:00:00").tz("Europe/Istanbul").format('Z'))
      // const nDate = new Date().toLocaleString('tr-TR', {timeZone: 'Europe/Istanbul'})
      // console.log(nDate)

      // const input = this.dateStart
      // const dateObj = new Date(input)
      // const year = dateObj.getFullYear()
      // const month = (dateObj.getMonth()+1).toString().padStart(2, '0')
      // const date = dateObj.getDate().toString().padStart(2, '0')
      // const result = `${date}-${month}-${year}`

      // this.loader = true
      // await axios.get("https://soccer.sportmonks.com/api/v2.0/livescores?api_token=yN1spj0QgdpIsAISrpEUsiTA5lpjlicJtfHzigkM0pg0OtYslOIxIiykHzvt&include=localTeam,visitorTeam,league.country,stats,lineup,bench").then((result) => {
      // await axios.get("https://soccer.sportmonks.com/api/v2.0/livescores?api_token=yN1spj0QgdpIsAISrpEUsiTA5lpjlicJtfHzigkM0pg0OtYslOIxIiykHzvt").then((result) => {
      //   console.log(result.data.data)
      //   // this.scors = result.data.data
      // })
      await axios.get("https://soccer.sportmonks.com/api/v2.0/livescores?api_token=yN1spj0QgdpIsAISrpEUsiTA5lpjlicJtfHzigkM0pg0OtYslOIxIiykHzvt&include=localTeam,visitorTeam,league.country,stats,lineup,bench").then((result) => {
        
        this.scors = result.data.data
        console.log(result.data.data)

        // let grouppedArray =_.groupBy(result.data.result,'league_name')
        // this.scors = grouppedArray
        //  this.scors.forEach(element => {
        //   let str = element.country_name
        //   .replace('Argentina','Arjantin')
        //   .replace('Australia','Avusturalya')
        //   .replace('Austria','Avusturya')
        //   .replace('Belarus','Beyaz Rusya')
        //   .replace('Bosnia and Herzegovina','Bosna Hersek')
        //   .replace('Brazil','Brezilya')
        //   .replace('Bulgaria','Bulgaristan')
        //   .replace('Colombia','Kolombia')
        //   .replace('Cyprus','Kıbrıs')
        //   .replace('Croatia','Hırvatistan')
        //   .replace('Czech Republic','Cek Cumhuriyeti')
        //   .replace("Côte d'Ivoire","Fildişi Sahili")
        //   .replace('Belgium','Belçika')
        //   .replace('Denmark','Danimarka')
        //   .replace('Ecuador','Ekvator')
        //   .replace('England','Ingiltere')
        //   .replace('Europe','Avrupa')
        //   .replace('France','Fransa')
        //   .replace('Georgia','Gürcistan')
        //   .replace('Chile','Sili')
        //   .replace('Germany','Almanya')
        //   .replace('Ghana','Gana')
        //   .replace('Greece','Yunanistan')
        //   .replace('Hungary','Macaristan')
        //   .replace('Kosovo','Kosova')
        //   .replace('Mexico','Meksika')
        //   .replace('Moldova','Moldovya')
        //   .replace('Italy','Italya')
        //   .replace('Netherlands','Hollanda')
        //   .replace('Northern Ireland','Kuzey İrlanda')
        //   .replace('Poland','Polonya')
        //   .replace('Portugal','Portekiz')
        //   .replace('Republic of Ireland','Irlanda')
        //   .replace('Norway','Norveç')
        //   .replace('Romania','Romanya')
        //   .replace('Wales','Galler')
        //   .replace('Ukraine','Ukrayna')
        //   .replace('Turkey','Türkiye')
        //   .replace('Switzerland','Isviçre')
        //   .replace('Spain','Ispanya')
        //   .replace('Sweden','Isveç')
        //   .replace('South Africa','Güney Afrika')
        //   .replace('Slovakia','Slovakya')
        //   .replace('Serbia','Sırbistan')
        //   .replace('Scotland','Iskoçya')
        //   .replace('Russia','Rusya')
        //   .replace('New Caledonia','Yeni Kaledonya')
        //   .replace('Japan','Japonya')
        //   .replace('South America','Güney Amerika')
        //   .replace('Canada','Kanada')
        //   .replace('Republic of the Congo','Kango Cumhuriyeti')
        //   .replace('Iceland','İzlanda')
        //   .replace('Indonesia','Endenozya')
        //   .replace('Oman','Umman')
        //   .replace('World','Dünya')
        //   .replace('USA','Amerika')
        //   .replace('Latvia','Letonya')
        //   .replace('Guinea','Gine')
        //   .replace('Faroe Islands','Faroe Adaları')
        //   element.country_name = str
        // })
        // console.log(this.scors)
      })
    }
  }
}
</script>
