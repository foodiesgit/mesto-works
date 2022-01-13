//local date
let ld = new Date()
let  months = ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran','Temmuz', 'Agustos', 'Eylül', 'Ekim', 'Kasım', 'Aralık'];
let  days = ['Paz', 'Pazs', 'Salı', 'Çar', 'Per', 'Cum','Cums'];
console.log(months[ld.getMonth() + 1]  +'-'+ days[ld.getDay()] +'-'+ ld.getFullYear())