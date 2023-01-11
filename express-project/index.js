const express = require('express');

const app = express();

app.get("/", (req, res) => {
    res.send("<h1>hello There!!</h1>");
  });

  const products = [
    {
      id: 1,
      name: "iphone",
    },
    {
      id: 2,
      name: "vivo",
    },
    {
      id: 3,
      name: "oppo",
    },
  ];

  app.get("/products", (req, res) => {
    res.json(products)
  })
  
app.listen(5000, () => console.log("server running...."));