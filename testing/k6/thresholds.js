import http, { get } from "k6/http";
import { check, sleep } from "k6";

export const options = {
  vus: 1,
  duration: '1s',
  thresholds: {
    http_req_duration: ["p(95)<200"],
  },
};
export default function () {
  let res = http.get("https://konut.gaziantepbilisim.com.tr");
  // let res = http.get("https://biappyaz.com");
  //with assertion
  check(res, { "status vas 200: ": (r) => r.status == 200 });
  // sleep(1);
}
