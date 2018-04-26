'use strict';

const request = require('request');
const http = require('http');
const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const port = 3000;
const mysql = require('mysql');
const db = require('./models/db');
// const dataConverter = require('data');

function dataParaMysql(dataParaConverter){

  var dia =(dataParaConverter.split("/")[0]);
  var mes = (dataParaConverter.split("/")[1]);
  var ano = (dataParaConverter.split("/")[2]);
  var dataParaMysql = ano +"-"+ mes +"-"+ dia;
  return dataParaMysql;
}

function dataParaSistema(dataParaConverter){

  var dia =(dataParaConverter.split("-")[2]);
  var mes = (dataParaConverter.split("-")[1]);
  var ano = (dataParaConverter.split("-")[0]);
  var dataParaSistema = dia +"/"+ mes +"/"+ ano;
  return dataParaSistema;
}

//importando lib de criptografia
var crypto = require('crypto');

//Configurando o body parser para pegar POSTS mais tarde
app.use(bodyParser.urlencoded({extended:true}));
app.use(bodyParser.json());

// Definindo Rotas
const router = express.Router();
router.get('/', (req, res) => res.json({ message: 'Funcionando'}));
app.use('/', router);

// Lista todos os funcionários da empresa
router.get('/v1/funcionarios', (req, res) => {
  db.execSQLQuery('SELECT * FROM funcionario', res);
});

// Busca um usuário por id no banco
router.get('/v1/funcionarios/:id?', (req, res) =>{
    let filter = '';
    if(req.params.id) filter = ' WHERE id=' + parseInt(req.params.id);
    db.execSQLQuery('SELECT * FROM funcionario' + filter + ' LIMIT 1', res);
});

// Exclui Funcionário do banco
router.delete('/v1/funcionarios/:id?', (req, res) =>{
    let filter = '';
    if(req.params.id) filter = ' WHERE id=' + parseInt(req.params.id);
    db.execSQLQuery('DELETE FROM funcionario' + filter + ' LIMIT 1', res);
});

//Insere funcinário no banco de dados
router.post('/v1/funcionarios', (req,res) => {
  // const id = parseInt(req.params.id);
  const nome = req.body.nome.substring(0,150);
  const email = req.body.email.substring(0, 45);
  const cpf = req.body.cpf.substring(0, 11);
  const senha = req.body.senha.substring(0, 45);
  const datanasc = req.body.datanasc.substring(0, 45);
  const sexo = req.body.sexo.substring(0, 45);
  const rg = req.body.rg.substring(0, 45);
  const ativo = req.body.ativo.substring(0, 45);
  const login = req.body.login.substring(0, 45);

  const dataEnvio = dataConverter.dataParaMysql(datanasc);

  db.execSQLQuery(`INSERT INTO funcionario(nome, email, cpf, senha, datanasc, sexo, rg, ativo,login) VALUES('${nome}', '${email}','${cpf}', '${senha}', '${dataEnvio}','${sexo}','${rg}','${ativo}', '${login}')`, res);
});

// Atualiza um funcionários
router.patch('/v1/funcionarios/:id', (req, res) =>{
    const id = parseInt(req.params.id);
    const nome = req.body.nome.substring(0,150);
    const email = req.body.email.substring(0, 45);
    const cpf = req.body.cpf.substring(0, 11);
    const senha = req.body.senha.substring(0, 45);
    const datanasc = req.body.datanasc.substring(0, 45);
    const sexo = req.body.sexo.substring(0, 45);
    const rg = req.body.rg.substring(0, 45);
    const ativo = req.body.ativo.substring(0, 45);
    const login = req.body.login.substring(0, 45);

    db.execSQLQuery(`UPDATE funcionario SET nome='${nome}', cpf='${cpf}', email='${email}', senha='${senha}', datanasc='${datanasc}', sexo='${sexo}', rg='${rg}', ativo='${ativo}', login='${login}'  WHERE ID=${id}`, res);
});

// CLIENTE ---------------------------------------------------------------------

// Autentica o cliente no app
router.post('/api/v1/autenticar/cliente', (req, res) => {
  // const email = req.body.email.substring(0,45);
  const senha = req.body.senha.substring(0, 45);
  const login = req.body.login.substring(0, 45);
  const hash = crypto.createHash('sha256').update(senha).digest('base64');

  db.execSQLQuery(`SELECT * FROM usuario WHERE login = '${login}' AND senha = '${hash}' limit 1`, res);
});

