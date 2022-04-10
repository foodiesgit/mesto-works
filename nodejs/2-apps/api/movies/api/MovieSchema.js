const mongoose = require("mongoose");
const Movieschema = new mongoose.Schema({
  name: { type: String, required: true },
  year: { type: Number, required: true },
  category: { type: Number, required: true },
  country: { type: String, required: true },
  imdb_score: { type: Number, required: true },
  director_id: Schema.Types.ObjectId,
  created_at: { type: Date, default: Date.now() },
});

module.exports = module("Movies", Movieschema);
