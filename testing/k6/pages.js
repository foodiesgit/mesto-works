import http from 'k6/http'
import {check, sleep} from 'k6'

export const options = {
  stages: [
    {duration: '30s', target: 25},
    {duration: '1m', target: 50},
    {duration: '20s', target: 0}
  ]
};
export default function() {
  const pages = [
    '/',
    '/projeler'
  ]
  for (const page of pages) {
    const res = http.get('https://konut.gaziantepbilisim.com.tr/')
    check(res, {
      'status was 200' : (r) => r.status === 200
    })
    sleep(1)
  }
}