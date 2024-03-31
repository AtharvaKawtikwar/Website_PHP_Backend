

const express = require('express');
const bodyParser = require('body-parser');
const app = express();
const port = 5000; 

app.use(bodyParser.urlencoded({ extended: false }));

app.use(express.static("C:/Users/Atharva Kawtikwar/Documents/wp_website_2"));

// Registration Page
app.get('/registration', (req, res) => {
  res.sendFile(__dirname + "/index.html");
});

// Login Page
app.get('/login', (req, res) => {
  res.sendFile(__dirname + '/index2.html');
});

// Home Page
app.get('/home', (req, res) => {
  res.sendFile(__dirname + '/home.html');
});

// Football Form Page
app.get('/footballform', (req, res) => {
  res.sendFile(__dirname + '/footballform.html');
});

// Handle search requests from the home page
app.post('/search', (req, res) => {
  const searchTerm = req.body.searchTerm; 
  res.json({ searchResult: searchTerm });
});

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
