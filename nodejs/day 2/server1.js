const express=require('express');
const bodyParser=require('body-parser');
const bcrypt=require('bcrypt');

const app = express();
app.set("view-engine","ejs");
app.use(bodyParser.urlencoded())
app.use(bodyParser.json())

app.get('/',function(req,res){
    
})
let msg;
app.get('/add',function(req,res){
    msg=''
    res.render('add.ejs',{msg});
})
let students=[];
let lastIndex=students.length;
class Student{
    constructor(id, name, email, password){
        this.id=id
        this.name=name
        this.email=email
        this.password=password
    }
}
app.post('/store',async function(req,res){
    
    if (req.body.password.length<8) {
        let msg='registeration failed need 8 chars of password'
        res.render('add.ejs',{msg})
    }else{
        try {
            const salt= await bcrypt.genSalt(10);
            const hashedPassword= await bcrypt.hash(req.body.password,salt);
            const id= ++lastIndex
            const student= new Student(id,req.body.name, req.body.email, hashedPassword)
            console.log(student);
            students.push(student)
            res.render('index.ejs',{students})
        } catch (error) {
            console.error(error);
            res.status(500).send('Server Error');
        }
    }
    
})

app.listen(8080)