const express=require('express')
const bodyParse=require('body-parser');
var cookieParser = require('cookie-parser')
const mongodb = require("mongodb");
const { v4: uuidv4 } = require('uuid');
const { log } = require('console');

const dburi="mongodb+srv://test1234:test1234@cluster0.ssp6sd1.mongodb.net/ITI?retryWrites=true&w=majority"
const mdbClient = new mongodb.MongoClient(dburi);


let dbo = null;
async function dbinit(){
    await mdbClient.connect();
    dbo = mdbClient.db("ITI");
    app.listen(8082);
}

dbinit();
const app= express();

app.use(cookieParser())
app.use(bodyParse.json());
app.use(bodyParse.urlencoded());
app.set('view-engine','ejs');


app.get('/',function(req,res){
    res.render('signup.ejs');
})

app.get('/login',async function(req,res){
    res.render('index.ejs')
    // let user = await dbo.collection("users").find().toArray();
    // console.log(user);
})


app.post('/login',async function(req, res){
    // console.log(req.body);
    let user =await dbo.collection('users').findOne({email:req.body.email, password:req.body.password})
    if (user) {
        const uuid=uuidv4();
        await dbo.collection('users').updateOne({_id:user._id},{$set:{sid:uuid}})
        res.cookie('sid',uuid);
        res.render('landing.ejs',{'msg':'success','user':user})
    }
    // console.log(user);

    else{
        res.send("you're not registered")
    }
})


app.get('/signup',function(req,res){
    res.render('signup.ejs');
})

app.post('/signup',async function(req,res){
    await dbo.collection('users').insertOne({
        email:req.body.email,
        password:req.body.password,
    })
    res.redirect('\login')
})
app.listen(8080)