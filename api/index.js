'use strict';

const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const port = 3000;
const mysql = require('mysql');
const db = require('./models/db');

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
  db.execSQLQuery(`INSERT INTO funcionario(nome, email, cpf, senha, datanasc, sexo, rg, ativo,login) VALUES('${nome}', '${email}','${cpf}', '${senha}', '${datanasc}','${sexo}','${rg}','${ativo}', '${login}')`, res);
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
  const email = req.body.email.substring(0,45);
  const senha = req.body.senha.substring(0, 45);

  // var hash = crypto.createHash('sha256').update(senha).digest('base64');

  db.execSQLQuery(`SELECT * FROM usuario WHERE email = '${email}' AND senha = '${senha}' limit 1`, res);
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
  // const ativo = req.body.ativo.substring(0, 45);
  // const login = req.body.login.substring(0, 45);
  db.execSQLQuery(`INSERT INTO usuario(nome, email, cpf, senha, datanasc, sexo, rg ) VALUES('${nome}', '${email}','${cpf}', '${senha}', '${datanasc}','${sexo}','${rg}')`, res);
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


// inicia o servidor
app.listen(port);
console.log('Api Funcionando!');
