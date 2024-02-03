var http = require("http");
const fs= require('fs');
const querystring=require('querystring')
http
  .createServer(function (req, res) {
    if (req.url == "/index.html") {
      fs.readFile("index.html",function(err,data){
        res.write(data); 
        res.end("");
     })
     
    }
    else if (req.url == "/about.html") {
      fs.readFile("about.html",function(err,data){
        res.write(data); 
        res.end("");
     })
     
    }
    else if (req.url == "/style.css") {
      fs.readFile("style.css",function(err,data){
        res.write(data); 
        res.end("");
     })
     
    }
    else if (req.url == "/form.css") {
      fs.readFile("form.css",function(err,data){
        res.write(data); 
        res.end("");
     })
     
    }
    else if (req.url == "/contactus.html") {
      fs.readFile("contactus.html",function(err,data){
        res.write(data); 
        res.end("");
     })
     
    }
    else if (req.url == "/register.html") {
      fs.readFile("register.html",function(err,data){
        res.write(data); 
        res.end("");
     })
     
    }
    else if (req.url == "/register") {
      let bodyReq='';
      req.on('data',function(data){
        bodyReq+=data;
      })
      req.on('end',function(bodydata){
        bodydata=querystring.parse(bodyReq)
        if (bodydata.password.length>=8) {
          fs.appendFile('index.html', `Hello ${bodydata.uname}`, function (err) {
            if (err) throw err;
            fs.readFile("index.html",function(err,data){
              res.write(data); 
              res.end("");
           })
            });
          
            
        }else{
          fs.appendFile('register.html', `password must be at least 8 chars your pw is ${bodydata.password.length}`, function (err) {
            if (err) throw err;
            fs.readFile("register.html",function(err,data){
              res.write(data); 
              res.end("");
           })
            });
        }
      })
    }
    
  })
  .listen(8080);