//Insere cliente no banco de dados
router.post('/api/v1/cliente', (req,res) => {
  // const id = parseInt(req.params.id);
  const nome = req.body.nome.substring(0,150);
  const email = req.body.email.substring(0, 45);
  const senha = req.body.senha.substring(0, 45);
  const datanasc = req.body.datanasc.substring(0, 45);
  const sexo = req.body.sexo.substring(0, 45);
  const cpf = req.body.cpf.substring(0, 11);
  const rg = req.body.rg.substring(0, 45);
  const telefone = req.body.telefone;
  const celular = req.body.celular;
  const login = req.body.login.substring(0, 12);
  const dataEnvio = dataParaMysql(datanasc);

  const hash = crypto.createHash('sha256').update(senha).digest('base64');
  // const ativo = req.body.ativo.substring(0, 45);
  // const login = req.body.login.substring(0, 45);
  db.execSQLQuery(`INSERT INTO usuario(nome, email, cpf, telefone, celular, senha, datanasc, sexo, rg, login) VALUES('${nome}', '${email}','${cpf}','${telefone}', '${celular}', '${hash}', '${dataEnvio}','${sexo}','${rg}', '${login}')`, res);
});

//Atualiza cliente no banco de dados
router.post('/api/v1/cliente/:id', (req,res) => {
  let filter = '';
  if(req.params.id) filter = ' WHERE id=' + parseInt(req.params.id);
  console.log(req.params.id);
  const nome = req.body.nome.substring(0,150);
  const email = req.body.email.substring(0, 45);
  const senha = req.body.senha.substring(0, 45);
  // const datanasc = req.body.datanasc.substring(0, 45);
  const sexo = req.body.sexo.substring(0, 45);
  const cpf = req.body.cpf.substring(0, 11);
  const rg = req.body.rg.substring(0, 45);
  const telefone = req.body.telefone;
  const celular = req.body.celular;
  const login = req.body.login.substring(0, 12);

  let hash = '';
  // let dataEnvio = '';

  // if(datanasc != ""){
  //   dataEnvio = dataParaMysql(datanasc);
  // }

  if(senha != ""){
    hash = crypto.createHash('sha256').update(senha).digest('base64');

    db.execSQLQuery(`UPDATE usuario SET nome = '${nome}', email = '${email}', cpf = '${cpf}', telefone = '${telefone}', celular = '${celular}', senha = '${hash}',  sexo = '${sexo}', rg = '${rg}', login = '${login}'` + filter, res);
  }else{
    db.execSQLQuery(`UPDATE usuario SET nome = '${nome}', email = '${email}', cpf = '${cpf}', telefone = '${telefone}', celular = '${celular}',  sexo = '${sexo}', rg = '${rg}', login = '${login}'` + filter, res);
  }




  // db.execSQLQuery(`UPDATE usuario SET nome = '${nome}', email = '${email}', cpf = '${cpf}', telefone = '${telefone}', celular = '${celular}', senha = '${hash}', datanasc = '${dataEnvio}',  sexo = '${sexo}', rg = '${rg}', login '${login} WHERE id = ${id}'`, res);
});

// FIM API CLIENTE -------------------------------------------------------------

// MOTORISTA -------------------------------------------------------------------
router.post('/api/v1/autenticar/motorista', (req, res) => {
  const login = req.body.login.substring(0,45);
  const senha = req.body.senha.substring(0, 45);
  // console.log(email);
  // var hash = crypto.createHash('sha256').update(senha).digest('base64');
  db.execSQLQuery(`SELECT * FROM motorista WHERE login = '${login}' AND senha = '${senha}' limit 1`, res);
});
// FIM API MOTORISTA -----------------------------------------------------------

// Funcionarlidades do app

//  Sugestões de viagens da empresas
router.get('/api/v1/sugestoes', (req,res) => {
  db.execSQLQuery('SELECT * FROM viagem', res);
});


router.post('/api/v1/feedback/:id', (req, res) => {

  const idUsuario = req.params.id;
  const sugestao = req.body.sugestao;
  const reclamacao = req.body.reclamacao;
  const elogio = req.body.elogio;

  db.execSQLQuery(`INSERT INTO fale_conosco(id_usuario, sugestao, reclamacoes, elogios) VALUES('${idUsuario}','${sugestao}','${reclamacao}','${elogio}')`, res);
});

// Função para retornar o valor da requisição de endereco
function jsonReturn(consulta, callback){
  request(consulta,(err,res,body) => {
    // console.log(body);
    // dados = body;
    if(err){
      // res.json(err);
      console.log(err);
    }else{
      callback(body);
	  console.log(body);
    }
  });
}

// Busca de endereço viacep
router.get('/api/v1/busca_endereco/:cep?', (req,res) => {

  const cep = "0" + parseInt(req.params.cep);
	// console.log(cep);
  const path = `/${cep}/json/`;
	// console.log(path);
  const hostname = `http://www.viacep.com.br/ws`;
  console.log(hostname+path);
  const consulta = hostname+path;
  jsonReturn(consulta, function(dadosReturn){
    res.json(dadosReturn);
  });
  // const dados;

  // console.log(dados);
  // res.json(dados);

});


// inicia o servidor
app.listen(port);
console.log('Api Funcionando!');
