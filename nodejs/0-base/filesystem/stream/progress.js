const fs = require("fs");
const rs = fs.createReadStream("./video.mp4");

fs.stat("./video.mp4", (err, data) => {
  const total = data.size;
  let prograss = 0;

  rs.on("data", (chunk) => {
    console.log("read...");
    prograss += chunk.length;
    console.log(Math.round((100 * prograss) / total) + "%");
  });

  rs.on("end", () => {
    console.log("Done...");
    console.log("Size..." + (total / 1024 / 1024).toFixed(2));
  });
});
