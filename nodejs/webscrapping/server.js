const request = require('request')
const cheerio = require('cheerio')

let allInfos = []
request('https://www.fotomac.com.tr/canli-skor',(err, res, html) => {
  if(!err && res.statusCode === 200){
    const $ = cheerio.load(html)
    $('.match-list-row').each((item, el) => {
      // console.table($(el).text())
      const time = $(el).find('.table-time').text().replace(/\s\s+/g, '')
      const minute = $(el).find('.chart').text()
      // const chart = $(el).find('.chart').attr('data-percent')
      allInfos.push({
        time:time,
        minute:minute
      })
    })
    console.log(allInfos)
  }
})