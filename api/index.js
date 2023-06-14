const express = require("express");
const cors = require('cors');
const bodyParser = require("body-parser");
  
const app = express();
app.use(cors());
app.use(express.json())

const port = process.env.PORT || 3000;

/** Connection to MongoDB Database */
const mongoose = require('mongoose');
mongoose.connect('mongodb://user:1234@127.0.0.1:27017/hotels', { useNewUrlParser: true });


const db = mongoose.connection;
db.on('error', console.error.bind(console, 'connection error:'));
db.once('open', () => {
  console.log('Connected to MongoDB!');
});

const colaboradoresSchema = new mongoose.Schema({
  title: String,
  subtitle: String
});

const Colaboradores = mongoose.model('colaboradores', colaboradoresSchema);

  
app.use(bodyParser.urlencoded({
    extended: true
}));
app.use(express.static("public"));
  

app.get('/colaboradores', async (req, res) => {
  try {
    const items = await Colaboradores.find();
    res.status(200).json(items)
} catch (err) {
    res.status(500).json(err);
}});

const contactosSchema = new mongoose.Schema({
  firstname: String,
  lastname: String,
  email: String,
  message: String
});
const Contactos = mongoose.model('contactos', contactosSchema);

app.post('/contacts', (req, res) => {
  let data = req.body;
  Contactos.create(
    { firstname: data.firstName,
      lastname: data.lastName,
      email: data.email,
      message: data.message
    }    
  ).then(result => {
    console.log(result)
    res.status(200).json(result)
  }
  ).catch ( err => {
    res.status(500).json(err);
  });
  
})


app.listen(port, function() {
    console.log(`API server listening on port ${port}`);
});