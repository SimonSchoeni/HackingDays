const db = require('./db')
const { exec } = require('child_process');

const Query = {
   //resolver function for greeting
   greeting:() => {
      return "hello from  TutorialsPoint !!!"
   },
   
   //resolver function for students returns list
   students:() => db.students.list(),

   //resolver function for studentbyId
   studentById:(root,args,context,info) => {
      //args will contain parameter passed in query
      return db.students.get(args.id);
   }
}
const Mutation= {
  editAvatar:(root,args,context,info) => {
    let student = db.students.get(args.id);
    exec('curl '+args.picLocation, (err, stdout,stderr) => {
      if(err){
      }
      let res = Buffer.from(stdout, 'utf8').toString('base64');
      return db.students.update({id:args.id, avatarPic:res, firstName:student.firstName,lastName:student.lastName, email:student.email, password:student.password, picLocation:"" });
    });
   // return db.students.update({id:args.id, picLocation:args.picLocation});
  }
}


//for each single student object returned,resolver is invoked

const Student = {
   fullName:(root,args,context,info) => {
      return root.firstName+":"+root.lastName
   }
}

module.exports = {Query,Student,Mutation}