const express = require("express");
const app = express();

app.get('/index.html',function (req,res) {
    res.send('<h2>Hi from express.js</h2>')
})
app.listen(8080,function(){
    console.log('started express');
})