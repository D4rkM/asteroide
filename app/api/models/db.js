'use strict';

const mysql = require('mysql');

  const connection = mysql.createConnection({
    host     : 'localhost',
    port     : 3306,
    user     : 'root',
    password : 'bcd127',
    database : 'db_asteroide'
  });


  module.exports = {
    execSQLQuery:  function(sqlQry, res, state){
        connection.query(sqlQry, function(error, results, fields){
          if(error)
            res.json(error);
          else
            res.json(results);
          // connection.end();
          console.log('executou!');
        });
      }
  }


  connection.connect(function(err){
    if(err) return console.log(err);
    console.log('conectou');
  });
