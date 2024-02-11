const express = require("express");
const bodyParser = require("body-parser");
const app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded());

class Car {
  constructor(id, model, liscence) {
    this.id = id;
    this.model = model;
    this.liscence = liscence;
  }
}
let garage = [];
let lastIndex = garage.length;

app.get("/", function (req, res) {
  res.sendFile(__dirname + "\\index.html");
});
app.post("/store", function (req, res) {
  const car = new Car(String(++lastIndex), req.body.model, req.body.lisence);
  garage.push(car);
  const body = {
    msg: "success",
  };
  res.send({ body });
});

app.get("/garage", function (req, res) {
  res.send({ data: garage, msg: "Success" });
});
app.get("/delete/:id", function (req, res) {
  const id = req.params.id;
  const carIndex = garage.findIndex((car) => car.id == id);
  const body = {};
  if (carIndex >= 0) {
    garage.splice(carIndex, 1);
    body.msg = "Success";
  } else {
    body.msg = "Not Found";
  }
  res.send(body);
});
app.get("/car", function (req, res) {
  const id = req.query.id;
  const car = garage.find((car) => car.id == id);
  const body = {};
  if (car) {
    body.data = car;
    body.msg = "success";
  } else {
    body.msg = "Not Found";
  }

  const html = `
  <h2>Car Details</h2>
  <p>id: ${car.id}</p>
  <p>Model: ${car.model}</p>
  <p>License: ${car.liscence}</p>
`;
  res.send(html);
});

app.listen(8080);
